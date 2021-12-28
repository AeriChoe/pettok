@extends('layouts.app')

@section('content')
<div class="row" id="main-section">
    <div class="col-lg-7">
        <h1 class="d-inline">New Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-outline-danger float-right mt-3"><i class="fa fa-plus-circle"></i> add post</a>
        <hr>
        <div class="row">
            @if (count($posts) > 0)
            @foreach ($posts as $post)
            <div class="col-lg-6 col-md-6">
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
                    <div class="category-tag">
                        <p>#{{ $post->category }}</p>
                    </div>
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
            <h3>Plese Add first post.</h3>
            @endif
        </div>
    </div>



    <!-- RECENT POST -->
    <div class="col-lg-4">
        <div class="widget-sidebar">
            <h2 class="title-widget-sidebar">// RECENT NEWS</h2>
            <div class="content-widget-sidebar">
                <ul>
                  @if(count($news_posts) > 0)
                   @foreach($news_posts as $news_post)
                    <li class="news-post">
                        <div class="post-img">
                            <img src="{{ $news_post->post_image }}">
                        </div>
                        <a href="{{ route('post.show', ['id' => $news_post->id]) }}">
                            <p class="mt-2">{{ $news_post->post_title }}</p>
                        </a>
                        <p><small><i class="fa fa-calendar"></i> {{ $news_post->created_at }}</small></p>
                    </li>
                    @endforeach
                    @if(count($news_posts) > 2)
                     <a href="{{ route('posts.show', ['category' => 'News']) }}" class="text-decoration-none text-danger"><li class="text-right mt-2 mr-4" style="list-style: none;">more <i class="fas fa-angle-double-right"></i></li></a>
                    @endif
                    @endif
                </ul>
            </div>
        </div>

        <div class="widget-sidebar">
            <h2 class="title-widget-sidebar">// ARCHIVES</h2>
            <div class="last-post">
                <button class="accordion">{{ date("Y/m/d") }}</button>
                <div class="panel">
                    <li class="recent-post">
                        <div class="post-img">
                            <img src="http://get.secret.jp/pt/file/1590564320.jpg" class="img-responsive">
                        </div>
                        <a href="#">
                            <h5 class="mt-4">My lovely cat</h5>
                        </a>
                        <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> {{ date("j M Y") }}</small></p>
                    </li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <hr>
            <div class="last-post">
                <button class="accordion">{{ date("Y/m/d", strtotime("-1 day")) }}</button>
                <div class="panel">
                    <li class="recent-post">
                        <div class="post-img">
                            <img src="http://get.secret.jp/pt/file/1590564320.jpg" class="img-responsive">
                        </div>
                        <a href="#">
                            <h5 class="mt-4">My lovely cat</h5>
                        </a>
                        <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> {{ date("j M Y", strtotime("-1 day")) }}</small></p>
                    </li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <hr>
            <div class="last-post">
                <button class="accordion">{{ date("Y/m/d", strtotime("-2 day")) }}</button>
                <div class="panel">
                    <li class="recent-post">
                        <div class="post-img">
                            <img src="http://get.secret.jp/pt/file/1590564320.jpg" class="img-responsive">
                        </div>
                        <a href="#">
                            <h5 class="mt-4">My lovely cat</h5>
                        </a>
                        <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> {{date("j M Y", strtotime("-2 day"))}}</small></p>
                    </li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            
        </div>

        <div class="widget-sidebar mt-5">
            <h2 class="title-widget-sidebar">// CATEGORIES</h2>
            <a href="{{ route('posts.show', ['category' => 'Pets']) }}"><button class="categories-btn">Pets</button></a>
            <hr>
             <a href="{{ route('posts.show', ['category' => 'Free']) }}"><button class="categories-btn">Free</button></a>
            <hr>
             <a href="{{ route('posts.show', ['category' => 'News']) }}"><button class="categories-btn">News</button></a>
        </div>


    </div>
</div>


@endsection
