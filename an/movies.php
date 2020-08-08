
<html>
<link rel="shortcut icon" href="https://lh3.googleusercontent.com/JvGEk1co70dPGdrOzRfZHziLatREZqvcUO-L3mTPoroBCNcaZBRtFud36UObJgM74Wpe-sbBOtivbp3VaKmNoJubYCs7D16f4UzCrjaDLZA8vt28s61oSymBeoRmJZNn-jLSjyVwkg=w2400">

<head>

<!------ Include the above in your HEAD tag ---------->
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Download Movie 3D, 1080p, 720p Download<</title>
	   
	   <link rel="stylesheet" href="./movies/movies01.css">
	   <link rel="preload" href="1.jpg" as="image">
	   <script type="text/javascript" src="movies/extra.js"></script>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	   <!--to make language check inline --><style>div.inline { float:right; }.clearBoth { clear:both; }</style>
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--youtube in site preview for pc and mobile in app preview in mob devices -->
       <script type="text/javascript" src="movies/auto_suggest_jquery_ui.js"></script> <!-- auto suggest jquery ui  -->
       <script type="text/javascript" src="movies/script1.js"></script> <!-- get data with ajax requests  -->
       <script type="text/javascript" src="movies/youtube.js"></script> <!--youtube in site preview for pc and mobile in app preview in mob devices -->
       <script> $(document).ready(function() {   $("#noJS").hide();  });  
	   
	   
	   
	   
	   </script> <!-- Warning for JS disabled browser -->
	   <script src="//cdn.jsdelivr.net/g/lazysizes(lazysizes.min.js)" async=""></script>
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
<div class="redman789">
 
 <?php include 'header.php';?>	
<div class="navbar">
	<img src="https://lh3.googleusercontent.com/28la0t6WMk_gpA6FhpjnhhqoDASpjb911ZStlnmI21zyBXjbdO85Duu5XGTk3obhRR_FdXD2rrHJcCuGeqszwhuYLmTDe7XG1kk9t-r-3U8CCmg78SUSb3NaF088Yhk1_lYUOLA3eQ=w2400" alt="Logo" class-="logo" height=50 style="float: left;margin-top: 0px;margin-left: 10px;margin-right: 20px;"/>
  <a href="index.php"  >ENGINE</a>
  <a href="movies.php" class="active" >MOVIES</a>
  
  <a id="mc" href="movies.php?query_term=&quality=2160p&genre=all&rating=0&sort_by=date-added" style="font: normal 14px monospace;float: left;padding: 18px 5px;border: 0px solid #252525;margin-left: 10px;color: #fff;background: green;">4K Movies</a>



<script>
    var flag = false;
    setInterval(function() {
        flag = !flag;
        $("#mc").css("background", flag ? "white" : "green");
    }, 300);
</script>
</div>


 
 

 <div id="rounded">
         <div id="main" class="container">
              <?php $full_url = $_SERVER['REQUEST_URI']; $qurey_url = '?'.$_SERVER['QUERY_STRING']; $full_url1 = str_replace($qurey_url,'', $full_url); ?>			  
 <form action="">
 <div class="example">
	<input type="text" class="text" maxlength="9999999" name="query_term" id="query_term"  placeholder="Search Movies..." /><button><i class="fa fa-search" style="font-size:14px; color: #b1b1b1;"></i></button>
</div>


<br>


