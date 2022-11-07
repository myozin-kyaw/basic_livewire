<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')
        <!-- Styles -->
        <livewire:styles />

    </head>
    <body>

        <livewire:counter />

        <hr>

        <livewire:contact-form/>

        <hr>

        <livewire:search-component/>

        <hr>

        <livewire:pagination-component/>

        <hr>

        <livewire:post-component/>

        <hr>

        <livewire:poll-component/>

        <livewire:scripts />
    </body>
</html>
