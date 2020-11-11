@extends('layouts.app')

@section('content')

<h3>Title : {{$notice->title}}</h3>
<div style="margin:10vh 0;"></div>
{!! $notice->body !!}

<a href="/home">＜＜Back</a>

@endsection
