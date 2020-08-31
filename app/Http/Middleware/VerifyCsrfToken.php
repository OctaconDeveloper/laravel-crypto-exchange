<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/user/address-generate',
        '/updatewalletamount',
        '/addfaq',
        '/addmaker',
        '/addcoinlisting',
        '/updatecoinlisting/{id}',
        '/sell_logic',
        '/buy_logic'
    ];
}
