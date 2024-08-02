<x-app-layout>

    <form action="{{ route('wallets.update', $wallet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="container mx-auto flex justify-center">

            <div class="shadow-md p-5 w-1/2 bg-white mt-20 rounded">
                <div>
                    <h1 class="mb-5 {{ $wallet->money <= 0 ? 'text-red-500' : '' }}"> Current Balance :
                        {{ $wallet->money }}</h1>

                    <x-input-label for="money" :value="__('Select Money')" />
                    <select name="money" id="money"
                        class="mt-2 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                        @foreach ($walletValues as $walletValue)
                            <option value="{{ $walletValue }}"> {{ $walletValue }} </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('money')" class="mt-2" />
                </div>


                <x-primary-button class="mt-5">
                    {{ __('Update Wallet') }}
                </x-primary-button>
            </div>
        </div>
    </form>

</x-app-layout>
