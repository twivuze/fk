
<div class="row">

@foreach($aboutContents as $photo)

<div class="col-sm-3 col-md-3 m-1 bg-white">
    <a class="lightbox" href="/{{$photo->image}}">
        <img src="/{{$photo->image}}" class="img-fluid" style="width:100%;height:180px"  alt="{{$photo->image}}">
    </a>
          {!! Form::open(['route' => ['aboutContents.destroy', $photo->id], 'method' => 'delete']) !!}
           
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
           
            {!! Form::close() !!}
</div> 

@endforeach
</div>

