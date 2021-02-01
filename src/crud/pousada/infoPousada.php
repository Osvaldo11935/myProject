<?php
include_once(dirMANIPULACAO."/Manipulacao.php");
$selectall = new Manipulacao();
$id=explode("/",$_GET["url"]);
$selectall->setTabela("pousada");
$result = $selectall->SelectJoin("   pousada.idpousada={$id[1]}");
$recount = $selectall->counts();
$_SESSION["viewpousada"]!=0?$_SESSION["viewpousada"]:$_SESSION["viewpousada"]=0;
$_SESSION["viewpousada"]=$_SESSION["viewpousada"]+1;
?>
  <?php include_once(dirINCLUDE."/header.php");?>
    <main id="main">


        <section class="portfolio-details">
            <div class="container">
                <?php foreach ($result as $dados) { ?>
                    <div class="portfolio-details-container">

                        <div class="owl-carousel portfolio-details-carousel">
                            <img src="<?php echo $dados["foto_pou"]; ?>" class="img-fluid" alt="">
                            <img src="<?php echo $dados["foto_pou"]; ?>" class="img-fluid" alt="">
                            <img src="<?php echo $dados["foto_pou"]; ?>" class="img-fluid" alt="">
                        </div>

                        <div class="portfolio-info">
                            <h3>Localizacao do pousada</h3>
                            <ul>
                                <li><strong>Provincia</strong>: <?php echo $dados["nomeProvincia_provi"]; ?></li>
                                <li><strong>Municipio</strong>: <?php echo $dados["nomeMunicipio_munic"]; ?></li>
                                <li><strong>Data Criacao</strong>: <?php echo $dados["datacriacao_pou"]; ?></li>
                                <li><strong>Full Localizacao</strong>: <?php echo $dados["nomeProvincia_provi"]; ?>,<?php echo $dados["nomeMunicipio_munic"]; ?> </li>
                                <?php if ($_SESSION["logadoProvincia"] == false) { ?>
                                    <li><strong>
                                            <a class="btn btn-warning" style="color:orage" href="../formuppousada/<?php echo $dados['idpousada_pou'] ?>">Editar</a>
                                            <a class="btn btn-danger" style="color:red" href="../removerpousada/<?php echo $dados['idpousada_pou'] ?>">Deletar</a>
                                        </strong></li>
                                <?php } ?>

                            </ul>
                        </div>

                    </div>

                    <div class="portfolio-description">
                        <h2><?php echo $dados["nomePousada_pou"]; ?></h2>
                        <p>
                            <?php echo $dados["info_pou"]; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
    <?php include_once(dirINCLUDE."/footer.php");?>