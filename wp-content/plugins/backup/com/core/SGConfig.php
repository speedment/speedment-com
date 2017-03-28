<?php

class SGConfig
{
    private static $values = array();

    public static function set($key, $value, $forced = true)
    {
        self::$values[$key] = $value;

        if ($forced)
        {
            $sgdb = SGDatabase::getInstance();
            $res = $sgdb->query('INSERT INTO '.SG_CONFIG_TABLE_NAME.' (ckey, cvalue) VALUES (%s, %s) ON DUPLICATE KEY UPDATE cvalue = %s', array($key, $value, $value));
            return $res;
        }

        return true;
    }

    public static function get($key, $forced = false)
    {
        if (!$forced) {
            if (isset(self::$values[$key])) {
                return self::$values[$key];
            }

            if (defined($key)) {
                return constant($key);
            }
        }

        $sgdb = SGDatabase::getInstance();
        $data = array();

        $res = $sgdb->query("SHOW TABLES LIKE '".SG_CONFIG_TABLE_NAME."'");
        if ($res) {
            $data = $sgdb->query('SELECT cvalue, NOW() FROM '.SG_CONFIG_TABLE_NAME.' WHERE ckey = %s', array($key));
        }

        if (!count($data)) {
            return null;
        }

        self::$values[$key] = $data[0]['cvalue'];
        return $data[0]['cvalue'];
    }

    public static function getAll()
    {
        $sgdb = SGDatabase::getInstance();
        $configs = array();

        $res = $sgdb->query("SHOW TABLES LIKE '".SG_CONFIG_TABLE_NAME."'");
        if ($res) {
            $res = $sgdb->query('SELECT * FROM '.SG_CONFIG_TABLE_NAME);
            if ($res) {
                foreach ($res as $config) {
                    self::$values[$config['ckey']] = $config['cvalue'];
                    $configs[$config['ckey']] = $config['cvalue'];
                }
            }
        }

        return $configs;
    }
}
