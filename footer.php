
<?php global $cuberta_defaults; ?>
<?php
// Check that at least one contact set
$cuberta_city    = get_theme_mod( 'cuberta_contacts_city', $cuberta_defaults['cuberta_contacts_city'] );
$cuberta_address = get_theme_mod( 'cuberta_contacts_address', $cuberta_defaults['cuberta_contacts_address'] );
$cuberta_phone_1 = get_theme_mod( 'cuberta_contacts_phone_1', $cuberta_defaults['cuberta_contacts_phone_1'] );
$cuberta_phone_2 = get_theme_mod( 'cuberta_contacts_phone_2', $cuberta_defaults['cuberta_contacts_phone_2'] );
$cuberta_email_1 = get_theme_mod( 'cuberta_contacts_email_1', $cuberta_defaults['cuberta_contacts_email_1'] );
$cuberta_email_2 = get_theme_mod( 'cuberta_contacts_email_2', $cuberta_defaults['cuberta_contacts_email_2'] );
$cuberta_skype   = get_theme_mod( 'cuberta_contacts_skype', $cuberta_defaults['cuberta_contacts_skype'] );
$cuberta_fax     = get_theme_mod( 'cuberta_contacts_fax', $cuberta_defaults['cuberta_contacts_fax'] );
if ( $cuberta_city != '' 
    || $cuberta_address != '' 
    || $cuberta_phone_1 != '' 
    || $cuberta_phone_2 != '' 
    || $cuberta_email_1 != '' 
    || $cuberta_email_2 != '' 
    || $cuberta_skype != '' 
    || $cuberta_fax != '' 
) {
    $cuberta_showcontactus = true;
} else {
    $cuberta_showcontactus = false;
}

// Check that at least one social networking set
$cuberta_facebook  = get_theme_mod( 'cuberta_social_facebook', $cuberta_defaults['cuberta_social_facebook'] );
$cuberta_github    = get_theme_mod( 'cuberta_social_github', $cuberta_defaults['cuberta_social_github'] );
$cuberta_gitlab    = get_theme_mod( 'cuberta_social_gitlab', $cuberta_defaults['cuberta_social_gitlab'] );
$cuberta_google    = get_theme_mod( 'cuberta_social_google', $cuberta_defaults['cuberta_social_google'] );
$cuberta_linkedin  = get_theme_mod( 'cuberta_social_linkedin', $cuberta_defaults['cuberta_social_linkedin'] );
$cuberta_instagram = get_theme_mod( 'cuberta_social_instagram', $cuberta_defaults['cuberta_social_instagram'] );
$cuberta_pinterest = get_theme_mod( 'cuberta_social_pinterest', $cuberta_defaults['cuberta_social_pinterest'] );
$cuberta_twitter   = get_theme_mod( 'cuberta_social_twitter', $cuberta_defaults['cuberta_social_twitter'] );
$cuberta_vk        = get_theme_mod( 'cuberta_social_vk', $cuberta_defaults['cuberta_social_vk'] );
$cuberta_vimeo     = get_theme_mod( 'cuberta_social_vimeo', $cuberta_defaults['cuberta_social_vimeo'] );
$cuberta_youtube   = get_theme_mod( 'cuberta_social_youtube', $cuberta_defaults['cuberta_social_youtube'] );
if ( $cuberta_facebook != '' 
    || $cuberta_github != '' 
    || $cuberta_gitlab != '' 
    || $cuberta_google != '' 
    || $cuberta_linkedin != '' 
    || $cuberta_instagram != '' 
    || $cuberta_pinterest != '' 
    || $cuberta_twitter != '' 
    || $cuberta_vimeo != '' 
    || $cuberta_vk != '' 
    || $cuberta_youtube != '' 
) {
    $cuberta_showsocial = true;
} else {
    $cuberta_showsocial = false;
}

if ( is_active_sidebar( 'cuberta-sidebar-1' ) ) {
    $cuberta_widgetshow = true;
} else {
    $cuberta_widgetshow = false;
}

