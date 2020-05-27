

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $loanApplication->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $loanApplication->email }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $loanApplication->address }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $loanApplication->country }}</p>
</div>

<!-- Region Field -->
<div class="form-group">
    {!! Form::label('region', 'Region:') !!}
    <p>{{ $loanApplication->region }}</p>
</div>

<!-- National Identity Number Field -->
<div class="form-group">
    {!! Form::label('national_identity_number', 'National Identity Number:') !!}
    <p>{{ $loanApplication->national_identity_number }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $loanApplication->contact }}</p>
</div>

<!-- Religion Field -->
<div class="form-group">
    {!! Form::label('religion', 'Religion:') !!}
    <p>{{ $loanApplication->religion }}</p>
</div>

<!-- Marital Status Field -->
<div class="form-group">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    <p>{{ $loanApplication->marital_status }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $loanApplication->status }}</p>
</div>

<!-- Business Location Or Address Field -->
<div class="form-group">
    {!! Form::label('business_location_or_address', 'Business Location Or Address:') !!}
    <p>{{ $loanApplication->business_location_or_address }}</p>
</div>

<!-- Year Of Start-Up Field -->
<div class="form-group">
    {!! Form::label('year_of_start_up', 'Year Of Start-Up:') !!}
    <p>{{ $loanApplication->year_of_start_up }}</p>
</div>

<!-- Your Business Working Days Field -->
<div class="form-group">
    {!! Form::label('your_business_working_days', 'Your Business Working Days:') !!}
    <p>{{ $loanApplication->your_business_working_days }}</p>
</div>

<!-- Expected Average Customers Per Week Field -->
<div class="form-group">
    {!! Form::label('expected_average_customers_per_week', 'Expected Average Customers Per Week:') !!}
    <p>{{ $loanApplication->expected_average_customers_per_week }}</p>
</div>

<!-- Loan Size Field -->
<div class="form-group">
    {!! Form::label('loan_size', 'Loan Size:') !!}
    <p>{{ $loanApplication->loan_size }}</p>
</div>

<!-- Why This Loan Size Field -->
<div class="form-group">
    {!! Form::label('why_this_loan_size', 'Why This Loan Size:') !!}
    <p>{{ $loanApplication->why_this_loan_size }}</p>
</div>

<!-- What Makes You Eligible For The Loan Field -->
<div class="form-group">
    {!! Form::label('what_makes_you_eligible_for_the_loan', 'What Makes You Eligible For The Loan:') !!}
    <p>{{ $loanApplication->what_makes_you_eligible_for_the_loan }}</p>
</div>

<!-- Does Your Business Have The Ability To Make The Loan Repayment On Time Field -->
<div class="form-group">
    {!! Form::label('can_make_loan_repayment_on_time', 'Does Your Business Have The Ability To Make The Loan Repayment On Time:') !!}
    <p>{{ $loanApplication->can_make_loan_repayment_on_time }}</p>
</div>

<!-- What Makes You Move On In Life Field -->
<div class="form-group">
    {!! Form::label('what_makes_you_move_on_in_life', 'What Makes You Move On In Life:') !!}
    <p>{{ $loanApplication->what_makes_you_move_on_in_life }}</p>
</div>

<!-- What Is Your Ultimate Goal In Life Field -->
<div class="form-group">
    {!! Form::label('what_is_your_ultimate_goal_in_life', 'What Is Your Ultimate Goal In Life:') !!}
    <p>{{ $loanApplication->what_is_your_ultimate_goal_in_life }}</p>
</div>

<!-- What Is Integrity To You Field -->
<div class="form-group">
    {!! Form::label('what_is_integrity_to_you', 'What Is Integrity To You:') !!}
    <p>{{ $loanApplication->what_is_integrity_to_you }}</p>
</div>

<div class="form-group col-sm-12">
<h2>Additional information</h2>
</div>

<!-- Additional Q1 Field -->
<div class="form-group">
    {!! Form::label('additional_q1', 'Is your business morally, culturally,and ethically acceptable?') !!}
    <p>{{ $loanApplication->additional_q1 }}</p>
</div>

<!-- Additional Q2 Field -->
<div class="form-group">
    {!! Form::label('additional_q2', 'Will your business add value within an existing market and to the community?') !!}
    <p>{{ $loanApplication->additional_q2 }}</p>
</div>

<!-- Additional Q3 Field -->
<div class="form-group">
    {!! Form::label('additional_q3', 'Are you willing to attend the Training seminar session?') !!}
    <p>{{ $loanApplication->additional_q3 }}</p>
</div>

<!-- Additional Q4 Field -->
<div class="form-group">
    {!! Form::label('additional_q4', 'Is your business pleasing to God and does not apply any of the below?') !!}
    <p>{{ $loanApplication->additional_q4 }}</p>
