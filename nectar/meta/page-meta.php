<?php 
add_action('add_meta_boxes_page', 'nectar_metabox_page');
function nectar_metabox_page(){
    
	$options = get_nectar_theme_options(); 
	if(!empty($options['transparent-header']) && $options['transparent-header'] == '1') {
		$disable_transparent_header = array( 
					'name' =>  __('Disable Transparency From Navigation', tavoweb),
					'desc' => __('You can use this option to force your navigation header to stay a solid color even if it qualifies to trigger the <a target="_blank" href="'. admin_url('?page=redux_options&tab=4#header-padding') .'"> transparent effect</a> you have activated in the Salient options panel.', tavoweb),
					'id' => '_disable_transparent_header',
					'type' => 'checkbox',
	                'std' => ''
				);
		$force_transparent_header = array( 
					'name' =>  __('Force Transparency On Navigation', tavoweb),
					'desc' => __('You can use this option to force your navigation header to start transparent even if it does not qualify to trigger the <a target="_blank" href="'. admin_url('?page=redux_options&tab=4#header-padding') .'"> transparent effect</a> you have activated in the Salient options panel.', tavoweb),
					'id' => '_force_transparent_header',
					'type' => 'checkbox',
	                'std' => ''
				);
	} else {
		$disable_transparent_header = null;
		$force_transparent_header = null;
	}
	
	#-----------------------------------------------------------------#
	# Fullscreen rows
	#-----------------------------------------------------------------#
    $meta_box = array(
		'id' => 'nectar-metabox-fullscreen-rows',
		'title' => __('Page Full Screen Rows', tavoweb),
		'description' => __('Here you can configure your page fullscreen rows', tavoweb),
		'post_type' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

				array( 
					'name' => __('Activate Fullscreen Rows', tavoweb),
					'desc' => __('This will cause all rows to be fullscreen. Some functionality and options within visual composer will be changed when this is active.', tavoweb),
					'id' => '_nectar_full_screen_rows',
					'type' => 'choice_below',
					'options' => array(
						'off' => 'Off',
						'on' => 'On'
					),
					'std' => 'off'
				),
				array( 
					'name' => __('Animation Bewteen Rows', tavoweb),
					'desc' => __('Select your desired animation between rows', tavoweb),
					'id' => '_nectar_full_screen_rows_animation',
					'type' => 'select',
					'std' => 'none',
					'options' => array(
						"none" => "Default Scroll",
				  		 "zoom-out-parallax" => "Zoom Out + Parallax",
				  		 "parallax" => "Parallax"
					)
				),
				array( 
					'name' => __('Animation Speed', tavoweb),
					'desc' => __('Selection your desired animation speed', tavoweb),
					'id' => '_nectar_full_screen_rows_animation_speed',
					'type' => 'select',
					'std' => 'medium',
					'options' => array(
						"slow" => "Slow",
				  		 "medium" => "Medium",
				  		 "fast" => "Fast"
					)
				),
				array( 
					'name' => __('Overall BG Color', tavoweb),
					'desc' => __('Set your desired background color which will be seen when transitioning through rows. Defaults to #333333', tavoweb),
					'id' => '_nectar_full_screen_rows_overall_bg_color',
					'type' => 'color',
					'std' => ''
				),
				array(
					'name' =>  __('Add Row Anchors to URL', tavoweb),
					'desc' => __('Enable this to add anchors into your URL for each row.', tavoweb),
					'id' => '_nectar_full_screen_rows_anchors',
					'type' => 'checkbox',
	                'std' => '0'
				),
				array(
					'name' =>  __('Disable On Mobile', tavoweb),
					'desc' => __('Check this to disable the page full screen rows when viewing on a mobile device.', tavoweb),
					'id' => '_nectar_full_screen_rows_mobile_disable',
					'type' => 'checkbox',
	                'std' => '0'
				),
				array( 
					'name' => __('Row BG Image Animation', tavoweb),
					'desc' => __('Select your desired row BG image animation', tavoweb),
					'id' => '_nectar_full_screen_rows_row_bg_animation',
					'type' => 'select',
					'std' => 'none',
					'options' => array(
						"none" => "None",
				  		 "ken_burns" => "Ken Burns Zoom"
					)
				),
				array( 
					'name' => __('Dot Navigation', tavoweb),
					'desc' => __('Select your desired dot navigation style', tavoweb),
					'id' => '_nectar_full_screen_rows_dot_navigation',
					'type' => 'select',
					'std' => 'tooltip',
					'options' => array(
						"transparent" => "Transparent",
				  		 "tooltip" => "Tooltip",
				  		 "tooltip_alt" => "Tooltip Alt",
				  		 "hidden" => "None (Hidden)"
					)
				),
				array( 
					'name' => __('Row Overflow', tavoweb),
					'desc' => __('Select how you would like rows to be handled that have content taller than the users window height. This only applies to desktop (mobile will automatically get scrollbars)', tavoweb),
					'id' => '_nectar_full_screen_rows_content_overflow',
					'type' => 'select',
					'std' => 'tooltip',
					'options' => array(
						"scrollbar" => "Provide Scrollbar",
				  		"hidden" => "Hide Extra Content",
					)
				),
				array( 
					'name' => __('Page Footer', tavoweb),
					'desc' => __('This option allows you to define what will be used for the footer after your fullscreen rows', tavoweb),
					'id' => '_nectar_full_screen_rows_footer',
					'type' => 'select',
					'std' => 'none',
					'options' => array(
						"default" => "Default Footer",
						"last_row" => "Last Row",
						"none" => "None"
					)
				),
		)
	);
	$callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	

	#-----------------------------------------------------------------#
	# Header Settings
	#-----------------------------------------------------------------#
    $meta_box = array(
		'id' => 'nectar-metabox-page-header',
		'title' => __('Page Header Settings', tavoweb),
		'description' => __('Here you can configure how your page header will appear. <br/> For a full width background image behind your header text, simply upload the image below. To have a standard header just fill out the fields below and don\'t upload an image.', tavoweb),
		'post_type' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array( 
					'name' => __('Background Type', tavoweb),
					'desc' => __('Please select the background type you would like to use for your slide.', tavoweb),
					'id' => '_nectar_slider_bg_type',
					'type' => 'choice_below',
					'options' => array(
						'image_bg' => 'Image Background',
						'video_bg' => 'Video Background',
						'particle_bg' => 'HTML5 Canvas Background'
					),
					'std' => 'image_bg'
				),
			
			array( 
					'name' => __('Particle Images', tavoweb),
					'desc' => 'Add images here that will be used to create the particle shapes.',
					'id' => '_nectar_canvas_shapes',
					'type' => 'canvas_shape_group',
					'class' => 'nectar_slider_canvas_shape',
					'std' => ''
				),


			array( 
					'name' => __('Video WebM Upload', tavoweb),
					'desc' => __('Browse for your WebM video file here.<br/> This will be automatically played on load so make sure to use this responsibly for enhancing your design, rather than annoy your user. e.g. A video loop with no sound.<br/><strong>You must include this format & the mp4 format to render your video with cross browser compatibility. OGV is optional.</strong> <br/><strong>Video must be in a 16:9 aspect ratio.</strong>', tavoweb),
					'id' => '_nectar_media_upload_webm',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('Video MP4 Upload', tavoweb),
					'desc' => __('Browse for your mp4 video file here.<br/> See the note above for recommendations on how to properly use your video background.', tavoweb),
					'id' => '_nectar_media_upload_mp4',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('Video OGV Upload', tavoweb),
					'desc' => __('Browse for your OGV video file here.<br/>  See the note above for recommendations on how to properly use your video background.', tavoweb),
					'id' => '_nectar_media_upload_ogv',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('Preview Image', tavoweb),
					'desc' => __('This is the image that will be seen in place of your video on mobile devices & older browsers before your video is played (browsers like IE8 don\'t allow autoplaying).', tavoweb),
					'id' => '_nectar_slider_preview_image',
					'type' => 'file',
					'std' => ''
				),	


			array( 
					'name' => __('Page Header Image', tavoweb),
					'desc' => __('The image should be between 1600px - 2000px wide and have a minimum height of 475px for best results. Click "Browse" to upload and then "Insert into Post".', tavoweb),
					'id' => '_nectar_header_bg',
					'type' => 'file',
					'std' => ''
				),
			array(
					'name' =>  __('Parallax Header', tavoweb),
					'desc' => __('This will cause your header to have a parallax scroll effect.', tavoweb),
					'id' => '_nectar_header_parallax',
					'type' => 'checkbox',
					'extra' => 'first2',
	                'std' => 1
				),	
			array(
					'name' =>  __('Box Roll Header', tavoweb),
					'desc' => __('This will cause your header to have a 3d box roll on scroll. (deactivated for boxed layouts)', tavoweb),
					'id' => '_nectar_header_box_roll',
					'type' => 'checkbox',
					'extra' => 'last',
	                'std' => ''
				),
			array( 
					'name' => __('Page Header Height', tavoweb),
					'desc' => __('How tall do you want your header? <br/>Don\'t include "px" in the string. e.g. 350 <br/><strong>This only applies when you are using an image/bg color.</strong>', tavoweb),
					'id' => '_nectar_header_bg_height',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Fullscreen Height', tavoweb),
					'desc' => __('Chooseing this option will allow your header to always remain fullscreen on all devices/screen sizes.', tavoweb),
					'id' => '_nectar_header_fullscreen',
					'type' => 'checkbox',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Title', tavoweb),
					'desc' => __('Enter in the page header title', tavoweb),
					'id' => '_nectar_header_title',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Subtitle', tavoweb),
					'desc' => __('Enter in the page header subtitle', tavoweb),
					'id' => '_nectar_header_subtitle',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Text Effect', tavoweb),
					'desc' => __('Please select your desired text effect', tavoweb),
					'id' => '_nectar_page_header_text-effect',
					'type' => 'select',
					'std' => 'none',
					'options' => array(
						"none" => "None",
				  		 "rotate_in" => "Rotate In"
					)
				),
			array( 
					'name' => __('Shape Autorotate Timing', tavoweb),
					'desc' => __('Enter your desired autorotation time in milliseconds e.g. "5000". Leaving this blank will disable the functionality.', tavoweb),
					'id' => '_nectar_particle_rotation_timing',
					'type' => 'text',
					'std' => ''
				),
			array(
					'name' =>  __('Disable Chance For Particle Explosion', tavoweb),
					'desc' => __('By default there\'s a 50% chance on autorotation that your particles will explode. Checking this box disables that.', tavoweb),
					'id' => '_nectar_particle_disable_explosion',
					'type' => 'checkbox',
	                'std' => ''
				),
			array( 
					'name' => __('Content Alignment', tavoweb),
					'desc' => __('Horizontal Alignment', tavoweb),
					'id' => '_nectar_page_header_alignment',
					'type' => 'caption_pos',
					'options' => array(
						'left' => 'Left',
						'center' => 'Centered',
						'right' => 'Right',
					),
					'std' => 'left',
					'extra' => 'first2'
				),
				
			array( 
					'name' => __('Content Alignment', tavoweb),
					'desc' => __('Vertical Alignment', tavoweb),
					'id' => '_nectar_page_header_alignment_v',
					'type' => 'caption_pos',
					'options' => array(
						'top' => 'Top',
						'middle' => 'Middle',
						'bottom' => 'Bottom',
					),
					'std' => 'middle',
					'extra' => 'last'
				),
			array( 
					'name' => __('Background Alignment', tavoweb),
					'desc' => __('Please choose how you would like your header background to be aligned', tavoweb),
					'id' => '_nectar_page_header_bg_alignment',
					'type' => 'select',
					'std' => 'center',
					'options' => array(
						"top" => "Top",
				  		 "center" => "Center",
				  		 "bottom" => "Bottom"
					)
				),
			array( 
					'name' => __('Page Header Background Color', tavoweb),
					'desc' => __('Set your desired page header background color if not using an image', tavoweb),
					'id' => '_nectar_header_bg_color',
					'type' => 'color',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Font Color', tavoweb),
					'desc' => __('Set your desired page header font color', tavoweb),
					'id' => '_nectar_header_font_color',
					'type' => 'color',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Overlay Color', tavoweb),
					'desc' => __('This will be applied ontop on your page header BG image (if supplied).', tavoweb),
					'id' => '_nectar_header_bg_overlay_color',
					'type' => 'color',
					'std' => ''
				),
		    $disable_transparent_header,
		    $force_transparent_header
		)
	);
	$callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
	
	#-----------------------------------------------------------------#
	# Portfolio Display Settings
	#-----------------------------------------------------------------#
	$portfolio_types = get_terms('project-type');

	$types_options = array("all" => "All");
	
	foreach ($portfolio_types as $type) {
		$types_options[$type->slug] = $type->name;
	}
			
    $meta_box = array(
		'id' => 'nectar-metabox-portfolio-display',
		'title' => __('Portfolio Display Settings', tavoweb),
		'description' => __('Here you can configure which categories will display in your portfolio.', tavoweb),
		'post_type' => 'page',
		'context' => 'side',
		'priority' => 'core',
		'fields' => array(
			array( 
					'name' => 'Portfolio Categories',
					'desc' => '',
					'id' => 'nectar-metabox-portfolio-display',
					'type' => 'multi-select',
					'options' => $types_options,
					'std' => 'all'
				),
			array( 
					'name' => 'Display Sortable',
					'desc' => 'Should these portfolio items be sortable?',
					'id' => 'nectar-metabox-portfolio-display-sortable',
					'type' => 'checkbox',
					'std' => '1'
				)
		)
	);
	$callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
	
}


?>