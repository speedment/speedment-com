<?php
class Image_Box_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'image_box_widget', // Base ID
			esc_html__( 'Image Box', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Inserts an icon with a title and a text.', 'text_domain' ), ) // Args
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
		echo $args['before_widget'];
		<div class="<?php echo $instance['widget_classes']; ?>">
		if (!empty($instance['link'])) { ?>
			<a href="<?php echo esc_url($instance['link']); ?>" rel="<?php echo esc_url($instance['title']); ?>">
		<?php } ?>
			<?php if (!empty($instance['font_icon_classes'])) { ?>
				<div class="text-center">
					<i class="<?php echo $instance['font_icon_classes']; ?> widget-icon" aria-hidden="true"></i>
				</div>
			<?php } ?>
				<?php echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title']; ?>
				<?php if (!empty($instance['content'])) { ?><p><span><?php echo $instance['content']; ?></span></p><?php } ?>
			<?php
				if (!empty($instance['link'])) {
					echo '</a>';
				}
			?>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title             = !empty($instance['title'])             ? $instance['title']             : esc_html__('', 'text_domain');
		$font_icon_classes = !empty($instance['font_icon_classes']) ? $instance['font_icon_classes'] : esc_html__('fa fa-question-circle-o', 'text_domain');
		$widget_classes    = !empty($instance['widget_classes'])    ? $instance['widget_classes']    : esc_html__('col-md-4', 'text_domain');
		$content           = !empty($instance['content'])           ? $instance['content']           : esc_html__('', 'text_domain');

		$link      = !empty($instance['link'])      ? $instance['link']      : esc_url('', 'text_domain');
		$link_text = !empty($instance['link_text']) ? $instance['link_text'] : esc_html__('Read More', 'text_domain');
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'font_icon_classes' ) ); ?>"><?php esc_attr_e( 'Font Icon Classes:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'font_icon_classes' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_icon_classes' ) ); ?>" type="text" value="<?php echo esc_attr( $font_icon_classes ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'widget_classes' ) ); ?>"><?php esc_attr_e('Widget Classes:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_classes')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_classes')); ?>" type="text" value="<?php echo esc_attr($widget_classes); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php esc_attr_e('Text:', 'text_domain'); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" type="text"><?php echo esc_attr($content); ?></textarea>
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
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']             = (!empty($new_instance['title']))             ? strip_tags($new_instance['title'])             : '';
		$instance['font_icon_classes'] = (!empty($new_instance['font_icon_classes'])) ? strip_tags($new_instance['font_icon_classes']) : '';
		$instance['widget_classes']    = (!empty($new_instance['widget_classes']))    ? strip_tags($new_instance['widget_classes'])    : '';
		$instance['content']           = (!empty($new_instance['content']))           ? $new_instance['content']                       : '';
		$instance['link']              = (!empty($new_instance['link']))              ? strip_tags($new_instance['link'])              : '';
		$instance['link_text']         = (!empty($new_instance['link_text']))         ? strip_tags($new_instance['link_text'])         : '';

		return $instance;
	}
}

function register_image_box_widget() {
    register_widget('Image_Box_Widget');
}

add_action('widgets_init', 'register_image_box_widget');
?>
