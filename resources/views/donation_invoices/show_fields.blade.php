<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $donationInvoice->id }}</p>
</div>

<!-- Donor Id Field -->
<div class="form-group">
    {!! Form::label('donor_id', 'Donor Id:') !!}
    <p>{{ $donationInvoice->donor_id }}</p>
</div>

<!-- Enterprise Id Field -->
<div class="form-group">
    {!! Form::label('enterprise_id', 'Enterprise Id:') !!}
    <p>{{ $donationInvoice->enterprise_id }}</p>
</div>

<!-- Donor Field -->
<div class="form-group">
    {!! Form::label('donor', 'Donor:') !!}
    <p>{{ $donationInvoice->donor }}</p>
</div>

<!-- Enterprise Field -->
<div class="form-group">
    {!! Form::label('enterprise', 'Enterprise:') !!}
    <p>{{ $donationInvoice->enterprise }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $donationInvoice->amount }}</p>
</div>

<!-- Center Id Field -->
<div class="form-group">
    {!! Form::label('center_id', 'Center Id:') !!}
    <p>{{ $donationInvoice->center_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $donationInvoice->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $donationInvoice->updated_at }}</p>
</div>

