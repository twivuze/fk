<!-- Id Field -->


<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <b>{{ $transfer->type }}</b>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <b>{{ $transfer->code }}</b>
</div>

<!-- Enterprise Field -->
<div class="form-group">
    {!! Form::label('enterprise', 'Enterprise:') !!}
    <b>{{ $transfer->enterprise }}</b>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <b>{{ $transfer->amount }}</b>
</div>

<!-- Currency Field -->
<div class="form-group">
    {!! Form::label('currency', 'Currency:') !!}
    <b>{{ $transfer->currency }}</b>
</div>

<!-- Rate Field -->
<div class="form-group">
    {!! Form::label('rate', 'Rate:') !!}
    <b>{{ $transfer->rate }}%</b>
</div>


<!-- Grace Period Field -->
<div class="form-group">
    {!! Form::label('grace_period', 'Grace Period:') !!}
    <b>{{ $transfer->grace_period }}</b>
</div>

<!-- Grace Period From Field -->
<div class="form-group">
    {!! Form::label('grace_period_from', 'Grace Period From:') !!}
    <b>{{ $transfer->grace_period_from }}</b>
</div>

<!-- Grace Period To Field -->
<div class="form-group">
    {!! Form::label('grace_period_to', 'Grace Period To:') !!}
    <b>{{ $transfer->grace_period_to }}</b>
</div>

<!-- Instalment Field -->
<div class="form-group">
    {!! Form::label('recoverPeriod', 'Recover Period:') !!}
   
   
    <?php 
    $interset = new \App\User();
     $result = $interset->interestProcessing($transfer);
     ?>

        interset of  <b>{{ $transfer->currency }} {{ $result['totalRecover']}} per </b>  <b>{{ $transfer->recoverPeriod->name }}</b>
</div>

<!-- Instalment Field -->
<div class="form-group">
    {!! Form::label('instalment', 'Instalment:') !!}
    <b>{{ $transfer->instalmentPeriod->name }}</b>
 

   interset of  <b>{{ $transfer->currency }} {{ $result['totalInstalment']}} per </b>  <b>{{ $transfer->instalmentPeriod->name }}</b>


     
</div>




<!-- Reminder Days Field -->
<div class="form-group">
    {!! Form::label('reminder_days', 'Reminder Days:') !!}
    <b>{{ $transfer->reminder_days }}</b>
</div>



<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <b>{{ $transfer->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <b>{{ $transfer->updated_at }}</b>
</div>

