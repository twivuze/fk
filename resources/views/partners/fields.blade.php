<!-- Company Or Organization Field -->

<div class="form-group col-sm-12 {{ $errors->has('Company_or_organization') ? ' has-error' : '' }}">
    {!! Form::label('Company_or_organization', 'Company Or Organization:') !!}
    {!! Form::text('Company_or_organization', old('Company_or_organization'), ['class' => 'form-control']) !!}
    @if ($errors->has('Company_or_organization'))
    <span class="help-block">
        <strong>{{ $errors->first('Company_or_organization') }}</strong>
    </span>
    @endif
</div>
<!-- Email Field -->

<div class="form-group col-sm-12 {{ $errors->has('Email') ? ' has-error' : '' }}">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::email('Email', old('email'), ['class' => 'form-control']) !!}
    @if ($errors->has('Email'))
    <span class="help-block">
        <strong>{{ $errors->first('Email') }}</strong>
    </span>
    @endif
</div>

<!-- Contact Field -->


<!-- Country Field -->
<div class="form-group col-sm-12 {{ $errors->has('Country') ? ' has-error' : '' }}">
    {!! Form::label('Country', 'Country:') !!}
    {!! Form::text('Country', old('Country'), ['class' => 'form-control']) !!}
    @if ($errors->has('Country'))
    <span class="help-block">
        <strong>{{ $errors->first('Country') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-sm-12 {{ $errors->has('Address') ? ' has-error' : '' }}">
    {!! Form::label('Address', 'Address:') !!}
    {!! Form::text('Address', old('Address'), ['class' => 'form-control']) !!}
    @if ($errors->has('Address'))
    <span class="help-block">
        <strong>{{ $errors->first('Address') }}</strong>
    </span>
    @endif
</div>
<!-- Address Field -->

<div class="form-group col-sm-12 {{ $errors->has('Website') ? ' has-error' : '' }}">
    {!! Form::label('Website', 'Website:') !!}
    {!! Form::text('Website', old('Website'), ['class' => 'form-control']) !!}
    @if ($errors->has('Website'))
    <span class="help-block">
        <strong>{{ $errors->first('Website') }}</strong>
    </span>
    @endif
</div>

<!-- Website Field -->

<!-- Why Do You Want To Partner With All Trust Consult Field -->


<div class="form-group col-sm-12 {{ $errors->has('Why_Do_you_want_to_partner_with_All_Trust_Consult') ? ' has-error' : '' }}">
    {!! Form::label('Why_Do_you_want_to_partner_with_All_Trust_Consult', 'Why Do You Want To Partner With All Trust Consult?') !!}
    {!! Form::textarea('Why_Do_you_want_to_partner_with_All_Trust_Consult', old('Why_Do_you_want_to_partner_with_All_Trust_Consult'), ['class' => 'form-control']) !!}
    @if ($errors->has('Why_Do_you_want_to_partner_with_All_Trust_Consult'))
    <span class="help-block">
        <strong>{{ $errors->first('Why_Do_you_want_to_partner_with_All_Trust_Consult') }}</strong>
    </span>
    @endif
</div>

<!-- In Which Area Will The Partnership Focus On Field -->


<div class="form-group col-sm-12 {{ $errors->has('In_which_area_will_the_partnership_focus_on') ? ' has-error' : '' }}">
    {!! Form::label('In_which_area_will_the_partnership_focus_on', 'In Which Area Will The Partnership Focus On?') !!}
    {!! Form::textarea('In_which_area_will_the_partnership_focus_on', old('In_which_area_will_the_partnership_focus_on'), ['class' => 'form-control']) !!}
    @if ($errors->has('In_which_area_will_the_partnership_focus_on'))
    <span class="help-block">
        <strong>{{ $errors->first('In_which_area_will_the_partnership_focus_on') }}</strong>
    </span>
    @endif
</div>

<!-- Employee Name Field -->
<div class="form-group col-sm-12 ">
Kindly provide the following information of someone from your side who will follow up with 
this partnership towards success:
<hr>
</div>

<div class="form-group col-sm-12 {{ $errors->has('Employee_name') ? ' has-error' : '' }}">
    {!! Form::label('Employee_name', 'Employee name:') !!}
    {!! Form::text('Employee_name', old('Employee_name'), ['class' => 'form-control']) !!}
    @if ($errors->has('Employee_name'))
    <span class="help-block">
        <strong>{{ $errors->first('Employee_name') }}</strong>
    </span>
    @endif
</div>

<!-- Employee Contact Field -->
<div class="form-group col-sm-12 {{ $errors->has('Employee_Contact') ? ' has-error' : '' }}">
    {!! Form::label('Employee_Contact', 'Employee contact:') !!}
    {!! Form::text('Employee_Contact', old('Employee_Contact'), ['class' => 'form-control']) !!}
    @if ($errors->has('Employee_Contact'))
    <span class="help-block">
        <strong>{{ $errors->first('Employee_Contact') }}</strong>
    </span>
    @endif
</div>

<!-- Employee Email Field -->

<div class="form-group col-sm-12 {{ $errors->has('Employee_Email') ? ' has-error' : '' }}">
    {!! Form::label('Employee_Email', 'Employee email:') !!}
    {!! Form::text('Employee_Email', old('Employee_Email'), ['class' => 'form-control']) !!}
    @if ($errors->has('Employee_Email'))
    <span class="help-block">
        <strong>{{ $errors->first('Employee_Email') }}</strong>
    </span>
    @endif
</div>


<!-- Employee Country Field -->


<div class="form-group col-sm-12 {{ $errors->has('Employee_Country') ? ' has-error' : '' }}">
    {!! Form::label('Employee_Country', 'Employee_Country:') !!}
    {!! Form::text('Employee_Country', old('Employee country'), ['class' => 'form-control']) !!}
    @if ($errors->has('Employee_Country'))
    <span class="help-block">
        <strong>{{ $errors->first('Employee_Country') }}</strong>
    </span>
    @endif
</div>

<!-- Upload Logo Image Field -->

<div class="form-group col-sm-12 {{ $errors->has('Upload_Logo_Image') ? ' has-error' : '' }}">
    {!! Form::label('Upload_Logo_Image', 'Upload Logo Image:') !!}
    {!! Form::file('Upload_Logo_Image') !!}<br />
    @if ($errors->has('Upload_Logo_Image'))
    <span class="help-block">
        <strong>{{ $errors->first('Upload_Logo_Image') }}</strong>
    </span>
    @endif
</div>
<div class="clearfix"></div>




<?php if(Auth::check()){ ?>

    <div class="form-group col-sm-6">
@if (isset($partner) && $partner->Upload_Logo_Image)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$partner->Upload_Logo_Image}}" style="width:100%" class="figure-img img-fluid rounded">
                   
         </figure>
     @endif
</div>

<!-- Session Id Field -->
<!-- 'bootstrap / Toggle Switch Approved Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('approved', 'Approved:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approved', 0) !!}
        {!! Form::checkbox('approved', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <?php if(\Request::get('session')){ ?>
    <input type="hidden" value="{{\Request::get('session')}}" name="session">
    <a href="{{ route('partners.index') }}?session={{\Request::get('session')}}" class="btn btn-default">Cancel</a>
    <?php }else{ ?>
        <a href="{{ route('partners.index') }}" class="btn btn-default">Cancel</a>
        <?php } ?>
</div>
<?php } ?>

<?php if(!Auth::check()){ ?>
<hr>
<div class="form-group col-sm-12">
    {!! Form::hidden('session_id', $session_id, ['class' => 'form-control']) !!}
</div>
<!-- Session Id Field -->
<div class="form-group col-sm-12">
{!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
</div>


<?php } ?>
