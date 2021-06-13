<?php
get_header();

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<div class="padding-x">
  <div class="single-wrapper">
	  <?php
	  if ( strpos( $url, 'czlonkowie' ) === false ) {
		  echo do_shortcode( '[flexy_breadcrumb]' );
		  ?>
        <div class="date"><?php
		  echo get_the_date( 'd F, Y' ); ?></div><?php
	  } else { ?>
        <div class="back">
          <a href="/spolecznosc">
            <div class="back__button">< WRÓĆ DO SPOŁECZNOŚCI</div>
          </a>
        </div>
		  <?php
	  } ?>

    <h1 class="title">
		<?php the_title() ?>
    </h1>
	  <?php the_content(); ?>
  </div>
</div>
<div class="society">
  <div class="padding-l">
    <div class="subpage-header">
		<?php
		if ( strpos( $url, 'czlonkowie' ) === false ) {
			?>
          Bądź zawsze na bieżąco
		<?php } else { ?>
          Jest nas więcej
		<?php } ?>
    </div>
    <div class="carousel about">
		<?php
		if ( strpos( $url, 'czlonkowie' ) === false ) {
			echo do_shortcode( '[sp_wpcarousel id="395"]' );
		} else {
			echo do_shortcode( '[sp_wpcarousel id="514"]' );
		} ?>
    </div>
  </div>
</div>
<?php
get_footer();
?>
