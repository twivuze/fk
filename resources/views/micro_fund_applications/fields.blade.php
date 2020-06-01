
<?php 
$centers= \App\Models\Center::where('status','Active')->orderBy('id','DESC')->get();
?>
<div class="form-group col-sm-12">
    {!! Form::label('microfinance_center', 'Center:') !!}
    <select name="microfinance_center" id="microfinance_center" value="old('microfinance_center')" class="form-control">

        <?php if(isset($microFundApplication->center)) {?>
        <option value="{{$microFundApplication->center->id}}">
            {{$microFundApplication->center->name}} - {{$microFundApplication->center->country}}
        </option>
        <?php }else{ ?>
        <option value="0">Choose your Microfinance Center</option>
        <?php } ?>
        @foreach($centers as $center)
        <option value="{{$center->id}}">{{$center->name}} - {{$center->country}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
   <h2>1. Personal information</h2>
   <hr>
</div>

<!-- Full Name Field -->

<div class="form-group col-sm-12 {{ $errors->has('full_name') ? ' has-error' : '' }}">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', old('full_name'), ['class' => 'form-control']) !!}
    @if ($errors->has('full_name'))
    <span class="help-block">
        <strong>{{ $errors->first('full_name') }}</strong>
    </span>
    @endif
</div>

<!-- Phone Number Field -->
 
<div class="form-group col-sm-12 {{ $errors->has('phone_number') ? ' has-error' : '' }}">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control']) !!}
    @if ($errors->has('phone_number'))
    <span class="help-block">
        <strong>{{ $errors->first('phone_number') }}</strong>
    </span>
    @endif
</div>
<!-- Email Field -->
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
<div class="form-group col-sm-12">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    {!! Form::select('marital_status', ['Single' => 'Single', 'Married' => 'Married'], old('marital_status'), ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], old('gender'), ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">
<hr>
   <h2>2. Operational and situational questions</h2>
   <hr>
</div>


<!-- Q1 1 Field -->
<div class="form-group col-sm-12 col-lg-12  {{ $errors->has('q1_1') ? ' has-error' : '' }}">
    {!! Form::label('q1_1', 'How would you manage All Trust beneficiaries regarding the on time loan repayment?') !!}
    {!! Form::textarea('q1_1', old('q1_1'), ['class' => 'form-control']) !!}
    @if ($errors->has('q1_1'))
    <span class="help-block">
        <strong>How would you manage All Trust beneficiaries regarding the on time loan repayment?</strong>
    </span>
    @endif
</div>

<!-- Q1 2 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q1_2') ? ' has-error' : '' }} ">
    {!! Form::label('q1_2', 'What information/data would you focus on to forecast loan repayment abilities of the All Trust beneficiaries?') !!}
    {!! Form::textarea('q1_2', old('q1_2'), ['class' => 'form-control']) !!}
  
    @if ($errors->has('q1_2'))
    <span class="help-block">
        <strong>What information/data would you focus on to forecast loan repayment abilities of the All Trust beneficiaries?</strong>
    </span>
    @endif
</div>

<!-- Q1 3 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q1_3') ? ' has-error' : '' }}">
    {!! Form::label('q1_3', 'How would you assess underperforming beneficiaries and how would you deal with them?') !!}
    {!! Form::textarea('q1_3', old('q1_3'), ['class' => 'form-control']) !!}
   
    @if ($errors->has('q1_3'))
    <span class="help-block">
        <strong>How would you assess underperforming beneficiaries and how would you deal with them?</strong>
    </span>
    @endif
</div>


<!-- Q1 4 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q1_4') ? ' has-error' : '' }}">
    {!! Form::label('q1_4', 'What would do to handle beneficiaries complaints?') !!}
    {!! Form::textarea('q1_4', old('q1_4'), ['class' => 'form-control']) !!}
    @if ($errors->has('q1_4'))
    <span class="help-block">
        <strong>What would do to handle beneficiaries complaints?</strong>
    </span>
    @endif

</div>

<div class="form-group col-sm-12">
<hr>
   <h2>3. Role-specific questions</h2>
   <hr>
</div>


<!-- Q2 1 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q2_1') ? ' has-error' : '' }}">
    {!! Form::label('q2_1', 'What managerial/business software are you familiar with?') !!}
    {!! Form::textarea('q2_1', old('q2_1'), ['class' => 'form-control']) !!}

    @if ($errors->has('q2_1'))
    <span class="help-block">
        <strong>What managerial/business software are you familiar with?</strong>
    </span>
    @endif

</div>

<!-- Q2 2 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q2_2') ? ' has-error' : '' }}">
    {!! Form::label('q2_2', 'What is your process of approving or rejecting a loan request?') !!}
    {!! Form::textarea('q2_2', old('q2_2'), ['class' => 'form-control']) !!}
    @if ($errors->has('q2_2'))
    <span class="help-block">
        <strong>What is your process of approving or rejecting a loan request?</strong>
    </span>
    @endif
</div>

<!-- Q2 3 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q2_3') ? ' has-error' : '' }}">
    {!! Form::label('q2_3', 'What sector would you currently choose to invest in and why?') !!}
    {!! Form::textarea('q2_3', old('q2_3'), ['class' => 'form-control']) !!}
    @if ($errors->has('q2_3'))
    <span class="help-block">
        <strong>What sector would you currently choose to invest in and why?</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12">
<hr>
   <h2>4. Behavioral questions</h2>
   <hr>
</div>

<!-- Q3 1 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q3_1') ? ' has-error' : '' }}">
    {!! Form::label('q3_1', 'What is your greatest professional accomplishments?') !!}
    {!! Form::textarea('q3_1', old('q3_1'), ['class' => 'form-control']) !!}
    @if ($errors->has('q3_1'))
    <span class="help-block">
        <strong>What is your greatest professional accomplishments?</strong>
    </span>
    @endif
</div>

<!-- Q3 2 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q3_2') ? ' has-error' : '' }}">
    {!! Form::label('q3_2', 'Have you experienced any job/work conflicts?how did you handle them?') !!}
    {!! Form::textarea('q3_2', old('q3_2'), ['class' => 'form-control']) !!}
    @if ($errors->has('q3_2'))
    <span class="help-block">
        <strong>Have you experienced any job/work conflicts?how did you handle them?</strong>
    </span>
    @endif
</div>

<!-- Q3 3 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q3_3') ? ' has-error' : '' }}">
    {!! Form::label('q3_3', 'What do you understand by Integrity,and how does integrity affect the financial and well being of a business owner?') !!}
    {!! Form::textarea('q3_3', old('q3_3'), ['class' => 'form-control']) !!}
    @if ($errors->has('q3_3'))
    <span class="help-block">
        <strong>What do you understand by Integrity,and how does integrity affect the financial and well being of a business owner?</strong>
    </span>
    @endif
</div>




<div class="form-group col-sm-12">
<hr>
   <h2>5. Managerial questions</h2>
   <hr>
</div>
<!-- Q4 1 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q4_1') ? ' has-error' : '' }}">
    {!! Form::label('q4_1', 'What do you know about business Ethics/business principles?') !!}
    {!! Form::textarea('q4_1', old('q4_1'), ['class' => 'form-control']) !!}
    @if ($errors->has('q4_1'))
    <span class="help-block">
        <strong>What do you know about business Ethics/business principles?</strong>
    </span>
    @endif
</div>

<!-- Q4 2 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q4_2') ? ' has-error' : '' }}">
    {!! Form::label('q4_2', 'How often would you monitor the  on going running of beneficiaries businesses?') !!}
    {!! Form::textarea('q4_2', old('q4_2'), ['class' => 'form-control']) !!}
    @if ($errors->has('q4_2'))
    <span class="help-block">
        <strong>How often would you monitor the  on going running of beneficiaries businesses?</strong>
    </span>
    @endif
</div>

<!-- Q4 3 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q4_3') ? ' has-error' : '' }}">
    {!! Form::label('q4_3', 'On a regular basis,how often would you report to the Board of Directors about the recorded circumstances with beneficiaries?') !!}
    {!! Form::textarea('q4_3', old('q4_3'), ['class' => 'form-control']) !!}
    @if ($errors->has('q4_3'))
    <span class="help-block">
        <strong>On a regular basis,how often would you report to the Board of Directors about the recorded circumstances with beneficiaries?</strong>
    </span>
    @endif
</div>

<!-- Q4 4 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q4_4') ? ' has-error' : '' }}">
    {!! Form::label('q4_4', 'Do you have any bookkeeping and computer skills?') !!}
    {!! Form::textarea('q4_4', old('q4_4'), ['class' => 'form-control']) !!}
    @if ($errors->has('q4_4'))
    <span class="help-block">
        <strong>Do you have any bookkeeping and computer skills?</strong>
    </span>
    @endif
</div>


<div class="form-group col-sm-12">
<hr>
   <h2>6. Human Rights principles questions</h2>
   <hr>
</div>


<!-- Q5 1 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q5_1') ? ' has-error' : '' }}">
    {!! Form::label('q5_1', 'What is Fairness and impartiality to you?') !!}
    {!! Form::textarea('q5_1', old('q5_1'), ['class' => 'form-control']) !!}
    @if ($errors->has('q5_1'))
    <span class="help-block">
        <strong>What is Fairness and impartiality to you?</strong>
    </span>
    @endif
</div>

<!-- Q5 2 Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('q5_2') ? ' has-error' : '' }}">
    {!! Form::label('q5_2', 'How do you think can Christian values contribute to the business growth?') !!}
    {!! Form::textarea('q5_2', old('q5_2'), ['class' => 'form-control']) !!}
    @if ($errors->has('q5_2'))
    <span class="help-block">
        <strong>How do you think can Christian values contribute to the business growth?</strong>
    </span>
    @endif
