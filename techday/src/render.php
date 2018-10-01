<?php

function render ($content, $template, array $data = [])
{
    $content = __DIR__ . DOMAIN . "/../templates/".$content.".tpl.php";
    return require __DIR__ . DOMAIN . "/../templates/".$template.".tpl.php";
}

?>