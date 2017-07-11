<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Replex | </title>



  <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/projet/assets/css/style.css">

	<!-- Bootstrap -->
  <link href="/projet/assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cantarell|Rokkitt" rel="stylesheet">

  <link rel="stylesheet" href="/projet/assets/css/kendo.common-material.min.css">

  <link rel="stylesheet" href="/projet/assets/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="/projet/assets/css/kendo.material.override.css">

    <script src="/old/projet/assets/js/lazysizes.min.js"></script>
    <script src="/old/projet/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/old/projet/assets/js/modernizr.js"></script>

  </head>

  <body>

  	<header>

      <div class="line"></div>
      <div class="content" align="center">
        <div class="sub_media">



          <div class="left">

            <a href="/projet/index.php" class="logo">
              Replex
            </a>
            <ul class="primary">


                <li class="movie_menu">
                  <a href="/projet/movies/popular_movies.php" class="main">Films</a>
                  <ul class="sub_menu movie hide">
                    <li><a href="/projet/movies/popular_movies.php">Film populaire</a></li>
                    <li><a href="/projet/movies/top_movies.php">Top films</a></li>
                    <li><a href="/projet/movies/upcoming_movies.php">Prochainement</a></li>
                    <li><a href="/projet/movies/now_playing_movies.php">Actuellement en salles</a></li>
                  </ul>
                </li>
                <li class="tv_show_menu">
                  <a href="/projet/tv/popular_tv.php" class="main">Séries</a>
                  <ul class="sub_menu tv hide">
                    <li><a href="/projet/tv/popular_tv.php">Populaire</a></li>
                    <li><a href="/projet/tv/top_tv.php">Mieux notés</a></li>
                    <li><a href="/projet/tv/now_playing_tv.php">Série en cours de diffusion</a></li>
                    <li><a href="/projet/tv/tv_today.php">Diffusées aujourd'hui</a></li>
                  </ul>
                </li>
                <li>
                  <a href="/projet/forum/forum.php">Forum</a>
                </li>

                
                <?php
                 if (isConnected()){
                ?>

                <li>
                  <a href="/projet/user/profil.php">Profil</a>
                </li>
                <?php
                }
                ?>

            </ul>
          </div>


          <?php
             if( isConnected() ){
            ?>
            <div id="user">
              <div class="right">
                <ul class="primary">
                <li>
                    <h2 class="user" align="center">Bonjour <?php echo $_SESSION['pseudo'] ?></h2>
                    <br>
                    <ul class="sub_menu connected_menu hide">
                    <?php
                      if( isAdmin() ){
                    ?>
                    <li><a href="/projet/user/admin.php" class="edit">Administration</a>
                    <br>
                    <?php
                      }
                    ?>

                    <li><a href="editionprofile.php" class="edit">Editer mon profil</a>
                    <br>
                    </ul>
                    <li><a href="/projet/user/logout.php"><button class="logout">Se déconnecter</button></a></li>
                    </li>
                </ul>
              </div>
            </div>

             <?php
                      } else {
            ?>
            <div class="right">
              <ul class="primary">

                
                  <li><a href="/projet/user/connection.php"><button class="connexion" align="center">Connexion</button></a></li>
                  <li><a href="/projet/user/signin.php"><button class="signin" align="center">S'inscrire</button></a></li>

              </ul>
            </div>
            <?php
                          }
            ?>


        </div>
      </div>
      <div class="search_bar">
        <section class="search">
          <div class="container-fluid">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="sub_media">
                  <form id="search_form" action="/search" method="get" accept-charset="utf-8">
                    <input dir="auto" id="search_v4" name="query" type="text" tabindex="2" autocorrect="off" autofill="off" autocomplete="off" spellcheck="false" placeholder="Rechercher un film, une série, un artiste..." value="">
                    <input type="submit">
                    <i class="fa fa-search fa-2x search_icon" aria-hidden="true"></i>
                  </form>
                </div>  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </header>