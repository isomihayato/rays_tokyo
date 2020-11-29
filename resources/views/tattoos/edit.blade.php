@extends('layouts.app')
<link rel="stylesheet" href="/css/dropzone.css">
@section('content')
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Update Tattoos</h3>
  </div>
</div>

{!! Form::model($tattoo,['route' => ['tattoos.update',$tattoo->id],'method'=>'put','drop-zone'=>'','id'=>'file-dropzone','files'=>true]) !!}
<div class="container">
  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::label('image', 'Thumbnail') !!}
        {!! Form::file('image') !!}
        <img src="{{$tattoo->path}}" width="100" height="100" alt="">
      </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::label('insert_at', 'Append month') !!}
      {!! Form::month('insert_at',$tattoo->created_at) !!}
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::label('displayed_in', 'KYOTO') !!}
      {!! Form::checkbox('displayed_in[]', 'kyoto') !!}
      {!! Form::label('displayed_in', 'TOKYO') !!}
      {!! Form::checkbox('displayed_in[]', 'tokyo') !!}
      {!! Form::label('displayed_in', 'TAIPEI') !!}
      {!! Form::checkbox('displayed_in[]', 'taipei') !!}
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::label('artist', 'Artist') !!}
      {!! Form::select('artist',$artists,$tattoo->user_id) !!}
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <div class="col-6">
      {!! Form::submit('Upload',['id'=>'submit_btn']) !!}
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
