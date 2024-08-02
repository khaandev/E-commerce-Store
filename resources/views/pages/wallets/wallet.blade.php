<x-app-layout>

@if (session('success'))

<div class="bg-green-200 p-2 border border-green-500 mt-5 mx-10 text-green-500 flex justify-between">
        <h1> {{ session('success') }}</h1>
        <button onclick="this.parentElement.style.display='none'" class="text-red-500">X</button>
    </div>
    
@endif
@if (session('error'))

<div class="bg-red-200 p-2 border border-red-500 mt-5 mx-10 text-red-500 flex justify-between">
        <h1> {{ session('error') }}</h1>
        <button onclick="this.parentElement.style.display='none'" class="text-wite">X</button>
    </div>
    
@endif

@if (!$user->wallet)
    
    <div class="container mx-auto mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between p-5 ">
                <div class=" text-gray-900">
                    {{ __("Create a wallet") }}
                </div>
                <div class="my-auto">
                <a href="{{route ('wallets.create')}}" class="bg-orange-500 p-2 text-white rounded-md ">Create</a>
                </div>
        </div>
    </div>
    @else
    <div class="container mx-auto mt-5">
            <div class="bg-white shadow-sm sm:rounded-lg flex justify-between p-5 w-1/2 ">
                <div class=" text-gray-700">
                <h1>Current Balance : <span class="{{$user->wallet->money <= 0 ? 'text-red-500' : ''}}"> {{$user->wallet->money}} </span>
                    @if ($user->wallet->money <= 0)
                     <span class="text-red-500">Please recherge </span>            
                    @endif
                     </h1>                    
                </div>

                <div class="flex gap-2">
                    <a href="{{route('wallets.edit',$user->wallet->id)}}" class="bg-blue-500 p-2 text-white rounded">Update wallet</a>

                    <form action="{{route ('wallets.destroy',$user->wallet->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 p-2 text-white rounded">Delete</button>
                    
                    </form>

                </div>
               
        </div>
    </div>
@endif




</x-app-layout>
