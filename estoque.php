<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>
<body>
    <table>
        <h3>Estoque de Produtos</h3>
         <p><input id="searchbar" type="text" name="searchbar" 
        placeholder="Pesquisar produto(s)" onkeyup="search()">🔍</p>
        <tr >
            <th>
                Nome
            </th>
            <th>
                Preço
            </th>
            <th>
                Descrição
            </th>
            <th>
                Embalagem
            </th>
            <th>
                Quantidade
            </th>
        </tr>
        <?php
            try{
                require_once 'conexao.php';

                $sql = "SELECT * FROM tb_produto";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute();
                $produtos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                if($produtos){
                    foreach($produtos as $produto){
                        echo "<tr class='func'>";
                        echo "<td >".$produto['nm_produto']."</td>";
                        echo "<td>".$produto['prod_preco']."</td>";
                        echo "<td>".$produto['desc_produto']."</td>";
                        echo "<td>".$produto['embalagem']."</td>";
                        echo "<td>".$produto['quant_prod']."</td>";
                        echo "<td class='edit-td'>
                                    <form method='POST' action='atualizar_estoque.php'>
                                        <input type='hidden' name='id' value='".$produto['id_produto']."'>
                                        <button type='submit' class='edit-btn'>⚙️</button>
                                    </form>
                             </td>";
                        echo "<td class='delete-td'><button class='delete-btn' name='produto' value='".$produto['id_produto']."' >🗑️</button></td>";
                        echo"</tr>";

                    }
                }
                else{
                    throw new Exception("Nenhum produto encontrado.");
                }
            }
            catch(Exception $e){
                echo $e -> getMessage();
            }
        
        ?>
    </table>

    <script src="JS/apagar.js"></script>
    <script src="JS/pesquisa.js"></script>
</body>
</html>