<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
    <link rel="stylesheet" href="quiz.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="startScreen" class="screen">
        <div class="container">
            <h1 class="glow-text">Quiz Game</h1>
            <p class="description">Test your knowledge with our timed quiz!</p>
            <button id="startBtn" class="btn primary-btn">Start Game</button>
        </div>
    </div>

    <div id="gameArea" class="screen" style="display: none;">
        <div class="game-container">
            <div class="timer-section">
                <div class="time-circle">
                    <span id="timer">15</span>s
                </div>
            </div>
            
            <div class="question-container">
                <h3 id="question" class="question-text"></h3>
                <div id="optionsContainer" class="options-grid"></div>
            </div>

            <button id="skipBtn" class="btn secondary-btn">Skip Question (-1s)</button>
        </div>
    </div>

    <div id="gameOver" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"></h2>
            </div>
            <button id="restartBtn" class="btn primary-btn">Play Again</button>
        </div>
    </div>

    <script src="quiz.js"></script>
</body>
</html>
