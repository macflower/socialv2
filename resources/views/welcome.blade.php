<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-800 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1 class="text-blue-500 text-4xl">Добро Пожаловать в <b>{{ config('app.name') }}</b>!</h1>
                </div>

                <p class="text-gray-50 mt-2">Социальная сеть веб-разработчиков</p>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 font-bold">
                        <a href="{{ route('login') }}" class="bg-gray-50 p-6 text-gray-700 hover:bg-blue-500 hover:text-gray-50 delay-75">Вход</a>
                        <a href="{{ route('register') }}" class="bg-gray-50 p-6 text-gray-700 hover:bg-blue-500 hover:text-gray-50 delay-75">Регистрация</a>
                    </div>
                </div>

                <div class="text-gray-50">
                    <p class="mt-6 font-bold">© {{ date('Y') }}</p>
                    <p><a class="text-small hover:underline" href="{{ route('terms.show') }}" target="_blank">Условия использования</a></p>
                    <p><a class="text-small hover:underline" href="{{ route('policy.show') }}" target="_blank">Политика конфеденциальности</a></p>
                </div>

            </div>
        </div>

    </body>
</html>
