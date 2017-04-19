<?php
class Custom_Image_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'custom_image_widget', // Base ID
			esc_html__('Image', 'text_domain'), // Name
			array('description' => esc_html__('Inserts an image with a link.', 'text_domain'),) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {
		echo $args['before_widget']; ?>
		<div class="custom-image-widget col">
			<?php if (!empty($instance['image_uri'])) { ?>
				<div class="custom-image">
					<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo $instance['title']; ?>" />
				</div>
			<?php } ?>
			<?php if (!empty($instance['title'])) { ?>
				<div class="custom-image-title">
					<?php echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title']; ?>
				</div>
			<?php } ?>
			<?php if (!empty($instance['text'])) { ?>
				<div class="custom-image-text">
					<a href="<?php echo esc_url($instance['link']); ?>">
						<?php echo $instance['text']; ?>
					</a>
				</div>
			<?php } ?>
			<?php if (!empty($instance['link'])) { ?>
				<div class="custom-image-link">
					<a href="<?php echo esc_url($instance['link']); ?>"><?php
						if (!empty($instance['link_text'])) {
							echo $instance['link_text'];
						} else {
							echo 'Read More';
						}
					?></a>
				</div>
			<?php } ?>
		</div>
		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		$image_uri = !empty($instance['image_uri']) ? $instance['image_uri'] : esc_url('', 'text_domain');
		$link      = !empty($instance['link'])      ? $instance['link']      : esc_url('', 'text_domain');
		$title     = !empty($instance['title'])     ? $instance['title']     : esc_html__('', 'text_domain');
		$text      = !empty($instance['text'])      ? $instance['text']      : esc_html__('', 'text_domain');
		$link_text = !empty($instance['link_text']) ? $instance['link_text'] : esc_html__('Read More', 'text_domain');
		?>
		<p>
			<label for="<?php echo $this->get_field_id('image_uri'); ?>">Picture</label><br />
      <img class="custom_media_image" src="<?php echo ($instance['image_uri'] == '') ? (get_template_directory_uri() . '/assets/img/unknown.jpg') : $instance['image_uri']; ?>'" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />
      <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;" placeholder="URL to image">
      <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('image_uri') . '_button'; ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="Header">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('text')); ?>"><?php esc_attr_e('Text:', 'text_domain'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr( $this->get_field_name('text')); ?>" placeholder="Text Body"><?php echo esc_attr($text); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_attr_e('Link URL:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" placeholder="URL to linked page">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link_text')); ?>"><?php esc_attr_e('Link Text:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_text')); ?>" name="<?php echo esc_attr( $this->get_field_name('link_text')); ?>" type="text" value="<?php echo esc_attr($link_text); ?>" placeholder="Text to show on link">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['image_uri'] = (!empty($new_instance['image_uri'])) ? strip_tags($new_instance['image_uri']) : '';
		$instance['link']      = (!empty($new_instance['link']))      ? strip_tags($new_instance['link'])      : '';
		$instance['title']     = (!empty($new_instance['title']))     ? strip_tags($new_instance['title'])     : '';
		$instance['text']      = (!empty($new_instance['text']))      ? strip_tags($new_instance['text'])      : '';
		$instance['link_text'] = (!empty($new_instance['link_text'])) ? strip_tags($new_instance['link_text']) : '';

		return $instance;
	}
}

function register_custom_image_widget() {
    register_widget('Custom_Image_Widget');
}

function register_custom_image_script() {
  wp_register_script('portrait_script', get_template_directory_uri().'/wp_portrait_widget.js', array('jquery'));
  wp_enqueue_script('portrait_script');
}

add_action('widgets_init', 'register_custom_image_widget');
add_action('admin_enqueue_scripts', 'register_custom_image_script');
?>
