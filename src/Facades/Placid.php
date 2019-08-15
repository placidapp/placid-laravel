<?php

namespace Placid\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Placid\Template;

/**
 * @method static Template template(string $template_uuid)
 *
 * @see \Illuminate\Log\Logger
 */
class Placid extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'placid';
    }
}
