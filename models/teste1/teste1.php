 <?php
include_once("../src/Manipulacao/Manipulacao.php");
$create=new Manipulacao();
$create->setTabela("teste1");
$create->setCampo("idteste1 int AUTO_INCREMENT PRIMARY KEY,nome varchar(255),sobrenome varchar(255) ");
$create->newTable();
 $create->getMsg();
 header('Location:../formulario/formteste1.php');
 //models
?>