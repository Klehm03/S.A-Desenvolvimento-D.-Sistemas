<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/message.css">
    <title>Login - CHRONO</title>
</head>
<body>
    <div class="header-logo">
        CHRONO
    </div>

    <div class="wrapper">
        <form method="post" id="formCadastro">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email">
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Password">
                <i class='bx bx-lock-alt'></i>  
            </div>
            <div class="remember-forgot">
                <!-- <label><input type="checkbox">Lembre-me</label> -->
                <!-- <a href="recuperar_senha.php">Esqueceu a Senha?</a> -->
            </div>
            <button type="submit" class="btn">Entrar</button> 
            <br>
            
            <div id="message"></div>

            <div class="register-link">
                <p>Não tem conta? <a href="cadastrar.php">Cadastre-se agora</a></p>
            </div>
        </form>
        
    </div>

    <div class="footer">
        <p>&copy; 2025 - 2025 CHRONO TEAM</p>
        <div class="github-icon">
            <i class='bx bxl-github'></i>
        </div>
        <p>CHRONO</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/login.js"></script>

    
</body>
</html>