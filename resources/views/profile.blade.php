@auth
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>View Orders</title>
        @vite("resources/css/app.css")
    </head>
    <body>
        @include("components.header")


        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated At
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>


                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                
                            </th>
                            <!-- Add more header columns as needed -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                   
                        @for ($i = 0; $i < count($products); $i++)
                            {{-- @if ($id == $products[$i][""])
                                
                            @endif --}}



                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["id"]}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["created_at"]}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["updated_at"]}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["name"]}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["image"]}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["description"]}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["price"]}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$products[$i]["action"]}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                   <a href="markAsCompleted/{{$products[$i]["shop_id"]}}">Mark as completed</a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
             

            </div>
        </div>
    </body>
    </html>
@endauth