 <?php
  include_once("../../src/Manipulacao/Manipulacao.php");
  $created = new Manipulacao();
  $image = $created->Upload();
  $dados = array(
    "nomeSaloesDeEveto" => $_POST["nomeSaloesDeEveto"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"]
  );
  $created->setTabela("saloesDeEveto");
  $created->insert($dados);
  header('location:../../formulario/saloesDeEveto/formsaloesDeEveto.php');
  ?>