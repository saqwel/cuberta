
<?php global $defaults; ?>
<?php
// Check that at least one contact set
$city    = get_theme_mod( 'cuberta_contacts_city', $defaults['cuberta_contacts_city'] );
$address = get_theme_mod( 'cuberta_contacts_address', $defaults['cuberta_contacts_address'] );
$phone_1 = get_theme_mod( 'cuberta_contacts_phone_1', $defaults['cuberta_contacts_phone_1'] );
$phone_2 = get_theme_mod( 'cuberta_contacts_phone_2', $defaults['cuberta_contacts_phone_2'] );
$email_1 = get_theme_mod( 'cuberta_contacts_email_1', $defaults['cuberta_contacts_email_1'] );
$email_2 = get_theme_mod( 'cuberta_contacts_email_2', $defaults['cuberta_contacts_email_2'] );
$skype   = get_theme_mod( 'cuberta_contacts_skype', $defaults['cuberta_contacts_skype'] );
$fax     = get_theme_mod( 'cuberta_contacts_fax', $defaults['cuberta_contacts_fax'] );
if ( $city != '' 
    || $address != '' 
    || $phone_1 != '' 
    || $phone_2 != '' 
    || $email_1 != '' 
    || $email_2 != '' 
    || $skype != '' 
    || $fax != '' 
) {
    $showcontactus = true;
} else {
    $showcontactus = false;
}

// Check that at least one social networking set
$facebook  = get_theme_mod( 'cuberta_social_facebook', $defaults['cuberta_social_facebook'] );
$github    = get_theme_mod( 'cuberta_social_github', $defaults['cuberta_social_github'] );
$gitlab    = get_theme_mod( 'cuberta_social_gitlab', $defaults['cuberta_social_gitlab'] );
$google    = get_theme_mod( 'cuberta_social_google', $defaults['cuberta_social_google'] );
$linkedin  = get_theme_mod( 'cuberta_social_linkedin', $defaults['cuberta_social_linkedin'] );
$instagram = get_theme_mod( 'cuberta_social_instagram', $defaults['cuberta_social_instagram'] );
$pinterest = get_theme_mod( 'cuberta_social_pinterest', $defaults['cuberta_social_pinterest'] );
$twitter   = get_theme_mod( 'cuberta_social_twitter', $defaults['cuberta_social_twitter'] );
$vk        = get_theme_mod( 'cuberta_social_vk', $defaults['cuberta_social_vk'] );
$vimeo     = get_theme_mod( 'cuberta_social_vimeo', $defaults['cuberta_social_vimeo'] );
$youtube   = get_theme_mod( 'cuberta_social_youtube', $defaults['cuberta_social_youtube'] );
if ( $facebook != '' 
    || $github != '' 
    || $gitlab != '' 
    || $google != '' 
    || $linkedin != '' 
    || $instagram != '' 
    || $pinterest != '' 
    || $twitter != '' 
    || $vimeo != '' 
    || $vk != '' 
    || $youtube != '' 
) {
    $showsocial = true;
} else {
    $showsocial = false;
}

if ( is_active_sidebar( 'sidebar-1' ) ) {
    $widgetshow = true;
} else {
    $widgetshow = false;
}

// Whether show footer or not
if ( $showcontactus || $showsocial || $widgetshow) :
?>
<footer class="footer-item">
    <?php if ( $widgetshow ) : ?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
    <?php if ( $showcontactus ) : ?>
        <div class="contactus">
            <h2><?php _e( 'Contacts', 'cuberta' ); ?></h2>
            <ul>
                <?php if ( $city != '' ) { ?>
                    <li class="city"> <span><?php echo esc_html( $city ); ?></span></li>
                    <?php
                }
                if ( $address != '' ) {
                    ?>
                    <li class="address"> <span><?php echo esc_html( $address ); ?></span></li>
                    <?php
                }
                if ( $phone_1 != '' ) {
                    ?>
                    <li class="phone"> <span><?php echo esc_html( $phone_1 ); ?></span></li>
                    <?php
                }
                if ( $phone_2 != '' ) {
                    ?>
                    <li class="phone"> <span><?php echo esc_html( $phone_2 ); ?></span></li>
                    <?php
                }
                if ( is_email( $email_1 ) ) {
                    ?>
                    <li class="email"> <span><?php echo $email_1; ?></span></li>
                    <?php
                }
                if ( is_email( $email_2 ) ) {
                    ?>
                    <li class="email"> <span><?php echo $email_2; ?></span></li>
                    <?php
                }
                if ( $skype != '' ) {
                    ?>
                    <li class="skype"> <span><?php echo esc_html( $skype ); ?></span></li>
                    <?php
                }
                if ( $fax != '' ) {
                    ?>
                    <li class="fax"> <span><?php echo esc_html( $fax ); ?></span></li>
                <?php } ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if ( $showsocial ) : ?>
        <div id="social">
            <h2><?php _ex( 'Social', 'Footer', 'cuberta' ); ?></h2>
            <?php if ( $facebook != '' ) { ?>
                <a class="facebook" href="<?php echo esc_url( $facebook ); ?>" target="_blank"><span>Facebook</span></a>
            <?php 
            }
            if ( $github != '' ) {
                ?>
                <a class="github" href="<?php echo esc_url( $github ); ?>" target="_blank"><span>Github</span></a>
                <?php
            }
            if ( $gitlab != '' ) {
                ?>
                <a class="gitlab" href="<?php echo esc_url( $gitlab ); ?>" target="_blank"><span>Gitlab</span></a>
                <?php
            }
            if ( $google != '' ) {
                ?>
                <a class="google" href="<?php echo esc_url( $google ); ?>" target="_blank"><span>Google</span></a>
                <?php
            }
            if ( $linkedin != '' ) {
                ?>
                <a class="linkedin" href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><span>Linkedin</span></a>
                <?php
            }
            if ( $instagram != '' ) {
                ?>
                <a class="instagram" href="<?php echo esc_url( $instagram ); ?>" target="_blank"><span>Instagram</span></a>
                <?php
            }
            if ( $pinterest != '' ) {
                ?>
                <a class="pinterest" href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><span>Pinterest</span></a>
                <?php
            }
            if ( $twitter != '' ) {
                ?>
                <a class="twitter" href="<?php echo esc_url( $twitter ); ?>" target="_blank"><span>Twitter</span></a>
                <?php
            }
            if ( $vimeo != '' ) {
                ?>
                <a class="vimeo" href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><span>Vimeo</span></a>
            <?php
            }
            if ( $vk != '' ) {
                ?>
                <a class="vk" href="<?php echo esc_url( $vk ); ?>" target="_blank"><span>VK</span></a>
                <?php
            }
            if ( $youtube != '' ) {
                ?>
                <a class="youtube" href="<?php echo esc_url( $youtube ); ?>" target="_blank"><span>Youtube</span></a>
                <?php } ?>
        </div>
    <?php endif; ?>
</footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>