<?php $sort = $_GET['sort'];
if ( $sort == "ASC" ) {
	$order = "ASC";
}
if ( $sort == "DESC" ) {
	$order = "DESC";
}
?>

<section class="society">
  <div class="padding-x">
    <div class="subpage-banner">
      <div class="column subpage-title">
        POZNAJMY SIĘ
      </div>
      <div class="column subpage-text">
        Sprawdź kto już działa w&nbsp;Zagłębiowskiej Izbie Gospodarczej i&nbsp;dołącz do nas.
      </div>
    </div>
    <div class="filters">

      <hr>
      <div class="sort">
        <span>SORTUJ: </span>
        <span><a href="/spolecznosc/">od najnowszych</a></span>
        <span><a href="/spolecznosc/?sort=asc">A - Z</a></span>
        <span><a href="/spolecznosc/?sort=desc">Z - A</a></span>
      </div>
    </div>
    <div class="cards">
		<?php

		$limit = get_option( 'posts_per_page' );
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		query_posts( array(
			'post_type'      => 'czlonkowie',
			'posts_per_page' => $limit,
			'paged'          => $paged,
			'orderby'        => 'title',
			'order'          => $sort


		) );
		?>

		<?php while ( have_posts() ): the_post(); ?>

          <div class="card">
            <a
              href="<?php the_permalink(); ?>" rel="bookmark"
              title="Permanent Link to <?php the_title_attribute(); ?>"
            >
              <div class="logo"><?php the_post_thumbnail(); ?></div>
            </a>

            <div class="title"><?php the_title(); ?></div>
            <div class="data">
              <div class="phone"><a
                  href="tel:<?php echo get_post_meta( $post->ID, 'phone', true ); ?>"><?php echo get_post_meta( $post->ID, 'phone', true ); ?></a>
              </div>
              <div class="email"><a
                  href="mailto:<?php echo get_post_meta( $post->ID, 'email', true ); ?>"><?php echo get_post_meta( $post->ID, 'email', true ); ?></a>
              </div>
              <div class="web"><a target="_blank"
                                  href="<?php echo get_post_meta( $post->ID, 'web', true ); ?>"><?php echo get_post_meta( $post->ID, 'web', true ); ?></a>
              </div>

            </div>
            <a
              href="<?php the_permalink(); ?>" rel="bookmark"
              title="Permanent Link to <?php the_title_attribute(); ?>"
            > <button class="read-more">Czytaj więcej</button></a>
          </div>


		<?php endwhile; ?>


    </div>

	  <?php

	  if ( function_exists( 'wp_paginate' ) ):
		  wp_paginate();
	  else :
		  the_posts_pagination( array(
			  'prev_text'          => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
			  'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
		  ) );
	  endif;
	  ?>
  </div>


</section>

