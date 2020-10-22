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

    <?php route::add('/',function(){ ?>

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
                <article>
                    <p class="img-float">
                        <img src="images.jpg"/>
                    </p>
                    
                    <h2>Where does it come from?</h2>
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        
                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                    </p>
                </article>
                <article>
                    <p class="img-float">
                        <img src="images.jpg"/>
                    </p>
                    <h2>What is Lorem Ipsum?</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </article>
                <article>
                    <p class="img-float">
                        <img src="images.jpg"/>
                    </p>
                    <h2>Where can I get some?</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                    </p>
                </article>
                <article>
                    <p class="img-float">
                        <img src="images.jpg"/>
                    </p>
                
                    <h2>Why do we use it?</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </p>
                </article>
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