<?php
include("check.php");
//session_start();
$conn = new mysqli("localhost", "root", "", "evoter");

//get values from the form
$name = $_POST["name"];
$date = $_POST["date"];
$time = $_POST["time"];
$sql = "insert into elections (election_name, date_due, time_due) values ('$name', '$date', '$time')";
$sqlResult = $conn->query($sql);

$conn->close();
header("location: manageElections.php");
?>