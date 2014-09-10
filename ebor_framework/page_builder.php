<?php 

if(class_exists('AQ_Page_Builder')) {
	
	//UNREGISTER DEFAULT TABS
	aq_unregister_block('AQ_Tabs_Block');
	
	//UNREGISTER ALERT BLOCK
	aq_unregister_block('AQ_Alert_Block');
	
	//UNREGISTER CLEAR BLOCK
	aq_unregister_block('AQ_Clear_Block');
		
	//REGISTER ALERTS
	require_once ( "page_builder_blocks/alert_block.php" );
	aq_register_block('AQ_Ebor_Alert_Block');
	
	//PRICING TABLES
	require_once ( "page_builder_blocks/pricing_table_block.php" );
	aq_register_block('AQ_Pricing_Table_Block');
	
	//CLEARBLOCK
	require_once ( "page_builder_blocks/clear_block.php" );
	aq_register_block('AQ_Ebor_Clear_Block');
	
	//REGISTER TABS
	require_once ( "page_builder_blocks/tabs_block.php" );
	aq_register_block('AQ_Ebor_Tabs_Block');
	
}