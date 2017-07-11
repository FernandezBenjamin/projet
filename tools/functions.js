function openCloseMenu(id)
{
	var toggle = document.getElementById(id);
	if(toggle.style.display == "none"){
		toggle.style.display = "block";
	} else {
		toggle.style.display = "none";
	}

}


function add_message(){

  var message = document.getElementById('message').value;


  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4){
      console.log(request.responseText);
    }
  };
  request.open('POST', 'tchat.php');
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


  var params = [
    "message=" + message,
  ];

  request.send(params);
}



function show_other_film(tabindex, row){

	var images_films = [];
	var index = parseInt(tabindex)*4;
	var button;
	var test_row = parseInt(row);

	if(tabindex == 4 && test_row == 1){
		var page = document.getElementById('movie_page_' + row);
		page.setAttribute("style","display:none;");

		row = parseInt(row)+1;

		var page = document.getElementById('movie_page_' + row);
		page.setAttribute("style","display:block;");

		tabindex = 1;
		index = parseInt(tabindex)*4;
	}


	for(var i = 1; i<=index;i++){
		images_films[i-1] = document.getElementById('film_' + row + "_" +i);
		images_films[i-1].setAttribute("style", "display:none;");
	}

	for(var j = index+1;j<=index+4;j++){
		images_films[j-1] = document.getElementById('film_' + row + "_" +j);
		images_films[j-1].setAttribute("style", "display:block;");
	}

	
		button = document.getElementById('more_movie_button_' + row + "_"  + tabindex);
		button.setAttribute("style","display:none;");

	if (test_row != 2){
		var tabindex1 = parseInt(tabindex) + 1;

		
		button = document.getElementById('more_movie_button_' + row + "_" + tabindex1);
		button.setAttribute("style","display:inline-block;");
	} else {
		if (test_row == 2 && tabindex!=4){

			var tabindex1 = parseInt(tabindex) + 1;

			
			button = document.getElementById('more_movie_button_' + row + "_" + tabindex1);
			button.setAttribute("style","display:inline-block;");
		}
	}



}






function show_other_tv_show(tabindex, row){

	var images_tv = [];
	var index = parseInt(tabindex)*4;
	var button;
	var test_row = parseInt(row);

	if(tabindex == 4 && test_row == 1){
		var page = document.getElementById('tv_page_' + row);
		page.setAttribute("style","display:none;");

		row = parseInt(row)+1;

		var page = document.getElementById('tv_page_' + row);
		page.setAttribute("style","display:block;");

		tabindex = 1;
		index = parseInt(tabindex)*4;
	}


	for(var i = 1; i<=index;i++){
		images_tv[i-1] = document.getElementById('tv_show_' + row + "_" +i);
		images_tv[i-1].setAttribute("style", "display:none;");
	}

	for(var j = index+1;j<=index+4;j++){
		images_tv[j-1] = document.getElementById('tv_show_' + row + "_" +j);
		images_tv[j-1].setAttribute("style", "display:block;");
	}

	
		button = document.getElementById('more_tv_button_' + row + "_"  + tabindex);
		button.setAttribute("style","display:none;");

	if (test_row != 2){
		var tabindex1 = parseInt(tabindex) + 1;

		
		button = document.getElementById('more_tv_button_' + row + "_" + tabindex1);
		button.setAttribute("style","display:inline-block;");
	} else {
		if (test_row == 2 && tabindex!=4){

			var tabindex1 = parseInt(tabindex) + 1;

			
			button = document.getElementById('more_tv_button_' + row + "_" + tabindex1);
			button.setAttribute("style","display:inline-block;");
		}
	}



}



function show_other_film_profil(tabindex, row){

	var images_films = [];
	var index = parseInt(tabindex)*5;
	var button;
	var test_row = parseInt(row);

	if(tabindex == 5 && test_row == 1){
		var page = document.getElementById('movie_page_' + row);
		page.setAttribute("style","display:none;");

		row = parseInt(row)+1;

		var page = document.getElementById('movie_page_' + row);
		page.setAttribute("style","display:block;");

		tabindex = 1;
		index = parseInt(tabindex)*5;
	}


	for(var i = 1; i<=index;i++){
		images_films[i-1] = document.getElementById('film_' + row + "_" +i);
		images_films[i-1].setAttribute("style", "display:none;");
	}

	for(var j = index+1;j<=index+5;j++){
		images_films[j-1] = document.getElementById('film_' + row + "_" +j);
		images_films[j-1].setAttribute("style", "display:block;");
	}

	
		button = document.getElementById('more_movie_button_' + row + "_"  + tabindex);
		button.setAttribute("style","display:none;");

	if (test_row != 2){
		var tabindex1 = parseInt(tabindex) + 1;

		
		button = document.getElementById('more_movie_button_' + row + "_" + tabindex1);
		button.setAttribute("style","display:inline-block;");
	} else {
		if (test_row == 2 && tabindex!=5){

			var tabindex1 = parseInt(tabindex) + 1;

			
			button = document.getElementById('more_movie_button_' + row + "_" + tabindex1);
			button.setAttribute("style","display:inline-block;");
		}
	}



}






