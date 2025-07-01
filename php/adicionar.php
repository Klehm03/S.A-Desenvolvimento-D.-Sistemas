<?php
session_start();

$produto = $_GET['produto'];
$preco = $_GET['preco'];

$item = [
  'nome' => $produto,
  'preco' => $preco
];

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = [];
}


$_SESSION['carrinho'][] = $item;

header('Location: carrinho.php');