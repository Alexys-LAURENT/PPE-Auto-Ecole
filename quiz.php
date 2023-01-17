<?php
if (!isset($_SESSION['User'])) {
  header('Location: index.php?page=0');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Val Auto quiz - Jouer</title>
  <link rel="stylesheet" href="./css/quiz.css" />
</head>

<body>
  <div id="hud">
    <div id="hud-item">
      <p id="progressText" class="hud-prefix">
        Question
      </p>
      <div id="progressBar">
        <div id="progressBarFull"></div>
      </div>
    </div>
    <div id="hud-item">
      <p class="hud-prefix">
        Score
      </p>
      <h1 class="hud-main-text" id="score">
        0
      </h1>
    </div>
  </div>
  <div class="container py-5">
    <div class="back">
      <a href="index.php?page=2">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
      </a>
    </div>
    <div id="game" class="justify-center flex-column">

      <img id="img" class="img-fluid rounded">
      <h3 class="fw-bold" id="question">Quel est la réponse à cette question?</h3>
      <div id="A" class="choice-container my-2">
        <p class="choice-prefix">A</p>
        <p class="choice-text" data-number="A">Choice 1</p>
      </div>
      <div id="B" class="choice-container my-2">
        <p class="choice-prefix">B</p>
        <p class="choice-text" data-number="B">Choice 2</p>
      </div>
      <div id="C" class="choice-container my-2">
        <p class="choice-prefix">C</p>
        <p class="choice-text" data-number="C">Choice 3</p>
      </div>
      <div id="D" class="choice-container my-2">
        <p class="choice-prefix">D</p>
        <p class="choice-text" data-number="D">Choice 4</p>
      </div>
    </div>
  </div>

</body>

</html>

<script src="./js/quiz.js"></script>