<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações dos Funcionários</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <table>
        <h3>Informações de Funcionários</h3>
        <p><input id="searchbar" type="text" name="searchbar" 
        placeholder="Pesquisar produto(s)" onkeyup="search()">🔍</p>
        <tr >
            <th>
                Nome
            </th>
            <th>
                Data de Admissão
            </th>
            <th>
                Email
            </th>
            <th>
                Telefone
            </th>
            <th>
                Salário
            </th>
            <th>
                Data de Nascimento
            </th>
        </tr>
        <?php
            try{
                require_once 'conexao.php';
                $sql = "SELECT * FROM tb_funcionario";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute();
                $funcionarios = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                if($funcionarios){
                    foreach($funcionarios as $funcionario){
                        echo "<tr class='func'>";
                        echo "<td>".$funcionario['nm_funcionario']."</td>";
                        echo "<td>".$funcionario['dt_funcionario']."</td>";
                        echo "<td>".$funcionario['func_email']."</td>";
                        echo "<td>".$funcionario['tel_funcionario']."</td>";
                        echo "<td>".$funcionario['func_salario']."</td>";
                        echo "<td>".$funcionario['dt_nascimento']."</td>";
                        echo "<td class='edit-td'>
                                    <form method='POST' action='atualizar_func.php'>
                                        <input type='hidden' name='id' value='".$funcionario['id_funcionario']."'>
                                        <button type='submit' class='edit-btn'>⚙️</button>
                                    </form>
                             </td>";
                        echo "<td class='delete-td'><button class='delete-btn' name='funcionario' value='".$funcionario['id_funcionario']."' >🗑️</button></td>";
                        echo"</tr>";

                    }
                }
                else{
                    throw new Exception("Nenhum funcionario encontrado.");
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