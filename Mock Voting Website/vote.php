<?php
include("checkVote.php");
include("checkElectionTime.php");
if($expireDate < $todayDate){
    header("Location: afterResults.php");
 
 }else if ($todayDate == $expireDate){
     if( $todayTime > $expireTime ){
        header("Location: afterResults.php");
     }
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
        <div class ="top">
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
            <h2>Carefully select the candidate you want to vote for</h2>

            <?php
                $sql = "select candidate_id, name, party from candidates where election_id = 1";
                $sqlResult = $conn->query($sql);
                while($sqlRow = $sqlResult->fetch_assoc()){
            ?>

                <form method="post" action="confirmVote.php">
                <input type="radio" name="vote" value="<?php echo $sqlRow['candidate_id'];?>">
                <?php echo $sqlRow['name']."&nbsp;&nbsp;".$sqlRow['party'];?><br><br>
                
                 <?php
                }
            ?>

                <input type="submit" value="Next">
           
            </form> 

            

        </div>
        </main>
        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>

</html>
    