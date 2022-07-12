<!-- Name: Schneider Campfort Jean-Pierre -->
<!-- Date: 10/16/2021 -->
<!-- Tested with Google Chrome Browser -->

<?php
		  $user = "root";
		  $pword = "";
		  $dbase = "schneiderminiproject2";
		  $mydb = new mysqli('localhost', $user, $pword, $dbase);
		  if ($mydb->connect_error) {
			die( "Failed to connect to MySQL: " . $mydb->connect_error);
		  }
		  
		  $names = array(20);
		  $iVal = 0;
		  $query = "SELECT name FROM celebs;";
		  if ($result = $mydb->query($query)) {
			while ($row = $result->fetch_assoc()) {
			  foreach ( $row as $key => $value ) {
				  $names[$iVal] = $value;
				  $iVal++;
			  }
			}
		  }
		  
		  $pics = array(20);
		  $iVal = 0;
		  $query = "SELECT url FROM celebs;";
		  if ($result = $mydb->query($query)) {
			while ($row = $result->fetch_assoc()) {
			  foreach ( $row as $key => $value ) {
				  $pics[$iVal] = $value;
				  $iVal++;
			  }
			}
		  }
		  
		  $mydb->close();
	?>
	
<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title> Celebrity Quiz </title> 
      <style type = "text/css">
           img           {display: block;
						text-align: center; 
						margin-right: auto;
						margin-left: auto;
						height: 330px;		 }
         body 		{background-image: url( 6Background.jpg );
					background-position: center;
					background-repeat: repeat;
					background-attachment: fixed;
					background-color: black;}
		.button     { background-color: black;
					  color: white;
					  text-align: center;
					  margin-left: 43%;
					  margin-right: 43%;
					  font-size: 25px;
					  display: block;
                      cursor: pointer;}
		h1			{text-align: center;}
		.back		{background-color: black;
					color: white}
		.button:hover { background-color: white;
						color: black;}
		.disabled {opacity: 0;
		           cursor: not-allowed;
}
      </style>
	  <!--- https://commons.wikimedia.org/w/index.php?search=background&title=Special:MediaSearch&go=Go&type=image -->
	  
      <script>
	    var score = 0; 
		var Images = new Array(20);
		var CButtons = new Array (4);
		var length = CButtons.length;
		var qList = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
		var cList = [0,1,2,3];
		
		var chosen = <?= json_encode($names) ?>;
		var pic = <?= json_encode($pics) ?>;
	
		
		shuffle(qList);
		
		
		
		
		

		function start()
         {
            var button = document.getElementById( "startButton" );
            button.addEventListener( "click", QuestionStart, false );
			var length = CButtons.length;
			
			for( var i = 0; i < length; ++i )
			{
			    CButtons[i] = document.getElementById( (i+1) + "Choice" );
			}

		 }
		 function QuestionStart()
		 {
		 
		 document.getElementById( "startButton" ).setAttribute("class", "disabled");
		  document.getElementById( "CAnswer" ).setAttribute("value", "Correct Answer");
		  document.getElementById( "CAnswer" ).setAttribute("class", "button");
		 document.getElementById( "next" ).setAttribute("value", "Next Question");
		 document.getElementById( "next" ).setAttribute("class", "button");
		 
		 
		 
		 QuestionSetup(qList[0], 0);
		 
		 }
		 function shuffle(arr) 
		{     
			for (var i = 0; i < arr.length; i++)
			{ var j = Math.floor(Math.random() * arr.length);      
			  var temp = arr[i];       
			  arr[i] = arr[j];       
		      arr[j] = temp;    
			}   
		} 
		 
		 function QuestionSetup(qNum, qListVal)
		 {
		
			var chosenNum = qNum -1;
				cn1 =  Math.floor( 0 + Math.random() * 19);                                                                     		
				cn2 =  Math.floor( 0 + Math.random() * 19);
				cn3 =  Math.floor( 0 + Math.random() * 19);                                                                     
			
			while ( (cn1 == cn2) || (cn1 == cn3) || (cn1 == chosenNum) || (cn2 == cn3) || (cn2 == chosenNum) || (cn3 == chosenNum) )
			{
				cn1 =  Math.floor( 0 + Math.random() * 19); 
				cn2 =  Math.floor( 0 + Math.random() * 19);
				cn3 =  Math.floor( 0 + Math.random() * 19); 
			}
			
			if (qNum == 1)
			{
				QuestionSetup2(chosen[0], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[0]);
			}
			if (qNum == 2)
			{
				QuestionSetup2(chosen[1], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal, pic[1]);
			}
			if (qNum == 3)
			{
				QuestionSetup2(chosen[2], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[2]);
			}
			if (qNum == 4)
			{
				QuestionSetup2(chosen[3], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[3]);
			}
			if (qNum == 5)
			{
				QuestionSetup2(chosen[4], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[4]);
			}
			if (qNum == 6)
			{
				QuestionSetup2(chosen[5], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[5]);
			}
			if (qNum == 7)
			{
				QuestionSetup2(chosen[6], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[6]);
			}
			if (qNum == 8)
			{
				QuestionSetup2(chosen[7], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[7]);
			}
			if (qNum == 9)
			{
				QuestionSetup2(chosen[8], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[8]);
			}
			if (qNum == 10)
			{
				QuestionSetup2(chosen[9], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[9]);
			}
			if (qNum == 11)
			{
				QuestionSetup2(chosen[10], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[10]);
			}
			if (qNum == 12)
			{
				QuestionSetup2(chosen[11], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[11]);
			}
			if (qNum == 13)
			{
				QuestionSetup2(chosen[12], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[12]);
			}
			if (qNum == 14)
			{
				QuestionSetup2(chosen[13], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[13]);
			}
			if (qNum == 15)
			{
				QuestionSetup2(chosen[14], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[14]);
			}
			if (qNum == 16)
			{
				QuestionSetup2(chosen[15], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[15]);
			}
			if (qNum == 17)
			{
				QuestionSetup2(chosen[16], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[16]);
			}
			if (qNum == 18)
			{
				QuestionSetup2(chosen[17], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[17]);
			}
			if (qNum == 19)
			{
				QuestionSetup2(chosen[18], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[18]);
			}
			if (qNum == 20)
			{
				QuestionSetup2(chosen[19], chosen[cn1], chosen[cn2], chosen[cn3], qNum, qListVal , pic[19]);
			}
			
		 }
		 
		
		 
		 function QuestionSetup2(choice1, choice2, choice3, choice4, questionNum, qListVal , image)
		 {
		 	document.getElementById( "startButton" ).setAttribute("class", "disabled");
			document.getElementById( "progress" ).innerHTML = "You are on question " + (qListVal+1) + " of 20 Questions";
			document.getElementById( "headerT" ).innerHTML = "";
			document.getElementById( "display" ).setAttribute("src", image);
			document.getElementById( "display" ).setAttribute("alt", "Image for Question " + questionNum);
			document.getElementById( "score" ).innerHTML = "You have a current score of " + score + " correct of 20 Questions";
			document.getElementById( "CAnswer" ).setAttribute("value", "Correct Answer");
			document.getElementById( "next" ).setAttribute("class", "button");
			
			
			
			
			var length = CButtons.length;
		 for (var i = 0; i < length; ++i)
		 {
			CButtons[i].setAttribute("class", "button");
		 }
		  
			shuffle(cList);

		CButtons[cList[0]].setAttribute("value", choice1);
		CButtons[cList[1]].setAttribute("value", choice2);
		CButtons[cList[2]].setAttribute("value", choice3);
		CButtons[cList[3]].setAttribute("value", choice4);
	
		  
		
		CButtons[cList[0]].onclick = function(){CorrectA(choice1, cList[0], questionNum, qListVal )};

		CButtons[cList[1]].onclick = function(){WrongA(choice2, cList[1], questionNum, qListVal )};

		CButtons[cList[2]].onclick = function(){WrongA(choice3, cList[2], questionNum, qListVal )};
		 
		CButtons[cList[3]].onclick = function(){WrongA(choice4, cList[3], questionNum, qListVal )};
	
		document.getElementById( "CAnswer" ).onclick = function(){CheckAnswer(choice1, cList[0], qListVal)};
		document.getElementById( "next" ).onclick = function(){QuestionSetup(qList[qListVal+1], qListVal+1)};
		
		
		  
		 
		 }
		 function CheckAnswer (cChoice, cNum, qListVal)
		 {
			CButtons[cNum].setAttribute("background-color", "green");
			var length = CButtons.length;
			
			for( var i = 0; i < length; ++i )
			{
					CButtons[i].setAttribute("class", "disabled");
				
			}
			document.getElementById( "headerT" ).innerHTML = "The correct answer is: " + cChoice + "." ;
			document.getElementById( "startButton" ).setAttribute("class", "button");
			document.getElementById( "startButton" ).setAttribute("value", "Try Again!");
			document.getElementById( "startButton" ).onclick = function(){QuestionSetup(qList[qListVal], qListVal)};
			
		 }
		 
		 function CorrectA(choice, cNum, qNum, qListVal )
		 {
			CButtons[cNum].setAttribute("background-color", "green");
			document.getElementById( "headerT" ).innerHTML = "Correct!";
			var length = CButtons.length;
			for (var i = 0; i < length; ++i)
			 {
				CButtons[i].setAttribute("class", "disabled");
			 }
			 
			 qListVal++;
			 score++;
			 
			 
				document.getElementById( "next" ).setAttribute("class", "disabled");
				document.getElementById( "startButton" ).setAttribute("class", "button");
				document.getElementById( "startButton" ).setAttribute("value", "Next Question");
				document.getElementById( "startButton" ).onclick = function(){QuestionSetup(qList[qListVal], qListVal)};
				document.getElementById( "score" ).innerHTML = "You have a current score of " + score + " correct of 20 Questions";
			
			
		 }
		 
		 function WrongA(choice, cNum, qNum, qListVal)
		 {
			CButtons[cNum].setAttribute("background-color", "red");
			document.getElementById( "headerT" ).innerHTML = "Wrong Answer Try Another Answer!";
			var length = CButtons.length;
			
			for( var i = 0; i < length; ++i )
			{
			    CButtons[i].setAttribute("class", "disabled");;
			}
			document.getElementById( "startButton" ).setAttribute("class", "button");
			document.getElementById( "startButton" ).setAttribute("value", "Try Again!");
			document.getElementById( "startButton" ).onclick = function(){QuestionSetup(qList[qListVal], qListVal)};
			
		 }
		 
		 window.addEventListener( "load", start, false );
		 </script>
	</head>
   <body>
		<h1 id="progress"></h1>
      <p><img id = "display" src = "welcome.png" alt = "Welcome Image"></p>
      <form action = "#">
		  <h1 id="headerT"></h1>
		  <input id = "startButton" type = "button" class = "button" value = "Begin Quiz"> <br>
		 <input id = "1Choice" type = "button" class = "disabled" value = "">
		 <input id = "2Choice" type = "button" class = "disabled" value = "">
		 <input id = "3Choice" type = "button" class = "disabled" value = "">
		 <input id = "4Choice" type = "button" class = "disabled" value = ""> <br>
	
		 <input id = "CAnswer" type = "button" class = "disabled" value = "">
		 <input id = "next" type = "button" class = "disabled" value = "">
	
		 
      </form>
	  <h1 id="score" class = "back" ></h1>
   </body>
</html>