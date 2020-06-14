<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $repayment->id }}</p>
</div>

<!-- Loan Id Field -->
<div class="form-group">
    {!! Form::label('loan_id', 'Loan Id:') !!}
    <p>{{ $repayment->loan_id }}</p>
</div>

<!-- Enterprise Id Field -->
<div class="form-group">
    {!! Form::label('enterprise_id', 'Enterprise Id:') !!}
    <p>{{ $repayment->enterprise_id }}</p>
</div>

<!-- Repay Code Field -->
<div class="form-group">
    {!! Form::label('repay_code', 'Repay Code:') !!}
    <p>{{ $repayment->repay_code }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $repayment->status }}</p>
</div>

<!-- Currency Field -->
<div class="form-group">
    {!! Form::label('currency', 'Currency:') !!}
    <p>{{ $repayment->currency }}</p>
</div>

<!-- Repayer Field -->
<div class="form-group">
    {!! Form::label('repayer', 'Repayer:') !!}
    <p>{{ $repayment->repayer }}</p>
</div>

<!-- Repay Date Field -->
<div class="form-group">
    {!! Form::label('repay_date', 'Repay Date:') !!}
    <p>{{ $repayment->repay_date }}</p>
</div>

<!-- Next Repay Date Field -->
<div class="form-group">
    {!! Form::label('next_repay_date', 'Next Repay Date:') !!}
    <p>{{ $repayment->next_repay_date }}</p>
</div>

<!-- Interest Amount Field -->
<div class="form-group">
    {!! Form::label('interest_amount', 'Interest Amount:') !!}
    <p>{{ $repayment->interest_amount }}</p>
</div>

<!-- Amount Without Interst Field -->
<div class="form-group">
    {!! Form::label('amount_without_interst', 'Amount Without Interest:') !!}
    <p>{{ $repayment->amount_without_interst }}</p>
</div>

<!-- Total Amount Field -->
<div class="form-group">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    <p>{{ $repayment->total_amount }}</p>
</div>

<!-- Repay Reminder Day Field -->
<div class="form-group">
    {!! Form::label('repay_reminder_day', 'Repay Reminder Day:') !!}
    <p>{{ $repayment->repay_reminder_day }}</p>
</div>

<!-- Center Id Field -->
<div class="form-group">
    {!! Form::label('center_id', 'Center Id:') !!}
    <p>{{ $repayment->center_id }}</p>
</div>

<!-- Did Repay Field -->
<div class="form-group">
    {!! Form::label('did_repay', 'Did Repay:') !!}
    <p>{{ $repayment->did_repay }}</p>
</div>

<!-- Total Loan Remain Amount Field -->
<div class="form-group">
    {!! Form::label('total_loan_remain_amount', 'Total Loan Remain Amount:') !!}
    <p>{{ $repayment->total_loan_remain_amount }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $repayment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $repayment->updated_at }}</p>
</div>

