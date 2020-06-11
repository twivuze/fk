

<div class="form-group col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['' => '','Loan' => 'Loan', 'Donation' => 'Donation'],  old('type'), ['class' => 'form-control',
    "onchange"=>"fundType(this.value);"]) !!}
</div>

<div class="form-group col-sm-12 showBox" style="display: none;">
    {!! Form::label('code', 'Enter Enterprise Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control',
        "onchange"=>"findEnterprise(this.value,'InternalFunder');",
     "onkeyup"=>"findEnterprise(this.value,'InternalFunder');",'id'=>'current_code']) !!}
</div>

<div style="margin-left:50px" id="change_response_code"></div>

<div class="InternalFunder" style="display: none;">
<div class="remainfunds"></div>
<hr>

<!-- Fund Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fund', 'Fund:') !!}
    {!! Form::number('fund', old('type'), ['class' => 'form-control funds', "onkeyup"=>"remainFund(this.value);",]) !!}
</div>
<input type="hidden" value="" name="enterprise_id" id="enterprise_id" class="enterprise_id">
<input type="hidden" value="" name="code" id="code" class="code">
<input type="hidden" value="" name="enterprise" id="enterprise" class="enterprise">
<input type="hidden" value="" name="currency" id="currency" class="currency">


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('internalFunders.index') }}" class="btn btn-default">Cancel</a>
</div>

</div>
