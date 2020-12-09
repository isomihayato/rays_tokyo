<?php
$nav_users = App\User::where([['existence',true],['belongs_to','like',"%kyoto%"],['role','!=',1],['role','!=',3]])->get();
$nav_artists = App\User::where([['existence',true],['belongs_to','like',"%kyoto%"],['role','!=',1],['role','!=',3],['login_id','!=','white'],['login_id','!=','other']])->get();
?>
<section class="sdcp">
	<dl>
		<dt>
			<h4>犬猫の殺処分減少を目指すプロジェクト</h4>
		</dt>
		<dd>
			<a href="/blog/detail/33">
				<img src="/_common/image/icons/b_sdcp.png" alt="犬猫の殺処分減少を目指すプロジェクト SDCP RAY'S">
			</a>
		</dd>
	</dl>
</section>
<footer>
<div id="area_footer">
<div class="wrap_footer clearfix">
<ul class="for_pc ftr_address">
	<a href="/"><li class="ftr_logo"></li></a>
	<li class="mgt20">
		<p>TATTOO STUDIO Ray's
			<br>〒606-8351
			<br>京都市左京区岡崎徳成町27-15（受付：1F）
			<br>Open：10：00〜
			<br>Closed：不定休
		</p>
	</li>
</ul>
<ul class="for_pc ftr_navi_1st">
	<li><a href="/">&#9632;&nbsp;HOME</a></li>
</ul>
<ul class="for_pc ftr_navi">
	<li>&#9632;&nbsp;SYSTEM</li>
	<li><a href="/precaution_sanitation">・Precautions&amp;Sanitation</a></li>
	<li><a href="/price">・Price</a></li>
	<li><a href="/flow">・Reservation Flow</a></li>
	<li><a href="/faq">・Q&nbsp;&amp;&nbsp;A</a></li>
	<li class="mgt20"><a href="/artists">&#9632;&nbsp;ARTIST</a></li>
	<?php foreach($nav_artists as $user): ?>
		<li><a href="/show_artist/<?php echo $user->id ?>">・<?php echo strtoupper($user->login_id) ?></a></li>
	<?php endforeach; ?>
</ul>
<ul class="for_pc ftr_navi">
	<li>&#9632;&nbsp;SPECIAL TATTOO</li>
	<li><a href="/white_tattoo">・White Tattoo</a></li>
	<li><a href="/cover_up">・Cover Up</a></li>
	<li class="mgt20"><a href="/aboutus">&#9632;&nbsp;ABOUT US</a></li>
	<li><a href="/?collection#pickup_04">・RAYS<br>（Silver & Apparel）</a></li>
	<li><a href="/#pickup_05">・Access</a></li>
	<li><a href="/blog/">・Blog</a></li>
	<li><a href="/sdcp">・SDCP</a></li>
	<li><a href="/recruit">・Recruit</a></li>
	<li><a href="/movie">・YouTubeチャンネル</a></li>
</ul>
<ul class="for_pc ftr_navi">
	<li>&#9632;&nbsp;TATTOO GALLERY</li>
	<li><a href="/gallery">・Tattoo Gallery</a></li>
	<?php foreach($nav_users as $user): ?>
		<li><a href="/gallery/#<?php echo $user->login_id ?>" class="sub_item">・<?php echo strtoupper($user->login_id) ?></a></li>
	<?php endforeach; ?>
	<li class="mgt20"><a href="/contact">&#9632;&nbsp;CONTACT</a></li>
</ul>
<ul class="ftr_navi_sns">
	<li>
	<ul class="area_icon_credit">
		<li><img src="/_common/image/_footer/i_pay.png" alt="card"></li>
	</ul>
	</li>
	<li>&#9632;友達に共有</li>
	<li>
	<ul class="area_icon_sns clearfix">
		<a href="mailto:?subject=TATTOO STUDIO Ray's&amp;body=http://tattoo-rays.com"><li class="icon_w_mail"></li></a>
		<a href="http://twitter.com/share?url=http://tattoo-rays.com&text=京都のタトゥースタジオ　TATTOO STUDIO Ray's" target="_blank" rel="nofollow noreferrer"><li class="icon_w_tw"></li></a>
		<a href="http://www.facebook.com/share.php?u=http://tattoo-rays.com" target="_blank" rel="nofollow noreferrer"><li class="icon_w_fb"></li></a>
		<a href="https://plus.google.com/share?url=http://tattoo-rays.com" target="_blank" rel="nofollow noreferrer"><li class="icon_w_gp"></li></a>
		<a href="http://b.hatena.ne.jp/entry/http://tattoo-rays.com" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加" target="_blank" rel="nofollow noreferrer"><li class="icon_w_hatena"></li></a>
		<a href="http://line.me/R/msg/text/?%E4%BA%AC%E9%83%BD%E3%81%AE%E3%82%BF%E3%83%88%E3%82%A5%E3%83%BC%E3%82%B9%E3%82%BF%E3%82%B8%E3%82%AA%E3%80%80TATTOO%20STUDIO%20Ray%27s%0Ahttp%3A%2F%2Ftattoo-rays.com" target="_blank" rel="nofollow noreferrer"><li class="icon_w_line"></li></a>
	</ul>
	</li>
