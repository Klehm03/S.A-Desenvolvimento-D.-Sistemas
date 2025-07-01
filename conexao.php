<?php
$host = "localhost";
$dbname = "chronos";
$usuario = "root";
$senha = "";

try {
    //PDO é o ngc nativo do php, pra conectar com banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
