<?php
class Subscription_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'subscription_widget', // Base ID
			esc_html__( 'Subscription', 'text_domain' ), // Name
			array( 'description' => esc_html__( 
			    'A subscription form that looks like a Product.', 
			    'text_domain' 
			), ) // Args
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
		$content = explode("\n", $instance['content']);
		$title   = apply_filters('widget_title', $instance['title']);
		echo $args['before_widget']; ?>
		<div class="<?php echo $instance['widget_classes']; ?> product-padding">
			<div class="product">
				<?php if (!empty($instance['font_icon_classes'])) { ?>
					<div class="text-center">
						<i class="<?php echo $instance['font_icon_classes']; ?> product-icon" aria-hidden="true"></i>
					</div>
				<?php } ?>
				<?php echo $args['before_title'] . $title . $args['after_title']; ?>
				<?php if (!empty($content)) { ?>
					<ul class="feature-list">
						<?php foreach ($content as $c) { ?>
							<li><?php echo $c; ?></li>
						<?php } ?>
					</ul>
				<?php } ?>

                <div class="row justify-content-center">
				    <?php if (!empty($instance['link_text'])) { ?>
				        <div class="col-5" style="text-align:center">
					        <a href="<?php echo $instance['link_href']; ?>">
						        <button type="button" rel="Link to <?php echo $instance['link_text']; ?>" role="button" class="btn">
						        <?php echo $instance['link_text']; ?>
						        </button>
					        </a>	
					    </div>
				    <?php } ?>
				
				    <?php if (!empty($instance['link2_text'])) { ?>
				        <div class="col-5" style="text-align:center">
					        <a href="<?php echo $instance['link2_href']; ?>">
						        <button type="button" rel="Link to <?php echo $instance['link2_text']; ?>" role="button" class="btn">
						        <?php echo $instance['link2_text']; ?>
						        </button>
					        </a>	
					    </div>
				    <?php } ?>
				</div>
			</div>
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
		$title             = !empty($instance['title'])             ? $instance['title']             : esc_html__('New title', 'text_domain');
		$font_icon_classes = !empty($instance['font_icon_classes']) ? $instance['font_icon_classes'] : esc_html__('fa fa-question-circle-o', 'text_domain');
		$widget_classes    = !empty($instance['widget_classes'])    ? $instance['widget_classes']    : esc_html__('col-md-4', 'text_domain');
		$content           = !empty($instance['content'])           ? $instance['content']           : esc_html__("Point A\nPoint B\nPoint C", 'text_domain');
		$link_text         = !empty($instance['link_text'])         ? $instance['link_text']         : esc_html__('Read More', 'text_domain');
		$link_href         = !empty($instance['link_href'])         ? $instance['link_href']         : esc_html__('', 'text_domain');
		$link2_text        = !empty($instance['link2_text'])        ? $instance['link2_text']        : esc_html__('Read More', 'text_domain');
		$link2_href        = !empty($instance['link2_href'])        ? $instance['link2_href']        : esc_html__('', 'text_domain');
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('font_icon_classes')); ?>"><?php esc_attr_e('Font Icon Classes:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('font_icon_classes')); ?>" name="<?php echo esc_attr( $this->get_field_name('font_icon_classes')); ?>" type="text" value="<?php echo esc_attr($font_icon_classes); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('widget_classes')); ?>"><?php esc_attr_e('Widget Classes:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_classes')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_classes')); ?>" type="text" value="<?php echo esc_attr($widget_classes); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_attr_e('List of Features:', 'text_domain'); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" type="text"><?php echo esc_attr($content); ?></textarea>
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('link_text')); ?>"><?php esc_attr_e('Button 1 Text:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_text')); ?>" name="<?php echo esc_attr($this->get_field_name('link_text')); ?>" type="text" value="<?php echo esc_attr($link_text); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('link_href')); ?>"><?php esc_attr_e('Button 1 Target (url):', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_href')); ?>" name="<?php echo esc_attr($this->get_field_name('link_href')); ?>" type="text" value="<?php echo esc_attr($link_href); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('link2_text')); ?>"><?php esc_attr_e('Button 2 Text:', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link2_text')); ?>" name="<?php echo esc_attr($this->get_field_name('link2_text')); ?>" type="text" value="<?php echo esc_attr($link2_text); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('link2_href')); ?>"><?php esc_attr_e('Button 2 Target (url):', 'text_domain'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link2_href')); ?>" name="<?php echo esc_attr($this->get_field_name('link2_href')); ?>" type="text" value="<?php echo esc_attr($link2_href); ?>" />
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
		$instance['link_text']         = (!empty($new_instance['link_text']))         ? $new_instance['link_text']                     : '';
		$instance['link_href']         = (!empty($new_instance['link_href']))         ? $new_instance['link_href']                     : '';
		$instance['link2_text']        = (!empty($new_instance['link2_text']))        ? $new_instance['link2_text']                    : '';
		$instance['link2_href']        = (!empty($new_instance['link2_href']))        ? $new_instance['link2_href']                    : '';

		return $instance;
	}
}

function register_subscription_widget() {
    register_widget('Subscription_Widget');
}

add_action('widgets_init', 'register_subscription_widget');
?>
