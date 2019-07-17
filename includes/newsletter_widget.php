<?php

class newsletter_subscribe extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'news_letter_subscribe', // Base ID
			esc_html__( 'news letter subscribe', 'socialwidget_domain' ), // Name
			array( 'newsletter subscribe' => esc_html__( 'news_letter_subscribe', 'newsletter_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

			echo $args['before_widget'];
			echo $args['before_title'];
				if(!empty($instance['title'])){
					echo $instance['title'];
				}

			echo $args['bafter_title'];
		?>
			<div style="margin-top: 10px" class="myform">
				<form id="subscribe-form" method="post" action="<?php echo plugins_url().'/Newsletter-subscribe/includes/newletter-subscribe.php' ?>">
					<div class="form group">
						<label for="name">your name</label>
						<input type="text" name="name" id="name">
					</div>
					<div class="form group">
						<label for="email">your email</label>
						<input type="email" name="email" id="email">
					</div>
					<input type="hidden" name="subject" id="subject" value="<?php echo $instance['subject']; ?>">
					<input type="hidden" name="recipient" id="recipient" value="<?php echo $instance['recipient']; ?>">
					<input style="margin-top: 10px" class="btn btn-primary" type="submit" value="subscribe" name="submit">
				</form>
			</div>
			<div class="form-msg"></div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'title', 'newsletter_domain' );
		$recipient =  $instance['recipient'];
		$subject = !empty( $instance['subject'] ) ? $instance['subject'] : esc_html__( 'subject', 'newsletter_domain' );
		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'title', 'newsletter_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'subject' ) ); ?>"><?php esc_attr_e( 'subject', 'newsletter_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subject' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subject' ) ); ?>" type="text" value="<?php echo esc_attr( $subject ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'recipient' ) ); ?>"><?php esc_attr_e( 'recipient', 'newsletter_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'recipient' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'recipient' ) ); ?>" type="text" value="<?php echo esc_attr( $recipient ); ?>">
		</p>


								
		<?php 
	}


	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subject'] = ( !empty( $new_instance['subject'] ) ) ? sanitize_text_field( $new_instance['subject'] ) : '';
		$instance['recipient'] = ( !empty( $new_instance['recipient'] ) ) ? sanitize_text_field( $new_instance['recipient'] ) : '';
		return $instance;
	}
}