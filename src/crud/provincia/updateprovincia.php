 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
$update=new Manipulacao();
$dados = array(
  "nomeProvincia"=>$_POST["nomeProvincia"],
 
);
 $idprovincia= $_POST["idprovincia"];
$update->setTabela("provincia");
$update->setValor("idprovincia");
$update->update($dados,$idprovincia);
 header('Location:selectoneprovincia/');
?>