<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading" style="color: white">Preguntas frecuentes</div>
			<div class="panel-body">
				<div id="accordion"><?php
					foreach ($questions as $key => $value) { ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<input 
										onchange="help_desk.update_question({
											question: $(this).val(),
											id: '<?php echo $value['id'] ?>'
										})"
										id="input_question_<?php echo $value['id'] ?>"
										style="cursor: pointer; height: 41px"
										data-toggle="collapse" 
										data-target="#question_<?php echo $key ?>"
										value="<?php echo $value['question'] ?>"
										type="text" 
										class="form-control"
										readonly="true">
									<span class="input-group-btn"><?php
										if ($objet['from_user'] != 1) { ?>
											<button 
												onclick="
													$('#input_question_<?php echo $value['id'] ?>').prop('readonly', false);
													$('#input_question_<?php echo $value['id'] ?>').select();
													$('#input_answer_<?php echo $value['id'] ?>').prop('readonly', false);
													$('#input_answer_<?php echo $value['id'] ?>').prop('readonly', false);
													$('#question_<?php echo $key ?>').collapse('show');"
												class="btn btn-primary">
												<i class="fa fa-pencil"></i>
											</button>
											<button 
												onclick="help_desk.delete_question({
													id: '<?php echo $value['id'] ?>',
													state: '<?php echo $objet['state'] ?>',
													municipality: '<?php echo $objet['municipality'] ?>'
												})"
												class="btn btn-danger">
												<i class="fa fa-trash"></i>
											</button><?php
										} ?>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div id="question_<?php echo $key ?>" class="collapse panel-body">
									<input 
										onchange="help_desk.update_question({
											answer: $(this).val(),
											id: '<?php echo $value['id'] ?>'
										})"
										id="input_answer_<?php echo $value['id'] ?>"
										style="cursor: pointer; height: 41px"
										value="<?php echo $value['answer'] ?>"
										type="text" 
										class="form-control"
										readonly="true">
								</div>
							</div>
						</div><?php
					} ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">Nueva pregunta</div>
			<div class="panel-body">
				<label>Pregunta:</label><br />
				<input type="text" id="question" class="form-control" />
				<label>Respuesta:</label><br />
				<input type="text" id="answer" class="form-control" /><br />
				<button 
					onclick="help_desk.create_question({
						question: $('#question').val(),
						answer: $('#answer').val(),
						state: '<?php echo $objet['state'] ?>',
						municipality: '<?php echo $objet['municipality'] ?>'
					})"
					class="btn btn-warning">
					<i class="fa fa-check"></i> Crear
				</button>
			</div>
		</div>
	</div>
</div>