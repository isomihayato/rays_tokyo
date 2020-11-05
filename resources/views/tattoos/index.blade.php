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
          <td>{{ $tattoo->order }}</td>
          <td>
            <img src="/storage/{{ $tattoo->path }}" width="200">
          </td>
          <td>
              {!! Form:open(['route' => ['users.destroy','tattoo->order']])!!}
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection
