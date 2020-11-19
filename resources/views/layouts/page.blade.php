<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>東京タトゥースタジオTATTOO STUDIO Ray's TOKYO　タトゥー・刺青</title>
        <meta name="description" content="東京のTATTOOスタジオ、洋彫り、TRIBAL（トライバル）、ホワイトタトゥー、カバーアップ（リメイク）、和彫りなどオールジャンルに対応。徹底した衛生管理と感染症対策を行っております。特にホワイトタトゥーやカバーアップタトゥーは多くのお客様にご支持頂いており日本全国、海外からもご来店頂いてます。東京スタジオには彫師（タトゥーアーティスト）が常に2～3人在籍し、明るくクリーンな空間です。ご予約はLINEやお電話などで承ります。">
        <meta name="keywords" content="東京,タトゥー,TATTOO,刺青" />
        <meta name="ROBOTS" content="INDEX,FOLLOW" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.typekit.net/vxk5mgw.css">
        <link rel="stylesheet" href="/css/sp_temp.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137381226-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-137381226-1');

          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-55497646-1', 'auto');
          ga('send', 'pageview');
        </script>

        <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
        <script src="/js/onebook/jquery-1.11.0.min.js" charset="utf-8"></script>
        <script src="/js/onebook/jquery.mousewheel.min.js"></script>
        <script src="/js/onebook/three.min.js"></script>
        <script src="/js/onebook/jquery.onebook3d-2.33.js"></script>

    </head>

    <body>


            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')

    </body>
</html>
