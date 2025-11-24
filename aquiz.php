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
            <a href="adminhome.php"> <span class="logo-text"> QuizzardCode </a> </span>
        </div>
        <div class="nav-links">
        <a href="aquiz.php"><i class="bi bi-suit-heart"></i> Quizzes</a>
            <a href="aleaderboard.php"><i class="bi bi-trophy"></i> Leaderboard</a>
            <a href="admin.php"> <i class="bi bi-people"></i></i>  Admin</a>
            <a href="index.php">  Logout</a>
        </div>
    </div>

<div class="lboardd"> 
       <span> Code Quizzes </span>
       <p> See who's leading the competition </p>
    </div>

    <div id="boot2">
    <div class="tab-container2">
        <button class="tabb login-tab active" onclick="switchTab('login', this, 0)">
            <i class="bi bi-code"></i> Browse Quizzes
        </button>  
        <button class="tabb register-tab" onclick="switchTab('register', this, 1)">
            <i class="bi bi-trophy"></i> Compete
        </button> 
        <div class="tab-indicatorr"></div>
    </div>
</div>


 <div id="login-tab-content" class="tab-section2 active">
    <div class="group">
  <input
    id="query"
    class="input"   
    type="search"
    placeholder="Search Quizzes"
    name="searchbar"
  />
</div>

<div class="select">
  <div
    class="selected"
    data-default="Select Language"
    data-one="Python"
    data-two="Javascript"
    data-three="CSS"
    data-four="Java"
    data-five="C++"
    data-six="C#"
    data-seven="PHP"
  >
  </div>
  
  <div class="options">
    <div title="Select Language">
      <input id="all"type="radio" checked="" />
      <label data-txt="Select Language"></label>
    </div>
    <div title="Python">
      <input id="option-1" name="option" type="radio" />
      <label class="option" for="option-1" data-txt="Python"></label>
    </div>
    <div title="Javascript">
      <input id="option-2" name="option" type="radio" />
      <label class="option" for="option-2" data-txt="JavaScript"></label>
    </div>
    <div title="CSS">
      <input id="option-3" name="option" type="radio" />
      <label class="option" for="option-3" data-txt="CSS"></label>
    </div>
    <div title="Java">
      <input id="option-4" name="option" type="radio" />
      <label class="option" for="option-4" data-txt="Java"></label>
    </div>
    <div title="C++">
      <input id="option-5" name="option" type="radio" />
      <label class="option" for="option-5" data-txt="C++"></label>
    </div>
    <div title="C#">
      <input id="option-6" name="option" type="radio" />
      <label class="option" for="option-6" data-txt="C#"></label>
    </div>
    <div title="PHP">
      <input id="option-7" name="option" type="radio" />
      <label class="option" for="option-7" data-txt="PHP"></label>
    </div>
</div>
</div>


<div class="select2">
  <div class="selected2" data-default="Select Difficulty" data-one="Beginner" data-two="Intermediate" data-three="Advanced"></div>

  <div class="options2">
    <div title="Select Difficulty">
      <input id="all2" type="radio" checked />
      <label data-txt="Select Difficulty" style="color: gray;" for="all2"></label>
    </div>
    <div title="Beginner">
      <input id="option-A" name="option2" type="radio" />
      <label class="option2" for="option-A" data-txt="Beginner" style="color: #4caf50;"></label> <!-- Green -->
    </div>
    <div title="Intermediate">
      <input id="option-B" name="option2" type="radio" />
      <label class="option2" for="option-B" data-txt="Intermediate" style="color: #ff9800;"></label> <!-- Orange -->
    </div>
    <div title="Advanced">
      <input id="option-C" name="option2" type="radio" />
      <label class="option2" for="option-C" data-txt="Advanced" style="color: #f44336;"></label> <!-- Red -->
    </div>
  </div>
</div>


  <div class="container">
      <div class="card">
        <div class="card-header">
          <h2>JavaScript Fundamentals</h2>
          <span class="badge beginner">Beginner</span>
        </div>
        <p class="description">Test your knowledge of JavaScript basics including variables, functions, and control flow.</p>
        <div class="info">
          <span class="tag js">JavaScript</span>
          <span>• 2 questions</span>
          <span>• 100 pts</span>
        </div>
        <div class="meta">
          <span>⏱ 30s per question</span>
          <span>❤️ 3 lives</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JS Logo">
        <button class="start-btn">Start Quiz</button>
      </div>
    </div>

  <div class="container1">
      <div class="card1">
        <div class="card-header1">
          <h2>Python Data Structures </h2>
          <span class="badge intermediate">Intermediate</span>
        </div>
        <p class="description">Challenge yourself with questions about Python lists, dictionaries, sets, and tuples.</p>
        <div class="info1">
          <span class="tag python">Python</span>
          <span>• 4 questions</span>
          <span>• 100 pts</span>
        </div>
        <div class="meta">
          <span>⏱ 20s per question</span>
          <span>❤️ 4 lives</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="JS Logo">
        <button class="start-btn">Start Quiz</button>
      </div>
    </div>

  <div class="container2">
      <div class="card2">
        <div class="card-header2">
          <h2>Java Object-Oriented Programming </h2>
          <span class="badge advanced">Advanced</span>
        </div>
        <p class="description">Master the concepts of Java OOP including inheritance, polymorphism, and encapsulation.</p>
        <div class="info1">
          <span class="tag java">Java</span>
          <span>• 4 questions</span>
          <span>• 100 pts</span>
        </div>
        <div class="meta">
          <span>⏱ 20s per question</span>
          <span>❤️ 4 lives</span>
        </div>
        <img class="lang-logo" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="JS Logo">
        <button class="start-btn">Start Quiz</button>
      </div>
    </div>


 <!-- Compete Tab -->
<div id="register-tab-content" class="tab-section2">
  <div class="match-container">
    <img src="" alt="" srcset="">
    <div class="match-card">
      <h3>Quick Match</h3>
      <p class="subtext">Get matched with players of similar skill level. Compete in a random quiz.</p>
      <select class="dropdown">
        <option selected disabled>Select Language</option>
      </select>
      <select class="dropdown">
        <option selected disabled>Select Difficulty</option>
      </select>
      <button class="btn-primary">👥 Find Match</button>
    </div>

    <div class="match-card">
      <h3>Challenge a Friend</h3>
      <p class="subtext">Create a private match and invite your friends to compete.</p>
      <button class="btn-secondary">Create Private Match</button>
      <div class="divider"><span>OR</span></div>
      <div class="match-code">
        <input type="text" placeholder="Enter match code">
        <button class="btn-join">Join</button>
      </div>
    </div>
  </div>
</div>


<script src="index.js"></script>
</body>
</html>


