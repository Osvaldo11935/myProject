 <?php
include_once("../src/Manipulacao/Manipulacao.php");
$create=new Manipulacao();
$create->setTabela("teste2");
$create->setCampo("idteste2 int AUTO_INCREMENT PRIMARY KEY,nome varchar(255),sobrenome varchar(255),teste1idteste2 varchar(255) ");
$create->newTable();
 $create->getMsg();
 header('Location:../formulario/formteste2.php');
 //models
?>