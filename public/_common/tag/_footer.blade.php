<?php
$nav_users = App\User::where([['existence',true],['belongs_to','like',"%kyoto%"],['role','!=',1],['role','!=',3]])->get();
$nav_artists = App\User::where([['existence',true],['belongs_to','like',"%kyoto%"],['role','!=',1],['role','!=',3],['login_id','!=','white'],['login_id','!=','other']])->get();
?>

<footer>
<div id="area_footer">
<div class="wrap_footer clearfix">
<ul class="for_pc ftr_address">
	<a href="/"><li class="ftr_logo"></li></a>
	<li class="mgt20">
    <p>
      〒151-0051
      <br>東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F
    </p>
	</li>
</ul>
<ul class="for_pc ftr_navi_1st">
	<li><a href="/">&#9632;&nbsp;HOME</a></li>
</ul>
<ul class="for_pc ftr_navi">
	<li>&#9632;&nbsp;SYSTEM</li>
	<li><a href="/price">・Price</a></li>
	<li class="mgt20"><a href="/artists">&#9632;&nbsp;ARTIST</a></li>
	<?php foreach($nav_artists as $user): ?>
		<li><a href="/show_artist/<?php echo $user->id ?>">・<?php echo strtoupper($user->login_id) ?></a></li>
	<?php endforeach; ?>
</ul>
<ul class="for_pc ftr_navi">
	<li class="mgt20"><a href="/aboutus">&#9632;&nbsp;ABOUT US</a></li>
	<li><a href="/blogs">・Blog</a></li>
</ul>
<ul class="for_pc ftr_navi">
	<li>&#9632;&nbsp;TATTOO GALLERY</li>
	<li><a href="/gallery">・Tattoo Gallery</a></li>
	<?php foreach($nav_users as $user): ?>
		<li><a href="/gallery/#<?php echo $user->login_id ?>" class="sub_item">・<?php echo strtoupper($user->login_id) ?></a></li>
	<?php endforeach; ?>
	<li class="mgt20"><a href="/contact">&#9632;&nbsp;CONTACT</a></li>
</ul>

</div>
<a href="/"><div class="for_sp ftr_logo"></div></a>

<ul class="common_hdr_nav_02">
    <a href="https://tattoo-rays.tw/"><li>台北STUDIO</li></a>
		<a href="https://tattoo-rays.com"> <li>京都STUDIO</li> </a>
</ul>

<ul class="common_hdr_nav">
	<a href="/zh"><li>中文</li></a>
	<a href="/en"><li>English</li></a>
	<a href="/#pickup_05"><li>Access</li></a>
</ul>
</div>
<div class="for_sp mb-5" style="height: 50px;"></div>
<div class="area_copy"><small><span class="for_pc">東京のタトゥー（tattoo）スタジオレイズ・刺青&emsp;</span>&copy;TATTOO STUDIO Ray's All Rights Reserved.</small></div>
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
        	<li><a href="/price" class="sub_item">Price&emsp;施術料金</a></li>
        	<li><a href="/artists" class="main_item">&#9632;&nbsp;ARTIST&emsp;アーティスト</a></li>
					<?php foreach($nav_artists as $user): ?>
						<li><a href="/show_artist/<?php echo $user->id ?>" class="sub_item"><?php echo strtoupper($user->login_id) ?></a></li>
					<?php endforeach; ?>

        	<li><a href="/aboutus" class="main_item">&#9632;&nbsp;ABOUT US&emsp;コンセプト</a></li>
        	<li><a href="/blogs">&#9632;&nbsp;BLOG&emsp;ブログ</a></li>
        	<li><a href="/contact">&#9632;&nbsp;CONTACT&emsp;ご予約・お問い合わせ</a></li>
        	<li><a href="https://raysco.shop/" target="_blank" rel="nofollow noreferrer">&#9632;&nbsp;ONLINE STORE&emsp;オンラインストア</a></li>
        	<li><a href="/en">&#9632;&nbsp;ENGLISH</a></li>
        	<li><a href="/zh">&#9632;&nbsp;中文</a></li>
        </ul>
    </div>
</div>
