<div class="table-responsive">
    <table class="table" id="trainingWorkshopSessions-table">
        <thead>
            <tr>
                <th>Title</th>
        <!-- <th>Contents</th>
        <th>Image</th> -->
        <th>Allow To Apply</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($trainingWorkshopSessions as $trainingWorkshopSession)
            <tr>
                <td>{{ $trainingWorkshopSession->title }}</td>
            <!-- <td>{{ $trainingWorkshopSession->contents }}</td>
            <td>{{ $trainingWorkshopSession->image }}</td> -->
            <td>{{ $trainingWorkshopSession->allow_to_apply }}</td>
                <td>
                    {!! Form::open(['route' => ['trainingWorkshopSessions.destroy', $trainingWorkshopSession->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('trainingWorkshops.index') }}?session={{$trainingWorkshopSession->id}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i>Applicant(s)</a>
                        <a href="{{ route('trainingWorkshopSessions.show', [$trainingWorkshopSession->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('trainingWorkshopSessions.edit', [$trainingWorkshopSession->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
