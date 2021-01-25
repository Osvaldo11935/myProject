<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require "config/path.php";
require "config/router.php";
if(isset($_GET["url"]))
{
    $_path=explode("/",$_GET["url"]);
    if(count($_path)>1)
    {
        $_SESSION["municipio"]=$_path[1];
        $routers=Router($_path[1]);
    }
    else
    $routers=Router();
    //$_SESSION["pathGlobal"]=array();
    //$rota=explode("/",$_GET["url"])[0];
    $rota = $_GET["url"];
    if (in_array($rota, $routers)) {
        //$_rota=array_keys($routers, $rota);
        include array_keys($routers, $rota)[0];
    } else {
        include "config/erro.php";
    }
}
else
include _dirSRC."logar.php";
