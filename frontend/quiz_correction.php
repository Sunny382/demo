<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quiz page</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

</head>
		<style>
			.content { 
				margin-top:54px; 
			}
			.header {
		    padding: 15px;
		    position: fixed;
		    top: 0;
		    background: #521d7a;
		    width: 100%;
		    z-index: 9999;
		}
		.left-title
		 { 
		 	width:50%px; color:#FFF; font-size:18px; float:left; 
		 }
		.right-title
		 { 
		 	width:50%; text-align:right; float:right; color:#FFF;font-size: 21px; 
		 	 }
		.quiz-body
		 { 
		 	margin-top:50px; padding-bottom:50px; 
		 }
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
		        display: flex;
		    justify-content: space-between;
		    align-items: center;
		}
		.right-answer {
		    color: #07be07;
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
		input#qa {
		    accent-color: red;
		    margin-top: 0.4rem;
		}

		.scre {
		    display: flex;
		    justify-content: space-evenly;
		    align-items: center;
		}
		.scre i {
		    font-size: 54px;
		    padding: 15px;
		    color: orange;
		    padding: 5px;
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
			        </div>
			        <div class="col-lg-4 offset-lg-1 pt-3">
			        		<div class="quest_review">
			        			<div class="scre"><i class="fa fa-trophy" aria-hidden="true"></i>
			        				<h5> Your Score</h5>
									<h5><u>0/16</u></h5>
								</div>
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
			</div> 
	</div>
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
				}
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
										  "<input type='checkbox' class='form-check-input' name='option'   id='q"+key+"' value='" + quiz.JS[this.currentque].options[0][key] + "'><span id='optionval'>" +
											  quiz.JS[this.currentque].options[0][key] +
										 "</span></label>" + "<div class='right-answer'>answer right</div>"
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
					
				$('#question-options').on('change', 'input[type=checkbox][name=option]', function(e) {

						//var radio = $(this).find('input:radio');
						$(this).prop("checkbox", true);
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
		</body>
</html>

