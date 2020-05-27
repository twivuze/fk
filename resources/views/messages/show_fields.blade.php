<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $message->id }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $message->message }}</p>
</div>

<!-- Sender Id Field -->
<div class="form-group">
    {!! Form::label('sender_id', 'Sender Id:') !!}
    <p>{{ $message->sender_id }}</p>
</div>

<!-- Receiver Id Field -->
<div class="form-group">
    {!! Form::label('receiver_id', 'Receiver Id:') !!}
    <p>{{ $message->receiver_id }}</p>
</div>

<!-- Checked Field -->
<div class="form-group">
    {!! Form::label('checked', 'Checked:') !!}
    <p>{{ $message->checked }}</p>
</div>

<!-- Read Field -->
<div class="form-group">
    {!! Form::label('read', 'Read:') !!}
    <p>{{ $message->read }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $message->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $message->updated_at }}</p>
</div>

