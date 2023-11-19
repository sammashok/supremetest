<?php

namespace App\Observers;

use App\Models\Deposit;
use App\Models\Wallet;

class WalletObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(Wallet $wallet): void
    {
        $wallet->reference ??= uniqid('sp');
    }

    /**
     * Handle the Wallet "created" event.
     */
    public function created(Wallet $wallet): void
    {
         Deposit::make([
            'reference' => uniqid('spd'),
            'wallet_id' => $wallet->id,
            'amount'    => $wallet->balance,
            'paid_at'   => now(),
            'channel'   => 'paystack'
        ])->saveQuietly();
    }

    /**
     * Handle the Wallet "updated" event.
     */
    public function updated(Wallet $wallet): void
    {
        //
    }

    /**
     * Handle the Wallet "deleted" event.
     */
    public function deleted(Wallet $wallet): void
    {
        //
    }

    /**
     * Handle the Wallet "restored" event.
     */
    public function restored(Wallet $wallet): void
    {
        //
    }

    /**
     * Handle the Wallet "force deleted" event.
     */
    public function forceDeleted(Wallet $wallet): void
    {
        //
    }
}
