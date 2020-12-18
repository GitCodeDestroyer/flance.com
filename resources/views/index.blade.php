<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <style>
            .bold {
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
            <hr>
            <router-link active-class="bold" to="/" exact>Home</router-link>
            <router-link active-class="bold" :to="{ name: 'about' }">About</router-link>
        </div>
        <script src="./js/app.js"></script>
    </body>
</html>
