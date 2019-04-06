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
        <header class="mt-5 flex flex-col md:flex-row md:justify-between">
            <div class="ml-10 text-2xl md:text-3xl logo-font">novelglot</div>

            <!--nav class="flex flex-col items-left md:flex-row justify-end flex-wrap ml-10 mr-10">

                  <a href="#" class="block mt-4 md:mt-0 md:inline-block md:mr-4 no-underline text-purple-darker
                  font-semibold
                  navigation-font
                  text-base md:text-lg lg:text-xl">
                    Essays
                  </a>
                  <div class="hidden md:inline mr-4">|</div>
                  <a href="#" class="block mt-4 md:mt-0 md:inline-block md:mr-4 no-underline text-purple-darker
                  font-semibold
                  navigation-font
                  text-base md:text-lg lg:text-xl">
                  
                    Fiction
                  </a>

            </nav -->
        </header>

        <div class="flex flex-col mt-5 mb-32 container px-10 mx-auto">
            @foreach($stories as $story)

            @php

                $img = "/storage/$story->image";

            @endphp

            <div class="flex py-5 border-top">
                <div class="w-3/4 text-lg md:text-xl lg:text-2xl">
                    <div class="p-2"> 
                        <a href="/story/{{$story->id}}" class="no-underline"><b class="title-font font-semibold text-purple-darker">{{$story->title}}</b> </a>

                        @if($story->is_premium)<span class="text-base md:text-lg lg:text-xl">★</span>@endif
                    </div>

                    <div class=" p-2 summary-font

                    text-base md:text-lg lg:text-xl

                    text-grey-dark
                    ">
                        {!! $story->summary!!}
                    </div>
                    @if($story->is_premium)
                        <div class="p-2 text-xs md:text-sm lg:text-base text-grey">Preview for free.  Available for: ${{$story->price}}

                            <form class="mt-3" action="/purchase/{{$story->id}}" method="POST">
                                {{csrf_field()}}
                              <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{ config('services.stripe.key') }}"
                                data-amount="99"
                                data-name="Purchase Story"
                                data-description="{{$story->title}}"
                                data-image=""
                                data-locale="auto">
                              </script>
                            </form>


                        </div>
                    @endif
                </div>

                <div class="w-1/4 flex items-center" style='background: white url("{{$img}}") no-repeat; 
                    background-size: auto 100%;'>
                    <img>
                </div>
            </div>
            @endforeach
        </div>

        <footer class="mb-5 text-center footer-font text-grey text-lg md:text-xl">Copyright 2019</footer>

    </body>
</html>
