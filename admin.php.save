<?php
require 'autoload.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>News</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <?php
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    if(isset($_POST['choixDb'])){
      if(isset($_POST['PDOorMSQL'])){
        $dbManager->selectDriver($_POST['PDOorMSQL']);
      }
    }
    if(isset($_POST['upAddNews'])){
      $newsManager->addNews(array(
        'auteur'=>$_POST['auteur'],
        'titre'=>$_POST['titre'],
        'contenu'=>$_POST['contenu']
      ));
    }
      include 'login.php';
      include 'pdo_mysqli.php';
      include 'newsform.php';
    ?>
    </div>
  </body>
</html>