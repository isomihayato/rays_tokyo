<div class="box_widget">

	<div class="inner">
		<h2>Blog & News</h2>
		<ul class="blogs mtb-5vh mlr-20px">
			<?php  foreach ($articles as $article): ?>
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
			<hr>
		<?php endforeach; ?>
		</ul>
	</div>

	<div class="inner">
		<h2>instagram</h2>
		<div id="insta-window" class="iswd-base" data-iswd='{"username":"watanabenaomi703"}'></div>
		<script src="https://insta-window-tool.web.app/v3/insta-window.js"></script>

	</div>

	<div class="inner">
		<h2>Twitter</h2>
		<div class="box_twitter">
			<a class="twitter-timeline" href="https://twitter.com/rays_co?ref_src=twsrc%5Etfw">Tweets by rays_co</a>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<div>
	</div>

</div>
