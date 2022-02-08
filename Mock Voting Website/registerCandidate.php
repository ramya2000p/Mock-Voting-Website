<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evoterStylesheet.css">
    <title>E-Voter :: Registration</title>
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
                <h2>Candidate Registration</h2>
                <form method="post" action="processCandidateRegister.php" enctype = "multipart/form-data">
                    <label>Full Name:</label><br>
                    <input type="text" name="name" id="name"> <br><br>
                    <label>Party:</label><br>
                    <input type="text" name="party" id="party"> <br><br>
                    <label>Election ID (Please get the correct ID from our office):</label><br>
                    <input type="text" name="election" id="election"> <br><br>
                    <input type="submit" value="submit">
                </form>
            </div>
        </main>

        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>
</html>