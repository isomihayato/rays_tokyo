<?php
$title = "ブログ記事一覧";
?>
<?php
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
$webroot = $_SERVER['DOCUMENT_ROOT'];
include("./_common/tag/top.html");
$page_title = $title;
?>
<head>
  <?php
  include("./_common/tag/meta_fix.html");
  include("./_common/tag/meta.html");
  ?>
  @include('commons.twitter_card')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href='/fullcalendar/main.css' rel='stylesheet' />
  <script src='/fullcalendar/main.js'></script>
  <link rel="stylesheet" href="/css/blog.css" />
  <link rel="stylesheet" href="/css/myblog.css">
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
    .container h2{
      padding: 5px 10px;
      background: #000;
      color: #fff;
      font-size: 1rem;
    }
    .mce_body span{
      width: auto !important;
    }
  }
  a {
    color:black;
  }
  body{
    font-family: 'YuMincho','Yu Mincho', 'Times New Roman', 'HGS明朝E', 'ヒラギノ明朝 Pro W6', 'ＭＳ Ｐ明朝','MS PMincho', 'メイリオ', 'Meiryo', serif;
  }
  #calendar {
    width: 100%;
    height: 430px;
}
.fc .fc-toolbar-title {
    font-size: 1rem;
    margin: 0;
}
.fc-toolbar-chunk{
  font-size: .5rem;
}
.fc-prev-button.fc-button.fc-button-primary{
  margin-right: 140px;
}
.fc-header-toolbar.fc-toolbar {
  margin-bottom: 0;
}
h2.fc-toolbar-title{
  color: black;
  background-color: white;
}
  .fc-header-toolbar.fc-toolbar {
    display: flex;
    flex-direction: column;
  }
  .fc-today-button.fc-button.fc-button-primary{
    display: none;
  }
  </style>
  <script>

   document.addEventListener('DOMContentLoaded', function() {
     var calendarEl = document.getElementById('calendar');
     var calendar = new FullCalendar.Calendar(calendarEl, {
       initialView: 'dayGridMonth'
     });
     calendar.render();
   });

 </script>
</head>
<body>
  <?php
  include("./_common/tag/gtm.html");
  include("./_common/tag/_header.html");
  include("./_common/tag/_navi_for_pc.blade.php");
  ?>

<h2 class="main_tit">ブログ記事一覧</h2>

<div class="container" style="max-width: 90vw;margin:0 auto;">
  <div class="row">
    <div class="col-sm-8 blog_body">
      <h2 class="blog__title">ブログ記事一覧</h2>
      <dl class="blogdata">
        <dt>投稿日 :</dt>{{$article->release_at}}<dd></dd>
        <dt>カテゴリ :</dt><dd><a href="/blogs_category/{{$article->category->id}}">{{$article->category->title}}</a></dd>
      </dl>
      <div class="mce_body">
        {!! $article->body !!}
      </div>
    </div>
    <div class="col-sm-3 blog_side">
      <h2>カレンダー</h2>
        <div id='calendar' style="height:200px;"></div>
      <h2>カテゴリ</h2>
      <div id="blog_cat">
        <ul>
          @foreach ($categories as $category)
          <a href="/blogs_category/{{$category->id}}"><li>{{$category->title}}</li></a>
          @endforeach
        </ul>
      </div>

      <h2>過去ログ</h2>
      <div id="blog_all">
        <ul>
          @foreach ($logs as $current => $count)
            <a href="/blogs_month/{{$current}}"><li>{{$current}}（{{$count}}）</li></a>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>


  <?php
  include("./_common/tag/contact_btn.html");
  include("./_common/tag/_footer.blade.php");
  include("./_common/tag/script.html");
  ?>
</body>
</html>
