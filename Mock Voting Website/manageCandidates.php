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

    
        <div class="containerCandidates">
        <h2>Current Election Candidates</h2>
        <a class = "button" href="addCandidates.php">Add Candidate</a><br><br>
            <table class = "table">
            
                <th>Candidate Id</th>
                <th>Candidate Name</th>
                <th>Party</th>
                <th></th>
                <th></th><br>
                
                    <?php 
                    //select candidate info from candidate table and display
                    $electionSQL  = "select election_name from elections where election_id = 1";
                    $electionResult = $conn->query($electionSQL);
                    $electionRow = $electionResult->fetch_assoc();

                    echo $electionRow['election_name']."<br><br>";
                        $sql = "select candidate_id, name, party from candidates where election_id = 1";
                        $result = $conn->query($sql); //retrieved data saved in result in the form of an array


                            while($row = $result->fetch_assoc()){ //every single row being retrieved is echoed one by one
                            ?>
                                
                        
                                <tr>
                                <td> <?php echo $row['candidate_id']; ?> </td>
                                <td> <?php echo $row['name']; ?> </td>
                                <td> <?php echo $row['party']; ?> </td>
    
                                <td> <?php echo '<a class = "button" 
                                href="updateCandidates.php?id='.$row['candidate_id'].'"
                                role="button">Update</a>' ?></td> 
    
                                <td> <?php echo '<a class = "button" 
                                href="deleteCandidates.php?id='.$row['candidate_id'].'"
                                role="button">Delete</a>' ?></td>
                                
                                </tr>
                            <?php
                            }

                        $conn->close(); //close the connection      
                    ?>
                
            </table>
        </div>
        
    

    <footer>
        Copyright &copy; E-Voter 2021
    </footer>
    </div>
</body>

</html>

