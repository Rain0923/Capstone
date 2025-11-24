<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/minecraft-4" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<title>CodeQuiz Champions</title>
</head>

<body>

    <div class="dashboard"> 
        <div class="logo"> 
            <img src="hacker.gif" class="pic"> 
            <a href="indexhome.php"> <span class="logo-text"> QuizzardCode </a> </span>
        </div>

        <div class="nav-links">
            <a href="uquiz.php"><i class="bi bi-suit-heart"></i> Tasks</a>
            <a href="uleaderboard.php"><i class="bi bi-trophy"></i> Leaderboard</a>
            <a href="login.html"> <i class="bi bi-people"></i>  Logout</a>
        </div>
    </div>


    <!-- Background Index 1 -------------------------------------------->
    <div class="background"> 
        <img src="code.png" alt="Background Image">
    </div>
        <div class="tab-main">
            <span>
                <i class="bi bi-code"> Coding Challenges &nbsp;&nbsp;</i>
                <i class="bi bi-arrow-up"> Break The Code </i>
            </span>
        </div>
        <div class="text-main">
            Welcome to Quizzard Code
        <p> Challenge yourself and others with coding quizzes difficulty levels. </p>
        <p> Compete, learn, and climb the leaderboard.</p>
    </div>
        
        <div id="textmaniac">
        <div class="text-main1">
            <p> How It Works? </p>
        </div>   
        <div class="text-main2">
            <p> Learn Programming, take quizzes, and climb the leaderboard </p>
        </div>   
        </div>

        <div id="interactive-box">
        <i class='bx bx-brain' style="font-size: 40px; margin-top: 30px; margin-left: 180px;"></i> <br>
        <span> Learn Programming Languages</span>
        <p> Learning programming languages is important   because it  empowers you to build technology, solve problems, and create solutions in the digital world.</p>
        </div>
       
        <div id="interactive-box1">
        <i class='bx bx-cog' style="font-size: 40px; margin-top: 35px; margin-left: 200px;"></i> <br>
        <span> Take Coding Quizzes</span>
        <p>Challenge yourself with quizzes across multiple programming languages and difficulty levels.</p>
        </div>
       
        <div id="interactive-box2">
        <i class='bx bx-cog' style="font-size: 40px; margin-top: 35px; margin-left: 200px;"></i> <br>
        <span> Climb the Leaderboard </span>
        <p> Earn points for correct answers and climb the global leaderboard to become a champion.</p>
        </div>
      
    <!-- Background Index 2 -------------------------------------------->
       <div class="part2">
            <div>
        <span> Popular Quizzes </span>
        <p> Start with these popular coding challenges </p>
            </div>
            <img src="hey.png">
    </div>  
       </div>

    <!-- Background Index 3 -------------------------------------------->
    <div class="part3">
        <img src="Amin.jpg">
        <div class="part3-text">
          <span> Ready to Test Your Skills? </span>
          <p> Create/Login an account today to start the challenges, compete with friends, and 
            <br> become a Quizzard Champion! </p>
        </div>
        <div class="button-main3">
        <button class="tab signin-tab"onclick="window.location.href='login.html'"> <i class="bi bi-people"></i> Sign In Now</button> 
        </div>

      </div>

    
<script src="index.js"></script>
</body>
</html>

