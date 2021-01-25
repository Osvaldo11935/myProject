<?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
$remover = new Manipulacao();
$idpousada = $_GET["idpousada"];;
$remover->setTabela("pousada");
$remover->setValorNaTabela("idpousada");
$remover->setValorPesquisa("$idpousada");
$remover->Remover();
$_SESSION['msg'] = $remover->getMsg();
header('Location:selectallpousada');
