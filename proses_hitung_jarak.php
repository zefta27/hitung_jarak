<?php 


$lat1 = $_POST['lat1'];
$lng1 =  $_POST['lng1'];
$lat2 = $_POST['lat2'] ;
$lng2 = $_POST['lng2'];
$earthRadius = 3958.75;

$dLat = deg2rad($lat2-$lat1);
$dLng = deg2rad($lng2-$lng1);

$a = 	sin($dLat/2) * sin($dLat/2) +
cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
sin($dLng/2) * sin($dLng/2);
$c = 2 * atan2(sqrt($a), sqrt(1-$a));
$dist = $earthRadius * $c;

		// from miles
$meterConversion = 1609;
$geopointDistance = $dist * $meterConversion;

$data['success'] = true;
$data['result'] = $geopointDistance;

echo json_encode($data);
?>