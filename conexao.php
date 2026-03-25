<?php
$host = 'localhost';
$db = 'controle_produtos';
$user = 'root';
$pass = '';
$sgbd = 'mysql';
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8" , $user , $pass) ;
$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
?>