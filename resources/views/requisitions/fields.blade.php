<!-- Ctrl No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ctrl_no', 'Requisition Control No:') !!}
    <br>
    <h2><span class = "badge badge-secondary" >{{$txtReqCtrlNo->requisition_ctrl_no}}</span><h2>
    {!! Form::hidden('ctrl_no', $txtReqCtrlNo->requisition_ctrl_no, ['class' => 'form-control']) !!}
</div>

<!-- Truck Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('truck_id', 'Truck Id:') !!}
    {!! Form::text('truck_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12" style = "">
    <label for = "" >Items to Deliver</label>
    <!--Create generating input text that can be add edit delete-->
</div>