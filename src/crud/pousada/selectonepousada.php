 <?php
  include_once(dirMANIPULACAO."/Manipulacao.php");
  $selectone = new Manipulacao();
  $selectone->setTabela("pousada");
    $municipio =explode("/",$_GET["url"])[1];

  if ($_SESSION["logadoProvincia"] == true) {

    $provincia = $_SESSION["dataLogado"]["nomeProvincia"];
    $result = $selectone->SelectJoin(" pousada.nomePousada like '%{$_POST["idpousada"]}%' and provincia.nomeProvincia='$provincia'");
  } else {
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and pousada.nomePousada like '%{$_POST["idpousada"]}%' ");
  }
  $recount = $selectone->counts();
  ?>
  <?php include_once(dirINCLUDE."/header.php");?>
   <main id="main">
     <section id="portfolio" class="portfolio section-bg">

       <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row portfolio-container">
           <div class="col-lg-12 col-md-12 portfolio-item filter-app">
             <form method="POST"><input class="form-control" type="text" name="idpousada" placeholder="faca a sua pesquisa"></form>

           </div>
           <?php foreach ($result as $dados) { ?>
             <div class="col-lg-3 col-md-6 portfolio-item filter-app">
               <div class="portfolio-wrap">
                 <img src="<?php echo $dados["foto_pou"]; ?>" class="img-fluid" alt="">
                 <div class="portfolio-info">
                   <h4><?php echo $dados["nomePousada_pou"]; ?></h4>
                   <p><?php echo $dados["nomePousada_pou"]; ?></p>
                   <p>Views: <?php if(isset($_SESSION["viewpousada"])){echo $_SESSION["viewpousada"];} ?></p>

                   <div class="portfolio-links">
                     <a href="<?php echo $dados["foto_pou"]; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $dados["nomePousada_pou"] ?>"><i class="icofont-eye"></i></a>
                     <a href="../infoPousada/<?php echo $dados["idpousada_pou"]; ?>" title="More Details"><i class="icofont-external-link"></i></a>
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