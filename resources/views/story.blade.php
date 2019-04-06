<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
        <!-- Styles -->
        <style>
            div {
                font-family: 'Crimson Text', serif;
                font-size: 22px;
                color: #494949;
            }

            .title{
                font-size: 42px;
                font-weight: 400;
                color: #101010;
            }

            .container {
                max-width: 900px;
            }

        </style>
    </head>
    <body>        

        <div class="flex flex-col mt-10 mb-10 container px-10 mx-auto">
            <div class="title mb-5">{{$title}}</div>
            @if(session('purchased'))
                dd($purchased);
                {!! $content !!}
            @elseif(!$isPremium)
                {!! $content !!}
            @endif
            <a class="lg:fixed lg:pin-b lg:pin-r lg:mb-10 lg:mr-10" href="/">↩ Back</a>
        </div>

    </body>
</html>
