<?php 
$Letters = \App\Models\Letters::where('allow_to_apply',1)->where('id',$id)->orderBy('numbering','ASC')->first(); 

?>
@extends('front.layouts.app',
['title'=>$Letters->title,
'description'=>'Letters'
]
)

@section('content')



<?php
if($Letters){
    $Letterss = \App\Models\Letters::where('allow_to_apply',1)->orderBy('numbering','ASC')->get();
    $previous = \App\Models\Letters::where('allow_to_apply',1)->where('id', '<', $id)->orderBy('numbering','ASC')->first();
    $next = \App\Models\Letters::where('allow_to_apply',1)->where('id', '>', $id)->orderBy('numbering','ASC')->first();
?>


<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w" style="position: relative;margin-top: 100px!important;">
    <div class="m-5">
        <div class="row justify-content-center">

            <div class="card p-3 col-sm-3">
                <ul class="list-group mt-3">
                    <li class="list-group-item active"
                        style="border:#00a7da !important;background:#00a7da!important;color:#fff!important">Letters</li>

                    @foreach($Letterss as $sts)
                    <?php if($sts->id==$id){?>
                    <li class="list-group-item">
                        <a href="/letter/{{$sts->id}}#{{$sts->id}}" class="mbr-bold text-primary"
                            style="color:#465052!important; font-size:10pt">{{$sts->numbering}} . {{$sts->title}}</a>
                        <?php }else{ ?>
                    <li class="list-group-item ">
                        <a  style="color:#00a7da!important; font-size:10pt" href="/letter/{{$sts->id}}#{{$sts->id}}"
                            class="mbr-bold text-primary">{{$sts->numbering}} . {{$sts->title}}</a>
                        <?php } ?>
                    </li>
                    @endforeach
                </ul>

            </div>

            <div class="card p-3 col-sm-9">
            <h5 class="align-center mt-3 pb-0 mbr-fonts-style display-2 text-left">
                    <strong style="color:#00a7da!important;font-size:26pt">{{$Letters->numbering}} . {{ $Letters->title }}</strong>
                </h5>
                <hr>
                <p style="box-sizing: border-box;
    color: #34495e;
    font-size: 24px;
    background: #ffffff;
    font-family: 'times new roman', times, serif;">
                <a name="#{{$sts->id}}"></a>
                {!!html_entity_decode($Letters->contents)!!}</p>
                <?php if($previous && $next) { ?>
                <div class="row">
                 <div class="col-6">
                 <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/letter/{{$previous->id}}#{{$previous->id}}" 
                                style="margin-left:-20px;background:#465052!important;color:#fff!important; border-color:#465052!important;">Previous
                               </a>
                 </div>

                 <div class="col-6">
                 <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/letter/{{$next->id}}#{{$next->id}}" 
                                style="margin-left:-20px;background:#465052!important;color:#fff!important; border-color:#465052!important;">Next
                               </a>
                 </div>
                </div>
                <?php }else if(!$previous && $next) { ?>
                    <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/letter/{{$next->id}}#{{$next->id}}" 
                                style="margin-left:-20px;background:#465052!important;color:#fff!important; border-color:#465052!important;">Next
                               </a>
                    <?php  }else if($previous && !$next) { ?>
                        <a class="btn btn-sm btn-primary btn-block display-3"
                                
                                href="/letter/{{$previous->id}}#{{$previous->id}}" 
                                style="margin-left:-20px;background:#465052!important;color:#fff!important; border-color:#465052!important;"> Previous
                               </a>
                        <?php }?>
            </div>


        </div>
    </div>

</section>

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

@include('front.footer')

@endsection
