<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@raysCJ2016" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:title" content="{{$article->title}}" />
<meta property="og:image" content="{{$article->thumbnail}}" />
<meta property="og:description" content="{!! mb_strcut(strip_tags(str_replace("\r\n", '', $article->body)),0,350); !!}" />
