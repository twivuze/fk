<!-- Ip Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_address', 'Ip Address:') !!}
    {!! Form::text('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Browser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('browser', 'Browser:') !!}
    {!! Form::text('browser', null, ['class' => 'form-control']) !!}
</div>

<!-- Device Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device', 'Device:') !!}
    {!! Form::text('device', null, ['class' => 'form-control']) !!}
</div>

<!-- Current Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('current_location', 'Current Location:') !!}
    {!! Form::text('current_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language', 'Language:') !!}
    {!! Form::text('language', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Root Field -->
<div class="form-group col-sm-6">
    {!! Form::label('root', 'Root:') !!}
    {!! Form::text('root', null, ['class' => 'form-control']) !!}
</div>

<!-- Https Field -->
<div class="form-group col-sm-6">
    {!! Form::label('https', 'Https:') !!}
    {!! Form::text('https', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity', 'Activity:') !!}
    {!! Form::text('activity', null, ['class' => 'form-control']) !!}
</div>

<!-- Platform Field -->
<div class="form-group col-sm-6">
    {!! Form::label('platform', 'Platform:') !!}
    {!! Form::text('platform', null, ['class' => 'form-control']) !!}
</div>

<!-- Browser Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('browser_version', 'Browser Version:') !!}
    {!! Form::text('browser_version', null, ['class' => 'form-control']) !!}
</div>

<!-- Device Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_version', 'Device Version:') !!}
    {!! Form::text('device_version', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lon', 'Lon:') !!}
    {!! Form::text('lon', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vistors.index') }}" class="btn btn-default">Cancel</a>
</div>
