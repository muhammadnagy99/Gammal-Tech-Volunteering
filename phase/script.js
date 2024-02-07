// Quiz data
const quizData = [
    {
      id: "Question 1",
      question: "What is the capital of France?",
      options: ["Paris", "London", "Berlin", "Rome"],
      correctAnswer: "Paris"
    },
    {
      id: "Question 2",
      question: "What is 2 + 2?",
      options: ["3", "4", "5", "6"],
      correctAnswer: "4"
    }
  ];
var txt =[`
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
`
        #include <stdio.h>
        int main() {
            x = 3;
            return 0;
        }`,
        `
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
        `
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
        `
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            
        }`,]
        
        ;
  var speed = 25;
  // Variables
  let currentQuestion = 0;
  let score = 0;
  let timer;
  let i;
  // DOM elements
  const questionElement = document.getElementById('question');
  const optionsElement = document.getElementById('options');
  const timerElement = document.getElementById('timer');
  const nextButton = document.getElementById('next-btn');
  const codeContainer = document.getElementById('code-container');
  const code = document.getElementById('code');
  const questionNumberElement = document.getElementById('question-number');

  
  // Function to start the quiz
  function startQuiz() {
    showQuestion();
    startTimer();
  }
  
  function typeWriter() {
      if (i < txt[currentQuestion].length) {
        const targetDiv = document.getElementById("code");
        targetDiv.innerHTML += txt[currentQuestion].charAt(i);
        i++;
        setTimeout(typeWriter, speed);
      }
    }
  
  // Function to display the current question
  function showQuestion() {
    i = 0;
    code.innerHTML='';
    typeWriter(i);
    const currentQuizData = quizData[currentQuestion];
    questionElement.textContent = currentQuizData.question;
    optionsElement.innerHTML = '';
    questionNumberElement.textContent = currentQuizData.id;
    currentQuizData.options.forEach((option, index) => {
      const button = document.createElement('button');
      button.textContent = option;
      button.classList.add('option-btn');
      button.addEventListener('click', () => selectOption(option));
      optionsElement.appendChild(button);
    });
  }
  
  // Function to select an option
  function selectOption(selectedOption) {
    
    if (selectedOption === quizData[currentQuestion].correctAnswer) {
        // Increment the score if the answer is correct
        score++;
    }
}
  
  // Function to show the next question or end the quiz
  function showNextQuestion() {
      currentQuestion++;
      if (currentQuestion < quizData.length) {
        startTimer();
        showQuestion();
    } else {
      endQuiz();
    }
  }
  
  // Function to start the timer for each question
  function startTimer() {
    let timeLeft = 10; // Timer set to 10 seconds per question
    timerElement.textContent = timeLeft;
  
    timer = setInterval(() => {
      timeLeft--;
      timerElement.textContent = timeLeft;
      if (timeLeft === 0) {
        clearInterval(timer);
        showNextQuestion();
      }
    }, 1000);
  
    // Add event listener to check if an option is selected when the timer runs out
    optionsElement.addEventListener('click', checkOptionSelected);
  
    // Check if it's the last question
    if (currentQuestion === quizData.length) {
      timerElement.style.display = 'none'; // Hide timer on the last question
    } else {
      timerElement.style.display = 'block'; // Show timer for other questions
    }
  }
  
  // Function to check if an option is selected when the timer runs out
  function checkOptionSelected() {
    const selectedOption = document.querySelector('.option-btn.selected');
    if (!selectedOption) {
        clearInterval(timer);
        showNextQuestion();
    }
  }
  
  // Function to handle when the next button is clicked
  function handleNextButtonClick() {
    const selectedOption = document.querySelector('.option-btn.selected');
    if (!selectedOption) {
      // If no option is selected, proceed to the next question
      clearInterval(timer);
      showNextQuestion();
      return;
    }
    selectOption(selectedOption.textContent);
  }
  
  // Event listener for next button click
  nextButton.addEventListener('click', handleNextButtonClick);
  
  // Function to end the quiz and display the final score
  function stopTimer() {
    clearInterval(timer);
    timerElement.style.display = 'none'; // Hide timer on the last question

  }
  
  // Function to end the quiz and display the final score
  function endQuiz() {
    stopTimer(); // Stop the timer on the score page
    questionElement.textContent = `Quiz completed! Your score: ${score}/${quizData.length}`;
    optionsElement.innerHTML = '';
    timerElement.textContent = '';
    questionNumberElement.style.display= 'none';
    nextButton.style.display = 'none';
    codeContainer.style.display = 'none';
  }
  // Event listener for starting the quiz
  document.addEventListener('DOMContentLoaded', () => {
    startQuiz();
  });
  