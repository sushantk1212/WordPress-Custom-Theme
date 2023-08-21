<?php 
    $theme_options_options = get_option( 'theme_options_option_name' ); // Array of All Options
    $phone_number = $theme_options_options['phone_number']; // Phone number
    $facebook_link = $theme_options_options['facebook_link']; // Facebook Link
    $twitter_link = $theme_options_options['twitter_link']; // Twitter Link
    $linkedin_link = $theme_options_options['linkedin_link']; // LinkedIn Link 
    $instagram_link = $theme_options_options['instagram_link']; // Instagram Link
?>
<div class="social_box">
    <?php if(isset($facebook_link) && $facebook_link != null) : // check if facebook link added ?>
        <a href="<?php echo esc_url($facebook_link);?>" title="<?php echo esc_url($facebook_link);?>" target="_blank" rel="nofollow">
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
    <?php endif;?>

    <?php if(isset($twitter_link) && $twitter_link != null) : // check if twitter link added ?>
        <a href="<?php echo esc_url($twitter_link);?>" title="<?php echo esc_url($twitter_link);?>" target="_blank" rel="nofollow">
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
    <?php endif;?>

    <?php if(isset($linkedin_link) && $linkedin_link != null) : // check if linkedin link added ?>
        <a href="<?php echo esc_url($linkedin_link);?>" title="<?php echo esc_url($linkedin_link);?>" target="_blank" rel="nofollow">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
    <?php endif;?>

    <?php if(isset($instagram_link) && $instagram_link != null) : // check if instagram link added?>
        <a href="<?php echo esc_url($instagram_link);?>" title="<?php echo esc_url($instagram_link);?>" target="_blank" rel="nofollow">
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
    <?php endif;?>

</div>