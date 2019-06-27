<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;

class LectureController extends Controller
{
    //
    public function index(){

        $lectures = Lecture::get();
        return view('bsb.lecture.index')->with(compact('lectures'));
    }

    public function create(){
        return view('bsb.lecture.create');
    }

    public function docreate(Request $data){

      
        $file = $data->file('uploadvideo');
   
        $filename = $file->getClientOriginalName();
        $filename_1 = time().'_'.$filename;
        // //Display File Extension
        // echo 'File Extension: '.$file->getClientOriginalExtension();
        // echo '<br>';
     
        // //Display File Real Path
        // echo 'File Real Path: '.$file->getRealPath();
        // echo '<br>';
     
        // //Display File Size
        // echo 'File Size: '.$file->getSize();
        // echo '<br>';
     
        // //Display File Mime Type
        // echo 'File Mime Type: '.$file->getMimeType();
     
        //Move Uploaded File
        $destinationPath = public_path().'/uploads/';
        $file->move($destinationPath,$filename_1);
        
        $result = Lecture::create([
            'lecture_name'     => $data['lecture_name'],
            'playing_date'    => $data['playing_date'],
            'playing_time'    => $data['playing_time'],
            'teacher_name'  => $data['teacher_name'],
            'description'  => $data['description'],
            'location'  => $filename_1
        ]);
        
        return redirect('/lecture');
    }

    public function edit($id){
        $lecture = Lecture::find($id);
        return view('bsb.lecture.edit')->with(compact('lecture'));
    }

    public function update($id, Request $request){
        $input = $request->all();
        $lecture = Lecture::findorfail($id);
        $updateNow = $lecture->update($input);

        return  redirect('/lecture');
    }

    public function delete($id){
      
        $lecture = Lecture::findorfail($id);
        $updateNow = $lecture->delete($id);

        return  redirect('/lecture');
    }
}
