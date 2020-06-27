<!-- <div class="container"> -->
<?php        
     $reviews = \App\Models\BookReviews::where('book_id',$book->id)->orderBy('created_at','DESC')->paginate(6);
                                       
                                   
                                   
                                   ?>

	<div class="row mt-5">
		<div class="col-6">
        <h2 class="mt-2">Reviews(<?php echo \App\Models\BookReviews::where('book_id',$book->id)->orderBy('created_at','DESC')->count(); ?>) </h2>
        </div>
         <div class="col-6">
         <div class="float-right"><a href="#" id="addacomment" class="btn btn-sm  btn-danger">Add a review</a> </div>
         </div>
	</div>
	<div class="row" id="addcomment" style="display: none;">
    
                    {!! Form::open(['route' => 'bookReviews.store']) !!}

                        @include('book_reviews.fields',['book_id'=>$book->id])

                    {!! Form::close() !!}
               
	</div>
    <?php if(count($reviews) > 0){ ?>
	<hr>
    @foreach($reviews as $review)
	<div class="row comment">
	    <div class="head">
	        <small><strong class='user'>{{$review->name}}</strong> {{$review->created_at}}</small>
	    </div>    
	    <p>{{$review->review}} </p>
	</div>
    @endforeach
	<hr>
    <?php } ?>
    
    <div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center">  {!! $reviews->links() !!}</span>
</div>
<!-- </div> -->
