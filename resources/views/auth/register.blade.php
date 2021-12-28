<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PetTok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Audiowide&family=Lobster&display=swap" rel="stylesheet">

    <!-- FontsAwesome Icon -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="the-container">
        <p class="logo">Join PetTok</p>
        <div class="c-window">

            <span class="the-sun"></span>

            <div class="the-cat">
                <div class="cat-face">
                    <section class="eyes left"><span class="pupil"></span></section>
                    <section class="eyes right"><span class="pupil"></span></section>
                    <span class="nose"></span>
                </div>
            </div>

        </div>
    </div>
    <div class="form_container">
        <a href="/" class="back">X</a>
        @if (count($errors) > 0)
        <ul class="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <div class="form_content">
            {!! Form::open(['route' => 'signup.post']) !!}
            {!! Form::text('name', old('name'), ['placeholder' => ' Name']) !!}
            {!! Form::email('email', old('email'), ['placeholder' => ' Email']) !!}
            {!! Form::password('password', ['placeholder' => ' password']) !!}
            {!! Form::password('password_confirmation', ['placeholder' => ' password_confirmation']) !!}
            {!! Form::submit('Sign up', ['class' => 'submitBTN']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>



</body>

</html>