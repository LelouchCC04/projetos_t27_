<?php 
    
    # PRIMEIRA CAPTURA UTILIZANDO O METHOD POST
    #
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $nome = $_POST['nome'];#captura variavel que esta no nome = "password" html
        $password = $_POST['password'];#
        Include("conectadb.php");  #Include chama a conexão com o banco no script conectadb.php

        //CONSULTA SQL PARA VERIFICAR USUARIO CADASTRADO
        //use == usu
        $sql = "SELECT COUNT(use_id) FROM usuarios WHERE use_nome= '$nome' AND use_senha= '$password'";
        
        $resultado = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($resultado)){
            $cont = $tbl[0];
        }  
        #VERIFICA SE O VALOR DO CONT É 0 OU 1 
        if($cont==1){# cont armazena um valor da coluna
            header("Location: homesistema.html");
        }
        else{
            echo"<script>window.alert('USUARIO OU SENHA INCORRETOS!');</script>";
        } 
    }       
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN / USUARIOS</title>
        <link rel="stylesheet" href="./stylecadastra.css">
    </head>
    <body>
        <div class="container">
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
            <form action="login.php" method="POST">
                <h1>LOGIN DE USUARIO</h1>
                <input type="text" name="nome" id="nome" placeholder="Nome">
                <br>
                <input type="password" id="senha" name="password" placeholder="Senha">
                <img id="olinho" onclick="mostrar_senha()" src="assets/eye.svg" >
                <br>
                <input type="submit" name="login" value="LOGIN">
            </form>
        </div>      
    </body>
</html>