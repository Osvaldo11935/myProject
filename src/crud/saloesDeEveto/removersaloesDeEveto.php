<?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
$remover = new Manipulacao();
$idsaloesDeEveto = $id=explode("/",$_GET["url"])[1];
$remover->setTabela("saloesDeEveto");
$remover->setValorNaTabela("idsaloesDeEveto");
$remover->setValorPesquisa("$idsaloesDeEveto");
$remover->Remover();
$_SESSION['msg'] = $remover->getMsg();
header('Location:selectallsaloesDeEveto/');
