@extends('front.layouts.app',
['title'=>'His Books',
'description'=>'His Books'
]
)

@section('content')


<?php 
     $books=\App\Models\Books::orderBy('updated_at','DESC')->where('published',1)->paginate(10);
    ?>

<section class="header8 cid-rYMyQ3IifK mt-5" id="header8-1q">

<div id="large-th">
  <div class="mt-5 ml-5" >
    <!-- <h1 style="margin-top:80px"> A list of books</h1> -->
    <!-- <br> -->
    <div class="choose">
      <a href="#list-th"><i class="fa fa-th-list" aria-hidden="true"></i></a>
      <a href="#large-th"><i class="fa fa-th-large" aria-hidden="true"></i></a>
    </div>
    <div id="list-th">
    @foreach($books as $book)
    <a href="/book/{{$book->id}}/details" style="color: #073b4c!important;" target="_blank">
      <div class="book read">
        <div class="cover">
          <img src="/images/{{$book->cover}}">
        </div>
        <div class="description">
          <p class="title" style="font-size:14px">{{Str::limit($book->title, $limit = 16, $end = 'read more ....')}}<br>
            <span class="author">{{Str::limit($book->author, $limit = 16, $end = 'read more ....')}}</span></p>
        </div>
      </div>
      </a>
      @endforeach

    </div>
  </div>
</div>
<div class="media-container-row" style="position:relative;top:30px;left:0;right:0">
<span class="align-center">  {!! $books->links() !!}</span>
</div>

</section>

@extends('front.footer')


