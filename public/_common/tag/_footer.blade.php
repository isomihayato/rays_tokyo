<?php
$nav_users = App\User::where([['existence',true],['belongs_to','like',"%tokyo%"],['role','!=',1],['role','!=',3]])->get();
$nav_artists = App\User::where([['existence',true],['belongs_to','like',"%tokyo%"],['role','!=',1],['role','!=',3],['login_id','!=','white'],['login_id','!=','other']])->get();
?>
<section class="sdcp">
	<!-- <dl>
		<dt>
			<h4>犬猫の殺処分減少を目指すプロジェクト</h4>
		</dt>
		<dd>
			<a href="/sdcp">
				<img src="/_common/image/icons/b_sdcp.png" alt="犬猫の殺処分減少を目指すプロジェクト SDCP RAY'S">
			</a>
		</dd>
	</dl> -->
</section>
<footer>

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
        	<li><a href="/artists" class="main_item">&#9632;&nbsp;ARTIST&emsp;アーティスト</a></li>
					<?php foreach($nav_artists as $user): ?>
						<li><a href="/show_artist/<?php echo $user->id ?>" class="sub_item"><?php echo strtoupper($user->login_id) ?></a></li>
					<?php endforeach; ?>

        	<li><a href="https://raysco.shop/" target="_blank" rel="nofollow noreferrer">&#9632;&nbsp;ONLINE STORE&emsp;オンラインストア</a></li>
        </ul>
    </div>
</div>
