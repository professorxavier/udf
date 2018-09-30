<?php

session_start();

require __DIR__ . "/config.php";
require __DIR__ . '/src/resolve-route.php';
require __DIR__ . '/src/render.php';
require __DIR__ . '/src/Conection.php';
require __DIR__ . '/src/flash.php';

if (resolve('/?(.*)')) {
    require __DIR__ . '/evento/routes.php';
}