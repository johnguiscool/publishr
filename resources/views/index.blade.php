<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Novelglot</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Caveat|Crimson+Text|Heebo|Merriweather|Noto+Sans|Playfair+Display|Raleway|Roboto|Slabo+27px" rel="stylesheet">


        <!-- Styles -->
        <style>

            .title{
                font-size: 42px;
                font-weight: 400;
                color: #101010;
            }

            .container {
                max-width: 700px;
            }

            .border-top {
                border-top-width: 1px;
            }

            .border-top:first-of-type {
                border-top-width: 0px;
            }

            .logo-font {
                font-family: 'Merriweather', serif;
                //font-family: 'Caveat', cursive;

            }

            .title-font {
                font-family: 'Heebo', sans-serif;
            }

            .summary-font {
                font-family: 'Crimson Text', serif;

            }

            .navigation-font {

            }

            .footer-font {
                font-family: 'Crimson Text', serif;
            }

        </style>
    </head>
    <body>
        <header>
            <div class="mt-5 ml-10 text-2xl md:text-3xl logo-font">novelglot</div>
        </header>

        <div class="flex flex-col mt-5 mb-32 container px-10 mx-auto">
            @foreach($stories as $story)
            <div class="flex py-5 border-top">
                <div class="w-3/4 text-lg md:text-xl lg:text-2xl">
                    <div class="p-2"> 
                        <a href="/story/{{$story->id}}" class="no-underline"><b class="title-font font-semibold text-purple-darker">{{$story->title}}</b></a>

                        @if($story->is_premium)<span class="text-base md:text-lg lg:text-xl">★</span>@endif
                    </div>

                    <div class=" p-2 summary-font

                    text-base md:text-lg lg:text-xl

                    text-grey-dark
                    ">
                        {!! $story->summary!!}
                    </div>
                    @if($story->is_premium)
                        <div class="p-2 text-xs md:text-sm lg:text-base text-grey">Preview for free.  Available for: ${{$story->price}}</div>
                    @endif
                </div>
                <div class="w-1/4 flex items-center">
                    @if($story->id==2)
                    <img src="https://cdn-images-1.medium.com/max/800/1*xBHTRaQBbXmpt8NvVSuz6w.png">
                    @elseif($story->id==3)
                    <img src="https://cdn-images-1.medium.com/max/2560/1*g_jsX-iH3XSEyDOxZ6C6CQ.jpeg">
                    @elseif($story->id==4)
                    <img src="https://cdn-images-1.medium.com/max/800/1*E_zLW1GDS5G3k4GjP5FcUg.jpeg">
                    @endif

                </div>
            </div>
            @endforeach
        </div>

        <footer class="absolute pin-b pin-x mb-5 text-center footer-font text-grey text-lg md:text-xl">Copyright 2019</footer>

    </body>
</html>
