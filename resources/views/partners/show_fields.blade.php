<!-- Id Field -->
<div class="form-group col-sm-6">
@if (isset($partner) && $partner->Upload_Logo_Image)
        <figure class="figure" style="width:50%">
                    <img src="/thumbnail/{{$partner->Upload_Logo_Image}}" style="width:100%" class="figure-img img-fluid rounded">
                   
         </figure>
     @endif
</div>

<!-- Company Or Organization Field -->
<div class="form-group">
    {!! Form::label('Company_or_organization', 'Company Or Organization:') !!}
    <p>{{ $partner->Company_or_organization }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('Address', 'Address:') !!}
    <p>{{ $partner->Address }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('Email', 'Email:') !!}
    <p>{{ $partner->Email }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('Country', 'Country:') !!}
    <p>{{ $partner->Country }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('Website', 'Website:') !!}
    <p>{{ $partner->Website }}</p>
</div>

<!-- Why Do You Want To Partner With All Trust Consult Field -->
<div class="form-group">
    {!! Form::label('Why_Do_you_want_to_partner_with_All_Trust_Consult', 'Why Do You Want To Partner With All Trust Consult:') !!}
    <p>{{ $partner->Why_Do_you_want_to_partner_with_All_Trust_Consult }}</p>
</div>

<!-- In Which Area Will The Partnership Focus On Field -->
<div class="form-group">
    {!! Form::label('In_which_area_will_the_partnership_focus_on', 'In Which Area Will The Partnership Focus On:') !!}
    <p>{{ $partner->In_which_area_will_the_partnership_focus_on }}</p>
</div>

<!-- Employee Name Field -->
<div class="form-group">
    {!! Form::label('Employee_name', 'Employee Name:') !!}
    <p>{{ $partner->Employee_name }}</p>
</div>

<!-- Employee Contact Field -->
<div class="form-group">
    {!! Form::label('Employee_Contact', 'Employee Contact:') !!}
    <p>{{ $partner->Employee_Contact }}</p>
</div>

<!-- Employee Email Field -->
<div class="form-group">
    {!! Form::label('Employee_Email', 'Employee Email:') !!}
    <p>{{ $partner->Employee_Email }}</p>
</div>

<!-- Employee Country Field -->
<div class="form-group">
    {!! Form::label('Employee_Country', 'Employee Country:') !!}
    <p>{{ $partner->Employee_Country }}</p>
</div>

<!-- Upload Logo Image Field -->
<div class="form-group">
    {!! Form::label('Upload_Logo_Image', 'Upload Logo Image:') !!}
    <p>{{ $partner->Upload_Logo_Image }}</p>
</div>

<!-- Approved Field -->
<div class="form-group">
    {!! Form::label('approved', 'Approved:') !!}
    <p>{{ $partner->approved?'Yes':'No' }}</p>
</div>

<!-- Session Id Field -->


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $partner->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $partner->updated_at }}</p>
</div>