<div class="manmade0">
 <div id="rounded">
         <div id="main" class="container" >
              <?php $full_url = $_SERVER['REQUEST_URI']; $qurey_url = '?'.$_SERVER['QUERY_STRING']; $full_url1 = str_replace($qurey_url,'', $full_url); ?>
			
		  
		<div style="margin: 0px 0px 0px 0px; background: #fff;padding: 0px;"> 
		<div style="margin: 0px 0px 0px 1%; background: #fff;padding: 0px;"> 
			
			  <select class="classic" name="quality"><option value="<?php if(empty($quality)) {  echo "all";} else  { echo $quality; } ?>" selected="selected"><?php if(empty($quality)) {  echo "Quality";} else  { echo $quality; } ?> </option><option value="all">All</option> <option value="720p">720p</option> <option value="1080p">1080p</option> <option value="2160p">2160p</option>  <option value="3D">3D</option>  </select> <select class="classic" name="genre"> <option value="<?php if(empty($genre)) {  echo "all";} else  { echo $genre; } ?>" selected="selected"><?php if(empty($genre)) {  echo "Genre";} else  { echo $genre; } ?></option><option value="all">All</option> <option value="action">Action</option> <option value="adventure">Adventure</option> <option value="animation">Animation</option> <option value="biography">Biography</option> <option value="comedy">Comedy</option> <option value="crime">Crime</option> <option value="documentary">Documentary</option> <option value="drama">Drama</option> <option value="family">Family</option> <option value="fantasy">Fantasy</option> <option value="film-noir">Film-Noir</option> <option value="game-show">Game-Show</option> <option value="history">History</option> <option value="horror">Horror</option> <option value="music">Music</option> <option value="musical">Musical</option> <option value="mystery">Mystery</option> <option value="news">News</option> <option value="reality-tv">Reality-TV</option> <option value="romance">Romance</option> <option value="sci-fi">Sci-Fi</option> <option value="sport">Sport</option> <option value="talk-show">Talk-Show</option> <option value="thriller">Thriller</option> <option value="war">War</option> <option value="western">Western</option> </select> <select  class="classic" name="rating"> <option value="<?php if(empty($rating)) {  echo "0";} else  { print_r( $rating); } ?>" selected="selected"><?php if(empty($rating)) {  echo " Rating ";} else  { echo $rating; } ?></option> <option value="9">9+</option> <option value="8">8+</option> <option value="7">7+</option> <option value="6">6+</option> <option value="5">5+</option> <option value="4">4+</option> <option value="3">3+</option> <option value="2">2+</option> <option value="1">1+</option> </select> <select  class="classic" name="sort_by"> <option value="<?php if(empty($sort_by)) {  echo "date-added";} else  { echo $sort_by; } ?>" selected="selected"><?php if(empty($sort_by)) {  echo "Sort By";} else  { echo $sort_by; } ?></option><option value="date-added">Date Added</option> <option value="title">Title</option> <option value="year">Year</option> <option value="rating">Ratings</option> <option value="peers">Peers</option> <option value="seeds">Seeds</option> <option value="download_count">Download Count</option> <option value="like_count">Like Count</option> </select>
			  <button class="text2" type="submit">Filter</button>
		</div></div>

	</form>
	<div style="text-align:center;">
	<br>
	</div>
	
	
	    
	</form>		
	
	
	
	<br>

                  <?php   if (!empty($title1)) {
                          $countresults = sizeof($movies); $countresults = $countresults-1; // -1 because if loop is starting from zero 
                          for ($y = 0; $y <= $countresults; $y++) {
echo '<div class="column" id="pageContent">';
									   echo '
									   
									   
									   <div class="container02" id="container">
													<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.$image_url[$y].'" width="160" height="" class="lazyload">
													
											<div class="overlay02">
													<h1><br><span class="fa fa-star checked" style="font-size: 40px; color: #5da93c; opacity: 1;display: block;margin-left: auto; margin-right: auto;width: 40px;"></span></h1>
														<div class="column0071" style="padding:0px;">
															<div style="text-align: center; color: #fff; ">' .$imdb_rating[$y].' / 10</div>
														</div>
													<br><div class="text02">
														'.$genres1[$y].'
														<br>
														<ln><a href="#LANGUAGE'.$orignal_link_url[$y].'">Language</a></ln>'; echo '<div class="mad89900" id="#LANGUAGE'.$orignal_link_url[$y].'"></div>
													</div>
											</div>
									    </div>';
								

                                       echo '<div class="titleofmovie"><font>'.$title1[$y].'</font></div>
									   
										<div class="column007" style="">
												<div class="yearsman">'.$year[$y].'</div>
												
										</div>
										<div class="column00733" style="text-align: right;">
												<div style="text-align: right;">
												
												<a class="youtube" style="text-align: right;text-decoration: none;color: #7a7a7a;" href="https://www.youtube.com/embed/?listType=search&list='.$title1[$y].'"><i style="font-size:16px;color:red;display: inline;" class="fa">&#xf16a;</i> Trailer </a>
												
												</div>
										</div>
										
<div class="redme990">											

<div class="tooltip96"><i style="font-size:13px;color: #333;" class="fa fa-twitch"></i> Sub
  <span class="tooltiptext96">
  
  <ln><a href="#SUBs'.$imdb_code[$y].'"> Click to Load Subtitles</a></ln>
  <div id="#SUBs'.$imdb_code[$y].'"></div>
  
  </span>
</div>

<div class="tooltip97"><i style="font-size:13px;color: #333" class="fa fa-photo"></i> Img
  <span class="tooltiptext97">
  
  <ln><a id="lefti" href="#SCREENSHOTS'.$imdb_code[$y].'"> Click to Load Screenshots</a></ln>
  <div id="#SCREENSHOTS'.$imdb_code[$y].'"></div>
  
  </span>
</div>

<div class="tooltip98"><i style="font-size:13px;color: #333;" class="fa fa-address-card"></i> Details
  <span class="tooltiptext98">'.$synopsis1[$y].'</span>
</div>	
</div>										
										
										'; echo'<br/><p>'.$complete_torrent_info1[$y].'</p>';
										
									   
												
                                       
                                       $imns = $y+1; echo '&emsp;&emsp;'; 
                                          echo '<div id="#SCREENSHOTS'.$imdb_code[$y].'"></div>'; echo '<div id="#SUBs'.$imdb_code[$y].'"></div>'; echo '<div id=#ytlikes'.$yt_trailer_code1[$y].'></div></div>';
			  } } else { echo '<script>window.location.href = "search_engine.php?search='.$query_term.'";</script>' ; }
                  ?>
                   
			</div></div></div>
  <div class="clear"></div>
  <div id="mPlayer">  <div> </div>  </div> <!-- these divs for youtube popup and can be defined anywhere if there is problem in css then will display the video link in defined location -->
       </div>
       <script type="text/javascript" src="jquery.js"></script>
       <script type="text/javascript" src="auto.js"></script>
