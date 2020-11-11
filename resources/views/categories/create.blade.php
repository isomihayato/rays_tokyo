@extends('layouts.app')

@section('content')

{!! Form::model($category,['route' => 'categories.store']) !!}
<div class="container">
  <div class="row mt-3 mb-3">
      <div class="col-6">
          {!! Form::label('title', 'Titile') !!}
          {!! Form::text('title',null,['style'=>'width:30vw;']) !!}
      </div>
  </div>
  <div class="row mt-3 mb-3">
      <div class="col-6">
        {!! Form::submit('Save!') !!}
      </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
