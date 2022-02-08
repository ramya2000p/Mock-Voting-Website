<?php
include("check.php");

//Connect to database
$conn = new mysqli("localhost", "root", "", "evoter");

//if cant connect to database show error message
if($conn->connect_error){
    die('Could not connect: '.$conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evoterStylesheet.css">
    <title>E-Voter :: Vote</title>
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
        <h2>Please confirm your chosen candidate</h2>

        
            <?php
            //Get chosen candidate id
            $chosen = $_POST["vote"];
            $_SESSION['chosenVote'] = $chosen;

            //get name and party from database
            $sql = "SELECT candidate_id, name, party FROM candidates WHERE candidate_id = '$chosen';";
            $result = mysqli_query($conn, $sql); 
        
            while($row = $result->fetch_assoc()){
                if($chosen == $row['candidate_id']){
                    
                    echo $row['name']." ".$row['party'];
                    
                }
            }  

            $conn->close(); //close the connection
            ?>
            <br><br>
            <a class="button" href="processVote.php">Confirm</a>

       

        </div>
    </main>


    <footer>
        Copyright &copy; E-Voter 2021
    </footer>
        </div>
</body>

</html>