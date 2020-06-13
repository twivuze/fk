<!-- Loan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('loan_id', 'Loan Id:') !!}
    {!! Form::text('loan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Enterprise Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enterprise_id', 'Enterprise Id:') !!}
    {!! Form::text('enterprise_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repay_code', 'Repay Code:') !!}
    {!! Form::text('repay_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['current' => 'current', 'pending' => 'pending', 'successful' => 'successful', 'outstanding' => 'outstanding'], null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', null, ['class' => 'form-control']) !!}
</div>

<!-- Repayer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repayer', 'Repayer:') !!}
    {!! Form::text('repayer', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repay_date', 'Repay Date:') !!}
    {!! Form::text('repay_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Next Repay Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_repay_date', 'Next Repay Date:') !!}
    {!! Form::text('next_repay_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Interest Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interest_amount', 'Interest Amount:') !!}
    {!! Form::text('interest_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Without Interst Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_without_interst', 'Amount Without Interst:') !!}
    {!! Form::text('amount_without_interst', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    {!! Form::text('total_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Reminder Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repay_reminder_day', 'Repay Reminder Day:') !!}
    {!! Form::text('repay_reminder_day', null, ['class' => 'form-control']) !!}
</div>

<!-- Center Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('center_id', 'Center Id:') !!}
    {!! Form::text('center_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Did Repay Field -->
<div class="form-group col-sm-6">
    {!! Form::label('did_repay', 'Did Repay:') !!}
    {!! Form::text('did_repay', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Loan Remain Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_loan_remain_amount', 'Total Loan Remain Amount:') !!}
    {!! Form::text('total_loan_remain_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('repayments.index') }}" class="btn btn-default">Cancel</a>
</div>
