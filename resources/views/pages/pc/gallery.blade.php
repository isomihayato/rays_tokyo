@extends('layouts.page_sub')
<link rel="stylesheet" href="/css/sp_gallery.css">

@section('content')

<style media="screen">
  .gallery-container {
    width: 100%;
    height: 50vh;
    padding:20px 0;
  }
  .swiper-slide {
    width: 80px;
    height: 80px;
    background-position: center;
    background-size: cover;
  }
</style>

<section class="header">
  <div class="head_nav">
    @include('commons.page_navbar')
  </div>
</section>

<section class="content">
  <div class="content__center">
    <div class="area_title text-center">
      Gallery
      <small>タトゥーギャラリー</small>
    </div>
  </div>

  @foreach ($users as $user)
  <div class="content__left">
    <div class="area_title">
      {{$user->name}}
    </div>
    <div class="z_card">
      @foreach($user->ecimages as $ecimage)
      <div class="thumbnail" style="background-image:url(/storage/{{$ecimage->path}})">
        <img src="/storage/{{$ecimage->path }}" alt="">
      </div>
      @endforeach
      <div class="body">
          <div class="gallery-container">
              <div class="swiper-wrapper">
                @foreach ($user->tattoos as $tattoo)
                <div class="swiper-slide" style="background-image:url(./storage/{{$tattoo->path}});width:300px;height:300px;z-index:999;"></div>
                @endforeach
              </div>
          </div>
      </div>
    </div>
  </div>
      {{ $user->tattoos->links() }}
  @endforeach

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
</script>

</section>
@endsection
