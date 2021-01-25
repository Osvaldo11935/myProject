<?php
include_once(dirMANIPULACAO . "/Manipulacao.php");
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
<?php include_once(dirINCLUDE . "/out.php"); ?>
<main id="main">
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form method="POST"><input class="form-control" type="text" name="id" placeholder="faca a sua pesquisa"></form>
            <br>
            <div class="accordion" id="accordionExample">
                <?php foreach ($result as $res) {
                ?>
                    <div class="card">
                        <div class="card-header" id="headingOne<?php echo $res["idmunicipio_munic"] ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $res["idmunicipio_munic"] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $res["idmunicipio_munic"] ?>">
                                    <?php echo $res["nomeMunicipio_munic"] ?>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne<?php echo $res["idmunicipio_munic"] ?>" class="collapse show" aria-labelledby="headingOne<?php echo $res["idmunicipio_munic"] ?>" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row my-2">
                                        <div class="col-md-3 py-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul>
                                                        <li>
                                                            <h6> <a href="selectonehotel/<?php echo $res["nomeMunicipio_munic"] ?>">Hotel</a> <span class="badge badge-secondary">
                                                                    <?php echo $selectall->Othercounts("hotel where municipioid={$res["idmunicipio_munic"]}") ?>
                                                                </span></h6>
                                                        </li>
                                                        <li>
                                                            <h6>
                                                                <a href="selectonepousada/<?php echo $res["nomeMunicipio_munic"] ?>">Pousadas</a><span class="badge badge-secondary">
                                                                    <?php echo $selectall->Othercounts("pousada where municipioid={$res["idmunicipio_munic"]}") ?>
                                                                </span>
                                                            </h6>
                                                        </li>
                                                        <li>
                                                            <h6> <a href="selectonepontoTuristico/<?php echo $res["nomeMunicipio_munic"] ?>">Pontos Turistico</a> <span class="badge badge-secondary">
                                                                    <?php echo $selectall->Othercounts("pontoturistico where municipioid={$res["idmunicipio_munic"]}") ?>
                                                                </span></h6>
                                                        </li>
                                                        <li>
                                                            <h6> <a href="selectonesaloesDeEveto/<?php echo $res["nomeMunicipio_munic"] ?>">Salões de Evetos</a> <span class="badge badge-secondary">
                                                                    <?php echo $selectall->Othercounts("saloesdeeveto where municipioid={$res["idmunicipio_munic"]}") ?>
                                                                </span></h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 py-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <canvas id="chLinechLine<?php echo $res["idmunicipio_munic"] ?>"></canvas>
                                                </div>
                                                <script>
                                                    graphic('pontoturistico', 'chLine<?php echo $res['idmunicipio_munic'] ?>',<?php echo $res["idmunicipio_munic"] ?>)
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-3 py-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <canvas id="chBarchBar<?php echo $res["idmunicipio_munic"] ?>"></canvas>
                                                </div>
                                                <script>
                                                    graphic('pousada', 'chBar<?php echo $res['idmunicipio_munic'] ?>',<?php echo $res["idmunicipio_munic"] ?>)
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-3 py-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <canvas id="chDonut1chDonut1<?php echo $res['idmunicipio_munic'] ?>"></canvas>
                                                </div>
                                                <script>
                                                    graphic('saloesdeeveto', 'chDonut1<?php echo $res['idmunicipio_munic'] ?>',<?php echo $res["idmunicipio_munic"] ?>)
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<?php include_once(dirINCLUDE . "/footer.php"); ?>