@extends('layouts.page_sub')
<link rel="stylesheet" href="/css/sp_artists.css">

@section('content')


<section class="header">
  <div class="head_nav">
    @include('commons.page_navbar')
  </div>
</section>

<div class="content__center">
  <div class="area_title text-center">
    Artists
    <small>アーティスト</small>
  </div>
</div>

<section class="content">

  <div class="container">
    <div class="row">
      @foreach ($artists as $artist)
      <a href="show_artist?artist={{$artist->id}}">
        <div class="col-sm mb-5">
          <div class="artist_name">{{$artist->name}}</div>
          <div class="artist_box" style="background-image:url(/storage/{{$artist->ecimages()->where('place','artists')->get()[0]->path}});height:100vh;"></div>
        </div>
      </a>
      @endforeach
    </div>
  </div>

</section>
@endsection
