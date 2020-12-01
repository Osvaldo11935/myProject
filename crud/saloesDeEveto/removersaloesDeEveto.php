<?php
include_once("../../src//Manipulacao/Manipulacao.php");
$remover = new Manipulacao();
$idsaloesDeEveto = $_GET["idsaloesDeEveto"];
$remover->setTabela("saloesDeEveto");
$remover->setValorNaTabela("idsaloesDeEveto");
$remover->setValorPesquisa("$idsaloesDeEveto");
$remover->Remover();
$_SESSION['msg'] = $remover->getMsg();
header('Location:selectallsaloesDeEveto.php');
