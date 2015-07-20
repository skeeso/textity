<?php
// Author: Federick Joe Fajardo / fjpfajardo@ph.ibm.com
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// "HOSTNAME" "USERNAME" "PASSWORD"
$mysqli = new mysqli("localhost", "ad_e65297c73371c", "MyMtHgChF4tDyV4", "ad_e65297c73371c");
if (!$mysqli) {
    echo "01: Failed to connect to MySQL: " . mysqli_connect_error();
}
// "DATABASE NAME"
if (! mysqli_select_db($mysqli,"ad_e65297c73371c") ) {
    echo "02: Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
