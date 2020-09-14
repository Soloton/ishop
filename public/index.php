<?php

use ishop\App;

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';

new App();

throw new Exception('Страница не найдена', 500);
debug(\ishop\App::$app->getProperties());
