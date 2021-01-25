 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
  $update = new Manipulacao();
  $image = $update->Upload();
  $dados = array(
    "nomePousada" => $_POST["nomePousada"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],

  );
  $idpousada = $_POST["idpousada"];
  $update->setTabela("pousada");
  $update->setValor("idpousada");
  $update->update($dados, $idpousada);
  header('Location:selectonepousada');
  ?>