<style type="text/css">
	input {
		width: 30px;
	}
</style>
Write in format:<br> ( a + b ) to power of c<br>
a
<input type="text" id="a"><br>b
<input type="text" id="b"><br>c
<input type="text" id="c"><br>
<button onclick="calculate()">Submit</button>

<script type="text/javascript">
function calculate() {
	pos1 = [];
	blist = [];
	clist = [];
	a = document.getElementById('a').value;
	b = document.getElementById('b').value;
	c = document.getElementById('c').value;
	randomVara = 1;
	for (i = 0; i < c; i++) { //for n!
		randomVara = randomVara * (i+1);
	}
	console.log('a - ' + randomVara);
	randomVarb = 1;
	for (i=0;i<c;i++) { //for EVERY case of k!
		blist.push(randomVarb);
		console.log('b - ' + randomVarb);
		randomVarb = randomVarb * (i+1);
	}
	for (i = 0; i < c; i++) {//brackets
		randomVarc = c - i;//brackets
		console.log('c - ' + randomVarc);
		randomVard = 1;
		for (ii = 0; ii < randomVarc; ii++) {//for every value of (n-k)!
			randomVard = randomVard * (ii+1);
		}
		console.log('d - ' + randomVard);
		clist.push(randomVard);
	}
	for (i = 0; i < c; i++) {
		result = randomVara / (blist[i] * clist[i]);
		pos1.push(result);
		console.log('result - ',result);
	}
	pos1.push(1);
	console.log('result - ',1);
}
</script>