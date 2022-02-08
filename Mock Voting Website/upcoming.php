<?php
session_start();
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
                    <a href="registerCandidate.php">Register as a Candidate</a> &nbsp;
            
                    <div id='logout'>
                        <?php
                            $file_name ="logout.php";
                            echo "<a href=".$file_name.">Log Out</a>"."<br>";
                        ?>
                    </div>
                </div>
            </nav>
        </div>

        
            <div class = "container">
                <h2>
                    <?php
                        echo "Welcome ".$_SESSION['successName'];        
                    ?>
                </h2>

                <h3>Upcoming Elections!</h3>

                <img src="upcomingPic.jpg" width="700" height="400">

                <ul>
                    <li>Penang State Elections - 31/12/2021</li>
                    <li>Malaysian General Elections - 31/8/2022</li>
                </ul>
            </div>
        

        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>

</html>
    