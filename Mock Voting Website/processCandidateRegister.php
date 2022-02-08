<?php
$conn = new mysqli("localhost", "root", "", "evoter");

//if cant connect to database show error message
if($conn->connect_error){
    header("Location: nodb.html");
}


//Get data from form 
$name = $_POST["name"];
$party = $_POST["party"];
$election = $_POST["election"];

//check if candidate already exists by comparing name and party
$candidateSQL = "select name, party, election_id from candidates where name = '$name';";
$candidateResult = $conn->query($candidateSQL);
$exists = (mysqli_num_rows($candidateResult));

if($exists == 0){
    //Insert data into candidates
    $sql = "insert into candidates (name, party, election_id) values ('$name', '$party', '$election')";
    $result = $conn->query($sql);
    
    if($result){
        header("Location: upcoming.php");
    }else{
        echo 'Registration failed. Error: '.mysqli_error($conn);
    }
}else{
    header("Location: candidateRejection.php");
}

$conn->close(); //close the connection

?>
