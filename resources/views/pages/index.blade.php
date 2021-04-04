@extends('layouts.page')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="/_common/css/dropdown.css">
<link rel="stylesheet" href="/css/basic.css">
<style media="screen">
  ul.common_hdr_nav_02, ul.common_hdr_nav{
    display: inline-table;
  }
  a{
    display: inline;
  }
  .back_home_logo{
    display: none;
  }
  .swiper-container {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;

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
.swiper-slide img{
  width: 98%;
}
</style>
<?php
  include("./_common/tag/top.html");
	include("./_common/tag/_header.html");
?>
@section('content')

@include('commons.header')

<?php
  $page_title = "";
  include("./_common/tag/meta_fix.html");
  include("./_common/tag/meta.html");
  include("./_common/tag/_navi_for_pc.blade.php");
?>

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
  </div>
  <hr>
  <section>
    <h2 class="impact">MAIN ARTIST <br>-Daniel Ray Brewster-</h2>
    <ul class="area_top_artist clearfix">
      <li>
        <div class="top_bg_02">
          <p class="c_txt">
            『タトゥーは、一生に一度の大切なもの』です。
            <br>お客様が納得いくまで何度でもデザインいたします。
            過去に自分の納得のいかない施術を受けた経験があり、皆様には同じ思いをしてもらいたくない。
            <br>お客様1人1人のニーズを大切にし、悔いの無い一生物の作品を仕上げることを信念に、
            強い決意を持って施術しております。
          </p>
          <div class="btn_arw_01"><a href="/artists">ARTIST 紹介</a></div>
        </div>
      </li>
      <li><div class="pic_artist"></div></li>
    </ul>
  </section>
  <section>
    <h2 class="impact">Studio Access</h2>
    <div class="for_pc mgt80"></div>
    <dl class="top_access_info">
      <dd>
        <p class="c_txt">タトゥーのご相談、施術は完全予約制となっておりますので、事前にご予約をお願い致します。</p>
        <?php
        include("./_common/tag/contact_btn.html");
        ?>
        <p class="c_txt">TATTOO STUDIO Ray’s TOKYO</p>
        <p class="c_txt">
          〒151-0051
          <br>東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F
        </p>
        <?php
        include("./_common/tag/map.html");
        ?>
        <p class="c_txt">
          【電車でお越しの方】
          <br>副都心線「北参道駅」徒歩3分
          <br>総武中央線「千駄ヶ谷駅」徒歩8分
        </p>
      </dd>
    </dl>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_01.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_02.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_03.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_04.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_05.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_06.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_07.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_08.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_09.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_10.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/_common/image/top/tokyo_11.jpg" alt=""></div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <div class="article_block">
      <p class="c_txt">
        白を基調とした店内は、明るく清潔感があり天井も高く開放的な雰囲気で徹底した衛生管理の元、
        皆様にタトゥー施術をリラックスして楽しんでいただけるようにしております。
      </p>
    </div>

    <div class="box_widget">

      <div class="inner">
        <h2>instagram</h2>
        <div id="insta-widget" class="iswg-base"
        data-username="tattoostudiorays" data-display-image-count="9" data-wrapper-width>
        </div>
        <script src="https://cdn.jsdelivr.net/gh/akinov/insta_window@v1.0/dist/main.js"></script>
      </div>

    	<div class="inner">
    		<h2>Blog & News</h2>
    		<ul class="blogs mtb-5vh mlr-20px">
    			<?php  foreach ($articles as $article): ?>
            <a href="/blog/<?php echo $article->id ?>">
    			   <li>
              <?php if($article->thumbnail): ?>
              <img src="<?php echo $article->thumbnail?>" alt="">
              <?php else: ?>
                <div style="width:100px;height:100px;"></div>
              <?php endif; ?>
              <div class="wrapper">
                <div class="blogs_created_at">
                  <?php echo (new DateTime($article->created_at))->format("Y.m.d") ?>
                </div>
                <div class="blogs_title">Title: <?php echo $article->title?></div>
                <div class="blogs_body"><?php echo mb_strcut(strip_tags(str_replace("\r\n", '', $article->body)),0,100) ?></div>
              </div>
    			  </li>
          </a>
    			<hr>
    		<?php endforeach; ?>
    		</ul>
    	</div>

    	<div class="inner">
    		<h2>Twitter</h2>
    		<div class="box_twitter">
    			<a class="twitter-timeline" href="https://twitter.com/rays_co?ref_src=twsrc%5Etfw">Tweets by rays_co</a>
    			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    		<div>
    	</div>
    </div>

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
</section>

<?php
include("./_common/tag/_footer.blade.php");
include("./_common/tag/script.html");
?>
<script>
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      type: 'fraction',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
@endsection
