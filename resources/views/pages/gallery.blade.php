<?php
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
include("./_common/tag/top.html");
$page_title = "Tattoo Sample Gallery ".$now_artist.' '.$now_page;
?>
<head>

  <?php
  include("./_common/tag/meta_fix.html");
  include("./_common/tag/meta.html");
  ?>
  <link rel="stylesheet" href="/_common/css/artist/photo.css" />
  <link rel="stylesheet" href="/_common/css/artist/photoswipe/photoswipe.css" />
  <link rel="stylesheet" href="/_common/css/artist/photoswipe/default-skin/default-skin.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style media="screen">
  @media screen and (max-device-width:760px) and (min-device-width:310px) and (-webkit-min-device-pixel-ratio : 1.5),
  only screen and (min-device-pixel-ratio : 1.5){
    /* bootstrap latest導入ズレ調整 */
    ul.common_hdr_nav{
      width: 100%;
      height: 30px;
      margin: 0px auto;
      padding-top: 10px;
      text-align: center;
      margin-top: 35px;
    }
  }
  body{
    font-family: 'YuMincho','Yu Mincho', 'Times New Roman', 'HGS明朝E', 'ヒラギノ明朝 Pro W6', 'ＭＳ Ｐ明朝','MS PMincho', 'メイリオ', 'Meiryo', serif;
  }
  section{
    display: block;
  }
</style>
</head>
<body>
  <?php
  include("./_common/tag/gtm.html");
  include("./_common/tag/_header.html");
  include("./_common/tag/_navi_for_pc.blade.php");
  ?>
  <h2 class="main_tit"><span>Gallery<span class="for_sp"></span>ギャラリー</span></h2>

  @foreach ($users as $user)
  <section>
    <div id="{{$user->login_id}}"></div>
    <div id="area_gallery">
      <h2 class="main_tit"><span><span class="for_sp"></span>{{$user->name}}</span></h2>
      {{ $user->tattoos->fragment($user->login_id)->links() }}
      <div class="my-gallery">
        @foreach ($user->tattoos as $tattoo)
        <figure><a href="{{$tattoo->path}}" data-size="1280x960"><img id="gallery_img"src="{{$tattoo->path}}" alt="" title="" /></a></figure>
        @endforeach
      </div>
      {{ $user->tattoos->fragment($user->login_id)->links() }}
    </div>
  </section>
  @endforeach


  <?php
  include("./_common/tag/contact_btn.html");
  include("./_common/tag/_footer.blade.php");
  include("./_common/tag/script.html");
  ?>

  <!-- Root element of PhotoSwipe. Must have class pswp. -->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
    It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

      <!-- Container that holds slides.
      PhotoSwipe keeps only 3 of them in the DOM to save memory.
      Don't modify these 3 pswp__item elements, data is added later on. -->
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>

      <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
      <div class="pswp__ui pswp__ui--hidden">

        <div class="pswp__top-bar">

          <!--  Controls are self-explanatory. Order can be changed. -->

          <div class="pswp__counter"></div>

          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

          <button class="pswp__button pswp__button--share" title="Share"></button>

          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

          <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
          <!-- element will get class pswp__preloader--active when preloader is running -->
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>

        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
        </button>

        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
        </button>

        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>

      </div>

    </div>

  </div>

  <script src="/_common/js/photoswipe/photoswipe.min.js"></script>
  <script src="/_common/js/photoswipe/photoswipe-ui-default.min.js"></script>
  <script src="/_common/js/gallery.js"></script>
  <style>
  img{
    margin-left: 0 !important;
  }
</style>
<!-- <script type="text/javascript">
$(document).ready(function(){
console.log(document.getElementById('gallery_img'));
var img_element = document.getElementById('gallery_img');
img_element.style.marginLeft = '0';
});
</script> -->
</body>
</html>
