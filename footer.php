<footer>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content_footer">

            <div class="menu_footer">
              <ul class="tmdb_logo">
                <li class="logo_tmdb">
                    <img src="/projet/images/tmdb_green.png">
                </li>
              </ul>
              <ul class="films_menu">

                  <li>
                    <a href="movies/popular_movies.php" class="biggy">Films</a>
                  </li>
                      <li><a href="movies/popular_movies.php">Film populaire</a></li>
                      <li><a href="movies/top_movies.php">Top films</a></li>
                      <li><a href="movies/upcoming_movies">Prochainement</a></li>
                      <li><a href="movies/now_playing_movies.php">Actuellement en salles</a></li>
                </ul>
                <ul class="tv_menu">
                  <li>
                    <a href="tv/popular_tv.php" class="biggy">Séries</a>
                  </li>
                      <li><a href="tv//popular_tv.php">Populaire</a></li>
                      <li><a href="tv/top_tv.php">Meilleurs notes</a></li>
                      <li><a href="tv/now_playing_tv.php">En cours de diffusion</a></li>
                      <li><a href="tv/tv_today.php">Diffusées aujourd'hui</a></li>

                </ul>
                <ul class="menu_footer">
                  <li>
                    <a href="forum.php" class="biggy">Forum</a>
                  </li>
                </ul>


                <ul class="menu_footer">
                  <li>
              <a href="contact.php" class="biggy">Contact</a>
            </li>
          </ul>

          <ul class="menu_footer">
            <li>
              <a href="about.php" class="biggy">A propos</a>

            </li>
          </ul>


            </div>


          </div>
        </div>
      </div>
      <br>
      <br>
    </div>
  </div>

  </footer>


  <script src="https://www.themoviedb.org/assets/static_cache/7f676f87b3394e789f70d78fb514ed07/javascripts/kendo-2017-1.223/cultures/kendo.culture.fr-FR.min.js"></script>
  <script src="https://www.themoviedb.org/assets/static_cache/f2a4edddc779f8741bf46ed558f8ff48/javascripts/pusher.min.js"></script>


<script src="/projet/tools/functions.js"></script>
<script src="https://www.themoviedb.org/assets/static_cache/d1058d071a78bf79cdcdaaaacdbc55a6/javascripts/jquery.timeago.min.js"></script>

<script type="text/javascript">


  

  $(document).ready(function(){
    jQuery.timeago.settings.allowFuture = true;
    $("time.timeago").timeago();

    $("li.new").kendoTooltip({
      autoHide: true,
      showOn: 'click',
      width: 240,
      position: "bottom"
    });





    $("ul > li").hover(function() {
      $(this).find("ul.sub_nav.hide").toggle();
    });


      $("header ul.primary li").hover(function(e) {
        if ($('header').hasClass('normal')) {
          $(this).find("ul.hide").toggle();
        }
      });



        $("ul.primary li.movie_menu").hover(function () {
            $("ul.sub_menu.movie").removeClass("hide");
            $("ul.primary li.movie_menu a.main").addClass("focused_menu");
        }, function(){
            $("ul.sub_menu.movie").addClass('hide');
            $("ul.primary li.movie_menu a.main").removeClass("focused_menu");
        });

        $("ul.primary li.tv_show_menu").hover(function () {
            $("ul.sub_menu.tv").removeClass("hide");
            $("ul.primary li.tv_show_menu a.main").addClass("focused_menu");
        }, function(){
            $("ul.sub_menu.tv").addClass('hide');
            $("ul.primary li.tv_show_menu a.main").removeClass("focused_menu");
        });

    

    $("#search_v4").kendoAutoComplete({
      minLength: 1,
      dataTextField: "title",
      template: kendo.template($("#multi_search_template").html()),
      ignoreCase: false,
      placeholder: 'Rechercher un film, une série, un artiste...',
      dataSource: {
        type: "json",
        serverFiltering: true,
        transport: {
          read: 'https://api.themoviedb.org/3/search/multi?api_key=201890f6f284647ffe927b318d8bca47&language=fr-FR',
          parameterMap: function() {
            return { query: $("#search_v4").data("kendoAutoComplete").value() };
          }
        },
        schema: {
          data: "results"
        }
      },
      popup: {
        appendTo: $("header")
      },
      select: function(e) {
        var dataItem = this.dataItem(e.item.index());
        setSelectedItem(dataItem);
      },
      change: function(e) {
        checkSelectedItem(e.sender._last);
      }
    });

    selectedItem = null;
    function setSelectedItem(item) {
      selectedItem = item;
    }

    function checkSelectedItem(key) {
      if (selectedItem) {
        window.location = '/old/projet/' + selectedItem.media_type + '/' + selectedItem.media_type + '_details.php?' + selectedItem.media_type + '=' + selectedItem.id
      } else {
        if (key == 13 && $('#search_v4').val().length > 0) {
          $("#search_form").submit();
        }
      }
    }


      $('#search_v4').data("kendoAutoComplete").focus();


    $('header span.k-i-close[title="clear"]').on('click', function(e) {
      $('#search_v4').data("kendoAutoComplete").focus();
    });


  });
