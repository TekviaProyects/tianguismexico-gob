<?php
// Validate the requests
	if (empty($questions)) {?>
		<div align="center">
			No hay preguntas en esta dependencia
		</div><?php
		
		return;
	} ?>
	
	<div class="row">
		<div class="col-sm-12">
			<input type="search" class="form-control" placeholder="Buscar..." id="input_search_questions">
		</div>
	</div><br />
	<div id="div_all_questions"><?php
		foreach ($questions as $key => $value) { ?>
			<div class="row search_item" name="<?php echo $value['question'] ?>">
				<div class="col-sm-12">
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
<script>
	var palabra = '';
	
	$("#input_search_questions").keyup(function() {
		palabra = $(this).val().toLowerCase();
	    
	    $('.search_item').show();
		
		if(palabra === ""){
			return;
		}
		
	    $("#div_all_questions").find('.search_item').each(function(e){
            if($(this).attr("name").toLowerCase().indexOf(""+palabra) < 0){
                $(this).hide();
            }
		});
	});
</script>