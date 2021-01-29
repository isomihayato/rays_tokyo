<nav>
	<?php
	$nav_users = App\User::where([['existence',true],['belongs_to','like',"%tokyo%"],['role','!=',1],['role','!=',3]])->get();
	$nav_artists = App\User::where([['existence',true],['belongs_to','like',"%tokyo%"],['role','!=','1'],['role','!=','3'],['login_id','!=','white'],['login_id','!=','other']])->get();
	?>
	<div id="fixedBox" class="for_pc">
		<div class="area_navi">
			<ul id="nav">
				<li><a href="/"><span class="nav_01" title="ホーム"></span></a></li>
				<li><a><span class="nav_02" title="システム"></span></a>
					<ul style="z-index:9999;">
						<!-- <li><a href="/precaution_sanitation"><span class="sub_02_01" title="諸注意・衛生面"></span></a></li> -->
						<li><a href="/price"><span class="sub_02_02" title="施術料金"></span></a></li>
						<!-- <li><a href="/flow"><span class="sub_02_03" title="ご予約の流れ"></span></a></li> -->
						<!-- <li><a href="/faq"><span class="sub_02_04" title="Q&nbsp;&amp;&nbsp;A"></span></a></li> -->
					</ul>
				</li>
				<li style="margin:0 40px;margin-top:16px;"> <p style="margin:0;">Special Tattoo</p> <span style="display: block;font-size: 13px;text-align: center;">coming soon</span></li>
				<!-- <li><a href="/special_tattoo"><span class="nav_03" title="タトゥー"></span></a>
					<ul>
						<li><a href="/white_tattoo"><span class="sub_03_01" title="ホワイトタトゥー"></span></a></li>
						<li><a href="/cover_up"><span class="sub_03_02" title="カバーアップ"></span></a></li>
					</ul>
				</li> -->
				<li><a href="/gallery"><span class="nav_04" title="タトゥーギャラリー"></span></a>
					<ul style="z-index:9999;">
						<?php foreach ($nav_users as $user):
							?>
							<li>
								<a href="/gallery/#<?php echo $user->login_id ?>">
									<div>
										<?php echo $user->name ?>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li><a href="/artists"><span class="nav_05" title="アーティスト"></span></a>
					<ul style="z-index:9999;">
						<?php foreach ($nav_artists as $user):?>
							<li>
								<a href="/show_artist/<?php echo $user->id ?>">
									<div><?php echo $user->name ?></div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li><a href="/aboutus"><span class="nav_06" title="コンセプト"></span></a>
					<ul style="z-index:9999;">
						<!-- <li>
							<a href="/#pickup_04">
								<span class="en">RAYS<br>(Silver & Apparel)</span>
								<span class="ja">RAYS<br>（シルバー&アパレル）</span>
							</a>
						</li>
						<li>
							<a href="/#pickup_05">
								<span class="en">Access</span>
								<span class="ja">アクセス</span>
							</a>
						</li> -->
						<li>
							<a href="/blogs">
								<span class="en">Blog</span>
								<span class="ja">ブログ</span>
							</a>
						</li>
						<!-- <li>
							<a href="/sdcp">
								<span>SDCP<br>（殺処分減少への取り組み）</span>
							</a>
						</li>
						<li>
							<a href="/recruit">
								<span class="en">Recruit</span>
								<span class="ja">募集</span>
							</a>
						</li> -->
						<!-- <li>
							<a href="/movie">
								<span class="en">YouTube channel</span>
								<span class="ja">YouTubeチャンネル</span>
							</a>
						</li> -->
					</ul>
				</li>
				<!-- <li style="margin-top:16px;margin-left: 50px;margin-right: 50px;"> <p style="margin:0;">CONTACT</p> <span style="display: block;font-size: 13px;text-align: center;">coming soon</span></li> -->

				<li><a href="/contact"><span class="nav_07" title="お問い合わせ"></span></a></li>
			</ul>
		</div>
	</div>
	<?php
	$url = $_SERVER['REQUEST_URI'];
	if(strstr($url,'artist')==true){
		include("./_common/tag/artist/pankuzu.html");
	}else{
		include("./_common/tag/pankuzu.html");
	}
	?>
</nav>
