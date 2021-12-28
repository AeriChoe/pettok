@extends('layouts.app')

@section('content')
<div class="main-panel">
    <div class="container">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                @include('profile.card')
            </div>

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li class="list-on-event active">
                                        <a href="#tab_default_1" data-toggle="tab">
                                            Posts </a>
                                    </li>
                                    <li class="list-on-event">
                                        <a href="#tab_default_2" data-toggle="tab">
                                            Follower </a>
                                    </li>
                                    <li class="list-on-event">
                                        <a href="#tab_default_3" data-toggle="tab">
                                            Following </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="container mt-3">
                                            <div class="row">
                                                @if(count($posts) > 0 )
                                                @foreach($posts as $post)
                                                <figure class="col-sm-4 mb-4 post-mouse-hover">
                                                    <img src="{{ $post->post_image }}" alt="user_post_img" class="img-fluid">
                                                    <figcaption>
                                                        @if(strlen($post->post_title)>10)
                                                        <h3>{{ substr($post->post_title, 0, 10) }}..</h3>
                                                        @else
                                                        <h3>{{ substr($post->post_title, 0, 10) }}</h3>
                                                        @endif
                                                        <h5>Show post<i class="fas fa-arrow-right"></i></h5>
                                                    </figcaption>
                                                    <a href="{{ route('post.show', ['id' => $post->id]) }}"></a>
                                                </figure>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_default_2">
                                        @if(count($followers) > 0 )
                                        @foreach ($followers as $follower)
                                        <div class="media">
                                            <img class="media-object follow_img" src="{{ $follower->profile_pic }}">
                                            <div class="media-body ml-3">
                                                @if($follower->user_name == '')
                                                {!! link_to_route('users.show', $follower->name, ['id' => $follower->id], ['class'=>'d-block follow_name']) !!}
                                                @else
                                                {!! link_to_route('users.show', $follower->user_name, ['id' => $follower->id], ['class'=>'d-block follow_name']) !!}
                                                @endif
                                                <span class="d-block follow_description">{{ $follower->description }}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane" id="tab_default_3">
                                        @if(count($followings) > 0 )
                                        @foreach ($followings as $following)
                                        <div class="media">
                                            <img class="media-object follow_img" src="{{ $following->profile_pic }}">
                                            <div class="media-body ml-3">
                                                @if($following->user_name == '')
                                                {!! link_to_route('users.show', $following->name, ['id' => $following->id], ['class'=>'d-block follow_name']) !!}
                                                @else
                                                {!! link_to_route('users.show', $following->user_name, ['id' => $following->id], ['class'=>'d-block follow_name']) !!}
                                                @endif
                                                <span class="d-block follow_description">{{ $following->description }}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
