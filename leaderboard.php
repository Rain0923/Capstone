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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>CodeQuiz Champions</title>
</head>

<body>
    <div class="dashboard"> 
        <div class="logo"> 
            <img src="hacker.gif" class="pic"> 
            <a href="index.php"> <span class="logo-text"> QuizzardCode </a> </span>
        </div>
        <div class="nav-links">
            <a href="quiz.php"><i class="bi bi-suit-heart"></i>Tasks</a>
            <a href="leaderboard.php"><i class="bi bi-trophy"></i> Leaderboard</a>
            <a href="login.html"> <i class="bi bi-people"></i>  Login</a>
        </div>
    </div>

    <div class="lboard">
       <img src="trophy.png"> 
       <span> Leaderboard </span>
       <p> See who's leading the competition </p>
    </div>

    <div id="boot3">
    <div class="tab-container1">
        <button class="tabby login-tab active" onclick="switchTab('login', this, 0)">By Language</button>
        <button class="tabby register-tab" onclick="switchTab('register', this, 1)">By Difficulty</button>
        <button class="tabby admin-tab" onclick="switchTab('admin', this, 2)">Statistics</button>
        <div class="tab-indicator1"> </div>
    </div>
</div>

<div id="login-tab-content" class="tab-section2 active">
    <div class="group1">
  <input
    id="query"
    class="input"   
    type="search"
    placeholder="Search Players"
    name="searchbar"
  />
</div>

<img src="board.png" alt="" srcset="">

<script src="index.js"></script>
</body>
</html>
