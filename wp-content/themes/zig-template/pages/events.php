<div class="events">
  <div class="container">
    <div class="slogan">
      <div class="slogan__title main-title main-title--blue">
        Wydarzenia Zagłębiowskiej Izby Gospodarczej
      </div>
      <div class="slogan__text">Spotkania biznesowe, konferencje, szkolenia, webinary</div>
    </div>
    <div class="cards">
      <div class="card">
        <div class="content">
          <div class="title">
            BUSINESS MEET UP
          </div>
          <div class="text">
            Największe wydarzenia biznesowe w regionie. Nie może Cię zabraknąć
          </div>
          <button class="button">Zapisz się</button>
        </div>
        <div class="img">
          <img src="/wp-content/themes/zig-template/assets/Header_right.jpg" alt="foto">
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="title">
            BUSINESS MEET UP
          </div>
          <div class="text">
            Największe wydarzenia biznesowe w regionie. Nie może Cię zabraknąć
          </div>
          <button class="button">Zapisz się</button>
        </div>
        <div class="img">
          <img src="/wp-content/themes/zig-template/assets/Header_right.jpg" alt="foto">
        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="title">
            BUSINESS MEET UP
          </div>
          <div class="text">
            Największe wydarzenia biznesowe w regionie. Nie może Cię zabraknąć
          </div>
          <button class="button">Zapisz się</button>
        </div>
        <div class="img">
          <img src="/wp-content/themes/zig-template/assets/Header_right.jpg" alt="foto">
        </div>
      </div>

    </div>
    <div class="news">
      <div class="news__title sub-title">
        Relacje z wydarzeń      </div>
      <div class="news__cards">
		  <?php query_posts( 'posts_per_page=4' ); ?>

		  <?php if ( have_posts() ) : ?>
			  <?php while ( have_posts() ) : the_post(); ?>
              <div class="news__card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="image">
				    <?php if ( function_exists( 'add_theme_support' ) ) {
					    the_post_thumbnail();
				    } ?>
                </div>
                <div class="description">
                  <div class="date"><?php the_time( 'd.m.Y' ); ?></div>
                  <div class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"
                                        title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                  </div>
                  <button class="read-more"><a href="<?php the_permalink(); ?>" rel="bookmark"
                                               title="Permanent Link to <?php the_title_attribute(); ?>">Czytaj więcej</a></button>
                </div><!--end post header-->
                <!--end entry-->
              </div><!--end post-->
			  <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
            <button class="button">Zobacz Wszytskie</button>
		  <?php else : ?>
		  <?php endif; ?>
      </div>

    </div>
  </div>
</div>
