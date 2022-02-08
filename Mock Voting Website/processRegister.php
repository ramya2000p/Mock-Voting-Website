<?php
$conn = new mysqli("localhost", "root", "", "evoter");

//if cant connect to database show error message
if($conn->connect_error){
    header("Location: nodb.html");
}


//Get data from form 
$voterName = $_POST["voterName"];
$icNum = $_POST["icNum"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$street = $_POST["street"];
$postcode = $_POST["postcode"];
$city = $_POST["city"];
$state = $_POST["state"];
$regPassword = $_POST["regPassword"];

//Insert data into database
$sql = "insert into user 
    (ic_num, name, dob, gender, street_add, postcode, city, state, password) 
    values ('$icNum', '$voterName', '$dob', '$gender', '$street', 
    '$postcode', '$city', '$state', '$regPassword')";

$conn->query($sql);

$cityDB = $_POST["city"];

//Use user's city to get the corresponding city row from stats table 
$citySQL = "select city, voters from stats";
$cityResult = $conn->query($citySQL);

//Update total number of voters in that city in the stats table
while($cityRow = $cityResult->fetch_assoc()){

    if($cityDB == $cityRow['city']){
      
        $voterSQL="UPDATE stats SET voters = voters+1 WHERE city = '$cityDB';";
        $successUpdate = mysqli_query($conn, $voterSQL);

        if($successUpdate){
            header("Location: index.html");
        }else{
            echo 'Registration failed. Error: '.mysqli_error($conn);
        }
    }
}



$conn->close(); //close the connection

?>

