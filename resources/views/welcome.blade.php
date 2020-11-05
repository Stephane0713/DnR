<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->

</head>

<body>
    <h1><a href="{{ route('games.index') }}">Index</a></h1>
    <h1><a href="{{ route('games.create') }}">Create</a></h1>
    <p>Email : admin@admin.fr</p>
    <p>Password : admin123</p>
</body>

</html>
