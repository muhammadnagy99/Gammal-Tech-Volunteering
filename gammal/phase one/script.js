function nextQuestion2(nextQuestionId) {
    // Hide the current question and show the next one
    document.getElementById('question1').style.display = 'none';
    document.getElementById('question2').style.display = 'none';
    document.getElementById('question3').style.display = 'none';
    document.getElementById(nextQuestionId).style.display = 'block';
}

function nextQuestion3(nextQuestionId) {
    // Hide the current question and show the next one
    document.getElementById('question1').style.display = 'none';
    document.getElementById('question2').style.display = 'none';
    document.getElementById('question3').style.display = 'none';
    document.getElementById(nextQuestionId).style.display = 'block';
}

function submitExam() {
    // Placeholder for actual logic

    // Calculate the total score
    console.log('Total Score:', score);
    alert('Exam submitted\nTotal Score: ' + score);
}

function navigateToAnotherPage2() {
    // You can replace "target_page.html" with the actual URL or file path of your target page
    window.location.href = "PhaseThree.html";
}

function navigateToAnotherPage3() {
    // You can replace "target_page.html" with the actual URL or file path of your target page
    window.location.href = "PhaseOne.html";
}

let nextQuestionID = 1; // Ensure this is correctly initialized and accessible
let selectedChoice = null; // Variable to store the selected choice
let timer; // Variable to store the timer interval
let score = 0;
// Array to store correct answers for each question
const correctAnswers = [1, 2, 3, 4, 1, 2];


function highlightChoice(button) {
    // Remove highlighting from previously selected choice
    if (selectedChoice !== null) {
        selectedChoice.classList.remove('highlighted');
    }

    // Highlight the clicked choice
    button.classList.add('highlighted');
    selectedChoice = button;

    // Enable the Next Question button and change the cursor to pointer only if a choice is selected
    document.querySelectorAll('.nextButton').forEach(nextBtn => {
        if (selectedChoice !== null) {
            nextBtn.classList.remove('disabled');
            nextBtn.style.cursor = 'pointer';
            // Change the style of the Next Question button when a choice is clicked
            nextBtn.style.backgroundColor = '#008080';
            nextBtn.style.color = 'white';
        }
    });
}

function checkAnswer(questionId) {
    // Check if the selected choice matches the correct answer
    const userAnswer = selectedChoice ? parseInt(selectedChoice.innerText.trim().split(' ')[1]) : 0;
    const correctChoice = correctAnswers[questionId - 1];

    if (userAnswer === correctChoice) {
        // Increment the score if the answer is correct
        score++;
    }

    // Continue to the next question
    nextQuestion();
}

function startTimer() {
    clearInterval(timer); // Clear any existing timer
    let timerSeconds = 10; // Set the timer to 10 seconds for each question
    const timerDisplay = document.getElementById('timer');

    // Debug: Log the current question ID
    console.log("Starting timer for question:", nextQuestionID);

    // Select elements specific to the current question
    const container2Button = document.getElementById(nextQuestionID).querySelector('.container2 button');

    // Set the default style to gray
    container2Button.style.borderColor = "#ccc";
    container2Button.style.backgroundColor = "#ccc";
    container2Button.style.cursor = "not-allowed";

    timer = setInterval(function () {
        timerDisplay.innerText = timerSeconds + 's'; // Update the timer display

        if (timerSeconds === 0) {
            clearInterval(timer); // Stop the timer

            // Move to the next question even if no choice is selected
            if (selectedChoice === null) {
                // If no choice is selected, assign a random value
                const choices = document.getElementById(nextQuestionID).querySelectorAll('.outlined-button');
                const randomIndex = Math.floor(Math.random() * choices.length);
                selectedChoice = choices[randomIndex];
            }

            nextQuestion();
        } else if (timerSeconds <= 3 && selectedChoice === null) {
            // Check if a choice is not selected before changing the button color
            container2Button.style.borderColor = "#FFA07A";
            container2Button.style.backgroundColor = "#FFA07A";
        }
        timerSeconds--; // Decrement the timer
    }, 1000);
}


function nextQuestion() {
    // Check if a choice is selected before proceeding
    if (selectedChoice !== null) {
        // Add logic to handle the submission of the selected choice
        console.log('Submit this choice:', selectedChoice.innerText.trim());

        // Hide the current question
        document.getElementById(nextQuestionID).style.display = 'none';

        // Check if it's the last question
        if (nextQuestionID < 6) {
            // Increment to the next question
            nextQuestionID++;
            document.getElementById(nextQuestionID).style.display = 'flex'; // Show the next question
            startTimer(nextQuestionID); // Start the timer for the new question

            // Reset the selected choice for the next question
            selectedChoice = null;

            // Disable the Next Question button and change the cursor to not-allowed for all questions
            document.querySelectorAll('.nextButton').forEach(nextBtn => {
                nextBtn.classList.add('disabled');
                nextBtn.style.cursor = 'not-allowed';
            });
        } else {
            // Navigate to another page if it's the last question
            navigateToAnotherPage();
            alert('Your Score: ' + score);
        }
    } else {
        console.log('No choice selected');

        // If no choice is selected, disable the Next Question button and change the cursor to not-allowed
        document.querySelectorAll('.nextButton').forEach(nextBtn => {
            nextBtn.classList.add('disabled');
            nextBtn.style.cursor = 'not-allowed';
        });
    }
}

function navigateToAnotherPage() {
    // You can replace "target_page.html" with the actual URL or file path of your target page
    window.location.href = "ratingpage.html";
}

startTimer(nextQuestionID); // Start the timer for the first question

// Add an event listener to the "Next" button for manual navigation
document.getElementById('nextButton').addEventListener('click', nextQuestion);



