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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://lh3.googleusercontent.com/JvGEk1co70dPGdrOzRfZHziLatREZqvcUO-L3mTPoroBCNcaZBRtFud36UObJgM74Wpe-sbBOtivbp3VaKmNoJubYCs7D16f4UzCrjaDLZA8vt28s61oSymBeoRmJZNn-jLSjyVwkg=w2400">
	  <link rel="stylesheet" href="./search_engine/home.css">
	  <title>Download music, movies, games, software!</title>
	  
	  <script type="text/javascript" src="search_engine/extra.js"></script>
	   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</head>
<body>
<div class="redman789">
<?php include 'header.php';?>	
<div class="navbar">
	<img src="https://lh3.googleusercontent.com/28la0t6WMk_gpA6FhpjnhhqoDASpjb911ZStlnmI21zyBXjbdO85Duu5XGTk3obhRR_FdXD2rrHJcCuGeqszwhuYLmTDe7XG1kk9t-r-3U8CCmg78SUSb3NaF088Yhk1_lYUOLA3eQ=w2400" alt="Logo" class-="logo" height=50 style="float: left;margin-top: 0px;margin-left: 10px;margin-right: 20px;"/>
  <a href="index.php" class="active" >ENGINE</a>
  <a href="movies.php" >MOVIES</a>
</div>
 
 
		<div style="text-align: center; margin-top: 57px; font-size: 11px;">
		
		
                <font color="red" size="5"><strong><b> <?php echo $script_name ?> </b></strong></font><br>
				<div style="">
                <form class="example" action="?" style="">
					<input type="text" class="text"  pattern=".{3,}" name="search" placeholder="Search..."><button style=""><i class="fa fa-search" style="font-size:14px; color: #b1b1b1;"></i></button>
				</form>
				</div>
                       <center><font class="heading"><strong><font color="red" size="5"><a href="<?php echo $site_link?>" style="text-decoration:none">  <?php echo $site_name ?>  </a></font><br>
						</font></strong></center>




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
	<table border="0" cellspacing="0" cellpadding="0" align="center">
		<th class="name" ><div class="date02"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br></div></th>
		<th class="seeds"><div class="date02">Seeds&nbsp;&nbsp;</div></th>
		<th class="leeches"><div class="date02">Leeches&nbsp;</div></th>
		<th class="dateadded"><div class="date02"> &nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;</div></th>
		<th class="size"><div class="date02">Size</div></th>
		<th style="font-size: 0.000000000000000000000000001px;"><div class="date02"></div></th>';
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
 
 <!--for next page and backpage -->
<div class="footer">
	<?php $full_url = $_SERVER['REQUEST_URI']; $qurey_url = '?'.$_SERVER['QUERY_STRING']; $full_url1 = str_replace($qurey_url,'', $full_url); ?>
	<div class="footer01" style="">
		<a href="<?php $page3 = $page1 - 1; $prev_page = $full_url1.'?search='.$search.'&page='.$page3; echo $prev_page ?>">Previous Page</a>
	</div>
	<div class="footer02" style="">
		<a href="<?php $page2 = $page1 + 1; $next_page = $full_url1.'?search='.$search.'&page='.$page2;  echo $next_page ?>">Next Page</a>
		
	</div>
</div><br><br><br>
</div>
</body>




