<?php
require_once(SG_LOG_PATH.'SGLog.php');

class SGBackupLog
{
    public static function writeAction($action, $position = SG_BACKUP_LOG_POS_START, $level = SG_LOG_LEVEL_LOW)
    {
        $logPos = 'Start';
        if ($position == SG_BACKUP_LOG_POS_END)
        {
            $logPos = 'End';
        }
        $logMsg = $logPos.' '.$action;
        $res = self::write($logMsg, $level);
        return $res;
    }

    public static function writeException($exception, $message, $file, $line, $level = SG_LOG_LEVEL_LOW)
    {
        $logMsg = $exception.': '.$message.' ';
        $logMsg .= '[File: '.$file.', Line: '.$line;
        if (isset($_SERVER['REQUEST_URI']))
        {
            $logMsg .= ', URL: '.$_SERVER['REQUEST_URI'];
        }
        $logMsg .= ']';
        $res = self::write($logMsg, $level);
        return $res;
    }

    public static function writeExceptionObject($exception, $level = SG_LOG_LEVEL_LOW)
    {
        return self::writeException(get_class($exception), $exception->getMessage(), $exception->getFile(), $exception->getLine(), $level);
    }

    public static function writeWarning($message, $level = SG_LOG_LEVEL_LOW)
    {
        $logMsg = 'Warning: '.$message;
        $res = self::write($logMsg, $level);
        return $res;
    }

    public static function write($message, $level = SG_LOG_LEVEL_LOW)
    {
        $res = SGLog::write($message, $level);
        return $res;
    }

    public static function readAll()
    {
        return SGLog::readAll();
    }

    public static function clear($level =  SG_LOG_LEVEL_LOW)
    {
        SGLog::clear($level);
    }
}