<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gammal');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gammal Tech Exam</title>
    <link rel="shortcut icon" href="../media/gammal_logo4.png" type="image/x-icon">
    <link rel="stylesheet" href="../media/all.min.css">
  <link rel="stylesheet" href="style.css">


  
  
</head>
<body style="background-color:white;">

  <section>
    <header>
        <div class = "logo1">
        <a href = "main(noregister).php">
            <img src = "../media/headerlogo.png">
        </a>
        </div>
      <div class = "sections">
       
        <a href = "main(noregister).php">Home</a>
        <a href = "https://www.gammal.tech/" target="_blank">About</a>
        <a href="../login/login.html">
            <button class="login_button">
                log in
            </button>
        </a>
    </div>
     </header>			
  </section>

    <main>

        <div class="container1">

            <div class="card">
              <div class="sec1">
                <iframe width="380" height="325" src="https://www.youtube.com/embed/iCTEYPwvhCQ?si=kaiwhjwHC8sWQtS5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
              <div class="section2">
                <button class="buttonL"> See More </button>
                 <div class="modal-overlay modalL hide">
                    <div class="modal-wrapper">
                        <div class="modal-content">
                            <div class="more">
                                <iframe width="400" height="380" src="https://www.youtube.com/embed/5QCRIZQSw8I?si=nXCta3m-hNkX1CUL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="logo">
                                <a href="See More\SeeMore.html" target="_blank">
                                    <button class="watch_more">
                                        Watch More
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="close-btn-wrapper">
                            <button class="close-modal-btnS">
                                Close
                            </button>
                        </div>
                    </div> 
                </div>
              </div>
            </div>

            <div class="card">
                <div class="middle_card">
                    <table>
                        <tr>
                            <td>Exam Phases</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="button1">Phase 1: Syntax Errors</button>
                                <div class="modal-overlay modal1 hide">
                                    <div class="modal-wrapper">
                                        <div class="modal-content">
                                            <h2 class="headings">Phase 1: Quick Bug Identification in C</h2>
                                            <p>● Task 1 (10 seconds): Identify a single bug in a C code snippet.<br></p>
                                            <p>● Task 2 (10 seconds): Spot a bug within statements.<br></p>
                                            <p>● Task 3 (10 seconds): Find a bug related to function.<br></p>
                                            <p>● Task 4 (15 seconds): Detect a missing include statements.<br></p>
                                            <p>● Task 5 (15 seconds): Identify an error in loops.<br></p>
                                            <p>● Task 6 (15 seconds): Locate a bug concerning function.<br></p>
                                        </div>
                                        <div class="close-btn-wrapper">
                                            <button class="close-modal-btn">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="button2">Phase 2: Problem Solving</button>
                                <div class="modal-overlay modal2 hide">
                                    <div class="modal-wrapper2">
                                        <div class="modal-content">
                                            <h2 class="headings">Phase 2: Problem Solving "2 minutes"</h2>
                                            <p>● Initially, present a straightforward solution to a given problem.<br></p>
                                            <p>● Optimize the initial solution for better time or memory efficiency.<br></p>
                                            <p>● Finally, refine the solution to minimize resource usage, achieving the lowest
                                                possible time and memory consumption.<br></p>  
                                        </div>
                                        <div class="close-btn-wrapper">
                                            <button class="close-modal-btn">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="button3">Phase 3: Logical Errors</button>
                                <div class="modal-overlay modal3 hide">
                                    <div class="modal-wrapper3">
                                        <div class="modal-content">
                                            <h2 class="headings">Phase 3: Logical Error Identification</h2>
                                            <p>● Task 1 (20 seconds): Find a logical error related to basic programing.<br></p>
                                            <p>Task 2 and 3 (20 seconds each): Spot logical mistakes in expressions.<br></p>
                                        </div>
                                        <div class="close-btn-wrapper">
                                            <button class="close-modal-btn">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">

                <div class="section1">
                        <table>
                            <tr>
                                <td>Ranking</td>
                                <td>Name</td>
                                <td>Government</td>
                                <td>percentage</td>
                            </tr>
                            <tr>
                            <td>
                                <img src="../media/1st.png">
                            </td>
                            <td>Ali Omar</td>
                            <td>Cairo</td>
                            <td>99%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../media/2nd.png">
                                </td>
                                <td>Ahmed Hany</td>
                                <td>Alexandria</td>
                                <td>98%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../media/3rd.png">
                                </td>
                                <td>Omar Ahmed</td>
                                <td>Giza</td>
                                <td>97%</td>
                            </tr>
                           
                        </table>
                </div>

                <dev class="section2">
                    <button class="buttonR">See All Ranks</button>
                    <div class="modal-overlay modalR hide">
                        <div class="modal-wrapper">
                            <div class="modal-content">

                              
                            </div>
                            <div class="close-btn-wrapper">
                                <button class="close-modal-btn">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </dev>

            </div>
          </div>

          <div class="container2">
            <form action="check.php" method="post">
                <button class="buttonE" value="submit"> Start Exam </button>
            </form>
            
          </div>

    </main>

    <footer class="footer">
        <div class="footerp1">
            <p>&copy; 2024 Gammal Tech</p>
        </div>
        
        <div class="footerp3">
            <div class="mediabar">
                
                <div class="flex-icon-footer">
                    <div class="icon-border">
                        <a href="https://www.facebook.com/gammal.tech/">
                        <i class="fa-brands fa-facebook-f"></i>
                        </a>
                </div  >

                <div class="icon-border">
                    <a href="https://twitter.com/gammaltech">
                    <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </div>

                <div class="icon-border">
                    <a href="https://www.youtube.com/c/GammalTech">
                    <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>

                <div class="icon-border">
                    <a href="https://www.instagram.com/gammal.tech">
                    <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>

                <div class="icon-border">
                    <a href="https://www.linkedin.com/company/gammal-tech">
                    <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>

                <div class="icon-border">
                    <a href="https://www.tiktok.com/@gammal.tech">
                    <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
                </div>
            </div>
        </div>
      </footer>
  <script src="index.js"></script>

</body>
</html>