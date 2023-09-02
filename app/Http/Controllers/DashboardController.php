<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $wallets = user()->wallets()->get();

        return view('dashboard.index', compact('wallets'));
    }
}
