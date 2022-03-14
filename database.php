<?php
    $dsn = 'mysql:host=localhost;dbname=D00239311';
    $username = 'D00239311';
    $password = 'TKJKbRa2';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>