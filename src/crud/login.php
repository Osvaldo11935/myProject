 <?php
 $v=dirMANIPULACAO."/Manipulacao.php";
 echo $v;
    include_once($v);
    $loginuser = new Manipulacao();
    if(!isset($_SESSION["viewhotel"]))
    {
        $_SESSION["viewhotel"]=0;
        $_SESSION["viewpontoTuristico"]=0;
        $_SESSION["viewpousada"]=0;
        $_SESSION["viewsaloesDeEveto"]=0;
    }
    $dados = array("nomeProvincia" => $_POST["nomeProvincia"],);
    $loginuser->setTabela("provincia");
    $msg = $loginuser->Login($dados);
    if (!array_key_exists("erro", $msg)) {
        foreach ($msg["data"] as $row) {
            $_SESSION["dataLogado"] = $row;
            $_SESSION["logadoProvincia"] = true;
        }
        header('location:home');
    } else {
        $dados["username"]= $_POST["nomeProvincia"];
        $dados["senha"]= $_POST["senha"];
        unset($dados["nomeProvincia"]);
        $loginuser->setTabela("admin");
         $msg = $loginuser->Login($dados);
         if(!array_key_exists("erro", $msg))
         {
            foreach ($msg["data"] as $row) {
                $_SESSION["dataLogado"] = $row;
                $_SESSION["logadoProvincia"] = false;
            }
         }
        else {
            $_SESSION["msgErro"] = $msg["erro"];
            header('location:entrar');
        }
        header('location:home');
    } 
