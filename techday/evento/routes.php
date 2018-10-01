<?php

define('DOMAIN',"/techday");

if (resolve('/')) {

    render('evento/index', 'evento');

} else if (resolve('/evento/inscricao.*')) {

    include __DIR__ . DOMAIN . '/inscricao/routes.php';

} else {
    http_response_code(404);
    render('error/pagefound','evento');

}

?>