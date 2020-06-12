{!! Form::open(['route' => ['transfers.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
   
    <?php $invoice= \App\Models\Transfer::where('id',$id)->first();
if($invoice){
?>

<a href="/enterprise-details/{{$invoice->enterprise_id}}" onclick="centeredPopup(this.href,'myWindow','900','600','yes');return false" class='btn btn-default btn-xs'>
        <i class="fa fa-money"></i> 
    </a>
<?php } ?>

<a href="{{ route('transfers.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    
    <?php if(\Auth::user()->type=='Admin'){ ?>
    <a href="{{ route('transfers.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    <?php } ?>
</div>
{!! Form::close() !!}
