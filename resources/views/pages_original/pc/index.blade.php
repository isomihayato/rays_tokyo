@extends('layouts.pc_page')
<!-- Demo styles -->
<style>


  .gallery-container {
    width: 100%;
    height: 50vh;
    padding:20px 0;
  }

  .swiper-slide {
    width: 600px;
    background-position: center;
    background-size: cover;
  }
</style>
@section('content')
<section class="header">
    @include('commons.pc.page_navbar')
  <div class="kv">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="/kv/pc/01.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/02.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/03.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/04.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/05.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/06.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/07.jpg" width="800" height="600">
        </div>
        <div class="swiper-slide">
          <img src="/kv/pc/08.jpg" width="800" height="600">
        </div>

      </div>
    </div>
  </div>
</section>


<section class="content">
  <h3>News & Blogs  <small>ブログニュース</small></h3>
    <div class="content__left_blogs" style="overflow:scroll;">
      <div class="body">
        <ul class="blogs">
          @foreach ($articles as $article)
          <li>
            <img src="/storage/{{$article->thumbnail}}" alt="">
            <div class="wrapper">
              <div class="blogs_created_at">
                {{ (new DateTime($article->created_at))->format("Y.m.d") }}
              </div>
              <div class="blogs_title">Title: {{$article->title}}</div>
              <div class="blogs_body">{!! mb_strcut(strip_tags(str_replace("\r\n", '', $article->body)),0,50) !!}</div>
            </div>
          </li>
          <hr>
          @endforeach
        </ul>
      </div>
    </div>
    <button type="button" class="btn btn-outline-dark center more_btn mt-5 mb-5">More</button>

    <h3>GALLERY <small>ギャラリー</small> </h3>


    <div class="content__center">
      <div class="body" style="overflow:hidden;">
        <div class="gallery-container"style="height:300px;">
            <div class="swiper-wrapper">
              @foreach ($tattoos as $tattoo)
              <div class="swiper-slide" style="background-image:url(./storage/{{$tattoo->path}});width:300px;height:300px;"></div>
              @endforeach
            </div>
          </div>
      </div>
    </div>
    <button type="button" class="btn btn-outline-dark center more_btn mt-5 mb-5">More</button>


    <h3>SYSTEM <small>施術情報</small></h3>

    <div class="content__left">
      <div class="body">
        <p>当店での、施術を行うための事前知識をご説明いたします。</p>
      </div>
    </div>
    <button type="button" class="btn btn-outline-dark center more_btn mt-5 mb-5">More</button>


    <h3>ARTIST<small>アーティスト</small></h3>

    <div class="content__left">
      <div class="body">
        <div id="mybook" class="center"></div>
      </div>
    </div>
    <button type="button" class="btn btn-outline-dark center more_btn mt-5 mb-5">More</button>


    <h3>YOUTUBE<small>ユーチューブ</small></h3>
    <div class="content__left">
      <div class="body">
        <div class="youtube_outer center">
          <iframe class="youtube" src="https://www.youtube.com/embed/8gVHxJl-2Hg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"style="width:inherit;height:inherit;"></iframe>
        </div>
      </div>
    </div>

    <h3>ACCESS<small>アクセス</small></h3>

    <div class="content__left">
      <div class="body">
        <div class="map_outer center">
          <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d816.9045692251021!2d135.7784338!3d35.0162595!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x41975523df201a95!2sTATTOO+STUDIO+Ray&#39;s!5e0!3m2!1sja!2sjp!4v1520754949742" style="width:inherit;height:inherit;" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <h3>ONLINE STORE</h3>

    <div class="content__left">
      <div class="body">
        <div class="text-center">
          <a href="#">
            <img src="/images/icon/store.jpg" width="300" alt="store">
          </a>
        </div>
      </div>
    </div>
</section>

<hr>

<section class="footer">
  <div class="outer">
    <div class="footer__emb">
      <img src="/images/logos/footer_emb.jpg">
      <p>TATTOO STUDIO Ray's <br>
          〒606-8351<br>
          京都市左京区岡崎徳成町27-15（受付：1F）<br>
          Open：10：00〜<br>
          Closed：不定休</p>
    </div>
    <table class="table table-borderless footer__table">
      <tbody>
        <tr>
          <td>
            <ul>
              <li>■&nbsp;HOME</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>■&nbsp;SYSTEM</li>
              <li> <a href="#">・Precautions</a> </li>
              <li> <a href="#">・Price</a> </li>
              <li> <a href="#">・Reservation Flow</a> </li>
            </ul>
          </td>
          <td>
            <ul>
              <li>■&nbsp;TECHNIQUE</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>■&nbsp;TATTOO GALLERY</li>
            </ul>
          </td>
          <td>
            <img src="/images/icon/cards.png" alt=""class="sns_card_img">
          </td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>■&nbsp;ARTIST</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>■&nbsp;ABOUT US</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>■&nbsp;CONTACT</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>■&nbsp;SHARE</li>
              <li>
                <div class="footer__sns">
                  <i class="far fa-envelope"></i>
                  <i class="fab fa-twitter-square"></i>
                  <i class="fab fa-facebook-square"></i>
                  <img src="/images/sns/b.png" alt="b" class="sns_img">
                  <i class="fab fa-line"></i>
                </div>
              </li>
            </ul>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <hr>
  <div class="footer__copyright">
    ©TATTOO STUDIO Ray's All Rights Reserved.
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
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});

var src = [ '/images/artists/01.jpg', '/images/artists/02.jpg', '/images/artists/03.jpg'];

$('#mybook').onebook(src);
</script>
@endsection
