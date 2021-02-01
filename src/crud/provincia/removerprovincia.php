 //remover<?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
 $remover=new Manipulacao();
 $idprovincia=$id=explode("/",$_GET["url"])[1];
 $remover->setTabela("provincia");
 $remover->setValorNaTabela("idprovincia");
 $remover->setValorPesquisa("$idprovincia");
 $remover->Remover();
 $_SESSION['msg']=$remover->getMsg();
 header('Location:selectallprovincia/');
?>