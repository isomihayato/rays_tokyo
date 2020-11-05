@extends('layouts.app')

@section('content')

<h3>画像アップロード</h3>

{!! Form::model($tattoo,['route' => 'tattoos.store','files'=>true]) !!}
<div class="container">
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('images', 'Upload Files') !!}
          {!! Form::file('images',['name'=>'images[]','multiple'=>true]) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::label('insert_at', 'Upload Files') !!}
        {!! Form::month('insert_at',now()) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::label('artist', 'Artist') !!}
        {!! Form::select('artist',$artists,Auth::id()) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::submit('Upload') !!}
      </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
