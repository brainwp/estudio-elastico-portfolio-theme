<?php

	class AQ_Ebor_Tabs_Block extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'Tabs &amp; Accordion',
				'size' => 'span6',
			);
			
			//create the widget
			parent::__construct('AQ_Ebor_Tabs_Block', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_tab_add_new', array($this, 'add_tab'));
			
		}
		
		function form($instance) {
		
			$defaults = array(
				'tabs' => array(
					1 => array(
						'title' => 'My New Tab',
						'content' => 'My tab contents',
					)
				),
				'type'	=> 'tab',
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$tab_types = array(
				'tab' => 'Tabs',
				'accordion' => 'Accordion'
			);

			?>
			<p class="description note">
				<?php _e('Use this block to add tabs and accordions to the page.', 'other') ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('type') ?>">
					Tabs style<br/>
					<?php echo aq_field_select('type', $block_id, $tab_types, $type) ?>
				</label>
			</p>
			
			<div class="description cf">
				<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
					<?php
					$tabs = is_array($tabs) ? $tabs : $defaults['tabs'];
					$count = 1;
					foreach($tabs as $tab) {	
						$this->tab($tab, $count);
						$count++;
					}
					?>
				</ul>
				<p></p>
				<a href="#" rel="tab" class="aq-sortable-add-new button">Add New</a>
				<p></p>
			</div>
			
			<?php
		}
		
		function tab($tab = array(), $count = 0) {
				
			?>
			<li id="<?php echo $this->get_field_id('tabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
				
				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong><?php echo $tab['title'] ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
							Tab Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
							Tab Content<br/>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
						</label>
					</p>
					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>
				
			</li>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			
			$output = '';
			
			if($type == 'tab') {
			
				$output .= '<div class="tab-container"><ul class="etabs">';
				$i=0;
				foreach( $tabs as $tab ){
					$i++;
				    $output .= '<li class="tab"><a href="#'.$block_id.$i.'">'.htmlspecialchars_decode($tab['title']).'</a></li>';
				}
				$output .= '</ul>';
				
				$i=0;
				foreach( $tabs as $tab ){
					$i++;
				  $output .= '<div id="'.$block_id.$i.'"><h4>'.htmlspecialchars_decode($tab['title']).'</h4>'.do_shortcode(wpautop(htmlspecialchars_decode($tab['content']))).'</div>';
				}
				$output .= '</div>';
							
			} elseif ($type == 'accordion') {
				
				$output .= '<dl class="accordion">';
				
				$i = 0;
				foreach( $tabs as $tab ){
					$i++;
					($i == 1) ? $active = 'active' : $active = '';
					$output .= '<dt class="'.$active.'"><a href="#">'.htmlspecialchars_decode($tab['title']).'</a></dt>
					<dd class="'.$active.'">
						<h4 class="margin-bottom-10">'.htmlspecialchars_decode($tab['title']).'</h4>
						'.do_shortcode(wpautop(htmlspecialchars_decode($tab['content']))).'	
					</dd>';
				}
				
				$output .= '</dl>';
				
			} 
			echo $output;
			
		}
		
		/* AJAX add tab */
		function add_tab() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$tab = array(
				'title' => 'New Tab',
				'content' => ''
			);
			
			if($count) {
				$this->tab($tab, $count);
			} else {
				die(-1);
			}
			
			die();
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
	}
