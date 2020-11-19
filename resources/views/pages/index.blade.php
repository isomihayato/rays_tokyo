@extends('layouts.page')
<!-- Demo styles -->
<style media="screen">
  a{
    display: inline;
  }
</style>
@section('content')

@include('commons.header')

<section class="content">
  <div class="body mt-5">
    <p style="text-align: left;">TATTOO STUDIO Ray's TOKYOは、タトゥー</p>
    <p style="text-align: left;">スタジオレイズの東京支店です。</p>
    <p style="text-align: left;">&nbsp;</p>
    <p style="text-align: left;">東京スタジオでも、レイズクオリティのタトゥ</p>
    <p style="text-align: left;">ーアーティスト２〜３名が皆様をお出迎えいたし</p>
    <p style="text-align: left;">ます。徹底した衛生管理とクオリティの高いタ</p>
    <p style="text-align: left;">トゥーイング技術はこれまで沢山のお客様に</p>
    <p style="text-align: left;">喜ばれてきました。東京及関東一円のお客様に</p>
    <p style="text-align: left;">より便利に快適にタトゥーライフをお過ごしい</p>
    <p style="text-align: left;">ただくため、東京スタジオをOPENいたしま</p>
    <p style="text-align: left;">す。</p>
    <p style="text-align: left;">&nbsp;</p>
    <p style="text-align: left;">もちろんDaniel Ray Brewster（ダニエル・レ</p>
    <p style="text-align: left;">イ・ブルースター）も定期的に東京スタジオに</p>
    <p style="text-align: left;">てTATTOOの施術を行います。</p>
    <p style="text-align: left;">&nbsp;</p>
    <p style="text-align: left;">和彫り、洋彫り、ブラック＆グレイ、トライバ</p>
    <p style="text-align: left;">ルやチカーノ、そしてカバーアップに至るまで、</p>
    <p style="text-align: left;">オールジャンルのタトゥーに対応しておりま</p>
    <p style="text-align: left;">す。</p>
    <p style="text-align: left;">&nbsp;</p>
    <p style="text-align: left;">現在スタジオ出店準備中のため、タトゥーのご</p>
    <p style="text-align: left;">予約は受け付けておりません。</p>
    <p style="text-align: left;">詳細は決まり次第、随時公開いたします。</p>
  </div>
  <hr>


  <h4>TATTOO STUDIO Ray’s TOKYO</h4>
  <p class="address">〒151-0051 <br>東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F</p>
  <a href="https://goo.gl/maps/9UrbSRFEazBY94LRA" class="center">
    <div class="btn_box width_30 mb-5" style="font-size:.8rem; margin:0 auto;">
      ＞ Google Map
    </div>
  </a>
  <a href="https://lin.ee/6yIXkH5" class="mt-5">
    <p class="sns_p">
        LINE&nbsp;&nbsp;@tattoorays.tokyo
    </p>
  </a>
  <a href="https://twitter.com/rays_co">
    <p class="sns_p">
      Twitter&nbsp;&nbsp;@rays_co
    </p>
  </a>
  <div class="insta">
    <div id="insta-widget" class="iswg-base" data-username="tattoorays.tokyo" data-display-image-count="9" data-wrapper-width></div>
    <script src="https://cdn.jsdelivr.net/gh/akinov/insta_window@v1.0/dist/main.js"></script>
  </div>

  <hr>
  <a href="https://tattoo-rays.com/">
    <div class="btn_box pc_wide mt-2">
      KYOTO STUDIO
    </div>
  </a>
  <a href="https://tattoo-rays.tw/">
    <div class="btn_box pc_wide mt-5">
      TAIPEI STUDIO
    </div>
  </a>

  <hr>
</section>
<section class="footer">

    <ul>
      <li>
        <a href="https://lin.ee/6yIXkH5">
          <div class="btn_box pc_wide width_90">
            <i class="fab fa-line"></i>
            LINEでお問い合わせ
          </div>
        </a>
      </li>
      <li>
        <a href="https://raysco.shop/">
          <div class="btn_box  pc_wide width_90">
            ONLINE STORE
          </div>
        </a>
      </li>
      <li>
        <a href="https://www.instagram.com/tattoorays.tokyo/">
          <div class="btn_box  pc_wide width_90">
            <i class="fab fa-instagram"></i>
            INSTAGRAM
          </div>
        </a>
      </li>
      <li>
        <a href="https://www.youtube.com/watch?time_continue=1&v=8gVHxJl-2Hg&feature=emb_logo">
          <div class="btn_box pc_wide width_90">
            <i class="fab fa-youtube"></i>
            YouTube
          </div>
        </a>
      </li>
    </ul>
<!--
    <img src="/images/tmp/sdcp.png" class="sdcp center mt-5 mb-5">
    <img src="/images/tmp/footer_emb.png" alt="" class="footer_emb">
    <p>東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F <br> TEL : </p>
    <img src="/images/tmp/card.png" class="width_70 center mb-5">
    <a href="https://tattoo-rays.com">    <img src="images/tmp/kyoto_head_btn.png" class="mb-3"></a>
    <a href="https://tattoo-rays.tw">    <img src="/images/tmp/taipei_studio_btn.png" class="mb-5"></a>

    <div class="footer_nav">
      <img src="/images/tmp/tyuubun.png" alt="">
      <img src="/images/tmp/english.png" alt="">
      <img src="/images/tmp/access.png" alt="">
    </div>
    <hr>
    <div class="copyright">©TATTOO STUDIO Ray's All Rights Reserved.</div> -->
</section>
@endsection
