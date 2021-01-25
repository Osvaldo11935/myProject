<?php
//require "config.php";
include_once(dirMANIPULACAO."/Manipulacao.php");
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

<?php include_once(dirINCLUDE."/out.php");?>
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
                        <div class="carousel-item " style="background-image: url('<?php echo $dados["foto_pontoTuris"];?>');">
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
                            <img src="<?php echo dirIMG."/portfolio-1.jpg"?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Pontos Turistico</h4>
                                <p>Pontos Turistico</p>
                                <div class="portfolio-links">
                                    <a href="<?php echo dirIMG."/portfolio-1.jpg"?>" data-gall="portfolioGallery" class="venobox" title="Pontos Turistico"><i class="icofont-eye"></i></a>
                                    <a href="selectonepontoTuristico/" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="<?php echo dirIMG."/portfolio-2.jpg"?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Hoteis</h4>
                                <p>Hoteis</p>
                                <div class="portfolio-links">
                                    <a href="<?php echo dirIMG."/portfolio-2.jpg"?>" data-gall="portfolioGallery" class="venobox" title="Hoteis"><i class="icofont-eye"></i></a>
                                    <a href="selectonehotel/" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="<?php echo dirIMG."/portfolio-3.jpg"?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Pousadas</h4>
                                <p>Pousadas</p>
                                <div class="portfolio-links">
                                    <a href="<?php echo dirIMG."/portfolio-3.jpg"?>" data-gall="portfolioGallery" class="venobox" title="Pousadas"><i class="icofont-eye"></i></a>
                                    <a href="selectonepousada/" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="<?php echo dirIMG."/portfolio-4.jpg"?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Saloes de Evetos</h4>
                                <p>Saloes de Evetos</p>
                                <div class="portfolio-links">
                                    <a href="<?php echo dirIMG."/portfolio-4.jpg"?>" data-gall="portfolioGallery" class="venobox" title="Saloes de Evetos"><i class="icofont-eye"></i></a>
                                    <a href="selectonesaloesDeEveto/" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </section>
    </main>
    <?php include_once(dirINCLUDE."/footer.php");?>