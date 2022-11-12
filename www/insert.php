<?php
$host = '127.0.0.1';
$db = 'leaking';
$user = 'is';
$pass = 'bad';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

$stmt = $pdo->prepare("INSERT INTO energy (timestamp, kohlenstoff, temperatur) values (:time, :co2, :temp)");

// "2013-07-18 13:44:22.123456"
date_default_timezone_set("Europe/Berlin");
$timestamp = date("Y-m-d") . " " . date("H:i:s");
$co2 = $_GET['kohlenstoff'];
$temp = $_GET['temperatur'];


$stmt->bindParam('time', $timestamp);
$stmt->bindParam('co2', $co2);
$stmt->bindParam('temp', $temp);

$stmt->execute();

echo "$timestamp - $co2 - $temp";
?>
