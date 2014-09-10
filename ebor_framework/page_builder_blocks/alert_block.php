<?php


class AQ_Ebor_Alert_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Alerts',
			'size' => 'span6',
		);
		
		//create the block
		parent::__construct('aq_ebor_alert_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'content' => '',
			'type' => '',
			'format' => 'dismiss',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$type_options = array(
			'' => 'Standard',
			'danger' => 'Danger',
			'success' => 'Success',
			'warning' => 'Warning'
		);
		
		?>
		
		<p class="description note">
			<?php _e('Use this block to add columns of text to your page. Grab the edge of the block to resize to your needs.', 'other') ?>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title<br/>
				<?php echo aq_field_input('title', $block_id, $title) ?>
			</label>
		</p>
		<p class="description half">
			<label for="<?php echo $this->get_field_id('type') ?>">
				Alert Type<br/>
				<?php echo aq_field_select('type', $block_id, $type_options, $type) ?>
			</label>
		</p>
		<?php
		
	}
	
	function block($instance) {
		extract($instance);
		
		echo '<div class="alert '.$type.' '.$size.'">'.htmlspecialchars_decode($title).'<i class="icon-remove"></i></div>';

	}
	
}