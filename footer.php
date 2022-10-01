
<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 footer-about">
				<?php dynamic_sidebar('footer1') ?>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 footer-news">
				<?php dynamic_sidebar('footer2') ?>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 footer-menus">
				<?php dynamic_sidebar('footer3') ?>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 footer-subscribe">
				<?php dynamic_sidebar('footer4') ?>
			</div>	
		</div>
		<div class="copyright">
			<?php dynamic_sidebar('footer5') ?>
		</div>
	</div>
	
</footer>

<?php wp_footer() ?>
 

</body>
</html>

