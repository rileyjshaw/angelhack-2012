var pg = 1;

var right2 = document.getElementById('right2').innerHTML;
var right3 = document.getElementById('right3').innerHTML;
var left3 = document.getElementById('left3').innerHTML;

//right2 = right2.replace(/\r?\n|\r/g," ");
//left2 = left2.replace(/\r?\n|\r/g," ");

document.getElementById('login').onclick = function() {
	document.getElementById('loginbox').style.right = '-10px';
}

clearBudget = function() {
	document.getElementById('lowrange').style.color = 'rgb(210,225,255)';
	document.getElementById('midrange').style.color = 'rgb(210,225,255)';
	document.getElementById('highrange').style.color = 'rgb(210,225,255)';
}

document.getElementById('lowrange').onclick = function() {
	clearBudget();
	document.getElementById('lowrange').style.color = '#19dbb0';
}

document.getElementById('midrange').onclick = function() {
	clearBudget();
	document.getElementById('midrange').style.color = '#19dbb0';
}

document.getElementById('highrange').onclick = function() {
	clearBudget();
	document.getElementById('highrange').style.color = '#19dbb0';
}

document.getElementById('next').onclick = function() {
	pg++;
	if(pg===2) {
		document.getElementById('rightmain').style.height = '690px';
		document.getElementById('rightc').style.height = '662px';
	  	document.getElementById('right1').innerHTML = right2;
	  	document.getElementById('next').innerHTML = 'Get my itinerary';
	}
	else if(pg===3) {
		document.getElementById('leftmain').innerHTML = left3;
		document.getElementById('leftmain').style.cssText += ';' + 'height: 678px; margin-top: -5px; -moz-border-radius: 0.4em;	-webkit-border-radius: 0.4em; border-radius: 0.4em; background: #fcfccc;';
		document.getElementById('right1').innerHTML = right3;
		document.getElementById('next').innerHTML = 'Try again!';
	}
	else if(pg>3) {
		pg=0;
		document.location.reload(true);
	}
}