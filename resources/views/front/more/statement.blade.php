@extends('front.layouts.app')

@section('content')

<?php 
$statement = \App\Models\Statement::where('allow_to_apply',1)->where('id',$id)->orderBy('numbering','ASC')->first(); 

?>



<?php
if($statement){
    $statements = \App\Models\Statement::where('allow_to_apply',1)->orderBy('numbering','ASC')->get();
    $previous = \App\Models\Statement::where('allow_to_apply',1)->where('id', '<', $id)->orderBy('numbering','ASC')->first();
    $next = \App\Models\Statement::where('allow_to_apply',1)->where('id', '>', $id)->orderBy('numbering','ASC')->first();
?>


<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w">
    <div class="m-5">
        <div class="row justify-content-center">

            <div class="card p-3 col-sm-3">
                <ul class="list-group mt-3">
                    <li class="list-group-item active"
                        style="border:#58d77a !important;background:#58d77a!important;color:#fff!important">Statements</li>

                    @foreach($statements as $sts)
                    <?php if($sts->id==$id){?>
                    <li class="list-group-item">
                        <a href="/more/statement/{{$sts->id}}#{{$sts->id}}" class="mbr-bold text-primary"
                            style="color:#fa8709!important;">{{$sts->numbering}} . {{$sts->title}}</a>
                        <?php }else{ ?>
                    <li class="list-group-item "><a href="/more/statement/{{$sts->id}}#{{$sts->id}}"
                            class="mbr-bold text-primary">{{$sts->numbering}} . {{$sts->title}}</a>
                        <?php } ?>
                    </li>
                    @endforeach
                </ul>

            </div>

            <div class="card p-3 col-sm-9">
            <h5 class="align-center mt-3 pb-3 mbr-fonts-style display-2 text-left">
                    <strong style="color:#58d77a!important;">{{$statement->numbering}} . {{ $statement->title }}</strong>
                </h5>
                <hr>
                <p>
                <a name="#{{$sts->id}}"></a>
                {!!html_entity_decode($statement->contents)!!}</p>
                <?php if($previous && $next) { ?>
                <div class="row">
                 <div class="col-6">
                 <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/more/statement/{{$previous->id}}#{{$previous->id}}" 
                                style="margin-left:-20px;background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;">Previous
                               </a>
                 </div>

                 <div class="col-6">
                 <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/more/statement/{{$next->id}}#{{$next->id}}" 
                                style="margin-left:-20px;background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;">Next
                               </a>
                 </div>
                </div>
                <?php }else if(!$previous && $next) { ?>
                    <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/more/statement/{{$next->id}}#{{$next->id}}" 
                                style="margin-left:-20px;background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;">Next
                               </a>
                    <?php  }else if($previous && !$next) { ?>
                        <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/more/statement/{{$previous->id}}#{{$previous->id}}" 
                                style="margin-left:-20px;background:#fa8709!important;color:#fff!important; border-color:#fa8709!important;"> Previous
                               </a>
                        <?php }?>
            </div>


        </div>
    </div>

</section>


<?php 
     $enterprises=\App\Models\LoanApplication::where('approved',1)
     ->orderBy('id','DESC')->take(9)->get();
     if(count( $enterprises) > 0){
    ?>

<section class="mbr-section content4 cid-rYUin3zdln" id="content4-2y" style="background-color:rgb(69, 80, 91);">



    <div class="container">

        <div class="media-container-row">

            <div class="title col-12 col-md-8">

                <h2 class="align-center pb-3 mbr-fonts-style display-2" style="color:#fff;"><strong>Enterprises</strong>
                </h2>


            </div>
        </div>
    </div>
</section>


<section class="features17 cid-rYUhzEzUWQ" id="features17-2w">


    @include('front.common.enterprise-card',['enterprises'=>$enterprises])


</section>
<?php } ?>
<?php 
}else{
?>
<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">

                <div class="alert alert-warning alert-dismissible fade show mt-5 ml-5 text-center title" role="alert">
                    <strong>No more!</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>

<hr>
<section class="clients cid-rYUvGms2pw" style="background:#ffff!important;" data-interval="false" id="clients-3w">

    @include('front.component.partners-section')

</section>


@endsection
