<?php 
/**
 * SMOF Options Machine Class
 *
 * @package	 WordPress
 * @subpackage  SMOF
 * @since	   1.0.0
 * @author	  Syamil MJ
 */
class Options_Machine {

	/**
	 * PHP5 contructor
	 *
	 * @since 1.0.0
	 */
	function __construct($options) {
		
		$return = $this->optionsframework_machine($options);
		
		$this->Inputs = $return[0];
		$this->Menu = $return[1];
		$this->Defaults = $return[2];
		
	}

	/** 
	 * Sanitize option
	 *
	 * Sanitize & returns default values if don't exist
	 * 
	 * Notes:
	 *	- For further uses, you can check for the $value['type'] and performs
	 *	  more speficic sanitization on the option
	 *	- The ultimate objective of this function is to prevent the "undefined index"
	 *	  errors some authors are having due to malformed options array
	 */
	public static function sanitize_option( $value ) {

		$defaults = array(
			"name" 		=> "",
			"desc" 		=> "",
			"id" 		=> "",
			"std" 		=> "",
			"mod"		=> "",
			"type" 		=> ""
		);

		$value = wp_parse_args( $value, $defaults );

		return $value;

	}


	/**
	 * Process options data and build option fields
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function optionsframework_machine($options) {
		global $smof_output;
		$smof_data = of_get_options();
		$data = $smof_data;
		
		$defaults = array();   
		$counter = 0;
		$menu = '';
		$output = '';
		
		do_action('optionsframework_machine_before', array(
				'options'	=> $options,
				'smof_data'	=> $smof_data,
			));

		$output .= $smof_output;
		
		foreach ($options as $value) {

			if( isset( $value['id'] ) && ! isset( $smof_data[$value['id']] ) ) {
				$smof_data[$value['id']] = $value['std'];
			}
			
			// sanitize option
			$value = self::sanitize_option($value);

			$counter++;
			$val = '';
			
			//create array of defaults		
			if ($value['type'] == 'multicheck'){
				if (is_array($value['std'])){
					foreach($value['std'] as $i=>$key){
						$defaults[$value['id']][$key] = true;
					}
				} else {
						$defaults[$value['id']][$value['std']] = true;
				}
			} else {
				if (isset($value['id'])) $defaults[$value['id']] = $value['std'];
			}
			
			/* condition start */
			if(!empty($smof_data) || !empty($data)){
			
			 if( $value['type'] == 'accordion' && $value['position'] == 'start' ) {
			 	$output .= '<div class="accordion">';
			 }

			//Start Heading
			 if ( $value['type'] != "heading" )
			 {
			 	$class = ''; if(isset( $value['class'] )) { $class = $value['class']; }
				
				//hide items in checkbox group
				$fold='';
				if (array_key_exists("fold",$value)) {
					if (isset($smof_data[$value['fold']]) && $smof_data[$value['fold']]) {
						$fold="f_".$value['fold']." ";
					} else {
						$fold="f_".$value['fold']." temphide ";
					}
				}
	
				$output .= '<div id="section-'.$value['id'].'" class="'.$fold.'section section-'.$value['type'].' '. $class .'">'."\n";
				
				//only show header if 'name' value exists
				if($value['name']) $output .= '<h3 class="heading">'. $value['name'] .'</h3>'."\n";
				
				$output .= '<div class="option">'."\n" . '<div class="controls">'."\n";
	
			 } 
			 //End Heading

/*
			if (!isset($smof_data[$value['id']]) && $value['type'] != "heading")
				continue;
*/			
			//switch statement to handle various options type							  
			switch ( $value['type'] ) {
			
				//text input
				case 'text':
					$t_value = '';
					if( isset( $value['id'] ) && 
						( $value['id'] == 'date_format' || $value['id'] == 'alternate_date_format_month_year' || $value['id'] == 'alternate_date_format_day' || $value['id'] == 'timeline_date_format' )
					) {
						$t_value = $smof_data[$value['id']];
					} else {
						$t_value = stripslashes($smof_data[$value['id']]);
					}
					
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					
					$output .= '<input class="of-input '.$mini.'" name="'.$value['id'].'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $t_value .'" />';
				break;
				
				//select option
				case 'select':
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					$output .= '<div class="select_wrapper ' . $mini . '">';
					$output .= '<select class="select of-input" name="'.$value['id'].'" id="'. $value['id'] .'">';

					foreach ($value['options'] as $select_ID => $option) {
						$theValue = $option;
						
						if( $option == 'Blog Sidebar' ) {
							$option = 'Default Sidebar';
						}
						
						if (!is_numeric($select_ID))
							$theValue = $select_ID;
						$output .= '<option id="' . $select_ID . '" value="'.$theValue.'" ' . selected($smof_data[$value['id']], $theValue, false) . ' />'.$option.'</option>';	 
					 } 
					$output .= '</select></div>';
				break;
						
				
				//textarea option
				case 'textarea':	
					$cols = '8';
					$ta_value = '';
					
					if(isset($value['options'])){
							$ta_options = $value['options'];
							if(isset($ta_options['cols'])){
							$cols = $ta_options['cols'];
							} 
						}
						if( isset( $value['id'] ) && $value['id'] == 'custom_css' ) {
							$ta_value = $smof_data[$value['id']];
						} else {
							$ta_value = stripslashes($smof_data[$value['id']]);
						}
						$output .= '<textarea class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';		
				break;
				
				//radiobox option
				case "radio":
					$checked = (isset($smof_data[$value['id']])) ? checked($smof_data[$value['id']], $option, false) : '';
					 foreach($value['options'] as $option=>$name) {
						$output .= '<input class="of-input of-radio" name="'.$value['id'].'" type="radio" value="'.$option.'" ' . checked($smof_data[$value['id']], $option, false) . ' /><label class="radio">'.$name.'</label><br/>';				
					}
				break;
				
				//checkbox option
				case 'checkbox':
					if (!isset($smof_data[$value['id']])) {
						$smof_data[$value['id']] = 0;
					}
					
					$fold = '';
					if (array_key_exists("folds",$value)) $fold="fld ";
		
					$output .= '<input type="hidden" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="0"/>';
					$output .= '<input type="checkbox" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="1" '. checked($smof_data[$value['id']], 1, false) .' />';
				break;
				
				//multiple checkbox option
				case 'multicheck': 			
					(isset($smof_data[$value['id']]))? $multi_stored = $smof_data[$value['id']] : $multi_stored="";
								
					foreach ($value['options'] as $key => $option) {
						if (!isset($multi_stored[$key])) {$multi_stored[$key] = '';}
						$of_key_string = $value['id'] . '_' . $key;
						$output .= '<input type="checkbox" class="checkbox of-input" name="'.$value['id'].'['.$key.']'.'" id="'. $of_key_string .'" value="1" '. checked($multi_stored[$key], 1, false) .' /><label class="multicheck" for="'. $of_key_string .'">'. $option .'</label><br />';								
					}			 
				break;
				
				// Color picker
				case "color":
					$default_color = '';
					if ( isset($value['std']) ) {
						if ( $smof_data[$value['id']] !=  $value['std'] )
							$default_color = ' data-default-color="' .$value['std'] . '" ';
					}
					$output .= '<input name="' . $value['id'] . '" id="' . $value['id'] . '" class="of-color"  type="text" value="' . $smof_data[$value['id']] . '"' . $default_color .' />';
		 	
				break;
				
				// Background Color
				case "backgroundcolor":
				//var_dump($value['id'],$smof_data[$value['id']]);
					if( is_string( $smof_data[$value['id']] ) ) {
						$bg_color_stored = array( 'color' => $smof_data[$value['id']], 'opacity' => '1' );
					} else {
						$bg_color_stored = $smof_data[$value['id']];
					}
					
					$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$bg_color_stored['color'].'"></div></div>';
					$output .= '<input class="of-color of-border of-bg-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $bg_color_stored['color'] .'" />';
						
					$output .= '<input class="of-input of-bg-opacity" name="'.$value['id'].'[opacity]" id="'. $value['id'] .'_opacity" type="text" value="'. $bg_color_stored['opacity'] .'" /><span class="of-bg-opacity-desc">' . __( 'Opacity', 'Avada' ) . '</span>';		
				
				break;				

				//typography option	
				case 'typography':
				
					$typography_stored = isset($smof_data[$value['id']]) ? $smof_data[$value['id']] : $value['std'];
					
					/* Font Size */
					
					if(isset($typography_stored['size'])) {
						$output .= '<div class="select_wrapper typography-size" original-title="Font size">';
						$output .= '<select class="of-typography of-typography-size select" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';
							for ($i = 9; $i < 20; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
					
					/* Line Height */
					if(isset($typography_stored['height'])) {
					
						$output .= '<div class="select_wrapper typography-height" original-title="Line height">';
						$output .= '<select class="of-typography of-typography-height select" name="'.$value['id'].'[height]" id="'. $value['id'].'_height">';
							for ($i = 20; $i < 38; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($typography_stored['height'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
						
					/* Font Face */
					if(isset($typography_stored['face'])) {
					
						$output .= '<div class="select_wrapper typography-face" original-title="Font family">';
						$output .= '<select class="of-typography of-typography-face select" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';
						
						$faces = array('arial'=>'Arial',
										'verdana'=>'Verdana, Geneva',
										'trebuchet'=>'Trebuchet',
										'georgia' =>'Georgia',
										'times'=>'Times New Roman',
										'tahoma'=>'Tahoma, Geneva',
										'palatino'=>'Palatino',
										'helvetica'=>'Helvetica' );			
						foreach ($faces as $i=>$face) {
							$output .= '<option value="'. $i .'" ' . selected($typography_stored['face'], $i, false) . '>'. $face .'</option>';
						}			
										
						$output .= '</select></div>';
					
					}
					
					/* Font Weight */
					if(isset($typography_stored['style'])) {
					
						$output .= '<div class="select_wrapper typography-style" original-title="Font style">';
						$output .= '<select class="of-typography of-typography-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
						$styles = array('normal'=>'Normal',
										'italic'=>'Italic',
										'bold'=>'Bold',
										'bold italic'=>'Bold Italic');
										
						foreach ($styles as $i=>$style){
						
							$output .= '<option value="'. $i .'" ' . selected($typography_stored['style'], $i, false) . '>'. $style .'</option>';		
						}
						$output .= '</select></div>';
					
					}
					
					/* Font Color */
					if(isset($typography_stored['color'])) {
					
						$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector typography-color"><div style="background-color: '.$typography_stored['color'].'"></div></div>';
						$output .= '<input class="of-color of-typography of-typography-color" original-title="Font color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $typography_stored['color'] .'" />';
					
					}
					
				break;
				
				//border option
				case 'border':
						
					/* Border Width */
					$border_stored = $smof_data[$value['id']];
					
					$output .= '<div class="select_wrapper border-width">';
					$output .= '<select class="of-border of-border-width select" name="'.$value['id'].'[width]" id="'. $value['id'].'_width">';
						for ($i = 0; $i < 21; $i++){ 
						$output .= '<option value="'. $i .'" ' . selected($border_stored['width'], $i, false) . '>'. $i .'</option>';				 }
					$output .= '</select></div>';
					
					/* Border Style */
					$output .= '<div class="select_wrapper border-style">';
					$output .= '<select class="of-border of-border-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
					
					$styles = array('none'=>'None',
									'solid'=>'Solid',
									'dashed'=>'Dashed',
									'dotted'=>'Dotted');
									
					foreach ($styles as $i=>$style){
						$output .= '<option value="'. $i .'" ' . selected($border_stored['style'], $i, false) . '>'. $style .'</option>';		
					}
					
					$output .= '</select></div>';
					
					/* Border Color */		
					$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$border_stored['color'].'"></div></div>';
					$output .= '<input class="of-color of-border of-border-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $border_stored['color'] .'" />';
					
				break;
				
				//images checkbox - use image as checkboxes
				case 'images':
				
					$i = 0;
					
					$select_value = (isset($smof_data[$value['id']])) ? $smof_data[$value['id']] : '';
					
					foreach ($value['options'] as $key => $option) 
					{ 
					$i++;
			
						$checked = '';
						$selected = '';
						if(NULL!=checked($select_value, $key, false)) {
							$checked = checked($select_value, $key, false);
							$selected = 'of-radio-img-selected';  
						}
						$output .= '<span>';
						$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$key.'" name="'.$value['id'].'" '.$checked.' />';
						$output .= '<div class="of-radio-img-label">'. $key .'</div>';
						$output .= '<img src="'.$option.'" alt="" class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;" />';
						$output .= '</span>';				
					}
					
				break;
				
				//info (for small intro box etc)
				case "info":
					$info_text = $value['std'];
					$output .= '<div class="of-info">'.$info_text.'</div>';
				break;

				case "accordion":
					$info_text = $value['std'];
					$output .= '<div class="of-info">'.$info_text.'<span class="fa fa-plus"></span></div>';
				break;
				
				//display a single image
				case "image":
					$src = $value['std'];
					$output .= '<img src="'.$src.'">';
				break;
				
				// Avada edit
				//display a button with url
				case 'button':
					$src = $value['std'];
					$output .= '<div class="select_wrapper "><select class="select of-input">';
					foreach ($value['options'] as $select_ID => $option) {
						$output .= '<option value="' . $select_ID . '">' . $option . '</option>';
					}
					$output .= '</select></div>';
					$output .= '<button href="' . $src . '" class="button-primary" type="button">' . $value['btntext'] . '</button>';
					$output .= '<img src="' . get_template_directory_uri() . '/admin/assets/images/ajax-loader.gif" alt="" style="margin-left: 5px; display: none;" />';
				break;
				// End Avada edit
				
				//tab heading
				case 'heading':
					if($counter >= 2){
					   $output .= '</div>'."\n";
					}
					//custom icon
					$icon = '';
					if(isset($value['icon'])){
						$icon = ' style="background-image: url('. $value['icon'] .');"';
					}
					$header_class = str_replace(' ','',strtolower($value['name']));
					$jquery_click_hook = str_replace(' ', '', strtolower($value['name']) );
					$jquery_click_hook = "of-option-" . $jquery_click_hook;
					$menu .= '<li class="'. $header_class .'"><a title="'.  $value['name'] .'" href="#'.  $jquery_click_hook  .'"'. $icon .'>'.  $value['name'] .'</a></li>';
					$output .= '<div class="group" id="'. $jquery_click_hook  .'"><h2>'.$value['name'].'</h2>'."\n";
				break;

				case 'accordion':
				break;
				
				//drag & drop slide manager
				case 'slider':
					$output .= '<div class="slider"><ul id="'.$value['id'].'">';
					$slides = $smof_data[$value['id']];
					$count = count($slides);
					if ($count < 2) {
						$oldorder = 1;
						$order = 1;
						$output .= Options_Machine::optionsframework_slider_function($value['id'],$value['std'],$oldorder,$order);
					} else {
						$i = 0;
						foreach ($slides as $slide) {
							$oldorder = $slide['order'];
							$i++;
							$order = $i;
							$output .= Options_Machine::optionsframework_slider_function($value['id'],$value['std'],$oldorder,$order);
						}
					}			
					$output .= '</ul>';
					$output .= '<a href="#" class="button slide_add_button">'.__('Add New Slide', 'Avada').'</a></div>';
					
				break;
				
				//drag & drop block manager
				case 'sorter':

					// Make sure to get list of all the default blocks first
					$all_blocks = $value['std'];

					$temp = array(); // holds default blocks
					$temp2 = array(); // holds saved blocks

					foreach($all_blocks as $blocks) {
						$temp = array_merge($temp, $blocks);
					}

					$sortlists = isset($data[$value['id']]) && !empty($data[$value['id']]) ? $data[$value['id']] : $value['std'];

					foreach( $sortlists as $sortlist ) {
					$temp2 = array_merge($temp2, $sortlist);
					}

					// now let's compare if we have anything missing
					foreach($temp as $k => $v) {
					if(!array_key_exists($k, $temp2)) {
						$sortlists['disabled'][$k] = $v;
					}
					}

					// now check if saved blocks has blocks not registered under default blocks
					foreach( $sortlists as $key => $sortlist ) {
					foreach($sortlist as $k => $v) {
						if(!array_key_exists($k, $temp)) {
						unset($sortlist[$k]);
						}
					}
					$sortlists[$key] = $sortlist;
					}

					// assuming all sync'ed, now get the correct naming for each block
					foreach( $sortlists as $key => $sortlist ) {
					foreach($sortlist as $k => $v) {
						$sortlist[$k] = $temp[$k];
					}
					$sortlists[$key] = $sortlist;
					}

					$output .= '<div id="'.$value['id'].'" class="sorter">';


					if ($sortlists) {

					foreach ($sortlists as $group=>$sortlist) {

						$output .= '<ul id="'.$value['id'].'_'.$group.'" class="sortlist_'.$value['id'].'">';
						$output .= '<h3>'.$group.'</h3>';

						foreach ($sortlist as $key => $list) {

						$output .= '<input class="sorter-placebo" type="hidden" name="'.$value['id'].'['.$group.'][placebo]" value="placebo">';

						if ($key != "placebo") {

							$output .= '<li id="'.$key.'" class="sortee">';
							$output .= '<input class="position" type="hidden" name="'.$value['id'].'['.$group.']['.$key.']" value="'.$list.'">';
							$output .= $list;
							$output .= '</li>';

						}

						}

						$output .= '</ul>';
					}
					}

					$output .= '</div>';
				break;
				
				//background images option
				case 'tiles':
					
					$i = 0;
					$select_value = isset($smof_data[$value['id']]) && !empty($smof_data[$value['id']]) ? $smof_data[$value['id']] : '';
					if (is_array($value['options'])) {
						foreach ($value['options'] as $key => $option) { 
						$i++;
				
							$checked = '';
							$selected = '';
							if(NULL!=checked($select_value, $option, false)) {
								$checked = checked($select_value, $option, false);
								$selected = 'of-radio-tile-selected';  
							}
							$output .= '<span>';
							$output .= '<input type="radio" id="of-radio-tile-' . $value['id'] . $i . '" class="checkbox of-radio-tile-radio" value="'.$option.'" name="'.$value['id'].'" '.$checked.' />';
							$output .= '<div class="of-radio-tile-img '. $selected .'" style="background: url('.$option.')" onClick="document.getElementById(\'of-radio-tile-'. $value['id'] . $i.'\').checked = true;"></div>';
							$output .= '</span>';				
						}
					}
					
				break;
				
				//backup and restore options data
				case 'backup':
				
					$instructions = $value['desc'];
					$backup = get_option(BACKUPS);

					if(!isset($backup['backup_log'])) {
						$log = 'No backups yet';
					} else {
						$log = $backup['backup_log'];
					}
					
					$output .= '<div class="backup-box">';
					$output .= '<div class="instructions">'.$instructions."\n";
					$output .= '<p><strong>'. __('Last Backup : ', 'Avada' ).'<span class="backup-log">'.$log.'</span></strong></p></div>'."\n";
					$output .= '<a href="#" id="of_backup_button" class="button" title="'.__('Backup Options', 'Avada').'">'.__('Backup Options', 'Avada').'</a>';
					$output .= '<a href="#" id="of_restore_button" class="button" title="'.__('Restore Options', 'Avada').'">'.__('Restore Options', 'Avada').'</a>';
					$output .= '</div>';
				
				break;
				
				//export or import data between different installs
				case 'transfer':
				
					$instructions = $value['desc'];
					$output .= '<textarea id="export_data" rows="8">'.base64_encode(serialize($smof_data)) /* 100% safe - ignore theme check nag */ .'</textarea>'."\n";
					$output .= '<a href="#" id="of_import_button" class="button" title="'.__('Restore Options', 'Avada').'">'.__('Import Options', 'Avada').'</a>';
				
				break;
				
				// google font field
				case 'select_google_font':
					$output .= '<div class="select_wrapper">';
					$output .= '<select class="select of-input google_font_select" name="'.$value['id'].'" id="'. $value['id'] .'">';
					foreach ($value['options'] as $select_key => $option) {
						$output .= '<option value="'.$select_key.'" ' . selected((isset($smof_data[$value['id']]))? $smof_data[$value['id']] : "", $option, false) . ' />'.$option.'</option>';
					} 
					$output .= '</select></div>';
					
					if(isset($value['preview']['text'])){
						$g_text = $value['preview']['text'];
					} else {
						$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz';
					}
					if(isset($value['preview']['size'])) {
						$g_size = 'style="font-size: '. $value['preview']['size'] .';"';
					} else { 
						$g_size = '';
					}
					
					$output .= '<p class="'.$value['id'].'_ggf_previewer google_font_preview" '. $g_size .'>'. $g_text .'</p>';
				break;
				
				//JQuery UI Slider
				case 'sliderui':
					$s_val = $s_min = $s_max = $s_step = $s_edit = '';//no errors, please
					
					$s_val  = stripslashes($smof_data[$value['id']]);
					
					if(!isset($value['min'])){ $s_min  = '0'; }else{ $s_min = $value['min']; }
					if(!isset($value['max'])){ $s_max  = $s_min + 1; }else{ $s_max = $value['max']; }
					if(!isset($value['step'])){ $s_step  = '1'; }else{ $s_step = $value['step']; }
					
					if(!isset($value['edit'])){ 
						$s_edit  = ' readonly="readonly"'; 
					}
					else
					{
						$s_edit  = '';
					}
					
					if ($s_val == '') $s_val = $s_min;
					
					//values
					$s_data = 'data-id="'.$value['id'].'" data-val="'.$s_val.'" data-min="'.$s_min.'" data-max="'.$s_max.'" data-step="'.$s_step.'"';
					
					//html output
					$output .= '<input type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'. $s_val .'" class="mini" '. $s_edit .' />';
					$output .= '<div id="'.$value['id'].'-slider" class="smof_sliderui" style="margin-left: 7px;" '. $s_data .'></div>';
					
				break;
				
				
				//Switch option
				case 'switch':
					if (!isset($smof_data[$value['id']])) {
						$smof_data[$value['id']] = 0;
					}
					
					$fold = '';
					if (array_key_exists("folds",$value)) $fold="s_fld ";
					
					$cb_enabled = $cb_disabled = '';//no errors, please
					
					//Get selected
					if ($smof_data[$value['id']] == 1){
						$cb_enabled = ' selected';
						$cb_disabled = '';
					}else{
						$cb_enabled = '';
						$cb_disabled = ' selected';
					}
					
					//Label ON
					if(!isset($value['on'])){
						$on = "On";
					}else{
						$on = $value['on'];
					}
					
					//Label OFF
					if(!isset($value['off'])){
						$off = "Off";
					}else{
						$off = $value['off'];
					}
					
					$output .= '<p class="switch-options">';
						$output .= '<label class="'.$fold.'cb-enable'. $cb_enabled .'" data-id="'.$value['id'].'"><span>'. $on .'</span></label>';
						$output .= '<label class="'.$fold.'cb-disable'. $cb_disabled .'" data-id="'.$value['id'].'"><span>'. $off .'</span></label>';
						
						$output .= '<input type="hidden" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="0"/>';
						$output .= '<input type="checkbox" id="'.$value['id'].'" class="'.$fold.'checkbox of-input main_checkbox" name="'.$value['id'].'"  value="1" '. checked($smof_data[$value['id']], 1, false) .' />';
						
					$output .= '</p>';
					
				break;

				// Uploader 3.5
				case "upload":
				case "media":

					if(!isset($value['mod'])) $value['mod'] = '';
					
					$u_val = '';
					if($smof_data[$value['id']]){
						$u_val = stripslashes($smof_data[$value['id']]);
					}

					$output .= Options_Machine::optionsframework_media_uploader_function($value['id'],$u_val, $value['mod']);
					
				break;

				case "fusion_sorter":

					$output .= '<ul class="fusion-sortable">';
					
					if( isset( $smof_data[$value['id']] ) ) {
						$s_value = $smof_data[$value['id']];
						if( $s_value ) {
							$s_order = explode(',', $s_value);
						}
					} else {
						$s_value = '';
					}

					$count = 0;

					foreach( $value['fields'] as $field ) {
						$default_array[$field['id']] = $field;
					}


					if( isset( $s_order ) && $s_order && is_array( $s_order ) ) {
						foreach( $s_order as $key => $field_order ) {
							$field_order_number = str_replace( $value['id'] . '_', '', $field_order );
							$find_the_field = $smof_data[$value['id'] . '_' . $field_order_number];
							$sorted_fields[] = $default_array[$find_the_field];
							$named_sorted_fields[$sorted_fields[$key]['id']] = $default_array[$find_the_field];
						}

						foreach( $default_array as $find_new_field_key => $find_new_field ) {
							if( ! array_key_exists( $find_new_field['id'], $named_sorted_fields ) ) {
								$sorted_fields[] = $find_new_field;
							}
						}
					} else {
						$sorted_fields = $value['fields'];
					}

					foreach( $sorted_fields as $field ) {
						$count++;
						$output .= '<li id="' . $value['id'] . '_' . $count . '">';

					 	$class = ''; if(isset( $field['class'] )) { $class = $field['class']; }
						
						//hide items in checkbox group
						$fold='';
						if (array_key_exists("fold",$field)) {
							if (isset($smof_data[$field['fold']]) && $smof_data[$field['fold']]) {
								$fold="f_".$field['fold']." ";
							} else {
								$fold="f_".$field['fold']." temphide ";
							}
						}
			
						$output .= '<div id="section-'.$field['id'].'" class="'.$fold.'section section-'.$field['type'].' '. $class .'">'."\n";
						
						//only show header if 'name' value exists
						if($field['name']) $output .= '<h3 class="heading">'. $field['name'] .'<span class="fa fa-arrows drag"></span></h3>'."\n";
						
						$output .= '<div class="option">'."\n" . '<div class="controls">'."\n";

						if( $field['type'] == 'text') {
							$t_value = '';
							if( isset( $smof_data[$field['id']] ) && $smof_data[$field['id']] ) {
								$t_value = stripslashes($smof_data[$field['id']]);
							} else {
								$t_value = $field['std'];
							}

							$mini ='';
							if(!isset($field['mod'])) { $field['mod'] = ''; }
							if($field['mod'] == 'mini') { $mini = 'mini'; }
							
							$output .= '<input class="of-input '.$mini.'" name="'.$field['id'].'" id="'. $field['id'] .'" type="'. $field['type'] .'" value="'. $t_value .'" />';
						}

						$output .= '<input type="hidden" name="' . $value['id'] . '_' . $count . '" value="' . $field['id'] . '">';

						if(!isset($field['desc'])){ $explain_value = ''; } else{ 
							$explain_value = '<div class="explain">'. $field['desc'] .'</div>'."\n"; 
						} 
						$output .= '</div>'.$explain_value."\n";
						$output .= '<div class="clear"> </div></div></div>'."\n";

						$output .= '</li>';
					}

					$output .= '</ul>';

					$output .= '<input type="hidden" class="fusion-sorter-positions" name="' . $value['id'] . '" value="' . stripslashes($s_value) . '">';

				break;
				
			}

			do_action('optionsframework_machine_loop', array(
					'options'	=> $options,
					'smof_data'	=> $smof_data,
					'defaults'	=> $defaults,
					'counter'	=> $counter,
					'menu'		=> $menu,
					'output'	=> $output,
					'value'		=> $value
				));
			$output .= $smof_output;
			
			//description of each option
			if ( $value['type'] != 'heading' ) { 
				if(!isset($value['desc'])){ $explain_value = ''; } else{ 
					$explain_value = '<div class="explain">'. $value['desc'] .'</div>'."\n"; 
				} 
				$output .= '</div>'.$explain_value."\n";
				$output .= '<div class="clear"> </div></div></div>'."\n";
				}

			   if( $value['type'] == 'accordion' && $value['position'] == 'end' ) {
			 	 $output .= '</div>';
			   }
			
			} /* condition empty end */
		   
		}
		
		$output .= '</div>';

		do_action('optionsframework_machine_after', array(
					'options'		=> $options,
					'smof_data'		=> $smof_data,
					'defaults'		=> $defaults,
					'counter'		=> $counter,
					'menu'			=> $menu,
					'output'		=> $output,
					'value'			=> $value
				));
		$output .= $smof_output;
		
		return array($output,$menu,$defaults);
		
	}


	/**
	 * Native media library uploader
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_media_uploader_function($id,$std,$mod){
		global $smof_data;
		
		$uploader = '';
		$upload = $smof_data[$id];
		$hide = '';
		
		if ($mod == "min") {$hide ='hide';}
		
		if ( $upload != "") { $val = $upload; } else {$val = $std;}
		
		$uploader .= '<input class="'.$hide.' upload of-input" name="'. $id .'" id="'. $id .'_upload" value="'. $val .'" />';	
		
		//Upload controls DIV
		$uploader .= '<div class="upload_button_div">';
		//If the user has WP3.5+ show upload/remove button
		if ( function_exists( 'wp_enqueue_media' ) ) {
			$uploader .= '<span class="button media_upload_button" id="'.$id.'">'.__('Upload', 'Avada').'</span>';
			
			if(!empty($upload)) {$hide = '';} else { $hide = 'hide';}
			$uploader .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'" title="' . $id . '">'.__('Remove', 'Avada').'</span>';
		}
		else 
		{
			$output .= '<p class="upload-notice"><i>'.__('Upgrade your version of WordPress for full media support.', 'Avada').'</i></p>';
		}

		$uploader .='</div>' . "\n";

		//Preview
		$uploader .= '<div class="screenshot">';
		if(!empty($upload)){	
			$uploader .= '<a class="of-uploaded-image" href="'. $upload . '">';
			$uploader .= '<img class="of-option-image" id="image_'.$id.'" src="'.$upload.'" alt="" />';
			$uploader .= '</a>';			
			}
		$uploader .= '</div>';
		$uploader .= '<div class="clear"></div>' . "\n"; 
	
		return $uploader;
		
	}

	/**
	 * Drag and drop slides manager
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_slider_function($id,$std,$oldorder,$order){
		
		$data = of_get_options();
		$smof_data = of_get_options();
		
		$slider = '';
		$slide = array();
		$slide = $smof_data[$id];
		
		if (isset($slide[$oldorder])) { $val = $slide[$oldorder]; } else {$val = $std;}
		
		//initialize all vars
		$slidevars = array('title','url','link','description');
		
		foreach ($slidevars as $slidevar) {
			if (!isset($val[$slidevar])) {
				$val[$slidevar] = '';
			}
		}
		
		//begin slider interface	
		if (!empty($val['title'])) {
			$slider .= '<li><div class="slide_header"><strong>'.stripslashes($val['title']).'</strong>';
		} else {
			$slider .= '<li><div class="slide_header"><strong>'.__('Slide', 'Avada').' '.$order.'</strong>';
		}
		
		$slider .= '<input type="hidden" class="slide of-input order" name="'. $id .'['.$order.'][order]" id="'. $id.'_'.$order .'_slide_order" value="'.$order.'" />';
	
		$slider .= '<a class="slide_edit_button" href="#">'.__('Edit', 'Avada').'</a></div>';
		
		$slider .= '<div class="slide_body">';
		
		$slider .= '<label'.__('>Title', 'Avada').'</label>';
		$slider .= '<input class="slide of-input of-slider-title" name="'. $id .'['.$order.'][title]" id="'. $id .'_'.$order .'_slide_title" value="'. stripslashes($val['title']) .'" />';
		
		$slider .= '<label>'.__('Image URL', 'Avada').'</label>';
		$slider .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][url]" id="'. $id .'_'.$order .'_slide_url" value="'. $val['url'] .'" />';
		
		$slider .= '<div class="upload_button_div"><span class="button media_upload_button" id="'.$id.'_'.$order .'">'.__('Upload', 'Avada').'</span>';
		
		if(!empty($val['url'])) {$hide = '';} else { $hide = 'hide';}
		$slider .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">'.__('Remove', 'Avada').'</span>';
		$slider .='</div>' . "\n";
		$slider .= '<div class="screenshot">';
		if(!empty($val['url'])){
			
			$slider .= '<a class="of-uploaded-image" href="'. $val['url'] . '">';
			$slider .= '<img class="of-option-image" id="image_'.$id.'_'.$order .'" src="'.$val['url'].'" alt="" />';
			$slider .= '</a>';
			
			}
		$slider .= '</div>';	
		$slider .= '<label>'.__('Link URL (optional)', 'Avada').'</label>';
		$slider .= '<input class="slide of-input" name="'. $id .'['.$order.'][link]" id="'. $id .'_'.$order .'_slide_link" value="'. $val['link'] .'" />';
		
		$slider .= '<label>'.__('Description (optional)', 'Avada').'</label>';
		$slider .= '<textarea class="slide of-input" name="'. $id .'['.$order.'][description]" id="'. $id .'_'.$order .'_slide_description" cols="8" rows="8">'.stripslashes($val['description']).'</textarea>';
	
		$slider .= '<a class="slide_delete_button" href="#">'.__('Delete', 'Avada').'</a>';
		$slider .= '<div class="clear"></div>' . "\n";
	
		$slider .= '</div>';
		$slider .= '</li>';
	
		return $slider;
		
	}

	
}//end Options Machine class

?>
