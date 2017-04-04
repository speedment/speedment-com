<?php
class YouTube_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtube_widget', // Base ID
			esc_html__('YouTube Video', 'text_domain'), // Name
			array('description' => esc_html__( 'An embedded YouTube video with a title.', 'text_domain'), ) // Args
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
		$title   = apply_filters('widget_title', $instance['title']);
		$videoId = $instance['videoId'];

		echo $args['before_widget']; ?>
		<div class="youtube col-md-4 col-sm-6 col-xs-12">
			<h3><?php echo $args['before_title'] . $title . $args['after_title']; ?></h3>
			<iframe src="https://www.youtube.com/embed/<?php echo $videoId; ?>" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:200px;left:0" allowfullscreen></iframe>
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
	public function form( $instance ) {
		$title   = !empty($instance['title'])   ? $instance['title']   : esc_html__('New title', 'text_domain');
		$videoId = !empty($instance['videoId']) ? $instance['videoId'] : esc_html__('', 'text_domain');
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('videoId')); ?>"><?php esc_attr_e('YouTube Video ID:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('videoId')); ?>" name="<?php echo esc_attr( $this->get_field_name('videoId')); ?>" type="text" value="<?php echo esc_attr($videoId); ?>">
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
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']   = (!empty($new_instance['title']))   ? strip_tags($new_instance['title'])   : '';
		$instance['videoId'] = (!empty($new_instance['videoId'])) ? strip_tags($new_instance['videoId']) : '';

		return $instance;
	}
}

function register_youtube_widget() {
    register_widget('YouTube_Widget');
}

add_action('widgets_init', 'register_youtube_widget');
?>
