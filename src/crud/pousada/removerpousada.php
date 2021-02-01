<?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
$remover = new Manipulacao();
$idpousada = $id=explode("/",$_GET["url"])[1];
$remover->setTabela("pousada");
$remover->setValorNaTabela("idpousada");
$remover->setValorPesquisa("$idpousada");
$remover->Remover();
$_SESSION['msg'] = $remover->getMsg();
header('Location:selectallpousada/');
