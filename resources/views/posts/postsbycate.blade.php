@extends('layouts.frontend')

@section('content')

<h1 class="cate_heading">Tin {{$categories->cate_name}}</h1>
<br>
@foreach($posts as $post)
<div class="row">
    <div class="col-md-4"><img src="{{ asset('uploads/posts/' .$post->post_image) }}" alt="{{$post->post_title}}" class="img_cate"></div>
    <div class="col-md-8"><h2><a href="/tin-tuc/{{$post->post_slug}}" class="title_detail">{{$post->post_title}}</a></h2>
        <p style="text-align: justify" class="cate_teaser">{!!$post->post_teaser!!}</p></div>
</div>
@endforeach
<br><br>
<div style="position: absolute; bottom: 20px; display: block">{{ $posts->links() }}</div>

@endsection
