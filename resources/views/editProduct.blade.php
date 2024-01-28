<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components/header')

    <div class="flex justify-center">
        <form method="POST" action="/editProduct/{{$product["id"]}}"
            class="p-4 m-4  bg-[#d678358f] flex flex-col w-3/4 justify-center items-center rounded-xl">
            @csrf
            <div class="form-group flex flex-col">
                <label for="name">Product Name</label>
                <input name="name" value="{{$product["name"]}}" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Product Name">
            </div>


            <div class="form-group flex flex-col">
                <label for="name">Product Image</label>
                <input name="image" class="m-2 p-2 w-[40vw] rounded-xl" type="file" placeholder="Product Image">
            </div>


            <div class="form-group flex flex-col">
                <label for="name">Product Description</label>

                <textarea name="description" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Enter Description"
                    rows="12">
                    {{$product["description"]}}
                </textarea>
            </div>

            <div class="form-group flex flex-col">
                <label for="name">Product Price</label>
                <input name="price" value="{{$product["price"]}}" class="m-2 p-2 w-[40vw] rounded-xl" type="number" placeholder="Product Price">
            </div>

            <button class="m-2 p-2 w-[40vw] rounded-xl bg-green-300" type="submit">Update Product</button>
        </form>


    </div>


</body>

</html>
