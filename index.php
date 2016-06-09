<?php
// Initialization
require_once('includes/init.php');
// Add Header
$title = "Upper Class Reality";
include("includes/header.inc.php");
?>

<body>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
	<ul class="orbit-container">
		<button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
		<button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
		<li class="orbit-slide is-active">
			<img src="http://placehold.it/2000x750&text=1st">
		</li>
		<li class="orbit-slide">
			<img src="http://placehold.it/2000x750&text=2nd">
		</li>
		<li class="orbit-slide">
			<img src="http://placehold.it/2000x750&text=3nd">
		</li>
		<li class="orbit-slide">
			<img src="http://placehold.it/2000x750&text=4nd">
		</li>
	</ul>
</div>
<hr />

<div class="row column text-center">
		<h2>New Properties</h2>
<div class="column">
	<div class="row">
		<div class="medium-2 columns">
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
			<div class="media-object">
					<div class="media-object-section">
						<img class="thumbnail" src="http://placehold.it/100x100">
					</div><br />
					<div class="media-object-section">
						<h5>Product 3</h5>
						<p>Description 3</p>
					</div>
			</div>
		</div>
	</div> 
</div>

<script>
      $(document).foundation();
</script>

<hr>
</body>

<?php 

include("includes/LoginWindow.inc.php");
include("includes/footer.php");

?> 











