
<?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
    @include('layouts.admin-menu')
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>
    @include('layouts.microfund-menu')
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Enterprise'){ ?>
    @include('layouts.enterprise-menu')
<?php }?>




