const question = document.getElementById("question");
const choices = Array.from(document.getElementsByClassName("choice-text"));
const img = document.getElementById("img");
const progressText = document.getElementById("progressText");
const scoreText = document.getElementById("score");
const progressBarFull = document.getElementById("progressBarFull");
let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;

let availableQuestions = [];
let questions;


//Requete Ajax pour récupérer les questions depuis questions_quiz.php qui les récupère depuis la base de données
async function getQuestions() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "questions_quiz.php", false);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      questions = JSON.parse(xhr.responseText);
      questions = Object.entries(questions).map(([key, value]) => value);
      questions.forEach(loadedQuestion => {
        const formattedQuestion = {
          url: loadedQuestion.url,
          question: loadedQuestion.titre,
          choiceA: JSON.parse(loadedQuestion.choix).A,
          choiceB: JSON.parse(loadedQuestion.choix).B,
          choiceC: JSON.parse(loadedQuestion.choix).C,
          choiceD: JSON.parse(loadedQuestion.choix).D,
          answer: Object.keys(JSON.parse(loadedQuestion.reponse))
        };


        availableQuestions.push(formattedQuestion);
      });
    }
  };
  xhr.send();
}



async function main() {
  await getQuestions();

  //CONSTANTS
  const CORRECT_BONUS = 1;
  const MAX_QUESTIONS = 20;

  startGame = () => {
    questionCounter = 0;
    score = 0;
    getNewQuestion();
  };

  getNewQuestion = () => {
    if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
      localStorage.setItem("mostRecentScore", score);
      //go to the end page
      return document.location.href = "./end.php";
    }

    questionCounter++;
    progressText.innerText = `Question ${questionCounter}/${MAX_QUESTIONS}`;
    //Update the progress bar
    progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    question.innerText = currentQuestion.question;


    if (availableQuestions[questionIndex].choiceC == null) {
      console.log(currentQuestion.choixC);
      document.getElementById("C").style.display = "none";
    } else {
      console.log(currentQuestion.choixC);
      document.getElementById("C").style.display = "flex";
    }

    if (availableQuestions[questionIndex].choiceD == null) {
      document.getElementById("D").style.display = "none";
    } else {
      document.getElementById("D").style.display = "flex";
    }

    choices.forEach(choice => {
      const number = choice.dataset["number"];
      choice.innerText = currentQuestion["choice" + number];
    });

    availableQuestions.splice(questionIndex, 1);
    acceptingAnswers = true;

    img.src = currentQuestion.url;

  };

  choices.forEach(choice => {
    choice.addEventListener("click", e => {
      if (!acceptingAnswers) return;

      acceptingAnswers = false;
      const selectedChoice = e.target;
      const selectedAnswer = selectedChoice.dataset["number"];

      const classToApply =
        selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

      if (classToApply === "correct") {
        incrementScore(CORRECT_BONUS);
      }

      selectedChoice.parentElement.classList.add(classToApply);

      setTimeout(() => {
        selectedChoice.parentElement.classList.remove(classToApply);
        getNewQuestion();
      }, 1000);
    });
  });

  incrementScore = num => {
    score += num;
    scoreText.innerText = score;
  };


  startGame();
}

main();