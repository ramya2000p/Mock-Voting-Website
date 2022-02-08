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
    <title>E-Voter :: Vote</title>
</head>

<body>
    <div id="wrapper">
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
                <h2>You have already voted</h2>   

                <?php
                    //SHOW BALLOT ID
                    $icNum = $_SESSION['successIC']; 
                    $ballotIdSQL = "SELECT ballot_id FROM user WHERE ic_num = '$icNum'; ";
                    $ballotIdResult = $conn->query($ballotIdSQL);
                    $fetchBallotId = $ballotIdResult->fetch_assoc();
                    $ballotID = $fetchBallotId['ballot_id'];
                    echo "Your vote was vote #".$ballotID." in the election<br><br>";

                    //SHOW CANDIDATE NAME & PARTY
                    $candidateIdSQL = "SELECT ballot_id, candidate_id FROM ballot WHERE ballot_id = '$ballotID'; ";
                    $candidateIdResult = $conn->query($candidateIdSQL);
                    $fetchCandidateId = $candidateIdResult->fetch_assoc();
                    $candidateID = $fetchCandidateId['candidate_id'];
                    

                    
                    $candidateSQL = "SELECT name, party FROM candidates WHERE candidate_id = '$candidateID'; ";
                    $candidateResult = $conn->query($candidateSQL);
                    $fetchCandidate = $candidateResult->fetch_assoc();
                    $candidateName = $fetchCandidate['name'];
                    $candidateParty = $fetchCandidate['party'];
                    echo "Your chosen candidate was:<br><br>";
                    echo $candidateName."<br><br>";
                    echo $candidateParty."<br><br>";
                ?>
            </div>
        </main>
        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>
</html>