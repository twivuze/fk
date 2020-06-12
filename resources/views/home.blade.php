@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">



    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        @include('analyitcs.admin')
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>
    
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Enterprise'){
      $enterprise= \App\Models\LoanApplication::where('user_id',Auth::id())->orderBy('id','DESC')->first();
    ?>
    @include('analyitcs.enterprise',['enterprise'=>$enterprise])
<?php }?>

<?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>
  
<?php }?>


<?php if(Auth::check() && Auth::user()->type=='Donor'){ ?>
   
<?php }?>

    </div>
</div>
@endsection
