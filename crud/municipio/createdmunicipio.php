 <?php
  include_once("../../src/Manipulacao/Manipulacao.php");
  $created = new Manipulacao();
  $dados = array(
    "nomeMunicipio" => $_POST["nomeMunicipio"],
    "provinciaid" => $_POST["provinciaid"],
  );
  $created->setTabela("municipio");
  $created->insert($dados);
  header('location:../../formulario/municipio/formmunicipio.php') ?>