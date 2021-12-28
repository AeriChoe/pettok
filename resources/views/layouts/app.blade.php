<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PetTok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- font&icon -->
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Audiowide&family=Lobster&family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.2/css/font-awesome.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

</head>

<body>

    @include('commons.navbar')

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
