<?php

use eshop\Router;


Router::add('^product/?(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
// add user defined rules before defaults

Router::add('^admin$', ['controller' => 'Admin', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');