<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Novelglot</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            div {
                color: #494949;
            }

            .title{
                font-size: 42px;
                font-weight: 400;
                color: #101010;
            }

            .container {
                max-width: 700px;
            }

        </style>
    </head>
    <body>
        <div class="flex flex-col mt-10 mb-10 container px-10 mx-auto">
            @foreach($stories as $story)
            <div class="flex mb-10">
                <div class="w-3/4 text-lg md:text-xl lg:text-2xl">
                    <a href="/story/{{$story->id}}" class="no-underline"><b class="font-sans">{{$story->title}}</b></a>
                    @if($story->is_premium)<span class="text-base md:text-lg lg:text-xl">★</span>@endif
                    <div class="font-serif font-family:Lucidabright">
                        {!! $story->summary!!}
                    </div>
                    @if($story->is_premium)
                        <div class="text-sm md:text-base lg:text-lg"> ${{$story->price}}</div>
                    @endif
                </div>
                <div class="w-1/4">
                    <img src="https://cdn-images-1.medium.com/focal/152/156/57/51/1*wz2UuoRImSEWa5pXu-n1qw.jpeg">
                </div>
            </div>
            <hr>
            @endforeach
        </div>

    </body>
</html>
