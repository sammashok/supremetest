<?php

namespace App\Models;

use App\Models\Concerns\ObservesWrites;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use HasFactory, ObservesWrites;

    public static function booted()
    {
        static::created(function ($transfer) {
            Wallet::where('id', $transfer->from_wallet_id)
                ->decrement('balance', $transfer->amount
            );

            Wallet::where('id', $transfer->to_wallet_id)
                ->increment('balance', $transfer->amount
            );
        });
    }

    public function from_wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'from_wallet_id');
    }

    public function to_wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'to_wallet_id');
    }


}
