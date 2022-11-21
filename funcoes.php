<?php



include './conexao.php';

function insertPerson ($pdo, $nome, $sexo, $data_nasc, $telefone, $email, $senha){
    
  $query = $pdo->prepare("SELECT id_pessoa from tb_pessoa WHERE email = :ds_email");

$query->bindValue(":ds_email",$email);
$query->execute();
if($query->owCount()>0);
{

    return false;

}else

    $query = $pdo->prepare("SELECT * FROM tb_pessoa ORDER BY id DESC");

$query->fetchALL(PDO::FETCH_ASSOC);
return $query;

    $query = $pdo->prepare("INSERT INTO tb_pessoa (ds_nome,cd_sexo,dt_nasc,nr_telefone,ds_email,mr_senha) VALUES (:nome,:sexo,:data_nasc,:telefone,:email,:senha)");
    
$query->bindParam(':nome', $nome);
$query->bindParam(':sexo', $sexo);
$query->bindParam(':data_nasc', $data_nasc);
$query->bindParam(':telefone',$telefone);
$query->bindParam(':email', $email);
$query->bindParam(':senha', $senha);

$query->execute();

    $query = $pdo->prepare("DELETE FROM tb_pessoa WHERE id = :id_pessoa");

$id = '';
$query->bindValue(":id_pessoa",$id);

$query->execute();

    $query = $pdo->prepare("UPGRADE tb_pessoa SET email = :ds_email WHERE id = :id_pessoa");

$query->bindValue(":ds_email", "$email");
$query->bindValue(":id_pessoa", "$id");

$query->execute();

if ($query->rowCount() > 0) :
echo "Dado inserido com sucesso.";
endif;
}
