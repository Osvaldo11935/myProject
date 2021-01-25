<?php   error_reporting(E_ALL & ~E_NOTICE); session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link href="<?php echo dirIMG."/favicon.png"?>" rel="icon">
    <link href="<?php echo dirIMG."/apple-touch-icon.png"?>" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/bootstrap/css/bootstrap.min.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/icofont/icofont.min.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/boxicons/css/boxicons.min.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/animate.css/animate.min.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/venobox/venobox.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/owl.carousel/assets/owl.carousel.min.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/aos/aos.css"?>" rel="stylesheet">
    <link href="<?php echo dirVENDOR ."/style.css"?>" rel="stylesheet">
    <script src="<?php echo dirJS ."/javaScript.js"?>"></script>
    <script src="<?php echo dirJS ."/Chart.min.js"?>"></script>
    <script src="<?php echo dirJS ."/Graphic.data.js"?>"></script>
    <script src="<?php echo dirJS ."/Chart.bundle.min.js"?>"></script>
</head>
<body>
    <header id="header">
        <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href="home"><span>CANDONGUEIRO DIGITAL</span></a></h1>
            </div>
            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li><a href="logaut">Sair</a></li>
                    <li><a href="infProvincia">Info Provincia</a></li>
                    <?php if ($_SESSION["logadoProvincia"] == false) { ?> <li class="drop-down"><a href="#">Cadastrar</a>
                            <ul>
                                <li> <a class="dropdown-item" href="formprovincia">provincia</a></li>
                                <li> <a class="dropdown-item" href="formmunicipio">municipio</a></li>
                                <li> <a class="dropdown-item" href="formpontoTuristico">pontoTuristico</a></li>
                                <li> <a class="dropdown-item" href="formpousada">pousada</a></li>
                                <li> <a class="dropdown-item" href="formhotel">hotel</a></li>
                                <li><a class="dropdown-item" href="formsaloesDeEveto">saloesDeEveto</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li class="drop-down"><a href="#">Consulta</a>
                        <ul>
                            <?php if ($_SESSION["logadoProvincia"] == false) { ?>
                                <li> <a class="dropdown-item" href="selectoneprovincia/">provincia</a>
                                </li>
                                <li> <a class="dropdown-item" href="selectonemunicipio/">municipio</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="selectonepontoTuristico/">pontoTuristico</a></li>
                            <li> <a class="dropdown-item" href="selectonepousada/">pousada</a></li>
                            <li> <a class="dropdown-item" href="selectonehotel/">hotel</a></li>
                            <li> <a class="dropdown-item" href="selectonesaloesDeEveto/">saloesDeEveto</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .nav-menu -->
        </div>
    </header>