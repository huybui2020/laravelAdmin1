@extends('layouts.frontend')

@section('content')
<br/>
<h1 class="post_title">{{ $post->post_title }} </h1><br>

 <div class="post_teaser">{!! $post->post_teaser !!} </div><br>
 <img src="{{ asset('uploads/posts/' .$post->post_image) }}" alt="{{$post->post_title}}">
 <br>
 <div class="img_desc">{{$post->post_image_desc}}</div><br>
 <div class="post_content">{!! $post->post_content !!}</div>

@endsection
