<title>Javascript Games</title>
<style>
	body, html {
	    background-color: #000;
	    color: #fff;
	    text-align: center;
	    height: 100%;
	    overflow-y: hidden;
	}
	canvas {
	    padding-left: 0;
	    padding-right: 0;
	    margin: auto;
	    display: block;
		border: 4px solid #555;
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

<h1 id="text">TANKZ</h1>

<canvas id="canvas" width="600" height="600"></canvas>

<script>
	
window.onload = function() {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
	document.addEventListener("keydown",keypush);
	setInterval(game, 100/15);
	setInterval(spawn, 3000);
}

//open vars
{
	bg = new Image();
	bg.src = 'tankz/bg.png';
	mob = new Image();
	mob.src = 'tankz/mob.png';
	pa = new Image();
	pa.src = 'tankz/p1a.png';
	pb = new Image();
	pb.src = 'tankz/p1b.png';
	pc = new Image();
	pc.src = 'tankz/p1c.png';
	pd = new Image();
	pd.src = 'tankz/p1d.png';
	pe = new Image();
	pe.src = 'tankz/p1e.png';
	pf = new Image();
	pf.src = 'tankz/p1f.png';
	pg = new Image();
	pg.src = 'tankz/p1g.png';
	ph = new Image();
	ph.src = 'tankz/p1h.png';
	p1 = pa;
	p2 = pa;
	pwidth = pheigth = 50;
	px2 = (canvas.height / 4) - (pwidth / 2);
	py2 = (canvas.height / 2) - (pwidth / 2);
	px1 = (canvas.height / 4) * 3 - (pwidth / 2);
	py1 = (canvas.height / 2) - (pwidth / 2);
	speed = 10;
	bullets = [];
	bullets.push({x:0,y:0,hit:0,direction:1});
	mobs = [];
	score1 = 0;
	score2 = 0;
}

function keypush(event) {
	switch(event.keyCode) {
		case 37:
			if (p1 == pa) {
				p1 = ph;
				break;
			} else if (p1 == ph) {
				p1 = pg;
				break;
			} else if (p1 == pg) {
				p1 = pf;
				break;
			} else if (p1 == pf) {
				p1 = pe;
				break;
			} else if (p1 == pe) {
				p1 = pd;
				break;
			} else if (p1 == pd) {
				p1 = pc;
				break;
			} else if (p1 == pc) {
				p1 = pb;
				break;
			} else if (p1 == pb) {
				p1 = pa;
				break;
			}
		case 39:
			if (p1 == pa) {
				p1 = pb;
				break;
			} else if (p1 == ph) {
				p1 = pa;
				break;
			} else if (p1 == pg) {
				p1 = ph;
				break;
			} else if (p1 == pf) {
				p1 = pg;
				break;
			} else if (p1 == pe) {
				p1 = pf;
				break;
			} else if (p1 == pd) {
				p1 = pe;
				break;
			} else if (p1 == pc) {
				p1 = pd;
				break;
			} else if (p1 == pb) {
				p1 = pc;
				break;
			}
		case 38:
			move_forward_1(speed);
			break;
		case 40:
			move_backward_1(speed);
			break;
		case 77:
			player = 1;
			shoot();
			break;
		case 65:
			if (p2 == pa) {
				p2 = ph;
				break;
			} else if (p2 == ph) {
				p2 = pg;
				break;
			} else if (p2 == pg) {
				p2 = pf;
				break;
			} else if (p2 == pf) {
				p2 = pe;
				break;
			} else if (p2 == pe) {
				p2 = pd;
				break;
			} else if (p2 == pd) {
				p2 = pc;
				break;
			} else if (p2 == pc) {
				p2 = pb;
				break;
			} else if (p2 == pb) {
				p2 = pa;
				break;
			}
		case 68:
			if (p2 == pa) {
				p2 = pb;
				break;
			} else if (p2 == ph) {
				p2 = pa;
				break;
			} else if (p2 == pg) {
				p2 = ph;
				break;
			} else if (p2 == pf) {
				p2 = pg;
				break;
			} else if (p2 == pe) {
				p2 = pf;
				break;
			} else if (p2 == pd) {
				p2 = pe;
				break;
			} else if (p2 == pc) {
				p2 = pd;
				break;
			} else if (p2 == pb) {
				p2 = pc;
				break;
			}
		case 87:
			move_forward_2(speed);
			break;
		case 83:
			move_backward_2(speed);
			break;
		case 69:
			player = 2;
			shoot();
			break;
	}
}

function move_forward_1(speed) {
	if (p1 == pa) {
		py1 -= this.speed;
	} else if (p1 == pb) {
		py1 -= this.speed;
		px1 += this.speed;
	} else if (p1 == pc) {
		px1 += this.speed;
	} else if (p1 == pd) {
		py1 += this.speed;
		px1 += this.speed;
	} else if (p1 == pe) {
		py1 += this.speed;
	} else if (p1 == pf) {
		py1 += this.speed;
		px1 -= this.speed;
	} else if (p1 == pg) {
		px1 -= this.speed;
	} else if (p1 == ph) {
		py1 -= this.speed;
		px1 -= this.speed;
	} 
}

function move_backward_1(speed) {
	if (p1 == pa) {
		py1 += this.speed;
	} else if (p1 == pb) {
		py1 += this.speed;
		px1 -= this.speed;
	} else if (p1 == pc) {
		px1 -= this.speed;
	} else if (p1 == pd) {
		py1 -= this.speed;
		px1 -= this.speed;
	} else if (p1 == pe) {
		py1 -= this.speed;
	} else if (p1 == pf) {
		py1 -= this.speed;
		px1 += this.speed;
	} else if (p1 == pg) {
		px1 += this.speed;
	} else if (p1 == ph) {
		py1 += this.speed;
		px1 += this.speed;
	} 
}

function move_forward_2(speed) {
	if (p2 == pa) {
		py2 -= this.speed;
	} else if (p2 == pb) {
		py2 -= this.speed;
		px2 += this.speed;
	} else if (p2 == pc) {
		px2 += this.speed;
	} else if (p2 == pd) {
		py2 += this.speed;
		px2 += this.speed;
	} else if (p2 == pe) {
		py2 += this.speed;
	} else if (p2 == pf) {
		py2 += this.speed;
		px2 -= this.speed;
	} else if (p2 == pg) {
		px2 -= this.speed;
	} else if (p2 == ph) {
		py2 -= this.speed;
		px2 -= this.speed;
	} 
}

function move_backward_2(speed) {
	if (p2 == pa) {
		py2 += this.speed;
	} else if (p2 == pb) {
		py2 += this.speed;
		px2 -= this.speed;
	} else if (p2 == pc) {
		px2 -= this.speed;
	} else if (p2 == pd) {
		py2 -= this.speed;
		px2 -= this.speed;
	} else if (p2 == pe) {
		py2 -= this.speed;
	} else if (p2 == pf) {
		py2 -= this.speed;
		px2 += this.speed;
	} else if (p2 == pg) {
		px2 += this.speed;
	} else if (p2 == ph) {
		py2 += this.speed;
		px2 += this.speed;
	} 
}

function shoot() {
	if (player == 1) {
		if (p1 == pa) {
			this.direction = 1;
		} else if (p1 == pb) {
			this.direction = 2;
		} else if (p1 == pc) {
			this.direction = 3;
		} else if (p1 == pd) {
			this.direction = 4;
		} else if (p1 == pe) {
			this.direction = 5;
		} else if (p1 == pf) {
			this.direction = 6;
		} else if (p1 == pg) {
			this.direction = 7;
		} else if (p1 == ph) {
			this.direction = 8;
		}
		bullets.push({
			x:px1 + (pwidth / 2) - 2.5,y:py1+(pheigth/2) - 2.5,hit:0,direction:this.direction,owner:1
		});
	} else if (player == 2) {
		if (p2 == pa) {
			this.direction = 1;
		} else if (p2 == pb) {
			this.direction = 2;
		} else if (p2 == pc) {
			this.direction = 3;
		} else if (p2 == pd) {
			this.direction = 4;
		} else if (p2 == pe) {
			this.direction = 5;
		} else if (p2 == pf) {
			this.direction = 6;
		} else if (p2 == pg) {
			this.direction = 7;
		} else if (p2 == ph) {
			this.direction = 8;
		}
		bullets.push({
			x:px2 + (pwidth / 2) - 2.5,y:py2+(pheigth/2) - 2.5,hit:0,direction:this.direction,owner:2
		});
	}
}

function game() {
	draw();
}

function draw() {
	ctx.fillStyle = 'white';
	ctx.fillRect(0,0,canvas.width,canvas.height);

	ctx.fillStyle = "black";
	ctx.font = "20px Verdana";
	ctx.fillText("P1 Score: "+score2,20,canvas.height-40);
	ctx.fillText("P2 Score: "+score1,20,canvas.height-20);

	for (var i = 0; i < bullets.length; i++) {
		ctx.fillStyle = 'black';
		ctx.fillRect(bullets[i].x,bullets[i].y,5,5);
		if (bullets[i].direction == 1) {
			bullets[i].y -= speed;
		} else if (bullets[i].direction == 2) {
			bullets[i].y -= speed;
			bullets[i].x += speed;
		} else if (bullets[i].direction == 3) {
			bullets[i].x += speed;
		} else if (bullets[i].direction == 4) {
			bullets[i].y += speed;
			bullets[i].x += speed;
		} else if (bullets[i].direction == 5) {
			bullets[i].y += speed;
		} else if (bullets[i].direction == 6) {
			bullets[i].y += speed;
			bullets[i].x -= speed;
		} else if (bullets[i].direction == 7) {
			bullets[i].x -= speed;
		} else if (bullets[i].direction == 8) {
			bullets[i].y -= speed;
			bullets[i].x -= speed;
		}
		for (var ii = 0; ii < mobs.length; ii++) {
			ctx.drawImage(mob,mobs[ii].x,mobs[ii].y,50,50);
			if (bullets[i].x < mobs[ii].x + 50 && bullets[i].x + 5 > mobs[ii].x && bullets[i].y < mobs[ii].y + 50 && bullets[i].y + 5 > mobs[ii].y) {
				mobs[ii].killed = bullets[i].owner;
				bullets[i].hit = 1;
			}
		}
	}
	remove_used();

	

	ctx.drawImage(p1,px1,py1,pwidth,pheigth);
	ctx.drawImage(p2,px2,py2,pwidth,pheigth);
}

function remove_used() {
	for (var i = 0; i < bullets.length; i++) {
		if (bullets[i].hit == 1) {
			bullets.splice(i,1);
		}
	}
	for (var i = 0; i < mobs.length; i++) {
		if (mobs[i].killed != 0) {
			if (mobs[i].killed == 1) {
				score1 += 1;
			}
			if (mobs[i].killed == 2) {
				score2 += 2;
			}
			mobs.splice(i,1);
		}
	}
}

function spawn() {
	a = Math.floor(Math.random() * (canvas.width - 100)) + 50;
	b = Math.floor(Math.random() * (canvas.height - 100)) + 50;
	mobs.push({
		x:a,y:b,health:5,killed:0
	});
}

</script>