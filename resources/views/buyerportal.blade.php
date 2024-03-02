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
            @foreach ($products as $product)
                <div class="m-4 p-4 bg-[#0d0e0dc8] flex flex-col w-[20%]">
                    <img width="100%" src="{{ url('/') }}/storage/{{ $product['image'] }}">
                    
                    <div class="flex flex-col">
                        <div class="text-red-600 text-xl font-bold">{{ $product['name'] }}</div>
                        <div class="text-white">{{ $product['description'] }}</div>
                        <div class="text-white">Price: Rs{{ $product['price'] }}</div>

                    </div>
                    <!-- Product.blade.php or a similar view -->
                    <button class="bg-green-500 m-4 p-2 rounded-lg" id="addToCart" data-id='{{ $product['id'] }}'>
                        <span>Buy Now</span></button>
                </div>
            @endforeach

        </div>

        @if (count($products) == 0)
            <center>No items found</center>
        @endif

    </body>

    </html>
@endauth
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    function purchaseProduct(productId) {
        // Simulate a successful purchase
        alert('Success! You have purchased ' + ' with ID ' + productId);
    }

    $('#addToCart').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var confirmation = confirm('Are you sure you want to add this product to the cart?');

        if (confirmation) {
            console.log('User clicked OK');
            window.location.href = 'processBuy/' + id;
        } else {
            console.log('User clicked Cancel');
        }
    });
</script>
