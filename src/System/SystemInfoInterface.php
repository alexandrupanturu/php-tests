<?php

namespace PHPTests\System;

/**
 * Interface SystemInfoInterface
 */
interface SystemInfoInterface
{
    const OS_LINUX   = 'Linux';
    const OS_WINDOWS = 'Windows';

    public function getOperatingSystem();

    public function getCoreNumber();

    public function getAvailableMemory();
}
