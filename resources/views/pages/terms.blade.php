@extends('layouts.page')
<!-- Demo styles -->
<link rel="stylesheet" href="/css/guide.css">
<style media="screen">
body{
  background-color: #dcdcdc;
}

</style>

@section('content')

<section class="paper">
  @include('commons.subpage_header')

  <section class="content">

      <h1>前日から当日にかけての注意事項</h1>

      <div class="sub_title">
          <p>一生残るTATTOOを、より綺麗に仕上げるために</p>
      </div>

      <h2>過度な日焼けは控えてください。</h2>
      <p>日焼けによって肌が荒れている場合や、炎症を起こしている場合はタトゥーの施術ができません。</p>
      <p>ご予約日を変更して頂き、当日のキャンセル料金を頂戴することになりますので十分にご注意ください。</p>

      <h2>前日は睡眠をよく取り、十分に体を休めてください。</h2>
      <p>タトゥーの施術は体力を消耗します。</p>
      <p>
      	睡眠不足の場合、痛みも感じやすくなる場合もございますので、
      	<br class="for_pc">前日は十分に休養休息を取り、万全の体調でスタジオにお越しください。
      </p>

      <h2>前日・当日・翌日の飲酒は絶対に控えてください。</h2>
      <p>アルコールを摂取した状態ですと、インクの入りが非常に悪くなります。<br class="for_pc">また、施術後のインクのにじみ、消失の原因となります。</p>
      <p>前日・当日・翌日の飲酒は絶対に控えましょう。</p>

      <h2>当日はシャワー、入浴を済ませてお越しください。</h2>
      <p>施術したその日は、治癒促進のため施術部位に水が触れることは控えて頂きますので、<br class="for_pc">ご来店前にシャワーや入浴を済ませてからお越しください。</p>

      <h2>当日は食事を済ませてお越しください。</h2>
      <p>空腹時も痛みを感じやすくなる場合がございます。</p>
      <p>また、施術の際の体の負担を軽減するためにも、食事をしっかりお取りになってからご来店ください。</p>

      <h2>医師の処方を受けている方は申し出てください。</h2>
      <p>医師の処方を受けている方、また当日体調の優れない方は一度ご相談ください。</p>

      <h2>服装はなるべく楽な恰好でお越しいただくか、<br class="for_pc">汚れてもよい服装でお越しください。</h2>
      <p>
      	インクが衣服に付きますと汚れが落ちません。
      	<br class="for_pc">女性の方はタンクトップなどの着用をおすすめします。
      </p>

      <p>その他ご不明な点、ご質問等ございましたらお気軽にご相談ください。</p>

      <a href="/guide">
        <div class="btn_box width_50 mb-5" style="font-size:.8rem; margin:0 auto;">
          &rsaquo; スタジオ案内はこちら
        </div>
      </a>

      <!-- フッターは、footerとsubpage_footerの二種類 -->
      @include('commons.subpage_footer')

  </section>
</section>
@endsection
