<x-admin-layout>
   <div class="shadow-md p-3">  
      <div class="justify-end flex">

       <a href="{{ route('categories.create') }}" class="bg-orange-500 py-1 px-4 text-white rounded">Add</a>

      </div>
   </div>
   
@if (session('success'))
    <div class="bg-green-200 p-2 border border-green-500 mt-5 mx-10 text-green-500 flex justify-between">
        <h1>Success: {{ session('success') }}</h1>
        <button onclick="this.parentElement.style.display='none'" class="text-red-500">X</button>
    </div>
@endif
   

   <div class="shadow-md border border-gray-300 p-5 my-5 mx-10 rounded">
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
            @foreach ($categories as $category)

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

            
         
      </table>
      <div class="mt-4">
         {{ $categories->links() }}
      </div>
   </div>
</x-admin-layout>
