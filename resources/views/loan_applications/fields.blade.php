<?php 
$centers= \App\Models\Center::where('status','Active')->orderBy('id','DESC')->get();
$businessCategories= \App\Models\BusinessCategory::where('used',1)->orderBy('id','DESC')->get();
?>
<div class="form-group col-sm-12">
    {!! Form::label('microfinance_center', 'Center:') !!}
    <select name="microfinance_center" id="microfinance_center" class="form-control">

        <?php if(isset($loanApplication->center)) {?>
        <option value="{{$loanApplication->center->id}}">
            {{$loanApplication->center->name}} - {{$loanApplication->center->country}}
        </option>
        <?php }else{ ?>
        <option value="0">Choose your Microfinance Center</option>
        <?php } ?>
        @foreach($centers as $center)
        <option value="{{$center->id}}">{{$center->name}} - {{$center->country}}</option>
        @endforeach
    </select>
</div>


<!-- Name Field -->
<div class="form-group col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>


<!-- Address Field -->
<div class="form-group col-sm-12 {{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
    @if ($errors->has('address'))
    <span class="help-block">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
    @endif
</div>

<!-- Country Field -->
<div class="form-group col-sm-12 {{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', old('country'), ['class' => 'form-control']) !!}
    @if ($errors->has('country'))
    <span class="help-block">
        <strong>{{ $errors->first('country') }}</strong>
    </span>
    @endif
</div>
<!-- Region Field -->
<div class="form-group col-sm-12 {{ $errors->has('region') ? ' has-error' : '' }}">
    {!! Form::label('region', 'Region:') !!}
    {!! Form::text('region', old('region'), ['class' => 'form-control']) !!}
    @if ($errors->has('region'))
    <span class="help-block">
        <strong>{{ $errors->first('region') }}</strong>
    </span>
    @endif
</div>

<!-- National Identity Number Field -->

<div class="form-group col-sm-12 {{ $errors->has('national_identity_number') ? ' has-error' : '' }}">
    {!! Form::label('national_identity_number', 'National Identity Number:') !!}
    {!! Form::text('national_identity_number', old('national_identity_number'), ['class' => 'form-control']) !!}
    @if ($errors->has('national_identity_number'))
    <span class="help-block">
        <strong>{{ $errors->first('national_identity_number') }}</strong>
    </span>
    @endif
</div>

<!-- Contact Field -->
<div class="form-group col-sm-12 {{ $errors->has('contact') ? ' has-error' : '' }}">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', old('contact'), ['class' => 'form-control']) !!}
    @if ($errors->has('contact'))
    <span class="help-block">
        <strong>{{ $errors->first('contact') }}</strong>
    </span>
    @endif
</div>

<!-- Religion Field -->

<div class="form-group col-sm-12 {{ $errors->has('religion') ? ' has-error' : '' }}">
    {!! Form::label('religion', 'Religion:') !!}
    {!! Form::text('religion', old('religion'), ['class' => 'form-control']) !!}
    @if ($errors->has('religion'))
    <span class="help-block">
        <strong>{{ $errors->first('religion') }}</strong>
    </span>
    @endif
</div>

<!-- Marital Status Field -->


<div class="form-group col-sm-12 {{ $errors->has('marital_status') ? ' has-error' : '' }}">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    {!! Form::select('marital_status', ['Single' => 'Single', 'Married' => 'Married'],old('marital_status'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('marital_status'))
    <span class="help-block">
        <strong>{{ $errors->first('marital_status') }}</strong>
    </span>
    @endif
</div>

<!-- Status Field -->

<div class="form-group col-sm-12 {{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Personal beneficiary' => 'Personal beneficiary', 'Enterprise' => 'Enterprise',
    'Cooperative' => 'Cooperative', 'Other' => 'Other'],old('marital_status'), ['class' => 'form-control']) !!}
    @if ($errors->has('status'))
    <span class="help-block">
        <strong>{{ $errors->first('status') }}</strong>
    </span>
    @endif
