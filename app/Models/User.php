<?php

namespace App\Models;

use App\Models\Concerns\ChecksUserState;
use App\Models\Concerns\InteractsWithUserAttributes;
use App\Models\Concerns\ObservesWrites;
use App\Models\Enums\Gender;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ChecksUserState, InteractsWithUserAttributes, ObservesWrites;

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be guarded.
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender'            => Gender::class,
        'password'          => 'hashed',
    ];
    /**
     * Scope a query to only include admin users.
     */
    public function scopeAdmin(Builder $builder): void
    {
        $builder->whereType('admin');
    }

    /**
     * Scope a query to only include users that are customers.
     */
    public function scopeCustomer(Builder $builder): void
    {
        $builder->whereType('customer');
    }

    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }
}
