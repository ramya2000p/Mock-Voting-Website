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

    <script type = "text/javascript">
        function openlink(newurl){
            if(confirm("WARNING: Creating a new election would allow voters to immediately start voting for it")){
                document.location = newurl;
            }
        }
            
    </script>
     
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

    
        <div class="containerElections">
        <h2>Current Elections</h2>

        <a class = "button" href="javascript:openlink('addElections.php');">Add Elections</a><br><br>
            <table class = "electionTable">
                <th>Election Id</th>
                <th>Election Name</th>
                <th>Date Due</th>
                <th>Time Due</th>
                <th>Winner</th>
                <th></th>
                <th></th><br>
                
                    <?php 
                        $sql = "select election_id, election_name, date_due, time_due, winner from elections";
                        $result = $conn->query($sql); //retrieved data saved in result in the form of an array


                            while($row = $result->fetch_assoc()){ //every single row being retrieved is echoed one by one

                    ?>
                                <tr>
                                <td> <?php echo $row['election_id']; ?> </td>
                                <td> <?php echo $row['election_name']; ?> </td>
                                <td> <?php echo $row['date_due']; ?> </td>
                                <td> <?php echo $row['time_due']; ?> </td>
                                <td> <?php echo $row['winner']; ?> </td>

                                <td> <?php echo '<a class = "button"  
                                href="updateElections.php?id='.$row['election_id'].'"
                                role="button">Update</a>'?> </td>
    
                                <td><?php echo '<a class = "button" 
                                href="deleteElections.php?id='.$row['election_id'].'"
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