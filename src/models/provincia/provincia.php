 <?php
    include_once("../../src/Manipulacao/Manipulacao.php");
    $create = new Manipulacao();
    $create->setTabela("provincia");
    $create->setCampo("idprovincia int AUTO_INCREMENT PRIMARY KEY,nomeProvincia varchar(255) ");
    $create->newTable();
    $create->getMsg();
    header('Location:../formulario/formprovincia.php');
    //models
    ?>