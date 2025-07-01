<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
</head>

<main class="content-area">
    <div class="form-container">
        <form id="Edit" enctype="multipart/form-data">
            <h2>Atualização de Produto</h2>
            <div class="form-group" type="hidden">
                <input type="hidden" id="prod_id" name="id" value="<?php echo $_POST['id'] ?>">
            </div>
            <div class="form-group">
            <label for="prod_nm">Nome:</label>
            <input type="text" id="prod_nm" name="nm_produto" required>
            </div>
            <div class="form-group">
                <label for="prod_desc">Descrição:</label>
                <input type="text" id="prod_desc" name="desc_produto" required>
            </div>

            <div class="form-group">
                <label for="preco_prod">Preço:</label>
                <input type="number" id="preco_prod" name="prod_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="prod_quant">Quantidade:</label>
                <input type="number" id="prod_quant" name="quant_produto" min="0" required>
            </div>

            <div class="form-group">
                <label for="product-packaging">Embalagem:</label>
                <select id="product-packaging" name="embalagem" required>
                    <option value="">Selecione</option>
                    <option value="Unidade">Unidade</option>
                    <option value="Caixa">Caixa</option>
                    <option value="Pacote">Pacote</option>
                </select>
            </div>

            <div class="form-group">
                <label for="product-img">Imagem do produto:</label>
                <input type="file" id="product-img" name="img_produto" required>
            </div>


            <button type='submit' class="confirm-button">Confirmar</button>
            <div id="message" style="display:none;"></div>
        </form>        
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="JS/upd_estoque.js"></script>