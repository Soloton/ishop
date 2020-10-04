<?php


namespace ishop;


use Dotenv\Dotenv;
use Exception;
use \R as R;
use RedBeanPHP\RedException;

class Db
{
    use TSingleton;

    protected function __construct()
    {
        $dotenv = Dotenv::createImmutable(ROOT);
        $dotenv->load();
        $dotenv->required(['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_USERNAME'])->notEmpty();
        $dotenv->required('DB_PORT')->isInteger();
        $dotenv->required('DB_PASSWORD')->notEmpty();

        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        R::setup($db['dsn'], $db['user'], $db['pass']);
        if (!R::testConnection()) {
            throw new Exception('Нет соединения с БД', 500);
        }
        R::freeze(true);
        if (DEBUG) {
            try {
                R::debug(true, 1);
            } catch (RedException $e) {
            }
        }
    }
}
