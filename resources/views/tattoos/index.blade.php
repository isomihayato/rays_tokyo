@extends('layouts.app')

@section('content')

<table class="table text-center">
    <thead>
        <th>Order</th>
        <th>Tattoo</th>
        <th>Delete</th>
    </thead>
  <tbody style="overflow:scroll;">
      @foreach ($tattoos as $tattoo)
      <tr>
          <td style="vertical-align:middle;">
            {!! Form::open(['route'=>['tattoos.arrange'],'method'=>'post']) !!}
            {!! Form::hidden('tattoo_id',$tattoo->id) !!}
            {!! Form::hidden('arrange','up') !!}
            {!! Form::button('<i class="fas fa-arrow-up"></i>',['class' => "btn", 'type' => 'submit']) !!}
            {!! Form::close() !!}
            {!! Form::open(['route'=>['tattoos.arrange'],'method'=>'post']) !!}
            {!! Form::hidden('tattoo_id',$tattoo->id) !!}
            {!! Form::hidden('arrange','down') !!}
            {!! Form::button('<i class="fas fa-arrow-down"></i>',['class' => "btn", 'type' => 'submit']) !!}
            {!! Form::close() !!}
          </td>
          <td>
            <img src="/storage/{{ $tattoo->path }}" width="200">
          </td>
          <td style="vertical-align:middle;">
            {!! Form::open(['route'=>['tattoos.destroy',$tattoo->id],'method'=>'delete']) !!}
            {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
            {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection