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
      <button class="button">SORTUJ</button>
    </div>
    <div class="cards">
		<?php

		$limit = get_option( 'posts_per_page' );
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		query_posts( array(
			'posts_per_page' => $limit,
			'paged'          => $paged,
			'category_name'  => 'czlonkowie'

		) );
		?>

		<?php while ( have_posts() ): the_post(); ?>
          <div class="card">
            <div class="logo"><?php the_post_thumbnail(); ?></div>

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
            <button class="read-more"><a
                href="<?php the_permalink(); ?>" rel="bookmark"
                title="Permanent Link to <?php the_title_attribute(); ?>"
              >Czytaj więcej</a></button>
          </div>

		<?php endwhile; ?>


    </div>

	  <?php if ( $wp_query->max_num_pages > 1 ): ?>
        <div id="nav-below" class="navigation">
          <div
            class="nav-next"><?php next_posts_link( __( '<span class="meta-nav">&rarr;</span> Starsze wpisy' ) ); ?></div>
          <div
            class="nav-previous"><?php previous_posts_link( __( 'Nowsze wpisy <span class="meta-nav">&larr;</span>' ) ); ?></div>
        </div>
	  <?php endif; ?>
  </div>


</section>

