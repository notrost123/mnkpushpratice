<!-- Ctrl No Field -->
<div class="col-sm-12">
    {!! Form::label('ctrl_no', 'Ctrl No:') !!}
    <p>{{ $requisition->ctrl_no }}</p>
</div>

<!-- Truck Id Field -->
<div class="col-sm-12">
    {!! Form::label('truck_id', 'Truck Id:') !!}
    <p>{{ $requisition->truck_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $requisition->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $requisition->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $requisition->updated_at }}</p>
</div>

