<x-app-layout>

   <div class="container mx-auto">

    @if (session('success'))
        <div class="bg-green-200 p-2 border border-green-500 mt-5 mx-10 text-green-500 flex justify-between">
            <h1> {{ session('success') }}</h1>
            <button onclick="this.parentElement.style.display='none'" class="text-red-500">X</button>
        </div>
    @endif
      <div><h1 class="text-2xl text-orange-500 my-5 font-bold">Like Products</h1></div>


    <div class="grid grid-cols-4 mt-5 gap-5">

        @foreach ($likedProducts as $product)
            <div class="shadow-md  rounded-md border border-gray-300 relative ">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1399&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="">

                <div class="m-3">

                    <h1 class="text-gray-600">Title : {{ $product->title }} </h1>

                    @if ($product->discount > 0)
                        <div class="flex flex-col items-start">
                            <h1 class="text-gray-600 line-through text-sm">Price:
                                {{ number_format($product->price, 2) }}</h1>
                            <h1 class="text-red-600 text-md font-bold">Discounted Price:
                                {{ $product->discounted_price }}</h1>
                        </div>
                    @else
                        <h1 class="text-gray-600 text-md font-bold">Price:
                            {{ number_format($product->price, 2) }}</h1>
                    @endif




                    <div class="grid grid-cols-3 gap-2 my-3  text-sm text-white">



                        <a href="{{ route('product.show', $product->id) }}"
                            class="bg-blue-500 p-2 text-center w-full ">Read More</a>

                        @if ($product->status === 'available')
                            <form action="{{ route('product.sell', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-orange-500 p-2 text-center w-full">Buy
                                    now</button>
                            </form>
                        @else
                            <p>Product is already sold.</p>
                        @endif

                        @if (auth()->check())
                            @if (!$product->likes->contains(auth()->user()))
                                <form action="{{ route('product.like', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="p-1 w-full flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('product.unlike', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="p-1 w-full flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red"
                                            class="size-6">
                                            <path
                                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                        </svg>


                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="p-1 w-full flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>


                            </a>
                        @endif

                    </div>


                </div>
                @if ($product->discount >= 1)
                    <div
                        class="bg-red-500 p-2 rounded-full absolute top-2 right-2 text-white font-bold text-sm opacity-90">
                        Off % {{ $product->discount }}</div>
                @endif


            </div>
        @endforeach

    </div>
</div>
</x-app-layout>
