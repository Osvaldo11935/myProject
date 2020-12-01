 <?php
  include_once("../../src/Manipulacao/Manipulacao.php");
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
  header('location:../../formulario/pontoTuristico/formpontoTuristico.php') ?>