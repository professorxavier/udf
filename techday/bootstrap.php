<?php

session_start();

require __DIR__ . DOMAIN . '/dirConfig.php';

require __DIR__ . DOMAIN . "/config.php";
require __DIR__ . DOMAIN . '/src/resolve-route.php';
require __DIR__ . DOMAIN . '/src/render.php';
require __DIR__ . DOMAIN . '/src/Conection.php';
require __DIR__ . DOMAIN . '/src/flash.php';

if (resolve('/?(.*)')) {
    require __DIR__ . DOMAIN . '/evento/routes.php';
}

?>