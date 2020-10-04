<?php


namespace ishop;


/**
 * Class Registry
 * @package ishop
 */
class Registry
{
    use TSingleton;

    /**
     * @var array
     */
    public static $properties = [];

    /**
     * @param $name
     * @param $value
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function getProperty($name)
    {
        if (isset(self::$properties[$name]))
            return self::$properties[$name];
        return null;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return self::$properties;
    }
}
