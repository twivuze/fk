<div class="table-responsive">
    <table class="table" id="links-table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Region </th>
            <th>Country</th>
            <th>Ocupation</th>
            <th>Organization</th>
        <th >Action</th>
       
         </tr>
        </thead>
        <tbody>
        @foreach($inActiveApplicants as $activeApplicant)
            <tr>
                <td>{!! $activeApplicant->name !!}</td>
                <td>{!! $activeApplicant->email !!}</td>
                <td>{!! $activeApplicant->address !!}</td>
                
                <td>{!! $activeApplicant->region !!}</td>
                <td>{!! $activeApplicant->country !!} </td>
                <td>{!! $activeApplicant->occupation !!}</td>
                <td>{!! $activeApplicant->organization !!}</td>
       
                <td>
                   
                {!! Form::open(['route' => ['centers.destroy', $activeApplicant->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                      
                            <a href="{{ route('centers.show', $activeApplicant->id) }}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('centers.edit', $activeApplicant->id) }}" class='btn btn-default btn-xs'>
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
