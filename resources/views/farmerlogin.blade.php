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

    <h1 class="text-grey font-bold text-2xl bg-green-700 p-4 m-2 w-1/2 text-center text-white rounded-xl">Farmer Login Page </h1>
    <form action="farmerLogin" method="POST" class="p-4 m-4 pt-12 bg-[#d678358f] flex flex-col w-1/2 justify-center items-center rounded-xl">
        @csrf
        <input name="name" class="m-2 p-3 w-[40vw] rounded-xl"type="text" placeholder="Enter Username">
        <input name="password" class="m-2 p-3 w-[40vw] rounded-xl" type="password" placeholder="Enter Password">
    <button class="m-2 p-3 w-[40vw] rounded-xl bg-green-300" type="submit">Login</button>
    <div class="flex text-white" >If you dont have an account , 
        <div class="text-black font-bold" >
            <a href="/farmerRegistration">Register</a>
        </div>

    </div>
</body>
</html>