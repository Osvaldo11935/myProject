 <?php
  include_once("../../src/Manipulacao/Manipulacao.php");
  $created = new Manipulacao();
  $image = $created->Upload();
  $dados = array(
    "nomePousada" => $_POST["nomePousada"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],
  );
  $created->setTabela("pousada");
  $created->insert($dados);
  header('location:../../formulario/pousada/formpousada.php') ?>