</div>

<!-- Business Location Or Address Field -->

<div class="form-group col-sm-12 {{ $errors->has('business_location_or_address') ? ' has-error' : '' }}">
    {!! Form::label('business_location_or_address', 'Business Location Or Address:') !!}
    {!! Form::text('business_location_or_address', old('business_location_or_address'), ['class' => 'form-control']) !!}
    @if ($errors->has('business_location_or_address'))
    <span class="help-block">
        <strong>{{ $errors->first('business_location_or_address') }}</strong>
    </span>
    @endif
</div>

<!-- Year Of Start-Up Field -->

<div class="form-group col-sm-12 {{ $errors->has('year_of_start_up') ? ' has-error' : '' }}">
    {!! Form::label('year_of_start_up', 'Year Of Start-Up:') !!}
    {!! Form::text('year_of_start_up', old('year_of_start_up'), ['class' => 'form-control']) !!}
    @if ($errors->has('year_of_start_up'))
    <span class="help-block">
        <strong>{{ $errors->first('year_of_start_up') }}</strong>
    </span>
    @endif
</div>

<!-- Your Business Working Days Field -->

<div class="form-group col-sm-12 {{ $errors->has('your_business_working_days') ? ' has-error' : '' }}">
    {!! Form::label('your_business_working_days', 'Your Business Working Days:') !!}
    {!! Form::text('your_business_working_days', old('your_business_working_days'), ['class' => 'form-control']) !!}
    @if ($errors->has('your_business_working_days'))
    <span class="help-block">
        <strong>{{ $errors->first('your_business_working_days') }}</strong>
    </span>
    @endif
</div>