<!-- partial -->
  <script src='http://abvichico.com/js/simple-inheritance.min.js'></script>
<script src='http://abvichico.com/js/code-photoswipe-1.0.11.min.js'></script>
<script  src="./script2.js"></script>   
<div style="background-color: #f9f9f9;padding:1px;width: 100%;">
</div>
<BR><BR>
<div style="display: block;margin-left: auto;margin-right: auto;width: 310px;">
	   <a href="<?php echo $full_url1; ?>" class="home01">Home</a></le><le><a href="<?php $page3 = $page1 - 1; $prev_page = $full_url1.'?page='.$page3."&quality=".$quality."&genre=".$genre."&rating=".$rating."&sort_by=".$sort_by."&query_term=".$query_term; echo $prev_page ?>"  class="home01">&laquo; Previous Page </a></le><le><a href="<?php $page2 = $page1 + 1; $next_page = $full_url1.'?page='.$page2."&quality=".$quality."&genre=".$genre."&rating=".$rating."&sort_by=".$sort_by."&query_term=".$query_term;  echo $next_page ?>" class="home01"> Next Page &raquo;</a>
	   
</div>
<BR><BR>


	   
	  
	   
</div>
</div>
</div>
</div>
</div>
</div>
	   
 </body>
 

</html>

<style>
.center0099 {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 980px;
  max-width: 100%;
  overflow-x: hidden;
}
</style>
<img src="img/footer.png" class="center0099"/>	