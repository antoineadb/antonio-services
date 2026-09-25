<footer class="site-footer">
  <div class="footer-inner">
    <div>© <?php echo esc_html(date('Y')); ?> Antonio — Services & Compagnie</div>
    <div>Grenoble et alentours · Sur rendez-vous</div>
  </div>

  <div class="site-counter">
    👁️ <?php echo esc_html(antonio_services_get_visit_count()); ?> visites
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>