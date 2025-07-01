<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/message.css">
    <title>Cadastro - CHRONO</title>
</head>
<body>
    <div class="header-logo">
        CHRONO
    </div>

    <div class="wrapper">
        <form method="post" id="formCadastro">
            <h1>Cadastro</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" name="cl_email" >
                </div>
            <div class="input-box">
                <input type="text" placeholder="Name" name="nm_cliente" >
                </div>
            <div class="input-box">
                <input type="number" placeholder="Telefone(Opcional)"  name="tel_cliente" >
                </div>
            
            <div class="input-box">
                <input type="number" placeholder="Idade" name="idade" >
                </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="cl_senha" >
                </div>
            
           <div class="input-box">
                <input type="password" placeholder="Confirm password" name="confirmar-senha" >
                </div>
            
            <button type="submit" class="btn" >Cadastro</button>
            <div id="message"></div>
            </form>
            <div class="register-link">
                <p>Já tem uma conta? <a href="login.php">Entrar</a></p>
            </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 - 2025 CHRONO TEAM</p>
        <div class="github-icon">
            <i class='bx bxl-github'></i>
        </div>
        <p>CHRONO</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/enviardados.js"></script>
</body>
</html>
</html>