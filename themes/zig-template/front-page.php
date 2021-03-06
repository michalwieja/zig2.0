<?php get_header(); ?>

<div class="wrapper">
  <section class="hero">
    <div class="hero__content padding-l">
      <div class="frontpage-title">TU SĄ </br>MOŻLIWOŚCI
      </div>
      <div class="hero__text">Sukcesu w biznesie nie buduje się w&nbsp;pojedynkę, dlatego tworzymy
        społeczność, która daje wartość
      </div>
      <div class="button-wrapper">
        <a href="/dolacz">
          <button class="button white">Dołącz</button>
        </a>
        <a href="/mozliwosci">
          <button class="button white"/>
          więcej</button></a>
      </div>
      <div class="socials">
		  <?php
		  dynamic_sidebar( 'hero_social' )
		  ?>
      </div>
    </div>
    <div class="hero__image">
		<?php

		$args     = array(
			'posts_per_page'      => 1,
			'post__in'            => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1
		);
		$my_query = new WP_Query( $args );

		$do_not_duplicate = array();
		while ( $my_query->have_posts() ) : $my_query->the_post();
			$do_not_duplicate[] = $post->ID; ?>

          <div id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> >
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
            </a>
          </div>
          <div class="hero__description">
            <div class="title">
				<?php the_title() ?>
            </div>
            <div class="text">
				<?php the_excerpt() ?>
            </div>
            <button class="read-more light-blue"><a
                href="<?php the_permalink(); ?>" rel="bookmark"
                title="Permanent Link to <?php the_title_attribute(); ?>"
              >Czytaj
                więcej</a></button>
          </div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); //VERY VERY IMPORTANT?>

    </div>
  </section>
  <section class="carousel padding-l">
    <div class="carousel-title">
      <p>Sporo się u nas dzieje.</p>
      <p>Bądź zawsze na bieżąco </p>
    </div>
	  <?php echo do_shortcode( '[sp_wpcarousel id="395"]' ); ?>
    <a href="/perspektywy">
      <button class="button grenade">ZOBACZ WSZYSTKIE</button>
    </a>
  </section>
  <section class="slogan padding-x">
    <div class="frontpage-title title">
      Lepszy&nbsp;biznes,</br> lepsze życie
    </div>
    <div class="text">
      Jesteśmy tu, aby inspirować, wspierać i&nbsp;rozwijać się. Stwarzamy możliwości i&nbsp;potrafimy
      z nich
      korzystać. Pamiętamy też, że za każdym biznesem stoi człowiek
    </div>
  </section>
  <section class="profits padding-x">
    <div class="frontpage-title profits__title">
      CO ZYSKUJESZ?
    </div>
    <div class="cards">
      <a href="/mozliwosci">
        <div class="card">
          <div class="title">
            <p>CENNE</p>
            <p>KONTAKTY</p>
          </div>
          <div class="text">
            Dołącz do społeczności, która tworzy biznes na Śląsku i&nbsp;w&nbsp;zagłębiu.
            Zdobądź nowych klientów i&nbsp;poznaj dostawców rozwiązań dla Twojej firmy
          </div>
          <div class="arrow">
            <img alt="" src="wp-content/themes/zig-template/assets/arrow-right.svg">
          </div>
        </div>
      </a>
      <a href="/mozliwosci">
        <div class="card">
          <div class="title">
            <p>INSPIRUJĄCE</p>
            <p>SPOTKANIA</p>
          </div>
          <div class="text">
            Szkolenia, warsztaty, spotkania, wspólne pasje. Tu znajdziesz inspiracje,
            motywację i&nbsp;odpowiednich partnerów
          </div>
          <div class="arrow">
            <img alt="" src="wp-content/themes/zig-template/assets/arrow-right.svg">
          </div>
        </div>
      </a>
      <a href="mozliwosci">
        <div class="card">
          <div class="title">
            <p>DOŚWIADCZENIE</p>
            <p>I WIEDZA </p>
          </div>
          <div class="text">
            Korzystaj z&nbsp;wiedzy innych, dziel
            się własnymi doświadczeniami.
            Razem budujmy wartość
          </div>
          <div class="arrow">
            <img alt="" src="wp-content/themes/zig-template/assets/arrow-right.svg">
          </div>
        </div>
      </a>
    </div>
  </section>
  <section class="motto padding-x">
    <div class="column">
      <div class="motto__title">
        Jesteśmy społecznością przedsiębiorców opartą o&nbsp;wartości i&nbsp;poczucie wpływu na
        nasze
        firmy, miasto, region i&nbsp;ich
        mieszkańców.
      </div>
      <a href="/zig">
        <button class="button desktop-only">Poznaj nas</button>
      </a>
    </div>
    <div class="column">
      <div class="motto__text">
        Wierzymy, że biznes to coś więcej niż pieniądze.
        Bierzemy odpowiedzialność, chcemy się rozwijać, szukamy
        inspiracji i&nbsp;dajemy przykład. Dobrze wiemy, że razem jesteśmy silniejsi, a nasz wspólny
        głos ma znaczenie.
      </div>
      <a href="/zig">
        <button class="button tablet-only">Poznaj nas</button>
      </a>
    </div>
  </section>
  <section class="relations">
    <div class=" padding-x">
      <div class="content">
        <div class="title frontpage-title">
          RELACJE SĄ NAJWAŻNIEJSZE
        </div>
        <div class="text">
          <p>Razem jesteśmy silniejsi i&nbsp;mamy większy wpływ nie tylko na świat biznesu. Wierzymy
            w&nbsp;skuteczność
            efektu synergii wiedzy, doświadczenia i&nbsp;odpowiedzialnego podejścia. To na
            nich budujemy przewagę naszych biznesów i&nbsp;Zagłębiowskiej Izby Gospodarczej.</p>
          <p>Dbam o jakość relacji w&nbsp;Zagłębiowskiej Izbie Gospodarczej. Poznam Cię z&nbsp;odpowiednimi
            ludźmi </p>
          <p>Paulina Piętowska Relationship Menager</p>
        </div>
        <a href="/dolacz">
          <button class="button white">połączmy siły</button>
        </a>
      </div>

    </div>
    <div class="img">
      <img alt="Paulina" src="/wp-content/themes/zig-template/assets/Paulina.png">
    </div>

  </section>
</div>
<section class="newsletter">
	<?php
	dynamic_sidebar( 'newsletter' )
	?>

</section>

<?php get_footer(); ?>

<script>


</script>
