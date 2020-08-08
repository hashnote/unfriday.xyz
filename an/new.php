<!DOCTYPE>
<html>
<link rel="shortcut icon" href="https://lh3.googleusercontent.com/dU2dhlNlFHn4t9vqfZIyT1x69YORa8hnSwyWk7j5kmrh_dSayQQ5KrU1BEWKPZGgDX998OdkHNtmj5RDZoeEdj5dfGAw3gqvrkGX-D45nJWJQPgeWveFdu0tRWGu97UtO-MT3JGVYA=w2400">

<head>
	<meta charset="UTF-8">

<!------ Include the above in your HEAD tag ---------->
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Unfriday - Movie 3D, 1080p, 720p Download<</title>
	   
	   <link rel="stylesheet" href="./new/movies.css">
	   <script type="text/javascript" src="movies/extra.js"></script>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	   <!--to make language check inline --><style>div.inline { float:right; }.clearBoth { clear:both; }</style>
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--youtube in site preview for pc and mobile in app preview in mob devices -->
       <script type="text/javascript" src="movies/auto_suggest_jquery_ui.js"></script> <!-- auto suggest jquery ui  -->
       <script type="text/javascript" src="movies/script1.js"></script> <!-- get data with ajax requests  -->
       <script type="text/javascript" src="movies/youtube.js"></script> <!--youtube in site preview for pc and mobile in app preview in mob devices -->
       <script> $(document).ready(function() {   $("#noJS").hide();  });  </script> <!-- Warning for JS disabled browser -->
