<?php
// Validate the requests
	if (empty($questions)) {?>
		<div align="center">
			Sin datos
		</div><?php

		return;
	} ?>

	<h3>
		Resuelve fácilmente tus preguntas, 
		escribe sobre el tema de tu interés en la barra que se muestra a continuación:
	</h3><br />
	<div class="row">
		<div class="col-sm-12">
			<div class="input-group input-group-lg">
				<input type="search" class="form-control" placeholder="Ej: &quot;hora limite&quot;, &quot;Pagos&quot;, &quot;Horarios&quot;. " id="input_search_questions">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="buscar($('#input_search_questions').val())">
						<i class="fa fa-search"></i> Buscar
					</button>
				</span>
			</div>
		</div>
	</div><br />
	<audio src="" hidden class="speech"> </audio>
	<div id="div_all_questions"><?php
		foreach ($questions as $key => $value) { ?>
			<div class="row search_item" name="<?php echo $value['question'] ?>" answer="<?php echo $value['answer'] ?>">
				<div class="col-sm-12">
					<div class="input-group">
						<input
							id="input_question_<?php echo $value['id'] ?>"
							style="cursor: pointer; height: 41px"
							data-toggle="collapse"
							data-target="#question_<?php echo $key ?>"
							value="<?php echo $value['question'] ?>"
							type="text"
							class="form-control"
							readonly="true">
						<span class="input-group-btn">
							<button
								class="btn btn-default"
								type="button"
								onclick="leer({
									question: 'input_question_<?php echo $value['id'] ?>',
									answer: 'question_<?php echo $key ?>'
								})">
								<i class="fa fa-bullhorn"></i> Leer
							</button>
						</span>
					</div>
				</div>
				<div class="col-sm-12">
					<div id="question_<?php echo $key ?>" class="collapse panel-body">
						<?php echo $value['answer'] ?>
					</div>
				</div>
			</div><?php
		} ?>
	</div>
<script>
	function buscar(data){
		var palabra = data.toLowerCase();

		$('.search_item').show();

		if(palabra === ""){
			return;
		}

	    $("#div_all_questions").find('.search_item').each(function(e){
            if($(this).attr("name").toLowerCase().indexOf(""+palabra) < 0 && $(this).attr("answer").toLowerCase().indexOf(""+palabra) < 0){
                $(this).hide();
            }
		});
	}

	function leer($objet){
		var text = $("#"+$objet.question).val();
		responsiveVoice.speak(text, "Spanish Latin American Female");
		text = encodeURIComponent(text);

		text = $("#"+$objet.answer).html();
		responsiveVoice.speak(text, "Spanish Latin American Female");
		text = encodeURIComponent(text);
	}

	$("#input_search_questions").keyup(function() {
		palabra = $(this).val().toLowerCase();

	    $('.search_item').show();

		if(palabra === ""){
			return;
		}

	    $("#div_all_questions").find('.search_item').each(function(e){
            if($(this).attr("name").toLowerCase().indexOf(""+palabra) < 0 && $(this).attr("answer").toLowerCase().indexOf(""+palabra) < 0){
                $(this).hide();
            }
		});
	});
</script>
