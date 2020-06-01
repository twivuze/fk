{!! Form::open(['route' => ['conferenceApplications.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    
    <?php if(\Request::get('session')){ ?>
        <a href="{{ route('conferenceApplications.show', $id) }}?session={{\Request::get('session')}}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
        <a href="{{ route('conferenceApplications.edit', $id) }}?session={{\Request::get('session')}}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
       <?php }else{
        ?>
        <a href="{{ route('conferenceApplications.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
        <a href="{{ route('conferenceApplications.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a> 
    <?php } ?>
    
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
