<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title){{ $title }} - @endisset {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/app-8f397267.css')}}">
    <script src="{{ asset('assets/app-114cb30b.js')}}"></script>
</head>
<body>
    {{
        $slot
    }}
</body>
</html>