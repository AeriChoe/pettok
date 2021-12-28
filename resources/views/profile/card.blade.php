<div class="main-card">
    <div class="profile-card">

        <div class="profile-header">

            <div class="cover-image">
                <img src="{{ $user->cover_pic }}" class="img img-fluid">
            </div>
            <div class="user-image">
                <img class="avatar img-thumbnail" src="{{ $user->profile_pic }}">
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-name">
                {{ $user->user_name ?? $user->name }}
            </div>
            <p class="profile-description">{{ $user->description }}</p>

            <div class="kl-figure-block">
                <span class="kl-figure">{{ count($user->followers) }}</span>
                <span class="kl-title">Followers</span>
            </div>
            <div class="kl-figure-block">
                <span class="kl-figure">{{ count($user->followings) }}</span>
                <span class="kl-title">Following</span>
            </div>

            @if (Auth::id() != $user->id)
            @if (Auth::user()->is_following($user->id))
            {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-block"]) !!}
            {!! Form::close() !!}
            @else
            {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('Follow', ['class' => "btn btn-success btn-block"]) !!}
            {!! Form::close() !!}
            @endif
            @endif

            <hr>

            <ul class="about">
                <li class="about-items">
                    <i class="fas fa-venus-mars"></i>
                    <span class="about-item-name">Gender :</span>
                    <span class="about-item-detail">
                        @if($user->gender == null)None
                        @else{{ $user->gender }}
                        @endif
                    </span>
                </li>
                <li class="about-items">
                    <i class="fas fa-birthday-cake"></i>
                    <span class="about-item-name">Birthday :</span><span class="about-item-detail">
                        @if($user->month == null and $user->day == null)None
                        @else{{ $user->month }} / {{ $user->day }}
                        @endif
                    </span>
                </li>
                <li class="about-items">
                    <i class="fas fa-paw"></i>
                    <span class="about-item-name">My pet :</span><span class="about-item-detail">
                        @if($user->pet == null)None
                        @else{{ $user->pet }}
                        @endif
                    </span>
                </li>
                <li class="about-items">
                    <i class="far fa-heart"></i>
                    <span class="about-item-name">Relationship Status :</span>
                    <span class="about-item-detail">
                        @if($user->relationship == null)None
                        @else{{ $user->relationship }}
                        @endif
                    </span>
                </li>
            </ul>
            @if (Auth::id() == $user->id)
            {!! link_to_route('profile.edit', 'Edit Profile', Auth::user()->id , ['class' => 'btn btn-block btn-edit-pro']) !!}
            @endif
        </div>
    </div>
</div>
