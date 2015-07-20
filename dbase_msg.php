<?php
// Author: Federick Joe Fajardo / fjpfajardo@ph.ibm.com
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// "HOSTNAME" "USERNAME" "PASSWORD"
$mysqli = new mysqli("localhost", "", "", "");
if (!$mysqli) {
    echo "01: Failed to connect to MySQL: " . mysqli_connect_error();
}
// "DATABASE NAME"
if (! mysqli_select_db($mysqli,"") ) {
    echo "02: Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
