<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use App\Models\Wallet;

class UserWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $wallets = $user->wallets()->get();
        $types   = Type::all();

        return view('wallets.index', compact(['wallets', 'types']));
    }
}
