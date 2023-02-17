    <?php

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        require_once("./views/_navbar.php");
        ?>

        <main class="py-5 bg-back">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 p-3 border rounded-3 text-center my-2 bg-white">

                    </div>
                    <div class="col-xl-5 p-3 border rounded-3 my-2 bg-white">

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

        .text-green {
            color: #2B8C52;
        }

        .text-red {
            color: red;
        }

        .bg-back {
            background-color: #f9f9f9;
        }

        .bg-grey {
            background-color: #F4F4F4;
        }

        .bg-light-grey {
            background-color: #f9f9f9;
        }

        #mois {
            transform: translateY(12.5%);
        }

        #annee {
            transform: translateY(12.5%);
        }

        #AffTout {
            transform: translateY(50%);
        }

        .max-height {
            max-height: 19rem;
        }

        .scale-label {
            transition: transform 0.15s ease-in-out;
        }

        .scale-label:hover {
            transform: scale(1.25);
        }
    </style>
    <script src="Js/Account.js"></script>