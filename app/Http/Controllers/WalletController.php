<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = AUth::user();

        return view('pages.wallets.wallet',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $walletValues = [];
        for ($i = 10000; $i <= 1000000; $i += 10000) {
            $walletValues[] = $i;
        }
        return view('pages.wallets.createWallet', compact('walletValues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'money' => ['required', 'numeric', 'min:0', 'max:1000000'],
        ]);

        $user = Auth::user();

        if ($user->wallet) {
            return redirect()->route('wallets.index')->with('error', 'You already have a wallet.');
        }

        $user->wallet()->create([
            'money' => $request->money,
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        $walletValues = [];
        for ($i = 10000; $i <= 1000000; $i += 10000) {
            $walletValues[] = $i;
        }
        $wallet = Wallet::findOrFail($wallet->id);

        return view('pages.wallets.updateWallet', compact(['walletValues', 'wallet']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        $request->validate([
            'money' => ['required', 'numeric', 'min:0', 'max:1000000'],
        ]);


        $wallet->update([
            'money' => $request->money,
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
          $wallet = Wallet::findOrFail($wallet->id);

          $wallet->delete();

        return redirect()->route('wallets.create')->with('success', 'Wallet Deleted successfully!');

    }
}
