<?php

/**
 * Widget API: WP_Widget_Archives class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement the Archives widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WA_Widget_Adunit extends WP_Widget
{

	/**
	 * Sets up a new Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' 					=> 'wa-ad-unit',
			'description' 					=> 'Bloques de anuncios',
			'customize_selective_refresh' 	=> true,
		);
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('wa_adunit_widget', 'WA - Bloques de anuncios', $widget_ops, $control_ops);

		// Enqueue style if widget is active (appears in a sidebar) or if in Customizer preview.
		if (is_active_widget(false, false, $this->id_base) || is_customize_preview()) {

			//add_action( 'spiga_banners_slots', array( $this, 'widget_mamador' ) );
		}
	}

	/**
	 * Outputs the content for the current Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Archives widget instance.
	 */
	public function widget($args, $instance)
	{

		$ad_code		= $instance['ad_code'];
		$ad_class		= $instance['ad_class'];
		$ad_slot		= $instance['ad_slot'];
		$ad_type		= $instance['ad_type'];
		// if($ad_code){

		//     $ad_code = str_replace("{POSTID}",get_the_ID(),$ad_code);

		// 	echo $args['before_widget'];
		// 	echo '<div class="'.$ad_class.'">';
		// 	echo $ad_code;
		// 	echo '</div>';
		// 	echo $args['after_widget'];
		// }

		$map = eval("return " . $ad_code . ";");

		$_params = array(
			'css' => $ad_class,
		);

		if ($map && is_array($map)) {
			$_params['mappings'] = $map;
		}

		if ($ad_slot && $ad_type) {

			$ad_code = str_replace("{POSTID}", get_the_ID(), $ad_code);

			echo $args['before_widget'];

			waCreatePlacement($ad_slot, $ad_type, $_params);

			echo $args['after_widget'];
		}
	}


	/**
	 * Handles updating settings for the current Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget_Archives::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array(
			'ad_code'	=> null,
			'ad_slot' => null,
			'ad_type' => null,
			'ad_class'	=> null
		));
		$instance['ad_code'] 	= $new_instance['ad_code'];
		$instance['ad_class'] 	= $new_instance['ad_class'];
		$instance['ad_slot'] 	= $new_instance['ad_slot'];
		$instance['ad_type'] 	= $new_instance['ad_type'];

		return $instance;
	}

	/**
	 * Outputs the settings form for the Archives widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form($instance)
	{
		$instance = wp_parse_args((array) $instance, array(
			'ad_code'	=> null,
			'ad_slot' => null,
			'ad_type' => null,
			'ad_class'	=> null
		));
?>

		<p>
			<label for="<?php echo $this->get_field_id('ad_code'); ?>">Mappings:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('ad_code'); ?>" name="<?php echo $this->get_field_name('ad_code'); ?>" cols="20" rows="10" placeholder="Pega el código del bloque aquí"><?php echo esc_attr($instance['ad_code']); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('ad_slot'); ?>">Slot:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_slot'); ?>" name="<?php echo $this->get_field_name('ad_slot'); ?>" type="text" placeholder="<?php echo esc_attr($instance['ad_slot']); ?>" value="<?php echo esc_attr($instance['ad_slot']); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('ad_type'); ?>">Ad Type:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_type'); ?>" name="<?php echo $this->get_field_name('ad_type'); ?>" type="text" placeholder="<?php echo esc_attr($instance['ad_type']); ?>" value="<?php echo esc_attr($instance['ad_type']); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('ads_class'); ?>">Custom CSS:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_class'); ?>" name="<?php echo $this->get_field_name('ad_class'); ?>" type="text" placeholder="<?php echo esc_attr($instance['ad_class']); ?>" value="<?php echo esc_attr($instance['ad_class']); ?>" />
		</p>


<?php
	}
}

function wa_adunit_register_widget()
{
	register_widget('WA_Widget_Adunit');
}
add_action('widgets_init', 'wa_adunit_register_widget');
