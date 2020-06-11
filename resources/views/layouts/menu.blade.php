
<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
    @include('layouts.admin-menu')
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>
    @include('layouts.microfund-menu')
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Enterprise'){ ?>
    @include('layouts.enterprise-menu')
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>
    @include('layouts.lender-menu')
<?php }?>


<?php if(Auth::check() && Auth::user()->type=='Donor'){ ?>
    @include('layouts.donor-menu')
<?php }?>



















<li class="{{ Request::is('internalFunders*') ? 'active' : '' }}">
    <a href="{{ route('internalFunders.index') }}"><i class="fa fa-edit"></i><span>Internal Funders</span></a>
</li>



