<?php
$conn = new mysqli("localhost", "root", "", "evoter");
//get time due and date due from elections
$electionSQL = "SELECT date_due, time_due FROM elections WHERE election_id = 1";
$electionResult = $conn->query($electionSQL);
$electionRow = $electionResult->fetch_assoc();

//get local time and date
date_default_timezone_set("Asia/Kuala_Lumpur");
$localDate = date('Y-m-d');
$localTime = date('H:i:s');

$todayTime = strtotime($localTime);
$expireTime = strtotime($electionRow['time_due']);

$dateStamp = strtotime($localDate);
$todayDate = date("Y-m-d", $dateStamp);

$expireStamp = strtotime($electionRow['date_due']);
$expireDate = date("Y-m-d", $expireStamp);

?>