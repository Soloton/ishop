<?php


namespace ishop;


/**
 * Trait TSingletone
 * @package ishop
 */
trait TSingletone
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return TSingletone
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}