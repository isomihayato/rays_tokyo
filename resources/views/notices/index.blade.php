@extends('layouts.app')

@section('content')
<style media="screen">
  td {
    vertical-align: middle;
  }
</style>
{{ $notices->links() }}
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Notices</h3>
  </div>
</div>
<table class="table table-striped text-center mt-5">
  <thead>
    <th>Edit</th>
    <th style="width:30vw;">title</th>
    <th style="width:10vw;">Create Date</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach ($notices as $notice)
    <tr>
        <td style="vertical-align:middle;">{{ link_to_route('notices.edit',$notice->id,['notice'=>$notice->id]) }}</td>
        <td style="vertical-align:middle;">{{$notice->title}}</td>
        <td style="vertical-align:middle;">{{$notice->created_at}}</td>
        <td style="vertical-align:middle;">
          {!! Form::open(['route'=>['notices.destroy',$notice->id],'method'=>'delete']) !!}
          {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
          {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
