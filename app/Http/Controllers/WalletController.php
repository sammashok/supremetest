<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::all();
        $types   = Type::all();

        return view('wallets.index', compact(['wallets', 'types']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        return view('wallets.show', compact('wallet'));
    }
}
