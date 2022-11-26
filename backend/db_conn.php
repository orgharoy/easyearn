<?php

// $dbHost = "localhost";
// $dbUser = "root";
// $dbPass = "";
// $dbName = "easyearn";

$dbHost = "sql211.epizy.com";
$dbUser = "epiz_33065151";
$dbPass = "Upsnnn8avlbRDF";
$dbName = "epiz_33065151_easyearn";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    echo "database error";
}
