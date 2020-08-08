<?php
	/**
	 * include database settings
	 */
	require_once( 'visitorsdb/src/_installation/db.php' );

	/**
	 * include the class
	 */
	require_once( 'visitorsdb/src/class.visitorTracking.php' );

	/**
	 * instance the class
	 */
	$visitors = new visitorTracking();
?>







<html>
<div style="border-top: 1px solid #2f2f2f;"></div>
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

<IFRAME style="display: block;" SRC="https://animelandcf.blogspot.com/" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=100% HEIGHT=1px allowfullscreen></IFRAME>


			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div></div>
</footer>
<br>
</html>
<style>
.footer {
	background-color: #1d1d1d;
	padding: 20px 0px 0px 0px;
	color: #fff;
	font-size: 12px;
	display: inline;
	margin-top: 0px;
}
.aaaa0 {
	display: inline;
	color: #eee;
	margin-top: 0px;
}
</style>