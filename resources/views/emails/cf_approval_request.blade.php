Dear {!! $employee->name !!} <br><br>
Ada Collection Form yang perlu anda approve.<br>
@if ($form->is_balancing)
Silahkan melakukan Approval melalui akun superadmin "{!! url('transactions/collection_forms/'.$form->id) !!}"
@else
Klik link berikut untuk melakukan approval "{!! url('transactions/collection_forms/'.$form->id) !!}"
@endif
<br><br><br>
Terimakasih.
