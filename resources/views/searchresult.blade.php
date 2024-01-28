@auth
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite('resources/css/app.css')
    </head>

    <body class="formbg">
        @include('components.header')
        @include('components.search')


       <div class="flex flex-wrap justify-around">
        @for ($i = 0; $i < count($products); $i++)
        <div class="m-4 p-4 bg-[#0d0e0dc8] flex flex-col w-[20%]">
            <img width="100%"  src="{{ $products[$i]['image'] }}">
            <div class="flex flex-col">
                <div class="text-red-600 text-xl font-bold"> {{ $products[$i]['name'] }}</div>
                <div class="text-white"> {{ $products[$i]['description'] }}</div>
                <button class="bg-green-500 m-4 p-2 rounded-lg">
                    <a href="processBuy/{{$products[$i]['id']}}">Buy</button>


            </div>
        </div>



    
    @endfor

       </div>

        @if (count($products) == 0)
            <center>No items found</center>
        @endif

    </body>

    </html>
@endauth
