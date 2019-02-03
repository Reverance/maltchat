<title>Block Run</title>
<style type="text/css">
html, body {
	background-color: #000;
	color: #fff;
	height: 100%;
	text-align: center;
    overflow-y: hidden;
}
canvas {
    padding-left: 0;
    padding-right: 0;
    margin: auto;
    display: block;
	border: 4px solid #fff;
}
img {
    position: absolute;
    width: 10%;
    top: 300px;
    left: 45%;
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
<h1>Block Run</h1>
<a id="replay" href="#" onclick="reset()"><img src="images/replay.png"></a>
<canvas id="canvas" width="400" height="600">
	
</canvas>
<script type="text/javascript">

window.onload = function() {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
    document.addEventListener("keydown",keyPush);
    setInterval(game,100/15);
}

replay = document.getElementById('replay');
replay.style.display = 'none';
score = 0;
score_audio = new Audio();
score_audio.src = "blockrun/score.mp3";
die_audio = new Audio();
die_audio.src = "blockrun/die.mp3";
bg = new Image();
bg.src = 'blockrun/bg.png';
px = 175;
py = 400;
ph=pw=50;
block = [];
reward = [];
bremove = [];
rremove = [];
speed = 1;
spawn();
dead_audio_played = 0;

function game() {
	draw();
}

function draw() {
    //bg
	ctx.drawImage(bg,0,0,400,500);

    //draw block
    for (var i = 0; i < block.length; i++) {
        ctx.fillStyle = "blue";
        ctx.fillRect(block[i].x,block[i].y,pw,ph);
        block[i].y+= speed;
        if (block[i].y >= 250 && block[i].spawnused == 0) {
            block[i].spawnused = 1;
            spawn();
        }
        if (block[i].y + ph >= py && block[i].y <= py + ph & block[i].x == px) {
            dead();
        }
        if (block[i].y >= 500) {
            bremove.push(i);
        }
    }


    //player
    ctx.fillStyle = 'red';
    ctx.fillRect(px,py,pw,ph);

    //draw reward
    for (var i = 0; i < reward.length; i++) {
        ctx.fillStyle = "#990000";
        ctx.fillRect(reward[i].x,reward[i].y,pw,ph);
        reward[i].y+= speed;
        if (reward[i].y + ph >= py && reward[i].y <= py + ph & reward[i].x == px && reward[i].scored == 0) {
            reward[i].scored = 1;
            score++;
            score_audio.play();
            speed+=0.05;
            rremove.push(i);
        }
        if (reward[i].y >= 500) {
            rremove.push(i);
        }
    }


    //draw bottom
    ctx.fillStyle = "black";
    ctx.fillRect(0,500,400,100);
    ctx.fillStyle = "white";
    ctx.font = "20px Verdana";
    ctx.fillText("Score: "+score,20,canvas.height-20);

    //remove used block and reward
    remove_used();
}

function spawn() {
    a = Math.floor(Math.random()*3) + 1;
    c = Math.floor(Math.random()*2) + 1;
    if (a == 1) {
        b = 68;
        if (c == 1) {
            d = 175;
        } else if (c==2) {
            d=283;
        }
    } else if (a==2) {
        b=175;
        if (c == 1) {
            d = 68;
        } else if (c==2) {
            d=283;
        }
    } else if (a==3) {
        b=283;
        if (c == 1) {
            d = 68;
        } else if (c==2) {
            d=175;
        }
    }

    block.push({x:b,y:-100,spawnused:0});
    reward.push({x:d,y:-100,scored:0});

}

function keyPush(event) {
	switch(event.keyCode) {
		case 37:
            px = 68;
            break;
		case 38:
			px = 175;
            break;
		case 39:
			px = 283;
            break;
		case 40:
			px = 175;
            break;
	}
}

function dead() {
    if (dead_audio_played == 0) {
        die_audio.play();
        dead_audio_played = 1;
        replay.style.display = 'block';
    }
    speed = 0;
}

function reset() {
    px = 175;
    py = 400;
    ph=pw=50;
    block = [];
    reward = [];
    speed = 1;
    spawn();
    score = 0;   
    dead_audio_played = 0; 
    replay.style.display = 'none';
}

function remove_used() {
    for (var i = 0; i < rremove.length; i++) {
        reward.splice(rremove[i],1);
    }
    for (var i = 0; i < bremove.length; i++) {
        block.splice(bremove[i],1);
    }
    rremove = [];
    bremove = [];
}

</script>