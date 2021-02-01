 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
   $remover = new Manipulacao();
   $idpontoTuristico = $id=explode("/",$_GET["url"])[1];
   $remover->setTabela("pontoTuristico");
   $remover->setValorNaTabela("idpontoTuristico");
   $remover->setValorPesquisa("$idpontoTuristico");
   $remover->Remover();
   $_SESSION['msg'] = $remover->getMsg();
   header('Location:selectallpontoTuristico/');
   ?>