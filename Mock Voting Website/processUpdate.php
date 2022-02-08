<?php
session_start();
$conn = new mysqli("localhost", "root", "", "evoter");

if(isset($_POST['edit'])){
    $street = $_POST['street'];
    $cityNew = $_POST['city'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];

    $userIC = $_SESSION['successIC'];
    $updateUserSQL = "select ic_num, city from user WHERE ic_num = '$userIC';";
    $updateUserResult = mysqli_query($conn, $updateUserSQL);
    $updateUserRow = $updateUserResult->fetch_assoc();

    $cityOld = $updateUserRow['city'];

    
    $userIcRows= $updateUserRow['ic_num'];
    if($userIcRows == $userIC){
        //update city table to remove voters and num_votes from old city and add to new city
        $updateCitySQL = "UPDATE stats SET voters = voters-1, num_votes = num_votes-1 WHERE city = '$cityOld'; ";
        $updateCityResult = mysqli_query($conn, $updateCitySQL) or die(mysqli_error($conn));

        $updateNewCitySQL= "UPDATE stats SET voters = voters+1, num_votes = num_votes+1 WHERE city = '$cityNew'; ";
        $updateNewCityResult = mysqli_query($conn, $updateNewCitySQL) or die(mysqli_error($conn));
        
        $updateAddSQL = "UPDATE user SET street_add='$street', postcode ='$postcode', city ='$cityNew', state = '$state' WHERE ic_num ='$userIcRows';";
        $updateAddResult = mysqli_query($conn, $updateAddSQL) or die(mysqli_error($conn));

        header("Location: me.php");
    }
}
?>