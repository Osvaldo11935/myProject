 <?php
  include_once("../../src/Manipulacao/Manipulacao.php");
  $created = new Manipulacao();
  $image = $created->Upload();
  $dados = array(
    "nomeHotel" => $_POST["nomeHotel"],
    "foto" => $image["url"],
    "info" => $_POST["info"],
    "municipioid" => $_POST["municipioid"],
  );
  $created->setTabela("hotel");
  $created->insert($dados);
  echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../formulario/hotel/formhotel.php'>";
  //header('location:') 
  ?>