function show_other_tv_show_profil(tabindex, row){

	var images_tv = [];
	var index = parseInt(tabindex)*5;
	var button;
	var test_row = parseInt(row);

	if(tabindex == 5 && test_row == 1){
		var page = document.getElementById('tv_page_' + row);
		page.setAttribute("style","display:none;");

		row = parseInt(row)+1;

		var page = document.getElementById('tv_page_' + row);
		page.setAttribute("style","display:block;");

		tabindex = 1;
		index = parseInt(tabindex)*5;
	}


	for(var i = 1; i<=index;i++){
		images_tv[i-1] = document.getElementById('tv_show_' + row + "_" +i);
		images_tv[i-1].setAttribute("style", "display:none;");
	}

	for(var j = index+1;j<=index+5;j++){
		images_tv[j-1] = document.getElementById('tv_show_' + row + "_" +j);
		images_tv[j-1].setAttribute("style", "display:block;");
	}

	
		button = document.getElementById('more_tv_button_' + row + "_"  + tabindex);
		button.setAttribute("style","display:none;");

	if (test_row != 2){
		var tabindex1 = parseInt(tabindex) + 1;

		
		button = document.getElementById('more_tv_button_' + row + "_" + tabindex1);
		button.setAttribute("style","display:inline-block;");
	} else {
		if (test_row == 2 && tabindex!=5){

			var tabindex1 = parseInt(tabindex) + 1;

			
			button = document.getElementById('more_tv_button_' + row + "_" + tabindex1);
			button.setAttribute("style","display:inline-block;");
		}
	}



}







var selected_films_id = [];
var selected_films_genres = [];

function select_film(id, genres, row, nb_film,id_icon){

	if (isNotSelected(id,selected_films_id)){
		var film_id = parseInt(id);

		var div = document.getElementById('film_' + row + "_" + nb_film);

		selected_films_id.push(film_id);
		selected_films_genres.push(genres);



		div.onclick = function onclick(event){ unselect_film(film_id, genres, row, nb_film,id_icon);};

		var thumbs = document.getElementById(id_icon);
		thumbs.style.display = "flex";
		div.classList.add("selected");
		
		console.log(selected_films_id);

	}


	if (twoSelected()){
		var send_taste = document.getElementById('send_taste');
		send_taste.style.display = "inline-block";
	}
	


}



function isNotSelected(id, tab){
	var film_id = parseInt(id);
	var length = tab.length

	
	for( var i = 0; i < length; i++ ){
		if (tab[i] == film_id){
			return false;
		}
	}
	return true;
}



function unselect_film(id, genres, row, nb_film,id_icon){
	var index = selected_films_id.indexOf(id);
	var film_id = parseInt(id);


	selected_films_id.splice (index,1);
	selected_films_genres.splice (index,1);


	var div = document.getElementById('film_' + row + "_" + nb_film);


	div.onclick = function onclick(event){ select_film(film_id, genres, row, nb_film, id_icon);};

	var thumbs = document.getElementById(id_icon);
	thumbs.style.display = "none";
	div.classList.remove("selected");

	if (!twoSelected()){
		var send_taste = document.getElementById('send_taste');
		send_taste.style.display = "none";
	}

}




var selected_tvs_id = [];
var selected_tvs_genres = [];

function select_tv(id, genres, row, nb_film,id_icon){

	if (isNotSelected(id,selected_tvs_id)){
		var tv_id = parseInt(id);

		var div = document.getElementById('tv_show_' + row + "_" + nb_film);

		selected_tvs_id.push(tv_id);
		selected_tvs_genres.push(genres);



		div.onclick = function onclick(event){ unselect_tv(tv_id, genres, row, nb_film, id_icon);};


		var thumbs = document.getElementById(id_icon);
		thumbs.style.display = "flex";
		div.classList.add("selected");
		console.log(selected_tvs_id);
		 if (twoSelected()){
		  	var send_taste = document.getElementById('send_taste');
		  	send_taste.style.display = "inline-block";
		  }

	}
	


}



