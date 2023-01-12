<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>FAQ</title>
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>
    <div class="banner">
    </div>

    <main>
        <div class="container bg-grey p-4">
            <div class="col-md-12 mx-auto">
                <div class="bg-green rounded-top p-3 text-center text-white">
                    <div class="titre">
                        FOIRE AUX QUESTIONS
                    </div>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question1()">
                    Question 1
                </div>
                <div id="question1" class="bg-white quest quest-close">
                    <p class="p-3">QUEUGZDOUHZODHZLDUOHZD</p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question2()">
                    Question 2
                </div>
                <div id="question2" class="bg-white quest quest-close">
                    <p class="p-3">QUEUGZDOUHZODHZLDUOHZD</p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question3()">
                    Question 3
                </div>
                <div id="question3" class="bg-white quest quest-close">
                    <p class="p-3">QUEUGZDOUHZODHZLDUOHZD</p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question4()">
                    Question 4
                </div>
                <div id="question4" class="bg-white quest quest-close">
                    <p class="p-3">QUEUGZDOUHZODHZLDUOHZD</p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question5()">
                    Question 5
                </div>
                <div id="question5" class="bg-white quest quest-close">
                    <p class="p-3">QUEUGZDOUHZODHZLDUOHZD</p>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("./views/_footer.php");
    ?>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    html,
    body {
        font-family: 'Karla';
    }

    .banner {
        background-color: #2B8C52;
        width: 100%;
        height: 100px;
    }

    .bg-grey {
        background-color: #F2F2F2;
    }

    .titre {
        font-size: 1.80rem;
        font-weight: 800;
    }

    .question {
        font-size: 1.20rem;
        font-weight: 700;
        border-top: 0.5px solid black !important;
    }

    .quest {
        transition-duration: 0.5s;
        height: 0;
        overflow: hidden;
    }

    .quest-close {
        height: 0 !important;
    }
</style>

<script>
    function Question1() {
        var question1 = document.getElementById("question1");
        if (question1.classList.contains("quest-close")) {
            question1.classList.remove("quest-close");
            question1.classList.add("quest-open");
            question1.style.height = "100px";
            document.getElementById("question2").classList.remove("quest-open");
            document.getElementById("question2").classList.add("quest-close");
            document.getElementById("question3").classList.remove("quest-open");
            document.getElementById("question3").classList.add("quest-close");
            document.getElementById("question4").classList.remove("quest-open");
            document.getElementById("question4").classList.add("quest-close");
            document.getElementById("question5").classList.remove("quest-open");
            document.getElementById("question5").classList.add("quest-close");

        } else {
            question1.classList.remove("quest-open");
            question1.classList.add("quest-close");
            question1.style.height = "0";
        }
    }

    function Question2() {
        var question2 = document.getElementById("question2");
        if (question2.classList.contains("quest-close")) {
            question2.classList.remove("quest-close");
            question2.classList.add("quest-open");
            question2.style.height = "100px";
            document.getElementById("question1").classList.remove("quest-open");
            document.getElementById("question1").classList.add("quest-close");
            document.getElementById("question3").classList.remove("quest-open");
            document.getElementById("question3").classList.add("quest-close");
            document.getElementById("question4").classList.remove("quest-open");
            document.getElementById("question4").classList.add("quest-close");
            document.getElementById("question5").classList.remove("quest-open");
            document.getElementById("question5").classList.add("quest-close");
        } else {
            question2.classList.remove("quest-open");
            question2.classList.add("quest-close");
            question2.style.height = "0";
        }
    }

    function Question3() {
        var question3 = document.getElementById("question3");
        if (question3.classList.contains("quest-close")) {
            question3.classList.remove("quest-close");
            question3.classList.add("quest-open");
            question3.style.height = "100px";
            document.getElementById("question1").classList.remove("quest-open");
            document.getElementById("question1").classList.add("quest-close");
            document.getElementById("question2").classList.remove("quest-open");
            document.getElementById("question2").classList.add("quest-close");
            document.getElementById("question4").classList.remove("quest-open");
            document.getElementById("question4").classList.add("quest-close");
            document.getElementById("question5").classList.remove("quest-open");
            document.getElementById("question5").classList.add("quest-close");
        } else {
            question3.classList.remove("quest-open");
            question3.classList.add("quest-close");
            question3.style.height = "0";
        }
    }

    function Question4() {
        var question4 = document.getElementById("question4");
        if (question4.classList.contains("quest-close")) {
            question4.classList.remove("quest-close");
            question4.classList.add("quest-open");
            question4.style.height = "100px";
            document.getElementById("question1").classList.remove("quest-open");
            document.getElementById("question1").classList.add("quest-close");
            document.getElementById("question2").classList.remove("quest-open");
            document.getElementById("question2").classList.add("quest-close");
            document.getElementById("question3").classList.remove("quest-open");
            document.getElementById("question3").classList.add("quest-close");
            document.getElementById("question5").classList.remove("quest-open");
            document.getElementById("question5").classList.add("quest-close");
        } else {
            question4.classList.remove("quest-open");
            question4.classList.add("quest-close");
            question4.style.height = "0";
        }
    }

    function Question5() {
        var question5 = document.getElementById("question5");
        if (question5.classList.contains("quest-close")) {
            question5.classList.remove("quest-close");
            question5.classList.add("quest-open");
            question5.style.height = "100px";
            document.getElementById("question1").classList.remove("quest-open");
            document.getElementById("question1").classList.add("quest-close");
            document.getElementById("question2").classList.remove("quest-open");
            document.getElementById("question2").classList.add("quest-close");
            document.getElementById("question3").classList.remove("quest-open");
            document.getElementById("question3").classList.add("quest-close");
            document.getElementById("question4").classList.remove("quest-open");
            document.getElementById("question4").classList.add("quest-close");
        } else {
            question5.classList.remove("quest-open");
            question5.classList.add("quest-close");
            question5.style.height = "0";
        }
    }
</script>