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
}
button {
    width: 510px;
    text-align: center;
    height: 5%;
    background-color: #fff;
    border: none;
    border-top: 1px solid #000;
}
button:hover {
    opacity: 0.8;
    cursor: pointer;
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

<a href="index.php"><button id="back">BACK</button></a>

<title>Connect 4</title>

<h1>Connect 4</h1>

<canvas id="gc" width="500" height="500">
	
</canvas>

<div style="text-align: center; width: 500px; margin: auto;">
<button onclick="left()" style="width: 33%; float: left;">LEFT</button>
<button onclick="enter()" style="width: 34%; float: left;">ENTER</button>
<button onclick="right()" style="width: 33%; float: left;">RIGHT</button>
</div>

<div style="text-align: center;" id="resetBtn">
<button onclick="location.reload()">Reset</button>
</div>

<script type="text/javascript">

window.onload = function() {
    canv = document.getElementById("gc");
    ctx = canv.getContext("2d");
    document.addEventListener("keydown",keyPush);
    m = setInterval(game,10);
}    

c1 = "#ff0000";
c2 = "#ffff00";
p1 = [];
p2 = [];
pos = [75,125,175,225,275,325,375];
turn = 1;
turnPosY = 50;
turnPosX = 225;
setX = 225;
turnMove = 0;
targetY = 450;
grid = {r1:0,r2:0,r3:0,r4:0,r5:0,r6:0,r7:0};
win = 0;
winTime = 0;
resetBtn = document.getElementById("resetBtn");
resetBtn.style.display = 'none';

function game() {

	draw();
    if (winTime > 15) {
        alert('Player ' + win + ' Has Won The Game!!!');
        resetBtn.style.display = 'block';
        clearInterval(m);
    }

}


function draw() {
	
	//bg
	ctx.fillStyle = "#ffffff";
	ctx.fillRect(0,0,canv.width,canv.height);

    //board thingy
    ctx.fillStyle = "#2222ff";
    ctx.fillRect(75,150,350,350);

    if (turn == 1) {
        ctx.fillStyle = c1;
    } else if (turn == 2) {
        ctx.fillStyle = c2;
    }
    if (turnMove == 1) {
        turnPosX = setX;
        if (turnPosX == pos[0]) {
            if (grid.r1 != 0) {
                targetY = 450 - (grid.r1 * 50);
            } else {
                targetY = 450;
            }
            if (grid.r1 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        } else if (turnPosX == pos[1]) {
            if (grid.r2 != 0) {
                targetY = 450 - (grid.r2 * 50);
            } else {
                targetY = 450;
            }
            if (grid.r2 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        } else if (turnPosX == pos[2]) {
            if (grid.r3 != 0) {
                targetY = 450 - (grid.r3 * 50);
            } else {
                targetY = 450;
            }
            if (grid.r3 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        } else if (turnPosX == pos[3]) {
            if (grid.r4 == 0) {
                targetY = 450;
            } else {
                targetY = 450 - grid.r4 * 50;
            }
            if (grid.r4 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        } else if (turnPosX == pos[4]) {
            if (grid.r5 != 0) {
                targetY = 450 - (grid.r5 * 50);
            } else {
                targetY = 450;
            }
            if (grid.r5 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        } else if (turnPosX == pos[5]) {
            if (grid.r6 != 0) {
                targetY = 450 - (grid.r6 * 50);
            } else {
                targetY = 450;
            }
            if (grid.r6 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        } else if (turnPosX == pos[6]) {
            if (grid.r7 != 0) {
                targetY = 450 - (grid.r7 * 50);
            } else {
                targetY = 450;
            }
            if (grid.r1 == 7) {
                alert('error');
                turnMove = 0;
                return;
            }
        }
        turnPosY+=5;
        if (turnPosY == targetY) {
            if (turnPosX == pos[0]) {
                grid.r1++;
            } else if (turnPosX == pos[1]) {
                grid.r2++;
            } else if (turnPosX == pos[2]) {
                grid.r3++;
            } else if (turnPosX == pos[3]) {
                grid.r4++;
            } else if (turnPosX == pos[4]) {
                grid.r5++;
            } else if (turnPosX == pos[5]) {
                grid.r6++;
            } else if (turnPosX == pos[6]) {
                grid.r7++;
            }
            if (turn == 1) {
                p1.push({
                    x:turnPosX,y:turnPosY
                });
                turn = 2;
                turnPosX = 225;
                turnPosY = 50;
            } else if (turn == 2) {
                p2.push({
                    x:turnPosX,y:turnPosY
                });
                turn = 1;
                turnPosX = 225;
                turnPosY = 50;
            }
            turnMove = 0;
        }
    }
    ctx.fillRect(turnPosX,turnPosY,50,50);

    ctx.fillStyle = c1;
    for (var i = 0; i < p1.length; i++) {
        ctx.fillRect(p1[i].x,p1[i].y,50,50)
    }
    ctx.fillStyle = c2;
    for (var i = 0; i < p2.length; i++) {
        ctx.fillRect(p2[i].x,p2[i].y,50,50)
    }
    checkWin();
}

function checkWin() {
    for (i = 0; i < p1.length; i++) {
        for (var ii = 0; ii < 8; ii++) {
            count = 0;
            for (var iii = 0; iii < 3; iii++) {
                if (ii == 0) {
                    childdata = ctx.getImageData(p1[i].x + ((iii + 1) * 50),p1[i].y+10,1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 0) {
                        count+=1;
                    } 
                } else if (ii == 1) {
                    childdata = ctx.getImageData(p1[i].x + ((iii + 1) * 50),p1[i].y+((iii + 1) * 50),1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 0) {
                        count+=1;
                    } 
                } else if (ii == 2) {
                    childdata = ctx.getImageData(p1[i].x + 10,p1[i].y+((iii + 1) * 50),1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 0) {
                        count+=1;
                    } 
                } else if (ii == 3) {
                    childdata = ctx.getImageData(p1[i].x + ((iii + 1) * 50),p1[i].y-((iii + 1) * 50),1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 0) {
                        count+=1;
                    } 
                }
            }
            if (count == 3) {
                win = 1;
                winTime++;
                return true;
            }
        }
    }
    for (i = 0; i < p2.length; i++) {
        for (var ii = 0; ii < 8; ii++) {
            count = 0;
            for (var iii = 0; iii < 3; iii++) {
                if (ii == 0) {
                    childdata = ctx.getImageData(p2[i].x + ((iii + 1) * 50),p2[i].y+10,1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 255) {
                        count+=1;
                    } 
                } else if (ii == 1) {
                    childdata = ctx.getImageData(p2[i].x + ((iii + 1) * 50),p2[i].y+((iii + 1) * 50),1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 255) {
                        count+=1;
                    } 
                } else if (ii == 2) {
                    childdata = ctx.getImageData(p2[i].x + 10,p2[i].y+((iii + 1) * 50),1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 255) {
                        count+=1;
                    } 
                } else if (ii == 3) {
                    childdata = ctx.getImageData(p2[i].x + ((iii + 1) * 50),p2[i].y-((iii + 1) * 50),1,1);
                    pix = childdata.data;
                    if (pix[0] == 255 && pix[1] == 255) {
                        count+=1;
                    } 
                }
            }
            if (count == 3) {
                win = 2;
                winTime++;
                return true;
            }
        }
    }
}

function keyPush(event) {
    switch (event.keyCode) {
        case 37:
            left();
            break;
        case 39:
            right();
            break;
        case 13:
            enter();
            break;
    }
}

function left() {
    if (turnPosX != 75) {
        turnPosX -= 50;
    }
}

function right() {
    if (turnPosX != 375) {
        turnPosX += 50;
    }
}

function enter() {
    setX = turnPosX;
    turnMove = 1;
}

</script>