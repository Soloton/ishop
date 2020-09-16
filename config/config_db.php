<?php

return [
    'dsn' => $_ENV['DB_CONNECTION'] . ':host=' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'] . ';charset=utf8',
    'user' => $_ENV['DB_USERNAME'],
    'pass' => $_ENV['DB_PASSWORD']
];
