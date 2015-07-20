<?php
// Author: Federick Joe Fajardo / fjpfajardo@ph.ibm.com
include('dbase_msg.php');

$cusid  = mysqli_real_escape_string($mysqli,$_GET["custom"]);
$secid  = mysqli_real_escape_string($mysqli,$_GET["secret"]);

$mysqli_result = mysqli_query($mysqli,"SELECT apimsgid,apiusrid,apipassw,alpharid FROM `credstore` WHERE customid='$cusid' AND secretky='$secid' AND onhold='0';");
$row = mysqli_fetch_row($mysqli_result);

if ($mysqli_result->num_rows > 0) {
	$pref     = $row[0];
	$user     = $row[1];
	$password = $row[2];
	$from     = $row[3];

	extract($_POST);
        	  $txtm    = $_GET['text'];
	          $pnum    = $_GET['to'];
        	  //$network = $_GET['mccmnc'];

        // START OF OPERATION
        $bbmpin ="aHR0cHM6Ly9yZXN0Lm5leG1vLmNvbS9zbXMvanNvbj8=";
        $url = base64_decode($bbmpin);
        $fields = array(
                'username'=>urlencode($user),
                'password'=>urlencode($password),
                'to'=>urlencode($pnum),
                'client-ref'=>urlencode($pref),
                //'network-code'=>urlencode($network),
                'from'=>urlencode($from),
                'text'=>urlencode($txtm)
        );

// URL-IFY THE POST DATA
$fields_string = '';
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');

// OPEN CURL CONNECTION
$ch = curl_init();

// SET THE URL, VARIABLES and FIELDS
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

// EXECUTE POST
$result = curl_exec($ch);

// CLOSE CONNECTION
curl_close($ch);

}else{
        echo 'Invalid command or keyword not found. Are you sure you have entered a correct or valid keyword? Ask your administrator for assistance.';
}
mysqli_close($mysqli);
?>

