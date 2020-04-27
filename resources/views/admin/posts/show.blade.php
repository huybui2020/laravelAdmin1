@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <style>
                        img{ display: block; margin: 0 auto; }
                    </style>
                    <div class="card-header">Post {{ $post->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/posts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/posts/' . $post->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/posts', $post->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $post->id }}</td>
                                    </tr>
                                    <tr><th> Post Title </th><td> {{ $post->post_title }} </td></tr><tr><th> Post Slug </th><td style="text-align:  center"> <img src="{{ asset('uploads/posts/' .$post->post_image) }}" alt="Không tìm thấy ảnh!" style="width: 360px; height: 240px; border: 1px solid grey; "></td></tr>
                                    <tr><th> Post Teaser </th><td> {!! $post->post_teaser !!} </td></tr>
                                    <tr><th> Post Content </th><td> {!! $post->post_content !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
