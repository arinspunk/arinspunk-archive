<?php

// ==============================================================================================
// FOOTER.PHP
// ----------------------------------------------------------------------------------------------
// Plantilla base para <footer>, wp_footer y cierre de </body> + </html> 
// ==============================================================================================

?>

		<footer class="footer<?php if(is_404()) { ?> error404<?php } ?>">
			<div class="main-container">
				<div class="container">
					<div class="item item--col-6">
						<p>© Arinspunk</p>
					</div>
					<!-- <div class="item item--col-6">
						<nav>
							<ul class="footer__languages">
								<li>
									<a href="#">
										Castellano
									</a>
								</li>
								<li>
									<a href="#">
										English
									</a>
								</li>
							</ul>
						</nav>
					</div> -->
				</div>
			</div>
		</footer>

		<?php if (is_home()) : ?>
			<div class="ticket">
				<div class="main-container">
					<div class="container flex-right">
						<div class="item item--col-6">
							<?php
								$total = 70;
								$count_posts = wp_count_posts();
								$published_posts = $count_posts->publish;
								$percentage = (100 * $published_posts) / $total;
							?>
							<?php the_field('ticket_text','option') ?> -> <span id="counter" data-count="<?php echo round($percentage, 0); ?>">0</span>%
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<?php wp_footer(); ?>

	</body>
</html>