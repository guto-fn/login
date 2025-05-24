<?php

$host = 'localhost';

$port = '5432';

$db_name = 'login_db';

$user = 'guto-fn';

$pwd = 'guto-fn-00@';

try {

    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db_name", $user, $pwd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão com o banco de dados realizado com sucesso! \n";

} catch (PDOException $e) {

    echo "Erro ao fazer a conexão com o banco de dados, " . $e->getMessage();

    exit;
}