<?php
include("check.php");

$conn = new mysqli("localhost", "root", "", "evoter");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evoterStylesheet.css">
    <title>E-Voter :: Upcoming Elections</title>
</head>

<body>
    <div id='wrapper'>
        <div class="top">
            <header>
                <h1>E-Voter</h1>
            </header>

            <nav>
                <div class="navbar">
                    <a href="upcoming.php">Upcoming Elections</a> &nbsp;
                    <a href="vote.php">Vote</a> &nbsp;
                    <a href="results.php">Results</a> &nbsp;
                    <a href="faq.php">FAQ</a> &nbsp;
                    <a href="me.php">Me</a>&nbsp;
                    <a href="registerCandidate.php">Register as a Candidate</a>

                    <div id='logout'>
                        <?php
                            $file_name ="logout.php";
                            echo "<a href=".$file_name.">Log Out</a>"."<br>";
                        ?>
                    </div>
                </div>
            </nav>
        </div>

        <main>
            <div class = "container">
                <h2>My voter details:</h2>
                <?php
                
                //use select from user table to get and display user details
                $userIC = $_SESSION['successIC'];
                $getUserSQL = "select ic_num, name, dob, gender, street_add, postcode, city, state from user WHERE ic_num = '$userIC';";
                $getUserResult = mysqli_query($conn, $getUserSQL);
                
                while($getUserRow = $getUserResult->fetch_assoc()){
                    if($getUserRow['ic_num'] == $userIC){

                        echo "Name: ".$getUserRow['name']."<br><br>";
                        echo "IC Number: ".$getUserRow['ic_num']."<br><br>";
                        echo "Date of Birth: ".$getUserRow['dob']."<br><br>";
                        echo "Gender: ".$getUserRow['gender']."<br><br>";
                        echo "Street Address: ".$getUserRow['street_add']."<br><br>";
                        echo "Postcode: ".$getUserRow['postcode']."<br><br>";
                        echo "City: ".$getUserRow['city']."<br><br>";
                        echo "State: ".$getUserRow['state']."<br><br>";
                    }
                }

                ?>
        
                <a class = "button" href="userUpdate.php">Update Details</a>
            </div>
        </main>

        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>
</html>