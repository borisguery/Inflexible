<?php

namespace Inflexible\Exception;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class MethodNotImplementedException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Method not implemented');
    }
}
