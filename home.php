<?php include 'android.php';?>

<html>
<body>
	<head>
		<link rel="shortcut icon" href="https://lh3.googleusercontent.com/y_jYbITQCxQtLGkK6OW002b5vaCpOdm5z_VqoWZAwkca9UP7CJJqUoXGw7vbZkVBYnqLfLuwnmc8E6RboUc2vbFq4IbR9iAro14Q6hIa5kvjwoXqImTKywQptTQQYJ4tzW4pCsGiEg=w2400">
		<link rel="stylesheet" type="text/css" href="./home/style.css" /> 
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<title>Unfriday - Download movies, music, games, software!</title>
	</head>
	
	
<?php include 'ads.php';?>
<?php include 'bar.php';?>
<?php include 'google.comanalytics.php';?>



	<div class="header" id="myHeader">
		
		<a href="search_engine.php"><div class="engine"><i class="fa fa-viadeo" style="font-size:22px;"></i>&nbsp;&nbsp;&nbsp;Search Engine</div></a>
		<a href="movies.php"><div class="engine"><i class="fa fa-play" style="font-size:18px;"></i>&nbsp;&nbsp;&nbsp;Movies</div></a>
		<a href="suggestion.php?query_term=&quality=2160p&genre=all&rating=0&sort_by=date-added"><div class="engine"><i class="fa fa-gift" style="font-size:22px;"></i>&nbsp;&nbsp;&nbsp;Suggestion</div></a>
	</div>

<div class="content">
	<IFRAME style="margin: 0px;" SRC="new.php?query_term=2020&quality=all&genre=all&rating=0&sort_by=date-added" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=570px allowfullscreen></IFRAME>
	
	
<br><br><br><br>

<h1 style="display: inline; color: #fff;text-align: center;">Today's in Unfriday : </h1>

<a href="movies.php?query_term=&quality=all&genre=action&rating=6&sort_by=year" style="color: #fff; font-size: 20px; text-decorator: none;text-align: right; border: 1px solid #fff; padding: 10px;"> Watch all Si-Fi Movies</a>

<br><br><br><br>

<IFRAME style="margin: 0px;" SRC="new.php?query_term=&quality=all&genre=action&rating=6&sort_by=year" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=570px allowfullscreen></IFRAME>





</div>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>
</html>








<?php include 'footer.php';?>