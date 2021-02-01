 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
  $update = new Manipulacao();
  $image = $update->Upload();
  $dados = array(
    "nomeSaloesDeEveto" => $_POST["nomeSaloesDeEveto"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],

  );
  $idsaloesDeEveto = $_POST["idsaloesDeEveto"];
  $update->setTabela("saloesDeEveto");
  $update->setValor("idsaloesDeEveto");
  $update->update($dados, $idsaloesDeEveto);
  header('Location:selectonesaloesDeEveto/');
  ?>