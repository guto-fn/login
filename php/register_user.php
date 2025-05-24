<?php

session_start();

require_once './db/conection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_name = trim($_POST['username']);

    $user_email = trim($_POST['email']);

    $user_password = trim($_POST['password']);

    if (empty($user_name) || empty($user_email) || empty($user_password)) {

        echo "Erro!, preencha todos os campos. \n";
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

        echo "Email inválido, tente novamente! \n";
    }

    $sql = "

        SELECT COUNT(*) FROM users WHERE user_name = :user_name OR user_email = :user_email
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(['user_name' => $user_name, 'user_email' => $user_email]);

    $count = $stmt->fetchColumn();

    if ($count > 0) {

        echo "Erro ao registrar, usuário e email já estão cadastrados \n";
    }

    $hash = password_hash($user_password, PASSWORD_DEFAULT);

    $sql = "
        INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_email, :user_password)
    ";

    $stmt = $pdo->prepare($sql);

    $result = $stmt->execute([
        'user_name' => $user_name,
        'user_email' => $user_email,
        'user_password' => $hash
    ]);

    if ($result) {

        $_SESSION['success'] = "Usuário registrado com sucesso! \n";

        header('Location: /pages/login.php');

        exit;
    }

    echo "Erro ao registrar usuário. \n";
}