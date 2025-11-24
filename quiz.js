// Quiz Game Logic
const questions = [
    {
        question: "What is the correct file extension for Python files?",
        options: [".pt", ".py", ".python", ".pyt"],
        correct: ".py",
        type: "mcq"
    },
    {
        question: "Which of the following is a valid variable name in Python?",
        options: ["2name", "my-name", "my_name", "my name"],
        correct: "my_name",
        type: "mcq"
    },
    {
        question: "True or False: Python is a case-sensitive language.",
        options: ["True", "False"],
        correct: "True",
        type: "tf"
    },
    {
        question: "Which keyword is used to define a function in Python?",
        options: ["func", "define", "function", "def"],
        correct: "def",
        type: "mcq"
    },
    {
        question: "What will be the output of print(3 * 'Hi')?",
        options: ["HiHiHi", "Hi3", "3Hi", "Error"],
        correct: "HiHiHi",
        type: "mcq"
    },
    {
        question: "Which of these is not a Python data type?",
        options: ["int", "str", "real", "bool"],
        correct: "real",
        type: "mcq"
    },
    {
        question: "True or False: Python uses indentation to define blocks of code.",
        options: ["True", "False"],
        correct: "True",
        type: "tf"
    },
    {
        question: "Which of the following is used to take user input in Python?",
        options: ["read()", "get()", "input()", "scan()"],
        correct: "input()",
        type: "mcq"
    },
    {
        question: "What is the output of len('Python')?",
        options: ["5", "6", "7", "Error"],
        correct: "6",
        type: "mcq"
    },
    {
        question: "How do you start a comment in Python?",
        options: ["/*", "//", "#", "--"],
        correct: "#",
        type: "mcq"
    }
];

let currentQuestion = 0;
let timeLeft = 15;
let timer;
let questionsQueue = [...questions];
let answeredQuestions = new Set();

// DOM Elements
const startScreen = document.getElementById('startScreen');
const gameArea = document.getElementById('gameArea');
const gameOver = document.getElementById('gameOver');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionElement = document.getElementById('question');
const optionsContainer = document.getElementById('optionsContainer');
const skipBtn = document.getElementById('skipBtn');
const restartBtn = document.getElementById('restartBtn');
const finalScoreElement = document.getElementById('finalScore');

// Event Listeners
startScreen.addEventListener('click', startGame);
restartBtn.addEventListener('click', restartGame);
skipBtn.addEventListener('click', skipQuestion);

document.addEventListener('DOMContentLoaded', () => {
    // Add click event listeners to options dynamically
    optionsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('option-btn')) {
            checkAnswer(e.target);
        }
    });
});

function startGame() {
    startScreen.style.display = 'none';
    gameArea.style.display = 'flex';
    startTimer();
    showQuestion();
}

function startTimer() {
    timer = setInterval(() => {
        timeLeft--;
        timerElement.textContent = timeLeft;
        
        if (timeLeft <= 0) {
            clearInterval(timer);
            showGameOver('time');
        }
    }, 1000);
}

function showQuestion() {
    if (questionsQueue.length === 0) {
        // If all questions are answered
        clearInterval(timer);
        showGameOver('win');
        return;
    }

    const current = questionsQueue[currentQuestion];
    questionElement.textContent = current.question;
    optionsContainer.innerHTML = '';

    current.options.forEach(option => {
        const btn = document.createElement('button');
        btn.className = 'option-btn';
        btn.textContent = option;
        optionsContainer.appendChild(btn);
    });
}

function checkAnswer(selectedBtn) {
    const current = questionsQueue[currentQuestion];
    const selectedAnswer = selectedBtn.textContent;
    
    if (selectedAnswer === current.correct) {
        selectedBtn.classList.add('correct');
        timeLeft += 5;
        answeredQuestions.add(currentQuestion);
        
        // Check if all questions are answered correctly
        if (answeredQuestions.size === questions.length) {
            // Show congratulatory notification
            const notification = document.createElement('div');
            notification.className = 'congrats-notification';
            notification.innerHTML = `
                <h3>Congratulations!</h3>
                <p>You've answered all questions correctly!</p>
            `;
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
            
            // Stop the timer and show game over with win condition
            clearInterval(timer);
            showGameOver('win');
            return;
        }
        
        setTimeout(() => {
            currentQuestion++;
            showQuestion();
        }, 1000);
    } else {
        selectedBtn.classList.add('wrong');
        timeLeft -= 2;
    }
}

function skipQuestion() {
    timeLeft -= 1;
    currentQuestion++;
    showQuestion();
}

function showGameOver(result) {
    gameArea.style.display = 'none';
    gameOver.style.display = 'block';
    
    if (result === 'time') {
        gameOver.querySelector('h2').textContent = 'Game Over!';
        gameOver.querySelector('p').textContent = 'You ran out of time!';
    } else {
        gameOver.querySelector('h2').textContent = 'Congratulations!';
        gameOver.querySelector('p').textContent = 'You won the game!';
    }
}

function restartGame() {
    gameOver.style.display = 'none';
    startScreen.style.display = 'flex';
    gameArea.style.display = 'none';
    
    // Reset game state
    currentQuestion = 0;
    timeLeft = 15;
    score = 0;
    questionsQueue = [...questions];
    answeredQuestions.clear();
    
    timerElement.textContent = timeLeft;
    scoreElement.textContent = score;
    if (timer) clearInterval(timer);
}
