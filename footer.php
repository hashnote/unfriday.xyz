







<html>
<br>
<footer class="footer">

			<div align="center" class="">
			
			<img style="height: 10px;display:inline;" src="bangladesh.png"/>
			
			&nbsp;&nbsp;&nbsp;
			
			<div class="aaaa0">UnFriday 2018 - 2020&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			
			
			
			
			
			
<?php /*Get user ip address*/
$ip_address=$_SERVER['REMOTE_ADDR'];
/*Get user ip address details with geoplugin.net*/
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
/*Get City name by return array*/
$city = $addrDetailsArr['geoplugin_city'];
/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];
/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/
if(!$city){
   $city='Not Define';
}if(!$country){
   $country='Not Define';
}
echo '<p style="font-size: 13px;display: inline;color: #a5a5a5;">IP Address:&nbsp; '.$ip_address.' </p>&nbsp;&nbsp;';
echo '<p style="font-size: 13px;display: inline;color: #a5a5a5;">City:&nbsp;'.$city.' </p>&nbsp;&nbsp;';
echo '<p style="font-size: 13px;display: inline;color: #a5a5a5;">Country:&nbsp; '.$country.' </p>&nbsp;&nbsp;';
?>	
			
			
			
			
<br><br><br>


<IFRAME style="display: block;" SRC="ads2.php" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=1px allowfullscreen></IFRAME>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div></div>
</footer>
<br>
</html>
<style>
.footer {
	background-color: #121212;
	padding: 20px 0px 0px 0px;
	color: #fff;
	font: normal small-caps 12px -apple-system, BlinkMacSystemFont, 
    "Segoe UI", "Roboto", "Oxygen", 
    "Ubuntu", "Cantarell", "Fira Sans", 
    "Droid Sans", "Helvetica Neue", sans-serif;
	border: 1px solid #a5a5a5;
	display: inline;
	margin-top: 0px;
}
.aaaa0 {
	display: inline;
	color: #eee;
	margin-top: 0px;
}
</style>