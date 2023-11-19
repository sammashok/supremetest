<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransferRequest;
use App\Models\Transfer;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransferController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransferRequest $request)
    {
        Transfer::make([
            'initiated_at'   => now(),
            'amount'         => $request->validated('amount'),
            'from_wallet_id' => Wallet::where('reference', $request->validated('from_reference'))->value('id'),
            'to_wallet_id'   => Wallet::where('reference', $request->validated('to_reference'))->value('id')
        ])->saveOrFail();

        return Response::api('Transfer Successful');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
