@extends('layouts.page')
<!-- Demo styles -->
<style>


  .gallery-container {
    width: 100%;
    height: 50vh;
    padding:20px 0;
  }

  .swiper-slide {
    width: 100px;
    height: 100px;
    background-position: center;
    background-size: cover;
  }
</style>
@section('content')
<section class="header">
  <div class="head_nav">
    @include('commons.page_navbar')
  </div>
  <div class="top_message">
    Nothing's Gonna change our hungriness.
    <small>unwavering determination</small>
  </div>
  <div class="kv">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="/kv/01.jpeg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/02.jpg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/03.jpeg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/04.jpg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/05.jpg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/06.jpg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/07.jpg" width="400" height="500">
        </div>
        <div class="swiper-slide">
          <img src="/kv/08.jpg" width="400" height="500">
        </div>

      </div>
    </div>
  </div>
</section>


<section class="content">
    <div class="content__left" style="margin-top:0;">
      <div class="area_title">
        News & Blogs
        <small>ブログ&ニュース</small>
      </div>
      <div class="body">
        <ul class="blogs mtb-5vh mlr-20px">
          @foreach ($articles as $article)
          <li>
            <img src="/storage/{{$article->thumbnail}}" alt="">
            <div class="wrapper">
              <div class="blogs_created_at">
                {{ (new DateTime($article->created_at))->format("Y.m.d") }}
              </div>
              <div class="blogs_title">Title: {{$article->title}}</div>
              <div class="blogs_body">{!! mb_strcut($article->body,0,50) !!}</div>
            </div>
          </li>
          <hr>
          @endforeach
        </ul>
      </div>
      <div class="anchor_arrow">
        <a href="#"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="content__center">
      <div class="area_title text-center">
        Gallery
        <small>タトゥーギャラリー</small>
      </div>
      <div class="body mb-3" style="overflow:hidden;">
        <div class="gallery-container"style="height:300px;">
            <div class="swiper-wrapper">
              @foreach ($tattoos as $tattoo)
              <div class="swiper-slide" style="background-image:url(./storage/{{$tattoo->path}});width:300px;height:300px;"></div>
              @endforeach
            </div>
          </div>
      </div>
      <div class="anchor_arrow">
        <a href="#"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="content__left mt-5">
      <div class="area_title">
        System
        <small>施術情報</small>
      </div>
      <div class="body">
        <p>当店での、施術を行うための事前知識をご説明いたします。</p>
      </div>
      <div class="anchor_arrow">
        <a href="#"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

    <div style="margin:1vh 0;"></div>

    <div class="content__center">
      <div class="area_title text-center" style="margin-bottom:0;">
        Artist
        <small>アーティスト</small>
      </div>
      <div class="body">
        <div id="mybook"></div>
      </div>
      <div class="anchor_arrow">
        <a href="#"><i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="content__left">
      <div class="area_title">
        Youtube
        <small>ユーチューブ</small>
      </div>
      <div class="body">
        <iframe class="youtube" src="https://www.youtube.com/embed/8gVHxJl-2Hg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
      </div>
    </div>

    <div class="content__center">
      <div class="area_title text-center">
        Access
        <small>店舗情報</small>
      </div>
      <div class="body">
        <div class="outer">
          <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d816.9045692251021!2d135.7784338!3d35.0162595!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x41975523df201a95!2sTATTOO+STUDIO+Ray&#39;s!5e0!3m2!1sja!2sjp!4v1520754949742" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <div class="content__center">
      <div class="area_title text-center">
        ONLINE STORE
        <small>レイズストアー</small>
      </div>
      <div class="body">
        <a href="#">
          <img src="/images/icon/store.jpg" width="300" alt="store">
        </a>
      </div>
    </div>
</section>


<section class="footer">
  <div class="outer">
    <div class="footer__emb">
      <img src="/images/logos/footer_emb.jpg">
    </div>
    <div class="footer__navs">
      <table>
        <tbody>
          <tr>
            <td>HOME</td>
            <td>GALLERY</td>
          </tr>
          <tr>
            <td>SYSTEM</td>
            <td>TECHNIQUE</td>
          </tr>
          <tr>
            <td>ARTIST</td>
            <td>ABOUT US</td>
          </tr>
          <tr>
            <td>BLOGS</td>
            <td>RECRUIT</td>
          </tr>
          <tr>
            <td>CONTACT</td>
            <td>ONLINE STORE</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="footer__card">
      <img src="/images/icon/cards.png" alt="">
    </div>
    <div class="footer__sns">
      <i class="far fa-envelope"></i>
      <i class="fab fa-twitter-square"></i>
      <i class="fab fa-facebook-square"></i>
      <img src="/images/sns/b.png" alt="b">
      <i class="fab fa-line"></i>
    </div>
    <hr>
    <div class="footer__copyright">
      ©TATTOO STUDIO Ray's All Rights Reserved.
    </div>
  </div>
</section>


<script>
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

var src = [ '/images/artists/01.jpg', '/images/artists/02.jpg', '/images/artists/03.jpg'];

$('#mybook').onebook(src);
</script>
@endsection
