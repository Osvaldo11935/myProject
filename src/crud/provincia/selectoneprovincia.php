 <?php
  error_reporting(E_ALL & ~E_NOTICE);
 
  include_once(dirMANIPULACAO."/Manipulacao.php");
  $dados = array(
    "nomeProvincia" => $_POST["idprovincia"],
  );;
  $selectone = new Manipulacao();
  $selectone->setTabela("provincia");
  $result = $selectone->select($dados);
  $recount = $selectone->counts();
  ?>
  <?php include_once(dirINCLUDE."/header.php");?>
   <section id="topbar" class="d-none d-lg-block">
   </section>
   <div class="container" style="margin-top:50px">
     <form method="POST"><input class="form-control" type="text" name="idprovincia" placeholder="faca a sua pesquisa"></form>
     <div class="table-responsive-xl">
       <table class="table">
         <thead>
           <tr>
             <th>nomeProvincia</th>
             <th>Editar</th>
             <th>Deletar</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($result as $dados) { ?>
             <tr>
               <td><?php echo $dados["nomeProvincia"] ?></td>

               <td><a class="btn btn-warning" style="color:orage" href="../../formulario/provincia/formupprovincia.php?idprovincia=<?php echo $dados['idprovincia'] ?>">Editar</a></td>
               <td> <a class="btn btn-danger" style="color:red" href="removerprovincia.php?idprovincia=<?php echo $dados['idprovincia'] ?>">Deletar</a></td>
             </tr>
           <?php } ?>
           <?php foreach ($recount as $cout) { ?>
             <td>Total De Registro: <?php echo $cout["Res"] ?></td>
           <?php } ?>
         </tbody>
       </table>
     </div><a href="formprovincia">Insert</a>
     <a href="home">Voltar</a>
   </div>
   <?php include_once(dirINCLUDE."/footer.php");?>