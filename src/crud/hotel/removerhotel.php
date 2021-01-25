<?php
include_once(dirMANIPULACAO."/Manipulacao.php");
$remover = new Manipulacao();
$idhotel = $_GET["idhotel"];
$remover->setTabela("hotel");
$remover->setValorNaTabela("idhotel");
$remover->setValorPesquisa("$idhotel");
$remover->Remover();
$_SESSION['msg'] = $remover->getMsg();
header('Location:selectallhotel');
