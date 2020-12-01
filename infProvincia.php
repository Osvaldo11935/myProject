<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include_once("src//Manipulacao/Manipulacao.php");
$selectall = new Manipulacao();
$selectall->setTabela("municipio");
$mun = $_POST["id"];
if ($_SESSION["logadoProvincia"] == true) {
    $provincia = $_SESSION["dataLogado"]["nomeProvincia"];
    $result = $selectall->SelectJoin(" provincia.nomeProvincia='$provincia' and municipio.nomeMunicipio like'%$mun%' ");
} else {
    $result = $selectall->SelectJoin(" municipio.nomeMunicipio like'%$mun%'");
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
    <main id="main">
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <form method="POST"><input class="form-control" type="text" name="id" placeholder="faca a sua pesquisa"></form>
                <br>
                <div class="accordion" id="accordionExample">
                    <?php foreach ($result as $res) {
                    ?>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $res["idmunicipio_munic"] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $res["idmunicipio_munic"] ?>">
                                        <?php echo $res["nomeMunicipio_munic"] ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne<?php echo $res["idmunicipio_munic"] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">

                                    <h6> <a href="crud/hotel/selectonehotel.php?municipio=<?php echo $res["nomeMunicipio_munic"] ?>">Hotel</a> <span class="badge badge-secondary">
                                            <?php echo $selectall->Othercounts("hotel where municipioid={$res["idmunicipio_munic"]}") ?>
                                        </span></h6>
                                    <h6>
                                        <a href="crud/pousada/selectonepousada.php?municipio=<?php echo $res["nomeMunicipio_munic"] ?>">Pousadas</a><span class="badge badge-secondary">
                                            <?php echo $selectall->Othercounts("pousada where municipioid={$res["idmunicipio_munic"]}") ?>
                                        </span>
                                    </h6>
                                    <h6> <a href="crud/pontoTuristico/selectonepontoTuristico.php?municipio=<?php echo $res["nomeMunicipio_munic"] ?>">Pontos Turistico</a> <span class="badge badge-secondary">
                                            <?php echo $selectall->Othercounts("pontoturistico where municipioid={$res["idmunicipio_munic"]}") ?>
                                        </span></h6>
                                    <h6> <a href="crud/saloesDeEveto/selectonesaloesDeEveto.php?municipio=<?php echo $res["nomeMunicipio_munic"] ?>">Salões de Evetos</a> <span class="badge badge-secondary">
                                            <?php echo $selectall->Othercounts("saloesdeeveto where municipioid={$res["idmunicipio_munic"]}") ?>
                                        </span></h6>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($result->num_rows == 0) { ?>
                        <p>Nenhum dados relacionado a esta opcao</p>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

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