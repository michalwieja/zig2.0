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

<?php if ( strpos( $url, 'czlonkowie' ) === false ) {?>

  <section class="carousel padding-l">
    <div class="carousel-title">
      <p>Sporo się u nas dzieje.</p>
      <p>Bądź zawsze na bieżąco </p>
    </div>
	  <?php echo do_shortcode( '[sp_wpcarousel id="395"]' ); ?>
    <a href="/category/wszystkie">
      <button class="button grenade">ZOBACZ WSZYSTKIE</button>
    </a>
  </section>


<?php } else { ?>


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

<?php } ?>






<?php
get_footer();
?>
