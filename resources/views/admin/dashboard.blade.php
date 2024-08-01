<x-admin-layout>

<div class=" grid grid-cols-4 m-5 gap-5">

    <div class="shadow-md  border border-gray-300 p-5">
    <h1 class="text-orange-500 text-2xl font-bold text-center mb-5"> Products
    </h1>
    <div class="flex justify-between">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-orange-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
 <h1 class="text-orange-500 text-2xl font-bold my-auto"> {{$productCount}} 
    </h1>
</div>
    </div>
    <div class="shadow-md  border border-gray-300 p-5">
    <h1 class="text-orange-500 text-2xl font-bold text-center mb-5"> Pandings
    </h1>
    <div class="flex justify-between">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-orange-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
</svg>


 <h1 class="text-orange-500 text-2xl font-bold my-auto"> {{$productCount}} 
    </h1>
</div>
    </div>
     <div class="shadow-md  border border-gray-300 p-5">
    <h1 class="text-orange-500 text-2xl font-bold text-center mb-5"> Products Sold
    </h1>
    <div class="flex justify-between">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-orange-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
</svg>

 <h1 class="text-orange-500 text-2xl font-bold my-auto"> {{$productSold}} 
    </h1>
</div>
    </div>
    


       <div class="shadow-md  border border-gray-300 p-5">
    <h1 class="text-orange-500 text-2xl font-bold text-center mb-5"> Profit
    </h1>
    <div class="flex justify-between">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-orange-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
</svg>



 <h1 class="text-orange-500 text-2xl font-bold my-auto">23,444
    </h1>
</div>
    </div>

</div>


   
   
@if (session('success'))
    <div class="bg-green-200 p-2 border border-green-500 mt-5 mx-10 text-green-500 flex justify-between">
        <h1>Success: {{ session('success') }}</h1>
        <button onclick="this.parentElement.style.display='none'" class="text-red-500">X</button>
    </div>
@endif
   

   <div class="shadow-md border border-gray-300 p-5 my-5 mx-5 rounded">
      <div>
         <h1 class="text-orange-500 text-2xl font-bold">Categories</h1>
      </div>

      <table class="w-full mt-5 border-collapse border border-gray-300">
         <thead>
            <tr class="bg-gray-100">
               <th class="border border-gray-300 px-4 py-2">Id</th>
               <th class="border border-gray-300 px-4 py-2">Name</th>
               <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
         </thead>
            {{-- @foreach ($categories as $category)

             <tbody>
            <tr class="text-center">
               <td class="border border-gray-300 px-4 py-2">{{ $category->id }}</td>
               <td class="border border-gray-300 px-4 py-2">{{ $category->name }}</td>
               <td class="border border-gray-300 px-4 py-2 flex gap-2 justify-center ">

                <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 p-2 text-white rounded">Update</a>
                <form action="{{route ('categories.destroy',$category->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <button class="bg-red-500 p-2 text-white">Delete</button>
                </form>
            </td>
            </tr>
         </tbody>
            @endforeach

             --}}
         
      </table>
      {{-- <div class="mt-4">
         {{ $categories->links() }}
      </div> --}}
   </div>

</x-admin-layout>