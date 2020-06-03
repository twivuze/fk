<!-- Enterprise Id Field -->
<div class="form-group col-sm-12 {{ $errors->has('enterprise_id') ? ' has-error' : '' }}">
    {!! Form::hidden('enterprise_id', $enterprise?$enterprise->id:null, ['class' => 'form-control']) !!}
    @if ($errors->has('enterprise_id'))
    <span class="help-block">
        <strong>{{ $errors->first('enterprise_id') }}</strong>
    </span>
    @endif
</div>

<!-- Lender Id Field -->
<div class="form-group col-sm-12 {{ $errors->has('lender_id') ? ' has-error' : '' }}">
    {!! Form::hidden('lender_id', $lender?$lender->id:null, ['class' => 'form-control']) !!}
    @if ($errors->has('lender_id'))
    <span class="help-block">
        <strong>{{ $errors->first('lender_id') }}</strong>
    </span>
    @endif
</div>

<!-- Center Id Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('center_id', $center?$center->id:null, ['class' => 'form-control']) !!}
</div>




<!-- Lender Field -->
<div class="form-group col-sm-12 {{ $errors->has('lender') ? ' has-error' : '' }}">
    {!! Form::label('lender', 'Lender:') !!}
    {!! Form::text('lender', $lender?$lender->name:null, ['class' => 'form-control']) !!}
    @if ($errors->has('lender'))
    <span class="help-block">
        <strong>{{ $errors->first('lender') }}</strong>
    </span>
    @endif
</div>
{!! Form::hidden('enterprise', $enterprise?$enterprise->business_name?$enterprise->business_name:$enterprise->name:null,
['class' => 'form-control']) !!}



<table class="table">
    <tr>
        <th>Enterprise</th>
        <th>Initial Target</th>
    </tr>
    <tr>
        <td>
            <b
                style="font-size: 16px;font-weight:800">{{ $enterprise?$enterprise->business_name?$enterprise->business_name:$enterprise->name:null}}</b>
        </td>

        <td>
            <b style="font-size: 16px;font-weight:800">USD {{$enterprise?$enterprise->lender_initial_target:0.00}}</b>
</td>
</tr>
</table>

<hr>

<!-- Amount Field -->
<div class="form-group col-sm-12 {{ $errors->has('amount') ? ' has-error' : '' }}">
                {!! Form::label('amount', 'Amount(USD):') !!}
                <div class="row">
                    <div class="col-sm-1 text-center"><span class="text-center"
                            style="position:relative; top:20px;font-size: 14px;font-weight:800">USD</span></div>
                    <div class="col-sm-11">
                        {!! Form::number('amount', old('amount'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                @if ($errors->has('amount'))
                <span class="help-block">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
                @endif
                </div>



                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block','style'=>'margin-left:-1px']) !!}
                </div>
