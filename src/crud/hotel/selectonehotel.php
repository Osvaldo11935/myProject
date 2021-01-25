 <?php
  //error_reporting(E_ALL & ~E_NOTICE);
include_once(dirMANIPULACAO."/Manipulacao.php");

  $selectone = new Manipulacao();
  $selectone->setTabela("hotel");
 
  $municipio =explode("/",$_GET["url"])[1];
  if ($_SESSION["logadoProvincia"] == true) {

    $provincia = $_SESSION["dataLogado"]["nomeProvincia"];
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and hotel.nomeHotel like '%{$_POST["idhotel"]}%' and provincia.nomeProvincia='$provincia'");
  } else {
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and hotel.nomeHotel like '%{$_POST["idhotel"]}%' ");
  }
  $recount = $selectone->counts();
  ?>
   <?php include_once(dirINCLUDE."/header.php");?>
   <main id="main">
     <section id="portfolio" class="portfolio section-bg">
       <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row portfolio-container">
           <div class="col-lg-12 col-md-12 portfolio-item filter-app">
             <form method="POST"><input class="form-control" type="text" name="idhotel" placeholder="faca a sua pesquisa"></form>

           </div>
           <?php foreach ($result as $dados) { ?>
             <div class="col-lg-3 col-md-6 portfolio-item filter-app">
               <div class="portfolio-wrap">
                 <img src="<?php echo $dados["foto_h"]; ?>" class="img-fluid" alt="">
                 <div class="portfolio-info">
                   <h4><?php echo $dados["nomeHotel_h"]; ?></h4>
                   <p><?php echo $dados["nomeHotel_h"]; ?></p>
                   <p>Views: <?php if(isset($_SESSION["viewhotel"])){echo $_SESSION["viewhotel"];} ?></p>
                   <div class="portfolio-links">
                     <a href="<?php echo $dados["foto_h"]; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $dados["nomeHotel_h"] ?>"><i class="icofont-eye"></i></a>
                     <a href="infohotel/<?php echo $dados["idhotel_h"]; ?>" title="More Details"><i class="icofont-external-link"></i></a>
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