<div class="table-responsive">
    <table class="table" id="requisitions-table">
        <thead>
        <tr>
            <th>Ctrl No</th>
        <th>Truck Id</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requisitions as $requisition)
            <tr>
                <td>{{ $requisition->ctrl_no }}</td>
            <td>{{ $requisition->truck_id }}</td>
            <td>{{ $requisition->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['requisitions.destroy', $requisition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requisitions.show', [$requisition->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('requisitions.edit', [$requisition->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
