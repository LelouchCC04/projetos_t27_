<?php
    Include("conectadb.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $sql = "UPDATE usuarios SET use_senha='$senha', use_nome='$nome' WHERE use_id= $id";
        mysqli_query($link, $sql);
        header("Location: listausuario.php");

        echo "<script>window.alert('USUARIO ALTERADO COM SUCESSO');</script>";
        exit();
    }
    //CAPTURAR ID VIA GET
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE use_id= $id";
    $resultado = mysqli_query($link, $sql);

    while($tbl = mysqli_fetch_array($resultado)) {
        $nome = $tbl[1];
        $senha = $tbl[2];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ALTERAR USUARIO</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <div>
            <form action="alterarusuario.php" method="post">           
                <input type="hidden" value="<?=$id?>" name="id"><!-- Coleta o id de forma oculta -->
                <label>NOME</label>
                <input type="text" name="nome" id="nome" value="<?=$nome?>" required><!-- coleta o nome do usuario  -->
                <label>SENHA</label>                
                <input type="password" name="senha" id="senha" value="<?=$senha?>" required><!-- coleta o nome do usuario  -->
                <b></b>
                <input type="submit" value="SALVAR">
            </form>
        </div>
    </body>

</html>