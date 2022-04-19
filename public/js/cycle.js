var checkSite = window.location.href.split("/");
var checkPage = checkSite[checkSite.length - 1].split(".");
if (checkPage[0] === "stuff") {
    elements = ['header', 'navA1', 'navA2', 'navA3', 'navA4', 'main', 'mainP', 'info', 'projects', 'footer'];
} else if(checkPage[0] === "contact"){
    elements = ['header', 'navA1', 'navA2', 'navA3', 'navA4', 'main', 'mainP', 'info','form', 'footer'];
} else if(checkPage[0] === "preview"){
    elements = ['header', 'navA1', 'navA2', 'navA3', 'navA4', 'main', 'mainP', 'info', 'pLink' ,'footer'];
} else {
    elements = ['header', 'navA1', 'navA2', 'navA3', 'navA4', 'main', 'mainP', 'info', 'footer'];
}
console.log(checkPage[0])

if (localStorage.getItem('cycle') === "day") {
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        var num = document.getElementById(element);
        navCheck = element.slice(0, 4)
        if (navCheck == 'navA') {
            num.classList.toggle("navA-day");
        } else {
            num.classList.toggle(element + "-day");
        }
    }
    var x = document.getElementById("stars");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function cycle() {
    var currentCycle = localStorage.getItem('cycle');
    if (currentCycle === "night") {
        localStorage.setItem('cycle', 'day');
    } else {
        localStorage.setItem('cycle', 'night');
    } console.log(currentCycle)
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        var num = document.getElementById(element);
        navCheck = element.slice(0, 4)
        if (navCheck == 'navA') {
            num.classList.toggle("navA-day");
        } else {
            num.classList.toggle(element + "-day");
        }

    }
    var x = document.getElementById("stars");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}