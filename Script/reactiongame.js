function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

var clickedTime; var createdTime; var reactionTime;
var min; var check = true;
function makeBox() {

    var time = Math.random();
    time = time * 5000;

    setTimeout(function () {
        document.getElementById("box").style.left = Math.random()*300+"px";
        document.getElementById("box").style.right = Math.random()*200+"px";
        document.getElementById("box").style.top = Math.random()*200+"px";
        document.getElementById("box").style.bottom = Math.random()*200+"px";
        document.getElementById("box").style.display = "block";
        document.getElementById("box").style.borderRadius = "50px";
        document.getElementById("box").style.backgroundColor = getRandomColor();
        createdTime = Date.now();
    }, time);
}

document.getElementById("box").onclick = function() {

    clickedTime=Date.now();
    reactionTime=(clickedTime-createdTime)/1000;
    if(check){ min = reactionTime; check = false;}
    if(reactionTime < min)min = reactionTime;
    document.getElementById("time").innerHTML = reactionTime+"s";
    document.getElementById("min").innerHTML = min+"s";

    this.style.display = "none";

    makeBox();
}

makeBox();