<?php
include("check.php");
$conn = new mysqli("localhost", "root", "", "evoter");

if(isset($_POST['edit'])){
    
    $electionID = $_SESSION['electionId'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    //SELECT ELECTION ID FROM ELECTIONS TABLE
    $sql = "select election_id from elections where election_id = '$electionID';";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = $result->fetch_assoc();

    $electionIdRow = $row['election_id'];

    //UPDATE ELECTIONS TABLE
    if($electionID == $electionIdRow){
        $updateSQL = "UPDATE elections SET election_name ='$name', date_due ='$date', time_due ='$time' WHERE election_id ='$electionID';";
        $updateResult = mysqli_query($conn, $updateSQL) or die(mysqli_error($conn));
       
        
        if($updateResult){
            header("Location: manageElections.php");
        }else{
            echo " update fail<br><br>";
        }

        
    }    
    
}
$conn->close(); //close the connection
?>