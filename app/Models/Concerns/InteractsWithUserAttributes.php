<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait InteractsWithUserAttributes
{
    public function name(): Attribute
    {
        return Attribute::get(fn () => Str::title(
            $this->first_name.' '.$this->last_name
        ));
    }

    public function photo(): Attribute
    {
        return Attribute::get(function ($value) {
            return $value ? asset($value) : asset("admin/media/svg/avatars/blank.svg");
        });
    }
}
