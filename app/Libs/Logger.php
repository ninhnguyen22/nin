<?php

namespace App\Libs;

class Logger extends Singleton
{
    public $fileHandle;

    protected function __construct()
    {
        $this->fileHandle = fopen('../logs/app.log', 'w');
    }

    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    public static function log(string $message): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }

    public static function setFileHandle(string $file)
    {
        $logger = static::getInstance();
        $logger->fileHandle = fopen('../logs/' . $file, 'w');
    }
}
