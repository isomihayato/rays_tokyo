@extends('layouts.page_sub')

@section('content')
<div class="content__center" style="margin-bottom:0;">
  <div class="area_title text-center">
    {{$current->format('Y年m月')}} Blog
    <small>ブログ一覧</small>
  </div>
</div>

<section class="content">

  <div class="content__left" style="margin-top:0;">
    <div class="body">
      <ul class="blogs mtb-5vh mlr-20px">
        @foreach ($articles as $article)
        <a href="/blog?article={{$article->id}}">
          <li>
            <img src="/storage/{{$article->thumbnail}}" alt="">
            <div class="wrapper">
              <div class="blogs_created_at">
                {{ (new DateTime($article->created_at))->format("Y.m.d") }}
              </div>
              <div class="blogs_title">Title: {{$article->title}}</div>
              <div class="blogs_body">{!! mb_strcut(strip_tags(str_replace("\r\n", '', $article->body)),0,50); !!}</div>
            </div>
          </li>
        </a>
        <hr>
        @endforeach
      </ul>
    </div>
  </div>
</section>

@endsection
