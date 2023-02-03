<?php
#ABRI CONEXÃO COM BANCO DE DADOS
include("conectadb.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIO</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>

    <a href="homesistema.html"><input type="button" id="nebuhone" value="MENUHOME"></a>
    <div class="container">
        <table style="border: 1px solid #fff;">
            <tr>
                <th>HOME</th>
                <th>ALTERAR DADOS</th>
                <th>EXCLUIR USUARIO</th>            
            </tr>
            <?php
                while ($tbl = mysqli_fetch_array($resultado)){
                   ?>
                    <tr>
                        
                        <td><?=$tbl[1]?></td><!-- TRAS SOMENTE A COLUNA NOME DA TABELA -->
                        <td><a href="alterarusuario.php?id=<?=$tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        <td><a href="excluirusuario.php?id=<?=$tbl[0]?>"><input type="button" value="EXCLUIR"></a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>

</html>