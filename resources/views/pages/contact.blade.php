<?php
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
include("./_common/tag/top.html");
$page_title = "Price ";
?>
<head>
	<?php
	include("./_common/tag/meta_fix.html");
	include("./_common/tag/meta.html");
	?>
  <style media="screen">
    .info_line{
      margin: 0 auto;
    }
    .red{
      color: red;
    }
  </style>
</head>
<body>
  <?php
	include("./_common/tag/gtm.html");
	include("./_common/tag/_header.html");
	include("./_common/tag/_navi_for_pc.blade.php");
	?>
</header>
<section>
<a class="anchor_point" id="pickup_01"></a>
<h2 class="main_tit"><span>Contact ご予約・お問い合わせ</span></h2>
<div class="article_block">
<p class="c_txt">
  タトゥーのご予約・ご質問やご不安なこと、 <br>
  お気軽にお問い合わせください。 <br>
  全力でお応えします。
</p>
<div style="margin:4.5vh 0;display: inline-block;"></div>
<div class="center">
  <a href="https://line.me/R/ti/p/gpM4XiuiAe" target="_blank" rel="nofollow noreferrer"><div class="info_line"></div></a>
</div>
<p class="c_txt">
  タトゥーのご予約はLINE追加時に表示される <br>
メッセージをよくお読みいただき <br>
ご連絡いただけるとスムーズです。
</p>
<hr>
<p class="c_txt red">
  3日以上経っても当スタジオより返信がない場合は、 <br>
お手数ですが再度ご連絡ください。
</p>
</section>
<!--<section>
<h2 class="main_tit"><span><img src="/contact/image/b_mail.png" alt="">&nbsp;WEBでお問い合わせ・ご予約</span></h2>
<div class="article_block">

<p class="c_txt fc_red fz16">
	LINEでご連絡頂けますとスムーズに対応させて頂きます。
</p>

<form action="./" method="post" id="contact_form">
<dl>
	<dt><p>お名前　Name</p><span>必須<br>Required</span></dt>
	<dd><input type="text" name="username" id="username" /><div class="ErrMsg"></div></dd>

	<dt><p>ふりがな</p></dt>
	<dd><input type="text" name="userkana" id="userkana" /><div class="ErrMsg"></div></dd>

	<dt><p>電話番号　TEL</p></dt>
	<dd><input type="text" name="telno" id="telno" /><div class="ErrMsg"></div></dd>

	<dt><p class="fz20">E-mail</p><span>必須<br>Required</span></dt>
	<dd><input type="text" name="mailaddr" id="mailaddr" /><div class="ErrMsg"></div></dd>

	<dt><p>お問合せ内容　Message</p><span>必須<br>Required</span></dt>
	<dd>
		<p class="mgtb20">
			タトゥーご予約の方は、お手数ですが下記を【お問い合わせ内容】欄にご記入ください。
			<br><br><b>・ご年齢</b>
			<br><b>・ご希望のデザイン、サイズ、施術部位</b>
			<br><b>・ご都合の良い曜日と時間帯</b>
		</p>
		<textarea name="comment" id="comment"></textarea><div class="ErrMsg"></div>
	</dd>
</dl>
<div class="area_sbmit clearfix">
	<div><input type="checkbox" id="age" name="age" value="18歳以上です"></div>
	<p>
		19歳未満（高校生不可）の方には施術を行っておりません。<br>19歳以上の方はコチラにチェックを入れてください。
		<br><br>We do not accept to who are under 19 years of age by rules and regulations　of Japan.<br>Please click here if you are 19 years of age or older.

		<span class="ErrMsgCB"></span>
	</p>
	<input type="submit" name="" value=" " class="btn_sbmit" />
</div>

</form>

<div class="box_gray_red">
	<p class="heed">※ドメイン指定受信設定をされている方は、当スタジオからのメールが届かない場合がございます。</p>
	<p class="heed">※2営業日以上経っても当スタジオより連絡がない場合は、お手数ですが再度、お電話にてご連絡いただきますよう、お願いいたします。</p>
</div>
<div class="box_gray">
	<p>ご入力頂いた個人情報は、頂いたお問い合わせにお応えするためだけに利用し、個人情報保護方針に従って適正に管理致します。 また、ご本人の承諾を得た場合や法令等により正当な理由がある場合を除き、第三者に提供または開示いたしません</p>
</div>
</div>

</section> -->
<?php
include("./_common/tag/sns_bnr.html");
include("./_common/tag/contact_btn.html");
include("./_common/tag/_footer.blade.php");
include("./_common/tag/script.html");
?>
</body>
</html>
