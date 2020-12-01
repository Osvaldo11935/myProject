 <?php
   include_once("../../src//Manipulacao/Manipulacao.php");
   $remover = new Manipulacao();
   $idpontoTuristico = $_GET["idpontoTuristico"];
   $remover->setTabela("pontoTuristico");
   $remover->setValorNaTabela("idpontoTuristico");
   $remover->setValorPesquisa("$idpontoTuristico");
   $remover->Remover();
   $_SESSION['msg'] = $remover->getMsg();
   header('Location:selectallpontoTuristico.php');
   ?>