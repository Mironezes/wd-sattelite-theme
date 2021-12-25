
	<section class="site-title">
		<div class="container">
			<?php if( is_author() ) : ?>
			<h1>Archives: <?= $author_name; ?></h1>
			<?php elseif(is_archive()) : ?>
				<h1><?= single_term_title(); ?></h1>
      <?php else: ?>
        <h1><?= get_the_title(); ?></h1>
			<?php endif;
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="site-breadcrumbs">','</div>' );
				}
			?>
		</div>
	</section>