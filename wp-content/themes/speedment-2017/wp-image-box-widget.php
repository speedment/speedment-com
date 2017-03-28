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
		
		if (!empty($instance['font_icon_classes'])) {
		    echo '<i class="' . $instance['font_icon_classes'] . ' widget-icon" aria-hidden="true"></i>';
		}
		
		if (!empty($instance['title'])) { 
		    echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
		}
		
		if (!empty($instance['content'])) { 
		    echo '<p>' . $instance['content'] . '</p>';
		}
		
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$font_icon_classes = ! empty( $instance['font_icon_classes'] ) ? $instance['font_icon_classes'] : esc_html__( 'fa fa-question-circle-o', 'text_domain' );
		$content = ! empty( $instance['content'] ) ? $instance['content'] : esc_html__( 'Lorum ipsum dolar sit amen', 'text_domain' );
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
		<label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php esc_attr_e('Text:', 'text_domain'); ?></label> 
		<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" type="text"><?php echo esc_attr($content); ?></textarea>
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
		$instance['content']           = (!empty($new_instance['content']))           ? strip_tags($new_instance['content'])           : '';

		return $instance;
	}
}

function register_image_box_widget() {
    register_widget('Image_Box_Widget');
}

add_action('widgets_init', 'register_image_box_widget');
?>
