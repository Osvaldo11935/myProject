<?php session_start();
include_once("src//Manipulacao/Manipulacao.php");
$selectall = new Manipulacao();
$selectall->setTabela("pontoTuristico");
if ($_SESSION["logadoProvincia"] == true) {
    $provincia = $_SESSION["dataLogado"]["nomeProvincia"];
    $result = $selectall->SelectJoin(" provincia.nomeProvincia='$provincia'");
} else {
    $result = $selectall->SelectJoin("");
}
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
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>



    <header id="header">
        <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href="home.php"><span>CANDONGUEIRO DIGITAL</span></a></h1>
            </div>
            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li><a href="crud/logaut.php">Sair</a></li>
                    <li><a href="infProvincia.php">Info Provincia</a></li>
                    <?php if ($_SESSION["logadoProvincia"] == false) { ?> <li class="drop-down"><a href="#">Cadastrar</a>
                            <ul>
                                <li> <a class="dropdown-item" href="formulario/provincia/formprovincia.php">provincia</a></li>
                                <li> <a class="dropdown-item" href="formulario/municipio/formmunicipio.php">municipio</a></li>
                                <li> <a class="dropdown-item" href="formulario/pontoTuristico/formpontoTuristico.php">pontoTuristico</a></li>
                                <li> <a class="dropdown-item" href="formulario/pousada/formpousada.php">pousada</a></li>
                                <li> <a class="dropdown-item" href="formulario/hotel/formhotel.php">hotel</a></li>
                                <li><a class="dropdown-item" href="formulario/saloesDeEveto/formsaloesDeEveto.php">saloesDeEveto</a></li>
                            </ul>

                        </li>
                    <?php } ?>


                    <li class="drop-down"><a href="#">Consulta</a>
                        <ul>
                            <?php if ($_SESSION["logadoProvincia"] == false) { ?>
                                <li> <a class="dropdown-item" href="crud/provincia/selectoneprovincia.php">provincia</a>
                                </li>
                                <li> <a class="dropdown-item" href="crud/municipio/selectonemunicipio.php">municipio</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="crud/pontoTuristico/selectonepontoTuristico.php">pontoTuristico</a></li>
                            <li> <a class="dropdown-item" href="crud/pousada/selectonepousada.php">pousada</a></li>
                            <li> <a class="dropdown-item" href="crud/hotel/selectonehotel.php">hotel</a></li>
                            <li> <a class="dropdown-item" href="crud/saloesDeEveto/selectonesaloesDeEveto.php">saloesDeEveto</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>

    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background-image: url('img/135685721.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Seja bem Vindo <span>
                                        <?php if ($_SESSION["logadoProvincia"] == true) { ?> <?php echo $_SESSION["dataLogado"]["nomeProvincia"]; ?><?php } ?> </span> </h2>
                                <p class="animate__animated animate__fadeInUp">Veja Os pontoTuridtico,Pousada,Hoteis saloesDeEveto</p>
                                <!--<a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">PontoTuristico</a>-->

                            </div>
                        </div>
                    </div>
                    <?php foreach ($result as $dados) { ?>
                        <div class="carousel-item " style="background-image: url('<?php $foto = str_replace("../", "", $dados["foto_pontoTuris"]);
                                                                                    $foto = "crud/$foto";
                                                                                    echo  $foto ?>');">
                            <div class="carousel-container">
                                <div class="carousel-content container">
                                    <h2 class="animate__animated animate__fadeInDown">Ponto Turistico do<span>
                                            <?php echo $dados["nomePontoTuristico_pontoTuris"]; ?>
                                        </span></h2>
                                    <p class="animate__animated animate__fadeInUp"><?php echo $dados["info_pontoTuris"]; ?>.<br>
                                    </p>
                                    <!--<a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">PontoTuristico</a>-->
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section>


    <main id="main">
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="section-title">
                    <h2>Serviços</h2>
                </div>
                <div class="row portfolio-container">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Pontos Turistico</h4>
                                <p>Pontos Turistico</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="Pontos Turistico"><i class="icofont-eye"></i></a>
                                    <a href="crud/pontoTuristico/selectonepontoTuristico.php" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Hoteis</h4>
                                <p>Hoteis</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Hoteis"><i class="icofont-eye"></i></a>
                                    <a href="crud/hotel/selectonehotel.php" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Pousadas</h4>
                                <p>Pousadas</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="Pousadas"><i class="icofont-eye"></i></a>
                                    <a href="crud/pousada/selectonepousada.php" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Saloes de Evetos</h4>
                                <p>Saloes de Evetos</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Saloes de Evetos"><i class="icofont-eye"></i></a>
                                    <a href="crud/saloesDeEveto/selectonesaloesDeEveto.php" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </section>
    </main>
    <footer id="footer">

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>