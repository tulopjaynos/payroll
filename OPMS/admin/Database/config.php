<?php

session_start();

$db_host                      = "localhost";
$db_username                  = "root";
$db_password                  = "";
$db_name                      = "opms";

$db = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(!$db) {
  die("Connection failed: ".mysqli_connect_error());
}
