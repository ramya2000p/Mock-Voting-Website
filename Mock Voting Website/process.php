<?php
session_start();
//Connect to database
$conn = new mysqli("localhost", "root", "", "evoter");


//if cant connect to database show error message

if($conn->connect_error){
    die('Could not connect: '.$conn->connect_error);
}

//Get data from form and check with database
$voterIc = $_POST["voteric"];
$password = $_POST["password"];

$sql = "select ic_num, name, password from user";
$result = $conn->query($sql); 
$checkRows = mysqli_num_rows($result);

//$adminIC = "1234";
//$adminPass = "admin";


//check if table has rows
if($checkRows > 0){
  
    while($row = $result->fetch_assoc() ){

    
        //check if ic and password match database
        if($voterIc == $row['ic_num'] AND $password == $row['password']){
            
            $sqlName="SELECT name, ic_num FROM user WHERE ic_num = '$voterIc';";
            $icResult = $conn->query($sqlName);
            
            //save voter name in session
            while($icRow = $icResult->fetch_assoc()){
                $_SESSION['successName'] = $icRow['name'];
                $_SESSION['successIC'] = $icRow['ic_num'];
            }

            //select ic_num, password from user where user_id = 7
            $selectAdminSQL = "select ic_num, password from user WHERE voter_id = 7;";
            $selectAdminResult = mysqli_query($conn, $selectAdminSQL);
            $selectAdminRow = $selectAdminResult->fetch_assoc();
            $adminIC = $selectAdminRow['ic_num'];
            $adminPass = $selectAdminRow['password'];

            if($voterIc == $adminIC AND $password == $adminPass){
                header("location: adminResults.php");
                break;
            }else{
                header("location: upcoming.php");
            break;
            }
        }
        else{
            header("location: index.html");
        }

    }

    
}else{
    echo "Your table has no rows";
}

$conn->close(); //close the connection
?>
