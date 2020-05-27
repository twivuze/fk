<div class="table-responsive">
    <table class="table" id="messages-table">
        <thead>
            <tr>
                <th>Message</th>
        <th>Sender Id</th>
        <th>Receiver Id</th>
        <th>Checked</th>
        <th>Read</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->message }}</td>
            <td>{{ $message->sender_id }}</td>
            <td>{{ $message->receiver_id }}</td>
            <td>{{ $message->checked }}</td>
            <td>{{ $message->read }}</td>
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messages.show', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messages.edit', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
