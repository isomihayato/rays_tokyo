@extends('layouts.app')

@section('content')
<style media="screen">
  td {
    vertical-align: middle;
  }
</style>
{{ $articles->links() }}
<div class="row mt-3 mb-3">
  <div class="col-6">
    <h3>Articles</h3>
  </div>
</div>
<table class="table table-striped text-center mt-5">
  <thead>
    <th>Edit</th>
    <th style="width:10vw;">Thumbnail</th>
    <th style="width:30vw;">title</th>
    <th>Author</th>
    <th style="width:10vw;">Create Date</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach ($articles as $article)
    <tr>
        <td style="vertical-align:middle;">{{ link_to_route('articles.edit',$article->id,['article'=>$article->id]) }}</td>
        <td style="vertical-align:middle;">
            <img src="/storage/{{ $article->thumbnail }}" width="100" height="100" alt="">
        </td>
        <td style="vertical-align:middle;">{{$article->title}}</td>
        <td style="vertical-align:middle;">{{$article->user->name}}</td>
        <td style="vertical-align:middle;">{{$article->created_at}}</td>
        <td style="vertical-align:middle;">
          {!! Form::open(['route'=>['articles.destroy',$article->id],'method'=>'delete']) !!}
          {!! Form::button('<i class="fas fa-backspace"></i>', ['class' => "btn", 'type' => 'submit']) !!}
          {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection