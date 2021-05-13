<?php
/**
 * A Simple Category Template
 */

get_header(); ?>

<div class="perspectives">
  <div class="subpage-banner padding-x">
    <div class="column subpage-title">
      Perspektywy
    </div>
    <div class="column subpage-text">
      Na blogu Zagłębiowskiej Izby Gospodarczej eksperci ZIG dzielą się wiedzą i&nbsp;doświadczeniem. Tu
      znajdziesz informacje m.in. z&nbsp;zakresu biznesu, prawa, ekonomii, marketingu, które pomogą Ci
      rozwijać Twoją firmę
    </div>
  </div>
  <div class="filter-wrapper padding-x">

    <a href="/category/wszystkie">
      <button class="button">Wszystkie</button>
    </a>
    <a href="/category/strefa-prawo-podatki-finanse">
      <button class="button">strefa PRAWO, PODATKI, FINANSE</button>
    </a>
    <a href="/category/strefa-marketing-hr-sprzedaz">
      <button class="button">strefa MARKETING, HR, SPRZEDAŻ</button>
    </a>
    <a href="/category/strefa-lidera">
      <button class="button">STREFA LIDERA</button>
    </a>
    <a href="/category/aktualnosci">
      <button class="button">aktualności</button>
    </a>
  </div>
  <div class="content padding-x">
	  <?php
	  // Check if there are any posts to display
	  if ( have_posts() ) : ?>
    <header class="archive-header">
<!--      <h1 class="archive-title">Kategoria: --><?php //single_cat_title( '', true ); ?><!--</h1>-->
		<?php
		// Display optional category description
		if ( category_description() ) : ?>
          <div class="archive-meta"><?php echo category_description(); ?></div>
		<?php endif; ?>
    </header>
    <div class="cards">
		<?php
		// The Loop
		while ( have_posts() ) : the_post(); ?>
          <div class="card">
			  <?php the_post_thumbnail() ?>

            <h2><a href="<?php the_permalink() ?>" rel="bookmark"
                   title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            <!--            <small>--><?php //the_time( 'F jS, Y' ) ?><!-- by -->
			  <?php //the_author_posts_link() ?><!--</small>-->

			  <?php the_excerpt(); ?>
            <button class="read-more"><a href="<?php the_permalink(); ?>" rel="bookmark"
                                         title="Permanent Link to <?php the_title_attribute(); ?>">Czytaj
                więcej</a></button>


          </div>

		<?php endwhile;

		else: ?>
          <p>Brak postów spełniających kryteria</p>

		<?php endif; ?>
    </div>
  </div>
  <div class="question padding-x">
    <p>Chcesz podzielić się swoją wiedzą?</p>
    <p>Masz pomysł lub pytanie? </p>
    <a href="/kontakt"><button class="button">napisz do nas</button></a>
  </div>
</div>


<?php get_footer(); ?>
