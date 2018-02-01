
<?php global $cuberta_defaults; ?>
<?php

if ( is_active_sidebar( 'cuberta-sidebar-1' ) ) {
    $cuberta_widgetshow = true;
} else {
    $cuberta_widgetshow = false;
}

// Whether show footer or not
if ( $cuberta_widgetshow) :
?>
<footer class="footer-item">
    <?php if ( $cuberta_widgetshow ) : ?>
    <?php dynamic_sidebar( 'cuberta-sidebar-1' ); ?>
    <?php endif; ?>
</footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>