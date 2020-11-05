@extends('layouts.app')

@section('content')

<h3>画像アップロード</h3>

<div class="row">
    <div class="col-6">
        {!! Form::model($tattoo,['route' => 'tattoos.store','files'=>true]) !!}
        {!! Form::label('images', 'Upload Files') !!}
        {!! Form::file('images',['name'=>'images[]','multiple'=>true]) !!}
        {!! Form::label('insert_at', 'Upload Files') !!}
        {!! Form::month('insert_at',now()) !!}
        {!! Form::label('artist', 'Artist') !!}
        {!! Form::select('artist',$artists,Auth::id()) !!}
        {!! Form::submit('Upload') !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
