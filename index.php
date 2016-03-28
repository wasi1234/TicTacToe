<!DOCTYPE html>
<html>
<head>
	 
	<title>Tic Tac Toe</title>
	<link rel="stylesheet" type="text/css" href="style.css">



	</head>
<body onload="startGame();">
<h1>Tic Tac Toe</h1>

<div class="center" id="message">message will go here  </div>
<table>
	<tr> 
		<td id="s1" class="square" onclick="nextMove(this);"></td>
		<td id="s2" class="square" onclick="nextMove(this);"></td>
		<td id="s3" class="square" onclick="nextMove(this);"></td>

	</tr>
	<tr> 
		<td id="s4" class="square" onclick="nextMove(this);"></td>
		<td id="s5" class="square" onclick="nextMove(this);"></td>
		<td id="s6" class="square" onclick="nextMove(this);"></td>

	</tr>
	<tr> 
		<td id="s7" class="square" onclick="nextMove(this);"></td>
		<td id="s8" class="square" onclick="nextMove(this);"></td>
		<td id="s9" class="square" onclick="nextMove(this);"></td>

	</tr>
</table>
<script type="text/javascript">
		function startGame(){

			for (var i=1; i<=9; i++) {
				clearBox(i);
			}
			document.turn= "X"
			if (Math.random() < 0.5) {
				document.turn = "O";
			}
            document.winner = null; 
			setMessage(document.turn + " gets to start.");
		}

		function setMessage(msg){
			
			document.getElementById("message").innerText= msg;
		}
		function nextMove(square){
			if (document.winner != null){
				setMessage(document.winner+ " already won the game.");
			}
			else  if (square.innerText == ""){
			square.innerText=document.turn;
			switchTurn();
		}
		else {
			setMessage("That square is already used.");
		}
	} 
		function switchTurn() {

            if (winingCombinations(document.turn)){
            	setMessage("Congratulation, " + document.turn + " !you won!!!!");
            	document.winner = document.turn;

           }
			else if (document.turn == "X") {
				document.turn = "O";
				setMessage("It's " + document.turn + " 's turn!");
			}
			else {
				document.turn="X";
				setMessage("It's " + document.turn + " 's turn!");
			}

			
		}
          
          function winingCombinations(move) {
          	var result =false;
          	if (checkWinners(1,2,3,move)|| 
          		checkWinners(4,5,6,move)|| 
          		checkWinners(7,8,9,move)|| 
          		checkWinners(1,4,7,move)|| 
          		checkWinners(2,5,8,move)||
          		checkWinners(3,6,9,move)|| 
          		checkWinners(1,5,9,move)|| 
          		checkWinners(3,5,7,move)) {
          		
          		result=true;
          	}
          	return result;
          }
		
		function checkWinners(a, b, c, move) {
			var result = false;
			if (getBox(a) == move && getBox(b) == move && getBox(c) == move){
				result = true;
			}

			return result;
		}

		function clearBox(number) {
			return document.getElementById("s" + number).innerText = " ";
		}

		function getBox(number) {
			return document.getElementById("s" + number).innerText;
		}
	</script>
	<div class="center">
		
   		<a href="javascript:startGame();" id="restart">Restart Game</a>
	</div>
</body>
</html>

