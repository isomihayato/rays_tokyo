@extends('layouts.page_sub')
<link rel="stylesheet" href="/css/sp_artist.css">

@section('content')
<style media="screen">
.swiper-container {
  width: 100%;
  height: 85vh;
  padding:10px 0;
}
.gallery-container {
  width: 100%;
  height: 50vh;
  padding:20px 0;
}
.swiper-slide {
  width: 100%;
  height: 550px;
  background-position: center;
  background-size: cover;
}
</style>


<section class="header">
  <div class="head_nav">
    @include('commons.page_navbar')
  </div>
</section>

<div class="content__center" style="margin-bottom:0;">
  <div class="area_title text-center">
    Artists
    <small>アーティスト</small>
  </div>
</div>

<section class="content">

  <div class="content__center" style="margin:0;">
    <div class="area_title text-center">
      {{$artist->name}}
    </div>
    <div class="body mb-3" style="overflow:hidden;">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          @foreach ($artist->ecimages()->where('place','artist')->get() as $ecimage)
          <div class="swiper-slide">
            <img src="/storage/{{$ecimage->path}}" width="360">
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="content__center" style="margin:0;">
    <div class="area_title text-center">
      Biography
    </div>
  </div>
  <div class="text-center mb-5">
    <div class="insta_icon">
      <i class="fab fa-instagram"></i>
    </div>
    <div class="insta_id">
      @rays.{{strtolower(explode(" ",$artist->name)[0])}}
    </div>
  </div>

  <div class="accordion" id="accordionExample">
    @foreach ($artist->introduces as $introduce)
  <div class="card">
    <div class="card-header" id="{{$introduce->id}}">
      <h5 class="mb-0 text-center">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$introduce->id}}"
           aria-expanded="false" aria-controls="collapse{{$introduce->id}}">
          {{$introduce->title}}
        </button>
      </h5>
    </div>
    <div id="collapse{{$introduce->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        {!! $introduce->body !!}
      </div>
    </div>
  </div>
    @endforeach
</div>

<div id="gallery"></div>
<div class="content__center">
  <div class="area_title text-center">
    Gallery
    <small>ギャラリー</small>
  </div>
</div>
<div style="overflow:hidden;">
  <div class="gallery-container">
      <div class="swiper-wrapper">
        @foreach ($artist->tattoos as $tattoo)
        <div class="swiper-slide" style="background-image:url(./storage/{{$tattoo->path}});width:300px;height:300px;z-index:999;"></div>
        @endforeach
      </div>
  </div>
</div>
</section>
{{ $artist->tattoos->links() }}


<script type="text/javascript">
var swiper = new Swiper('.gallery-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: '.swiper-pagination',
    },
});

var swiper = new Swiper('.swiper-container', {
  slidesPerView: 'auto',
  spaceBetween: 30,
  effect: 'fade',
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});
</script>
@endsection
