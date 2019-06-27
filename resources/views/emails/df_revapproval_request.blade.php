Dear {!! $employee->name !!} <br><br>
@if ($employee->hotel_id > 0)
Pemberitahuan bahwa laundry form dibawah sedang menunggu approval .<br>
Silahkan melakukan approval melalui akun superadmin "{!! url('transactions/delivery_forms/'.$form->id) !!}"
@else
Ada Revision Delivery Form yang perlu anda approve.<br>
Klik link berikut untuk melakukan approval "{!! url('transactions/delivery_forms/'.$form->id) !!}"
@endif
<br><br><br>
Terimakasih.
