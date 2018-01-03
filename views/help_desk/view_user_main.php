<?php session_start(); ?>
<ul class="nav nav-tabs">
	<li class="active">
		<a data-toggle="tab" href="#tab1">Inbox</a>
	</li>
	<li>
		<a data-toggle="tab" href="#tab2">Preguntas frecuentes</a>
	</li>
</ul>
<div class="tab-content">
	<div id="tab1" class="tab-pane fade in active">
		
	</div>
	<div id="tab2" class="tab-pane fade">
		
	</div>
</div>
<script>
	requests.list_requests({
		div: 'tab1',
		view: 'view_user_messages',
		mail: '<?php echo $_SESSION['user']['correo'] ?>',
		from_user: 1
	});
	requests.list_requests({
		div: 'tab2',
		view: 'view_user_questions',
		mail: '<?php echo $_SESSION['user']['correo'] ?>',
		from_user: 1
	});
</script>