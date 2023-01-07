<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos forfaits | Val'auto</title>
    <link rel="stylesheet" href="./css/forfaits.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>

    <div class="banner"></div>


    <div class="bouttons-container">
        <div class="boutton">Permis B</div>
        <div class="boutton">Permis A</div>
        <div class="boutton">Code</div>
    </div>

    <div class="d-flex flex-column align-items-center">
        <div class="form">
            <div class="form-title">
                <h1>Inscrivez vous à cette formation</h1>
            </div>
            <div class="d-flex">
                <div class="form-gauche">
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B" type="radio" name="typePermis" value="20">
                        <div class="d-flex">
                            <label for="Permis-B">Permis B </label>
                            <div title="Permis B simple" class="infos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B-accompagné" type="radio" name="typePermis" value="20">
                        <div class="d-flex">
                            <label for="Permis-B-accompagné">Permis B accompagné</label>
                            <div title="L’AAC (apprentissage anticipé de la conduite) permet de commencer l’apprentissage dès 15 ans. Dès la fin de tes cours, tu pourras partir en conduite accompagnée avec tes parents." class="infos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B-acceléré" type="radio" name="typePermis" value="20">
                        <div class="d-flex">
                            <label for="Permis-B-acceléré">Permis B acceléré</label>
                            <div title="Des formules complètes avec une formation en 30 jours et une présentation prioritaire à l’examen du permis pour réussir rapidement son permis" class="infos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-milieu">
                    <div class="d-flex input-form-milieu">
                        <input class="form-check-input" id="Boite-automatique" type="radio" name="typeBoite" value="20">
                        <label for="Boite-automatique">Boite automatique</label>
                    </div>
                    <div class="d-flex input-form-milieu">
                        <input class="form-check-input" id="Boite-manuelle" type="radio" name="typeBoite" value="20">
                        <label for="Boite-manuelle">Boite manuelle</label>
                    </div>
                </div>
                <div class="form-droite">
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="20" type="radio" name="nbCours" value="20">
                        <label for="20">20</label>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="25" type="radio" name="nbCours" value="5">
                        <label for="25">25</label>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="30" type="radio" name="nbCours" value="10">
                        <label for="30">30</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-sinscrire">
            <p id="Montant-Display"></p>
            <button id="validate-form-forfaits">S'inscrire</button>
        </div>
















        <div class="form">
            <div class="form-title">
                <h1>Inscrivez vous à cette formation</h1>
            </div>
            <div class="d-flex">
                <div class="form-gauche">
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B" type="radio" name="typePermis" value="20">
                        <div class="d-flex">
                            <label for="Permis-B">Permis A</label>
                            <div title="Permis B simple" class="infos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B-accompagné" type="radio" name="typePermis" value="20">
                        <div class="d-flex">
                            <label for="Permis-B-accompagné">Permis B accompagné</label>
                            <div title="L’AAC (apprentissage anticipé de la conduite) permet de commencer l’apprentissage dès 15 ans. Dès la fin de tes cours, tu pourras partir en conduite accompagnée avec tes parents." class="infos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B-acceléré" type="radio" name="typePermis" value="20">
                        <div class="d-flex">
                            <label for="Permis-B-acceléré">Permis B acceléré</label>
                            <div title="Des formules complètes avec une formation en 30 jours et une présentation prioritaire à l’examen du permis pour réussir rapidement son permis" class="infos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-milieu">
                    <div class="d-flex input-form-milieu">
                        <input class="form-check-input" id="Boite-automatique" type="radio" name="typeBoite" value="20">
                        <label for="Boite-automatique">Boite automatique</label>
                    </div>
                    <div class="d-flex input-form-milieu">
                        <input class="form-check-input" id="Boite-manuelle" type="radio" name="typeBoite" value="20">
                        <label for="Boite-manuelle">Boite manuelle</label>
                    </div>
                </div>
                <div class="form-droite">
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="20" type="radio" name="nbCours" value="20">
                        <label for="20">20</label>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="25" type="radio" name="nbCours" value="5">
                        <label for="25">25</label>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="30" type="radio" name="nbCours" value="10">
                        <label for="30">30</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-sinscrire">
            <p id="Montant-Display"></p>
            <button id="validate-form-forfaits">S'inscrire</button>
        </div>
    </div>

    <?php require_once('./views/_footer.php') ?>
    <script src="./Js/forfaits.js"></script>
</body>

</html>