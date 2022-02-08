<?php
include("check.php");
$conn = new mysqli("localhost", "root", "", "evoter");

if(isset($_POST['edit'])){
    $adminIC = $_POST['adminIC'];
    $password = $_POST['password'];


    //Update user table 
    $userIC = $_SESSION['successIC'];
    $updateUserSQL = "select ic_num, password from user WHERE ic_num = '$userIC';";
    $updateUserResult = mysqli_query($conn, $updateUserSQL);
    $updateUserRow = $updateUserResult->fetch_assoc();

    if($updateUserRow){
        echo "select user row success<br><br>";
    }else{
        echo "select user row fail<br><br>";
    }

    $userIcRows= $updateUserRow['ic_num'];

    if($userIcRows == $userIC){
        $updateAddSQL = "UPDATE user SET ic_num ='$adminIC', password ='$password' WHERE ic_num ='$userIcRows';";
        $updateAddResult = mysqli_query($conn, $updateAddSQL) or die(mysqli_error($conn));
       
        
        if($updateAddResult){
            echo "update success<br><br>";
        }else{
            echo " update fail<br><br>";
        }

        header("Location: admin.php");
    }
    

    
}
$conn->close(); //close the connection
?>