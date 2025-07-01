<?php
session_start();
$index = $_GET['index'];

if (isset($_SESSION['carrinho'][$index])) {
  unset($_SESSION['carrinho'][$index]);
  $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
}

header('Location: carrinho.php');