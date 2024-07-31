<x-admin-layout>
   <div class="shadow-md p-3">  
      <div class="justify-end flex">
         <a href="{{route ('products.index')}}" class="bg-orange-500 py-1 px-4 text-white rounded"> < Back</a>
      </div>
   </div>
   <div class="flex justify-center">

   <div class="shadow-md border border-gray-300 p-5 my-5  rounded w-1/2">
      <div>
         <h1 class="text-orange-500 text-2xl font-bold mb-5"> Add New Product</h1>
      </div>
 
 
      <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus  />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
         <div class="mt-3">
            <x-input-label for="description" :value="__('Description')" />
            <textarea name="description"  :value="old('description')" id="" cols="9" rows="3" class="w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
         <div class="mt-3">
            <x-input-label for="buyprice" :value="__('Purchase Price')" />
            <x-text-input id="buyprice" class="block mt-1 w-full" type="number" name="buyprice" :value="old('buyprice')"  />
            <x-input-error :messages="$errors->get('buyprice')" class="mt-2" />
        </div>
        <div class="mt-3">
            <x-input-label for="price" :value="__('Sell Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"  />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>
        <div class="mt-3">
            <x-input-label for="category_id" :value="__('Category')" />
            <select name="category_id" id="category_id" 
            class="w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                @foreach ($categories as $categorie )
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>          
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>
        <div class="mt-3">
    <x-input-label for="discount" :value="__('Discount (%)')" />
    <x-text-input id="discount" class="block mt-1 w-full" type="number" name="discount" value="{{ old('discount', $product->discount ?? 0) }}" min="0" max="100" />
    <x-input-error :messages="$errors->get('discount')" class="mt-2" />
</div>

       <div class="mt-3">
            <x-input-label for="images" :value="__('Images')" />
            <input id="images" class="block mt-1 w-full" type="file" name="images[]" multiple :value="old('images')">
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>
      

            <x-primary-button class="mt-5">
                {{ __('Add Products') }}
            </x-primary-button>
        </div>
    </form>
    
   </div>
   </div>
</x-admin-layout>
