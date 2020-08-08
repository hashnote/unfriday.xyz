
<html>
<link rel="shortcut icon" href="https://lh3.googleusercontent.com/JvGEk1co70dPGdrOzRfZHziLatREZqvcUO-L3mTPoroBCNcaZBRtFud36UObJgM74Wpe-sbBOtivbp3VaKmNoJubYCs7D16f4UzCrjaDLZA8vt28s61oSymBeoRmJZNn-jLSjyVwkg=w2400">
<?php include 'ads.php';?>	

<script>
window.onload = function(){
  document.getElementById("submit").click();
}
</script>


<head>
	<title>Download music, movies, games, software!</title>
	<link rel="stylesheet" href="./search_engine/pagecss2.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<html>
<body>
<?php include 'header.php';?>
<div class="navbar">
<img src="https://lh3.googleusercontent.com/3DjCjHYxfzuoLaSmnf2ep9Rd4BjTqSXfBagZe810i8IIsGz1eSPNGp-r6V1pU6a42g_s4ETCZZEvEo8MvUI0yZ2kUg9iOGDmMp1JOBKdABonmjq_rwwnN4oZRmQGLXR4_-hSKY2cpA=w2400" alt="Logo" class-="logo" height=50 style="float: left;margin-top: 0px;margin-left: 10px;margin-right: 20px;">
  <a href="index.php" class="active" >ENGINE</a>
  <a href="movies.php">MOVIES</a>
  <a href="madscientist.php" target="blank" class="mad0012" >Join the MadScientist</a>
</div>
<br><br><br><br>

				

	<b>
	<div class="redman">

		<?php

		/**********get main data except ads**************/
        $link_for_magnet = $_GET["link"];
        $url = 'https://1337x.to/torrent/'.$link_for_magnet;
        $raw = file_get_contents($url);     

        $re = '/<div class="tab-content">(.*?)<div role="tabpanel" class="tab-pane" id="comments">/ms';
        preg_match_all($re, $raw, $matches);
        $matched_data = $matches[1][0];
		
		/***************magnet link data get and display *********************/
         
                $re2 = $re = '/magnet:\?xt=urn:btih:(.*?)"/sm';
                preg_match_all($re2, $raw, $magnet);
                $magnet_link = "magnet:?xt=urn:btih:".$magnet[1][0];
                            //echo $magnet_link;
				echo '
				
				
			<div class="magnet">
				
				<div class="header02">
					<p class="enginecolor">Engine</p>
					<form class="example" action="search_engine.php?search=">
						<button><i class="fa fa-search" style="font-size:14px; color: #b1b1b1;"></i></button><input type="text" class="text"  pattern=".{3,}" name="search" placeholder="Search movies,tv-shows,anime,documentary etc...">
					</form>
			</div>
			</div>
				


				
				
						<div id="magnet2torrent">
							<form>
								<textarea type="text" id="magnet" name="magnet" class="span6" placeholder="'.$magnet_link.'">'.$magnet_link.'</textarea>
								<input type="button" class="aaaaammmmm" id="submit" name="submit" value="submit" />
							</form>
							<div class="linkman">
							<a href="'.$magnet_link.'"><p class="magnetdownload">MAGNET DOWNLOAD</p><img src="magnet.png" class="magnetimg"/></a>
								<div style="display: block;width: 1000px;border-bottom: 1px solid #161616;height: 55px;">
									<b class="name00">Details : </b><br>
									<b class="name01">'.$link_for_magnet.'</b>
								</div>
							<div  class="info"></div>
							</div>
				
				
				
				
				
				
				
				
				
				
				
				
				';
		/*************** img section work repalce relative tags with absolute tags********************/
        $re3 = '/data-original="(.*?)"/sm';
        $count3 = preg_match_all($re3, $raw, $images);
        $re4 = '/<img src=\"\/(.*)\"/mU';
        for ($y = 0; $y < $count3; $y++) {
                                                        //echo '<br><img src="'.$images[1][$y].'" alt="loading" >';
                                            $matched_data = preg_replace($re4, '<img class="responsive" src="get_img.php?images='.$images[1][$y].'" alt="loading"', $matched_data, 1);
                                          }
         echo $matched_data;

         
         
?>
	</b>
		





	<!-- snackbar work -->
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
   var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  copyText.select();
  document.execCommand("Copy");
// alert("Copied the text: \n" + copyText.value);
}


</script>
<script>
function goBack() {
  window.history.back();
}
</script>






























<head>
	<script src="//cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
	<script src="//cdn.jsdelivr.net/gh/cdnjs/cdnjs/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="asset/uploadify/jquery.uploadifive.min.js" type="text/javascript"></script>
</head>


<script type="text/javascript">
<?php $timestamp = time();?>
$(function() {
	$('#file_upload').uploadifive({
		'multi': false,
		'formData'         : {
			'timestamp' : '<?php echo $timestamp;?>',
			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
		},
		'queueID'          : 'queue',
		'uploadScript'     : 'torrent2magnet.php',
		'onUploadComplete' : function(file, data, response) {
			var result = $('#torrent2magnet .info');
			var strhtml = 'The file ' + file.name + ' is vailed! ';
			var obj = eval ("(" + data + ")");
			if (obj.result)
			{
				strhtml = '<a href="' + obj.url + '" target="_blank">' + obj.url;
			}
			result.html('<div class="alert">' + strhtml + '</div>');
		}
	});
});

$(document).ready(function(){
	$("#submit").click(function(){
		var magneturl = $("#magnet")[0].value;
		$.get("magnet2torrent.php", { magnet: encodeURIComponent(magneturl) },function(data){
			var result = $('#magnet2torrent .info');
			var obj = eval ("(" + data + ")");
			var strhtml = 'The url ' + magneturl + ' is vailed! ';
			if (obj.result) {
				strhtml = '<a href="' + obj.url + '" target="_blank" ><p class="torrentdownload">TORRENT DOWNLOAD</p><img src="torrent.png" class="torrentimg"/></a>';
			}
			result.html('<div class="alert">' + strhtml + '</div>');
		});
	});
});
</script>

</div>

<?php include 'ads3.php';?>	
<br>
<br>
<br><br><br>
<style>
.center0099 {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 980px;
  max-width: 100%;
}
</style>
<img src="img/footer.png" class="center0099"/>
