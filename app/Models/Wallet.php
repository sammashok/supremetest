<?php

namespace App\Models;

use App\Models\Concerns\ObservesWrites;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\Observable;

class Wallet extends Model
{
    use HasFactory, ObservesWrites, Observable;

    /**
     * Determine if it is a Classic wallet.
     */
    public function isClassic(): bool
    {
        return $this->type->name === 'Classic';
    }

    /**
     * Determine if it is a Premium wallet.
     */
    public function isPremium(): bool
    {
        return $this->type->name === 'Premium';
    }

    /**
     * Determine if it is a Golden wallet.
     */
    public function isGolden(): bool
    {
        return $this->type->name === 'Golden';
    }

    public function availableBalance():  Attribute
    {
        return Attribute::get(fn () => ($this->balance - $this->type->min_balance));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
