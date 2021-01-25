 <?php
include_once(dirMANIPULACAO."/Manipulacao.php");
  $update = new Manipulacao();
  $image = $update->Upload();
  $dados = array(
    "nomeHotel" => $_POST["nomeHotel"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],

  );
  $idhotel = $_POST["idhotel"];
  $update->setTabela("hotel");
  $update->setValor("idhotel");
  $update->update($dados, $idhotel);
  header('Location:selectonehotel');
  ?>