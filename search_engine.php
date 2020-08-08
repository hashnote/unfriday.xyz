<?php include 'android.php';?>


<?php
    /***************   some Universal Constants here        **********************/
   /*************/     $script_name = " ";         /********************/
  /*************/      $site_name = "";         /*******************/
 /*************/       $site_link = $_SERVER['SERVER_NAME'];  /******************/
/**************        END OF UNIVERSAL CONSTANTS           ******************/
//$search     = $_POST["search"];
//$whomtosents    = $whomtosent;
?>
<html>

	<head>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link rel="shortcut icon" href="https://lh3.googleusercontent.com/JvGEk1co70dPGdrOzRfZHziLatREZqvcUO-L3mTPoroBCNcaZBRtFud36UObJgM74Wpe-sbBOtivbp3VaKmNoJubYCs7D16f4UzCrjaDLZA8vt28s61oSymBeoRmJZNn-jLSjyVwkg=w2400">
		<link rel="stylesheet" href="./search_engine/home.css">
		<title>Download  movies, music, games, software!</title>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	</head>

	
<body>
<style>


.main88 {
  margin-right: 40px; /* Same as the width of the sidenav */
  padding: 0px 0px;
}

.container88 {
  position: relative;
  text-align: center;
  color: white;
}
.bottom-right88 {
  position: absolute;
  bottom: 0px;
  right: 0px;
}
</style>
<?php include 'header.php';?>
<div class="navbar">
<img src="https://lh3.googleusercontent.com/3DjCjHYxfzuoLaSmnf2ep9Rd4BjTqSXfBagZe810i8IIsGz1eSPNGp-r6V1pU6a42g_s4ETCZZEvEo8MvUI0yZ2kUg9iOGDmMp1JOBKdABonmjq_rwwnN4oZRmQGLXR4_-hSKY2cpA=w2400" alt="Logo" class-="logo" height=50 style="float: left;margin-top: 0px;margin-left: 10px;margin-right: 20px;">
  <a href="index.php" class="active" >ENGINE</a>
  <a href="movies.php">MOVIES</a>
  <a href="madscientist.php" target="blank" class="mad0012" >Join the MadScientist</a>
</div>
<br><br><br><br>
		
                <font color="red" size="5"><strong><b> <?php echo $script_name ?> </b></strong></font><br>
				<div class="header02">
					<p class="enginecolor">Engine</p>
					<form class="example" action="?">
						<button><i class="fa fa-search" style="font-size:14px; color: #b1b1b1;"></i></button><input type="text" class="text"  pattern=".{3,}" onfocus="this.placeholder = ''" name="search" placeholder="Search movies,tv-shows,anime,documentary etc..." onblur="this.placeholder = 'Search movies,tv-shows,anime,documentary etc...'" />
					</form>
					
  <!--for next page and backpage -->
  
					
				</div>
				
                <center>
					<font class="heading"><strong><font color="red" size="5"><a href="<?php echo $site_link?>" style="text-decoration:none">  <?php echo $site_name ?>  </a></font><br>
						</font></strong>
				</center>




 <?php 
            if (isset($_GET['page'])) { $pagea  = $_GET["page"];
            if (!empty($pagea)) { $page1 = $pagea; } 
            else{ $page1 = 1; } }
            else{ $page1 = 1; }
 
 ?>
  <!--for for showing search results -->
<?php

    if (isset($_GET['search'])) { $search  = $_GET["search"];
    $url = "https://1337x.to/search/".$search."/".$page1."/";
    $raw = file_get_contents($url);
    //echo $raw;
    $table_making = '
	<table border="0" align="center">
		<th class="name"><div class="date02"><br> Name <br><br></div></th>
		<th class="seeds"><div class="date02">&nbsp;&nbsp;Seeds&nbsp;&nbsp;</div></th>
		<th class="leeches"><div class="date02">&nbsp;&nbsp;Leeches&nbsp;&nbsp;</div></th>
		<th class="dateadded"><div class="date02">&nbsp;&nbsp;Dateadded&nbsp;&nbsp;</div></th>
		<th class="size"><div class="date02">&nbsp;&nbsp;Filesize&nbsp;&nbsp;</div></th>
		<th style="font-size: 0px;color: #fff;"><div class="date02" > Uploader </div></th>';
    echo $table_making;
    $re = '/<tbody>(.*?)<\/tbody>/ms';
    preg_match_all($re, $raw, $matches, PREG_SET_ORDER, 0);
    // echo $matches[0][1];
    //$result = str_replace('</tr>','</tr><br>',$matches[0][1]);
    $re01 = '/<i class="flaticon-message"><\/i>.*?<\/span>/m';
    $re02 = '/<span class="seeds">.*?<\/span>/m';
    $result = @str_replace('<a href="/torrent/','<a href="magnet_link.php?link=',$matches[0][1]);
    $result = preg_replace($re02, '', $result);
    $result = preg_replace($re01, '', $result);
    echo $result;
	
    }
 ?>
 

		
		
		
<div class="footerman">
	<?php $full_url = $_SERVER['REQUEST_URI']; $qurey_url = '?'.$_SERVER['QUERY_STRING']; $full_url1 = str_replace($qurey_url,'', $full_url); ?>
	<div class="footer01">
		<a href="<?php $page3 = $page1 - 1; $prev_page = $full_url1.'?search='.$search.'&page='.$page3; echo $prev_page ?>">&#8249; &#8249; Previous Page</a>
	</div>
	<div class="footer02">
		<a href="<?php $page2 = $page1 + 1; $next_page = $full_url1.'?search='.$search.'&page='.$page2;  echo $next_page ?>">Next Page &#8250; &#8250;</a>
		
	</div>
</div>
<br><br> <br>
		
		
		

</body>

