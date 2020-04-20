<?php
function checked(&$something, $compare) {
  if (isset($something) && (is_array($something) && in_array($compare, $something) || $something == $compare)) {
    return "checked";
  }
  return "";
}

function value(&$something, $default = "") {
  return isset($something) ? $something : $default;
}

function safeParam($arr, $index, $default="") {
  if ($arr && isset($arr[$index])) {
    return $arr[$index];
  }
  return $default;
}

function debug($something) {
  echo "<div class='debug'>\n";
  print_r($something);
  echo "\n</div>\n";
}

function redirect($url) {
  header("Location: $url");
  exit();
}

function redirectRelative($url) {
  redirect(url($url));
}

function url($url) {
  $requestURI = explode('/', $_SERVER['REQUEST_URI']);
  $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

  $dir = array();
  for ($i = 0; $i < sizeof($scriptName); $i++) {
    if ($requestURI[$i] == $scriptName[$i]) {
      $dir[] = $requestURI[$i];
    } else {
      break;
    }
  }
  return implode('/', $dir) . '/' . $url;
}

function __importTemplate($matches) {
  $fileName = trim($matches[1]);
  if (!file_exists($fileName)) {
    errorPage(404, "Template '$fileName' does not exist. Did you create it?");
  }
  $contents = file_get_contents($fileName);
  $contents = preg_replace_callback('/%%\s*(.*)\s*%%/', '__importTemplate', $contents);
  return $contents;
}

function __resolveRelativeUrls($matches) {
  return url($matches[1]);
}

function __cacheName($view) {
  $cachePath = explode('/', $view);
  $idx = sizeof($cachePath) - 1;
  $cachePath[$idx] = 'cache_' . $cachePath[$idx];
  return implode('/', $cachePath);
}

function renderTemplate($view, $params) {
  $useCache = false;

  if (!file_exists($view)) {
    errorPage(404, "View file '$view' does not exist. Did you create it?");
  }
  # do we have a cached version?
  clearstatcache();
  $cacheName = __cacheName($view);
  if ($useCache && file_exists($cacheName) && (filemtime($cacheName) >= filemtime($view))) {
    $contents = file_get_contents($cacheName);
  } else {
    # we need to build the file (doesn't exist or template is newer)
    $contents = __importTemplate(array('unused', $view));

    $contents = preg_replace_callback('/@@\s*(.*)\s*@@/U', '__resolveRelativeUrls', $contents);

    $patterns = array(
      array('src' => '/{{{/', 'dst' => '<?php echo('),
      array('src' => '/}}}/', 'dst' => '); ?>'),
      array('src' => '/{{/', 'dst' => '<?php echo(htmlentities('),
      array('src' => '/}}/', 'dst' => ')); ?>'),
      array('src' => '/\[\[/', 'dst' => '<?php '),
      array('src' => '/\]\]/', 'dst' => '?>')
    );
    foreach ($patterns as $pattern) {
      $contents = preg_replace($pattern['src'], $pattern['dst'], $contents);
    }
    file_put_contents($cacheName, $contents);
  }
  extract($params);
  ob_start();
  eval("?>" . $contents);
  $result = ob_get_contents();
  ob_end_clean();
  echo $result;
  exit();
}

/**
 * Converts a time string to a relative time.
 * Stolen from https://stackoverflow.com/questions/2690504/php-producing-relative-date-time-from-timestamps
 */
function time2str($ts) {
  if(!ctype_digit($ts)) {
    $ts = strtotime($ts);
  }

  $diff = time() - $ts;
  if($diff == 0) {
    return 'now';
  } elseif($diff > 0) {
    $day_diff = floor($diff / 86400);
    if($day_diff == 0) {
      if($diff < 60) return 'just now';
      if($diff < 120) return '1 minute ago';
      if($diff < 3600) return floor($diff / 60) . ' minutes ago';
      if($diff < 7200) return '1 hour ago';
      if($diff < 86400) return floor($diff / 3600) . ' hours ago';
    }
    if($day_diff == 1) return 'Yesterday';
    if($day_diff < 7) return $day_diff . ' days ago';
    if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
    if($day_diff < 60) return 'last month';
    return date('F Y', $ts);
  } else {
    $diff = abs($diff);
    $day_diff = floor($diff / 86400);
    if($day_diff == 0) {
        if($diff < 120) return 'in a minute';
        if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
        if($diff < 7200) return 'in an hour';
        if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
    }
    if($day_diff == 1) return 'Tomorrow';
    if($day_diff < 4) return date('l', $ts);
    if($day_diff < 7 + (7 - date('w'))) return 'next week';
    if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
    if(date('n', $ts) == date('n') + 1) return 'next month';
    return date('F Y', $ts);
  }
}

function flash($message) {
  if (!isset($_SESSION['flash'])) {
    $_SESSION['flash'] = "";
  }
  $_SESSION['flash'] .= $message . '<br />';
}

function errorPage($code, $message) {
  http_response_code($code);
  renderTemplate(
    "views/error.php",
    array(
      'title' => "$code Error",
      'message' => $message,
    )
  );
  die();
}
?>