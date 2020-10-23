<?php
require 'autoload.php';
// var_dump(parse_url($_SERVER['REQUEST_URI']));
// Add base route (startpage)


// $parsed_url = parse_url($_SERVER['REQUEST_URI']);
// var_dump($parsed_url['path']);
// var_dump($parsed_url);
// var_dump($_SERVER['REQUEST_METHOD']);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>News</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  </head>
  <body>
    <div class="container">
    
    <?php
    $dbManager = DbManager::createDbManager();
    $newsManager = NewsManager::createNewsManager();
    route::add('/admin',function(){
      // var_dump( Route::$routes);
    // echo $arg;
      echo '<h1 class="h1 text-center">//ADMIN</h1>';
    function includeFileWithVariables($fileName, $variables) {
      // $variables;
      include $fileName;
   }
   
  
    
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
<?php
}
);
// Route::run('/ocr2');
?>

    <?php route::add('/',function(){ 
      $data = $newsManager->showAllNews();
      $dCount = count($data);?>
      
      

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