<style type="text/css">
    html, body {
        height: 100%;
        overflow-y: hidden;
        background-color: #000;
        color: #fff;
    }
    canvas {
        padding-left: 0;
        padding-right: 0;
        margin: auto;
        display: block;
        height: 60%;
        border: 4px solid #fff;
    }
    #back {
        position: absolute;
        top: 2%;
        left: 2%;
        width: 10%;
        height: 5%;
        background-color: #fff;
        border: none;
        color: #000;
    }
    #back:hover {
        background-color: #888888;
        color: #fff;
        cursor: pointer;
        border: 3px solid #fff;
    }
</style>
<title>Snake</title>
<a href="index.php"><button id="back">BACK</button></a>
<h1 id="snake_text" style="text-align: center;">Javascript Snake Game<br>Score - 0</h1>
<canvas id="gc" width="400" height="400">
    
</canvas>
<script>

window.onload = function() {
    canv = document.getElementById("gc");
    ctx = canv.getContext("2d");
    document.addEventListener("keydown",keyPush);
    setInterval(game,1000/15);
}    

px = py = 10;
gs = tc = 20;
ax = ay = 15;
xv = yv = 0;
trail = [];
tail = 3;
score = 0;
text = document.getElementById("snake_text");
bg = new Image();
bg.src = "images/snake-bg.png";

function game() {

    //movement
    px+=xv;
    py+=yv;

    //boundaries
    if (px < 0) {
        px = tc - 1;
    }
    if (px > tc - 1) {
        px = 0;
    }
    if (py < 0) {
        py = tc - 1;
    }
    if (py > tc - 1) {
        py = 0;
    }

    //draw bg
    ctx.drawImage(bg,0,0,400,400);

    //make snake + tail
    ctx.fillStyle = "lime";
    for (var i = 0; i < trail.length; i++) {
        ctx.fillRect(trail[i].x*gs,trail[i].y*gs,gs-2,gs-2);
        if (trail[i].x == px && trail[i].y == py) {
            tail = 3;
            score = 0;
            px = py = 10;
            ax = ay = 15;
            xv = yv = 0;
        }
    }
    trail.push({x:px,y:py});
    while (trail.length>tail) {
    trail.shift();
    }
    if (ax == px && ay == py) {
        tail++;
        ax = Math.floor(Math.random() * tc);
        ay = Math.floor(Math.random() * tc);
        score += 1;
    }

    //draw food
    ctx.fillStyle = "red";
    ctx.fillRect(ax*gs,ay*gs,gs-2,gs-2);

    text.innerHTML = "Javascript Snake Game<br>Score - " + score;

}

function keyPush(event) {
    //keys
    switch(event.keyCode) {
        case 37:
            if (xv != 1) {
                xv = -1; yv = 0;
                break;
            }
        case 38:
            if (yv != 1) {
                xv = 0; yv = -1;
                break;
            }
        case 39:
            if (xv != -1) {
                xv = 1; yv = 0;
                break;
            }
        case 40:
            if (yv != -1) {
                xv = 0; yv = 1;
                break;
            }
    }

}

</script>