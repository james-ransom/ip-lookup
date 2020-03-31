<?php
require_once 'IP2Location.php';
$db = new \IP2Location\Database('IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-ZIPCODE.BIN', \IP2Location\Database::FILE_IO);
$ip=$_REQUEST['ip'];
$records = $db->lookup($ip, \IP2Location\Database::ALL);
$ret = array(); 
$fields = array('ipNumber', 'ipVersion', 'ipAddress', 'countryCode', 'countryName', 'regionName', 'cityName', 'latitude', 'longitude', 'zipCode');
foreach($fields as $field) 
{
  $ret[$field] = $records[$field]; 
}
header('Content-Type: application/json');
echo json_encode($ret); 
