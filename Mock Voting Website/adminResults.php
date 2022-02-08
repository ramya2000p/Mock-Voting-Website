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

    <div class = "containerResults">
        <h2>Current Election Results!</h2>
        <?php
        $candidateSQL = "SELECT candidate_id, name, party, total_votes FROM candidates WHERE election_id = 1";
        $candidateResult = $conn->query($candidateSQL);

        $electionSQL = "SELECT election_name FROM elections WHERE election_id = 1";
        $electionResult = $conn->query($electionSQL);
        $electionRow = $electionResult->fetch_assoc();
        echo $electionRow['election_name'];
        ?>

        <table class="adminResultsTable">
        <th>Candidate Id</th>
        <th>Candidate Name</th>
        <th>Party</th>
        <th>Total Votes</th><br>
        <?php
        while($candidateRow = $candidateResult->fetch_assoc()){
        ?>
            <tr>
            <td> <?php echo $candidateRow['candidate_id']; ?> </td>
            <td> <?php echo $candidateRow['name']; ?> </td>
            <td> <?php echo $candidateRow['party']; ?></td>
            <td> <?php echo $candidateRow['total_votes']; ?></td><br>
            </tr>
        <?php
        }
        ?>
        </table>
        
        </div>

    <footer>
        Copyright &copy; E-Voter 2021
    </footer>
    </div>
</body>

</html>