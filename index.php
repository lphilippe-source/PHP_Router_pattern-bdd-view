<?php
  include 'header.php';

  Route::add('/submit-add-news',function(){
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    $newsManager->addNews(array(
      'auteur'=>$_POST['auteur'],
      'titre'=>$_POST['titre'],
      'contenu'=>$_POST['contenu']
    ));
    header('Location:/ocr2/admin');
  }, 'post');

  Route::add('/update-news',function(){
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    if(!isset($_POST['updateThisNews'])){
      header('location:/ocr2/admin');
    }else{
      $dataNews = $newsManager->updateNews(array($_POST['id'], $_POST['auteur'],$_POST['titre'],$_POST['contenu']));
      header('location:/ocr2/admin');
    }
  },'post');

  Route::add('/submit-delete-news',function(){
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    if (isset($_POST['del'])){
      $newsManager->deleteNews($_POST['id3']);
      header('Location:/ocr2/admin');
    }else{
      $dataNews = $newsManager->showOneNews($_POST['id']);
      echo '<h1 class="h1 text-center">//ADMIN</h1>';
      include 'oneNews.php';
      include 'table.php';
    }
  },'post');

  Route::add('/admin',function(){
    echo '<h1 class="h1 text-center">//ADMIN</h1>';
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    include 'pdo_mysqli.php';
    include 'newsform.php';
    include 'table.php';
  });

  Route::add('/pdo-sqli',function(){
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    $dbManager->selectDriver($_POST['PDOorMSQL']);
    header('location:/ocr2/admin');
  },'post');

  Route::add('/',function(){ 
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    $data = $newsManager->showAllNews();
    $data = array_reverse($data);
    $dCount = count($data);
    include 'home.php';
    include 'footer.php';
  });

  Route::run('/ocr2');
?>