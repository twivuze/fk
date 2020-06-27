<div class="table-responsive">
    <table class="table" id="teams-table">
        <thead>
         <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Country</th>
        <!-- <th>Bio</th> -->
        <th>Team Category</th>
        <th>Published</th>
        <th>Numbering</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{!! $team->name !!}</td>
            <td>{!! $team->title !!}</td>
            <td>{!! $team->country !!}</td>
            <!-- <td>{!! $team->bio !!}</td> -->
            <td>{!! $team->category?$team->category->name:'' !!}</td>
            <td>{!! $team->published?'Yes':'No' !!}</td>
            <td>{!! $team->numbering !!}</td>
                <td>
                    {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('teams.show', [$team->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('teams.edit', [$team->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
