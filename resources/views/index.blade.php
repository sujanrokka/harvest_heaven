<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Harvest Heaven</title>
    @vite('resources/css/app.css')
</head>

<body class="body">
    <div class="flex flex-col  justify-center items-center w-[100vw] h-[100vh]">

        <div
            class="m-4 text-center items-center flex flex-col w-[95vw] justify-center bg-[#a6cd99aa] rounded-3xl h-[90vh]">
            <marquee direction="right"><img
                    src="https://i.pinimg.com/originals/21/6f/fe/216ffedf6e455be8b797a10c856b7b1f.gif" width="300px"
                    height="300px" alt=""></marquee>
            <div class="text-2xl font-semibold p-4 text-white">
                Bridging the gap, from seed to sale
                <div class="text-[50px] m-4 font-bold text-orange-600 italic underline">#HarvestHeaven</div>
            </div>
            <div class="flex justify-center items-center p-4">
                <a class="bg-green-700 flex justify-center hover:bg-blue-800  w-[30vw]  rounded-xl ml-2 text-white font-bold p-4"
                    href="/farmer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="w-6 h-6 mr-4 font-bold">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Log in (Farmer)</a>
                <a class="bg-red-700 flex justify-center hover:bg-blue-800  w-[30vw] rounded-xl ml-2 text-white font-bold p-4"
                    href="/buyer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="w-6 h-6 mr-4 font-bold">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>

                    Log In (Buyer)</a>

            </div>
        </div>
    </div>
</body>

</html>
