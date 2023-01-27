<?php 
    //LOCALIZA PC COM BANCO(NOME DO COMPUTADOR)
    $servidor = "localhost";
    //nome do banco
    $banco = "projetos_t27";
    //nome do usuario
    $usuario = "admin";
    // senha do usuario
    $senha = "123";
    //link de ACESSO
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);
?>