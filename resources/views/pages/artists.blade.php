<?php
	echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	$webroot = $_SERVER['DOCUMENT_ROOT'];
	include("./_common/tag/top.html");
	$page_title = "Artists ";
?>
<head>
<?php
	include("./_common/tag/meta_fix.html");
	include("./_common/tag/meta.html");
?>
</head>
<body>
<?php
	include("./_common/tag/gtm.html");
	include("./_common/tag/_header.html");
	include("./_common/tag/_navi_for_pc.blade.php");
?>
<a class="anchor_point" id="pickup_01"></a>
<h2 class="main_tit" style="margin-bottom:0px !important;">
	<span>Artist <span class="for_sp"></span>アーティスト</span>
</h2>

<section class="artist_list">

<ul>
	@foreach ($artists as $artist)
	<li class="clearfix">
		<a href="/show_artist/{{$artist->id}}">
			<span>
				<p>{{$artist->name}}</p>
			</span>
			<span>
				@if ($artist->ecimages()->where('place','artists')->exists())
				  <img src="{{$artist->ecimages()->where('place','artists')->get()[0]->path}}" alt="{{$artist->name}}">
				@else
				  <img src="/no_images/501.png" alt="no image">
				@endif
			</span>
		</a>
	</li>
	@endforeach
</ul>


</section>
<?php
	include("./_common/tag/sns_bnr.html");
	include("./_common/tag/contact_btn.html");
	include("./_common/tag/_footer.blade.php");
	include("./_common/tag/script.html");
?>
<script src="./_common/js/accordion.js"></script>
</body>
</html>
