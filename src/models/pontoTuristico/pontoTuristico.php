 <?php
    include_once("../../src/Manipulacao/Manipulacao.php");
    $create = new Manipulacao();
    $create->setTabela("pontoTuristico");
    $create->setCampo("idpontoTuristico int AUTO_INCREMENT PRIMARY KEY,nomePontoTuristico varchar(255),foto varchar(255),info varchar(255),municipioId int");
    $create->newTable();
    $create->getMsg();
    header('Location:../formulario/formpontoTuristico.php');
    //models
    ?>