<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('wp_ajax_ajax_update_element', 'xyz_cfm_ajax_update_element');

function xyz_cfm_ajax_update_element() {
 	if(isset($_POST)){
	//print_r($_REQUEST['_wpnonce']);die;
		if (
				! isset( $_REQUEST['_wpnonce'] )
				|| ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'update_elements')
		) {
	
		wp_nonce_ays( 'update_elements' );
	
			exit();
	
		} else	{
			

global $wpdb;
// echo '<pre>';
// print_r($_POST);
// die;

if($_REQUEST['id']){
	$_POST = stripslashes_deep($_POST);

	$id=intval($_REQUEST['id']);
	$elementId = intval($_REQUEST['elementId']);
	$formId =intval($_REQUEST['formId']);
	if($id == 1){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','',sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$maxlength = intval($_POST['maxlength']);
			if($maxlength == 0){
				$maxlength = '';
			}
			$defaultValue = sanitize_text_field($_POST['defaultValue']);


			$elementType = 1;
			
			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className,'max_length'=>$maxlength,'default_value'=>$defaultValue), array('id'=>$elementId));
				echo "<font color=green>Element successfully updated.</font>";
			}else{
					
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}

	}

	if($id == 2){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','', sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$maxlength = intval($_POST['maxlength']);
			if($maxlength == 0){
				$maxlength = '';
			}
			$defaultValue = sanitize_text_field($_POST['defaultValue']);
			$elementType = 2;

			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className,'max_length'=>$maxlength,'default_value'=>$defaultValue), array('id'=>$elementId));
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}

	}

	if($id == 3){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','', sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$collength = intval($_POST['collength']);
			if($collength == 0){
				$collength = '';
			}
			$rowlength = intval($_POST['rowlength']);
			if($rowlength == 0){
				$rowlength = '';
			}
			$defaultValue = sanitize_text_field($_POST['defaultValue']);
			$elementType = 3;

			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className,'cols'=>$collength,'rows'=>$rowlength,'default_value'=>$defaultValue), array('id'=>$elementId));
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}

	}

	if($id == 4){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','', sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$options = xyz_cfm_trimOptions( sanitize_text_field($_POST['options']));
			$defaultValue = sanitize_text_field(xyz_cfm_trimOptions($_POST['defaultValue']));
			$multipleSelect = intval($_POST['multipleSelect']);
			$elementType = 4;

				
			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className,'options'=>$options,'default_value'=>$defaultValue,'client_view_multi_select_drop_down'=>$multipleSelect), array('id'=>$elementId));
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}

	if($id == 5){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','', sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$elementType = 5;


			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className), array('id'=>$elementId));
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}

	if($id == 6){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','', sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$options = xyz_cfm_trimOptions( sanitize_text_field($_POST['options']));
			$defaultValue = xyz_cfm_trimOptions(sanitize_text_field($_POST['defaultValue']));
			$singleLineView = intval($_POST['singleLineView']);
			$elementType = 6;

			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className,'options'=>$options,'client_view_check_radio_line_break_count'=>$singleLineView,'default_value'=>$defaultValue), array('id'=>$elementId));
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}

	if($id == 7){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','',sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$options = xyz_cfm_trimOptions(sanitize_text_field($_POST['options']));
			$defaultValue = xyz_cfm_trimOptions(sanitize_text_field($_POST['defaultValue']));
			$singleLineView = intval($_POST['singleLineView']);
			$elementType = 7;

			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'css_class'=>$className,'options'=>$options,'client_view_check_radio_line_break_count'=>$singleLineView,'default_value'=>$defaultValue), array('id'=>$elementId));
					
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}

	if($id == 8){

		$required = intval($_POST['required']);

		$elementName = str_replace(' ','',sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$fileSize = intval($_POST['fileSize']);
			if($fileSize == 0){
				$fileSize = '';
			}
			$fileType = sanitize_text_field($_POST['fileType']);

			$elementType = 8;


			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
					
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required, 'element_name'=>$elementName,'css_class'=>$className,'file_size'=>$fileSize,'file_type'=>$fileType), array('id'=>$elementId));
					
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}

	if($id == 9){

		$displayName = sanitize_text_field($_POST['displayName']);
		$elementName = str_replace(' ','',sanitize_text_field($_POST['elementName']));
		$elementNameTest = str_replace('_','',$elementName);

		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_POST['className']);
			$elementType = 9;

			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			
			if($element_count == 0){
					
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_diplay_name'=>$displayName, 'element_name'=>$elementName,'css_class'=>$className), array('id'=>$elementId));
					
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}

	if($id == 10){
		
		$required = 1;
		$elementName = str_replace(' ','',$_REQUEST['elementName']);
		$elementNameTest = str_replace('_','',$elementName);
			
		if(ctype_alnum($elementNameTest) && ctype_alpha($elementNameTest[0])){
			$className = sanitize_text_field($_REQUEST['className']);
			$elementType = 10;
			$reCaptcha  = intval($_REQUEST['reCaptcha']);
			$element_count = $wpdb->query( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_cfm_form_elements WHERE element_name= '%s' AND form_id= %d AND id!= %d LIMIT %d,%d", $elementName,$formId,$elementId,0,1) ) ;
			if($element_count == 0){
					
				$wpdb->update($wpdb->prefix.'xyz_cfm_form_elements', array('element_required'=>$required,'element_name'=>$elementName,'element_type'=>$elementType,'css_class'=>$className,'re_captcha'=>$reCaptcha), array('id'=>$elementId));
					
				echo "<font color=green>Element successfully updated.</font>";
			}else{
				echo "<font color=red>Element name already exists.</font>";
			}
		}else{
			echo "<font color=red>Form element name must start with alphabet and must be alphanumeric .</font>";
		}
	}
}
die();
}}}
