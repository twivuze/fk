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
        @foreach($activeApplicants as $activeApplicant)
            <tr>
                <td>{!! $activeApplicant->full_name !!}</td>
                <td>{!! $activeApplicant->email !!}</td>
                <td>{!! $activeApplicant->address !!}</td>
                <td>{!! $activeApplicant->religion !!} </td>
                <td>{!! $activeApplicant->marital_status !!}</td>
                <td>{!! $activeApplicant->gender !!}</td>
                <td>{!! $activeApplicant->phone_number !!}</td>
               
                <td>{!! $activeApplicant->created_at !!}</td>
       
                <td>
                   
                {!! Form::open(['route' => ['microFundApplications.destroy', $activeApplicant->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                        <?php if($activeApplicant->user_id){ ?>
                            <a href="/check-microfound-user/{{$activeApplicant->id}}" class='btn btn-default btn-xs'>
                                Update User Acount
                            </a>
                            <?php } ?>
                            <?php if(!$activeApplicant->user_id){ ?>
                            <a href="/check-microfound-user/{{$activeApplicant->id}}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-user"></i> Create User Acount
                            </a>
                            <?php } ?>

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
