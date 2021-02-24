<?php


// Create connection
$conn = mysqli_connect("localhost", "mihaela", "mihaela","mojabaza");
$conn->query("SET lc_time_names = 'hr_HR'");
$conn->query("SET NAMES utf8");
$conn->query("SET CHARACTER SET utf8");
$conn->query("SET COLLATION_CONNECTION='utf8_unicode_ci'");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "";

?>

