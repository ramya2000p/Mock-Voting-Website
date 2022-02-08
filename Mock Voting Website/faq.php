<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evoterStylesheet.css">
    <title>E-Voter :: FAQ</title>
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

        <div class = "containerFAQ">
                <h2>Frequently Asked Questions</h2>
                
                    <button class = "accordion">When is the next election?</button>
                    <div class="panel">
                        <p>Stay tuned to our Upcoming Elections page for all the details 
                        about the elections you are qualified to vote in!</p>
                    </div>

                    <button class = "accordion">Who is in the current Malaysian Cabinet?</button>
                    <div class="panel">
                        <p>As of 27 August 2021, the Cabinet comprises of 13 BN candidates, 
                        13 PN candidates, 4 GPS candidates , 1 PBS candidate and 1 independent 
                        candidate. Click on the button below to learn more about the Malaysian 
                        Cabinet.</p><br> 
                        <a class = "button" href="https://en.wikipedia.org/wiki/Cabinet_of_Malaysia">Cabinet Of Malaysia</a>
                    </div>

                    <button class = "accordion">What is the function of Parliament</button>
                    <div class="panel">
                        <p>Parliament is a legislative body for Federal Government that passes and 
                        amends Federal laws, scrutinizes Government policies and approves Government 
                        budgets and proposal for new taxes. Click on the button below to learn more
                        about the Malaysian 
                        Parliament.</p><br>
                        <a class = "button" href="https://www.parlimen.gov.my/soalan-lazim.html?&lang=en">Parliament Of Malaysia</a>
                    </div>

                    <button class = "accordion">My current address and the address on my IC do not match.<br>Can I still vote?</button>
                    <div class="panel">
                        <p>Please do update your account in the ME section to have your current address.
                        Additionally you can get more info regarding how to update the address on your 
                        IC by clicking on the button below.</p><br>
                        <a class = "button" href="https://www.jpn.gov.my/en/core-business/identity-card/mykad-tukar-alamat-eng">How to Change The Address on my IC</a>
                    </div>

                    <button class = "accordion">Can I choose to not vote online?</button>
                    <div class="panel">
                        <p>Yes! Feel free to find the nearest polling station to you by clicking on the button below.</p><br>
                    <a class = "button" href="https://www.spr.gov.my/">Polling Stations Near Me</a>
                    </div>

                    <button class = "accordion">I live overseas, can I choose to vote by mail?</button>
                    <div class="panel">
                        <p>Yes! Click on the button below to find out if you are qualified to vote by post.</p><br>
                    <a class = "button" href="https://www.spr.gov.my/en/node/45">Who Is Qualified To Vote By Post?</a>
                    </div>

                    <script>
                        var acc = document.getElementsByClassName("accordion");
                    
                        for (var i = 0; i < acc.length; i++){
                            acc[i].addEventListener("click", function(){
                                /* Toggle between adding and removing the "active" class,
                                to highlight the button that controls the panel */
                                this.classList.toggle("active");

                                /* Toggle between hiding and showing the active panel */
                                var panel = this.nextElementSibling;
                                if (panel.style.display === "block"){
                                panel.style.display = "none";
                                }else{
                                panel.style.display = "block";
                                }
                            });
                        }
                    </script>                
            
        
        </div>
        <footer>
            Copyright &copy; E-Voter 2021
        </footer>
    </div>
</body>

</html>
    