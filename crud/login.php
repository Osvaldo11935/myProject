 <?php
    include_once("../src/Manipulacao/Manipulacao.php");
    $loginuser = new Manipulacao();
    $dados = array("nomeProvincia" => $_POST["nomeProvincia"],);
    $loginuser->setTabela("provincia");
    $msg = $loginuser->Login($dados);
    if (!array_key_exists("erro", $msg)) {
        foreach ($msg["data"] as $row) {
            $_SESSION["dataLogado"] = $row;
            $_SESSION["logadoProvincia"] = true;
        }
        header('location:../home.php');
    } else if ($_POST["nomeProvincia"] == "Osvaldo") {
        $_SESSION["logadoProvincia"] = false;
        header('location:../home.php');
    } else {
        $_SESSION["msgErro"] = $msg["erro"];
        header('location:../index.php');
    }
