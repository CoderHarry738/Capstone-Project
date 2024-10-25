<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title !== "" ? $title : 'Patient Portal' }}</title>
    @vite('resources/css/app.css')

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="min-h-screen px-2 pt-12 pb-6 bg-sky-400">
<x-messages />