</script>



<script id="person_result_template" type="text/x-kendo-tmpl">
  <div class="ac_item profile list_item known_for">
      <div class="image_content profile">
        # if (data.profile_path) { #
          <img class="lazyload fade" data-src="https://image.tmdb.org/t/p/w45_and_h45_bestv2${data.profile_path}" alt="${data.name}" width="45" height="45" data-srcset="https://image.tmdb.org/t/p/w45_and_h45_bestv2${data.profile_path} 1x, https://image.tmdb.org/t/p/w90_and_h90_bestv2${data.profile_path} 2x">
        # } else { #
          <div class="no_image_holder w45_and_h45 profile circle"></div>
        # } #
      </div>

      <div class="content">
        <p class="name">${data.name}</p>
        # if (data.known_for) { #
          <p class="sub">
            # for (var i = 0; i < data.known_for.length; i++) { #
            <span class="comma">#= data.known_for[i].title ? data.known_for[i].title : data.known_for[i].name #</span>
            # } #
          </p>
        # } else { #
          <p class="sub">Contenu introuvable.</p>
        # } #
      </div>
    <p><span class="media_type person">Personnalité</span></p>
  </div>
</script>

<script id="movie_result_template" type="text/x-kendo-tmpl">
  <div class="ac_item poster list_item">
      <div class="image_content poster">
        # if (data.poster_path) { #
          <img class="lazyload fade" data-src="https://image.tmdb.org/t/p/w45_and_h67_bestv2${data.poster_path}" alt="${data.title}" width="45" height="67" data-srcset="https://image.tmdb.org/t/p/w45_and_h67_bestv2${data.poster_path} 1x, https://image.tmdb.org/t/p/w90_and_h134_bestv2${data.poster_path} 2x">
        # } else { #
          <div class="no_image_holder w45_and_h67"></div>
        # } #
      </div>

      <div class="content">
        <p class="name">${data.title}</p>
        <p class="sub">
          # if (data.title) { #
            <span class="comma"><span class="original_title">#= data.title #</span></span>
          # } else if (data.original_title) { #
             <span class="comma"><span class="original_title">#= data.original_title #</span></span>
          # } #
          # if (data.release_date) { #
            <span class="comma"><span class="release_date">#= data.release_date #</span></span>
          # } #
        </p>
      </div>

    <p><span class="media_type movie">Film</span></p>
  </div>
</script>

<script id="tv_show_result_template" type="text/x-kendo-tmpl">
  <div class="ac_item poster list_item">
      <div class="image_content poster">
        # if (data.poster_path) { #
          <img class="lazyload fade" data-src="https://image.tmdb.org/t/p/w45_and_h67_bestv2${data.poster_path}" alt="${data.title}" width="45" height="67" data-srcset="https://image.tmdb.org/t/p/w45_and_h67_bestv2${data.poster_path} 1x, https://image.tmdb.org/t/p/w90_and_h134_bestv2${data.poster_path} 2x">
        # } else { #
          <div class="no_image_holder w45_and_h67"></div>
        # } #
      </div>

      <div class="content">
        <p class="name">${data.name}</p>
        <p class="sub">
          # if (data.original_name !== data.name) { #
            <span class="comma"><span class="original_title">#= data.name #</span></span>
          # } #
          # if (data.first_air_date) { #
            <span class="comma"><span class="release_date">#= data.first_air_date #</span></span>
          # } #
        </p>
      </div>

    <p><span class="media_type tv">Série tv</span></p>
    
  </div>
</script>

<script id="multi_search_template" type="text/x-kendo-tmpl">
  <div class="ac_results">
    # if (data.media_type == 'movie') { #
      #= kendo.render(kendo.template($("\\#movie_result_template").html()), [data]) #
    # } else if (data.media_type == 'tv') { #
      #= kendo.render(kendo.template($("\\#tv_show_result_template").html()), [data]) #
    # } else if (data.media_type == 'person') { #
      #= kendo.render(kendo.template($("\\#person_result_template").html()), [data]) #
    # } #
  </div>
</script>

  </body>
</html>


