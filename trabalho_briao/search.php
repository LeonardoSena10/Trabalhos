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
        if (isset($_POST["submit3"])) {
    ?>
    <div class="divT">
        <h1>Resultado de Busca:</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $search = $_POST["pesquisar"];
                    $conexao = mysqli_connect("127.0.0.1", "root", "", "meu_banco");
                    $query = "SELECT id, nome, tipo1, tipo2, imagem FROM pokemon WHERE nome LIKE '%$search%'";
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
                                    <form action='./home.php'  method='post'>
                                        <input type='hidden' name='id1' value='".$linha['id']."'>
                                        <button type='submit' name='submit1' class='botao'>delete</button>
                                    </form>
                                </td>
                                <td> 
                                    <form action='./edit.php'  method='post'>
                                        <input type='hidden' name='id2' value='".$linha['id']."'>
                                        <button type='submit' name='submit2' class='botao'>edit</button> 
                                    </form> 
                                </td>
                            </tr>"
                        ;
                    }
            }
                ?>
            </tbody>
        </table>
    </div>
    <a href="home.php" class="back"> Clique aqui para voltar </a>
</body>
</html>