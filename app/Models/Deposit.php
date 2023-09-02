<?php

namespace App\Models;

use App\Models\Concerns\ObservesWrites;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory, ObservesWrites;

    public static function booted()
    {
        static::creating(function ($deposit) {
            $deposit->reference ??= uniqid('spd');
            $deposit->channel   ??= 'paystack';
            $deposit->paid_at   ??= now();
        });

        static::created(function ($deposit) {
            if ($deposit->paid_at){
                Wallet::where('id', $deposit->wallet_id)->increment('balance', $deposit->amount);
            }
        });
    }
}
