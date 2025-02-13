<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    @if ($noIndex)
        <meta name="robots" content="noindex, nofollow">
    @endif

    @isset($head)
        {{ $head }}
    @endisset

    @vite(['resources/sass/app.scss', 'resources/ts/app.ts'])
</head>

<body {{ $attributes }}>
    {{ $slot }}

    @isset($foot)
        {{ $foot }}
    @endisset
</body>

</html>
