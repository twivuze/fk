<div class="table-responsive">
    <table class="table" id="conferenceSessions-table">
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
        @foreach($conferenceSessions as $conferenceSession)
            <tr>
                <td>{{ $conferenceSession->title }}</td>
            <!-- <td>{{ $conferenceSession->contents }}</td>
            <td>{{ $conferenceSession->image }}</td> -->
            <td>{{ $conferenceSession->allow_to_apply }}</td>
                <td>
                    {!! Form::open(['route' => ['conferenceSessions.destroy', $conferenceSession->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <a href="{{ route('conferenceApplications.index') }}?session={{$conferenceSession->id}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i>Applicant(s)</a>
                        <a href="{{ route('conferenceSessions.show', [$conferenceSession->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('conferenceSessions.edit', [$conferenceSession->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
