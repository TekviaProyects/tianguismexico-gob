<style>
    /* CSS talk bubble */
    .talk-bubble {
        margin: 3px 20px 3px 20px;
        display: inline-block;
        position: relative;
        min-width: 200px;
        max-width: 500px;
        height: auto;
    }
    .border {
        border: 3px solid #666;
    }
    .round {
        border-radius: 30px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
    }

    /* Right triangle placed top left flush. */
    .tri-right.border.left-top:before {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: -35px;
        right: auto;
        top: -3px;
        bottom: auto;
        border: 32px solid;
        border-color: #666 transparent transparent transparent;
    }
    .tri-right.left-top:after {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: -27px;
        right: auto;
        top: 0px;
        bottom: auto;
        border: 28px solid;
        border-color: #DFF0D8 transparent transparent transparent;
    }

    /* Right triangle placed top right flush. */
    .tri-right.border.right-top:before {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -35px;
        top: -3px;
        bottom: auto;
        border: 32px solid;
        border-color: #666 transparent transparent transparent;
    }
    .tri-right.right-top:after {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: auto;
        right: -27px;
        top: 0px;
        bottom: auto;
        border: 28px solid;
        border-color: #FCF8E3 transparent transparent transparent;
    }

    /* talk bubble contents */
    .talktext {
        padding: 1em;
        text-align: left;
        line-height: 1.5em;
    }
    .talktext p {
        /* remove webkit p margins */
        -webkit-margin-before: 0em;
        -webkit-margin-after: 0em;
    }
</style><?php

if (empty($messages)) { ?>
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-stacked">
					<div class="card-content" align="center">
						<p class="flow-text">
							No hay mensajes en esta solicitud
						</p>
					</div>
				</div>
			</div>
		</div>
	</div><?php
	
	return;
}

foreach ($messages as $key => $value) {
	$date = explode(" ", $value['date']);
	$time = substr($date[1], 0, -3);
	
	if ($current != $date[0]) {
		$current = $date[0]; ?>
		
		<div class="row">
			<div class="col s12"><p align="center"><?php echo $current ?></p></div>
		</div><?php
	}
	
	if ($value['user_from'] == $objet['from']) {
		$aling = 'right';
		$class = 'bg-warning right-top';
		$x = 0;
	} else {
		$aling =  'left';
		$class = 'bg-success left-top';
		$x = 1;
	} ?>
	
	<div align="<?php echo $aling ?>">
		<div class="talk-bubble tri-right round border <?php echo $class ?>">
			<div class="talktext">
				<p><?php echo $value['message'] ?></p>
				<p align="<?php echo $aling ?>"><?php echo $time ?></p>
			</div>
		</div>
	</div><?php
}

?>
<script>
	$("#badge_<?php echo $objet['reservation_id'] ?>").html('');
	$('#content_messages').scrollTop($('#content_messages')[0].scrollHeight);
</script>