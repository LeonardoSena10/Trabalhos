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
            margin-left: 25%;
            color: blue;
        }
    </style>
</head>
<body>
    <?php
        $targetDir = "uploads/"; 
        if(isset($_POST["submit"])) { 
            $conexao =  mysqli_connect("127.0.0.1", "root", "", "meu_banco");
            $nome = $_POST["nome"];
            $tipo1 = $_POST["tipo1"];
            $tipo2 = $_POST["tipo2"];
            if(!empty($_FILES["imagem"]["name"])){ 
                $fileName = basename($_FILES["imagem"]["name"]);
                $fileNameModified = date("YmdHis").$fileName;
                $targetFilePath = $targetDir.$fileName ; 
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
                $targetFilePath = $targetDir.$fileNameModified; 
                // permite formatos de imagens abaixo
                $allowTypes = array('jpg','png','jpeg'); 
                if (in_array($fileType, $allowTypes)) { 
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFilePath)) { 
                        // Insert image file name into database 
                        $query = "INSERT INTO pokemon (nome, tipo1, tipo2, imagem) VALUES ('$nome', '$tipo1', '$tipo2', '$fileNameModified')";
                        $insert = mysqli_query($conexao,$query); 
                        if ($insert) { 
                            $statusMsg = " O nome e o arquivo ".$fileName. " foram inseridos com sucesso!<br>"; 
                        } else { 
                            $statusMsg = "Erro ao realizar o upload do arquivo"; 
                        }  
                    } else { 
                        $statusMsg = "Erro ao realizar o upload do arquivo"; 
                    } 
                } else { 
                    $statusMsg = 'Formato inválido.'; 
                } 
            } else { 
                $statusMsg = 'Please select a file to upload.'; 
            } 
        } 

        echo $statusMsg;



        $conexao =  mysqli_connect("127.0.0.1","root","","meu_banco");
        $query = "SELECT id, nome, tipo1, tipo2, imagem FROM pokemon";
        $resultado = mysqli_query($conexao,$query);

    ?>
    <div class="divT">
        <table class="table" style="border: 2px solid black; height: 100px; width: 500px">
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
    <a href="home.php" class="back"> Clique aqui para voltar </a>
</body>
</html>