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
    @include('components/header')


    <div class="flex justify-center">
        <form method="POST" action="addNewProduct" enctype="multipart/form-data"
            class="p-4 m-4  bg-[#d6c335] flex flex-col px-10 justify-center items-center rounded-xl">
            @csrf
            <div class="form-group flex flex-col">
                <label  class="font-semibold" for="name">Product Name</label>
                <input name="name" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Product Name" value="{{old('name')}}">
                @if($errors->has('name'))
                <span class="text-danger text-red-600">{{$errors->first('name')}}</span>
                @endif
            </div>


            <div class="form-group flex flex-col">
                <label class="font-semibold" for="name">Product Image</label>
                <input name="image" accept="image/*" class="m-2 p-2 w-[40vw] rounded-xl" type="file" placeholder="Product Image">
                @if($errors->has('image'))
                <span class="text-danger text-red-600">{{$errors->first('image')}}</span>
                @endif
            </div>

            <div class="form-group flex flex-col">
                <label class="font-semibold" for="name">Product Description</label>

                <textarea name="description" class="m-2 p-2 w-[40vw] rounded-xl" type="text" placeholder="Enter Description"
                    rows="12" value="{{old('description')}}"></textarea>
                    @if($errors->has('description'))
                <span class="text-danger text-red-600">{{$errors->first('description')}}</span>
                @endif
            </div>

            <div class="form-group flex flex-col">
                <label class="font-semibold" for="name">Product Price</label>
                <input name="price" class="m-2 p-2 w-[40vw] rounded-xl" type="number" min="0" placeholder="Product Price">
                @if($errors->has('price'))
                <span class="text-danger text-red-600">{{$errors->first('price')}}</span>
                @endif
            </div>

            <button class="m-2 p-2 w-[40vw] rounded-xl bg-green-500" type="submit">Add Product</button>
        </form>
    </div>


</body>

</html>
