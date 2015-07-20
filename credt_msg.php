<?php
// Author: Federick Joe Fajardo / fjpfajardo@ph.ibm.com
include('dbase_msg.php');

$cusid  = mysqli_real_escape_string($mysqli,$_GET["custom"]);
$secid  = mysqli_real_escape_string($mysqli,$_GET["secret"]);

$mysqli_result = mysqli_query($mysqli,"SELECT apiusrid,apipassw FROM `credstore` WHERE customid='$cusid' AND secretky='$secid' AND onhold='0';");
$row = mysqli_fetch_row($mysqli_result);

if ($mysqli_result->num_rows > 0) {
        $user     = $row[0];
        $pass     = $row[1];

        $bbmpin = "cmVzdC5uZXhtby5jb20vYWNjb3VudC9nZXQtYmFsYW5jZQ==";
        $urlx = base64_decode($bbmpin);
        $url = ('https://' . $urlx . '/' . $user . '/' . $pass);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4000);

        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
}else{
        echo 'Invalid command or keyword not found. Are you sure you have entered a correct or valid keyword? Ask your administrator for assistance.';
}
mysqli_close($mysqli);
?>
