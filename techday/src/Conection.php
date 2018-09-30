<?php

/*
 * Conexão com o Banco de Dados
 *
 **/

try {
    $pdo = new PDO(TYPE.':host='.HOST.';dbname='.DBNAME.';port='.PORT.';charset='.CHARSET,USER,PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $pdo;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

//$bd = new mysqli("localhost","conce967_techday","tech123","conce967_techday");