 <?php
 include_once(dirMANIPULACAO."/Manipulacao.php");
  $idsaloesDeEveto =  explode("/",$_GET["url"])[1];
  $selectone = new Manipulacao();
  $selectone->setTabela("saloesDeEveto");
  $selectone->setValorNaTabela("idsaloesDeEveto");
  $selectone->setValorPesquisa("$idsaloesDeEveto");
  $result = $selectone->read();
  $row = mysqli_fetch_assoc($result);
  ?>
<?php  include_once(dirINCLUDE."/out.php");?>
   <main id="main">
     <section id="contact" class="contact">
       <div class="container">
         <div class="section-title">
         </div>
         <div class="row">
           <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300" class="php-email-form">
             <div class="card" style="margin-top:20px">
               <h5 class="card-header">
                 <legend>...</legend>
               </h5>
               <div class="card-body">
                 <form action="../updatesaloesDeEveto" method="post" enctype="multipart/form-data">
                   <fieldset>

                     <input type="hidden" name="idsaloesDeEveto" value="<?php echo $row['idsaloesDeEveto'] ?>">
                     <div class="form-row">
                       <div class="col-md-6 mb-3">
                         <input class="form-control" type="text" required name="nomeSaloesDeEveto" id="nomeSaloesDeEveto" value="<?php echo $row["nomeSaloesDeEveto"] ?>" placeholder="Preencha este Campo com nomeSaloesDeEveto">
                       </div><br>
                       <div class="col-md-6 mb-3">
                         <input class="form-control" type="file" required name="imagem" id="foto" value="<?php echo $row["foto"] ?>" placeholder="Preencha este Campo com foto">
                       </div><br>
                       <div class="col-md-12 mb-3">
                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info" id="info" placeholder="Preencha este Campo com info"><?php echo $row["info"] ?></textarea>
                       </div><br>

                       <div class="col-md-12 mb-3">
                      <select class="form-control" name="municipioid" onclick="refrech('Municipio','nomeMunicipio')" id="Municipio">
                      </select> </div><br>
                     </div>
                     <button class="btn btn-primary btn-block">Enviar</button>
                   </fieldset>
                 </form>
               </div>
             </div>
           </div>

         </div>
       </div>
     </section>
   </main>
   <?php  include_once(dirINCLUDE."/footer.php");?>