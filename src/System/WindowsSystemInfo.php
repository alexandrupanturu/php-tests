<?php

namespace PHPTests\System;

/**
 * Class WindowsSystemInfo
 */
class WindowsSystemInfo implements SystemInfoInterface
{
    public function getOperatingSystem()
    {
        return SystemInfoInterface::OS_WINDOWS;
    }

    /**
     * @return int|null
     */
    public function getCoreNumber()
    {
        $process = @popen('wmic cpu get NumberOfCores', 'rb');
        $numCpus = null;
        if (false !== $process) {
            fgets($process);
            $numCpus = intval(fgets($process));
            pclose($process);
        }

        return $numCpus;
    }

    public function getAvailableMemory()
    {
        return null;
    }
}
