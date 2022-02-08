<?php
include('checkVote.php');
//include("check.php");
$conn = new mysqli("localhost", "root", "", "evoter");
//check if they have already voted


//if cant connect to database show error message
if($conn->connect_error){
    die('Could not connect: '.$conn->connect_error);
}


//USE CANDIDATE ID TO UPDATE TOTAL VOTES IN CANDIDATES TABLE
$candidateSQL = "SELECT candidate_id, total_votes FROM candidates";
$candidateResult = $conn->query($candidateSQL);

while($candidateRow = $candidateResult->fetch_assoc()){
    if($_SESSION['chosenVote'] == $candidateRow['candidate_id']){
        $chosenVote = $_SESSION['chosenVote'];
        $voteSQL = "UPDATE candidates SET total_votes = total_votes+1 WHERE candidate_id = '$chosenVote';";
        $successUpdate = mysqli_query($conn, $voteSQL);
    }
}


//INSERT VOTER_ID, CANDIDATE_ID AND ELECTION_ID INTO BALLOT
//get voter_id and ic_num from user table
$userSQL = "SELECT voter_id, ic_num FROM user";
$successUser = mysqli_query($conn, $userSQL);

while($userRow = $successUser->fetch_assoc()){

    //if session ic match ic_num then initialise a variable with the voter id
    if($_SESSION['successIC'] == $userRow['ic_num']){
        $voterID = $userRow['voter_id'];

        //select candidate_id and election_id from candidate table
        $candidateSQL2 = "SELECT candidate_id, election_id FROM candidates";
        $candidateResult2 = $conn->query($candidateSQL2);

        while($candidateRow2 = $candidateResult2->fetch_assoc()){
            //if $chosen matches candidate_id then initialise variables with candidate_id and election_id
            $chosenVote = $_SESSION['chosenVote'];
            $candidateID = $candidateRow2['candidate_id'];
            $electionID = $candidateRow2['election_id'];
            if($candidateID == $chosenVote){
                //insert these data into ballot table
                $ballotSQL = "INSERT INTO ballot (voter_id, candidate_id, election_id) VALUES ('$voterID','$candidateID', '$electionID') ";
                $conn->query($ballotSQL);
            }
        }
    }
}

//UPDATE USER TABLE TO INCLUDE BALLOT ID
//get user ic from session
$userIC = $_SESSION['successIC']; 

//select user id from user table where user ic = session ic
$userIdSQL = "SELECT voter_id, ic_num FROM user WHERE ic_num = '$userIC'; ";
$userIdResult = mysqli_query($conn, $userIdSQL);
$fetchUserId = $userIdResult->fetch_assoc();

//save user id to a variable
$userID = $fetchUserId['voter_id']; 

//select ballot_id from ballot table where user_id = user_id variable
$ballotIdSQL = "SELECT ballot_id FROM ballot WHERE voter_id = '$userID'; ";
$ballotIdResult = $conn->query($ballotIdSQL);
$fetchBallotId = $ballotIdResult->fetch_assoc();

//save ballot_id to a variable
$ballotID = $fetchBallotId['ballot_id'];

//update ballot_id in user table using ballot_id variable
$updateBallotSQL = "UPDATE user SET ballot_id = '$ballotID' WHERE voter_id ='$userID';";
$ballotUpdate = mysqli_query($conn, $updateBallotSQL);


//UPDATE NUM_VOTES IN STATS
//select city from user where ic_num = sessionic
$numVotesSQL = "SELECT city FROM user WHERE ic_num = '$userIC'; ";
$numVotesResult = mysqli_query($conn, $numVotesSQL);
$numVotes = $numVotesResult->fetch_assoc();

//save city to a variable
$city = $numVotes['city']; 

//update num_votes in stats table where city= city variable;
$updateStatsSQL = "UPDATE stats SET num_votes = num_votes+1 WHERE city ='$city';";
$statsUpdate = mysqli_query($conn, $updateStatsSQL);

//Redirect to log in
header("location: upcoming.php");

$conn->close(); //close the connection
?>