</head>


  <?php
        //get input variables from user

        if (isset($_GET['page'])) { $pagea = $_GET["page"]; $page1 = $pagea; 	}     else { $page1 = 1;      }     
        if (isset($_GET['quality'])) { $quality = $_GET["quality"];	     	}     else { $quality = ""; 	 }     
        if (isset($_GET['genre']))   { $genre = $_GET["genre"];			}     else {	$genre = "";     }
        if (isset($_GET['rating']))  { $rating = $_GET["rating"];	 	}     else {	$rating = "";    }
        if (isset($_GET['sort_by'])) {	$sort_by = $_GET["sort_by"];  		}     else {	$sort_by = "";   }
        if (isset($_GET['query_term'])) {  $query_term = $_GET["query_term"]; $query_term = mb_strtolower($query_term); /*convert upper case to lower case*/ $query_term = urlencode($query_term); }   else { $query_term = "";	}
        
        
        
        // main code starts below
          $yts = new YTS();
          $movies = $yts->listMovies($quality, 20, $page1, $query_term, $rating, $genre, $sort_by); // All quality, limit etc
          //$movies = $yts->listMovies('All', 20, $page1); // All quality, limit 6
              //print_r($movies);
              class YTS
              	{
               	        const BASE_URL = 'https://yts.mx';
	                public
                	function listMovies(
                              $quality = 'All',        // $quality Used to filter by a given quality
                      	      $limit = 20,                                 // $limit The limit of results per page that has been set
                 	      $page = 0,                                   // $page Used to see the next page of movies, eg limit=15 and page=2 will show you movies 15-30
	                      $query_term = 0,                             // $query_term Used for movie search, matching on: Movie Title/IMDb Code, Actor Name/IMDb Code, Director Name/IMDb Code
                 	      $minimum_rating = 0,                         // $minimum_rating Used to filter movie by a given minimum IMDb rating
	                      $genre = '',                                 // $genre Used to filter by a given genre (See http://www.imdb.com/genre/ for full list)
                       	      $sort_by = 'date-added',                     // $sort_by Sorts the results by chosen value
	                      $order_by = 'desc',                          // $order_by Orders the results by either Ascending or Descending order
                       	      $with_rt_ratings = false                     // $with_rt_ratings Returns the list with the Rotten Tomatoes rating included
	                            )
		{
		              $baseUrl = self::BASE_URL . '/api/v2/list_movies.json';
		              $parameters = '?limit=' . $limit . '&page=' . $page . '&quality=' . $quality . '&minimum_rating=' . $minimum_rating . '&query_term=' . $query_term . '&genre=' . $genre . '&sort_by=' . $sort_by . '&order_by=' . $order_by . '&with_rt_ratings=' . $with_rt_ratings;
		              $data = $this->getFromApi($baseUrl . $parameters);
		              if ($data->movie_count == 0)
			              {
			              return false;
			              }
              		return isset($data->movies) ? $data->movies : [];
		 }
	                                          /* MovieDetail
	                                           * Returns the information about a specific movie
                                               	   * @param int $movie_id
                                          	   * @param bool $with_images
	                                           * @param bool $with_cast
	                                           * @return Object | bool false if no results
	                                           * @throws Exception thrown when HTTP request or API request fails */
	     public
        	function movieDetail($movie_id, $with_images = false, $with_cast = false)
		{
		              $baseUrl = self::BASE_URL . '/api/v2/movie_details.json';
		              $parameters = '?movie_id=' . $movie_id . '&with_images' . $with_images . '&with_cast=' . $with_cast;
                 	      $movieObj = $this->getFromApi($baseUrl . $parameters);
		              if (property_exists($movieObj, 'movie')) return $movieObj->movie;
		              return false;
		}
						/* MovieSuggestions
						 * Returns 4 related movies as suggestions for the user
						 * @param int $movie_id The ID of the movie
	 					 * @return array|bool array with movie objects
						 * @throws Exception thrown when HTTP request or API request fails */
            public
        	        	function movieSuggestions($movie_id)
		        	{
		        	     $baseUrl = self::BASE_URL . '/api/v2/movie_suggestions.json?movie_id=' . $movie_id;
		        	     $data = $this->getFromApi($baseUrl);
		        	     if ($data->movie_suggestions_count == 0){ return false; }
                                        return isset($data->movie_suggestions) ? $data->movie_suggestions : [];
		                 }
	        	        	        /* MovieComments
        	        	        	 * Returns all the comments for the specified movie
        	        	        	 * @param $movie_id
	         	        	         * @return array|bool array with comments objects
        	        	        	 * @throws Exception thrown when HTTP request or API request fails */
	   public
          	        	function movieComments($movie_id)
		        	{
		        	        	$baseUrl = self::BASE_URL . '/api/v2/movie_comments.json?movie_id=' . $movie_id;
        	        			$data = $this->getFromApi($baseUrl);
        	        			if ($data->comment_count == 0)	{ return false; }
        	        			return isset($data->comments) ? $data->comments : [];
        			}

	
	        	        	/* MovieReviews
	        	        	 * Returns all the parental guide ratings for the specified movie
	        	        	 * @param $movie_id
	        	        	 * @return array|bool array with review objects
        	        		 * @throws Exception thrown when HTTP request or API request fails */
           public
        	        	function movieReviews($movie_id)
		        	{
        	        			$baseUrl = self::BASE_URL . '/api/v2/movie_reviews.json?movie_id=' . $movie_id;
		        	        	$data = $this->getFromApi($baseUrl);
		        	        	if ($data->review_count == 0)	{ return false;	}
        	        			return isset($data->reviews) ? $data->reviews : [];
		        	}
	        	        	        	/* MovieParentalGuides
               	        	        		 * Returns all the parental guide ratings for the specified movie
        	        	        		 * @param $movie_id
	        	        	        	 * @return array|bool array with parental guide objects
        	        	        		 * @throws Exception thrown when HTTP request or API request fails */
           public
        	        	function movieParentalGuides($movie_id)
        			{
        	        			$baseUrl = self::BASE_URL . '/api/v2/movie_parental_guides.json?movie_id=' . $movie_id;
        	        			$data = $this->getFromApi($baseUrl);
        	        			if ($data->parental_guide_count == 0)	{ 	return false; 		}
		        	        	return isset($data->parental_guides) ? $data->parental_guides : [];
		        	}
          	        	        		/* List Upcoming
	         	        	        	 * Returns the 4 latest upcoming movies
        	        	        		 * @return array|bool array with movie objects
        	        	        		 * @throws Exception thrown when HTTP request or API request fails */
	  public
        	        	function listUpcoming()
        			{
        	        			$baseUrl = self::BASE_URL . '/api/v2/list_upcoming.json';
        	        			$data = $this->getFromApi($baseUrl);
        	        			if ($data->upcoming_movies_count == 0)	{ 	return false; 	}
        	        			return isset($data->upcoming_movies) ? $data->upcoming_movies : [];
        			}
	
							/* GetFromApi
							 * Does the requests to the yts api
       							 * @param string $url the url that will be called
						         * @return mixed $data object with the data from the API
					         	 * @throws Exception thrown when HTTP request or API request fails */
	private
	    			function getFromApi($url)
				{
						if (!$data = file_get_contents($url)){
									$error = error_get_last();
									throw new Exception("HTTP request failed. Error was: " . $error['message']);
										      }
	                     			else {
							$data = json_decode($data);
							if ($data->status != 'ok') {  throw new Exception("API request failed. Error was: " . $data->status_message); 	}
		  			                return $data->data;
				}
		}
	}
