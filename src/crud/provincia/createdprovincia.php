 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
$created=new Manipulacao();$dados = array(
  "nomeProvincia"=>$_POST["nomeProvincia"],
);
$created->setTabela("provincia");
$created->insert($dados);
 header('location:formprovincia')?>