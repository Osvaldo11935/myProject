 <?php
    include_once("../../src/Manipulacao/Manipulacao.php");
    $create = new Manipulacao();
    $create->setTabela("municipio");
    $create->setCampo("idmunicipio int AUTO_INCREMENT PRIMARY KEY,nomeMunicipio varchar(255),provinciaid int ");
    $create->newTable();
    $create->getMsg();
    header('Location:../formulario/formmunicipio.php');
    //models
    ?>