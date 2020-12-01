 <?php
    include_once("../../src/Manipulacao/Manipulacao.php");
    $create = new Manipulacao();
    $create->setTabela("saloesDeEveto");
    $create->setCampo("idsaloesDeEveto int AUTO_INCREMENT PRIMARY KEY,nomeSaloesDeEveto varchar(255),foto varchar(255),info varchar(255),municipioId int");
    $create->newTable();
    $create->getMsg();
    header('Location:../formulario/formsaloesDeEveto.php');
    //models
    ?>