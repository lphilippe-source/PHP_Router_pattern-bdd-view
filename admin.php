<?php
require 'autoload.php';
// var_dump(parse_url($_SERVER['REQUEST_URI']));
// Add base route (startpage)
route::add('\/admin\/',function(){
  // var_dump( Route::$routes);
  echo 'bienvenue';}
);
Route::run('/ocr2');
$parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri
// var_dump($parsed_url['path']);
// var_dump($parsed_url);
var_dump($_SERVER['REQUEST_METHOD']);
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
    <h1 class="h1 text-center">//ADMIN</h1>
    <?php
    
    function includeFileWithVariables($fileName, $variables) {
      // $variables;
      include $fileName;
   }
   
  
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
    
    include 'pdo_mysqli.php';
    include 'newsform.php';

    if(!isset($_POST['updateThisNews'])){
      if(isset($_POST['subThisNews'])){
        $dataNews = $newsManager->showOneNews($_POST['id']);
        include 'oneNews.php';
      }
      if(isset($_POST['del'])){
        if(isset($_POST['id3'])){
        $newsManager->deleteNews($_POST['id3']);
        }else{
        }
      }
    }else{
      $dataNews = $newsManager->updateNews(array($_POST['id'], $_POST['auteur'],$_POST['titre'],$_POST['contenu']));
    }
      include 'table.php';
    ?>
    </div>
  </body>
</html>