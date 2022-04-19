function putStars() {
    var w = document.getElementById('main').clientWidth;
    var h = document.getElementById('main').offsetHeight;
    var i = 1;
    var limit = randomPos(400, 900);

    var starColor = "orange";

    while (i < limit) {
        var topPos = randomPos(1, h);
        var leftPos = randomPos(1, w);
        var scale = randomPos(1, 10) / 10;
        var starRand = randomPos(1, 3);
        if (starRand == 1) {
            starColor = "yellow";
        }
        else if (starRand == 2) {
            starColor = "lightblue";
        }
        else {
            starColor = "white";
        }
        starNormal(starColor, topPos, leftPos, scale);
        i++;
    }

}

function randomPos(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function starNormal(starColor, topPos, leftPos, scale) {
    var topPos = topPos - 90;
    var leftPos = leftPos - 7;
    var scale = scale;

    var starCreate = document.createElement('div');
    starCreate.setAttribute("id", "star");

    starCreate.setAttribute("style", "background-color: " + starColor + "; top: " + topPos + "px; " +
        "left: " + leftPos + "px; " + "transform: scale(" + scale + ")");
    document.getElementById("stars").appendChild(starCreate);
}

setTimeout(putStars, 100);