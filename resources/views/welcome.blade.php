@if (Auth::check())
@include('index')
@else
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PetTok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    <!-- font&icon -->
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Audiowide&family=Lobster&family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.0.0/css/font-awesome.min.css">
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

</head>

<body>
    <p class="logo">PetTok</p>
    <div class="the-container">
        <input type="checkbox" id="toggle" />
        <label for="toggle"></label>

        <div class="day-night-cont">
            <span class="the-sun"></span>
            <div class="the-moon"><span class="moon-inside"></span></div>
        </div>

        <p class="click">click here!</p>

        <div class="switch">
            <div class="button">
                <div class="b-inside"></div>
            </div>
        </div>


        <div class="c-window">

            <span class="the-sun"></span>
            <span class="the-moon"></span>

            <div class="the-cat">
                <div class="cat-face">
                    <section class="eyes left"><span class="pupil"></span></section>
                    <section class="eyes right"><span class="pupil"></span></section>

                    <span class="nose"></span>
                </div>
            </div>

        </div>
        <div class="links">
            {!! link_to_route('signup', 'Join us', [], ['class' => 'sign_up']) !!}
            {!! link_to_route('login', 'Log in', [], ['class' => 'login']) !!}
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

</body>

</html>

@endif
