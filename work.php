<?php $class = "taxonomy-page portfolio"; ?>
<?php require_once('header.php'); ?>
	<!-- Projects -->
	<div class="portfolio-container">
		<div class="row collapse">
			<div class="large-5 large-offset-2 columns">
				<h2 class="taxonomy-title">Work</h2>
				<p><a href="#">Interactive</a>, <a href="#">Plugins</a>, <a href="#">Code</a>, <a href="#">Print</a>, <a href="#">Web</a></p>
				<?php for($i = 0; $i < 10; $i++): ?>
					<?php if($i % 2 == 1): ?>
					<div class="row single-container">
						<div class="large-12 columns img-container">
							<h2>Click On Jorge <?php echo $i; ?></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt tincidunt felis a mattis. Cras viverra eros sagittis est pharetra pellentesque. Donec imperdiet pretium accumsan.</p>
							<a href="#">
								<img src="images/coj4.jpg" alt="Image">
							</a>
						</div>
					</div>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
			<div class="large-5 columns">
				<?php for($i = 0; $i < 10; $i++): ?>
					<?php if($i % 2 == 0): ?>
						<div class="row single-container">
							<div class="large-12 columns img-container">
								<h2>Click On Jorge <?php echo $i; ?></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt tincidunt felis a mattis. Cras viverra eros sagittis est pharetra pellentesque. Donec imperdiet pretium accumsan.</p>
								<a href="#">
									<img src="images/coj4.jpg" alt="Image">
								</a>
							</div>
						</div>
					<?php endif; ?>
				<?php endfor; ?>
			</div>	
		</div>	

		<div class="row pagination">
			<div class="large-5 large-offset-2 columns">
				<span class="left">
					<a href="#">&#8592;&nbsp;&nbsp;Previous</a>&nbsp;/</span>
				<span class="right">/&nbsp;<a href="#">Next&nbsp;&nbsp;&#8594;</a></span>
			</div>
		</div>
	</div>
<?php require_once('footer.php'); ?>