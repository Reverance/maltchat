<style type="text/css">
	body {
		background-color: #000;
	}
	img {
		position: absolute;
		top: 300px;
		left: 47.5%;
		width: 5%;
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
        border: 5px solid #fff;
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

<title>Flappy Bird</title>

<h1>FLAPPY BIRD</h1>

<canvas id="canvas" width="288" height="512">
	
</canvas>

<a onclick="respawn()"><img id="re_button" src="images/replay.png"></a>

<script type="text/javascript">
	
window.onload = function() {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
    document.addEventListener("keydown",keyPush);
    setInterval(game,1000/15);
}

re_button = document.getElementById('re_button');
re_button.style.display = "none";
score = 0;
player = new Image();
player.src = "images/bird.png";
bg = new Image();
bg.src = "images/bg.png";
fg = new Image();
fg.src = "images/fg.png";
npole = new Image();
npole.src = "images/pipeNorth.png";
spole = new Image();
spole.src = "images/pipeSouth.png";
fly = new Audio();
fly.src = "sounds/fly.mp3";
score_sound = new Audio();
score_sound.src = "sounds/score.mp3";
pw = 40;
ph = 40;
px = canvas.width / 5;
py = (canvas.height / 3) - (ph / 2);
fall = 15;
speed = 15;
up = 0;
pipe = [];
pipe.push({x:canvas.width,y:0,scored:0,spawnused:0});
a = 0;

function game() {
	draw();
	score_text_update();
	player_pos_update();
}

function score_text_update() {
	//score text update
	ctx.fillStyle = "black";
	ctx.font = "20px Verdana";
	ctx.fillText("Score: "+score,20,canvas.height-20);
}

function draw() {
	//draw bg
	ctx.drawImage(bg,0,0,canvas.width,canvas.height);

	//draw bird
	ctx.drawImage(player,px,py,pw,ph);

	//draw pipe
	for (var i = 0; i < pipe.length; i++) {
		ctx.drawImage(npole,pipe[i].x,pipe[i].y,50,250);
		ctx.drawImage(spole,pipe[i].x,pipe[i].y+400,50,250);
		pipe[i].x -= speed;
		if (pipe[i].scored == 0 && pipe[i].x + 50 < px) {
			score++;
			score_sound.play();
			pipe[i].scored = 1;
		}
		if (pipe[i].y + 400 < py + ph && pipe[i].x < px + pw && pipe[i].x + 50 > px) {
			dead();
		}
		if (pipe[i].y + 250 > py && pipe[i].x < px + pw && pipe[i].x + 50 > px) {
			dead();
		}
		if (pipe[i].x <= canvas.width - 50 && pipe[i].spawnused == 0) {
			pipe[i].spawnused = 1;
			pipe_spawn();
		}
	}

	//draw fg
	ctx.drawImage(fg,0,canvas.height-75,canvas.width,75);
}

function pipe_spawn() {
	a = Math.floor(Math.random() * 250) - 250;
	if (a < -60) {
		pipe_spawn();
	} else if (a > 0) {
		pipe_spawn();
	} else {
		pipe.push({x:canvas.width+150,y:a,scored:0,spawnused:0});
	}
}

function player_pos_update() {
	if (py >= canvas.height - 75 - ph) {
		dead();
	} else {
		fall = 15;
	}
	if (up != 0) {
		py -= up;
		up = 0;
	} else {
		py += fall;
	}
}

function dead() {
	flag = true;
	speed = 0;
	up = 0;
	re_button.style.display = "block";
	if (px >= canvas.height) {
		fall = 0;
	}
}

function keyPush(event) {
    //keys
    switch(event.keyCode) {
    	case 32:
    		jump();
    }
}

function respawn() {
	px = canvas.width / 5;
	py = (canvas.height / 2) - (ph / 2);
	fall = 15;
	score = 0;
	up = 0;
	speed = 15;
	re_button.style.display = "none";
	pipe = [];
	pipe.push({x:canvas.width,y:0,scored:0,scored:0,spawnused:0});
}

function jump() {
	up = 60;
	fly.play();
}

</script>