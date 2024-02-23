<?php

namespace Moduvel\HttpAbstracted\Frameworks\Symfony;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class HttpAbstractedBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return dirname(__DIR__. '/../../../');
    }
}