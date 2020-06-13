<?php 
    $lender= \App\Models\Lender::where('user_id',Auth::id())->orderBy('id','DESC')->first();
?>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-th"></i><span>Dashboard</span></a>
</li>



<li class="nav-item  dropdown {{ ( Request::is('lenders*') ) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-user"></i> <span>My Application</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

<li class="">
    <a  href="/lenders/{{$lender->id}}/edit"><i class="fa fa-edit"></i><span>Edit</span></a>
</li>

<li class="">
    <a href="/lenders/{{$lender->id}}"><i class="fa fa-eye"></i><span>View</span></a>
</li>


</ul>


</li>
<!-- <li class="{{ Request::is('lenderInvoices*') ? 'active' : '' }}">
    <a href="{{ route('lenderInvoices.index') }}"><i class="fa fa-credit-card"></i><span>Invoices</span></a>
</li> -->

<!-- <li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-chat"></i><span>Messages</span></a>
</li> -->