<?php
// require $_SERVER['PWD'].'/autoload.php';
?>
<br/>
<h2 class="h2 blockquote-footer">mise à jour d'une news</h2><br/>

<table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">auteur</th>
      <th scope="col">titre</th>
      <th scope="col">Contenu</th>
      <th scope="col"></th>
      <!-- <th scope="col">DateAjout</th>
      <th scope="col">DateModif</th> -->

    </tr>
  </thead>

  <tbody>
  
<form action='/ocr2/update-news' method='POST'>
  <tr>
  
    <th scope="row">#</th>
    <input type="text" name="id" style="display:none" value=<?php echo $dataNews[0]->getId();?>>
    <td><?php echo $dataNews[0]->getId(); ?></td>
    <td>
        <div class="form-group">
            <textarea class="form-control" name="auteur" rows="3"><?php echo $dataNews[0]->getAuteur(); ?></textarea>
        </div>
    </td>
    <td>
        <div class="form-group">
            <textarea class="form-control" name="titre" rows="3"><?php echo $dataNews[0]->getTitre(); ?></textarea>
        </div></td>
    <td>
        <div class="form-group">
            <textarea class="form-control" name="contenu" rows="3"><?php echo $dataNews[0]->getContenu(); ?></textarea>
        </div></td>
    <td>
    <div style="float: right;">
        <?php
        //  $_SESSION['idDel'] = (int) $dataNews[0]->getId();
         ?>
        <input type="text" name="id2" style="display:none" value=<?php echo $dataNews[0]->getId();?>>

        <input type="submit" class="btn btn-dark" name="del" value="<-">
        <input type="submit" name="updateThisNews" class="btn btn-outline-secondary"/>

    </div>
    </td>
    <!-- <td><?php // echo $data[$i]->getDateAjout(); ?></td>
    <td><?php // echo $data[$i]->getDateModif(); ?></td> -->
  </tr>
</form>
  </tbody>
</table>

