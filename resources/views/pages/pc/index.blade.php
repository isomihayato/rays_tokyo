@extends('layouts.page')
<!-- Demo styles -->
<link rel="stylesheet" href="/css/pc_basic.css">
@section('content')

<section class="header">
  <img src="/images/tmp/emb.png" alt="emb" class="top_emb center">
  <img src="/images/tmp/kv.jpg" alt="kv" class="width_60 center">
</section>
<section class="content">
  <img src="/images/tmp/body.png" alt="body" class="width_50 center">
  <hr>


  <h4>TATTOO STUDIO Ray’s TOKYO</h4>
  <p class="address">〒151-0051 <br>東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F</p>
  <a href="https://goo.gl/maps/9UrbSRFEazBY94LRA">  <img src="/images/tmp/google_map.png" alt="" class="center"></a>
  <a href="https://lin.ee/6yIXkH5">  <img src="images/tmp/line_link.png" class="width_40 mt-4 mb-5 center"style="display:block;"></a>
  <a href="https://twitter.com/rays_co">  <img src="images/tmp/twitter_link.png" class="width_30 mt-4 center"style="display:block;"></a>
  <div class="width_40 center">
    <div id="insta-widget" class="iswg-base" data-username="tattoorays.tokyo" data-display-image-count="9" data-wrapper-width></div>
    <script src="https://cdn.jsdelivr.net/gh/akinov/insta_window@v1.0/dist/main.js"></script>
  </div>

  <hr>
  <a href="https://tattoo-rays.com/">  <img src="/images/tmp/kyoto_link_btn.png" class="center mt-2"></a>
  <a href="https://tattoo-rays.tw/">  <img src="/images/tmp/taipei_link_btn.png" class="center mt-5"></a>

  <hr>
</section>
<section class="footer">
  <div class="outer">
    <div class="footer__emb">
      <img src="/images/logos/footer_emb.jpg">
      <p style="margin:0;">
          東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F<br>
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
              <!-- <li> <a href="#">・Precautions</a> </li>
              <li> <a href="#">・Price</a> </li>
              <li> <a href="#">・Reservation Flow</a> </li> -->
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
@endsection
