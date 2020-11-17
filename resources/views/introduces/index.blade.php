@extends('layouts.app')

@section('content')
<style media="screen">
  td {
    vertical-align: middle;
  }
</style>
{{ $introduces->links() }}
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Notices</h3>
  </div>
</div>
<table class="table table-striped text-center mt-5" style="width:40vw;height:70vh;overflow:scroll;display:block;">
  <thead>
    <th>Edit</th>
    <th style="width:30vw;">title</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach ($introduces as $introduce)
    <tr>
        <td style="vertical-align:middle;">{{ link_to_route('introduces.edit',$introduce->id,['introduce'=>$introduce->id]) }}</td>
        <td style="vertical-align:middle;">{{$introduce->title}}</td>
        <td style="vertical-align:middle;">
          {!! Form::open(['route'=>['introduces.destroy',$introduce->id],'method'=>'delete']) !!}
          {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
          {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
