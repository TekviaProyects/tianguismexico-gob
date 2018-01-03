<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo $_REQUEST['f1'] ?>" alt="Fotografia 1">
		</div>
		<div class="item">
			<img src="<?php echo $_REQUEST['f2'] ?>" alt="Fotografia 2">
		</div>
		<div class="item">
			<img src="<?php echo $_REQUEST['f3'] ?>" alt="Fotografia 3">
		</div>
		<div class="item">
			<img src="<?php echo $_REQUEST['f4'] ?>" alt="Fotografia 4">
		</div>
	</div>
</div>