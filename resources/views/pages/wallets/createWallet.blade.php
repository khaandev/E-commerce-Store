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
    <form action="{{ route('wallets.store') }}" method="POST">
        @csrf

        <div class="container mx-auto flex justify-center">

            <div class="shadow-md p-5 w-1/2 bg-white mt-20 rounded">
                <div>
                    <x-input-label for="money" :value="__('Select Money')" />
                    <select name="money" id="money"
                        class="mt-2 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                        @foreach ($walletValues as $walletValue)
                            <option value="{{$walletValue}}"> {{ $walletValue }} </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('money')" class="mt-2" />
                </div>


                <x-primary-button class="mt-5">
                    {{ __('Craete Wallet') }}
                </x-primary-button>
            </div>
        </div>
    </form>

</x-app-layout>
