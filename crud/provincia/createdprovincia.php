 <?php
include_once("../../src/Manipulacao/Manipulacao.php");
$created=new Manipulacao();$dados = array(
  "nomeProvincia"=>$_POST["nomeProvincia"],
);
$created->setTabela("provincia");
$created->insert($dados);
 header('location:../../formulario/provincia/formprovincia.php')?>