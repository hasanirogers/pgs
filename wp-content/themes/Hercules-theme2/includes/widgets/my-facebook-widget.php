<?php
// =============================== My Instagram widget  ======================================
  
class MY_FacebookWidget extends WP_Widget {
function MY_FacebookWidget() {
$widget_ops = array(
'classname' => 'facebook',
'description' => __('A widget that displays the Facebook', HS_CURRENT_THEME)
);
$this->WP_Widget( 'facebook-widget', __('hercules - Facebook', HS_CURRENT_THEME), $widget_ops );
}   // Widget Settings


  /** @see WP_Widget::widget */
  function widget($args, $instance) {	
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    $userid = apply_filters('userid', $instance['userid']);
    $facewidth = apply_filters('facewidth', $instance['facewidth']);
	$faceheight = apply_filters('faceheight', $instance['faceheight']);
	
	
?>
<?php echo $before_widget; 
if ( $title )
echo $before_title . $title . $after_title; ?>
                 
<div id="facebook">
<?php if($userid){ ?>
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo $userid; ?>&amp;width=<?php echo $facewidth; ?>&amp;height=<?php echo $faceheight; ?>&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=290794764313764" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $facewidth; ?>px; height:<?php echo $faceheight; ?>px;" allowTransparency="true">
</iframe>
<?php } else {
	echo "<strong>Error in facebook configuration...</strong>";			
		} ?>
	<div style="clear:both;"></div>
</div>


<?php wp_reset_query(); ?>
								
<?php echo $after_widget; ?>
			 
<?php }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {	
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
      /* Set up some default widget settings. */
      $defaults = array( 'title' => '', 'userid' => '', 'facewidth' => '', 'faceheight' => '' );
      $instance = wp_parse_args( (array) $instance, $defaults );	

      $title = esc_attr($instance['title']);
			$userid = esc_attr($instance['userid']);
			$facewidth = esc_attr($instance['facewidth']);
			$faceheight = esc_attr($instance['faceheight']);
			
			
        ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', HS_CURRENT_THEME); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

      <p><label for="<?php echo $this->get_field_id('userid'); ?>"><?php _e('Facebook user ID:', HS_CURRENT_THEME); ?> <input class="widefat" id="<?php echo $this->get_field_id('userid'); ?>" name="<?php echo $this->get_field_name('userid'); ?>" type="text" value="<?php echo $userid; ?>" /></label></p>
	  	<p><label for="<?php echo $this->get_field_id('facewidth'); ?>"><?php _e('Facebook width:', HS_CURRENT_THEME); ?> <input class="widefat" id="<?php echo $this->get_field_id('facewidth'); ?>" name="<?php echo $this->get_field_name('facewidth'); ?>" type="text" value="<?php echo $facewidth; ?>" /></label></p>	
		<p><label for="<?php echo $this->get_field_id('faceheight'); ?>"><?php _e('Facebook height:', HS_CURRENT_THEME); ?> <input class="widefat" id="<?php echo $this->get_field_id('faceheight'); ?>" name="<?php echo $this->get_field_name('faceheight'); ?>" type="text" value="<?php echo $faceheight; ?>" /></label></p>	
		  
			
<?php }

} // class  Widget
?>