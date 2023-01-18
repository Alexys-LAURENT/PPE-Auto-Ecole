const url = document.referrer;
const url2 = url.substring(url.lastIndexOf('/') + 1);
if (url2 != "index.php?page=7") {
    document.location.href = "index.php?page=0";
}
const finalScore = document.getElementById('finalScore');
const mostRecentScore = localStorage.getItem('mostRecentScore');



finalScore.innerText = mostRecentScore + " / 20";

//fonction qui gère l'affichage des confettis si le score est supérieur à 15
window.onload = function () {
    if (mostRecentScore >= 15) {
        var duration = 10 * (mostRecentScore * 17.5);
        var animationEnd = Date.now() + duration;
        var defaults = {
            startVelocity: mostRecentScore ^ 5,
            spread: 360,
            ticks: 1000,
            zIndex: 0
        };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        var interval = setInterval(function () {
            var timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            var particleCount = 50 * (timeLeft / duration);
            // since particles fall down, start a bit higher than random
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: {
                    x: randomInRange(0.1, 0.3),
                    y: Math.random() - 0.2
                }
            }));
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: {
                    x: randomInRange(0.7, 0.9),
                    y: Math.random() - 0.2
                }
            }));
        }, 150);
    }
};