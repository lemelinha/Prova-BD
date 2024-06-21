<?php

    $time = 3600 * 24 * 7 * 2;
    ini_set('session.gc_maxlifetime', $time);
    ini_set('session.cookie_lifetime', $time);
    session_set_cookie_params($time);

    ini_set('display_errors', true);

    session_start();
    require '../vendor/autoload.php';

    new \App\Bootstrap;

?>

