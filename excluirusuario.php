<?php
    Include("conectadb.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];       
        $sql = "DELETE FROM usuarios WHERE use_id= $id";
        mysqli_query($link, $sql);
        header("Location: listausuario.php");
        exit();
    }
    if(!isset($_GET['id'])){
        header("Location: listausuario.php");
        exit();
    }
    $id = $_GET['id'];
    $sql = "SELECT use_nome FROM usuarios WHERE use_id= '$id'";
    $resultado = mysqli_query($link, $sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $nome = $tbl[0];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCLUIR USUARIO</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div>
        <!-- -------- -->
        <h1>EXCLUIR USUARIOS</h1>
        <p>GOSTARIA DE EXCLUIR O USUARIO <b><?=$nome?></b></p>
        <form action="excluirusuario.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="SIM">
            <a href="listausuario.php"><button id="botao">NÃO</button></a>

        </form>
    </div>
</body>
</html>