</div>




<!-- Q5 3 Field -->
<div class="form-group col-sm-12">
    {!! Form::label('q5_3', 'Will you take oath to oppose yourself to the following while serving as a MicroFund Coordinator of All Trust?') !!}
    <br />
    <label class="radio-inline">
       A)  {!! Form::radio('q5_3', "Wrong doing",  old('q5_3'), ['checked' => true]) !!} Wrong doing
    </label>
    <br />

    <label class="radio-inline">
        B) {!! Form::radio('q5_3', "Corruption", old('q5_3')) !!} Corruption
    </label>
    <br />
    <label class="radio-inline">
       C)  {!! Form::radio('q5_3', "Bribery", old('q5_3')) !!} Bribery
    </label>
    <br />
    <label class="radio-inline">
       D)  {!! Form::radio('q5_3', "Any financial impropriety", old('q5_3')) !!} Any financial impropriety
    </label>

</div>


<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>

    <div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6 mr-5 ">
    {!! Form::label('approved', 'Approved?') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approved', 0) !!}
        {!! Form::checkbox('approved', 1, null, ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<?php }?>

<?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>

<div class="form-group col-sm-12">
    <?php if(isset($microFundApplication) && $microFundApplication->approved) { ?>
    <div class="alert alert-success show mt-5  mr-5  text-center title" role="alert">
        <strong>APPLICATION APPROVED</strong>
    </div>

    <?php }else{ ?>

    <div class="alert alert-warning show mt-5 mr-5 text-center title" role="alert">
        <strong>APPLICATION PENDING</strong>
    </div>
    <?php }?>
</div>

<?php } ?>
<hr>
<?php if(Auth::check()  && Auth::user()->type=='Admin'){ ?>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('microFundApplications.index') }}" class="btn btn-default">Cancel</a>
</div>
<?php } ?>

<?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>

<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>
<?php }?>

<?php if(!Auth::check()){ ?>
    <div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>
<?php } ?>

