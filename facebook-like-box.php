<?php
/*
Plugin Name: Easy Facebook Like Box
Plugin URI: http://activebizsolutions.com/
Description: Easy facebook like box display facebook like box. it enable Facebook Page owners to attract and gain Likes from their own website.
Version: 1.0
Author: shehryar	
Author URI: https://www.facebook.com/shehriyar.shehri	
License: GPL2
*/

class wp_my_plugin extends WP_Widget {

	// constructor
	function wp_my_plugin() {
	parent::WP_Widget(false, $name = __('Easy Facebook Like Box', 'wp_widget_plugin') );
		/* ... */
	}

	// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $text = esc_attr($instance['text']);
     $width = esc_attr($instance['width']);
     $height = esc_attr($instance['height']);
     $face = esc_attr($instance['face']);
	 $showheader = esc_attr($instance['showheader']);
	 $showpost = esc_attr($instance['showpost']);
	 $showborder = esc_attr($instance['border']);
	 $colorscheme = esc_attr($instance['colorscheme']);

} else {
     $title = '';
     $text = '';
     $width = '';
     $height = '';
     $face = '';
	 $showheader = '';
	 $showpost = '';
	 $showborder = '';
	 $colorscheme = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Facebook page url:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" placeholder="Ex: activebizsolution" />
</p>

<p>
<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" placeholder="Ex: 300" />
</p>

<p>
<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('height:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" placeholder="Ex: 400" />
</p>

<p>
<label for="<?php echo $this->get_field_id('colorscheme'); ?>"><?php _e('Color Scheme', 'wp_widget_plugin'); ?></label>
<select name="<?php echo $this->get_field_name('colorscheme'); ?>" id="<?php echo $this->get_field_id('colorscheme'); ?>" class="widefat">
<?php
$options = array('light', 'dark');
foreach ($options as $option) {
echo '<option value="' . $option . '" id="' . $option . '"', $colorscheme == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
?>
</select>
</p>

<p>
<input id="<?php echo $this->get_field_id('face'); ?>" name="<?php echo $this->get_field_name('face'); ?>" type="checkbox" value="1" <?php checked( '1', $face ); ?> />
<label for="<?php echo $this->get_field_id('face'); ?>"><?php _e('Show Faces', 'wp_widget_plugin'); ?></label>

<input id="<?php echo $this->get_field_id('showheader'); ?>" name="<?php echo $this->get_field_name('showheader'); ?>" type="checkbox" value="1" <?php checked( '1', $showheader ); ?> />
<label for="<?php echo $this->get_field_id('showheader'); ?>"><?php _e('Show Header', 'wp_widget_plugin'); ?></label>
</p>
<p>
<input id="<?php echo $this->get_field_id('showpost'); ?>" name="<?php echo $this->get_field_name('showpost'); ?>" type="checkbox" value="1" <?php checked( '1', $showpost ); ?> />
<label for="<?php echo $this->get_field_id('showpost'); ?>"><?php _e('Show Post', 'wp_widget_plugin'); ?></label>

<input id="<?php echo $this->get_field_id('showborder'); ?>" name="<?php echo $this->get_field_name('showborder'); ?>" type="checkbox" value="1" <?php checked( '1', $showborder ); ?> />
<label for="<?php echo $this->get_field_id('showborder'); ?>"><?php _e('Show Border', 'wp_widget_plugin'); ?></label>
</p>


<?php
}

	// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['text'] = strip_tags($new_instance['text']);
      $instance['width'] = strip_tags($new_instance['width']);
      $instance['height'] = strip_tags($new_instance['height']);
	  $instance['face'] = strip_tags($new_instance['face']);
	  $instance['showheader'] = strip_tags($new_instance['showheader']);
	  $instance['showpost'] = strip_tags($new_instance['showpost']);
	  $instance['showborder'] = strip_tags($new_instance['showborder']);
	  $instance['colorscheme'] = strip_tags($new_instance['colorscheme']);
     return $instance;
}

	// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $text = $instance['text'];
   $width = $instance['width'];
   $height = $instance['height'];
   $face = $instance['face'];
   $showheader = $instance['showheader'];
   $showpost = $instance['showpost'];
   $showborder = $instance['showborder'];
   $colorscheme = $instance['colorscheme'];
   echo $before_widget;
   // Display the widget
   echo '<div class="widget-text wp_widget_plugin_box">';

   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }

   // Check if text is set
   if( $text ) {
      echo '<p class="wp_widget_plugin_text">'.'<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F'.$text.'&amp;width';if( $width ) { echo '='.$width; } echo '&amp;height';if( $height ) { echo '='.$height; } echo '&amp;colorscheme=';if ( $colorscheme == 'light' ) { echo 'light';} else if ( $colorscheme == 'dark' ) { echo 'dark';} echo '&amp;show_faces';if( $face AND $face == '1' ) { echo '='.'true'; } echo '&amp;header';if( $showheader AND $showheader == '1' ) { echo '='.'true'; } echo'&amp;stream';if( $showpost AND $showpost == '1' ) { echo '='.'true'; } echo '&amp;show_border';if( $showborder AND $showborder == '1' ) { echo '='.'true'; } echo '&amp;appId=454074158008443" scrolling="no" frameborder="0" style="border:none; overflow:hidden;';if( $width ) { echo 'width:'.$width.'px;'; } if($height ) { echo 'height:'.$height.'px;'; } echo '" allowTransparency="true"></iframe></p>';
   }
   
   echo '</div>';
   echo $after_widget;
}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_my_plugin");'));
?>