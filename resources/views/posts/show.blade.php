@extends('layouts.app')

@section('content')
<div class="item active">
    <div class="column">
        <img class="post-view-img" src="{{ $post->post_image }}" alt="post img">
    </div>
    <div class="column h-100">
        <div class="media post-view-user-img">
            <img src="{{ $post->user->profile_pic }}">
            <div class="media-body ml-3 mt-1">
                <a href="{{ route('users.show', ['id' => $post->user->id]) }}">
                    {{ $post->user->user_name ?? $post->user->name }}
                </a>
                <span class="d-block"><small> <i class="far fa-calendar-alt"></i> {{ $post_date }} <i class="fas fa-hashtag"></i> {{ $post->category }}</small></span>
            </div>
            @if(Auth::user()->id == $post->user_id)
            <div class="dropdown dropleft">
                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                <div class="dropdown-menu">
                    <!--<a class="dropdown-item text-center text-muted" href="#"><i class="fas fa-edit"></i> Edit Post</a>-->
                    {!! Form::open(['route' => ['post.delete', $post->id], 'method' => 'delete']) !!}
                    <button type="submit" class="dropdown-item text-center text-muted"><i class="fas fa-trash-alt"></i> Delete Post</button>
                    {!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>
        <div class="post-view-body body_scroll_text">
            <h2>{{ $post->post_title }}</h2>
            <p>{{ $post->post_body }}</p>
        </div>
        <div class="post-view-function border-bottom pt-2">
            <ul>
                <li>
                    @if (Auth::user()->is_like($post->id))
                    {!! Form::open(['route' => ['unlike', $post->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                    <button type="submit" class="like text-danger"><i class="fas fa-heart"></i></button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['route' => ['like', $post->id], 'class' => 'form-inline']) !!}
                    <button type="submit" class="like text-danger"><i class="far fa-heart"></i></button>
                    {!! Form::close() !!}
                    @endif
                </li>
                <li><span>{{ count($post->likes) }} </span></li>
                <li><i class="fa fa-comments text-primary"></i></li>
                <li class="ml-1"><span>{{ count($post->comments) }} </span></li>
                <li>
                    {!! Form::open(['route' => ['comment', $post->id],'class' => 'form-inline']) !!}
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" placeholder="Write a comment" size="30">
                    </div>
                    <button type="submit" class="btn-primary btn"><i class="fas fa-edit"></i></button>
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>
        <div class="post-view-function scroll_text">
            @if (count($comments) > 0)
            @foreach ($comments as $comment)
            <div class="comments">
                <div class="name">
                    <img src="{{ $comment->user->profile_pic }}">
                    {{ $comment->user->user_name ?? $comment->user->name }} :
                </div>
                <div class="text">
                    {{ $comment->comment }}
                </div>
                @if(Auth::user()->id == $comment->user_id)
                {!! Form::open(['route' => ['comment.delete', $comment->id], 'method' => 'delete']) !!}
                <button type="submit" class="text-danger"><i class="fas fa-trash-alt"></i></button>
                {!! Form::close() !!}
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
