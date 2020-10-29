@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Authority</th>
            <th>Delete Btn</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>
              {!! link_to_route('users.edit',$user->id,['user' => $user->id]) !!}
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ strtoupper($user->role) }}</td>
            <td>
            {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
