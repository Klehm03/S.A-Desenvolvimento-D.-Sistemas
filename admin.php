<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHRONO ADMIN</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <span class="logo-chrono">CHRONO</span>
            <span class="logo-admin">ADMIN</span>
        </div>
        <nav>
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Cadastro &#9662;</a>
                    <div class="dropdown-content">
                        <a href="#" class="submenu" data-page="funcionarios">Funcionarios</a> 
                        <a href="#"  class="submenu" data-page="produtos">Produtos</a>
                    </div>
                </li>
                <li><a href="#" id="show-stock" class="submenu" data-page="estoque">Estoque</a></li>
                <li><a href="#"  class="submenu" data-page="infofuncionarios">Funcionários</a></li>
                <li><a href="indexadmin.php">Principal</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="user-profile">
            <span class="user-name"><?php
                session_start();
                echo $_SESSION['funcionario_nome']
            ?></span>
            <div class="user-icon"></div>
        </div>
    </header>

    <main class="content-area">
        <div id="initial-option" class="content-section active">
            <h2>Escolha uma das opções</h2>
            <h1><a href="#" id="show-stock" class="submenu" data-page="estoque"><button class="nav-btn">Estoque</button></a>  
            <a href="indexadmin.php"><button class="nav-btn">Principal</button></a> 
            <a href="#"  class="submenu" data-page="infofuncionarios"><button class="nav-btn">Funcionários</button></a></h1>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/painel.js"></script>
    
</body>
</html>