<?php

use Illuminate\Support\Facades\Crypt;

if (! function_exists('encrypt_data')) {
    function encrypt_data($data)
    {
       return Crypt::encrypt($data);
    }
}


if (! function_exists('decrypt_data')) {
    function decrypt_data($data)
    {
        return Crypt::decrypt($data);     
    }
}