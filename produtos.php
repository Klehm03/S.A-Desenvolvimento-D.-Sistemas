<link rel="stylesheet" href="CSS/message.css">
<div id="product-registration">
            <div class="form-container">
                <h2>Cadastro de Produtos</h2>
                <form id="product-form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product-code">Nome:</label>
                        <input type="text" name="nm_produto" required>
                    </div>
                    <div class="form-group">
                        <label for="product-description">Descrição:</label>
                        <input type="text"  name="desc_produto" required>
                    </div>
                    <div class="form-group">
                        <label for="product-quantity">Quantidade:</label>
                        <input type="number"  min="0" name="quantidade" required>
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
                        <label for="product-code">Preço:</label>
                        <input type="number" id="product-code" name="prod_preco" step="0.01" min="0" max="10000000" required>
                    </div>
                    <div class="form-group">
                        <label for="product-img">Imagem do produto:</label>
                        <input type="file" id="product-img" name="img_produto">
                    </div>
                    <button type="submit" class="confirm-button">Confirmar</button>
                </form>
                
            </div>
            <div id="message"></div>

</div>

<script src="JS/enviarprod.js"></script>