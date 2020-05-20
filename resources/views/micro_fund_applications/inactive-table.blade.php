<div class="table-responsive">
    <table class="table" id="links-table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Region </th>
            <th>Marital status</th>
            <th>Gender</th>
            <th>Phone number</th>
            <th>Applied Date</th>
            <th >Action</th>
       
         </tr>
        </thead>
        <tbody>
        @foreach($inActiveApplicants as $inActiveApplicant)
            <tr>
                <td>{!! $inActiveApplicant->full_name !!}</td>
                <td>{!! $inActiveApplicant->email !!}</td>
                <td>{!! $inActiveApplicant->address !!}</td>
                <td>{!! $inActiveApplicant->religion !!} </td>
                <td>{!! $inActiveApplicant->marital_status !!}</td>
                <td>{!! $inActiveApplicant->gender !!}</td>
                <td>{!! $inActiveApplicant->phone_number !!}</td>
               
                <td>{!! $inActiveApplicant->created_at !!}</td>
       
                <td>
                   
                {!! Form::open(['route' => ['microFundApplications.destroy', $inActiveApplicant->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('microFundApplications.show', $inActiveApplicant->id) }}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('microFundApplications.edit', $inActiveApplicant->id) }}" class='btn btn-default btn-xs'>
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
