<?php
require 'autoload.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>News</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    
    <?php
    route::add('/submit-add-news',function(){
      $dbManager = DbManager::createDbManager();
   $newsManager = NewsManager::createNewsManager();
      $newsManager->addNews(array(
        'auteur'=>$_POST['auteur'],
        'titre'=>$_POST['titre'],
        'contenu'=>$_POST['contenu']
      ));
      header('Location:/ocr2/admin');
    }, 'post');

  //   route::add('/submit-modifie-news',function(){
  //   $dbManager = DbManager::createDbManager();
  //   $newsManager = NewsManager::createNewsManager();
  //     $dataNews = $newsManager->showOneNews($_POST['id']);
  //     header('Location:/ocr2/admin');
  //     include 'oneNews.php';
  // }, 'post');

    route::add('/submit-delete-news',function(){
        if(isset($_POST['id3'])){
          $newsManager->deleteNews($_POST['id3']);
          header('Location:/ocr2/admin');
        }
    }, 'post');

    route::add('/admin',function(){
      // var_dump( Route::$routes);
    // echo $arg;
      echo '<h1 class="h1 text-center">//ADMIN</h1>';
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
    // if(isset($_POST['upAddNews'])){
    //   // Route::$setMethod('post');
    //   $newsManager->addNews(array(
    //     'auteur'=>$_POST['auteur'],
    //     'titre'=>$_POST['titre'],
    //     'contenu'=>$_POST['contenu']
    //   ));
    // }
    
    include 'pdo_mysqli.php';
    include 'newsform.php';

    if(!isset($_POST['updateThisNews'])){
      if(isset($_GET['subThisNews'])){
        $dataNews = $newsManager->showOneNews($_GET['id']);
        include 'oneNews.php';
      }
      // if(isset($_POST['del'])){
      //   if(isset($_POST['id3'])){
      //   $newsManager->deleteNews($_POST['id3']);
      //   }else{
      //   }
      // }
    }else{
      $dataNews = $newsManager->updateNews(array($_POST['id'], $_POST['auteur'],$_POST['titre'],$_POST['contenu']));
    }
      include 'table.php';
    ?>
    </div>
    </body>
</html>
<?php
}
);
// Route::run('/ocr2');
?>

    <?php route::add('/',function(){ 

$dbManager = DbManager::createDbManager();
$newsManager = NewsManager::createNewsManager();
      $data = $newsManager->showAllNews();
      // var_dump($data);
      $data = array_reverse($data);
      $dCount = count($data);
      ?>
      
      

    <header class='header'>
                <nav class="nav">
                    <img  id="logo" src="Pngtree.png" />
                    <p>
                        <a class='link' href="form.html">me contacter</a>
                    </p>
                    <p>
                        <a class='link' href="#">acceuil</a>
                    </p>
                    <p>
                        <a class='link' href="https://meo.fr">Meo</a>
                    </p>
                    <p>
                        <a class='link' href="https://www.maxicoffee.com/">Maxicoffee</a>
                    </p>
                </nav>
                
            </header>
            <section class="post">
                <div class="space"></div>
                <h1>Tout sur le café!</h1>
            <?php for($i = 0;$i<$dCount;$i++){ ?>
            
                <article>
                    <p class="img-float">
                        <img src="images.jpg"/>
                    </p>
                    
                    <h2><?php echo $data[$i]->getTitre(); ?></h2>
                    <p>
                    <?php echo $data[$i]->getContenu(); ?>
                        
                    </p>
                </article>
            <?php } ?>
            </section>
            <footer class="footer">
                <p>Copyright@ Philippe lemaire - 2020</p>
            </footer> 

            <script type="text/javascript" src="script.js"></script>
</div>
  </body>
</html>
<?php
}
);
Route::run('/ocr2');
?>