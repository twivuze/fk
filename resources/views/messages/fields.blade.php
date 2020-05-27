<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Sender Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sender_id', 'Sender Id:') !!}
    {!! Form::text('sender_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Receiver Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receiver_id', 'Receiver Id:') !!}
    {!! Form::text('receiver_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Checked Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checked', 'Checked:') !!}
    {!! Form::text('checked', null, ['class' => 'form-control']) !!}
</div>

<!-- Read Field -->
<div class="form-group col-sm-6">
    {!! Form::label('read', 'Read:') !!}
    {!! Form::text('read', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('messages.index') }}" class="btn btn-default">Cancel</a>
</div>
