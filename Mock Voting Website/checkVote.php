<?php
include("check.php");
//session_start();
if(!isset($_SESSION['successName']))
{
    header("Location: notLoggedIn.html");
}
$conn = new mysqli("localhost", "root", "", "evoter");

$userIC = $_SESSION['successIC']; 
$checkUserSQL = "SELECT ic_num, ballot_id FROM user";
$checkUserResult = mysqli_query($conn, $checkUserSQL);

while($fetchUser = $checkUserResult->fetch_assoc()){
    $userIcNum = $fetchUser['ic_num'];
    $ballotID = $fetchUser['ballot_id'];

    if($userIC == $userIcNum){
        if($ballotID > 0){
            header("Location: alreadyVoted.php");
        }

        
    }
}
    
?>