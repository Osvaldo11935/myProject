 <?php
 include_once(dirMANIPULACAO."/Manipulacao.php");
  $update = new Manipulacao();
  $dados = array(
    "nomeMunicipio" => $_POST["nomeMunicipio"],
    "provinciaid" => $_POST["provinciaid"],

  );
  $idmunicipio = $_POST["idmunicipio"];
  $update->setTabela("municipio");
  $update->setValor("idmunicipio");
  $update->update($dados, $idmunicipio);
  header('Location:selectonemunicipio');
  ?>