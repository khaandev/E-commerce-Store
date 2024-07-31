<x-admin-layout>
   <div class="shadow-md p-3">  
      <div class="justify-end flex">
         <button class="bg-orange-500 py-1 px-4 text-white rounded"> < Back</button>
      </div>
   </div>
   <div class="flex justify-center">

   <div class="shadow-md border border-gray-300 p-5 mt-20  rounded w-1/2">
      <div>
         <h1 class="text-orange-500 text-2xl font-bold mb-5"> Update Category</h1>
      </div>
 
 
      <form method="POST" action="{{ route('categories.update',$category->id) }}">
        @csrf
        @method('PUT')
        <!-- Email Address -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $category->name)}}" required autofocus  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

       

      

            <x-primary-button class="mt-5">
                {{ __('Update Category') }}
            </x-primary-button>
        </div>
    </form>
    
   </div>
   </div>
</x-admin-layout>
