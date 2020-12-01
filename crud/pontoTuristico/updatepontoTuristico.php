 <?php
  include_once("../../src//Manipulacao/Manipulacao.php");
  $update = new Manipulacao();
  $image = $update->Upload();
  $dados = array(
    "nomePontoTuristico" => $_POST["nomePontoTuristico"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],

  );
  $idpontoTuristico = $_POST["idpontoTuristico"];
  $update->setTabela("pontoTuristico");
  $update->setValor("idpontoTuristico");
  $update->update($dados, $idpontoTuristico);
  header('Location:selectonepontoTuristico.php');
  ?>