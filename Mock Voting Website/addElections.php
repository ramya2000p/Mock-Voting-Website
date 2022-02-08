<?php
include("check.php");
//session_start();
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
                    <a href="adminResults.php">Results</a> &nbsp;
                    <div class = "dropdown">
                    <button class = "dropbtn">Manage<i class="fa fa-caret-down"></i></button>

                    <div class ="dropdown-content">
                        
                    <a href="manageCandidates.php">Manage Candidates</a> &nbsp;
                        <a href="manageElections.php">Manage Elections</a> &nbsp;
                    </div>
                    </div>
                    <a href="admin.php">Admin</a> &nbsp;
                    
                    <div id='logout'>
                        <?php
                            $file_name ="adminLogout.php";
                            echo "<a href=".$file_name.">Log Out</a>"."<br>";
                            
                        ?>
                    </div>
                </div>
            </nav>
        </div>

    
        <div class="container">
            <h1>Add Elections</h1>
            <form class="form-inline m-2" action="processElections.php" method="POST">
                <label for="name">Election Name:</label>
                <input type="text" class="form" id="name" name="name">

                <label for="party">Date Due:</label>
                <input type="date" class="form" id="party" name="date">

                <label for="score">Time Due:</label>
                <input type="time" class="form" id="electionId" name="time">

                <button  type="submit">Add</button>
            </form>

        </div>        
    

    <footer>
        Copyright &copy; E-Voter 2021
    </footer>
    </div>
</body>

</html>