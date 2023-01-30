<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        Include("conectadb.php");   

        //usu_id é o meu use_id
        $sql = "SELECT COUNT(use_id) FROM usuarios WHERE use_nome= '$nome' AND use_senha= '$senha'";  
        $resultado = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($resultado)){
            $cont = $tbl[0];
        }
        if($cont == 1){
            echo"<script>window.alert('USUARIO JÁ CADASTRADO');</script>";
        }
        else{
            $sql = "INSERT INTO usuarios(use_nome, use_senha) VALUES('$nome', '$senha')";
            mysqli_query($link, $sql);
            header("Location: listausuario.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CADASTRO DE USUARIOS</title>
        <link rel="stylesheet" href="./estilo.css">
        
    </head>
    <body>
        <a href="homesistema.php"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div>
             <!-- SCRIPT PARA MOSTRAR SENHA -->
             <script>
                function mostrar_senha(){
                    var tipo = document.getElementById("senha")
                    if(tipo.type == "password"){
                        tipo.type = "text";
                    }
                    else{
                        tipo.type= "password";
                    }
                }
            </script>

            <!-- FIM DO SCRIPT PARA MOSTRAR SENHA -->
            <form action="cadastrausuario.php" method="POST">
                <h1>CADASTRO DE USUARIOS</h1>
                <input type="text" name="nome" id="nome" placeholder="NOME">
                <b></b>
                <input type="password" name="senha" placeholder="SENHA">
                <img id="olinho" onclick="mostrar_senha()" src="assets/eye.svg" >
                <b></b>
                <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
            </form>
        </div>
        
    </body>
</html>