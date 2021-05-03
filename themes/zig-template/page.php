<?php
get_header();


if ( is_page( 'dolacz' ) ) {
	include 'join.php';
} else if ( is_page( 'spolecznosc' ) ) {
	include 'society.php';
} else {
	the_content();
}
?>


<section class="newsletter">
	<?php
	dynamic_sidebar( 'newsletter' )
	?>

</section>


<?php
get_footer();

?>


