<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  include '/ocr2/views/header.php';

}
  Route_C::add('/submit-add-news',function(){
    $dbManager = DbManager_M::createDbManager();
    $newsManager = NewsManager_M::createNewsManager();
    $newsManager->addNews(array(
      'auteur'=>$_POST['auteur'],
      'titre'=>$_POST['titre'],
      'contenu'=>$_POST['contenu']
    ));
    header('Location:/ocr2/admin');
  },'post');

  Route_C::add('/update-news',function(){
    $dbManager = DbManager_M::createDbManager();
    $newsManager = NewsManager_M::createNewsManager();
    if(!isset($_POST['updateThisNews'])){
      header('location:/ocr2/admin');
    }else{
      $dataNews = $newsManager->updateNews(array($_POST['id'], $_POST['auteur'],$_POST['titre'],$_POST['contenu']));
      header('location:/ocr2/admin');
    }
  },'post');

  Route_C::add('/submit-delete-news',function(){
    $dbManager = DbManager_M::createDbManager();
    $newsManager = NewsManager_M::createNewsManager();
    if (isset($_POST['del'])){
      $newsManager->deleteNews($_POST['id3']);
      header('Location:/ocr2/admin');
    }else{
      $dataNews = $newsManager->showOneNews($_POST['id']);
      echo '<h1 class="h1 text-center">//ADMIN</h1>';
      include '/ocr2views/oneNews.php';
      include '/ocr2views/table.php';
    }
  },'post');

  Route_C::add('/admin',function(){
    echo '<h1 class="h1 text-center">//ADMIN</h1>';
    $dbManager = DbManager_M::createDbManager();
    $newsManager = NewsManager_M::createNewsManager();
    include 'views/pdo_mysqli.php';
    include 'views/newsform.php';
    include 'views/table.php';
  });

  Route_C::add('/pdo-sqli',function(){
    $dbManager = DbManager_M::createDbManager();
    $newsManager = NewsManager_M::createNewsManager();
    $dbManager->selectDriver($_POST['PDOorMSQL']);
    header('location:/ocr2/admin');
  },'post');

  Route_C::add('/',function(){ 
    $dbManager = DbManager_M::createDbManager();
    $newsManager = NewsManager_M::createNewsManager();
    $data = $newsManager->showAllNews();
    $data = array_reverse($data);
    $dCount = count($data);
    include 'views/home.php';
    include 'views/footer.php';
  });

  Route_C::run('/ocr2');
?>