@extends('layouts.app')

@section('content')

<table class="table" style="width:40vw;height:70vh;overflow:scroll;display:block;">
  <thead>
    <th>ID</th>
    <th>Title</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td>
        {{ link_to_route('categories.edit',$category->id,['category'=>$category->id]) }}
      </td>
      <td>{{$category->title}}</td>
      <td>
        {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'delete']) !!}
        {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
