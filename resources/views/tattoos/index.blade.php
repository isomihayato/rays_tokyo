@extends('layouts.app')
<style media="screen">
  ul{
    padding: 0;
  }
  li{
    list-style: none;
  }
  td{
    vertical-align: middle !important;
  }
</style>
@section('content')

<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Tattoos</h3>
  </div>
</div>
{!! Form::open(['route' => 'tattoos.index']) !!}
{!! Form::label('current', 'Show Current') !!}
{!! Form::month('current',$current) !!}
{!! Form::submit('Show') !!}
{!! Form::close() !!}
<div style="width:60vw;height:70vh;overflow:scroll;display:block;margin:0 auto;">
  <table class="table text-center"  align="center">
      <thead>
          <th>ID</th>
          <th>Order</th>
          <th>Artist</th>
          <th>Tattoo</th>
          <th>Display in</th>
          <th>Delete</th>
      </thead>
    <tbody>
        @foreach ($tattoos as $tattoo)
        <tr>
            <td>{{ link_to_route('tattoos.edit',$tattoo->id,['tattoo'=>$tattoo->id]) }}</td>
            <td >
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
            <td >{{ $tattoo->user->name }}</td>
            <td>
              <img src="{{ $tattoo->path }}" width="100" height="100">
            </td>
            <td >
              <ul>
                @foreach (explode(',',$tattoo->displayed_in) as $place)
                <li>
                  {{ strtoupper($place) }}
                </li>
                @endforeach
              </ul>
            </td>
            <td >
              {!! Form::open(['route'=>['tattoos.destroy',$tattoo->id],'method'=>'delete']) !!}
              {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
              {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
