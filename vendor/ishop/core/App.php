<?php


namespace ishop;


/**
 * Class App
 * @package ishop
 */
class App
{

    /**
     * @var Registry
     */
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        $e = new ErrorHandler();
    }

    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}
