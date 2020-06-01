<?php 
$centers= \App\Models\Center::where('status','Active')->orderBy('id','DESC')->get();
$fillings = \App\Models\FillingCategory::where('published',1)->orderBy('id','DESC')->get();
?>
<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(46, 46, 46);">
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h2 class="align-center pb-2 mbr-fonts-style display-2"><strong>
                    Search File</strong></h2>

        </div>
    </div>
  

    <div class="row py-2 justify-content-center">
        <div class="col-12 col-lg-12 col-md-12">
            <!---Formbuilder Form--->
            <form action="/fillings/search" method="GET" class="mbr-form form-with-styler" data-form-title="Search Form">
           
                <div class="dragArea row">
                
                <?php if(count($centers) > 0) {?>
                    <div class="form-group col" data-for="center">
                        <select name="center" id="center" class="form-control">

                           
                            <option value="">Filter By Center</option>
                          
                            @foreach($centers as $center)
                            <option value="{{$center->id}}"> {{$center->name}} - {{$center->country}}</option>
                            @endforeach
                        </select>
                        </div>
                    <?php } ?>

                    <?php if(count($fillings) > 0) {?>
                    <div class="form-group col" data-for="category">
                        <select name="category" id="category" class="form-control">

                           
                            <option value="">Filter By Category</option>
                          
                            @foreach($fillings as $filling)
                            <option value="{{$filling->id}}"> {{$filling->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    <?php } ?>
           
               
                    <div class="form-group col" data-for="search">
                   

                        <input type="search" name="search" placeholder="Search by name or country" data-form-field="Serach" class="form-control display-7" id="email-form3-21">
                    </div>
                    <div class="col-auto input-group-btn"><button type="submit"
                            class="btn btn-primary display-4">Search</button></div>
                </div>
            </form>
            <!---Formbuilder Form--->
        </div>
    </div>
</div>