<!-- Expected Average Customers Per Week Field -->
<div class="form-group col-sm-12 {{ $errors->has('expected_average_customers_per_week') ? ' has-error' : '' }}">
    {!! Form::label('expected_average_customers_per_week', 'Expected Average Customers Per Week:') !!}
    {!! Form::text('expected_average_customers_per_week', old('expected_average_customers_per_week'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('expected_average_customers_per_week'))
    <span class="help-block">
        <strong>{{ $errors->first('expected_average_customers_per_week') }}</strong>
    </span>
    @endif
</div>

<!-- Loan Size Field -->
<div class="form-group col-sm-12 {{ $errors->has('loan_size') ? ' has-error' : '' }}">
    {!! Form::label('loan_size', 'Loan Size:') !!}
    {!! Form::text('loan_size', old('loan_size'), ['class' => 'form-control']) !!}
    @if ($errors->has('loan_size'))
    <span class="help-block">
        <strong>{{ $errors->first('loan_size') }}</strong>
    </span>
    @endif
</div>

<!-- Why This Loan Size Field -->

<div class="form-group col-sm-12 {{ $errors->has('why_this_loan_size') ? ' has-error' : '' }}">
    {!! Form::label('why_this_loan_size', 'Why This Loan Size?') !!}
    {!! Form::textarea('why_this_loan_size', old('why_this_loan_size'), ['class' => 'form-control']) !!}
    @if ($errors->has('why_this_loan_size'))
    <span class="help-block">
        <strong>{{ $errors->first('why_this_loan_size') }}</strong>
    </span>
    @endif
</div>

<!-- What Makes You Eligible For The Loan Field -->
<div class="form-group col-sm-12 {{ $errors->has('what_makes_you_eligible_for_the_loan') ? ' has-error' : '' }}">
    {!! Form::label('what_makes_you_eligible_for_the_loan', 'What Makes You Eligible For The Loan?') !!}
    {!! Form::textarea('what_makes_you_eligible_for_the_loan', old('what_makes_you_eligible_for_the_loan'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('what_makes_you_eligible_for_the_loan'))
    <span class="help-block">
        <strong>{{ $errors->first('what_makes_you_eligible_for_the_loan') }}</strong>
    </span>
    @endif
</div>

<!-- Does Your Business Have The Ability To Make The Loan Repayment On Time Field -->
<div class="form-group col-sm-12 {{ $errors->has('can_make_loan_repayment_on_time') ? ' has-error' : '' }}">
    {!! Form::label('can_make_loan_repayment_on_time', 'Does Your Business Have The Ability To Make The Loan Repayment
    On Time?') !!}
    {!! Form::textarea('can_make_loan_repayment_on_time', old('can_make_loan_repayment_on_time'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('can_make_loan_repayment_on_time'))
    <span class="help-block">
        <strong>{{ $errors->first('can_make_loan_repayment_on_time') }}</strong>
    </span>
    @endif
</div>

<!-- What Makes You Move On In Life Field -->
<div class="form-group col-sm-12 {{ $errors->has('what_makes_you_move_on_in_life') ? ' has-error' : '' }}">
    {!! Form::label('what_makes_you_move_on_in_life', 'What Makes You Move On In Life?') !!}
    {!! Form::textarea('what_makes_you_move_on_in_life', old('what_makes_you_move_on_in_life'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('what_makes_you_move_on_in_life'))
    <span class="help-block">
        <strong>{{ $errors->first('what_makes_you_move_on_in_life') }}</strong>
    </span>
    @endif
</div>

<!-- What Is Your Ultimate Goal In Life Field -->

<div class="form-group col-sm-12 {{ $errors->has('what_is_your_ultimate_goal_in_life') ? ' has-error' : '' }}">
    {!! Form::label('what_is_your_ultimate_goal_in_life', 'What Is Your Ultimate Goal In Life?') !!}
    {!! Form::textarea('what_is_your_ultimate_goal_in_life', old('what_is_your_ultimate_goal_in_life'), ['class' =>
    'form-control']) !!}
    @if ($errors->has('what_is_your_ultimate_goal_in_life'))
    <span class="help-block">
        <strong>{{ $errors->first('what_is_your_ultimate_goal_in_life') }}</strong>
    </span>
    @endif
</div>

<!-- What Is Integrity To You Field -->
<div class="form-group col-sm-12 {{ $errors->has('what_is_integrity_to_you') ? ' has-error' : '' }}">
    {!! Form::label('what_is_integrity_to_you', 'What Is Integrity To You?') !!}
    {!! Form::textarea('what_is_integrity_to_you', old('what_is_integrity_to_you'), ['class' => 'form-control']) !!}
    @if ($errors->has('what_is_integrity_to_you'))
    <span class="help-block">
        <strong>{{ $errors->first('what_is_integrity_to_you') }}</strong>
    </span>
    @endif
</div>


<div class="form-group col-sm-12">
    <h2>Additional information</h2>
</div>
<!-- Additional Q1 Field -->

<div class="form-group col-sm-12 {{ $errors->has('additional_q1') ? ' has-error' : '' }}">
    {!! Form::label('additional_q1', 'Is your business morally, culturally,and ethically acceptable?') !!}
    {!! Form::select('additional_q1', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
    @if ($errors->has('additional_q1'))
    <span class="help-block">
        <strong>{{ $errors->first('additional_q1') }}</strong>
    </span>
    @endif
</div>

<!-- Additional Q2 Field -->
<div class="form-group col-sm-12 {{ $errors->has('additional_q2') ? ' has-error' : '' }}">
    {!! Form::label('additional_q2', 'Will your business add value within an existing market and to the community?') !!}
    {!! Form::select('additional_q2', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
    @if ($errors->has('additional_q2'))
    <span class="help-block">
        <strong>{{ $errors->first('additional_q2') }}</strong>
    </span>
    @endif
</div>

<!-- Additional Q3 Field -->
<div class="form-group col-sm-12 {{ $errors->has('additional_q3') ? ' has-error' : '' }}">
    {!! Form::label('additional_q3', 'Are you willing to attend the Training seminar session?') !!}
    {!! Form::select('additional_q3', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
    @if ($errors->has('additional_q3'))
    <span class="help-block">
        <strong>{{ $errors->first('additional_q3') }}</strong>
    </span>
    @endif
</div>

<!-- Additional Q4 Field -->
<div class="form-group col-sm-12 {{ $errors->has('additional_q4') ? ' has-error' : '' }}">
    {!! Form::label('additional_q4', 'Is your business pleasing to God and does not apply any of the below?') !!}
    {!! Form::select('additional_q4', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
    @if ($errors->has('additional_q4'))
    <span class="help-block">
        <strong>{{ $errors->first('additional_q4') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12 {{ $errors->has('additional_q5') ? ' has-error' : '' }}">
    {!! Form::label('additional_q5', 'Human exploitation,child labor, unfairness in pricing and payment of staffs?') !!}
    {!! Form::select('additional_q5', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
    @if ($errors->has('additional_q5'))
    <span class="help-block">
        <strong>{{ $errors->first('additional_q5') }}</strong>
    </span>
    @endif
</div>


<div class="form-group col-sm-12">
    <h2>Formal Reference</h2>
</div>
<!-- Formal Reference Name Field -->
<div class="form-group col-sm-12 {{ $errors->has('formal_reference_name') ? ' has-error' : '' }}">
    {!! Form::label('formal_reference_name', 'Name:') !!}
    {!! Form::text('formal_reference_name', old('formal_reference_name'), ['class' => 'form-control']) !!}
    @if ($errors->has('formal_reference_name'))
    <span class="help-block">
        <strong>{{ $errors->first('formal_reference_name') }}</strong>
    </span>
    @endif
</div>


<!-- Formal Reference Email Field -->
<div class="form-group col-sm-12 {{ $errors->has('formal_reference_email') ? ' has-error' : '' }}">
    {!! Form::label('formal_reference_email', 'Email:') !!}
    {!! Form::email('formal_reference_email', old('formal_reference_email'), ['class' => 'form-control']) !!}
    @if ($errors->has('formal_reference_email'))
    <span class="help-block">
        <strong>{{ $errors->first('formal_reference_email') }}</strong>
    </span>
    @endif
</div>

<!-- Formal Reference Phone Field -->
<div class="form-group col-sm-12 {{ $errors->has('formal_reference_phone') ? ' has-error' : '' }}">
    {!! Form::label('formal_reference_phone', 'Phone:') !!}
    {!! Form::text('formal_reference_phone', old('formal_reference_phone'), ['class' => 'form-control']) !!}
    @if ($errors->has('formal_reference_phone'))
    <span class="help-block">
        <strong>{{ $errors->first('formal_reference_phone') }}</strong>
    </span>
    @endif
</div>


<div class="form-group col-sm-12">
    <h2>Alternative Contact</h2>
</div>


<!-- Alternative Contact Name Field -->
<div class="form-group col-sm-12 {{ $errors->has('alternative_contact_name') ? ' has-error' : '' }}">
    {!! Form::label('alternative_contact_name', 'Name:') !!}
    {!! Form::text('alternative_contact_name', old('alternative_contact_name'), ['class' => 'form-control']) !!}
    @if ($errors->has('alternative_contact_name'))
    <span class="help-block">
        <strong>{{ $errors->first('alternative_contact_name') }}</strong>
    </span>
    @endif
</div>

<!-- Alternative Contact Email Field -->

<div class="form-group col-sm-12 {{ $errors->has('alternative_contact_email') ? ' has-error' : '' }}">
    {!! Form::label('alternative_contact_email', 'Email:') !!}
    {!! Form::email('alternative_contact_email', old('alternative_contact_email'), ['class' => 'form-control']) !!}
    @if ($errors->has('alternative_contact_email'))
    <span class="help-block">
        <strong>{{ $errors->first('alternative_contact_email') }}</strong>
    </span>
    @endif
</div>

<!-- Alternative Contact Phone Field -->

<div class="form-group col-sm-12 {{ $errors->has('alternative_contact_phone') ? ' has-error' : '' }}">
    {!! Form::label('alternative_contact_phone', 'Phone:') !!}
    {!! Form::text('alternative_contact_phone', old('alternative_contact_phone'), ['class' => 'form-control']) !!}
    @if ($errors->has('alternative_contact_phone'))
    <span class="help-block">
        <strong>{{ $errors->first('alternative_contact_phone') }}</strong>
    </span>
    @endif
</div>




<!-- Alternative Contact Id Number Field -->

<div class="form-group col-sm-12 {{ $errors->has('alternative_contact_id_number') ? ' has-error' : '' }}">
    {!! Form::label('alternative_contact_id_number', 'Id Number:') !!}
    {!! Form::text('alternative_contact_id_number', old('alternative_contact_id_number'), ['class' => 'form-control'])
    !!}
    @if ($errors->has('alternative_contact_id_number'))
    <span class="help-block">
        <strong>{{ $errors->first('alternative_contact_id_number') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12">
    <h2>Attachments</h2>
</div>
<!-- Upload Passport  Photo Field -->


<div class="form-group col-sm-12 {{ $errors->has('upload_passport_photo') ? ' has-error' : '' }}">
    {!! Form::label('upload_passport_photo', 'Upload your passport photo') !!}<br />
    {!! Form::file('upload_passport_photo') !!}
    @if ($errors->has('upload_passport_photo'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('upload_passport_photo') }}</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- National Identity Copy Field -->

<div class="form-group col-sm-12 {{ $errors->has('national_identity_copy') ? ' has-error' : '' }}">
    {!! Form::label('national_identity_copy', 'National Identity Copy.(Allow Only Pdf)') !!}<br />
    {!! Form::file('national_identity_copy') !!}
    @if ($errors->has('national_identity_copy'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('national_identity_copy') }}</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Business Certificate Field -->

<div class="form-group col-sm-12 {{ $errors->has('business_certificate') ? ' has-error' : '' }}">
    {!! Form::label('business_certificate', 'Attach your Business Certificate.(Allow Only Pdf)') !!}<br />
    {!! Form::file('business_certificate') !!}
    @if ($errors->has('business_certificate'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('business_certificate') }}</strong>
    </span>
    @endif
</div>

<div class="clearfix"></div>

<!-- Business Patent Field -->

<div class="form-group col-sm-12 {{ $errors->has('business_patent') ? ' has-error' : '' }}">
    {!! Form::label('business_patent', 'Attach your Business Patent.(Allow Only Pdf)') !!}<br />
    {!! Form::file('business_patent') !!}
    @if ($errors->has('business_patent'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('business_patent') }}</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Any Recent Transactions Documents Field -->

<div class="form-group col-sm-12 {{ $errors->has('any_recent_transactions_documents') ? ' has-error' : '' }}">
    {!! Form::label('any_recent_transactions_documents', 'Attach Any Recent Transactions Documents.(Allow Only Pdf)')
    !!}<br />
    {!! Form::file('any_recent_transactions_documents') !!}
    @if ($errors->has('any_recent_transactions_documents'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('any_recent_transactions_documents') }}</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>

<!-- Session Id Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>


<?php if(Auth::check()){ ?>

<div class="form-group col-sm-12">
    <hr>
    <h2>Social Section</h2>
    <hr>
</div>

<div class="form-group col-sm-12 {{ $errors->has('lender_initial_target') ? ' has-error' : '' }}">
    {!! Form::label('lender_initial_target', 'Lender initial target:') !!}
    {!! Form::text('lender_initial_target', old('lender_initial_target'), ['class' => 'form-control']) !!}
    @if ($errors->has('lender_initial_target'))
    <span class="help-block">
        <strong>{{ $errors->first('lender_initial_target') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12 {{ $errors->has('donor_initial_target') ? ' has-error' : '' }}">
    {!! Form::label('donor_initial_target', 'Donor initial target:') !!}
    {!! Form::text('donor_initial_target', old('donor_initial_target'), ['class' => 'form-control']) !!}
    @if ($errors->has('donor_initial_target'))
    <span class="help-block">
        <strong>{{ $errors->first('donor_initial_target') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::select('status', ['RWF' => 'RWF', 'USD' => 'USD'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
{!! Form::select('category', ['' => 'Filter By Funding Status'
                ,'Enterprises-Awaiting-Funding' => 'Enterprises-Awaiting-Funding',
                 'Diaspora-Funded-Enterprises' => 'Diaspora-Funded-Enterprises',
                 'Fully-Funded-Enterprises' => 'Fully-Funded-Enterprises'],
                  null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('business_category_id', 'Business Category:') !!}
    <select name="business_category_id" id="business_category_id" class="form-control" required>

        <?php if(isset($loanApplication->businessCategory)) {?>
        <option value="{{$loanApplication->businessCategory->id}}">
            {{$loanApplication->businessCategory->category}}</option>
        <?php }else{ ?>
        <option value="">Choose Business Category</option>
        <?php } ?>
        @foreach($businessCategories as $businessCategory)
        <option value="{{$businessCategory->id}}"> {{$businessCategory->category}}</option>
        @endforeach
    </select>
</div>
<!-- What Is Integrity To You Field -->
<div class="form-group col-sm-12 {{ $errors->has('short_summary') ? ' has-error' : '' }}">
    {!! Form::label('short_summary', 'Write a short Summary (MAX words - 500)') !!}
    {!! Form::textarea('short_summary', old('short_summary'), ['class' => 'form-control','required'=>'required']) !!}
    @if ($errors->has('short_summary'))
    <span class="help-block">
        <strong>{{ $errors->first('short_summary') }}</strong>
    </span>
    @endif
</div>

<!-- What Is Integrity To You Field -->
<div class="form-group col-sm-12 {{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Write a description') !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control','id'=>'textarea']) !!}
    @if ($errors->has('description'))
    <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-6 {{ $errors->has('business_model_file') ? ' has-error' : '' }}">
    {!! Form::label('business_model_file', 'Upload a business model file (only excel required)') !!}<br />
    {!! Form::file('business_model_file') !!}
    @if ($errors->has('business_model_file'))<br />
    <span class="help-block">
        <strong>{{ $errors->first('business_model_file') }}</strong>
    </span>
    @endif
</div>

<!-- 'bootstrap / Toggle Switch Published Field' -->
<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
<div class="form-group col-sm-6 mr-5 ">
    {!! Form::label('approved', 'Approved?') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approved', 0) !!}
        {!! Form::checkbox('approved', 1, null, ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Enterprise'){ ?>

<div class="form-group col-sm-6 mr-5">
    <?php if(isset($loanApplication) && $loanApplication->approved) { ?>
    <div class="alert alert-success show mt-5  mr-5  text-center title" role="alert">
        <strong>APPLICATION APPROVED</strong>
    </div>

    <?php }else{ ?>

    <div class="alert alert-warning show mt-5 mr-5 text-center title" role="alert">
        <strong>APPLICATION PENDING</strong>
    </div>
    <?php }?>
</div>

<?php }?>

<?php } ?>

<?php if(Auth::check()){ ?>
<!-- Submit Field -->

<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
    </div>
<div class="form-group container">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
        <div class="col-sm-6">
            <a href="{{ route('loanApplications.index') }}" class="btn btn-default btn-block">Cancel</a>

        </div>
    </div>
</div>
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Enterprise'){ ?>

<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>
<?php }?>

<?php }else{
?>
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>

<?php } ?>
