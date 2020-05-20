
<div class="form-group col-sm-12">
   <h2>1. Personal information</h2>
   <hr>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('religion', 'Religion:') !!}
    {!! Form::text('religion', null, ['class' => 'form-control']) !!}
</div>

<!-- Marital Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    {!! Form::select('marital_status', ['Single' => 'Single', 'Married' => 'Married'], null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">
<hr>
   <h2>2. Operational and situational questions</h2>
   <hr>
</div>


<!-- Q1 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q1_1', '-How would you manage All Trust beneficiaries regarding the on time loan repayment?') !!}
    {!! Form::textarea('q1_1', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q1 2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q1_2', '-what information/data would you focus on to forecast loan repayment abilities of the All Trust beneficiaries?') !!}
    {!! Form::textarea('q1_2', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q1 3 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q1_3', '-How would you assess underperforming beneficiaries and how would you deal with them?') !!}
    {!! Form::textarea('q1_3', null, ['class' => 'form-control','required'=>'required']) !!}
</div>


<!-- Q1 4 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q1_4', '-what would do to handle beneficiaries complaints?') !!}
    {!! Form::textarea('q1_4', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<div class="form-group col-sm-12">
<hr>
   <h2>3. Role-specific questions</h2>
   <hr>
</div>


<!-- Q2 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q2_1', '-what managerial/business software are you familiar with?') !!}
    {!! Form::textarea('q2_1', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q2 2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q2_2', '-what is your process of approving or rejecting a loan request?') !!}
    {!! Form::textarea('q2_2', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q2 3 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q2_3', '-what sector would you currently choose to invest in and why?') !!}
    {!! Form::textarea('q2_3', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<div class="form-group col-sm-12">
<hr>
   <h2>4. Behavioral questions</h2>
   <hr>
</div>

<!-- Q3 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q3_1', '-what is your greatest professional accomplishments?') !!}
    {!! Form::textarea('q3_1', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q3 2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q3_2', '-have you experienced any job/work conflicts?how did you handle them?') !!}
    {!! Form::textarea('q3_2', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q3 3 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q3_3', '- what do you understand by Integrity,and how does integrity affect the financial and well being of a business owner?') !!}
    {!! Form::textarea('q3_3', null, ['class' => 'form-control','required'=>'required']) !!}
</div>




<div class="form-group col-sm-12">
<hr>
   <h2>5. Managerial questions</h2>
   <hr>
</div>
<!-- Q4 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q4_1', '-What do you know about business Ethics/business principles') !!}
    {!! Form::textarea('q4_1', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q4 2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q4_2', '-How often would you monitor the  on going running of beneficiaries businesses?') !!}
    {!! Form::textarea('q4_2', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q4 3 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q4_3', '-on a regular basis,how often would you report to the Board of Directors about the recorded circumstances with beneficiaries') !!}
    {!! Form::textarea('q4_3', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q4 4 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q4_4', '-Do you have any bookkeeping and computer skills?') !!}
    {!! Form::textarea('q4_4', null, ['class' => 'form-control','required'=>'required']) !!}
</div>


<div class="form-group col-sm-12">
<hr>
   <h2>6. Human Rights principles questions</h2>
   <hr>
</div>


<!-- Q5 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q5_1', '- what is Fairness and impartiality to you?') !!}
    {!! Form::textarea('q5_1', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Q5 2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('q5_2', '-How do you think can Christian values contribute to the business growth?') !!}
    {!! Form::textarea('q5_2', null, ['class' => 'form-control','required'=>'required']) !!}
</div>




<!-- Q5 3 Field -->
<div class="form-group col-sm-12">
    {!! Form::label('q5_3', '-will you take oath to oppose yourself to the following while serving as a MicroFund Coordinator of All Trust.') !!}
    <br />
    <label class="radio-inline">
       A)  {!! Form::radio('q5_3', "Wrong doing", null, ['checked' => true]) !!} Wrong doing
    </label>
    <br />

    <label class="radio-inline">
        B) {!! Form::radio('q5_3', "Corruption", null) !!} Corruption
    </label>
    <br />
    <label class="radio-inline">
       C)  {!! Form::radio('q5_3', "Bribery", null) !!} Bribery
    </label>
    <br />
    <label class="radio-inline">
       D)  {!! Form::radio('q5_3', "Any financial impropriety", null) !!} Any financial impropriety
    </label>

</div>
<?php if(Auth::check()){ ?>
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>
<?php } ?>
<hr>
<?php if(Auth::check()){ ?>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('microFundApplications.index') }}" class="btn btn-default">Cancel</a>
</div>
<?php } ?>
<?php if(!Auth::check()){ ?>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
</div>
<?php } ?>

