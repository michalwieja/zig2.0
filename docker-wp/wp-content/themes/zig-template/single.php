<?php
get_header(); ?>


<div class="padding-x">
  <div class="single-wrapper">

	  <?php echo do_shortcode( '[flexy_breadcrumb]' ) ?>

    <div class="date">
		<?php echo get_the_date( 'd F, Y' ); ?>
    </div>
    <h1 class="title">
		<?php the_title() ?>
    </h1>
	  <?php the_content(); ?>
  </div>
</div>
<section class="carousel padding-l">
  <div class="carousel-title">
    <p>Aktualności </p>
  </div>
	<?php echo do_shortcode( '[sp_wpcarousel id="395"]' ); ?>

</section>

<?php
get_footer();
?>
