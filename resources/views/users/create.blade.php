@extends('layouts.app')

@section('content')
@include('commons.error_messages')

<h1>Create User</h1>

<div class="row">
    <div class="col-6">
        {!! Form::model($user, ['route' => 'users.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role', 'Role:') !!}
                {!! Form::select('role', $authes, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('login_id', 'Login ID(String > 8)') !!}
                {!! Form::text('login_id', old('login_id'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('belongs_to', 'Belongs:') !!}
                <!-- blockが欲しかっただけ -->
                <div class=""></div>
                <!-- End -->
                {!! Form::label('belongs_to', 'KYOTO') !!}
                {!! Form::checkbox('belongs_to[]', 'kyoto', null) !!}
                {!! Form::label('belongs_to', 'TOKYO') !!}
                {!! Form::checkbox('belongs_to[]', 'tokyo',null) !!}
                {!! Form::label('belongs_to', 'TAIPEI') !!}
                {!! Form::checkbox('belongs_to[]', 'taipei',null) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirmation') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>

@endsection
