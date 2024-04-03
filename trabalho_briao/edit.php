<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
        if (isset($_POST["submit2"])) {
            $hidden = $_POST["id2"];
            $conexao = mysqli_connect("127.0.0.1", "root", "", "meu_banco");
            $query = "SELECT id, nome, tipo1, tipo2, imagem FROM pokemon WHERE id = '$hidden'";
            $resultado = mysqli_query($conexao, $query);
    ?>
    <div class="divT">
        <h1>Linha Selecionada</h1>
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
                    $query = "SELECT id, nome, tipo1, tipo2, imagem FROM pokemon WHERE id = '$hidden'";
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
                            </tr>"
                        ;
                    }
            }
                ?>
            </tbody>
        </table>
    </div>
        <form action="edit2.php" method="post" enctype="multipart/form-data" class="add">
            <fieldset>
                <legend>Editar Banco:</legend>
                <label for="o_nome">Nome: </label>
                <input type="text" id="o_nome" name="nome1"> <br>
                <label for="o_tipo">Tipo Primario: </label>
                <select id="o_tipo" name="tipo1_">
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
                <select id="o_tipo2" name="tipo2_">
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
                <input type="file" id="a_img" name="imagem1"> <br>
                <input type="hidden" name="id2" value=<?=$hidden?>>
                <button type="submit" name="submit5" class="botao">Enviar</button>
            </fieldset>
        </form>
    <a href="home.php" class="back"> Clique aqui para voltar </a>
</body>
</html>