<?php
require_once(SG_LOG_PATH.'SGILogHandler.php');

class SGFileLogHandler implements SGILogHandler
{
    protected $filePath = '';

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function canBeCleared()
    {
        return true;
    }

    public function isWritable()
    {
        if (!file_exists($this->filePath))
        {
            $fp = fopen($this->filePath, 'wb');
            if (!$fp)
            {
                return false;
            }

            fclose($fp);
        }

        return is_writable($this->filePath);
    }

    public function write($message)
    {
        if (!self::isWritable())
        {
            return false;
        }

        $content = @date('Y-m-d H:i').': '.$message.PHP_EOL;
        if (file_put_contents($this->filePath, $content, FILE_APPEND))
        {
            return true;
        }

        return false;
    }

    public function readAll()
    {
        if (!is_readable($this->filePath))
        {
            return false;
        }

        $content = file_get_contents($this->filePath);
        return $content;
    }

    public function clear()
    {
        if (!self::isWritable())
        {
            return false;
        }

        return @unlink($this->filePath);
    }
}