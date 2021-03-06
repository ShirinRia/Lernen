<?php
    $host='localhost';
    $db='learnen_two';
    $user='root';
    $pass='';
    $charset='utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        $pdo = new PDO($dsn , $user , $pass);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    require_once 'login.php';
    $login = new login($pdo);
    require_once 'crud.php';
    $crud = new crud($pdo);
    require_once 'opt.php';
    require_once 'quiz.php';
    $quiz = new quiz($pdo);
    $opt = new opt($pdo);
?>