<div class="table-responsive">
    <table class="table" id="rostovs-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rostovs as $rostov)
            <tr>
                <td>{!! $rostov->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['rostovs.destroy', $rostov->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('rostovs.show', [$rostov->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('rostovs.edit', [$rostov->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
