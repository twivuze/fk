<?php 
    $microFundApplication= \App\Models\MicroFundApplication::where('user_id',Auth::id())->orderBy('id','DESC')->first();
?>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-th"></i><span>Dashboard</span></a>
</li>



<li class="nav-item  dropdown {{ ( Request::is('microFundApplications*') ) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-user"></i> <span>My Application</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

<li class="">
    <a  href="/microFundApplications/{{$microFundApplication->id}}/edit"><i class="fa fa-edit"></i><span>Edit</span></a>
</li>

<li class="">
    <a href="/microFundApplications/{{$microFundApplication->id}}"><i class="fa fa-eye"></i><span>View</span></a>
</li>

 </ul>


</li>

<li class="{{ Request::is('loanApplications*') ? 'active' : '' }}">
    <a href="{{ route('loanApplications.index') }}"><i class="fa fa-address-card"></i><span>Enterprises</span></a>
</li>

<li class="{{ Request::is('fillingDocuments*') ? 'active' : '' }}">
    <a href="{{ route('fillingDocuments.index') }}"><i class="fa fa-folder"></i><span>Filling Documents</span></a>
</li>

<li class="nav-item  dropdown {{ (Request::is('lenderInvoices*') ||  Request::is('donationInvoices*')) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-credit-card"></i> <span>Invoices</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

<li class="{{ Request::is('lenderInvoices*') ? 'active' : '' }}">
    <a href="{{ route('lenderInvoices.index') }}"><i class="fa fa-credit-card"></i><span>Lends</span></a>
</li>
<li class="{{ Request::is('donationInvoices*') ? 'active' : '' }}">
    <a href="{{ route('donationInvoices.index') }}"><i class="fa fa-credit-card"></i><span>Donations</span></a>
</li>

</ul>


</li>