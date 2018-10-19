<?php

$GLOBALS['prod'] = false;
if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1" || $_SERVER['REMOTE_ADDR'] == "::1") {
    $GLOBALS["url"] = "http://localhost/blog/";
} else if (strpos($_SERVER['REMOTE_ADDR'], "192.168") !== false) {
    $GLOBALS["url"] = "http://192.168.0.7/blog/";
} else {
    $GLOBALS["url"] = "https://tommarx.free.fr/";
    $GLOBALS['prod'] = true;
}


function redirect_home()
{
  header('Location: '. $GLOBALS['url']);
}
