<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WalletController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {
        Wallet::create($request->validated());

        return Response::api('Wallet Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
