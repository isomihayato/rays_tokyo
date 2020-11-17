@extends('layouts.page_sub')

@section('content')
<div class="content__center" style="margin-bottom:0;">
  <div class="area_title text-center">
     Blog
    <small>ブログ一覧</small>
  </div>
</div>

<section class="content">

  <div class="content__left" style="margin-top:0;">
    <div class="middlesize_title">
      CATEGORY : {{$article->category->title}}
    </div>
    <div class="middlesize_title">
      TITLE : {{$article->title}}
    </div>
    <div class="body">
      {!! $article->body !!}
    </div>
  </div>
</section>

@endsection
