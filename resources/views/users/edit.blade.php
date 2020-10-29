@extends('layouts.app')

@section('content')

    <h1>User ID: {{ $user->id }} </h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role', 'Role:') !!}
                    {!! Form::select('role', $authes, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'New Password:') !!}
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                </div>


                {!! Form::submit('Update!', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
