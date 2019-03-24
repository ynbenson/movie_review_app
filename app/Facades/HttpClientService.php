<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class HttpClientService extends Facade
{
    protected static function getFacadeAccessor() {
        return 'HttpClientService';
    }
}