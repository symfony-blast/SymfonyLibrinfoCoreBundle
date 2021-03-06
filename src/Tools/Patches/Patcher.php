<?php

/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Blast\CoreBundle\Tools\Patches;

use Composer\Script\Event;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler;

class Patcher extends ScriptHandler
{
    public static function applyPatches(Event $event)
    {
        $options = static::getOptions($event);
        $consoleDir = static::getConsoleDir($event, 'applying custom patches on vendors');

        if (null === $consoleDir) {
            return;
        }

        static::executeCommand($event, $consoleDir, 'librinfo:patchs:apply --force', $options['process-timeout']);
    }
}
