<?php
	echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	include("./_common/tag/top.html");
		$page_title = $artist->name."　".$artist->tattoos->currentPage()."ページ目";
	// include('../../../apps/gallery/index.php');
?>
<head>
<?php
	include("./_common/tag/meta_fix.html");
	include("./_common/tag/meta.html");
?>
<link rel="stylesheet" href="/_common/css/photo.css" />
<link rel="stylesheet" href="/_common/photoswipe/swiper.min.css">
<link rel="stylesheet" href="/_common/photoswipe/photoswipe.css" />
<link rel="stylesheet" href="/_common/photoswipe/default-skin/default-skin.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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
	h3.main_tit{
		font-size: 1.875rem;
		font-weight: bold;
		margin-top: 120px;
	}
}
body{
	font-family: 'YuMincho','Yu Mincho', 'Times New Roman', 'HGS明朝E', 'ヒラギノ明朝 Pro W6', 'ＭＳ Ｐ明朝','MS PMincho', 'メイリオ', 'Meiryo', serif;
	color: rgb(26,26,26);
}
.btn-link:hover{
  color: rgb(26,26,26);
	text-decoration: none;
}
a:link, a:visited, a:hover, a:active {
	color: rgb(26,26,26);
}

.btn-link{
	color: black;
}
.arrow{
	min-height: 18px;
	margin: 0px 10px;
	background-image: url(/_common/image/arrow_open.png);
	background-size: 13px 15px;
	background-repeat: no-repeat;
	background-position: top right;
}
.rays__accordion_option{
	margin: 30px 0;
}
.rays__accordion_header{
	background-color: rgb(204,204,204);
}
</style>
</head>
<body>
<?php
	include("./_common/tag/gtm.html");
	include("./_common/tag/_header.html");
	include("./_common/tag/_navi_for_pc.blade.php");
?>
<a class="anchor_point" id="pickup_01"></a>
<h2 class="main_tit">
	<span>
		@if (strtolower(explode(" ",$artist->name)[0]) == 'daniel')
		  Main
		@endif
	   TATTOO Artist <br class="for_sp">{{$artist->name}}
  </span>
</h2>

<section class="portfolio">

<div class="swiper-container">
	<div class="swiper-wrapper">
		@if ($artist->ecimages()->where('place','artist')->exists())
				@foreach ($artist->ecimages()->where('place','artist')->get() as $ecimage)
				<div class="swiper-slide">
					<img src="{{$ecimage->path}}" width="360">
				</div>
				@endforeach
		@else
		<div class="swiper-slide">
			<img src="/no_images/501.png" width="360">
		</div>
		@endif
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination swiper-pagination-black"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-white swiper-button-next"></div>
	<div class="swiper-button-white swiper-button-prev"></div>
</div>

</section>

<h3 class="main_tit">Biography</h3>
<div class="center inst">
	<a href="https://www.instagram.com/rays.{{strtolower(explode(" ",$artist->name)[0])}}/" target="_blank" rel="nofollow noreferrer" class="hoverImg">
		＠rays.{{strtolower(explode(" ",$artist->name)[0])}}
	</a>
</div>

<?php $i = 0; ?>
<div class="accordion" id="accordionExample">
	@foreach ($artist->introduces as $introduce)
<div class="card rays__accordion_option">
	<div class="card-header rays__accordion_header" id="{{$introduce->id}}">
		<h5 class="mb-0 text-center arrow">
			<button class="btn btn-link no_color_change" type="button" data-toggle="collapse" data-target="#collapse{{$introduce->id}}"
				 aria-expanded="false" aria-controls="collapse{{$introduce->id}}">
				{{$introduce->title}}
			</button>
		</h5>
	</div>
	@if ($i == 0)
	<div id="collapse{{$introduce->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
	@else
	<div id="collapse{{$introduce->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
	@endif
		<div class="card-body">
			{!! $introduce->body !!}
		</div>
	</div>
</div>
  <?php  $i++;?>
	@endforeach
</div>

<a class="anchor_point" id="{{$artist->login_id}}"></a>
<section>
	<div id="area_gallery">
		<h2 class="main_tit"><span><span class="for_sp"></span>{{$artist->name}}</span></h2>
		{{ $artist->tattoos->fragment('area_gallery')->links() }}
		<div class="my-gallery">
			@foreach ($artist->tattoos as $tattoo)
			<figure><a href="{{$tattoo->path}}" data-size="1280x960"><img id="gallery_img"src="{{$tattoo->path}}" alt="" title="" /></a></figure>
			@endforeach
		</div>
		{{ $artist->tattoos->fragment('area_gallery')->links() }}
	</div>
</section>
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
<script src="/_common/js/accordion.js"></script>
<script src="/_common/photoswipe/swiper.min.js"></script>
<script src="/_common/js/swiper_type.js"></script>
<script src="/_common/photoswipe/photoswipe.min.js"></script>
<script src="/_common/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="/_common/js/gallery.js"></script>

</body>
</html>