</div>
<div class="form-group">
    {!! Form::label('additional_q5', 'Human exploitation,child labor, unfairness in pricing and payment of staffs?') !!}
    <p>{{ $loanApplication->additional_q5 }}</p>
</div>

<div class="form-group col-sm-12">
<h2>Attachments</h2>
</div>
<!-- Upload Passport  Photo Field -->
<div class="form-group">
   <p>
    <figure class="figure" style="width:25%">
            <img src="/thumbnail/{{$loanApplication->upload_passport_photo}}" style="width:100%" class="figure-img img-fluid rounded">

        </figure>
    </p>
</div>

<!-- National Identity Copy Field -->
<div class="form-group">
    {!! Form::label('national_identity_copy', 'National Identity Copy:') !!}
    <p>
    <iframe src="/documents/{{ $loanApplication->national_identity_copy }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>

<!-- Business Certificate Field -->
<div class="form-group">
    {!! Form::label('business_certificate', 'Business Certificate:') !!}
    <p>
    <iframe src="/documents/{{ $loanApplication->business_certificate }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>

<!-- Business Patent Field -->
<div class="form-group">
    {!! Form::label('business_patent', 'Business Patent:') !!}
    
    <p>
    <iframe src="/documents/{{ $loanApplication->business_patent }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
</div>

<!-- Any Recent Transactions Documents Field -->
<div class="form-group">
    {!! Form::label('any_recent_transactions_documents', 'Any Recent Transactions Documents:') !!}
    <p>
    <iframe src="/documents/{{ $loanApplication->any_recent_transactions_documents }}" width="800px" height="500px" frameborder="0"></iframe>
    </p>
    
</div>
<div class="form-group col-sm-12">
<h2>Formal Reference</h2>
</div>
<!-- Formal Reference Name Field -->
<div class="form-group">
    {!! Form::label('formal_reference_name', 'Name:') !!}
    <p>{{ $loanApplication->formal_reference_name }}</p>
</div>

<!-- Formal Reference Phone Field -->
<div class="form-group">
    {!! Form::label('formal_reference_phone', 'Phone:') !!}
    <p>{{ $loanApplication->formal_reference_phone }}</p>
</div>

<!-- Formal Reference Email Field -->
<div class="form-group">
    {!! Form::label('formal_reference_email', 'Email:') !!}
    <p>{{ $loanApplication->formal_reference_email }}</p>
</div>

<div class="form-group col-sm-12">
<h2>Alternative Contact</h2>
</div>
<!-- Alternative Contact Name Field -->
<div class="form-group">
    {!! Form::label('alternative_contact_name', 'Name:') !!}
    <p>{{ $loanApplication->alternative_contact_name }}</p>
</div>

<!-- Alternative Contact Email Field -->
<div class="form-group">
    {!! Form::label('alternative_contact_email', 'Email:') !!}
    <p>{{ $loanApplication->alternative_contact_email }}</p>
</div>

<!-- Alternative Contact Phone Field -->
<div class="form-group">
    {!! Form::label('alternative_contact_phone', 'Phone:') !!}
    <p>{{ $loanApplication->alternative_contact_phone }}</p>
</div>

<!-- Alternative Contact Id Number Field -->
<div class="form-group">
    {!! Form::label('alternative_contact_id_number', 'Id Number:') !!}
    <p>{{ $loanApplication->alternative_contact_id_number }}</p>
</div>

<div class="form-group col-sm-12">
<h2>Social Section</h2>
</div>
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $loanApplication->category }}</p>
</div>
<!-- Microfinance Center Field -->
<?php if( $loanApplication->center){ ?>
<div class="form-group">
    {!! Form::label('microfinance_center', 'Microfinance Center:') !!}
    <p>{{ $loanApplication->center? $loanApplication->center->name.' - '.$loanApplication->center->country :'' }}</p>
</div>
<?php } ?>

<?php if( $loanApplication->businessCategory){ ?>
<div class="form-group">
    {!! Form::label('business_category_id', 'Business Category:') !!}
    <p>{{ $loanApplication->businessCategory? $loanApplication->businessCategory->category:'' }}</p>
</div>
<?php } ?>

<?php if( $loanApplication->business_model_file){ ?>
<!-- Passport Size Photos Zipped Field -->
<div class="form-group">
{!! Form::label('business_model_file', "Download Business Model") !!}
<br>
    
    <a href="/documents/{{ $loanApplication->business_model_file }}" class="btn btn-info"> <i class="fa fa-download"></i> Download business model</a>
</div>



<?php } ?>

<div class="form-group">
    {!! Form::label('short_summary', 'Short Summary:') !!}
    <p>{{ $loanApplication->short_summary }}</p>
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!!html_entity_decode($loanApplication->description)!!}</p>
    
</div>
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $loanApplication->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $loanApplication->updated_at }}</p>
</div>

