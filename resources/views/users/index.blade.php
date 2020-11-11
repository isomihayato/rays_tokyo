@extends('layouts.app')

@section('content')
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Users</h3>
  </div>
</div>
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
            <td>
              @if (!is_null($user->role))
              {{ ['1'=>'admin','2'=>'OWNER','5'=>'MANAGER','7'=>'STAFF'][strtoupper($user->role)] }}
              @endif
            </td>
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
