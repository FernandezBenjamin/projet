<?php
	session_start();
	require "../conf.inc.php";
	require "../functions.php";

	if( isConnected() ){
		if( isFirstConnection() ) {
			include "header_first_connection.php";

			$counter = 0;
			$nb_affiche = 0;
			$nb_films = 0;

			$curl = curl_init();

			curl_setopt_array($curl, [
			  CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?page=1&language=$lang&api_key=$client_id",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_SSL_VERIFYPEER => false,
			  CURLOPT_SSL_VERIFYHOST => 0,
			]);

			$films = json_decode(curl_exec($curl));
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				?>
				
				<section class="films_choice">
					  <div class="container-fluid">
					    <div class="container">
					      <div class="row">
					      	<div class="col-md-12">
									<h2 align="center">Bienvenue <?php echo $_SESSION['pseudo']; ?>, sélectionnez les titres que vous aimez.</h2>
									<h3 align="center">Veuillez sélectionner au moins 2 films et 2 Séries que vous aimez</h3>
									<br>
									<br>
								<div id="movie_page_1" class="choice_content" style="display:block;" align="center">
									<h3>Films Populaire : </h3>
									<br>
									<?php
									foreach ($films->results as $film) {
										$counter++;
										
										$stringJs =  '';
	 
										for($i = 0 , $l = count($film->genre_ids);$i < $l ; $i++){
											if($stringJs != ''){
												$stringJs  .= ',';
											}
										 
											$stringJs  .=  ''. $film->genre_ids[$i].'';
										}
		
										if ($nb_affiche < 4){
											$nb_affiche++;
											
											
						                   	
												$nb_films++;
												echo "<div id='film_1_$nb_films' class='image_choice_films' style='display:block;' onclick='select_film(\"$film->id\",\"$stringJs\",\"1\",\"$nb_films\",\"film_selected_1_$nb_films\")'>
						                        	<img id='$film->id' src='https://image.tmdb.org/t/p/w185$film->poster_path'>
						                        	<span id='film_selected_1_$nb_films' class='thumbs_up_selected' style='display:none'>
						                        		<img src='/projet/images/thumbs-up.png'/>
						                        	</span>
						                        	<span class='thumbs_up'>
						                        		<img src='/projet/images/thumbs_up_white.png'/>
						                        	</span>
						                      	</div>";
										} else {
												$nb_films++;
												echo "<div id='film_1_$nb_films' class='image_choice_films'  style=\"display:none; \" onclick='select_film(\"$film->id\",\"$stringJs\",\"1\",\"$nb_films\",\"film_selected_1_$nb_films\")'>
						                        	<img id='$film->id' src='https://image.tmdb.org/t/p/w185$film->poster_path'>
						                        	<span id='film_selected_1_$nb_films' class='thumbs_up_selected' style='display:none'>
						                        		<img src='/projet/images/thumbs-up.png'/>
						                        	</span>
						                        	<span class='thumbs_up'>
						                        		<img src='/projet/images/thumbs_up_white.png'/>
						                        	</span>
						                      	</div>";
											
										}

										$tabindex=round($counter/4);
										if ($counter%4 == 0 && $nb_affiche == 4 && $tabindex == 1){
							                	
												echo "<button id='more_movie_button_1_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:inline-block;\" onclick='show_other_film(\"$tabindex\",\"1\")'>
														EN VOIR PLUS
													</button>";
										} else {
											if ($nb_affiche == 4 && $counter%4 == 0){
												echo "<button id='more_movie_button_1_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:none;\" onclick='show_other_film(\"$tabindex\",\"1\")'>
														EN VOIR PLUS
													</button>";
											}
										}
										
						                
									}

									?>


									</div>

									<div id="movie_page_2" class="choice_content" style="display:none;" align="center">
										<?php
										$counter = 0;
										$nb_affiche = 0;
										$nb_films = 0;

										$curl = curl_init();

										curl_setopt_array($curl, [
										  CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?page=2&language=$lang&api_key=$client_id",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "GET",
										  CURLOPT_SSL_VERIFYPEER => false,
										  CURLOPT_SSL_VERIFYHOST => 0,
										]);

										$films2 = json_decode(curl_exec($curl));
										$err = curl_error($curl);

										curl_close($curl);

										if ($err) {
										  echo "cURL Error #:" . $err;
										} else {
											foreach ($films2->results as $film2) {
												$counter++;

												$stringJs =  '';
	 
												for($i = 0 , $l = count($film->genre_ids);$i < $l ; $i++){
													if($stringJs != ''){
														$stringJs  .= ',';
													}
												 
													$stringJs  .=  ''. $film->genre_ids[$i].'';
												}




												if ($nb_affiche < 4){
													$nb_affiche++;
													
													
								                   	
														$nb_films++;
														echo "<div id='film_2_$nb_films' class='image_choice_films' style='display:block;' onclick='select_film(\"$film2->id\",\"$stringJs\",\"2\",\"$nb_films\",\"film_selected_2_$nb_films\")'>
								                        <img id='$film2->id' src='https://image.tmdb.org/t/p/w185$film2->poster_path'>
								                        <span id='film_selected_2_$nb_films' class='thumbs_up_selected' style='display:none'>
							                        		<img src='/projet/images/thumbs-up.png'/>
							                        	</span>
							                        	<span class='thumbs_up'>
							                        		<img src='/projet/images/thumbs_up_white.png'/>
							                        	</span>
								                      </div>";
												} else {
														$nb_films++;
														echo "<div id='film_2_$nb_films' class='image_choice_films'  style=\"display:none; \" onclick='select_film(\"$film2->id\",\"$stringJs\",\"2\",\"$nb_films\",\"film_selected_2_$nb_films\")'>
								                        <img id='$film2->id' src='https://image.tmdb.org/t/p/w185$film2->poster_path'>
								                        <span id='film_selected_2_$nb_films' class='thumbs_up_selected' style='display:none'>
							                        		<img src='/projet/images/thumbs-up.png'/>
							                        	</span>
							                        	<span class='thumbs_up'>
							                        		<img src='/projet/images/thumbs_up_white.png'/>
							                        	</span>
								                      </div>";
													
												}

												$tabindex=round($counter/4);
												if ($counter%4 == 0 && $nb_affiche == 4 && $tabindex == 1){
									                	
														echo "<button id='more_movie_button_2_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:inline-block;\" onclick='show_other_film(\"$tabindex\",\"2\")'>
																EN VOIR PLUS
															</button>";
												} else {
													if ($nb_affiche == 4 && $counter%4 == 0){
														echo "<button id='more_movie_button_2_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:none;\" onclick='show_other_film(\"$tabindex\",\"2\")'>
																EN VOIR PLUS
															</button>";
													}
												}




								                
											}
										}
								
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

			<?php

		}
		
			$counter = 0;
			$nb_affiche = 0;
			$nb_tvs = 0;

			$curl = curl_init();

			curl_setopt_array($curl, [
			  CURLOPT_URL => "https://api.themoviedb.org/3/tv/popular?page=1&language=$lang&api_key=$client_id",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_SSL_VERIFYPEER => false,
			  CURLOPT_SSL_VERIFYHOST => 0,
			]);

			$response = json_decode(curl_exec($curl));
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				?>

				<section class="tvs_choice">
					  <div class="container-fluid">
					    <div class="container">
					      <div class="row">
					      	<div class="col-md-12">
									
									<br>
									<br>
								<div id="tv_page_1" class="choice_content" style="display: block;" align="center">
									<h3>Séries Populaire : </h3>
									<br>
									<?php
									foreach ($response->results as $tv) {
										$counter++;
										
										$stringJs =  '';
	 
										for($i = 0 , $l = count($tv->genre_ids);$i < $l ; $i++){
											if($stringJs != ''){
												$stringJs  .= ',';
											}
										 
											$stringJs  .=  ''. $tv->genre_ids[$i].'';
										}
		
										if ($nb_affiche < 4){
											$nb_affiche++;
											
											
						                   	
												$nb_tvs++;
												echo "<div id='tv_show_1_$nb_tvs' class='image_choice_films' style='display:inline-block;' onclick='select_tv(\"$tv->id\",\"$stringJs\",\"1\",\"$nb_tvs\",\"tv_show_selected_1_$nb_tvs\")'>
						                        	<img id='$tv->id' src='https://image.tmdb.org/t/p/w185$tv->poster_path'>
						                        	<span id='tv_show_selected_1_$nb_tvs' class='thumbs_up_selected_tv' style='display:none'>
						                        		<img src='/projet/images/thumbs-up.png'/>
						                        	</span>
						                        	<span class='thumbs_up'>
						                        		<img src='/projet/images/thumbs_up_white.png'/>
						                        	</span>
						                      	</div>";
										} else {
												$nb_tvs++;
												echo "<div id='tv_show_1_$nb_tvs' class='image_choice_films'  style=\"display:none; \" onclick='select_tv(\"$tv->id\",\"$stringJs\",\"1\",\"$nb_tvs\",\"tv_show_selected_1_$nb_tvs\")'>
						                        	<img id='$tv->id' src='https://image.tmdb.org/t/p/w185$tv->poster_path'>
						                        	<span id='tv_show_selected_1_$nb_tvs' class='thumbs_up_selected_tv' style='display:none'>
						                        		<img src='/projet/images/thumbs-up.png'/>
						                        	</span>
						                        	<span class='thumbs_up'>
						                        		<img src='/projet/images/thumbs_up_white.png'/>
						                        	</span>
						                      	</div>";
											
										}

										$tabindex=round($counter/4);
										if ($counter%4 == 0 && $nb_affiche == 4 && $tabindex == 1){
							                	
												echo "<button id='more_tv_button_1_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:inline-block;\" onclick='show_other_tv_show(\"$tabindex\",\"1\")'>
														EN VOIR PLUS
													</button>";
										} else {
											if ($nb_affiche == 4 && $counter%4 == 0){
												echo "<button id='more_tv_button_1_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:none;\" onclick='show_other_tv_show(\"$tabindex\",\"1\")'>
														EN VOIR PLUS
													</button>";
											}
										}
										
						                
									}

									?>


									</div>

									<div id="tv_page_2" class="choice_content" style="display: none;" align="center">
										<?php
										$counter = 0;
										$nb_affiche = 0;
										$nb_tvs = 0;

										$curl = curl_init();

										curl_setopt_array($curl, [
										  CURLOPT_URL => "https://api.themoviedb.org/3/tv/popular?page=2&language=$lang&api_key=$client_id",
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 30,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => "GET",
										  CURLOPT_SSL_VERIFYPEER => false,
										  CURLOPT_SSL_VERIFYHOST => 0,
										]);

										$response2 = json_decode(curl_exec($curl));
										$err = curl_error($curl);

										curl_close($curl);

										if ($err) {
										  echo "cURL Error #:" . $err;
										} else {
											foreach ($response2->results as $tv2) {
												$counter++;

												$stringJs =  '';
	 
												for($i = 0 , $l = count($tv2->genre_ids);$i < $l ; $i++){
													if($stringJs != ''){
														$stringJs  .= ',';
													}
												 
													$stringJs  .=  ''. $tv2->genre_ids[$i].'';
												}




												if ($nb_affiche < 4){
													$nb_affiche++;
													
													
								                   	
														$nb_tvs++;
														echo "<div id='tv_show_2_$nb_tvs' class='image_choice_films' style='display:inline-block;' onclick='select_tv(\"$tv2->id\",\"$stringJs\",\"2\",\"$nb_tvs\",\"tv_show_selected_2_$nb_tvs\")'>
								                        <img id='$tv2->id' src='https://image.tmdb.org/t/p/w185$tv2->poster_path'>
								                        <span id='tv_show_selected_2_$nb_tvs' class='thumbs_up_selected_tv' style='display:none'>
							                        		<img src='/projet/images/thumbs-up.png'/>
							                        	</span>
							                        	<span class='thumbs_up'>
							                        		<img src='/projet/images/thumbs_up_white.png'/>
							                        	</span>
								                      </div>";
												} else {
														$nb_tvs++;
														echo "<div id='tv_show_2_$nb_tvs' class='image_choice_films'  style=\"display:none; \" onclick='select_tv(\"$tv2->id\",\"$stringJs\",\"2\",\"$nb_tvs\",\"tv_show_selected_2_$nb_tvs\")'>
								                        <img id='$tv2->id' src='https://image.tmdb.org/t/p/w185$tv2->poster_path'>
								                        <span id='tv_show_selected_2_$nb_tvs' class='thumbs_up_selected_tv' style='display:none'>
							                        		<img src='/projet/images/thumbs-up.png'/>
							                        	</span>
							                        	<span class='thumbs_up'>
							                        		<img src='/projet/images/thumbs_up_white.png'/>
							                        	</span>
								                      </div>";
													
												}

												$tabindex=round($counter/4);
												if ($counter%4 == 0 && $nb_affiche == 4 && $tabindex == 1){
									                	
														echo "<button id='more_tv_button_2_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:inline-block;\" onclick='show_other_tv_show(\"$tabindex\",\"2\")'>
																EN VOIR PLUS
															</button>";
												} else {
													if ($nb_affiche == 4 && $counter%4 == 0){
														echo "<button id='more_tv_button_2_$tabindex' tabindex=\"$tabindex\" class=\"more-button\" style=\"display:none;\" onclick='show_other_tv_show(\"$tabindex\",\"2\")'>
																EN VOIR PLUS
															</button>";
													}
												}




								                
											}
										}
								
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<?php

			}



			include "footer_first_connection.php";
		} else {
			header('Location: ../index.php');
		}
	} else {
		header('Location: ../index.php');
	}

