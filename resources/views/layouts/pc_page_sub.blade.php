<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Microposts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.typekit.net/vxk5mgw.css">
        <link rel="stylesheet" href="/css/pc_basic.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

        <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
        <script src="/js/onebook/jquery-1.11.0.min.js" charset="utf-8"></script>
        <script src="/js/onebook/jquery.mousewheel.min.js"></script>
        <script src="/js/onebook/three.min.js"></script>
        <script src="/js/onebook/jquery.onebook3d-2.33.js"></script>
        <script src="/js/nav_fix.js" charset="utf-8"></script>

    </head>

    <body>


            {{-- エラーメッセージ --}}
            @include('commons.error_messages')
            <section class="header">
              @include('commons.pc.page_navbar')              
            </section>

            @yield('content')

            @include('commons.pc.page_footer')

    </body>
</html>