function unselect_tv(id, genres, row, nb_film, id_icon){
	var index = selected_tvs_id.indexOf(id);
	var tv_id = parseInt(id);


	selected_tvs_id.splice (index,1);
	selected_tvs_genres.splice(index,1);


	var div = document.getElementById('tv_show_' + row + "_" + nb_film);


	div.onclick = function onclick(event){ select_tv(tv_id, genres, row, nb_film, id_icon);};


	var thumbs = document.getElementById(id_icon);
	thumbs.style.display = "none";

	div.classList.remove("selected");

	if (!twoSelected()){
		var send_taste = document.getElementById('send_taste');
		send_taste.style.display = "none";
	}

}


function twoSelected(){
	if (selected_tvs_id.length >= 2 && selected_films_id.length >= 2){

		return true;
	} else {

		return false;
	}
}








function add_film_db(){
	var params = [];
 	var l = selected_films_id.length;

  	for (var i = 0; i<l; i++) {
	  	add_taste_film(selected_films_id[i],selected_films_genres[i]);
	}


}

function send_taste(){
	if (selected_films_id.length > 0){
		add_film_db();
	}
	if (selected_tvs_id.length > 0){
		add_tv_show_db();
	}

	document.location.href="profil.php"

}



function add_taste_film(id,genres){

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4){
      console.log(request.responseText);
    }
  };



  request.open('POST', '/projet/taste/add_taste_films.php');
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');



   var params = [
    "id=" + id,
    "genres=" + genres
  ];

  console.log(params);

  request.send(params.join('&'));

}



function add_tv_show_db(){
	var params = [];
 	var l = selected_tvs_id.length;

  	for (var i = 0; i<l; i++) {
	  	add_taste_tv_show(selected_tvs_id[i],selected_tvs_genres[i]);
	}


}





function add_taste_tv_show(id,genres){

	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	    if (request.readyState == 4){
	      console.log(request.responseText);
	    }
	  };



	  request.open('POST', '/projet/taste/add_taste_tv_show.php');
	  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');



	   var params = [
	    "id=" + id,
	    "genres=" + genres
	  ];

	  console.log(params);

	  request.send(params.join('&'));


}




function display_new_menu(element_id, new_display_id){

	var informations = document.getElementById('informations');
	var reviews = document.getElementById('reviews');
	var videos = document.getElementById('videos');
	var images = document.getElementById('images');
	var share = document.getElementById('share');


	informations.classList.remove("focused_menu");
	reviews.classList.remove("focused_menu");
	videos.classList.remove("focused_menu");
	images.classList.remove("focused_menu");
	share.classList.remove("focused_menu");


	var element_to_show = document.getElementById(element_id);


	element_to_show.classList.add("focused_menu");
	

	var informations = document.getElementById('movie_info');
	var reviews = document.getElementById('film_reviews');
	var videos = document.getElementById('film_videos');
	var images = document.getElementById('film_images');
	var share = document.getElementById('share_film');


	informations.style.display = "none";
	reviews.style.display = "none";
	videos.style.display = "none";
	images.style.display = "none";
	share.style.display = "none";



	var new_display_element = document.getElementById(new_display_id);

	new_display_element.style.display = "block";

}





function display_more_actors(nb_results){
	var div;
	for(var i = 5; i<nb_results; i++){
		div = document.getElementById('actor_' + i);


		div.style.display = "block";

		div.onclick = function onclick(event){ display_less_actors(nb_results);};
	}

	var button = document.getElementById('see_more_actors');
	button.style.display = "none";
	button = document.getElementById('see_less_actors');
	button.style.display = "block";

	var video = document.getElementById('trailer_videos');
	video.classList.add("more_actors_videos");
}

function display_less_actors(nb_results){
	var div;
	for(var i = 5; i<nb_results; i++){
		div = document.getElementById('actor_' + i);

		div.style.display = "none";
	}

	var button = document.getElementById('see_more_actors');
	button.style.display = "block";

	button = document.getElementById('see_less_actors');
	button.style.display = "none";

	var video = document.getElementById('trailer_videos');
	video.classList.remove("more_actors_videos");

}



/*

function displayReviewsTvShows(containerId){
	var request = new XMLHttpRequest();
  	request.onreadystatechange = function(){
    if (request.readyState == 4){
      var text = request.responseText;
      var users = JSON.parse(text);
      

     
      document.getElementById('reviews_container').innerHTML = "";
      users.forEach(changeStatePlane);

    }
  };
  request.open('POST', 'list_reviews_tv_show.php');
  request.send();


}

*/


