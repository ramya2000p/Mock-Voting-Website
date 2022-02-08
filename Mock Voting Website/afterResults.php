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
    <title>E-Voter :: Results</title>
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
            <div class = "containerVoterResults">
                <h2>Elections are over!</h2>
                <h3>The winner is: </h3>
                
                <?php
                //if past deadline
                //get total_votes from candidates table
                $winnerSQL = "SELECT name, party, total_votes FROM candidates WHERE total_votes = (SELECT MAX(total_votes) FROM candidates)";
                $winnerResult = $conn->query($winnerSQL);

                $winnerRow = $winnerResult->fetch_assoc();

                echo $winnerRow['name']."<br><br>";
                echo $winnerRow['party']."<br><br>";
                echo "With a total of ".$winnerRow['total_votes']." votes<br><br>";
                
                $winnerName = $winnerRow['name'];

                ?>
                
                <p>These are the statistics by city for the Penang State Election:</p><br><br>

                <table class = "voterResultsTable">
                <th>City</th>
                <th>Total Voters</th>
                <th>Total Votes</th><br>


                <?php

                //show stats by city
                $statsSQL = "SELECT * FROM stats";
                $statsResult = $conn->query($statsSQL);

                while($statsRow = $statsResult->fetch_assoc()){

                ?>

                    
                    <tr>
                    <td> <?php echo $statsRow['city']; ?> </td>
                    <td> <?php echo $statsRow['voters']; ?> </td>
                    <td> <?php echo $statsRow['num_votes']; ?> </td>
                    </tr>
                    

                <?php
                }

                ?>

                </table>

                <button onclick="topFunction()" id="topBtn" title="Back to top">Top</button>

                <script>
                    //Get the button:
                    mybutton = document.getElementById("topBtn");

                    // When the user scrolls down 20px from the top of the document, show the button
                    window.onscroll = function() {scrollFunction()};

                    function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                    }

                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                    }
                </script>

                <?php
                
                //update election table with winners name
                $updateWinnerSQL = "UPDATE elections SET winner = '$winnerName' WHERE election_id = '1' ";
                $winnerUpdate = mysqli_query($conn, $updateWinnerSQL);

                ?>
                
            </div>
        </main>

        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>
</html>