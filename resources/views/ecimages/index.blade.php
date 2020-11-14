@extends('layouts.app')

@section('content')

<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>ecimages</h3>
  </div>
</div>

<table class="table text-center mt-5" style="width:50vw;" align="center">
    <thead>
        <th>id</th>
        <th>place</th>
        <th>image</th>
        <th>Delete</th>
    </thead>
  <tbody style="overflow:scroll;">
      @foreach ($ecimages as $ecimage)
      <tr>
          <td style="vertical-align:middle;">
            {!! link_to_route('ecimages.edit',$ecimage->id,['ecimage' => $ecimage->id]) !!}
          </td>
          <td>{{$ecimage->place}}</td>
          <td>
            <img src="/storage/{{ $ecimage->path }}" width="200" height="200">
          </td>
          <td style="vertical-align:middle;">
            {!! Form::open(['route'=>['ecimages.destroy',$ecimage->id],'method'=>'delete']) !!}
            {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
            {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection
