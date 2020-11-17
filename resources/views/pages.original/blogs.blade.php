@extends('layouts.page_sub')

@section('content')
<div class="content__center" style="margin-bottom:0;">
  <div class="area_title text-center">
    Blogs
    <small>ブログ一覧</small>
  </div>
</div>

<section class="content">
  @foreach ($categories as $category)
  <div class="content__left" style="margin-top:0;">
    <div class="middlesize_title">
      {{$category->title}}
    </div>
    <div class="body">
      <ul class="blogs mtb-5vh mlr-20px">
        @foreach ($category->articles as $article)
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
  @endforeach

  <div class="content__left" style="margin-top:0;">
    <div class="middlesize_title">
      過去ログ
    </div>
    <div class="body">
      <ul class="blogs mtb-5vh mlr-20px">
        @foreach($logs as $key => $value)
        <a href="blogs_month?current={{$key}}"><li>{{$key}}({{$value}})</li></a>
        @endforeach
      </ul>
    </div>
  </div>

</section>

@endsection
