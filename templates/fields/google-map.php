<?php
/**
 * リピーターコンテンツ : Google Maps テンプレート
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
var map;
<?php $code = get_sub_field( 'google_map' );?>
var myLatLang = new google.maps.LatLng(<?php echo esc_attr( $code['lat'] . ',' . $code['lng'] ); ?>);
function initialize() {
var mapOptions = {
zoom: 15,
center: myLatLang,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
map = new google.maps.Map(document.getElementById('map-canvas<?php echo esc_attr( get_the_ID() );?>'),
mapOptions);
var marker = new google.maps.Marker({
position: myLatLang,
map: map,
title:"Hello World!"
});
};
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas<?php echo esc_attr( get_the_ID() );?>" style="height: 300px"></div>
