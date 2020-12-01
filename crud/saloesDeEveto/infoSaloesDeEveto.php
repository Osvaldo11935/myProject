<?php
session_start();
include_once("../../src//Manipulacao/Manipulacao.php");
$selectall = new Manipulacao();
$selectall->setTabela("saloesDeEveto");
$result = $selectall->SelectJoin("   saloesDeEveto.idsaloesDeEveto={$_GET["id"]}");
$recount = $selectall->counts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>


    <header id="header">
        <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href="../../home.php"><span>CANDONGUEIRO DIGITAL</span></a></h1>
            </div>
            <nav class="nav-menu float-right d-none d-lg-block" style="color:darkgrey">
                <ul>
                    <li><a href="../../crud/logaut.php">Sair</a></li>
                    <li><a href="../../infProvincia.php">Info Provincia</a></li>
                    <?php if (isset($_SESSION["logadoProvincia"]) != true) { ?>
                        <?php if ($_SESSION["logadoProvincia"] != true) { ?>
                            <li class="drop-down"><a href="#">Cadastrar</a>
                                <ul>
                                    <li> <a class="dropdown-item" href="../../formulario/provincia/formprovincia.php">provincia</a></li>
                                    <li> <a class="dropdown-item" href="../../formulario/municipio/formmunicipio.php">municipio</a></li>
                                    <li> <a class="dropdown-item" href="../../formulario/pontoTuristico/formpontoTuristico.php">pontoTuristico</a></li>
                                    <li> <a class="dropdown-item" href="../../formulario/pousada/formpousada.php">pousada</a></li>
                                    <li> <a class="dropdown-item" href="../../formulario/hotel/formhotel.php">hotel</a></li>
                                    <li><a class="dropdown-item" href="../../formulario/saloesDeEveto/formsaloesDeEveto.php">saloesDeEveto</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <li class="drop-down"><a href="#">Consulta</a>
                        <ul>
                            <?php if ($_SESSION["logadoProvincia"] == false) { ?>
                                <li> <a class="dropdown-item" href="../provincia/selectoneprovincia.php">provincia</a>
                                </li>
                                <li> <a class="dropdown-item" href="../municipio/selectonemunicipio.php">municipio</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="../pontoTuristico/selectonepontoTuristico.php">pontoTuristico</a></li>
                            <li> <a class="dropdown-item" href="../pousada/selectonepousada.php">pousada</a></li>
                            <li> <a class="dropdown-item" href="../hotel/selectonehotel.php">hotel</a></li>
                            <li> <a class="dropdown-item" href="selectonesaloesDeEveto.php">saloesDeEveto</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <main id="main">


        <section class="portfolio-details">
            <div class="container">
                <?php foreach ($result as $dados) { ?>
                    <div class="portfolio-details-container">

                        <div class="owl-carousel portfolio-details-carousel">
                            <img src="<?php echo $dados["foto_saloesDeE"]; ?>" class="img-fluid" alt="">
                            <img src="<?php echo $dados["foto_saloesDeE"]; ?>" class="img-fluid" alt="">
                            <img src="<?php echo $dados["foto_saloesDeE"]; ?>" class="img-fluid" alt="">
                        </div>

                        <div class="portfolio-info">
                            <h3>Localizacao do saloesDeEveto</h3>
                            <ul>
                                <li><strong>Provincia</strong>: <?php echo $dados["nomeProvincia_provi"]; ?></li>
                                <li><strong>Municipio</strong>: <?php echo $dados["nomeMunicipio_munic"]; ?></li>
                                <li><strong>Data Criacao</strong>: <?php echo $dados["datacriacao_saloesDeE"]; ?></li>
                                <li><strong>Full Localizacao</strong>: <?php echo $dados["nomeProvincia_provi"]; ?>,<?php echo $dados["nomeMunicipio_munic"]; ?> </li>

                                <?php if ($_SESSION["logadoProvincia"] == false) { ?>
                                    <a class="btn btn-warning" style="color:orage" href="../../formulario/saloesDeEveto/formupsaloesDeEveto.php?idsaloesDeEveto_saloesDeEveto=<?php echo $dados['idsaloesDeEveto_saloesDeE'] ?>">Editar</a>
                                    <a class="btn btn-danger" style="color:red" href="removersaloesDeEveto.php?idsaloesDeEveto=<?php echo $dados['idsaloesDeEveto_saloesDeE'] ?>">Deletar</a>
                                    </strong></li>
                                <?php } ?>

                            </ul>
                        </div>

                    </div>

                    <div class="portfolio-description">
                        <h2><?php echo $dados["nomeSaloesDeEveto_saloesDeE"]; ?></h2>
                        <p>
                            <?php echo $dados["info_saloesDeE"]; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>
    <script src="../../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../../assets/vendor/counterup/counterup.min.js"></script>
    <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>

</body>

</html>