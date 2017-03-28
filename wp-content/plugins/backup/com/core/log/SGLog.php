<?php

class SGLog
{
    private static $logHandlers = array();

    public static function registerLogHandler(SGILogHandler $logHandler, $level = 0, $mainHandler = false)
    {
        if ($logHandler instanceof SGILogHandler)
        {
            self::$logHandlers[] = array('logHandler' => $logHandler, 'level' => $level, 'mainHandler' => $mainHandler);
            return true;
        }
        return false;
    }

    public static function removeAllHandlers($level = 0)
    {
        if ($level == 0)
        {
            self::$logHandlers = array();
            return;
        }

        $handlers = array();
        foreach (self::$logHandlers as $logHandler)
        {
            if (!self::levelBelongsToLevel($level, $logHandler['level']))
            {
                $handlers[] = $logHandler;
            }
        }
        self::$logHandlers = $handlers;
    }

    private static function levelBelongsToLevel($level, $levelToBelong)
    {
        if ((($levelToBelong|SG_LOG_LEVEL_HIGH) == $level) ||
            (($levelToBelong|SG_LOG_LEVEL_LOW) == $level) ||
            (($levelToBelong|SG_LOG_LEVEL_MEDIUM) == $level) ||
            (($levelToBelong|SG_LOG_LEVEL_MEDIUM|SG_LOG_LEVEL_LOW) == $level) ||
            (($levelToBelong|SG_LOG_LEVEL_MEDIUM|SG_LOG_LEVEL_HIGH) == $level)  ||
            (($levelToBelong|SG_LOG_LEVEL_LOW|SG_LOG_LEVEL_HIGH) == $level))
        {
            return true;
        }

        return false;
    }

    public static function write($message, $level = 0)
    {
        foreach(self::$logHandlers as $logHandler)
        {
            if ($level)
            {
                if (self::levelBelongsToLevel($level, $logHandler['level']))
                {
                    $logHandler['logHandler']->write($message);
                }
                continue;
            }
            $logHandler['logHandler']->write($message);
        }
    }

    public static function readAll()
    {
        foreach(self::$logHandlers as $logHandler)
        {
            if ($logHandler['mainHandler'])
            {
                return $logHandler['logHandler']->readAll();
            }
        }
        return array();
    }

    public static function clear($level = 0)
    {
        foreach(self::$logHandlers as $logHandler)
        {
            if ($level)
            {
                if (self::levelBelongsToLevel($level, $logHandler['level']))
                {
                    $logHandler['logHandler']->clear();
                }
                continue;
            }
            $logHandler['logHandler']->clear();
        }
    }
}