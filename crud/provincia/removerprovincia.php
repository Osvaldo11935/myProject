 //remover<?php
 include_once("../../src//Manipulacao/Manipulacao.php");
 $remover=new Manipulacao();
 $idprovincia=$_GET["idprovincia"]; 
 $remover->setTabela("provincia");
 $remover->setValorNaTabela("idprovincia");
 $remover->setValorPesquisa("$idprovincia");
 $remover->Remover();
 $_SESSION['msg']=$remover->getMsg();
 header('Location:selectallprovincia.php');
?>