// Whether show footer or not
if ( $cuberta_showcontactus || $cuberta_showsocial || $cuberta_widgetshow) :
?>
<footer class="footer-item">
    <?php if ( $cuberta_widgetshow ) : ?>
    <?php dynamic_sidebar( 'cuberta-sidebar-1' ); ?>
    <?php endif; ?>
    <?php if ( $cuberta_showcontactus ) : ?>
        <div class="contactus">
            <h2><?php _e( 'Contacts', 'cuberta' ); ?></h2>
            <ul>
                <?php if ( $cuberta_city != '' ) { ?>
                    <li class="city"> <span><?php echo esc_html( $cuberta_city ); ?></span></li>
                    <?php
                }
                if ( $cuberta_address != '' ) {
                    ?>
                    <li class="address"> <span><?php echo esc_html( $cuberta_address ); ?></span></li>
                    <?php
                }
                if ( $cuberta_phone_1 != '' ) {
                    ?>
                    <li class="phone"> <span><?php echo esc_html( $cuberta_phone_1 ); ?></span></li>
                    <?php
                }
                if ( $cuberta_phone_2 != '' ) {
                    ?>
                    <li class="phone"> <span><?php echo esc_html( $cuberta_phone_2 ); ?></span></li>
                    <?php
                }
                if ( is_email( $cuberta_email_1 ) ) {
                    ?>
                    <li class="email"> <span><?php echo $cuberta_email_1; ?></span></li>
                    <?php
                }
                if ( is_email( $cuberta_email_2 ) ) {
                    ?>
                    <li class="email"> <span><?php echo $cuberta_email_2; ?></span></li>
                    <?php
                }
                if ( $cuberta_skype != '' ) {
                    ?>
                    <li class="skype"> <span><?php echo esc_html( $cuberta_skype ); ?></span></li>
                    <?php
                }
                if ( $cuberta_fax != '' ) {
                    ?>
                    <li class="fax"> <span><?php echo esc_html( $cuberta_fax ); ?></span></li>
                <?php } ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if ( $cuberta_showsocial ) : ?>
        <div id="social">
            <h2><?php _ex( 'Social', 'Footer', 'cuberta' ); ?></h2>
            <?php if ( $cuberta_facebook != '' ) { ?>
                <a class="facebook" href="<?php echo esc_url( $cuberta_facebook ); ?>" target="_blank"><span>Facebook</span></a>
            <?php 
            }
            if ( $cuberta_github != '' ) {
                ?>
                <a class="github" href="<?php echo esc_url( $cuberta_github ); ?>" target="_blank"><span>Github</span></a>
                <?php
            }
            if ( $cuberta_gitlab != '' ) {
                ?>
                <a class="gitlab" href="<?php echo esc_url( $cuberta_gitlab ); ?>" target="_blank"><span>Gitlab</span></a>
                <?php
            }
            if ( $cuberta_google != '' ) {
                ?>
                <a class="google" href="<?php echo esc_url( $cuberta_google ); ?>" target="_blank"><span>Google</span></a>
                <?php
            }
            if ( $cuberta_linkedin != '' ) {
                ?>
                <a class="linkedin" href="<?php echo esc_url( $cuberta_linkedin ); ?>" target="_blank"><span>Linkedin</span></a>
                <?php
            }
            if ( $cuberta_instagram != '' ) {
                ?>
                <a class="instagram" href="<?php echo esc_url( $cuberta_instagram ); ?>" target="_blank"><span>Instagram</span></a>
                <?php
            }
            if ( $cuberta_pinterest != '' ) {
                ?>
                <a class="pinterest" href="<?php echo esc_url( $cuberta_pinterest ); ?>" target="_blank"><span>Pinterest</span></a>
                <?php
            }
            if ( $cuberta_twitter != '' ) {
                ?>
                <a class="twitter" href="<?php echo esc_url( $cuberta_twitter ); ?>" target="_blank"><span>Twitter</span></a>
                <?php
            }
            if ( $cuberta_vimeo != '' ) {
                ?>
                <a class="vimeo" href="<?php echo esc_url( $cuberta_vimeo ); ?>" target="_blank"><span>Vimeo</span></a>
            <?php
            }
            if ( $cuberta_vk != '' ) {
                ?>
                <a class="vk" href="<?php echo esc_url( $cuberta_vk ); ?>" target="_blank"><span>VK</span></a>
                <?php
            }
            if ( $cuberta_youtube != '' ) {
                ?>
                <a class="youtube" href="<?php echo esc_url( $cuberta_youtube ); ?>" target="_blank"><span>Youtube</span></a>
                <?php } ?>
        </div>
    <?php endif; ?>
</footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>