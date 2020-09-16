<?php


namespace ishop;


class Cache
{
    public static function set($key, $data, $seconds = 3600)
    {
        if ($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            if (file_put_contents(self::getCacheFileName($key), serialize($content))) {
                return true;
            }
        }
        return false;
    }

    public static function get($key)
    {
        $file = self::getCacheFileName($key);
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        false;
    }

    public static function delete($key)
    {
        $file = self::getCacheFileName($key);
        if (file_exists($file)) {
            unlink($file);
        }
    }

    /**
     * @param $key
     * @return string
     */
    public static function getCacheFileName($key)
    {
        return CACHE . '/' . md5($key) . '.txt';
    }
}
