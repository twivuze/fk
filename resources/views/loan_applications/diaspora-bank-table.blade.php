<div class="table-responsive">
    <table class="table" id="links-table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Country </th>
            <th>Region </th>
            <th>Marital status</th>
            <th>Status</th>
            <th>Category</th>
            <th>Views</th>
           <th >Action</th>
       
         </tr>
        </thead>
        <tbody>
        @foreach($diasporaBank as $activeApplicant)
            <tr>
                <td>{!! $activeApplicant->name !!}</td>
                <td>{!! $activeApplicant->email !!}</td>
                <td>{!! $activeApplicant->address !!}</td>
                <td>{!! $activeApplicant->country !!} </td>
              
                <td>{!! $activeApplicant->region !!}</td>
                

                <td>{!! $activeApplicant->marital_status !!}</td>
                <td>{!! $activeApplicant->status !!}</td>
                <td>{!! $activeApplicant->category !!}</td>
                <td>{!! $activeApplicant->views !!}</td>
                
                <td>
                   
                {!! Form::open(['route' => ['loanApplications.destroy', $activeApplicant->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                       
                          
                            <a href="{{ route('microFundApplications.show', $activeApplicant->id) }}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('microFundApplications.edit', $activeApplicant->id) }}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                          
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')"
                            ]) !!}
                        </div>
                        {!! Form::close() !!}

                </td>
               
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
