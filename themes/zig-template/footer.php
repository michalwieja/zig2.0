<footer class="footer">
  <div class="column">
    <div class="logo row">
      <img alt="logo" src="/wp-content/themes/zig-template/assets/zig-logo-white.svg">
    </div>
    <div class="row">
      <img alt="location" src="/wp-content/themes/zig-template/assets/location.svg">
      <span class="text">
         <p> Sienkiewicza 6a, p.107, I piętro</p>
          <p>41-300 Dąbrowa Górnicza</p>
        </span>
    </div>
    <a class="row" href="mailto:biuro@zig.org.pl">
      <img alt="email" src="/wp-content/themes/zig-template/assets/email.svg">
      <span class="text">
          biuro@zig.org.pl
        </span>
    </a>
    <div class="row">
      <img alt="phone" src="/wp-content/themes/zig-template/assets/call.svg">
      <a href="tel:533 881 032"><span class="text">533 881 032</span></a>
      <a href="tel:533 881 032"><span class="text">533 881 032</span></a>

    </div>
    <a href="tel:533 881 032">

      <div class="socials">
		  <?php
		  dynamic_sidebar( 'footer_social' )
		  ?>
      </div>

  </div>
  <div class="column map">
	  <?php
	  dynamic_sidebar( 'footer_map' )
	  ?>
  </div>
</footer>

<?php wp_footer() ?>

</body>
</html>
