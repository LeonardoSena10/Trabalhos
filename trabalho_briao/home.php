<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho de php</title>
    <style>
        body {
            color: white;
            background-color: black;
            display: flex;
            flex-direction: column;
        }
        legend {
            font-size: 30px;
        }
        .add {
            font-size: 20px;
            width: 25%;
            margin-left: 37.5%;
        }
        h1 {
            margin-left: 10%;
        }
        .divT {
            margin: auto;
        }
        input {
            border: 0px;
        }
        .botao {
            background-color: black;
            color: white;
            border: 0px;
        }
        th {
            border: 2px solid white;
            text-align: center;
        }
        td {
            border: 2px solid white;
            text-align: center;
        }
        .pesquisa {
            font-size: 25px;
            margin-left: 10%;
        }
        .back {
            margin-left: 75%;
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Trabalho CRUD com base de dados de Pokemon</h1>
    <form action="add.php" method="post" enctype="multipart/form-data" class="add">
        <fieldset>
            <legend>Formulario de Envio:</legend>
            <label for="o_nome">Nome: </label>
            <input type="text" id="o_nome" name="nome"> <br>
            <label for="o_tipo">Tipo Primario: </label>
            <select id="o_tipo" name="tipo1">
                <option value="Normal" select>Normal</option>
                <option value="Fogo">Fogo</option>
                <option value="Aguá">Aguá</option>
                <option value="Grama">Grama</option>
                <option value="Voador">Voador</option>
                <option value="Lutador">Lutador</option>
                <option value="Veneno">Veneno</option>
                <option value="Elétrico">Elétrico</option>
                <option value="Chão">Chão</option>
                <option value="Pedra">Pedra</option>
                <option value="Psíquico">Psíquico</option>
                <option value="Gelo">Gelo</option>
                <option value="Inseto">Inseto</option>
                <option value="Fantasma">Fantasma</option>
                <option value="Ferro">Ferro</option>
                <option value="Dragão">Dragão</option>
                <option value="Sombrio">Sombrio</option>
                <option value="Fada">Fada</option>
            </select> <br>
                <label for="o_tipo2">Tipo Secundario: </label>
            <select id="o_tipo2" name="tipo2">
                <option value="" select>Nulo</option>
                <option value="Normal">Normal</option>
                <option value="Fogo">Fogo</option>
                <option value="Aguá">Aguá</option>
                <option value="Grama">Grama</option>
                <option value="Voador">Voador</option>
                <option value="Lutador">Lutador</option>
                <option value="Veneno">Veneno</option>
                <option value="Elétrico">Elétrico</option>
                <option value="Chão">Chão</option>
                <option value="Pedra">Pedra</option>
                <option value="Psíquico">Psíquico</option>
                <option value="Gelo">Gelo</option>
                <option value="Inseto">Inseto</option>
                <option value="Fantasma">Fantasma</option>
                <option value="Ferro">Ferro</option>
                <option value="Dragão">Dragão</option>
                <option value="Sombrio">Sombrio</option>
                <option value="Fada">Fada</option>
            </select> <br>
            <label for="a_img">Imagem: </label>
            <input type="file" id="a_img" name="imagem"> <br>
            <button type="submit" name="submit" class="botao">Enviar</button>
        </fieldset>
    </form>
    <div class="divT">
        <h2>Banco Atual: </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Tipo Primario</th>
                    <th>Tipo Secundario</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexao = mysqli_connect("127.0.0.1", "root", "", "meu_banco");
                    $query = "SELECT * FROM pokemon";
                    $resultado = mysqli_query($conexao, $query);
                    while($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                        echo"<tr> 
                                <td>".$linha['id']."</td> 
                                <td>".$linha['nome']."</td>
                                <td>".$linha['tipo1']."</td> 
                                <td>".$linha['tipo2']."</td>
                                <td> 
                                    <img src='./uploads/".$linha['imagem']."' width='100' height='100'>
                                </td>
                                <td> 
                                    <form action='./home.php' method='post'>
                                        <input type='hidden' name='id1' value='".$linha['id']."'>
                                        <button type='submit' name='submit1' class='botao'>Deletar</button> 
                                    </form> 
                                </td>
                                <td> 
                                    <form action='./edit.php' method='post'>
                                        <input type='hidden' name='id2' value='".$linha['id']."'>
                                        <button type='submit' name='submit2' class='botao'>Editar</button> 
                                    </form> 
                                </td>
                            </tr>"
                        ;
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
        if (isset($_POST["submit1"])) {
            deletar();
        }
        function deletar() {
            $id = $_POST["id1"];
            $conexao = mysqli_connect("127.0.0.1", "root", "", "meu_banco");
            $query = "DELETE FROM pokemon WHERE id = '$id'";
            $resultado = mysqli_query($conexao, $query);
        }
    ?>
    <form action='./search.php'  method='post' class="pesquisa">
        <label for="pesquisa">Pesquisar:</label>
        <input type='text' id="pesquisa" name='pesquisar'>
        <button type='submit' name='submit3' class="botao">Buscar</button> 
    </form>
</body>
</html>