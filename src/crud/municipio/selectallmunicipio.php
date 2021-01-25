 <?php
 include_once(dirMANIPULACAO."/Manipulacao.php");
    $selectall = new Manipulacao();
    $selectall->setTabela("municipio");
    $result = $selectall->allSelect();
    $recount = $selectall->counts();
    ?>
   <?php include_once(dirINCLUDE."/header.php");?>
     <div class="container" style="margin-top:50px">
         <div class="table-responsive-xl">
             <table class="table">
                 <thead>
                     <tr>
                         <th>nomeMunicipio</th>
                         <th>id</th>
                         <th>Editar</th>
                         <th>Deletar</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($result as $dados) { ?>
                         <tr>
                             <td><?php echo $dados["nomeMunicipio"] ?></td>
                             <td><?php echo $dados["provinciaid"] ?></td>

                             <td><a class="btn btn-warning" style="color:orage" href="../../formulario/municipio/formupmunicipio.php?idmunicipio=<?php echo $dados['idmunicipio'] ?>">Editar</a> </td>
                             <td> <a class="btn btn-danger" style="color:red" href="removermunicipio.php?idmunicipio=<?php echo $dados['idmunicipio'] ?>">Deletar</a></td>
                         </tr>
                     <?php } ?>
                     <?php foreach ($recount as $cout) { ?>
                         <td>Total De Registro: <?php echo $cout["Res"] ?></td>
                     <?php } ?>
                 </tbody>
             </table>
         </div><a href="formmunicipio">Insert</a>
         <a href="home">Voltar</a>
     </div>
     <?php include_once(dirINCLUDE."/footer.php");?>