<?php
    include '../database/dbconfig.php';
	session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

</head>
<style>
	.content { margin-top:54px; }
	.header {
    padding: 15px;
    position: fixed;
    top: 0;
    background: #521d7a;
    width: 100%;
    z-index: 9999;
}
.left-title { width:50%px; color:#FFF; font-size:18px; float:left; }
.right-title { width:50%; text-align:right; float:right; color:#FFF;font-size: 21px;  }
.quiz-body { margin-top:50px; padding-bottom:50px; }
.option-block-container {
    margin-top: 37px;
    max-width: 100%;
}
.option-block {
    padding: 15px;
    background: white;
    /* border: 1px solid #dcdcdc; */
    margin-bottom: 17px;
    cursor: pointer;
    border-radius: 8px;
    box-shadow: rgb(0 0 0 / 25%) 0px 0.0625em 0.0625em, rgb(0 0 0 / 25%) 0px 0.125em 0.5em, rgb(255 255 255 / 10%) 0px 0px 0px 1px inset;
}
.result-question { font-weight:bold; }
.c-wrong { margin-left:20px; color:#FF0000; }
.c-correct {  margin-left:20px; color:green; }
.last-row { border-bottom:1px solid #ccc; padding-bottom:25px; margin-bottom:25px; }
.res-header { border-bottom:1px solid #ccc; margin-bottom:15px; padding-bottom:15px; }
.fill_btn {
    font-size: 19px;
    width: 166px;
    height: 45px;
    margin-top: 21px;
    background: #562ba8;
    color: white;
    border-radius: 4px;
}
.hollw_btn {
    font-size: 19px;
    width: 166px;
    height: 45px;
    margin-top: 21px;
        border-radius: 4px;
}
.base-timer {
	margin-top: 20px;
  position: relative;
  width: 200px;
  height: 200px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}
.base-timer__label {
    position: absolute;
    width: 200px;
    height: 200px;
    top: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 38px;
}
.legend ul li {
    list-style: none;
}
.legend li {
    margin-bottom: 14px;
    word-spacing: 4px;
}
.legend {
    box-shadow: rgb(0 0 0 / 15%) 0px 5px 15px 0px;
    padding: 5px;
    margin: 13px 4px;
}
.legend h4 {
    text-align: center;
    margin-bottom: 17px;
    margin-top: 25px;
    font-size: 19px;
    font-weight: 800;
}
i.fa.fa-circle.current {
    color: mediumblue;
}
i.fa.fa-circle.attmp {
    color: green;
}
i.fa.fa-circle.skip {
    color: orange;
}
.quest_review ul li {
    list-style: none;
    display: inline-block;
    padding: 8px;
    margin: 7px;
    border: 1px solid #dedede;
    height: 42px;
    text-align: center;
    width: 37px;
    box-shadow: rgb(60 64 67 / 30%) 0px 1px 2px 0px, rgb(60 64 67 / 15%) 0px 1px 3px 1px;
    border-radius: 4px;
}
.quest_review ul {
    padding: 0px;
    margin: 0px;
}
.quest_review {
    box-shadow: rgb(0 0 0 / 15%) 0px 5px 15px 0px;
    padding: 5px;
    margin: 13px 4px;
}
div#app {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
    <header class="header sect_ion">
      
      <div class="left-title">Modal Quiz</div>
      <div class="right-title">Total Questions: <span id="tque"></span></div>
      <div class="clearfix"></div>
    </header>
<div class="content">
<div class="container">
	
	<div class="row">
		<div class="col-lg-7">
        	<div id="result" class="quiz-body">
            <form name="quizForm" onSubmit="">
            	<fieldset class="form-group">
    			<h4><span id="qid">1.</span> <span id="question"></span></h4>
                
                <div class="option-block-container" id="question-options">
                  
                 </div> <!-- End of option block -->
                 </fieldset>
                 <button  name="previous" id="previous" class="btn btn-success fill_btn">Previous</button>
                 &nbsp;
                 <button  name="next" id="next" class="btn btn-success hollw_btn">Next</button>
           </form>
           </div>
        </div> <!-- End of col-sm-12 -->
        <div class="col-lg-4 offset-lg-1">
        	<div class="quiz-body quest_review">
        		<h4 class="text-center" id="navbar">Time Remaning <span id="timer"></span></h4>
				<button class="button" id="mybut" onclick="myFunction()">START QUIZ</button>
	        	<div id="app"></div>
	        </div>
	        	<div class="quest_review">
        		<ul>
        			<li>
        				<span>1</span>
        			</li>
        			<li>
        				<span>2</span>
        			</li>
        			<li>
        				<span>3</span>
        			</li>
        			<li>
        				<span>4</span>
        			</li>
        			<li>
        				<span>5</span>
        			</li>
        			<li>
        				<span>6</span>
        			</li>
        			<li>
        				<span>7</span>
        			</li>
        			<li>
        				<span>8</span>
        			</li>
        			<li>
        				<span>9</span>
        			</li>
        		</ul>
        	</div>
	        	<div class="legend">
	        		<h4>Legend</h4>
	        		<ul>
	        			<li><i class="fa fa-circle attmp" aria-hidden="true"></i> Attempted</li>
							<li><i class="fa fa-circle current" aria-hidden="true"></i> Current Question</li>
							 <li> <i class="fa fa-circle skip" aria-hidden="true"></i> Skipped</li>
							 <li><i class="fa fa-circle mark" aria-hidden="true"></i> Mark for Review</li>
	        		</ul>
	        	</div>
        
        </div>
    </div> <!-- End of row -->
</div> <!-- ENd of container fluid -->
</div> <!-- End of content -->
<script>
var quiz = { "JS" : [
	{
		"id" : 1,
		"question" : "Inside which HTML element do we put the JavaScript?",
		"options" : [
			{"a": "&lt;script&gt;", 
			 "b":"&lt;javascript&gt;", 
			 "c":"&lt;scripting&gt;", 
			 "d":"&lt;js&gt;"}
			],
		"answer":"&lt;script&gt;",
		"score":0,
		"status": ""
	},
	{
		"id" : 2,
		"question" : "Where is the correct place to insert a JavaScript?",
		"options" : [
			{"a": "The &lt;head&gt; section", 
			 "b":"The &lt;body&gt; section", 
			 "c":"Both the &lt;head&gt; section and the &lt;body&gt; section are correct"}
			],
		"answer":"Both the &lt;head&gt; section and the &lt;body&gt; section are correct",
		"score":0,
		"status": ""
	},
	{
		"id" : 3,
		"question" : "What is the correct syntax for referring to an external script called 'xxx.js'?",
		"options" : [
			{"a": "&ltscript href=&quot;xxx.js&quot;>", 
			 "b":"&lt;script name=&quot;xxx.js&quot;&gt;", 
			 "c":"&lt;script src=&quot;xxx.js&quot;&gt;"}
			],
		"answer":"&lt;script src=&quot;xxx.js&quot;&gt;",
		"score":0,
		"status": ""
	},
	{
		"id" : 4,
		"question" : "The external JavaScript file must contain the &lt;script&gt; tag.",
		"options" : [
			{"a": "True", 
			 "b":"False"
			}
			],
		"answer":"False",
		"score":0,
		"status": ""
	},
	{
		"id" : 5,
		"question" : "How do you write &quot;Hello World&quot; in an alert box?",
		"options" : [
			{"a": "alertBox(&quot;Hello World&quot;);", 
			 "b":"msg(&quot;Hello World&quot;);",
			 "c":"alert(&quot;Hello World&quot;);",
			 "d":"msgBox(&quot;Hello World&quot;);",
			}
			],
		"answer":"alert(&quot;Hello World&quot;);",
		"score":0,
		"status": ""
	},	
	/*{
		"id" : 6,
		"question" : "How do you create a function in JavaScript?",
		"options" : [
			{"a": "function myFunction()", 
			 "b":"function:myFunction()",
			 "c":"function = myFunction()",
			}
			],
		"answer":"function myFunction()",
		"score":0,
		"status": ""
	},
	{
		"id" : 7,
		"question" : "How do you call a function named &quot;myFunction&quot;?",
		"options" : [
			{"a": "call function myFunction()", 
			 "b":"call myFunction()",
			 "c":"myFunction()",
			}
			],
		"answer":"myFunction()",
		"score":0,
		"status": ""
	},
	{
		"id" : 8,
		"question" : "How to write an IF statement in JavaScript?",
		"options" : [
			{"a": "if i = 5 then", 
			 "b":"if i == 5 then",
			 "c":"if (i == 5)",
			 "d":" if i = 5",
			}
			],
		"answer":"if (i == 5)",
		"score":0,
		"status": ""
	},
	{
		"id" : 9,
		"question" : "Which of the following is a disadvantage of using JavaScript?",
		"options" : [
			{"a": "Client-side JavaScript does not allow the reading or writing of files.", 
			 "b":"JavaScript can not be used for Networking applications because there is no such support available.",
			 "c":"JavaScript doesn't have any multithreading or multiprocess capabilities.",
			 "d":"All of the above."
			}
			],
		"answer":"All of the above.",
		"score":0,
		"status": ""
	},
	{
		"id" : 10,
		"question" : "How to write an IF statement for executing some code if &quot;i&quot; is NOT equal to 5?",
		"options" : [
			{"a": "if (i <> 5)", 
			 "b":"if i <> 5",
			 "c":"if (i != 5)",
			 "d":"if i =! 5 then",
			}
			],
		"answer":"if (i != 5)",
		"score":0,
		"status": ""
	},
	{
		"id" : 11,
		"question" : "How does a WHILE loop start?",
		"options" : [
			{"a": "while i = 1 to 10", 
			 "b":"while (i &lt;= 10; i++)",
			 "c":"while (i &lt;= 10)"
			}
			],
		"answer":"while (i &lt;= 10)",
		"score":0,
		"status": ""
	},
	{
		"id" : 12,
		"question" : "How does a FOR loop start?",
		"options" : [
			{"a": "for (i = 0; i &lt;= 5)", 
			 "b":"for (i = 0; i &lt;= 5; i++)",
			 "c":"for i = 1 to 5",
			 "d":"for (i &lt;= 5; i++)"
			}
			],
		"answer":"for (i = 0; i &lt;= 5; i++)",
		"score":0,
		"status": ""
	},
	{
		"id" : 13,
		"question" : "How can you add a comment in a JavaScript?",
		"options" : [
			{"a": "//This is a comment", 
			 "b":"&sbquo;This is a comment",
			 "c":"&lt;!--This is a comment--&gt;"
			}
			],
		"answer":"//This is a comment",
		"score":0,
		"status": ""
	},
	{
		"id" : 14,
		"question" : "How to insert a comment that has more than one line?",
		"options" : [
			{"a": "\\This comment has more than one line", 
			 "b":"//This comment has more than one line//",
			 "c":"&lt;!--This comment has more than one line--&gt;"
			}
			],
		"answer":"//This comment has more than one line",
		"score":0,
		"status": ""
	},
	{
		"id" : 15,
		"question" : "What is the correct way to write a JavaScript array?",
		"options" : [
			{"a": "var colors = (1:&quot;red&quot;, 2:&quot;green&quot;, 3:&quot;blue&quot;)", 
			 "b":"var colors = [&quot;red&quot;, &quot;green&quot;, &quot;blue&quot;]",
			 "c":"var colors = 1 = (&quot;red&quot;), 2 = (&quot;green&quot;), 3 = (&quot;blue&quot;)",
			 "d":"var colors = &quot;red&quot;, &quot;green&quot;, &quot;blue&quot;"
			}
			],
		"answer":"var colors = [&quot;red&quot;, &quot;green&quot;, &quot;blue&quot;]",
		"score":0,
		"status": ""
	},
	{
		"id" : 16,
		"question" : "How do you round the number 7.25, to the nearest integer?",
		"options" : [
			{"a": "rnd(7.25)", 
			 "b":"Math.round(7.25)",
			 "c":"Math.rnd(7.25)",
			 "d":"round(7.25)"
			}
			],
		"answer":"Math.round(7.25)",
		"score":0,
		"status": ""
	},
	{
		"id" : 17,
		"question" : "How do you find the number with the highest value of x and y?",
		"options" : [
			{"a": "Math.max(x, y)", 
			 "b":"Math.ceil(x, y)",
			 "c":"top(x, y)",
			 "d":"ceil(x, y)"
			}
			],
		"answer":"Math.max(x, y)",
		"score":0,
		"status": ""
	},
	{
		"id" : 18,
		"question" : "What is the correct JavaScript syntax for opening a new window called &quot;w2&quot;?",
		"options" : [
			{"a": "w2 = window.new(&quot;http://www.w3schools.com&quot;);", 
			 "b":"w2 = window.open(&quot;http://www.w3schools.com&quot;);"

			}
			],
		"answer":"w2 = window.open(&quot;http://www.w3schools.com&quot;);",
		"score":0,
		"status": ""
	},
	{
		"id" : 19,
		"question" : "JavaScript is the same as Java.",
		"options" : [
			{"a": "true", 
			 "b":"false"

			}
			],
		"answer":"false",
		"score":0,
		"status": ""
	},
	{
		"id" : 20,
		"question" : "How can you detect the client&rsquo;s browser name?",
		"options" : [
			{"a": "navigator.appName", 
			 "b":"browser.name",
			 "c":"client.navName"
			}
			],
		"answer":"navigator.appName",
		"score":0,
		"status": ""
	},
	{
		"id" : 21,
		"question" : "Which event occurs when the user clicks on an HTML element?",
		"options" : [
			{"a": "onchange", 
			 "b":"onclick",
			 "c":"onmouseclick",
			 "d":"onmouseover"
			}
			],
		"answer":"onclick",
		"score":0,
		"status": ""
	},
	{
		"id" : 22,
		"question" : "How do you declare a JavaScript variable?",
		"options" : [
			{"a": "var carName;", 
			 "b":"variable carName;",
			 "c":"v carName;"
			}
			],
		"answer":"var carName;",
		"score":0,
		"status": ""
	},
	{
		"id" : 23,
		"question" : "Which operator is used to assign a value to a variable?",
		"options" : [
			{"a": "*", 
			 "b":"-",
			 "c":"=",
			 "d":"x"
			}
			],
		"answer":"=",
		"score":0,
		"status": ""
	},
	{
		"id" : 24,
		"question" : "What will the following code return: Boolean(10 &gt; 9)",
		"options" : [
			{"a": "NaN", 
			 "b":"false",
			 "c":"true"
			}
			],
		"answer":"true",
		"score":0,
		"status": ""
	},
	{
		"id" : 25,
		"question" : "Is JavaScript case-sensitive?",
		"options" : [
			{"a": "No", 
			 "b":"Yes"
			}
			],
		"answer":"Yes",
		"score":0,
		"status": ""
	}*/
	]
}



var quizApp = function() {

	this.score = 0;		
	this.qno = 1;
	this.currentque = 0;
	var totalque = quiz.JS.length;

	
	this.displayQuiz = function(cque) {
		this.currentque = cque;
		if(this.currentque <  totalque) {
			$("#tque").html(totalque);
			$("#previous").attr("disabled", false);
			$("#next").attr("disabled", false);
			$("#qid").html(quiz.JS[this.currentque].id + '.');
	
			
			$("#question").html(quiz.JS[this.currentque].question);	
			 $("#question-options").html("");
			for (var key in quiz.JS[this.currentque].options[0]) {
			  if (quiz.JS[this.currentque].options[0].hasOwnProperty(key)) {
		
				$("#question-options").append(
					"<div class='form-check option-block'>" +
					"<label class='form-check-label'>" +
							  "<input type='radio' class='form-check-input' name='option'   id='q"+key+"' value='" + quiz.JS[this.currentque].options[0][key] + "'><span id='optionval'>" +
								  quiz.JS[this.currentque].options[0][key] +
							 "</span></label>"
				);
			  }
			}
		}
		if(this.currentque <= 0) {
			$("#previous").attr("disabled", true);	
		}
		if(this.currentque >= totalque) {
				$('#next').attr('disabled', true);
				for(var i = 0; i < totalque; i++) {
					this.score = this.score + quiz.JS[i].score;
				}
			return this.showResult(this.score);	
		}
	}
	
	this.showResult = function(scr) {
		$("#result").addClass('result');
		$("#result").html("<h1 class='res-header'>Total Score: &nbsp;" + scr  + '/' + totalque + "</h1>");
		for(var j = 0; j < totalque; j++) {
			var res;
			if(quiz.JS[j].score == 0) {
					res = '<span class="wrong">' + quiz.JS[j].score + '</span><i class="fa fa-remove c-wrong"></i>';
			} else {
				res = '<span class="correct">' + quiz.JS[j].score + '</span><i class="fa fa-check c-correct"></i>';
			}
			$("#result").append(
			'<div class="result-question"><span>Q ' + quiz.JS[j].id + '</span> &nbsp;' + quiz.JS[j].question + '</div>' +
			'<div><b>Correct answer:</b> &nbsp;' + quiz.JS[j].answer + '</div>' +
			'<div class="last-row"><b>Score:</b> &nbsp;' + res +
			
			'</div>' 
			
			);
			
		}
	}
	
	this.checkAnswer = function(option) {
		var answer = quiz.JS[this.currentque].answer;
		option = option.replace(/\</g,"&lt;")   //for <
		option = option.replace(/\>/g,"&gt;")   //for >
		option = option.replace(/"/g, "&quot;")

		if(option ==  quiz.JS[this.currentque].answer) {
			if(quiz.JS[this.currentque].score == "") {
				quiz.JS[this.currentque].score = 1;
				quiz.JS[this.currentque].status = "correct";
		}
		} else {
			quiz.JS[this.currentque].status = "wrong";
		}
		
	}	
	 
	this.changeQuestion = function(cque) {
			this.currentque = this.currentque + cque;
			this.displayQuiz(this.currentque);	
			
	}
	
}


var jsq = new quizApp();

var selectedopt;
	$(document).ready(function() {
			jsq.displayQuiz(0);		
		
	$('#question-options').on('change', 'input[type=radio][name=option]', function(e) {

			//var radio = $(this).find('input:radio');
			$(this).prop("checked", true);
				selectedopt = $(this).val();
		});
		
			
			 
	});

	
	
	
	$('#next').click(function(e) {
			e.preventDefault();
			if(selectedopt) {
				jsq.checkAnswer(selectedopt);
			}
			jsq.changeQuestion(1);
	});	
	
	$('#previous').click(function(e) {
		e.preventDefault();
		if(selectedopt) {
			jsq.checkAnswer(selectedopt);
		}
			jsq.changeQuestion(-1);
	});	
</script>
<script>
	const FULL_DASH_ARRAY = 600;
const WARNING_THRESHOLD = 400;
const ALERT_THRESHOLD = 200;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 900;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
</script>

<!-- backend roll     -->


<div id="myDIV" style="padding: 10px 30px;">
<form action="result.php" method="post" id="form">  				
<table><?php   $fetchqry = "SELECT * FROM `quiz`";
				$result=mysqli_query($con,$fetchqry);
				$num=mysqli_num_rows($result);
				
			   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		  ?>
  <!--<tr><td><h3><br><?php echo @$snr +=1;?>&nbsp;-&nbsp;<?php echo @$row['que'];?></h3></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;a )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;b )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;c )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;d )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
			    <?php  }
																	?> 
		<tr><td align="center"><button class="button3" name="click" >Submit Quiz</button></td></tr>-->
	</table>
  <form>
</div>
<script>
function myFunction() {
	var x = document.getElementById("myDIV");
    var b = document.getElementById("mybut");
    var x = document.getElementById("myDIV");
	if (x.style.display === "none") { 
	b.style.visibility = 'hidden';
	//x.style.display = "block";
	startTimer();
}
}

window.onload = function() {
  document.getElementById('myDIV').style.display = 'none';
};
</script>
<?php			$fetchtime = "SELECT `timer` FROM `quiz` WHERE id=1";
				$fetched = mysqli_query($con,$fetchtime);
				$time = mysqli_fetch_array($fetched,MYSQLI_ASSOC);
				$settime = $time['timer'];		
						?>
 <script type="text/javascript">

document.getElementById('timer').innerHTML = '<?php echo $settime; ?>';
  //03 + ":" + 00 ;


function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m==0 && s==0){document.getElementById("form").submit();}
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
  if(sec == 0 && m == 0){ alert('stop it')};
}
</script>



</body>
</html>