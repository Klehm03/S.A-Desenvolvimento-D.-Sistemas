<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
</head>

<main class="content-area">
    <div class="form-container">
        <form id="Edit">
            <h2>Atualização de Funcionários</h2>
            <div class="form-group" type="hidden">
                <input type="hidden" id="id_func" value="<?php echo $_POST['id'] ?>">
            </div>
            <div class="form-group">
            <label for="client-name">Nome:</label>
            <input type="text" id="client-name" name="nm_funcionario" required>
            </div>
            <div class="form-group">
                <label for="client-address">Email:</label>
                <input type="email" id="client-address" name="func_email" required>
            </div>

            <div class="form-group">
                <label for="client-phone">Telefone:</label>
                <input type="tel" id="client-phone" name="tel_funcionario" required>
            </div>
            <div class="form-group">
                <label for="client-email">Salário:</label>
                <input type="number" id="client-email" name="func_salario" step="0.01" min="0" required>
            </div>
            <button type='submit' class="confirm-button">Confirmar</button>
            <div id="message" style="display:none;"></div>
        </form>        
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="JS/atualizar.js"></script>