<?php
require_once 'include/config.php';
require_once 'include/util.php';

function routeUrl() {
  $method = $_SERVER['REQUEST_METHOD'];
  $requestURI = explode('/', $_SERVER['REQUEST_URI']);
  $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

  for ($i = 0; $i < sizeof($scriptName); $i++) {
    if ($requestURI[$i] == $scriptName[$i]) {
      unset($requestURI[$i]);
    }
  }
  # continued...

  $entity = array_values($requestURI);
  $controller = 'controllers/' . $entity[0] . '.php';
  $func = strtolower($method) . '_' . (isset($entity[1]) ? $entity[1] : 'index');
  $params = array_slice($entity, 2);

  if (!file_exists($controller)) {
    errorPage(404, "Controller '$controller' doesn't exist. Did you create it?");
  }

  require $controller;
  if (!function_exists($func)) {
    errorPage(404, "Function '$func' doesn't exist in controller '$controller'. Did you create it?");
  }

  call_user_func_array($func, $params);
  exit();
}

date_default_timezone_set('America/New_York');
routeUrl();
