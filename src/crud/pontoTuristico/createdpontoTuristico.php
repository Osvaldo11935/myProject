 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
  $created = new Manipulacao();
  $image = $created->Upload();
  $dados = array(
    "nomePontoTuristico" => $_POST["nomePontoTuristico"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],
  );
  $created->setTabela("pontoTuristico");
  $created->insert($dados);
  header('location:formpontoTuristico') ?>