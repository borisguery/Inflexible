<?php

namespace Inflexible;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
interface InflectorInterface
{
    public function transform();

    public function reverseTransform();
}
