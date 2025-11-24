<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
    <title>CodeQuiz Champions</title>
</head>

<body>

 <div class="dashboard"> 
        <div class="logo"> 
            <img src="hacker.gif" class="pic"> 
            <a href="index.php"> <span class="logo-text"> QuizzardCode </a> </span>
        </div>
        <div class="nav-links">
            <a href="tasks.php"><i class="bi bi-suit-heart"></i> Tasks</a>
            <a href="leaderboard.php"><i class="bi bi-trophy"></i> Leaderboard</a>
            <a href="login.html"> <i class="bi bi-people"></i>  Login</a>
        </div>
    </div>

<div class="lboardd"> 
       <span> Code Quizzes </span>
       <p> Feel the challenge on these tasks </p>
    </div>


<!-- GAMEMODE -->
<div class="select1">
  <div class="selected1" data-default="Select Gamemode" data-one="Quiz" data-two="Debugging"></div>
  <div class="options1">
    <div class="option1">
      <input id="gamemode-all" type="radio" name="gamemode" checked>
    </div>
    <div class="option1">
      <input id="gamemode-Q" type="radio" name="gamemode">
      <label for="gamemode-Q">Quiz</label>
    </div>
    <div class="option1">
      <input id="gamemode-D" type="radio" name="gamemode">
      <label for="gamemode-D">Debugging</label>
    </div>
  </div>
</div>

<!-- LANGUAGE -->
<div class="select">
  <div class="selected" data-default="Select Language" data-one="Python" data-two="Javascript" data-three="CSS" data-four="PHP"></div>
  <div class="options">
    <div>
      <input id="lang-all" type="radio" name="language" checked />
      <label for="lang-all">Select Language</label>
    </div>
    <div>
      <input id="lang-python" name="language" type="radio" />
      <label for="lang-python">Python</label>
    </div>
    <div>
      <input id="lang-js" name="language" type="radio" />
      <label for="lang-js">JavaScript</label>
    </div>
    <div>
      <input id="lang-css" name="language" type="radio" />
      <label for="lang-css">CSS</label>
    </div>
    <div>
      <input id="lang-php" name="language" type="radio" />
      <label for="lang-php">PHP</label>
    </div>
  </div>
</div>

<!-- DIFFICULTY -->
<div class="select2">
  <div class="selected2" data-default="Select Difficulty" data-one="Beginner" data-two="Intermediate" data-three="Advanced"></div>
  <div class="options2">
    <div>
      <input id="difficulty-all" type="radio" name="difficulty" checked>
      <label for="difficulty-all">Select Difficulty</label>
    </div>
    <div>
      <input id="difficulty-beginner" name="difficulty" type="radio" />
      <label for="difficulty-beginner" style="color: #4caf50;">Beginner</label>
    </div>
    <div>
      <input id="difficulty-intermediate" name="difficulty" type="radio" />
      <label for="difficulty-intermediate" style="color: #ff9800;">Intermediate</label>
    </div>
    <div>
      <input id="difficulty-advanced" name="difficulty" type="radio" />
      <label for="difficulty-advanced" style="color: #f44336;">Advanced</label>
    </div>
  </div>
</div>




  <div class="container">
      <div class="card">
        <div class="card-header">
          <h2>PHP I</h2>
          <span class="badge advanced">Advanced</span>
        </div>
        <p class="description">Start your Python basics here. Tackle beginner-friendly MCQs and true/false questions on variables, data types, and simple input/output</p>
        <div class="info1">
          <span class="tag php">PHP</span>
          <span>• 10 questions</span>
          <span>•</span>
        </div>
        <div class="meta">
          <span>⏱ 15s per question</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP logo" />
        <button class="start-btn">Start Quiz</button>
      </div>
    </div>

  <div class="container1">
      <div class="card1">
        <div class="card-header1">
          <h2>PHP II</h2>
          <span class="badge advanced">Advanced</span>
        </div>
        <p class="description">Dig deeper into Python logic. This quiz tests loops, lists, dictionaries, and sets with interactive MCQs and true/false formats.</p>
        <div class="info1">
          <span class="tag php">PHP</span>
          <span>• 10 questions</span>
        </div>
        <div class="meta">
          <span>⏱ 15s per question</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP logo" />
        <button class="start-btn">Start Quiz</button>
      </div>
    </div>

  <div class="container2">
      <div class="card2">
        <div class="card-header2">
          <h2>PHP III</h2>
          <span class="badge advanced">Advanced</span>
        </div>
        <p class="description">Enter the world of object-oriented Python. Learn through beginner-focused MCQs and true/false challenges on classes and inheritance.</p>
        <div class="info1">
          <span class="tag php">PHP</span>
          <span>• 10 questions</span>
        </div>
        <div class="meta">
          <span>⏱ 15s per question</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP logo" />
        <button class="start-btn">Start Quiz</button>
      </div>
    </div>

    <div class="container3">
      <div class="card3">
        <div class="card-header3">
          <h2>PHP Endless</h2>
          <span class="badge advanced">Advanced</span>
        </div>
        <p class="description">An endless beginner challenge! Keep answering randomized MCQs and true/false questions covering all foundational Python topics.</p>
        <div class="info1">
          <span class="tag php">PHP</span>
        </div>
        <div class="meta">
          <span>⏱ 15s per question</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP logo" />

        <button class="start-btn">Start Quiz</button>
      </div>
    </div>


   