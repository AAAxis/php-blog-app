<!DOCTYPE html>
<html>
    <head>
      <?php require "includes/config.php";?>
      <link rel="stylesheet" href="./media/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo $config['title']; ?></title>
    </head>
  <body>

        <?php include "includes/header.php"; ?>

        <?php
        $articles = mysqli_query($connection, "SELECT * FROM `articles`");
        ?>

        <div class="section">

          <?php
          while( $art = mysqli_fetch_assoc($articles) )
          {
          ?>

          <div  class="block" >
              <h2><?php echo $art['title']; ?></h2>
              <p>Posted <?php echo mb_substr ($art['pubdate'], 0, 11, 'utf-8'); ?></p>
              <div class="fakepost" style="height:200px;">
              <a href="../includes/details.php?id=<?php echo $art['id']; ?>">
              <img src="../static/images/<?php echo $art['image']; ?>" style="height:200px" alt="<?php echo $art['title']; ?>" ></a></div><br>
              <p><?php echo $art['text']; ?></p>

            <?php
              $art_cat = false;
              foreach( $categories as $cat )
              {
                if( $cat['id'] == $art['categorie'] )
                {
                  $art_cat = $cat;
                  break;
                }
              }
            ?>
            <small>Categorie: <a href="../includes/details.php?id=<?php echo $art_cat['id'];?>"><?php echo $art_cat['title']; ?></a></small>

        
      
        </div>
      
        <?php
          }
            ?>
        </div> 
        <?php include "includes/sidebar.php"; ?>

    

  </body>
</html>
