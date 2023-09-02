<?php

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * @param  null  $key
 * @return Authenticatable|User|null
 */
function user($key = null)
{
    $user = Auth::user();

    return $key ? $user?->{$key} : $user;
}

/**
 * Generates a QR Code image src for the given data.
 */
function qr($data, $width = 120): string
{
    return "https://chart.googleapis.com/chart?cht=qr&chl={$data}&chs={$width}x{$width}&choe=UTF-8&chld=L|0";
}
