<?php 

namespace App\Traits;

use Alert;
use App\Car;
use App\Category;
use App\Driver;
use App\Factory;
use App\FactoryEmployee;
use App\FormNumber;
use App\FormTransaction;
use App\Hotel;
use App\HotelEmployee;
use App\LaundryForm;
use App\LaundryFormHistory;
use App\LaundryFormItem;
use App\TexcareEmployee;
use App\Mail\DFCreatedBalancing;
use App\Mail\DFApprovalRequest;
use App\Mail\DFRevisionApprovalRequest;

use App\Mail\CFCreatedBalancing;
use App\Mail\CFApprovalRequest;
use App\Mail\CFRevisionApprovalRequest;

use App\User;
use App\ZoneRunner;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;
use PDF;
use Session;

trait FormEvents 
{
    public function saveReconciliation($ids) {

        DB::beginTransaction();

        try {
            $flag = LaundryForm::whereIn('id', $ids)                
                    ->update([                       
                            'ballanceStatusId'=>'2',
                        ]);
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            Alert::error($params['exception']);
            return back()
                ->withInput();
        }
        
        DB::commit();
    }    

    public function stores($request, $params) {

        $category_id = 0;
        $car_id = 1;
        $driver_id = 1;
        $factory_id = 1;
        $hotel_id = 0;        
        $is_balancing = 0;
        $speed = 1;        
        

        $code = $params['code'];
        $laundryForm = $params['form'];
        $type = $params['type'];

        if (strcmp($laundryForm, 'reconcile') == 0) {
            $items = $params['items'];
            $values = $params['values'];
        } else {
            $items = $request->get('items');
            $values = $request->get('values');
        }

        if (!count($items)) {
            Session::flash('error', 'You must add item');
            return back()->withInput();
        } 

        DB::beginTransaction();

        try {

            if (strcmp($laundryForm, 'reconcile') == 0) {
                $category_id = $params['category_id'];
                $hotel_id = $params['hotel_id'];
                $is_balancing = 1;
                
            } else {
               $factory_id = $request->get('factory_id');
               $hotel_id = $request->get('hotel_id');
               $category_id = $request->get('category_id');
               $is_balancing = $request->get('is_balancing');
               $speed = $request->get('speed');
               $driver_id = $request->get('driver_id');
               $car_id = $request->get('car_id');
            }

            $number = FormNumber::findOrFail($params['form_number']);
            $factory = Factory::findOrFail($factory_id);
            $category = Category::findOrFail($category_id);
            $hotel = Hotel::findOrFail($hotel_id);

            $category_code = $category->code;
            $new_number = $number->$category_code + 1;
            $number->$category_code = $new_number;
            $number->save();

            $form_number = $factory->code . '/' . $code . '/' . $category_code . '/' . $number->year . '/' . $hotel->customer_code . '/' . str_pad($new_number, 5, "0", STR_PAD_LEFT);

            if ($is_balancing == 1 || strcmp($laundryForm, 'reconcile') == 0) {
                $form_number = $form_number . '-BAL';
            }

            /**
             * Redefine if timezone is setted by user
             */
            if (! empty($request->input('created_at'))) {
                
                $created_at = $request->input('created_at') . ' ' . \Carbon\Carbon::now('Asia/Hong_Kong')->toTimeString();
                $request->merge([
                                'number' => $form_number,
                                'category_id' => $category_id,
                                'hotel_id' => $hotel_id,
                                'factory_id' => $factory_id,
                                'is_balancing' => $is_balancing,
                                'ballanceStatusId' => 2,
                                'created_by' => Auth::user()->id,
                                'type' => $type,
                        ]);
            } else {

                $request->merge([
                                'number' => $form_number,
                                'category_id' => $category_id,
                                'hotel_id' => $hotel_id,
                                'factory_id' => $factory_id,
                                'is_balancing' => $is_balancing,
                                'ballanceStatusId' => 2,
                                'created_by' => Auth::user()->id,
                                'type' => $type,
                        ]);
            }

            $form = LaundryForm::create($request->all());

            foreach ($items as $key => $item) {
                LaundryFormItem::create(
                    [
                        'form_id' => $form->id,
                        'item_id' => $item,
                        'amount' => $values[$key]
                    ]
                );
            }

            if (strcmp($laundryForm, 'delivery') == 0) {
                $number->update([$category_code => $new_number]);
            }

            $employees = $form->hotel->employees;

            if ($form->is_balancing || strcmp($laundryForm, 'reconcile') == 0) {

                if ($type == 1) {
                    foreach ($employees as $employee) {
                        if($employee->user() && $employee->user()->hasRole('hotel_supervisor')) {
                            \Log::info('new balancing form notification has been send to: ' . $employee->email);
                            Mail::to($employee->email)->send(new CFCreatedBalancing($employee, $form));
                        }
                    }
                } elseif ($type == 2) {
                    foreach ($employees as $employee) {
                        if($employee->user() && $employee->user()->hasRole('hotel_supervisor')) {
                            \Log::info('new balancing form notification has been send to: ' . $employee->email);
                            Mail::to($employee->email)->send(new DFCreatedBalancing($employee, $form));
                        }
                    }                    
                }
            }
            
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            Alert::error($params['exception']);
            return back()
                ->withInput();
        }
        
        DB::commit();
        return true;
    }

