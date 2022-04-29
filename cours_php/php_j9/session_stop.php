<?php

session_start();

session_destroy();
unset($_SESSION);
$params = session_get_cookie_params();
setcookie(
    session_name(),
    null,
    strtotime('yesterday'),
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);

var_dump($_SESSION);