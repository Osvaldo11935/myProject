 <?php

 include_once(dirMANIPULACAO."/Manipulacao.php");
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
  header('location:formpousada') ?>