<?php
    $host='localhost';
    $db='lernen';
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
    $opt = new opt($pdo);
    // //<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_['username'];
?>