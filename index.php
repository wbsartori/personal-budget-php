<?php

require_once('vendor/autoload.php');

use Pecee\SimpleRouter\SimpleRouter;



/* Load external routes file */
require_once 'src/core/Router/Helper.php';
require_once 'src/routes.php';


/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('\Demo\Controllers');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the routing


SimpleRouter::start();