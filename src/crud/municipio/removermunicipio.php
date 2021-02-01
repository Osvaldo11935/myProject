 //remover<?php
 include_once(dirMANIPULACAO."/Manipulacao.php");
 $remover=new Manipulacao();
 $idmunicipio=$_GET["idmunicipio"]; 
 $remover->setTabela("municipio");
 $remover->setValorNaTabela("idmunicipio");
 $remover->setValorPesquisa("$idmunicipio");
 $remover->Remover();
 $_SESSION['msg']=$remover->getMsg();
 header('Location:selectallmunicipio/');
?>