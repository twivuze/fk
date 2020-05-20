<div class="form-group col-sm-12">
   <h2>1. Personal information</h2>
   <hr>
</div>

<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
<b>{{ $microFundApplication->full_name }}</b>
</div>



<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
<b>{{ $microFundApplication->phone_number }}</b>
</div>



<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
<b>{{ $microFundApplication->email }}</b>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
<b>{{ $microFundApplication->address }}</b>
</div>

<!-- Religion Field -->
<div class="form-group">
    {!! Form::label('religion', 'Religion:') !!}
<b>{{ $microFundApplication->religion }}</b>
</div>

<!-- Marital Status Field -->
<div class="form-group">
    {!! Form::label('marital_status', 'Marital Status:') !!}
<b>{{ $microFundApplication->marital_status }}</b>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
<b>{{ $microFundApplication->gender }}</b>
</div>


<div class="form-group col-sm-12">
<hr>
   <h2>2. Operational and situational questions</h2>
   <hr>
</div>

<!-- Q1 1 Field -->
<div class="form-group">
    {!! Form::label('q1_1', 'Q1) -How would you manage All Trust beneficiaries regarding the on time loan repayment?') !!}
 <br />

 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q1_1 }}</span>
</div>

<!-- Q1 2 Field -->

<div class="form-group">
    {!! Form::label('q1_2', 'Q2) -what information/data would you focus on to forecast loan repayment abilities of the All Trust beneficiaries?') !!}
 <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q1_2 }}</span>
</div>

<!-- Q1 3 Field -->


<div class="form-group">
    {!! Form::label('q1_3', 'Q3) -How would you assess underperforming beneficiaries and how would you deal with them?') !!}
 <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q1_3 }}</span>
</div>

<!-- Q1 4 Field -->

<div class="form-group">
    {!! Form::label('q1_4', 'Q4) -what would do to handle beneficiaries complaints?') !!}
 <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q1_4 }}</span>
</div>


<div class="form-group col-sm-12">
<hr>
   <h2>3. Role-specific questions</h2>
   <hr>
</div>

<!-- Q2 1 Field -->
<div class="form-group">
    {!! Form::label('q2_1', 'Q1) -what managerial/business software are you familiar with?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q2_1 }}</span>
</div>

<!-- Q2 2 Field -->
<div class="form-group">
    {!! Form::label('q2_2', 'Q2) -what is your process of approving or rejecting a loan request?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q2_2 }}</span>
</div>


<!-- Q2 3 Field -->


<div class="form-group">
    {!! Form::label('q2_3', 'Q3) -what sector would you currently choose to invest in and why?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q2_3 }}</span>
</div>

<div class="form-group col-sm-12">
<hr>
   <h2>4. Behavioral questions</h2>
   <hr>
</div>

<!-- Q3 1 Field -->

<div class="form-group">
    {!! Form::label('q3_1', 'Q1) -what is your greatest professional accomplishments?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q3_1 }}</span>
</div>

<!-- Q3 2 Field -->


<div class="form-group">
    {!! Form::label('q3_2', 'Q2) -have you experienced any job/work conflicts?how did you handle them?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q3_2 }}</span>
</div>

<!-- Q3 3 Field -->


<div class="form-group">
    {!! Form::label('q3_3', 'Q3) - what do you understand by Integrity,and how does integrity affect the financial and well being of a business owner?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q3_3 }}</span>
</div>

<div class="form-group col-sm-12">
<hr>
   <h2>5. Managerial questions</h2>
   <hr>
</div>

<!-- Q4 1 Field -->
<div class="form-group">
    {!! Form::label('q4_1', 'Q1) -What do you know about business Ethics/business principles?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q4_1 }}</span>
</div>

<!-- Q4 2 Field -->

<div class="form-group">
    {!! Form::label('q4_2', 'Q2)-How often would you monitor the  on going running of beneficiaries businesses?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q4_2 }}</span>
</div>

<!-- Q4 3 Field -->

<div class="form-group">
    {!! Form::label('q4_3', 'Q3)-on a regular basis,how often would you report to the Board of Directors about the recorded circumstances with beneficiaries?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q4_3 }}</span>
</div>

<!-- Q4 4 Field -->
<div class="form-group">
    {!! Form::label('q4_4', 'Q4 4:') !!}
<b>{{ $microFundApplication->q4_4 }}</b>
</div>

<div class="form-group">
    {!! Form::label('q4_4', 'Q4)-Do you have any bookkeeping and computer skills?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q4_4 }}</span>
</div>

<div class="form-group col-sm-12">
<hr>
   <h2>6. Human Rights principles questions</h2>
   <hr>
</div>

<!-- Q5 1 Field -->

<div class="form-group">
    {!! Form::label('q5_1', 'Q1) - what is Fairness and impartiality to you?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q5_1 }}</span>
</div>

<!-- Q5 2 Field -->

<div class="form-group">
    {!! Form::label('q5_2', 'Q2) -How do you think can Christian values contribute to the business growth?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q5_2 }}</span>
</div>

<!-- Q5 3 Field -->

<div class="form-group">
    {!! Form::label('q5_3', 'Q3) -will you take oath to oppose yourself to the following while serving as a MicroFund Coordinator of All Trust?') !!}
    <br />
 <span style="margin-left:50px"> <b>Ans:</b> {{ $microFundApplication->q5_3 }}</span>
</div>

<hr>    
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
<b>{{ $microFundApplication->created_at }}</b>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
<b>{{ $microFundApplication->updated_at }}</b>
</div>

