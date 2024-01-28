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

    <h1 class="text-grey font-bold text-2xl bg-green-700 p-4 m-2 w-1/2 text-center text-white rounded-xl">Buyer Login Page </h1>
    <form action="buyerRegistration" method="POST" class="p-4 m-4 bg-[#d678358f] mb-4 flex flex-col w-1/2 justify-center items-center rounded-xl">
        @csrf
        <input class="m-2 p-2 w-[40vw] rounded-xl" type="text" name="name" placeholder="Enter Username" value="{{ old('name') }}">
        <span class="text-danger">
            @error('name')
            {{ $message }}
            @enderror
        </span>
        <input class="m-2 p-2 w-[40vw] rounded-xl" type="text" name="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}">
        <span class="text-danger">
            @error('phone')
            {{ $message }}
            @enderror
        </span>
        <input class="m-2 p-2 w-[40vw] rounded-xl" name="address" type="address" placeholder="Enter Address">

        <input class="m-2 p-2 w-[40vw] rounded-xl" name="email" type="email" placeholder="Enter your email">
        <span class="text-danger">
            @error('email')
            {{ $message }}
            @enderror
        </span>
        <input class="m-2 p-2 w-[40vw] rounded-xl" type="password" name="password" placeholder="Enter Password">
        <span class="text-danger text-black">
            @error('password')
            {{ $message }}
            @enderror
        </span>
        <input class="m-2 p-2 w-[40vw] rounded-xl" name="confirm-password" type="password" placeholder="Confirm Password" oninput="checkPasswordMatch()">
        <span class="text-danger text-black" id="password-match-error"></span>

        <button class="m-2 p-2 w-[40vw] rounded-xl bg-green-300" type="submit">Register</button>
        <div class="flex text-white">If you have an account,
            <div class="text-green-500 font-bold">
                <a href="/buyer">Login</a>
            </div>
        </div>
    </form>

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
