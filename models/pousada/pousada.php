 <?php
    include_once("../../src/Manipulacao/Manipulacao.php");
    $create = new Manipulacao();
    $create->setTabela("pousada");
    $create->setCampo("idpousada int AUTO_INCREMENT PRIMARY KEY,nomePousada varchar(255),foto varchar(255),info varchar(255),municipioid int");
    $create->newTable();
    $create->getMsg();
    header('Location:../formulario/formpousada.php');
    //models
    ?>