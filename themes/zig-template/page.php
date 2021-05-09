<?php
get_header();

?>
<div class="wrapper">

  <?php

if ( is_page( 'dolacz' ) ) {
	include 'join.php';
} else if ( is_page( 'spolecznosc' ) ) {
	include 'society.php';
} else {
	the_content();
}
?>

</div>
<section class="newsletter">
	<?php
	dynamic_sidebar( 'newsletter' )
	?>
</section>


<?php
get_footer();

?>


