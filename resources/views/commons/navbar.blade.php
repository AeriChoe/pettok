<header class="mb-4">
    <div style="padding-bottom: 120px;">
        <nav class="navbar navbar-expand-lg custom-navbar navbar-light fixed-top" id="main_navbar">
            <a href="/" class="navbar-brand logo"><img src="http://get.secret.jp/pt/file/1589513872.jpg" alt="logo" class="logo logo_img"  border="0">PetTok</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item menu_li">
                        <a class="nav-link" href="{{ route('posts.show', ['category' => 'Pets']) }}">
                            Pets
                        </a>
                    </li>
                    <li class="nav-item menu_li">
                        <a class="nav-link" href="{{ route('posts.show', ['category' => 'Free']) }}">
                            Free
                        </a>
                    </li>
                    <li class="nav-item menu_li">
                        <a class="nav-link" href="{{ route('posts.show', ['category' => 'News']) }}">
                            News
                        </a>
                    </li>
                    <li class="nav-item menu_li dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                {!! link_to_route('profile.index', 'My page', [], ['class' => 'dropdown-item']) !!}
                            </li>
                            <!--
                            <li>
                                <a class="dropdown-item" href="#">
                                    Posts
                                </a>
                            </li>
                            -->
                            <div class="dropdown-divider"></div>
                            <li>
                                {!! link_to_route('logout', 'Logout', [], ['class' => 'dropdown-item']) !!}
                            </li>
                        </ul>
                    </li>

                </ul>
                <div class="form-inline my-2 mr-sm-5">
                   {!! Form::open(['route' => 'search','method' => 'post', 'class' => 'form-horizontal search-form']) !!}
                        <input class="form-control search-text" name="keyword" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn search_btn my-2 my-sm-0" name="search" type="submit">Search</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </nav>
    </div>
</header>
