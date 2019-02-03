<title>Name</title>
<style type="text/css">
html, body {
    height: 100%;
    overflow-y: hidden;
    background-color: #000;
    color: #fff;
}
h1 {
	text-align: center;
	color: #fff;
}
canvas {
    padding-left: 0;
    padding-right: 0;
    margin: auto;
    display: block;
    border: 10px solid #f0f0f0;
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
<script type="text/javascript">

window.onload = function() {
	gc = document.getElementById('gc');
	ctx = gc.getContext('2d');
	document.addEventListener('keydown',keypush);
    document.addEventListener('keyup',keyloss);
	setInterval(game,10);
}

bg = new Image();
bg.src = "runner/bg.png";
bg_low = new Image();
bg_low.src = "runner/bg-low.png";
bgx = 0;
bgy = 300;
ply = 250;
yJumpTarget = 120;
isJump = false;
jumpTime = 0;
plx = 100;
plw = plh = 50;
plc = '#ff3333';
plspeed = 5;


function keypush(event) {
    switch(event.keyCode) {
        case 37:
            if (plx == 100) {
                break;
            }
            plx-=plspeed;
            break;
        case 38:
            if (isJump == false) {
                isJump = true;
            }
            break;
        case 39:
            if (plx == 400) {
                bgx-=plspeed;
            } else {
                plx+=plspeed;
            }
            break;
        case 40:
            ply = 280;
            plh = 20;
            break;
    }
}

function keyloss(event) {
    switch (event.keyCode) {
        case 40:
            ply = 250;
            plh = 50;
            break;
    }
}

function game() {
    updateVars();
	draw();
}

function draw() {
    //bg
    ctx.drawImage(bg,0,0,800,300);
    ctx.drawImage(bg_low,bgx,bgy,800,100);
    ctx.drawImage(bg_low,bgx+800,bgy,800,100);

    //player
    ctx.fillStyle = plc;
    ctx.fillRect(plx, ply, plw, plh);
}

function updateVars() {
    if (bgx <= -800) {
        bgx = 0;
    }
    if (isJump == true) {
        jumpTime++;
        ply = 175;
    }
    if (jumpTime == 50) {
        ply = 250;
        isJump = false;
    }
    if (isJump == false) {
        jumpTime = 0;
    }
}

</script>
<a href="index.php"><button id="back">BACK</button></a>
<h1>Name</h1><br>
<canvas id="gc" width="800" height="400"></canvas>