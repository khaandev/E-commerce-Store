<x-admin-layout>
   <div class="shadow-md p-3">  
      <div class="justify-end flex">

       <a href="{{ route('products.create') }}" class="bg-orange-500 py-1 px-4 text-white rounded">Add</a>

      </div>
   </div>

   @if (session('success'))
    <div class="bg-green-200 p-2 border border-green-500 mt-5 mx-10 text-green-500 flex justify-between">
        <h1> {{ session('success') }}</h1>
        <button onclick="this.parentElement.style.display='none'" class="text-red-500">X</button>
    </div>
@endif

   <div class="shadow-md border border-gray-300 p-5 my-5 mx-10 rounded">
      <div>
         <h1 class="text-orange-500 text-2xl font-bold">Produts</h1>
      </div>
<div class="grid grid-cols-3 mt-5 gap-5">
   @foreach ($products as $product )
       

   <div class="shadow-md  rounded-md border border-gray-300 relative ">
      <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1399&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

      <div class="m-3">
         
         <h1 class="text-gray-600">Title : {{  $product->title }} </h1>
         <h1 class="text-gray-600 ">Category : {{  $product->category->name }}</h1>

          @if ($product->discount > 0)
    <div class="flex flex-col items-start">
        <!-- Display the original price with a strike-through -->
        <h1 class="text-gray-600 line-through text-sm">Price: {{ number_format($product->price, 2) }}</h1>
        <h1 class="text-red-600 text-md font-bold">Discounted Price: {{ $product->discounted_price }}</h1>
    </div>
@else
    <!-- Display the regular price when no discount is applied -->
    <h1 class="text-gray-600 text-md font-bold">Price: {{ number_format($product->price, 2) }}</h1>
@endif

         <h1 class="{{$product->status === 'sold' ? 'text-red-600' : 'text-green-600'}} font-bold">Status : {{  $product->status }} </h1>

            

         <div class="grid grid-cols-3 gap-2 my-3  text-sm text-white">


          @if ($product->status === 'available')
            <form action="{{ route('products.updateSold', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-orange-500 p-2">Sold Out</button>
            </form>
            @else
            <form action="{{ route('products.updateAvailable', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 p-2">Available</button>
            </form>
            @endif

         <a href="{{ route ('products.edit',$product->id) }}" class="bg-blue-500 p-2 text-center ">Update</a>
         <form action="{{route ('products.destroy',$product->id)}}" method="POST">
            @csrf
            @method('DELETE')
         <button class="bg-red-500 p-2 ">Delete</button>
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
</x-admin-layout>
