<x-main-layout>

<div class="my-5"><img src="https://www.pngall.com/wp-content/uploads/2016/06/Ecommerce-PNG-File.png" alt=""></div>
<div class="mt-5 mx-2">
<div class="bg-gray-200 rounded mb-3">
            <x-admin-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
           </x-admin-nav-link>
</div>
            <div class="bg-gray-200 rounded mb-3">
                    <x-admin-nav-link 
                    :href="route('products.index')" 
                    :active="request()->routeIs('products.index') || request()->routeIs('products.create') || request()->routeIs('products.edit')">
                    {{ __('Products') }}
                </x-admin-nav-link>
            </div>

                <div class="bg-gray-200 rounded">
                        <x-admin-nav-link 
                        :href="route('categories.index')" 
                        :active="request()->routeIs('categories.index') || request()->routeIs('categories.create') || request()->routeIs('categories.edit')">
                        {{ __('Categories') }}
                    </x-admin-nav-link>
                </div>

           <form action="{{route ('logout') }}" method="POST">
            @csrf

            <button class="bg-gray-200 py-1 px-2 text-gray-700 rounded-md  absolute bottom-2 flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 my-auto">
            <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z" clip-rule="evenodd" />
            </svg>
             Logout 
            </button>

            </form>

</div>



</x-main-layout>