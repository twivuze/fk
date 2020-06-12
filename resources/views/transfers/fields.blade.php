<?php 
$currencies=\App\Models\Currency::orderBy('id','DESC')->get();
$periods=\App\Models\Period::orderBy('id','DESC')->get();
?>
<div class="col-sm-6">
<!-- Type Field -->
<?php if(!isset($transfer)){?>
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['' => '', 'Loan' => 'Loan', 'Donation' => 'Donation'], 
    null, ['class' => 'form-control',"onchange"=>"transferType(this.value);"]) !!}
</div>
<?php } ?>
<?php if(!isset($transfer)){?>
<!-- Code Field -->
<div class="form-group showBox" style="display:{{!isset($transfer)?'none':'block'}};">
    {!! Form::label('code', 'Enter Enterprise Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control',
        "onchange"=>"viewEnterprise(this.value,'Transfer');",
     "onkeyup"=>"viewEnterprise(this.value,'Transfer');",
    'id'=>'current_code']) !!}
</div>
<?php }else{ ?>
    <input type="hidden" value="{{!isset($transfer)?'':$transfer->type}}" name="type" id="type" class="type">
    <?php } ?>

<div class="Transfer" style="display:{{!isset($transfer)?'none':'block'}};">
<!-- Enterprise Field -->


<!-- Amount Field -->
<div class="form-group ">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount1', !isset($transfer)?null:$transfer->amount, ['class' => 'form-control funds','disabled'=>true]) !!}
    {!! Form::hidden('amount', !isset($transfer)?null:$transfer->amount, ['class' => 'form-control funds']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    <select name="currency" id="currency" value="{{!isset($transfer)?null:$transfer->currency}}" class="form-control">

    <option value="{{!isset($transfer)?'':$transfer->currency}}">
    {{!isset($transfer)?'Choose Currency':$transfer->currency}}
    </option>

@foreach($currencies as $currency)
<option value="{{$currency->currency}}">{{$currency->currency}}</option>
@endforeach
</select>
</div>

<!-- Grace Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grace_period', 'Grace Period:') !!}
    {!! Form::select('grace_period', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control',
        "onchange"=>"gracePeriod(this.value);"]) !!}
</div>

<!-- Grace Period From Field -->
<div class="grace_period" style="display: none;">

<div class="form-group col-sm-6">
    {!! Form::label('grace_period_from1', 'Grace Period From:') !!}
    {!! Form::text('grace_period_from1', date('Y-m-d'), ['class' => 'form-control','disabled'=>true,'id'=>'grace_period_from']) !!}
    {!! Form::hidden('grace_period_from', date('Y-m-d'), ['class' => 'form-control','id'=>'grace_period_from']) !!}
</div>



<!-- Grace Period To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grace_period_to', 'Grace Period To:') !!}
    {!! Form::text('grace_period_to', null, ['class' => 'form-control','id'=>'grace_period_to']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#grace_period_to').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

</div>

<!-- Instalment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instalment', 'Instalment:') !!}
  
    <select name="instalment" id="instalment" value="old('instalment')" class="form-control">

    <option value="{{!isset($transfer)?'':$transfer->instalmentPeriod?$transfer->instalmentPeriod->id:''}}">
    <?php if(!isset($transfer)){
        echo "Choose Instalment";
    }else{
      if($transfer->instalmentPeriod){
          echo $transfer->instalmentPeriod->name;
      }else{
        echo "Choose Instalment";
      }  
    } ?>

    </option>

@foreach($periods as $period)
<option value="{{$period->id}}">{{$period->name}}</option>
@endforeach
</select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('recover_period', 'Recover Period:') !!}
    <select name="recover_period" id="recover_period" value="old('recover_period')" class="form-control">

    <option value="{{!isset($transfer)?'':$transfer->recoverPeriod?$transfer->recoverPeriod->id:''}}">
    <?php if(!isset($transfer)){
        echo "Choose Recover Period";
    }else{
      if($transfer->recoverPeriod){
          echo $transfer->recoverPeriod->name;
      }else{
        echo "Choose Recover Period";
      }  
    } ?>
    </option>
   
@foreach($periods as $period)
<option value="{{$period->id}}">{{$period->name}}</option>
@endforeach
</select>
</div>

<!-- Reminder Days Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reminder_days', 'Reminder Days:') !!}
    {!! Form::number('reminder_days', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rate', 'Rate:') !!}
    {!! Form::number('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Enterprise Id Field -->
<input type="hidden" value="{{!isset($transfer)?'':$transfer->enterprise_id}}" name="enterprise_id" id="enterprise_id" class="enterprise_id">
<input type="hidden" value="{{!isset($transfer)?'':$transfer->code}}" name="code" id="code" class="code">
<input type="hidden" value="{{!isset($transfer)?'':$transfer->enterprise}}" name="enterprise" id="enterprise" class="enterprise">

</div>
</div>

<div class="form-group col-sm-6">
<div style="margin-left:50px" id="change_response_code"></div>
<div class="remainfunds"></div>
<hr>

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('transfers.index') }}" class="btn btn-default">Cancel</a>
</div>
