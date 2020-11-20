@extends('layouts.page')
<!-- Demo styles -->
<link rel="stylesheet" href="/css/guide.css">

@section('content')

<section class="paper">
  @include('commons.subpage_header')

  <section class="content">

    <h1>スタジオ案内と注意事項</h1>
    <p>この度はご予約ありがとうございます。下記を必ずご確認の上お越しください。</p>

    <h2>身分証明書</h2>
    <p>ご来店の際は年齢確認のため顔写真付き身分証明書<br class="for_pc">（運転免許証、パスポート、マイナンバーカード等）をご持参ください。<br>身分証明書をご持参頂けなかった場合は、施術が不可となります。</p>

    <h2>カウンセリングご予約の方へ</h2>
    <p>・<b class="fc_red">カウンセリング時に施術費用の一部を予約金としてお預かり致します。</b><br>（即日施術の場合は不要です。）</p>

    <h3>Depositの目安</h3>
    <table class="table-border middle_table" align="center">
    <tr>
    	<th>500円玉・タバコサイズ</th>
    	<td>10,000円〜</td>
    </tr>
    <tr>
    	<th>ハガキサイズ</th>
    	<td>20,000円〜</td>
    </tr>
    <tr>
    	<th>A4サイズ</th>
    	<td>50,000円〜</td>
    </tr>
    <tr>
    	<th>それ以上</th>
    	<td>100,000円〜</td>
    </tr>
    </table>
    <p>※デザインの内容、サイズによって変わります。</p>

    <p>・ラフデザインはDepositの入金後に制作開始致します。</p>
    <p>・Deposit入金後に施術をキャンセルされる場合、<br class="for_pc">いかなる場合でもご返金致し兼ねますのでご了承ください。</p>
    <p>※Depositのご入金が無い場合、<br class="for_pc">次回施術日のご予約をお取り出来ませんので忘れずにご持参ください。</p>

    <h2>カウンセリング料金</h2>
    <p>カウンセリングのみで、施術のご予約をされない場合はカウンセリング料金として、<br class="for_pc">10,000円ご請求致します。</p>
    <p>※即日施術の方、Depositをご入金頂いた方は無料となります。</p>

    <h2>ご予約時間について</h2>
    <p>当日は余裕を持ってご予約時間に間に合うようお越しください。</p>
    <p>万が一遅れられて、次のお客様のご予約に影響が出る場合、<br class="for_pc">当日の施術などが出来ない場合がございますのでご注意ください。</p>

    <h2>キャンセル（変更・取消）について</h2>
    <p>
    	当STUDIOでは、少しでも多くのお客様にご利用頂けるよう、スケジュールを細かく調整しご予約をお受けしております。
    	<br>急なキャンセルは他のお客様への迷惑となりますので極力お控え頂きますようお願い致します。
    	<br>万が一、ご予約をキャンセルされる場合は必ず事前にご連絡ください。
    </p>
    <p>ご予約の7日前から、キャンセル（変更、取消）は手数料が発生いたしますのでお気を付けください。</p>
    <h3>キャンセル手数料</h3>

    <table class="middle_table" align="center">
    <tr>
    	<th> </th>
    	<th>ご予約日に施術予定の方</th>
    	<th style="width:30vw;">カウンセリングのみご予約の方</th>
    </tr>
    <tr>
    	<th>7〜3日前</th>
    	<td>最低施術予定金額の50％</td>
    	<td>5,000円</td>
    </tr>
    <tr>
    	<th>2日前</th>
    	<td>最低施術予定金額の70％</td>
    	<td>7,000円</td>
    </tr>
    <tr>
    	<th>前日・当日</th>
    	<td>最低施術予定金額の100％</td>
    	<td>10,000円</td>
    </tr>
    </table>

    <h2>デザイン、サイズの変更について</h2>

    <p>
    	ご予約時にお知らせいただいた、デザイン・サイズのご変更をご希望の場合は
    	<br class="for_pc"><b>必ず事前に、<a href="https://lin.ee/6yIXkH5" target="_blank" rel="nofollow noreferrer">LINE</a>にてご連絡ください。</b>
    </p>
    <p>
    	1人でも多くのお客様にスムーズにご案内できるようスケジュールを細かく管理しており、
    	<br class="for_pc">お客様のご予約時間はデザインとサイズによって予め限られた時間でお取りしております。
    	<br class="for_pc">場合によっては、ご予約日をご変更いただく必要がございます。
    </p>
    <p>
    	ご連絡無しでご変更をご希望されましても、当日に対応できないこともございます。
    	<br class="for_pc">その場合、追加料金を頂戴し、
    	<br class="for_pc">新たにご予約をお取りして再度お越し頂くこともございますのでご了承ください。
    </p>

    <h2>アクセス</h2>
    <p>
      〒151-0051
      <br>東京都渋谷区千駄ヶ谷3-26-7 第12FMGビルB1F
    </p>
    <p>※当日は1Fの受付へお越しください。</p>

    <div class="guide_map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6481.999447100404!2d139.7077116!3d35.6770088!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d51f13011f9%3A0x961599f6e4ef892c!2z5p2x5LqsVEFUVE9PIFNUVURJTyBSYXkncw!5e0!3m2!1sja!2sjp!4v1605807562647!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      <a href="https://goo.gl/maps/4NF7wHrdk8YisoJ89">
        <div class="btn_box width_30 mb-5" style="font-size:.8rem; margin:0 auto;">
          ＞ Google Map
        </div>
      </a>
    </div>

    <h3>【電車でお越しの方】</h3>
    <p>副都心線「北参道駅」徒歩3分</p>
    <p>総武中央線「千駄ヶ谷駅」徒歩8分</p>

    <h3>【ご同伴者様がお越しになられる場合】</h3>
    <p>
    	他のお客様、カウンセリング及び施術スペース、衛生面などの都合により
    	<br class="for_pc">ご同伴者様はお一人までとさせていただきます。
    </p>

    <p class="mgt40">
    	※施術時は感染症対策としてご同伴者様にはマスク着用を
    	<br class="for_pc">お願いしておりますのでご協力をお願いいたします。
    </p>
    <p>
    	※スタジオ内はお静かにお願いいたします。
    	<br class="for_pc">万が一他のお客様へのご迷惑、
    	<br class="for_pc">カウンセリング及び施術に支障が出ると判断した場合はご退出いただきます。
    </p>

    <h2>安全・衛生対策</h2>
    <p>
    	当STUDIOでは、未成年者(19歳未満)・暴力団関係者及びそれらに準ずる組織に属する方・
    	<br class="for_pc">妊婦・麻薬中毒者・HIV感染者・B型肝炎感染者・C型肝炎感染者・心臓疾患・
    	<br class="for_pc">その他健康に障害のある方・一般常識が著しく欠如されている方、
    	<br class="for_pc">その他当STUDIOが不適切と判断した方への出入り及び、施術は固くお断りしております。
    </p>

    <h2>その他</h2>
    <p>
    	当STUDIOのデザインカウンセリングはお客様のご要望に対し、
    	<br class="for_pc">デザイン内容、施術部位、サイズ、全体バランス、
    	<br class="for_pc">体調管理やアフターケアに対し親身にお答えしております。
    	<br class="for_pc">ご不明な点等ございましたらお気軽にご質問ください。
    </p>
    <p>
    	TATTOO STUDIO Ray's TOKYOでは、技術向上、徹底した衛生管理、快適な環境作りのため、
    	<br class="for_pc">日々努力しており、明るく安全なスタジオ作りを心掛けておりますので
    	<br class="for_pc">安心してお越しください。
    </p>
    <p>その他、ご不明な点等ございましたらお気軽にご連絡ください。</p>

    <a href="/terms">
      <div class="btn_box width_50 mb-5" style="font-size:.8rem; margin:0 auto;">
        &rsaquo; 前日の注意事項はこちら
      </div>
    </a>
    @include('commons.subpage_footer')
  </section>
</section>

@endsection
