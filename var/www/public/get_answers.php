<?php

require("../includes/functions.php");

if(!isset($_POST["round"]))
	exit;

$conn = dbConnect_new();

$roundrow = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_POST["round"]]);
if(empty($roundrow))
	exit;

$roundrow = $roundrow[0];

?>

		<?php if($roundrow["num_questions"] < 11): ?>
			<div class="col-md-4 col-md-offset-0 col-xs-offset-1 col-xs-10">
		<?php elseif($roundrow["num_questions"] < 21): ?>
                        <div class="col-md-6 col-md-offset-0 col-xs-offset-1 col-xs-10">
		<?php else: ?>
                      	<div class="col-md-8 col-md-offset-0 col-xs-offset-1 col-xs-10">
		<?php endif; ?>
			<div class="panel panel-primary">
               			<div class="panel-heading"><h4>Fill out answers</h4></div>
                		<div class="panel-body">
					<div class="row">
						<div class="col-xs-12">
                        				<label style="font-size:21px;" for="answers"><?php echo clean($roundrow["round_name"]); ?></label>
                        			</div>
					</div><br>
					<form id="answers" method="post" onsubmit="return checkSubmit();" action="">
						<input type="hidden" name="round" value="<?= $roundrow['RNDID'] ?>"></input>
						<?php for($i = 0; $i < $roundrow["num_questions"] / 30; $i++): ?>
							<div class="row">
		                               			<?php for($j = 0; $j < ($roundrow["num_questions"] - 30 * $i) / 10 && $j < 3; $j++): ?>
        		                               			<?php if($roundrow["num_questions"] < 11): ?>
									<div class="col-xs-offset-1 col-xs-10">
									<?php elseif($roundrow["num_questions"] < 21): ?>
									<div class="col-md-offset-1 col-md-5 col-xs-offset-1 col-xs-10">
									<?php else: ?>
									<div class="col-md-4 col-md-offset-0 col-xs-offset-1 col-xs-10">
									<?php endif; ?>
										<div class="form-group">
											<?php for($k = 0; $k < ($roundrow["num_questions"] - 30 * $i - 10 * $j) && $k < 10; $k++): ?>
												<div class="input-group">
                                	                					<span class="input-group-addon"><?php echo (30 * $i + 10 * $j + $k + 1); ?> </span>
               	                         	        					<input type="text" form="answers" class="form-control" name=<?= (30 * $i + 10 * $j + $k + 1)  . "question"?>></input>
               	                         						</div><br>
											<?php endfor; ?>
										</div>
        	                	        			</div>
								<?php endfor; ?>
							</div>
						<?php endfor; ?>
						<input type="hidden" name="numquestions" value="<?= $roundrow['num_questions'] ?>">
					</form>
				</div>
				<div class="panel-footer">
					<div class="row">
						<button type="submit" class="btn btn-primary col-xs-offset-2 col-xs-8 col-md-offset-4 col-md-4" name="answerssubmit" form="answers">Submit</button>
					</div>
				</div>
			</div>
		</div>

