{!! Form::open(['route' => ['loanApplications.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
<?php $enterprise= \App\Models\LoanApplication::where('id',$id)->where('approved',1)->orderBy('id','DESC')->first();
if($enterprise){
?>

<a href="internal-funds/{{$id}}" onclick="centeredPopup(this.href,'myWindow','900','600','yes');return false" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-plus"></i> Internal Funds
    </a>
<?php } ?>
    <a href="{{ route('loanApplications.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i> View Details
    </a>
    <a href="{{ route('loanApplications.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i> Edit 
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
