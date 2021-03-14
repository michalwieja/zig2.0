<?php get_header(); ?>


<section class="hero">
  <div class="hero__content">
    <div class="hero__title main-title">TU SĄ
      MOŻLIWOŚCI
    </div>
    <div class="hero__text">Sukcesu w biznesie nie buduje się w pojedynkę, dlatego tworzymy
      społeczność, która daje wartość
    </div>
    <div class="button-wrapper">
      <button class="button light-blue">Dołącz</button>
      <button class="button light-blue"/>
      więcej</button>
    </div>
  </div>
  <div class="hero__image">
      <?php

      $args = array(
          'posts_per_page' => 1,
          'post__in' => get_option('sticky_posts'),
          'ignore_sticky_posts' => 1
      );
      $my_query = new WP_Query($args);

      $do_not_duplicate = array();
      while ($my_query->have_posts()) : $my_query->the_post();
          $do_not_duplicate[] = $post->ID; ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(''); ?> >
            <?php the_post_thumbnail('full'); ?>

        </div>
        <div class="hero__description">
          <div class="title">
              <?php the_title() ?>
          </div>
          <div class="text">
              <?php the_excerpt() ?>
          </div>
          <button class="read-more">czytaj wiecej</button>
        </div>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); //VERY VERY IMPORTANT?>

  </div>
</section>
<section class="news">
  <div class="news__title sub-title">
    Sporo się u nas dzieje. Bądź zawsze na bieżąco
  </div>
<!--  <div class="news__cards">-->
<!--    <div v-for="post in posts" :key="post.id" class="news__card">-->
<!--      <div class="image">-->
<!--        <img alt="photo">-->
<!--      </div>-->
<!--      <div class="description">-->
<!--        <div class="date">-->
<!--          {{ post.date }}-->
<!--        </div>-->
<!--        <div class="title">-->
<!--          {{ post.title.rendered }}-->
<!---->
<!--        </div>-->
<!--        <ButtonReadMore/>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<div class="news__cards">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="news__card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="post-header">
            <div class="date"><?php the_time('M j y'); ?></div>
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark"
                   title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="author"><?php the_author(); ?></div>
          </div><!--end post header-->
          <div class="entry clear">
              <?php if (function_exists('add_theme_support')) the_post_thumbnail(); ?>
              <?php the_excerpt(); ?>
              <?php edit_post_link(); ?>
              <?php wp_link_pages(); ?> </div>
          <!--end entry-->
          <div class="post-footer">
            <div
              class="comments"><?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></div>
          </div><!--end post footer-->
        </div><!--end post-->
        <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
      <div class="navigation index">
        <div class="alignleft"><?php next_posts_link('Older Entries'); ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries'); ?></div>
      </div><!--end navigation-->
    <?php else : ?>
    <?php endif; ?>
</div>
  <Button text="zobacz wszystkie"/>

</section>

<section class="announcements">
  <div class="announcements__title sub-title">
    Najnowsze komunikaty
  </div>
  <div class="announcements__cards">
    <div v-for="index in 4" :key="index" class="announcements__card">
      <div class="title">
        Zmiany przepisów dotyczących małego ZUSu Plus weszły w życie 1 lutego 2020r.
      </div>
      <ButtonReadMore/>
    </div>
  </div>
</section>

<?php get_footer(); ?>
