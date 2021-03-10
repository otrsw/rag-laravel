<?php

namespace Ontherocksoftware\RagLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ontherocksoftware\RagLaravel\RagLaravel
 */
class RagLaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rag-laravel';
    }
}
