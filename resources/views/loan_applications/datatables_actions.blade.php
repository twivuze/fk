{!! Form::open(['route' => ['loanApplications.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
<?php $enterprise= \App\Models\LoanApplication::where('id',$id)->where('approved',1)->orderBy('id','DESC')->first();
if($enterprise){
?>

<a href="/enterprise-details/{{$id}}" onclick="centeredPopup(this.href,'myWindow','900','600','yes');return false" class='btn btn-default btn-xs'>
        <i class="fa fa-money"></i> 
    </a>
<?php } ?>
    <a href="{{ route('loanApplications.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('loanApplications.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i> 
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
