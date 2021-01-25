 <?php
  include_once(dirMANIPULACAO."/Manipulacao.php");
  $selectone = new Manipulacao();
  $selectone->setTabela("saloesDeEveto");
    $municipio =explode("/",$_GET["url"])[1];

  if ($_SESSION["logadoProvincia"] == true) {
    $provincia = $_SESSION["dataLogado"]["nomeProvincia"];
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and saloesDeEveto.nomeSaloesDeEveto like '%{$_POST["idsaloesDeEveto"]}%' and  provincia.nomeProvincia='$provincia'");
  } else {
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and saloesDeEveto.nomeSaloesDeEveto like '%{$_POST["idsaloesDeEveto"]}%' ");
  }
  $recount = $selectone->counts();
  ?>
  <?php include_once(dirINCLUDE."/header.php");?>
   <main id="main">
     <section id="portfolio" class="portfolio section-bg">
       <div class="container" data-aos="fade-up" data-aos-delay="100">
         <div class="col-lg-12 col-md-12 portfolio-item filter-app">
           <form method="POST"><input class="form-control" type="text" name="idsaloesDeEveto" placeholder="faca a sua pesquisa"></form>

         </div>
         <div class="row portfolio-container">
           <?php foreach ($result as $dados) { ?>
             <div class="col-lg-3 col-md-6 portfolio-item filter-app">
               <div class="portfolio-wrap">
                 <img src="<?php echo $dados["foto_saloesDeE"]; ?>" class="img-fluid" alt="">
                 <div class="portfolio-info">
                   <h4><?php echo $dados["nomeSaloesDeEveto_saloesDeE"]; ?></h4>
                   <p><?php echo $dados["nomeSaloesDeEveto_saloesDeE"]; ?></p>
                   <p>Views: <?php if(isset($_SESSION["viewsaloesDeEveto"])){echo $_SESSION["viewsaloesDeEveto"];} ?></p>
                   <div class="portfolio-links">
                     <a href="<?php echo $dados["foto_saloesDeE"]; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $dados["nomeSaloesDeEveto_saloesDeE"] ?>"><i class="icofont-eye"></i></a>
                     <a href="../infoSaloesDeEveto/<?php echo $dados["idsaloesDeEveto_saloesDeE"]; ?>" title="More Details"><i class="icofont-external-link"></i></a>
                   </div>
                 </div>
               </div>
             </div>

           <?php } ?>

         </div>
         <?php if ($result->num_rows == 0) { ?>
           <p>Nenhum dados relacionado a esta opcao</p>
         <?php } ?>
       </div>
     </section>
   </main>

   <?php include_once(dirINCLUDE."/footer.php");?>