<?php
class Portrait_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'portrait_widget', // Base ID
			esc_html__('Portrait', 'text_domain'), // Name
			array('description' => esc_html__('Inserts a portrait of a person with a name and a title.', 'text_domain'),) // Args
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
		<div class="portrait col-md-4 col-sm-6 col-xs-12">
			<?php if (!empty($instance['image_uri'])) { ?>
				<div class="portrait-image">
					<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="Portrait of <?php echo $instance['name']; ?>" />
				</div>
			<?php } ?>
			<?php if (!empty($instance['name'])) { ?>
				<div class="portrait-name"><?php echo $args['before_title'] .
				apply_filters('widget_title', $instance['name']) .
				$args['after_title']; ?></div>
			<?php } ?>
			<?php if (!empty($instance['title'])) { ?>
				<div class="portrait-title">
					<a href="<?php echo esc_url($instance['link']); ?>"><?php echo $instance['title']; ?></a>
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
		$name      = !empty($instance['name'])      ? $instance['name']      : esc_html__('New name', 'text_domain');
		$title     = !empty($instance['title'])     ? $instance['title']     : esc_html__('New title', 'text_domain');
		$image_uri = !empty($instance['image_uri']) ? $instance['image_uri'] : esc_url('', 'text_domain');
		$link      = !empty($instance['link'])      ? $instance['link']      : esc_url('', 'text_domain');
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('name')); ?>"><?php esc_attr_e('Name:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr($name); ?>" placeholder="Name of the person">
		</p><p>
			<label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="Job title (eg. CEO)">
		</p><p>
			<label for="<?php echo $this->get_field_id('image_uri'); ?>">Picture</label><br />
      <img class="custom_media_image" src="<?php echo ($instance['image_uri'] == '') ? (get_template_directory_uri() . '/assets/img/unknown.jpg') : $instance['image_uri']; ?>'" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />
      <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;" placeholder="URL to portrait image">
      <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('image_uri') . '_button'; ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p><p>
			<label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_attr_e('LinkedIn URL:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" placeholder="URL to LinkedIn page">
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
		$instance['name']      = (!empty($new_instance['name']))      ? strip_tags($new_instance['name'])      : '';
		$instance['title']     = (!empty($new_instance['title']))     ? strip_tags($new_instance['title'])     : '';
		$instance['image_uri'] = (!empty($new_instance['image_uri'])) ? strip_tags($new_instance['image_uri']) : '';
		$instance['link']      = (!empty($new_instance['link']))      ? strip_tags($new_instance['link'])      : '';

		return $instance;
	}
}

function register_portrait_widget() {
    register_widget('Portrait_Widget');
}

function register_portrait_script() {
  wp_register_script('portrait_script', get_template_directory_uri().'/wp_portrait_widget.js', array('jquery'));
  wp_enqueue_script('portrait_script');
}

add_action('widgets_init', 'register_portrait_widget');
add_action('admin_enqueue_scripts', 'register_portrait_script');
?>
