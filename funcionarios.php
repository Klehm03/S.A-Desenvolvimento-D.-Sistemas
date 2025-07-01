
<link rel="stylesheet" href="CSS/message.css">
<div id="client-registration" >
    <div class="form-container">
        <h2>Cadastro de Funcionários</h2>
            <form id="client-form">
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
                    <label for="client-email">Salario:</label>
                    <input type="number" id="client-email" name="func_salario" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label for="client-email">Nascimento:</label>
                    <input type="date" id="client-email" name="dt_nascimento" required>
                </div>
                <div class="form-group">
                    <label for="comfirm-password">Senha:</label>
                    <input type="password" id="comfirm-password" name="senha" required>
                </div>
                <div class="form-group">
                    <label for="comfirm-password">Comfirme a senha:</label>
                    <input type="password" id="comfirm-password" name="comfirme-senha" required>
                </div>
                <button type="submit" class="confirm-button">Confirmar</button>
            </form>  
    </div>
    <div id="message"></div>
</div>

<script src="JS/enviarfunc.js"></script>