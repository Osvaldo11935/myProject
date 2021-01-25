<?php

include_once(dirMANIPULACAO."/Manipulacao.php");
$selectall = new Manipulacao();
$selectall->setTabela("hotel");

$id=explode("/",$_GET["url"]);
$result = $selectall->SelectJoin("   hotel.idhotel={$id}");
$recount = $selectall->counts();
$_SESSION["viewhotel"]!=0?$_SESSION["viewhotel"]:$_SESSION["viewhotel"]=0;
$_SESSION["viewhotel"]=$_SESSION["viewhotel"]+1;
?>
  <?php include_once(dirINCLUDE."/header.php");?>

        <section class="portfolio-details">
            <div class="container">
                <?php foreach ($result as $dados) { ?>
                    <div class="portfolio-details-container">

                        <div class="owl-carousel portfolio-details-carousel">
                            <img src="<?php echo $dados["foto_h"]; ?>" class="img-fluid" alt="">
                            <img src="<?php echo $dados["foto_h"]; ?>" class="img-fluid" alt="">
                            <img src="<?php echo $dados["foto_h"]; ?>" class="img-fluid" alt="">
                        </div>

                        <div class="portfolio-info">
                            <h3>Localizacao do hotel</h3>
                            <ul>
                                <li><strong>Provincia</strong>: <?php echo $dados["nomeProvincia_provi"]; ?></li>
                                <li><strong>Municipio</strong>: <?php echo $dados["nomeMunicipio_munic"]; ?></li>
                                <li><strong>Data Criacao</strong>: <?php echo $dados["datacriacao_h"]; ?></li>
                                <li><strong>Full Localizacao</strong>: <?php echo $dados["nomeProvincia_provi"]; ?>,<?php echo $dados["nomeMunicipio_munic"]; ?> </li>

                                <?php if ($_SESSION["logadoProvincia"] == false) { ?>
                                    <li><strong>
                                            <a class="btn btn-warning" style="color:orage" href="../../formulario/hotel/formuphotel.php?idhotel_hotel=<?php echo $dados['idhotel_h'] ?>">Editar</a>
                                            <a class="btn btn-danger" style="color:red" href="removerhotel.php?idhotel=<?php echo $dados['idhotel_h'] ?>">Deletar</a>
                                        </strong></li>
                                <?php } ?>

                            </ul>
                        </div>

                    </div>

                    <div class="portfolio-description">
                        <h2><?php echo $dados["nomeHotel_h"]; ?></h2>
                        <p>
                            <?php echo $dados["info_h"]; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </section><!-- End Portfolio Details Section -->
        <?php include_once(dirINCLUDE."/footer.php");?>