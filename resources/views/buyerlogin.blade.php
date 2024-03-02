<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="w-full h-[100vh] flex justify-center items-center flex-col formbg" >

    <h1 class="text-grey font-bold text-2xl bg-green-600 p-4 m-2 w-1/2 text-center text-white rounded-xl">Buyer Login Page </h1>
    <form method="POST" action="buyerLogin" class="p-4 m-4  bg-[#a29945] flex flex-col w-1/2 justify-center items-center rounded-xl">
        @csrf
        <input name="name" class="m-2 p-2 w-[40vw] rounded-xl"type="text" placeholder="Enter User Name">
        <input name="password" class="m-2 p-2 w-[40vw] rounded-xl" type="password" placeholder="Enter Password">
    <button class="m-2 p-2 w-[40vw] rounded-xl  text-black bg-green-400" type="submit">Login</button>
    <div class="flex text-white" >If you dont have an account , 
        <div class="text-black font-bold" >
            <a href="/buyerRegistration">Register</a>
        </div>

    </div>
</body>
</html>