 <?php
    include_once("../../src/Manipulacao/Manipulacao.php");
    $create = new Manipulacao();
    $create->setTabela("hotel");
    $create->setCampo("idhotel int AUTO_INCREMENT PRIMARY KEY,nomeHotel varchar(255),foto varchar(255),info varchar(255),municipioId int");
    $create->newTable();
    $create->getMsg();
    header('Location:../formulario/formhotel.php');
    //models
    ?>