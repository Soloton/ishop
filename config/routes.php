<?php

use ishop\Router;

Router::add('^product/(?P<alias>[a-z-0-9]+/?)$', ['controller' => 'Product', 'action' => 'view']);

//default routes
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix'=> 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=> 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