</ul>
</div>
<a href="/"><div class="for_sp ftr_logo"></div></a>

<ul class="btn_ftr_nav_02">
    <a href="https://tattoo-rays.tw/"><li>台北STUDIO</li></a>
</ul>

<ul class="btn_ftr_nav">
	<a href="/zh"><li>中文</li></a>
	<a href="/en"><li>English</li></a>
	<a href="/#pickup_05"><li>Access</li></a>
</ul>
</div>
<div class="area_copy"><small><span class="for_pc">京都のタトゥー（tattoo）スタジオレイズ・刺青&emsp;</span>&copy;TATTOO STUDIO Ray's All Rights Reserved.</small></div>
</footer>
<div id="gMenu" class="for_sp uk-offcanvas">
    <div id="gMenuInner" class="uk-offcanvas-bar clearfix">
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
        	<li><a href="/">&#9632;&nbsp;HOME</a></li>
        	<li><a class="main_item">&#9632;&nbsp;GALLERY&emsp;ギャラリー</a></li>
        	<li><a href="/gallery" class="sub_item">Gallery</a></li>
					<?php foreach($nav_users as $user): ?>
						<li><a href="/gallery/#<?php echo $user->login_id ?>" class="sub_item"><?php echo strtoupper($user->login_id) ?></a></li>
					<?php endforeach; ?>
        	<li><a class="main_item">&#9632;&nbsp;SYSTEM&emsp;システム</a></li>
        	<li><a href="/precaution_sanitation/" class="sub_item">Precautions&nbsp;&amp;&nbsp;Sanitation<br>諸注意・衛生管理</a></li>
        	<li><a href="/price" class="sub_item">Price&emsp;施術料金</a></li>
        	<li><a href="/flow" class="sub_item">Flow&emsp;ご予約の流れ</a></li>
        	<li><a href="/faq" class="sub_item">Q&nbsp;&amp;&nbsp;A&emsp;よくあるご質問</a></li>
        	<li><a class="main_item">&#9632;&nbsp;SPECIAL TATTOO&emsp;スペシャルタトゥー</a></li>
        	<li><a href="/white_tattoo" class="sub_item">White Tattoo&emsp;ホワイトタトゥー</a></li>
        	<li><a href="/cover_up" class="sub_item">Cover Up&emsp;ビフォー・アフター</a></li>
        	<li><a href="/artists" class="main_item">&#9632;&nbsp;ARTIST&emsp;アーティスト</a></li>
					<?php foreach($nav_artists as $user): ?>
						<li><a href="/show_artist/<?php echo $user->id ?>" class="sub_item"><?php echo strtoupper($user->login_id) ?></a></li>
					<?php endforeach; ?>

        	<li><a href="/aboutus" class="main_item">&#9632;&nbsp;ABOUT US&emsp;コンセプト</a></li>
        	<li><a href="/?load#pickup_04" class="sub_item">RAYS（シルバー＆アパレル）</a></li>
        	<li><a href="/#pickup_05" class="sub_item">Access&emsp;アクセス</a></li>
        	<li><a href="/sdcp" class="sub_item">SDCP（殺処分減少への取り組み）</a></li>
        	<li><a href="/recruit" class="sub_item">Recruit（募集）</a></li>
        	<li><a href="/movie" class="sub_item">YouTubeチャンネル</a></li>
        	<li><a href="/blogs">&#9632;&nbsp;BLOG&emsp;ブログ</a></li>
        	<li><a href="/contact">&#9632;&nbsp;CONTACT&emsp;ご予約・お問い合わせ</a></li>
        	<li><a href="https://raysco.shop/" target="_blank" rel="nofollow noreferrer">&#9632;&nbsp;ONLINE STORE&emsp;オンラインストア</a></li>
        	<li><a href="/en">&#9632;&nbsp;ENGLISH</a></li>
        	<li><a href="/zh">&#9632;&nbsp;中文</a></li>
        </ul>
    </div>
</div>
