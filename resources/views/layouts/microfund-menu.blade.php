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

<li class="{{ Request::is('fillingDocuments*') ? 'active' : '' }}">
    <a href="{{ route('fillingDocuments.index') }}"><i class="fa fa-edit"></i><span>Filling Documents</span></a>
</li>