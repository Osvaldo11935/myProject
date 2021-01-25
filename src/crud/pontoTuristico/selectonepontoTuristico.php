 <?php
  // session_start();
  // error_reporting(E_ALL & ~E_NOTICE);
 
  include_once(dirMANIPULACAO."/Manipulacao.php");
  $selectone = new Manipulacao();
  $selectone->setTabela("pontoTuristico");
    $municipio =explode("/",$_GET["url"])[1];

  if ($_SESSION["logadoProvincia"] == true) {

    $provincia = $_SESSION["dataLogado"]["nomeProvincia"];
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and pontoTuristico.nomePontoTuristico like '%{$_POST["idpontoTuristico"]}%' and provincia.nomeProvincia='$provincia'");
  } else {
    $result = $selectone->SelectJoin("  municipio.nomeMunicipio like '%{$municipio}%' and pontoTuristico.nomePontoTuristico like '%{$_POST["idpontoTuristico"]}%'");
  }
  $recount = $selectone->counts();
  ?>
  <?php include_once(dirINCLUDE."/header.php");?>
   <main id="main">

     <section id="portfolio" class="portfolio section-bg">

       <div class="container" data-aos="fade-up" data-aos-delay="100">
         <div class="row portfolio-container">
           <div class="col-lg-12 col-md-12 portfolio-item filter-app">
             <form method="POST"><input class="form-control" type="text" name="idpontoTuristico" placeholder="faca a sua pesquisa"></form>
           </div>
           <?php foreach ($result as $dados) { ?> <div class="col-lg-3 col-md-4 portfolio-item filter-app">
               <div class="portfolio-wrap">
                 <img src="<?php echo $dados["foto_pontoTuris"]; ?>" class="img-fluid" alt="">
                 <div class="portfolio-info">
                   <h4><?php echo $dados["nomePontoTuristico_pontoTuris"]; ?></h4>
                   <p><?php echo $dados["nomePontoTuristico_pontoTuris"]; ?></p>
                   <p>Views: <?php if(isset($_SESSION["viewpontoTuristico"])){echo $_SESSION["viewpontoTuristico"];} ?></p>
                   <div class="portfolio-links">
                     <a href="<?php echo $dados["foto_pontoTuris"]; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $dados["nomePontoTuristico_pontoTuris"] ?>"><i class="icofont-eye"></i></a>
                     <a href="../infoPontoTuristico/<?php echo $dados["idpontoTuristico_pontoTuris"]; ?>" title="More Details"><i class="icofont-external-link"></i></a>
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