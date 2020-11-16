@extends('layouts.pc_page_sub')
<link rel="stylesheet" href="/css/pc_gallery.css">
@section('content')

<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  body {
    background: #eee;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
  }

  .swiper-container {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    background-repeat: no-repeat;
    background-size: contain;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
  }
</style>

<h3 class="text-center center mt-5">GALLERY<small>タトゥーギャラリー</small></h3>

<section class="content">

  @foreach ($users as $user)
  <h3>{{$user->name}}</h3>
  <div class="content__left">
    <div class="z_card">
      @foreach($user->ecimages()->where('place','gallery')->get() as $ecimage)
      <div class="thumbnail" style="background-image:url(/storage/{{$ecimage->path}})"></div>
      @endforeach
      <div class="body">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              @foreach ($user->tattoos as $tattoo)
              <div class="swiper-slide" style="background-image:url(./storage/{{$tattoo->path}});width:300px;height:300px;z-index:999;"></div>
              @endforeach  </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
      </div>
    </div>
  </div>
      {{ $user->tattoos->links() }}
  @endforeach

<script type="text/javascript">
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
</script>

</section>
@endsection
