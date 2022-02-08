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
                <h2>My voter details</h2>
                <form action="processUpdate.php" method="post">

                    <label for="streetAdd">Street Address: </label><br>
                    <input type="text" name="street"><br><br>

                    <label for="postcode">Postcode: </label><br>
                    <input type="text" name="postcode"><br><br>

                    <label for="city">City: </label><br>
                    <input type="text" name="city"><br><br>

                    <label for="state">State: </label><br>
                    <input type="text" name="state"><br><br>
                    <input type="submit" name="edit">
                </form>
            </div>
        </main>

        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>
</html>