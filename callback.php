<?php
// Author: Federick Joe Fajardo / fjpfajardo@ph.ibm.com
include('dbase_cal.php');

$msisdn = mysqli_real_escape_string($mysqli,$_GET["msisdn"]);
$to = mysqli_real_escape_string($mysqli,$_GET["to"]);
$network = mysqli_real_escape_string($mysqli,$_GET["network-code"]);
$messageId = mysqli_real_escape_string($mysqli,$_GET["messageId"]);

$price = mysqli_real_escape_string($mysqli,$_GET["price"]);
$status = mysqli_real_escape_string($mysqli,$_GET["status"]);
$scts = mysqli_real_escape_string($mysqli,$_GET["scts"]);
$errcode = mysqli_real_escape_string($mysqli,$_GET["err-code"]);
$clientref = mysqli_real_escape_string($mysqli,$_GET["client-ref"]);
$messagetimestamp = mysqli_real_escape_string($mysqli,$_GET["message-timestamp"]);
$id = '';

$query = "INSERT INTO `callback` (`id`,`msisdn`,`to`,`network-code`,`messageId`,`price`,`status`,`scts`,`err-code`,`client-ref`,`message-timestamp`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("issssssssss", $id, $msisdn, $to, $network, $messageId, $price, $status, $scts, $errcode, $clientref, $messagetimestamp);
$stmt->execute();
$stmt->close();

$mysqli->insert_id;
?>
