@extends('layouts.app')

@section('content')

<div class="row" id="main-section">
    <div class="col-sm-11 mx-auto">
        <h1 class="d-inline"> Search : #{{ $keyword }}</h1>
        <hr>
        <div class="row">
            @if (count($posts) > 0)
            @foreach ($posts as $post)
            <div class="col-md-6 mx-auto">
                <aside>
                    <a href="{{ route('post.show', ['id' => $post->id]) }}" class="main-post">
                        <img src="{{ $post->post_image }}">
                        <h4 class="text-center pt-3">{{ $post->post_title }}</h4>
                        @if(strlen($post->post_body)>35)
                        <p class="text-center">{{ substr($post->post_body, 0, 30) }}...</p>
                        @else
                        <p class="text-center">{{ $post->post_body }}</p>
                        @endif
                    </a>
            
                    <div class="content-footer">
                        <img src="{{ $post->user->profile_pic }}">
                        @if($post->user->user_name == '')
                        {!! link_to_route('users.show', $post->user->name, ['id' => $post->user_id], ['class'=>'post-user-name']) !!}
                        @else
                        {!! link_to_route('users.show', $post->user->user_name, ['id' => $post->user_id], ['class'=>'post-user-name']) !!}
                        @endif
                        <span class="float-right mt-1">
                            <span class="mr-2 text-danger"><i class="fa fa-heart"></i>
                                {{ count($post->likes) }}
                            </span>
                            <span class="mr-2 text-primary"><i class="fa fa-comments"></i>
                                {{ count($post->comments) }}
                            </span>
                        </span>
                    </div>
                </aside>
            </div>
            @endforeach
            @else
            <h3>No post.</h3>
            @endif
        </div>
    </div>

</div>
@endsection