    public function getBalancingData($ids){

        $cForm = array();
        $dForm = array();
        $bForm = array();
        $totalForm = array();
        $itemIds = array();
        $formIds = array();
       
        $items = DB::table('laundry_form_items as t')
                ->whereIn('t.form_id', $ids)
                //->where('t.form_id', $ids)
                ->where('t.amount', '>', '0')
                ->distinct('t.form_id')
                ->select('t.item_id')
                ->get();        

        foreach ($items as $key => $item) {
            array_push($itemIds, $item->item_id);
        }        
       
        //var_dump($itemIds);echo "<br />";exit;
        
        $forms = DB::table('laundry_form_items as t')
                ->whereIn('t.item_id', $itemIds)
                ->distinct('t.form_id')
                ->select('t.form_id')
                ->get(); 

        foreach ($forms as $key => $form) {
            array_push($formIds, $form->form_id);
        }
        //var_dump($formIds);exit;
        $totalData = DB::table('laundry_form_items as t')               
               ->join('laundry_forms as s', 't.form_id', '=', 's.id')
               ->whereIn('t.item_id', $itemIds)
               //->whereIn('t.form_id', $formIds)
               ->select(
                    DB::raw('t.form_id, s.type, s.hotel_id, s.category_id, t.item_id, t.amount, sum(amount) as sum')
                )
               ->groupBy('s.type', 's.category_id', 't.item_id')
               ->get();

        $categoris = DB::table('laundry_forms')
             ->whereIn('id', $formIds)
             ->distinct()
             ->orderBy('category_id')
             ->get(['category_id']);

        $i = 0;
        $j = 0;        
        foreach ($totalData as $key => $value) {            
          
            if ($value->type == 1) {
                $cForm[$i]['hotel_id'] = $value->hotel_id;
                $cForm[$i]['category'] = $value->category_id;
                $cForm[$i]['item'] = $value->item_id;
                $cForm[$i]['amount'] = $value->sum;
                $cForm[$i]['type'] = $value->type;
                $i ++;
            } elseif ($value->type == 2) {
                $dForm[$j]['hotel_id'] = $value->hotel_id;
                $dForm[$j]['category'] = $value->category_id;
                $dForm[$j]['item'] = $value->item_id;
                $dForm[$j]['amount'] = $value->sum;        
                $dForm[$j]['type'] = $value->type;
                $j ++;
            }
        }

        $i = 0;
       
        foreach ($cForm as $collection) {
            foreach ($dForm as $delivery) {
                if ($collection['item'] == $delivery['item']) {

                    if (intval($collection['amount']) > intval($delivery['amount'])) {
                        $amount = intval($collection['amount']) - intval($delivery['amount']);

                        $totalForm[$i]["code"] = "DF";
                        $totalForm[$i]["type"] = 2;
                        $totalForm[$i]["hotel_id"] = $delivery['hotel_id'];
                        $totalForm[$i]["category_id"] = $delivery['category'];
                        $totalForm[$i]["item_id"] = $delivery['item'];
                        $totalForm[$i]["amount"] = $amount;
                        
                        $i ++;
                    } elseif (intval($collection['amount']) < intval($delivery['amount'])) {
                        $amount = intval($delivery['amount']) - intval($collection['amount']);
                        
                        $totalForm[$i]["code"] = "CF";
                        $totalForm[$i]["type"] = 1;
                        $totalForm[$i]["hotel_id"] = $collection['hotel_id'];
                        $totalForm[$i]["category_id"] = $collection['category'];
                        $totalForm[$i]["item_id"] = $collection['item'];
                        $totalForm[$i]["amount"] = $amount;

                        $i ++;
                    }
                }
            }
        }        

        foreach ($totalData as $data) {

            if ( !in_array($data->item_id, array_column($totalForm, 'item_id')))
            {
                if ($data->amount > 0) {
                    if ($data->type == 1) {
                        $totalForm[$i]["code"] = "DF";
                        $totalForm[$i]["type"] = 2;
                    } else {
                        $totalForm[$i]["code"] = "CF";
                        $totalForm[$i]["type"] = 1;
                    }
                    
                    $totalForm[$i]["hotel_id"] = $data->hotel_id;
                    $totalForm[$i]["category_id"] = $data->category_id;
                    $totalForm[$i]["item_id"] = $data->item_id;
                    $totalForm[$i]["amount"] = $data->amount;
                }

                $i ++;
            } 
        }        

        $i = 0;
        $j = 0;
        
        foreach ($categoris as $category) {
            $items = array();
            $amounts = array();

            $bForm[$i]["form"] = "reconcile";            

            foreach ($totalForm as $balance) {

                if ($category->category_id == $balance["category_id"] && $balance["type"] == 2) {
                    $bForm[$i]["form_id"] = $ids;
                    $bForm[$i]["category_id"] = $balance["category_id"];
                    $bForm[$i]["type"] = $balance["type"];
                    $bForm[$i]["code"] = $balance["code"];
                    $bForm[$i]["form_number"] = $balance["type"];
                    $bForm[$i]["hotel_id"] = $balance["hotel_id"];

                    $items[$j] = $balance["item_id"];
                    $amounts[$j] = $balance["amount"];
                    $j ++;
                }
            }

            if (count($items) > 0) {
                $bForm[$i]["items"] = $items;
                $bForm[$i]["values"] = $amounts;
            }

            $i ++;
            $j = 0;
            $items = array();
            $amounts = array();
            $i = 0;

            foreach ($totalForm as $balance) {
                if ($category->category_id == $balance["category_id"] && $balance["type"] == 1){
                    $bForm[$i]["form_id"] = $ids;
                    $bForm[$i]["category_id"] = $balance["category_id"];
                    $bForm[$i]["type"] = $balance["type"];
                    $bForm[$i]["code"] = $balance["code"];
                    $bForm[$i]["form_number"] = $balance["type"];
                    $bForm[$i]["hotel_id"] = $balance["hotel_id"];

                    $items[$j] = $balance["item_id"];
                    $amounts[$j] = $balance["amount"];
                    $j ++;
                } 
            }

            if (count($items) > 0) {
                $bForm[$i]["items"] = $items;
                $bForm[$i]["values"] = $amounts;
            }

            $i ++;
            $j = 0;
        }        
        
        return $bForm;        
    }    
}