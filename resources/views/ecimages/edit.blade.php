@extends('layouts.app')

@section('content')
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Create ecimages</h3>
  </div>
</div>

{!! Form::model($ecimage,['route' => ['ecimages.update',$ecimage->id],'method'=>'put','files'=>true]) !!}
<div class="container">
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('place', 'place') !!}
          {!! Form::text('place') !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::label('artist', 'Artist') !!}
        {!! Form::select('artist',$artists,$ecimage->user->id) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('image', 'Upload Files') !!}
          {!! Form::file('image') !!}
          <img src="/storage/{{$ecimage->path}}" width="200" alt="">
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
