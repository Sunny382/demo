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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	</head>
			<style>
                	.speaker-content ul {
                    margin: 0;
                    border: 1px solid #ededed;
                    border-radius: 6px;
                    padding: 19px;
                    box-shadow: rgb(191 189 227 / 36%) 3px 3px 6px 0px inset, rgb(255 255 255 / 50%) -6px -6px 4px 14px inset;

                }
                .speaker-icon {
                    font-size: 65px;
                    color: #5651bb5c;
                }
                .speaker-content ul li:first-child {
                    border-top: none;
                }
                speaker-content ul li .speaker-icon {
                    padding: 20px 0px;
                    border-right: 1px solid #ededed;
                    width: 60px;
                    text-align: center;
                    font-size: 28px;
                }
                .speaker-content ul li .speaker-addres {
                    padding: 15px 0;
                    padding-left: 30px;
                }
                .speaker-content ul li .speaker-addres span {
                    font-size: 0.875rem;
                    font-weight: 600;
                    color: #383a50;
                }
                .speaker-content ul li .speaker-addres p {
                    margin-bottom: 0;
                    color: #2b5797;
                    letter-spacing: 2px;
                    font-size: 26px;
                }
                .speaker-content ul li {
                    list-style: none;
                    display: flex;
                    border-top: 1px solid #ededed;
                    padding: 0;
                }
                .p-t-b-80{
                	padding-top: 60px;
                	padding-bottom: 30px;
                }
                .question_attempt_list {
                    list-style: none;
                    margin: 35px;
                    display: inline-block;
                    padding: 13px;
                }
                .question_attempt_list > li {
                    font-size: 16px;
                    color: #555;
                    margin: 8px 0;

                }
                 span.correct {
                    background-color: #4ec64e;
                    display: inline-block;
                    width: 13px;
                    height: 13px;
                    margin-right: 26px;
                }
                 span.incorrect {
                    background-color: #e54a4a;
                    display: inline-block;
                    width: 13px;
                    height: 13px;
                    margin-right: 26px;
                }
                 span.skipped {
                    background-color: #e54a4a;
                    display: inline-block;
                    width: 13px;
                    height: 13px;
                    margin-right: 26px;
                }
                .card_perform {
                    box-shadow: rgb(0 0 0 / 15%) 0px 2px 8px;
                    padding: 21px;
                }
                h4.perf_card {
                    text-align: center;
                    margin-bottom: 31px;
                    color: #562ba8;
                }
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
			</style>
	<body>
		<section class="p-t-b-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4><i class="fa fa-paperclip" aria-hidden="true"></i> You have completed the quiz, with the score  <strong><u>2/16</u></strong></h4>
						<p>Once you have viewed the solution, the maximum marks that you can obtain is <u>90%</u> of the total marks.</p>
					</div>
				</div>
			</div>
		</section>
		<section class="p-t-b-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="speaker-content">
						<ul>
                             <li>
                                <div class="speaker-icon"><i class="fa fa-clock-o"></i></div>
                                    <div class="speaker-addres">
                                        <span>Total Time Taken</span>
                                        <p>02 M : 13 S</p>
                                    </div>
                             </li>
                        </ul>
                      </div>
					</div>
					<div class="col-lg-4">
						<div class="speaker-content">
						<ul>
                             <li>
                                <div class="speaker-icon"><i class="fa fa-clock-o"></i></div>
                                    <div class="speaker-addres">
                                        <span>Average Time Taken</span>
                                        <p>17 Sec</p>
                                    </div>
                             </li>
                        </ul>
                      </div>
					</div>
					<div class="col-lg-4">
						<div class="speaker-content">
						<ul>
                             <li>
                                <div class="speaker-icon"><i class="fa fa-clock-o"></i></div>
                                    <div class="speaker-addres">
                                        <span>Accuracy</span>
                                        <p>13%</p>
                                    </div>
                             </li>
                        </ul>
                      </div>
					</div>
				</div>
			</div>
		</section>
		<section class="p-t-b-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h4 class="perf_card">Here’s your performance card</h4>

							<div class="card_perform">
						<div class="row">
							<div class="col-lg-6">
								<ul class="question_attempt_list">
		                            <li>
		                                <span  class="correct"></span>1 Correct</li>
		                            <li>
		                                <span  class="incorrect"></span>7 Incorrect</li>
		                            <li>
		                                <span  class="skipped"></span>0 Skipped</li>
		                        </ul>
							</div>
							<div class="col-lg-6">
								<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
							</div>
						</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div  class="col-lg-6">
                    	<button  class="fill_btn mx-auto d-block">View Solution</button>
                    </div>
                    <div  class="col-lg-6">
                    	<button class="hollw_btn mx-auto d-block">Re-Attempt</button>
                    </div>
                    <div class="col-lg-12">
                    	<p class="text-center pt-5">Note : Once you view the solution and re-attempt the quiz, the maximum marks that you can obtain
                            is 90% of total marks.</p>
                    </div>
                </div>
				</div>
			</div>
		</section>

        <script>
        var xValues = ["correct", "incorrect", "skipped"];
        var yValues = [15, 10, 44];
        var barColors = [
          "#b91d47",
          "#00aba9",
          "#2b5797",
        ];

        new Chart("myChart", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          }
        });
        </script>
	</body>
</html>