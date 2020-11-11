@extends('layouts.app')

@section('content')

<h3>Infomation</h3>

<table class="table text-center mt-5" align="center" style="width:50vw;">
  <thead>
    <th style="width:15vw;">Date</th>
    <th>Title</th>
  </thead>
  <tbody>
    @foreach ($notices as $notice)
    <tr>
      <td>{{(new Datetime($notice->created_at))->format("Y/m/d")}}</td>
      <td>{!! link_to_route('notices.show',$notice->title,['notice'=>$notice->id]) !!}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
