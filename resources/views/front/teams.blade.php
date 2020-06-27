<?php $team = \App\Models\TeamCategory::where('published',1)->where('id',$id)->orderBy('numbering','ASC')->first();
?>

@extends('front.layouts.app',
['title'=>$team?$team->name:'Team :: Frank Rubaduka',
'description'=>'Team'
]
)


<style>
    .sf-menu a:hover {
        color: #0f1630 !important;
    }

    .card-block {
        -webkit-flex-grow: 0;
        flex-grow: 0;
        padding: 2.4rem 2.4rem 0 2.4rem;
    }

    .card-block .testimonial-photo {
        display: inline-block;
        width: 160px;
        height: 160px;
        margin-bottom: 1.6rem;
        overflow: hidden;
        border-radius: 50%;
        position: relative;
        left: 0;
    }

    .card-block .testimonial-photo img {
        width: 100%;
        min-width: 100%;
        min-height: 100%;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

</style>


@section('content')
<section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w"
    style="position: relative;margin-top: 80px!important;">


    <div class="m-5" id="blog">


        <?php        

                            if($team){
                                        $teams = \App\Models\TeamCategory::where('published',1)->orderBy('numbering','ASC')->get();
                                        $previous = \App\Models\TeamCategory::where('published',1)->where('id', '<', $id)->orderBy('numbering','ASC')->first();
                                        $next = \App\Models\TeamCategory::where('published',1)->where('id', '>', $id)->orderBy('numbering','ASC')->first();
                                    ?>

        <div class="row">

            <div class="col-sm-3">
                <ul class="list-group mt-3">
                    <li class="list-group-item active"
                        style="border:#073b4c!important; !important;background:#073b4c!important;!important;color:#fff!important!important">
                        Team</li>

                    @foreach($teams as $sts)
                    <?php if($sts->id==$id){?>
                    <li class="list-group-item">
                        <a href="/team-members/{{$sts->id}}#{{$sts->id}}" class="mbr-bold"
                            style="color:#28a745!important;font-size:15px!important;">{{$sts->name}}</a>
                        <?php }else{ ?>
                    <li class="list-group-item "><a href="/team-members/{{$sts->id}}#{{$sts->id}}" class="mbr-bold"
                            style="color:#0f1630!important;font-size:14px!important;">{{$sts->name}}</a>
                        <?php } ?>
                    </li>
                    @endforeach
                    <li class="list-group-item text-center"><a href="/all-teams" class="mbr-bold"
                            style="color:#0f1630!important;font-size:14px!important;">View All</a>

                    </li>
                </ul>

            </div>

            <div class="col-sm-9" style="position:relative;top:10px!important">
                <span class="text-left ml-5 text-success">
                    <strong class="text-success" style="font-size:28px; color: #28a745!important;">
                        {{ $team->name }}</strong>
                </span>
                <hr>
                <p class="p">
                    <a name="#{{$sts->id}}"></a>

                    <div id="">
                        <div class="container" id="contact">

                        <div class="row" >
                                <?php
                                         $myTeams = \App\Models\Team::where('published',1)->where('team_category_id',$id)->orderBy('numbering','ASC')->get();
                                            ?>
                                @foreach($myTeams as $myTeam)

                                <div class="col-md-4">
                                <div class="card border-success mb-3" style="max-width: 100%;border:1px solid #073b4c!important;">
                                        <div class="card-header bg-transparent border-success"><b
                                                style="color: #073b4c!important!important;">
                                                {{$myTeam->name}}</b><br>
                                            <strong style=" color: #28a745!important;">{{$myTeam->title}}</strong>
                                        </div>
                                        <div class="card-block text-center">
                                            <a href="/team/{{$myTeam->id}}">
                                                <div class="testimonial-photo text-center">
                                                    <img src="{{$myTeam->image}}">
                                                </div>
                                            </a>

                                        </div>
                                        <div class="card-body text-success">
                                            <div class="row mb-5">
                                                <b class="card-text text-center mx-auto col-8"
                                                    style="border-bottom:2px solid; text-align: center">{{$myTeam->country}}</b><br>
                                            </div>
                                            <b class="card-text">

                                                <a
                                                    href="/team/{{$myTeam->id}}" style="color:#073b4c!important;">{{Str::limit($myTeam->bio, $limit = 100, $end = 'read more ....')}}</a>

                                            </b>


                                        </div>





                                    </div>
                                </div>

                                @endforeach

                                <?php if(count($myTeams) == 0){?>
                                <div class="media-container-column mx-auto col-lg-8">

                                    <div class="alert alert-warning show mt-5 ml-5 text-center title" role="alert">
                                        <strong>No Team Member!</strong>
                                    </div>
                                </div>

                                <?php } ?>

                            </div>

                        </div>

                </p>

                <?php if($previous && $next) { ?>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-sm btn-primary btn-block display-3"
                            href="/team-members/{{$previous->id}}#{{$previous->id}}"
                            style="background: #073b4c!important;color: #fff!important;border: 2px solid #073b4c!important;">Previous
                        </a>
                    </div>

                    <div class="col-6">
                        <a class="btn btn-sm btn-primary btn-block display-3"
                            href="/team-members/{{$next->id}}#{{$next->id}}"
                            style="background: #073b4c!important;color: #fff!important;border: 2px solid #073b4c!important;">Next
                        </a>
                    </div>
                </div>
                <?php }else if(!$previous && $next) { ?>
                <a class="btn btn-sm btn-primary btn-block display-3" href="/team-members/{{$next->id}}#{{$next->id}}"
                    style="background: #073b4c!important;color: #fff!important;border: 2px solid #073b4c!important;">Next
                </a>
                <?php  }else if($previous && !$next) { ?>
                <a class="btn btn-sm btn-primary btn-block display-3"
                    href="/team-members/{{$previous->id}}#{{$previous->id}}"
                    style="background: #073b4c!important;color: #fff!important;border: 2px solid #073b4c!important;">
                    Previous
                </a>
                <?php }?>
            </div>


        </div>



        <?php 
                                    }else{
                                    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8">

                    <div class="alert alert-warning  mt-5 ml-5 text-center title" role="alert">
                        <strong>No more!</strong>
                    </div>
                </div>
            </div>
        </div>
        <?php 
                                    }
                                    ?>
    </div>

    </div>
</section>
@include('front.footer')

@endsection
