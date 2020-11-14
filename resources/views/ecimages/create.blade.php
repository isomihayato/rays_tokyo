@extends('layouts.app')

@section('content')
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Create ecimages</h3>
  </div>
</div>

{!! Form::model($ecimage,['route' => 'ecimages.store','files'=>true]) !!}
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
        {!! Form::select('artist',$artists,Auth::id()) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('images', 'Upload Files') !!}
          {!! Form::file('images',['name'=>'images[]','multiple'=>true]) !!}
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
