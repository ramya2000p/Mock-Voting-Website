<?php
include("check.php");
$conn = new mysqli("localhost", "root", "", "evoter");

if(isset($_POST['edit'])){
    
    $candidateID = $_SESSION['canId'];
    $name = $_POST['candidateName'];
    $party = $_POST['candidateParty'];
    $electionID = $_POST['electionId'];

    //UPDATE CANDIDATES TABLE
    $sql = "select candidate_id, name, party, election_id from candidates WHERE candidate_id = '$candidateID';";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    
    $candidateIdRow= $row['candidate_id'];

    if($candidateID == $candidateIdRow){
        $updateSQL = "UPDATE candidates SET name ='$name', party ='$party', election_id ='$electionID' WHERE candidate_id ='$candidateID';";
        $updateResult = mysqli_query($conn, $updateSQL) or die(mysqli_error($conn));
        
    }

    //UPDATE BALLOTS TABLE
    $ballotSQL = "select election_id from ballot where candidate_id = '$candidateID';";
    $ballotResult = mysqli_query($conn, $ballotSQL) or die(mysqli_error($conn));

    if($ballotResult){
        header("Location: manageCandidates.php");
        }else{
            echo " update fail<br><br>";
        }
    
    
    
}
$conn->close(); //close the connection
?>