    <?php
// Debugging Game - Find and fix the bugs!
$title = "Debugging Challenge";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #2d3748;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        h1 {
            color: #2d3748;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }
        
        .card-header h5 {
            margin: 0;
            font-weight: 600;
            font-size: 1.25rem;
        }
        
        .code-container {
            background-color: #1e1e1e;
            border-radius: 8px;
            padding: 1.5rem;
            font-family: 'Roboto Mono', monospace;
            position: relative;
            margin: 1.5rem 0;
            color: #e0e0e0;
            font-size: 0.95rem;
            line-height: 1.6;
            overflow-x: auto;
        }
        
        pre {
            margin: 0;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        .bug-item {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }
        
        .bug-item:hover {
            border-color: #c7d2fe;
            background-color: #f0f4ff;
        }
        
        .bug-item.fixed {
            background-color: #f0fdf4;
            border-color: #bbf7d0;
        }
        
        .bug-title {
            font-weight: 500;
            display: block;
            margin-bottom: 0.25rem;
        }
        
        .bug-hint {
            color: #6b7280;
            font-size: 0.85rem;
            display: block;
        }
        
        .hint-btn {
            float: right;
            padding: 0.15rem 0.5rem;
            font-size: 0.8rem;
        }
        
        .form-check.fixed .form-check-label {
            text-decoration: line-through;
            color: #6b7280;
        }
        
        .CodeMirror {
            height: auto;
            min-height: 300px;
            font-family: 'Roboto Mono', monospace;
            font-size: 14px;
            line-height: 1.5;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        
        .CodeMirror-focused {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(147, 197, 253, 0.3);
        }
        
        .success-message {
            display: none;
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            font-weight: 500;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
        }
        
        .btn-primary:disabled {
            background: #cbd5e0;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.2em;
            cursor: pointer;
        }
        
        .form-check-label {
            margin-left: 0.5rem;
            cursor: pointer;
            user-select: none;
        }
        
        #bugReports {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }
        
        #bugReports li {
            background-color: #f8fafc;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }
        
        #bugReports li:hover {
            border-color: #c7d2fe;
            background-color: #f0f4ff;
        }
        
        #bugReports li.checked {
            background-color: #f0fdf4;
            border-color: #bbf7d0;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-3">🐞 Debugging Challenge</h1>
            <p class="lead text-muted">Sharpen your debugging skills by finding and fixing the bugs in the code below!</p>
            <div class="d-flex justify-content-center gap-3 mb-4">
                <div class="badge bg-primary bg-opacity-10 text-primary p-2">
                    <i class='bx bx-bug me-1'></i> Find the bugs
                </div>
                <div class="badge bg-success bg-opacity-10 text-success p-2">
                    <i class='bx bx-check-circle me-1'></i> Check them off
                </div>
                <div class="badge bg-purple bg-opacity-10 text-purple p-2">
                    <i class='bx bx-code-alt me-1'></i> See the fix
                </div>
            </div>
        </div>
        pakyuu
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-header d-flex align-items-center">
                        <i class='bx bx-code-curly me-2'></i>
                        <h5 class="mb-0">Broken Code</h5>
                        <span class="badge bg-danger ms-auto">3 Bugs Found</span>
                    </div>
                    <div class="card-body">
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-muted">
                                <i class='bx bx-bug me-1'></i>
                                Fixed <span id="fixedCount">0</span> of <span id="totalBugs">1</span> bug
                            </div>
                            <div>
                                <button id="checkCodeBtn" class="btn btn-outline-primary btn-sm me-2" disabled>
                                    <i class='bx bx-check-double me-1'></i> Check Code
                                </button>
                                <button id="showSolutionBtn" class="btn btn-outline-secondary btn-sm">
                                    <i class='bx bx-show me-1'></i> Show Solution
                                </button>
                            </div>
                        </div>
                        
                        <div id="codeEditor" class="mb-3"></div>
                        
                        <div id="feedback" class="alert" style="display: none; margin-top: 1rem;"></div>
                        
                        <div class="mt-4">
                            <h5 class="fw-bold mb-3">Instructions</h5>
                            <div class="alert alert-info">
                                <p><strong>Your task:</strong> Fix the <code>add_numbers</code> function so it correctly adds two numbers together.</p>
                                <p class="mb-0">The function is currently subtracting instead of adding. Can you spot the mistake?</p>
                            </div>
                            <div id="successMessage" class="alert alert-success mt-3" style="display: none;">
                                <div class="d-flex align-items-center">
                                    <i class='bx bx-check-circle me-2' style="font-size: 1.5rem;"></i>
                                    <div>
                                        <h5 class="mb-1">🎉 Great job!</h5>
                                        <p class="mb-0">You've successfully fixed the bug! The function now adds numbers correctly.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="test-cases">
                                <div class="test-case">
                                    <code>add_numbers(5, 3)</code> should return <code>8</code>
                                </div>
                                <div class="test-case">
                                    <code>add_numbers(10, 20)</code> should return <code>30</code>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5 class="fw-bold mb-3">
                                <i class='bx bx-bug me-2 text-danger'></i>Bug Reports
                                <small class="text-muted ms-2">Fix the bugs in the code above</small>
                            </h5>
                            <div id="bugList" class="bug-list">
                                <!-- Bug items will be added here by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/python/python.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CodeMirror
            const editor = CodeMirror(document.getElementById('codeEditor'), {
                mode: 'python',
                theme: 'monokai',
                lineNumbers: true,
                lineWrapping: true,
                indentUnit: 4,
                matchBrackets: true,
                autoCloseBrackets: true,
                extraKeys: {
                    'Ctrl-Enter': checkCode,
                    'Cmd-Enter': checkCode
                }
            });

            // Set the initial code with bugs
            const buggyCode = `# Welcome to your first debugging challenge!
# This function should add two numbers together
def add_numbers(a, b):
    # There's a small bug in this function - can you find it?
    result = a - b  # Oops! This is subtracting instead of adding
    return result

# Test the function
print("5 + 3 =", add_numbers(5, 3))  # Should print 8
print("10 + 20 =", add_numbers(10, 20))  # Should print 30`;

            editor.setValue(buggyCode);
            
            // The correct code for comparison
            const fixedCode = `# Welcome to your first debugging challenge!
# This function adds two numbers together
def add_numbers(a, b):
    # Fixed the bug by changing - to +
    result = a + b
    return result

# Test the function
print("5 + 3 =", add_numbers(5, 3))  # Now correctly prints 8
print("10 + 20 =", add_numbers(10, 20))  # Now correctly prints 30`;

            // Bug descriptions
            const bugs = [
                { 
                    id: 'bug1',
                    description: 'Incorrect arithmetic operation',
                    hint: 'The function is using subtraction (-) instead of addition (+)',
                    line: 4
                }
            ];

            // Display bug list
            const bugList = document.getElementById('bugList');
            bugs.forEach(bug => {
                const bugItem = document.createElement('div');
                bugItem.className = 'bug-item';
                bugItem.innerHTML = `
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="${bug.id}" data-line="${bug.line}">
                        <label class="form-check-label" for="${bug.id}">
                            <span class="bug-title">${bug.description}</span>
                            <small class="bug-hint">${bug.hint}</small>
                        </label>
                        <button class="btn btn-sm btn-outline-primary hint-btn" data-line="${bug.line}">
                            <i class='bx bx-show'></i> Show in code
                        </button>
                    </div>
                `;
                bugList.appendChild(bugItem);
            });


            // Handle check code button click
            document.getElementById('checkCodeBtn').addEventListener('click', checkCode);

            // Handle show solution button click
            document.getElementById('showSolutionBtn').addEventListener('click', showSolution);
            
            // Handle hint button clicks
            document.addEventListener('click', function(e) {
                if (e.target.closest('.hint-btn')) {
                    const line = e.target.closest('.hint-btn').dataset.line;
                    editor.setCursor(parseInt(line) - 1, 0);
                    editor.focus();
                }
            });

            // Handle checkboxes
            document.addEventListener('change', function(e) {
                if (e.target.matches('.form-check-input')) {
                    updateBugStatus();
                }
            });

            function checkCode() {
                const userCode = editor.getValue();
                const userLines = userCode.split('\n');
                const fixedLines = fixedCode.split('\n');
                
                let allBugsFixed = true;
                
                // Check each line for bugs
                for (let i = 0; i < Math.min(userLines.length, fixedLines.length); i++) {
                    const userLine = userLines[i].trim();
                    const fixedLine = fixedLines[i].trim();
                    
                    // Check if this line contains a bug
                    const bug = bugs.find(b => b.line === i + 1);
                    if (bug) {
                        const isFixed = userLine === fixedLine;
                        const bugCheckbox = document.getElementById(bug.id);
                        
                        if (bugCheckbox) {
                            bugCheckbox.checked = isFixed;
                            bugCheckbox.parentNode.parentNode.classList.toggle('fixed', isFixed);
                            
                            if (!isFixed) {
                                allBugsFixed = false;
                            }
                        }
                    }
                }
                
                updateBugStatus();
                
                if (allBugsFixed) {
                    showSuccess();
                } else {
                    // Show which bugs are still present
                    const remainingBugs = bugs.filter(bug => !document.getElementById(bug.id).checked);
                    if (remainingBugs.length > 0) {
                        const bugNumbers = remainingBugs.map((_, index) => index + 1).join(', ');
                        showFeedback(`Bug ${bugNumbers} still needs to be fixed. Check the hint if you're stuck.`, 'warning');
                    }
                }
            }

            function updateBugStatus() {
                const fixedCount = document.querySelectorAll('.form-check-input:checked').length;
                const totalBugs = bugs.length;
                
                document.getElementById('fixedCount').textContent = fixedCount;
                document.getElementById('totalBugs').textContent = totalBugs;
                
                // Update progress bar
                const progress = (fixedCount / totalBugs) * 100;
                document.querySelector('.progress-bar').style.width = `${progress}%`;
            }

            function showSolution() {
                if (confirm('Are you sure you want to see the solution? This will reveal all the fixes.')) {
                    editor.setValue(fixedCode);
                    showSuccess();
                }
            }

            function showSuccess() {
                showFeedback('🎉 Congratulations! You fixed the bug! The function now correctly adds two numbers.', 'success');
                document.getElementById('successMessage').style.display = 'block';
                
                // Mark the bug as fixed
                const checkbox = document.getElementById('bug1');
                if (checkbox) {
                    checkbox.checked = true;
                    checkbox.parentNode.parentNode.classList.add('fixed');
                }
                
                updateBugStatus();
            }
            
            function showFeedback(message, type = 'info') {
                const feedback = document.getElementById('feedback');
                feedback.textContent = message;
                feedback.className = `alert alert-${type} mt-3`;
                feedback.style.display = 'block';
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    feedback.style.display = 'none';
                }, 5000);
            }
            
            // Initial setup
            updateBugStatus();
            
            // Add event listener for the check code button
            document.getElementById('checkCodeBtn').addEventListener('click', checkCode);
            
            // Also allow Ctrl+Enter or Cmd+Enter to check the code
            editor.on('keydown', function(cm, event) {
                if ((event.ctrlKey || event.metaKey) && event.keyCode === 13) { // Ctrl+Enter or Cmd+Enter
                    checkCode();
                }
            });
        });
    </script>
</body>
</html>
