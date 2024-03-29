<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="photo-details-table">
            <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photoDetails as $photoDetails)
                <tr>
                    
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['photoDetails.destroy', $photoDetails->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('photoDetails.show', [$photoDetails->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('photoDetails.edit', [$photoDetails->id]) }}"
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

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $photoDetails])
        </div>
    </div>
</div>
