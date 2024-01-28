<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="w-full min-h-[100vh] flex justify-center items-center flex-col formbg">

    <h1 class="text-grey font-bold text-2xl bg-green-700 p-4 m-2 w-1/2 text-center text-white rounded-xl">Farmer Login Page </h1>
    <form action="farmerRegistration" method="POST" class="p-4 m-4 bg-[#d678358f] mb-4 flex flex-col w-1/2 justify-center items-center rounded-xl">
        @csrf
        <input name="name" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Enter Username" value="{{ old('name') }}">
        <span class="text-danger">
            @error('name')
            {{ $message }}
            @enderror
        </span>
        <input  name="phone" class="m-2 p-2 w-[40vw] rounded-xl"type="text" placeholder="Enter Phone Number" value="{{ old('phone') }}" >
        <span class="text-danger">
            @error('phone')
            {{ $message }}
            @enderror
        </span>
        <input name="address" class="m-2 p-2 w-[40vw] rounded-xl" type="address" placeholder="Enter Address">
        <select name="bank" class="m-2 p-2 px-4 w-[40vw] rounded-xl">
            <option>NMB Bank</option>
            <option>NIC Asia</option>
            <option>Nabil</option>
            <option>Kumari</option>
        </select>
        <input name="account" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Enter Account Number" value="{{ old('account') }}" >
        <span class="text-danger">
            @error('account')
            {{ $message }}
            @enderror
        </span>
        <input name="email" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Enter Email ">
        <span class="text-danger">
            @error('email')
            {{ $message }}
            @enderror
        </span>

        <input name="password" class="m-2 p-2 w-[40vw] rounded-xl" type="password" placeholder="Enter Password">
        <span class="text-danger">
            @error('password')
            {{ $message }}
            @enderror
        </span>
        <input class="m-2 p-2 w-[40vw] rounded-xl" name="confirm-password" type="password" placeholder="Confirm Password" oninput="checkPasswordMatch()">
        <span class="text-danger text-black" id="password-match-error"></span>

        <button class="m-2 p-2 w-[40vw] rounded-xl bg-green-300" type="submit">Register</button>
        <div class="flex text-white" >If you have an account ,
            <div class="text-green-500 font-bold" >
                <a href="/farmer">Login</a>
            </div>

        </div>

        <script>
            function checkPasswordMatch() {
                var password = document.getElementsByName('password')[0].value;
                var confirmPassword = document.getElementsByName('confirm-password')[0].value;
                var passwordMatchError = document.getElementById('password-match-error');

                if (password !== confirmPassword) {
                    passwordMatchError.innerText = "Passwords do not match!";
                } else {
                    passwordMatchError.innerText = "";
                }
            }
        </script>
</body>
</html>
