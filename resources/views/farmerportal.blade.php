@auth


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Farmer Portal</title>
        @vite('resources/css/app.css')
    </head>

    <body class="">
        {{-- header --}}
        @include('components/header')



        {{-- Farmer will able to sell goods and see their orders --}}
        <div class="px-4 pt-4 text-xl font-bold">All Actions</div>
        <div class="flex  m-10 justify-around">
            {{-- View Orders - Can be serviced and marked as completed from here --}}
            <a href="/viewOrders" class="bg-green-500 w-[30%] flex justify-center items-center h-[200px]">
                View Orders
            </a>
            {{-- Add New Product --}}
            <a href="/addNewProduct" class="bg-green-500 w-[30%] flex justify-center items-center h-[200px]">
                Add New Product
            </a>
            {{-- View Product (Can be deleted and Edited from here) --}}
            <a href="/viewMyProduct" class="bg-green-500 w-[30%] flex justify-center items-center h-[200px]">
                View Your Products
            </a>
        </div>


        {{-- Third Party Widgets --}}
        <div class="px-4 pt-4 text-xl font-bold">Important Widgets</div>
        <div class="flex px-4">
            <iframe class="m-4" src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0"
                scrolling="no" marginwidth="0" marginheight="0"
                style="border:none; overflow:hidden; width:295px; height:385px;" allowtransparency="true"></iframe>


            <div class="w-full mr-5">

                <iframe class="m-4"
                    src="https://www.ashesh.com.np/weather/widget.php?title=Nepal Weather Observation&header_color=00a2e2&api=380015o120"
                    frameborder="0" scrolling="yes" marginwidth="0" marginheight="0"
                    style="border:none; overflow:hidden; width:100%; height:383px; border-radius:5px;"
                    allowtransparency="true">
                </iframe><span style="font-size:10px;color:gray;display:block">© <a href="http://www.ashesh.com.np/weather/"
                        title="Nepal Weather Today" target="_top"
                        style="text-decoration:none;font-size:10px;color:gray">Nepal
                        Weather Today</a></span>
            </div>
        </div>


        {{-- footer --}}
        <div class="p-4 mt-12 text-center font-bold  text-white  bg-green-700">
            &copy; Team "Harvest Heaven"
        </div>

    </body>

    </html>

@else
Hi
@endauth
