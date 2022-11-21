<?php

include './funcoes.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    if (!isset($_POST['enviar'])) {


    ?>

        <form action="" method="POST">
            <div>
                <label for="">nome</label>
                <input type="text" name="nome" id="">
            </div>
            <div>
                <label for="">sexo</label>
                <input type="radio" name="sexo" id="">
                <input type="radio" name="sexo" id="">
                <input type="radio" name="sexo" id="">
            </div>
            <div>
                <label for="">data de nascimento</label>
                <input type="date" name="data_nasc" id="">
            </div>
            <div>
                <label for="">telefone</label>
                <input type="text" name="telefone" id="">
            </div>
            <div>
                <label for="">email</label>
                <input type="text" name="email" id="">
            </div>
            <div>
                <label for="">senha</label>
                <input type="password" name="senha" id="">
            </div>
            <div>
                <input type="submit" name="enviar" value="Registrar">
            </div>
        </form>
        <div>
            <?php
            $res = $pdo->bsucarDados();
            if(count($dados) > 0);
            {
                for ($i=0; $i <  count($dados); $i++) 
                {
                    echo '<tr>';
                    foreach($dados[$i] as $key => $value)
                    {
                        if($key !="id")
                        {
                            echo "<td>".$value."</td>";
                        }
                        
                    }
            ?>
                    <tr><a href="">Editar</a><a href="">Excluir</a></tr>
            <?php
                    echo '</tr>';
                }
            }
            ?>
            <table>
                <tr>
                </tr>
            </table>
        </div>
    <?php
    } else {

        $nomeForm = $_POST['nome'];
        $sexoForm = $_POST['sexo'];
        $dataForm = $_POST['data_nasc'];
        $telefoneForm = $_POST['telefone'];
        $emailForm = $_POST['email'];
        $senhaForm = md5($_POST['senha']);

        $res = insertPerson($pdo, $nomeForm, $sexoForm, $dataForm, $telefoneForm, $emailForm, $senhaForm);
        echo $res;
    }
    ?>
</body>

</html>