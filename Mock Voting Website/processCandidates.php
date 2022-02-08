<?php
include("check.php");
$conn = new mysqli("localhost", "root", "", "evoter");

//get values from the form
$name = $_POST["name"];
$party = $_POST["party"];
$electionId = $_POST["electionId"];
$sql = "insert into candidates (name, party, election_id) values ('$name', '$party', '$electionId')";
$sqlResult = $conn->query($sql);

$conn->close();
header("location: manageCandidates.php");
?>