<?php
get_header();

if ( is_page( 'wydarzenia' ) ) {
	get_template_part('pages/events');
} else {
	the_content();
}

get_footer();

?>
