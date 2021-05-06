<?php
get_header(); ?>

<div class="img-banner"></div>
<div class="padding-x">
  <div class="single-wrapper">

    <div class="category">
		<?php
		$categories = get_the_category();
		foreach ( $categories as $cat ) {
			$category_link = get_category_link( $cat->cat_ID );
			$category_name = get_cat_name( $cat->cat_ID );
			?>
          <a href="<?php echo $category_link ?>"><?php echo $category_name ?></a>
			<?php
		}
		?>

    </div>

    <div class="date">
		<?php
		echo get_the_date( 'd F, Y' );
		the_title()

		?>

    </div>

	  <?php
	  the_content();
	  ?>
  </div>
</div>
<?php
get_footer();
?>
