<?php
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "phpproject02";
$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
if (!$conn) {
  die("Conectionn failed: " . mysqli_connect_error());
}
