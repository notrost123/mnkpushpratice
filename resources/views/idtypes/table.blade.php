<div class="table-responsive">
    <table class="table" id="idtypes-table">
        <thead>
        <tr>
            <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($idtypes as $idtype)
            <tr>
                <td>{{ $idtype->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['idtypes.destroy', $idtype->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('idtypes.show', [$idtype->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('idtypes.edit', [$idtype->id]) }}"
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
