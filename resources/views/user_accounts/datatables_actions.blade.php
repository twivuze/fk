{!! Form::open(['route' => ['userAccounts.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
  
    <a href="{{ route('userAccounts.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    
    
    <?php
     $user= \App\User::find($id);
    if($user->type!='Admin'){ ?>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}

    <?php }?>
</div>
{!! Form::close() !!}
