<?php

session_start();

require_once './db/conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_email = trim($_POST['email']);

    $user_password = trim($_POST['password']);

    if (empty($user_email) || empty($user_password)) {

        echo "Registro não encontrado, tente novamente! \n";
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

        echo "Email inválido, tente novamente! \n";
    }

    $sql = "
        SELECT * FROM users WHERE user_email = :user_email
    ";

    $stmt = $pdo->prepare($sql);

    $result = $stmt->execute(['user_email' => $user_email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        if (password_verify($user_password, $user['user_password'])) {

            $_SESSION['success'] = "Usuário logado com sucesso! \n";

            header("Location: /pages/index.php");

            exit;
        }

        echo "Senha incorreta! \n";
    }

    echo "Erro ao logar usuário! \n";
}
