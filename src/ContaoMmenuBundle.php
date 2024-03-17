<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoMmenuBundle.
 *
 * (c) Dirk Klemmt
 * (c) INSPIRED MINDS
 *
 * @license MIT
 */

namespace DirkKlemmt\ContaoMmenuBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoMmenuBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
