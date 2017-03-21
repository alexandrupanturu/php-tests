<?php

namespace PHPTests\System;

/**
 * Class LinuxSystemInfo
 */
class LinuxSystemInfo implements SystemInfoInterface
{
    /**
     * @return string
     */
    public function getOperatingSystem()
    {
        return SystemInfoInterface::OS_LINUX;
    }

    /**
     * @return int|null
     */
    public function getCoreNumber()
    {
        if (is_file('/proc/cpuinfo')) {
            $cpuinfo = file_get_contents('/proc/cpuinfo');
            preg_match_all('/^processor/m', $cpuinfo, $matches);

            return count($matches[0]);
        }

        $process = @popen('sysctl -a', 'rb');
        if (false !== $process) {
            $output = stream_get_contents($process);
            preg_match('/hw.ncpu: (\d+)/', $output, $matches);
            if ($matches) {
                $numCpus = intval($matches[1][0]);
            }
            pclose($process);

            return $numCpus;
        }

        return null;
    }

    /**
     * @return int
     */
    public function getAvailableMemory()
    {
        $fh = fopen('/proc/meminfo', 'r');
        $mem = 0;
        while ($line = fgets($fh)) {
            $pieces = array();
            if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                $mem = $pieces[1];
                break;
            }
        }
        fclose($fh);

        return (int)$mem;
    }
}
