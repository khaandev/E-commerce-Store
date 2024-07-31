<x-main-layout>
    <x-nav-bar />
 <div class="p-5 my-5 mx-10 ">
      <div>
         <h1 class="text-orange-500 text-2xl font-bold"> ({{$totalProductsCount}}) Produts</h1>
      </div>
<div class="grid grid-cols-4 mt-5 gap-5">
   @foreach ($products as $product )
       

   <div class="shadow-md  rounded-md border border-gray-300 relative ">
      <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1399&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

      <div class="m-3">
         
         <h1 class="text-gray-600">Title : {{  $product->title }} </h1>

          @if ($product->discount > 0)
    <div class="flex flex-col items-start">
        <h1 class="text-gray-600 line-through text-sm">Price: {{ number_format($product->price, 2) }}</h1>
        <h1 class="text-red-600 text-md font-bold">Discounted Price: {{ $product->discounted_price }}</h1>
    </div>

        @else
            <h1 class="text-gray-600 text-md font-bold">Price: {{ number_format($product->price, 2) }}</h1>
        @endif


            

         <div class="grid grid-cols-3 gap-2 my-3  text-sm text-white">


       
         <a href="{{ route ('product.show',$product->id) }}" class="bg-blue-500 p-2 text-center w-full ">Read More</a>
         
               <a href="{{ route ('products.edit',$product->id) }}" class="bg-orange-500 p-2 text-center w-full ">Buy</a>

         <form action="{{route ('products.destroy',$product->id)}}" method="POST">
            @csrf
            @method('DELETE')
         <button class="p-1 w-full flex justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
</svg>
</button>
         </form>

      </div>
     

      </div>
      @if ($product->discount >= 1)
       <div class="bg-red-500 p-2 rounded-full absolute top-2 right-2 text-white font-bold text-sm opacity-90"> Off % {{ $product->discount }}</div>
          
      @endif

      
   </div>
   @endforeach

</div>
      
   <div class="mt-4">
         {{ $products->links() }}
      </div>
   </div>
</x-main-layout>
