 <?php
 include_once(dirMANIPULACAO."/Manipulacao.php");
  $created = new Manipulacao();
  $dados = array(
    "nomeMunicipio" => $_POST["nomeMunicipio"],
    "provinciaid" => $_POST["provinciaid"],
  );
  $created->setTabela("municipio");
  $created->insert($dados);
  header('location:formmunicipio') ?>