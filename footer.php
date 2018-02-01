
<?php global $cuberta_defaults; ?>
<?php
// Whether show footer or not
if ( is_active_sidebar( 'cuberta-sidebar-1' ) ) :
?>
<footer class="footer-item">
    <?php dynamic_sidebar( 'cuberta-sidebar-1' ); ?>
</footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>