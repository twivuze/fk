@extends('front.layouts.app',
['title'=>'Team',
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
    left:0;
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
            <section class="features17 cid-rYUhzEzUWQ bg-white mt-5" id="features17-2w" style="position: relative;margin-top: 80px!important;">
                

                <div class="m-5" id="blog">

                    <?php        
                                        $teams = \App\Models\TeamCategory::where('published',1)->orderBy('numbering','ASC')->get();
                                       
                                   
                                   
                            if(count($teams) > 0){
                                   ?>

                    <div class="row">

                        <div class="col-sm-3">
                            <ul class="list-group mt-3">
                                <li class="list-group-item active"
                                    style="border: #073b4c!important;background:#073b4c!important;color:#fff!important">
                                 Team</li>

                                @foreach($teams as $sts)
                          
                                <li class="list-group-item "><a href="/team-members/{{$sts->id}}#{{$sts->id}}"
                                        class="mbr-bold"
                                        style="color:#0f1630!important;font-size:14px!important;">{{$sts->name}}</a>
                                  
                                </li>
                                @endforeach
                                <li class="list-group-item text-center"><a href="/all-teams"
                                        class="mbr-bold"
                                        style="color:#0f1630!important;font-size:14px!important;">View All</a>
                                  
                                </li>
                            </ul>

                        </div>

                        <div class="col-sm-9">
                        <!-- <span class="text-left ml-5 text-success">
                                <strong class="text-success" style="font-size:28px; color: #28a745!important;"> Team</strong>
                            </span>
                            <hr> -->
                            <p class="p">

                                <div id="">
                                    <div class="container" id="contact">

                                        <div class="row" style="margin-top:3px">
                                            <?php
                                            $myTeams =  \App\Models\Team::where('published',1)->orderBy('numbering','ASC')->paginate(8);
                                            ?>
                                            @foreach($myTeams as $myTeam)
                                          
                                            <div class="col-md-4">
                                            <div class="card border-success mb-3" style="max-width: 100%;border:1px solid #073b4c!important;">
                                                <div class="card-header bg-transparent border-success"><b style="color: #073b4c!important;">
                                                {{$myTeam->name}}</b><br> <strong  style=" color: #28a745!important;">{{$myTeam->title}}</strong></div>
                                                        <div class="card-block text-center">
                                                        <a href="/team/{{$myTeam->id}}" target="_blank">
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
                                                            <b class="card-text" style="color: #073b4c!important;">

                                                                <a href="/team/{{$myTeam->id}}" target="_blank" style="color: #073b4c!important;">{{Str::limit($myTeam->bio, $limit = 100, $end = 'read more ....')}}</a>

                                                            </b>

                                                           
                                                        </div>
                                               




                                                </div>
                                            </div>
                                           
                                            @endforeach
                                            <br><br>
                                            <div class="media-container-column mx-auto col-lg-8">
                                            <span class="align-center"> {!! $myTeams->links() !!}</span>
                                            </div>
                                            <?php if(count($myTeams) == 0){?>
                                            <div class="media-container-column mx-auto col-lg-8">

                                                <div class="alert alert-warning show mt-5 ml-5 text-center title"
                                                    role="alert">
                                                    <strong>No Team Member!</strong>
                                                </div>
                                            </div>

                                            <?php } ?>

                                        </div>

                                    </div>

                            </p>

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

            </section>

@endsection
