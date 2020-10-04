<?php


namespace ishop;


/**
 * Trait TSingleton
 * @package ishop
 */
trait TSingleton
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return TSingleton
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