?>
<!-- Above code is just for API nothing will be displayed by above api code
below code is used to display what you want -->
<?php
  if ($movies)
	{
	foreach($movies as $movie)
		{
		$title1[] = $movie->title ;                   // Movie title from api
                $rating1[] = $movie->rating;
                /*$genres1[] = implode(",",$movie->genres);*/$check_geners_existance =count($movie->genres);   if ( $check_geners_existance !== 0 ) { $genres1[] = implode(" | ",$movie->genres); } else { $genres1[] = "Empty"; }
                $image_url[] = $movie->medium_cover_image;
                $orignal_link_url[] = $movie->url;
                $synopsis1[] = $movie->synopsis;
                $imdb_code[] = $movie->imdb_code;
                $imdb_rating[] = $movie->rating;
                $year[] = $movie->year;
                $language1[] = $movie->language;
                $yt_trailer_code1[] = $movie->yt_trailer_code;
                $torrents_counts = count($movie->torrents);

                /*        $url= "https://www.imdb.com/title/".$imdb_code."/mediaindex"; $ch = curl_init ($url);curl_setopt($ch, CURLOPT_HEADER, 0); curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla'); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_BINARYTRANSFER,1); $rawdata=curl_exec($ch); curl_close ($ch); $re = '/ <link rel=\'image_src\' href="(.*?)">/m'; preg_match_all($re, $rawdata, $matches, PREG_SET_ORDER, 0);
                echo '<img src="'. $matches[0][1]. '" alt="Broken-image" style="width:150px;height:200px;"><br>'; */
	        	$torrent[] = $movie->torrents[0];
                $torrenta = $movie->torrents[0];                             // First torrent
                $torrents_counts11 = $torrents_counts - 1; //echo $torrents_counts11;
                for ($x = 0; $x <= $torrents_counts11; $x++) {
	        	    $torrent1111[$x] = 'magnet:?xt=urn:btih:'.$movie->torrents[$x]->hash;
	        	    $quality1111[$x] = $movie->torrents[$x]->quality;
	        	    $size1111[$x]    = $movie->torrents[$x]->size;
	        	    $complete_torrent_info_test[$x] ='<div class="oneline01" style=""><a href="'.$torrent1111[$x].'" class="atagunderline"><div class="linktorrent01">'.$quality1111[$x].'<span class="tooltiptext">'.$size1111[$x].'</span></div></a></div>
					
					';
	        	}
	        	$complete_torrent_info1[] = implode(" ",$complete_torrent_info_test);
 	        	$magnet_link1[] = 'magnet:?xt=urn:btih:' . $torrenta->hash;
                $size1[] = $torrenta->size;
 		//echo '<a href="' . $torrent->url . '">' . $torrent->url . '</a> (' . $torrent->size . ')<br/>'; // Torrent url and size
 }
	}
?>
 <body>
 <div style="background: #171a21;">
	

                  <?php   if (!empty($title1)) {
                          $countresults = sizeof($movies); $countresults = $countresults-1; // -1 because if loop is starting from zero 
                          for ($y = 0; $y <= $countresults; $y++) {
echo '

<!-- partial:index.partial.html -->
<i  id="Gallery" style="align: inline;">
  <div class="gallery-item" align="left">
    <small><img src="'.$image_url[$y].'" alt=""/>
											<div class="overlay02">
												<div class="text02">'.$genres1[$y].'</div>
											</div>
		<div class="top01-left"><span class="fa fa-star checked" style="padding: 0px 0px 0px 0px; color: #f1f1f1; font-size: 11px; opacity: 1;"></span> '.$imdb_rating[$y].'</div>
	<div class="title1" style="">'.$title1[$y].'<br>
		<div class="years"> '.$year[$y].'</div><a class="youtube" style="padding: 10px 0px 0px 49%;text-align: right;text-decoration: none;color: #7a7a7a;" href="https://www.youtube.com/embed/?listType=search&list='.$title1[$y].'"><i style="text-align: right;font-size:.90em;color:red; " class="fa">&#xf16a;<div class="Trailer"> Trailer</div></i></a><br><br>'.$complete_torrent_info1[$y].'</div></small>
			<br><br><br><br><br><br><br><br>
  </i>
';
									   
                                       $imns = $y+1; echo '&emsp;&emsp;'; 
                                          echo '<div id="#SCREENSHOTS'.$imdb_code[$y].'"></div>'; echo '<div id="#SUBs'.$imdb_code[$y].'"></div>'; echo '<div id=#ytlikes'.$yt_trailer_code1[$y].'></div></div>';
			  } } else { echo '&emsp;<br><br><br><br><div class="goinse"><a target="_blank" href="search_engine.php?search='.$query_term.'">
			  GO on in Search Engine</a></div>&emsp;&emsp;' ; }
                  ?>
                   
			</div><br><br><br><br><br>
			
        </div>
  <div class="clear"></div>
  <div id="mPlayer">  <div> </div>  </div> <!-- these divs for youtube popup and can be defined anywhere if there is problem in css then will display the video link in defined location -->
       </div>
       <script type="text/javascript" src="jquery.js"></script>
       <script type="text/javascript" src="auto.js"></script>
<!-- partial -->
  <script src='http://abvichico.com/js/simple-inheritance.min.js'></script>
<script src='http://abvichico.com/js/code-photoswipe-1.0.11.min.js'></script>
<script  src="./script2.js"></script>   


	   
	  
	   

	   
 </body>
 

</html>































