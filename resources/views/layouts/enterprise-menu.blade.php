<?php 
    $enterprise= \App\Models\LoanApplication::where('user_id',Auth::id())->orderBy('id','DESC')->first();
?>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-th"></i><span>Dashboard</span></a>
</li>

<li class="{{ Request::is('loanApplications*') ? 'active' : '' }}">
    <a href="/loanApplications/{{$enterprise->id}}/edit"><i class="fa fa-user"></i><span>My Application</span></a>
</li>

<!-- <li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-chat"></i><span>Messages</span></a>
</li> -->