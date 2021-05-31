<?php
get_header();

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<div class="padding-x">
  <div class="single-wrapper">
	  <?php
	  echo do_shortcode( '[flexy_breadcrumb]' );
	  ?>

    <div class="date">
		<?php

		if ( strpos( $url, 'czlonkowie' ) === false ) {

			echo get_the_date( 'd F, Y' );
		} ?>
    </div>
    <h1 class="title">
		<?php the_title() ?>
    </h1>
	  <?php the_content(); ?>
    <div class="back">
		<?php

		if ( strpos( $url, 'czlonkowie' ) !== false ) { ?>
          <a href="/spolecznosc">
            <div class="back__button">< WRÓĆ DO SPOŁECZNOŚCI</div>
          </a>
			<?php
		} ?>
    </div>
  </div>
</div>
<div class="society">
  <div class="padding-l">
    <div class="subpage-header">
      Jest nas więcej
    </div>
    <div class="carousel about">
		<?php echo do_shortcode( '[sp_wpcarousel id="514"]' ); ?>

    </div>
  </div>
</div>

<?php
get_footer();
?>
