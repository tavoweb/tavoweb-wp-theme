<?php 
add_action('add_meta_boxes', 'nectar_metabox_nectar_slider');
function nectar_metabox_nectar_slider(){
    
    $meta_box = array(
		'id' => 'nectar-metabox-nectar-slider',
		'title' => __('Slide Settings', tavoweb),
		'description' => __('Please fill out & configure the fileds below to create your slide. The only mandatory field is the "Slide Image".', tavoweb),
		'post_type' => 'nectar_slider',
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
						'video_bg' => 'Video Background'
					),
					'std' => 'image_bg'
				),
			array( 
					'name' => __('Slide Image', tavoweb),
					'desc' => __('Click the "Upload" button to begin uploading your image, followed by "Select File" once you have made your selection.', tavoweb),
					'id' => '_nectar_slider_image',
					'type' => 'file',
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
					'name' =>  __('Add texture overlay to background', tavoweb),
					'desc' => __('If you would like a slight texture overlay on your background, activate this option.', tavoweb),
					'id' => '_nectar_slider_video_texture',
					'type' => 'checkbox',
	                'std' => 1
				),	
			
			array( 
					'name' => __('Background Alignment', tavoweb),
					'desc' => __('Please choose how you would like your slides background to be aligned', tavoweb),
					'id' => '_nectar_slider_slide_bg_alignment',
					'type' => 'select',
					'std' => 'center',
					'options' => array(
						"top" => "Top",
				  		 "center" => "Center",
				  		 "bottom" => "Bottom"
					)
				),
				
			array( 
					'name' => __('Slide Font Color', tavoweb),
					'desc' => __('This gives you an easy way to make sure your text is visible regardless of the background.', tavoweb),
					'id' => '_nectar_slider_slide_font_color',
					'type' => 'select',
					'std' => '',
					'options' => array(
						'light' => 'Light',
						'dark' => 'Dark'
					)
				),
				
			array( 
					'name' => __('Heading', tavoweb),
					'desc' => __('Please enter in the heading for your slide.', tavoweb),
					'id' => '_nectar_slider_heading',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Caption', tavoweb),
					'desc' => __('If you have a caption for your slide, enter it here', tavoweb),
					'id' => '_nectar_slider_caption',
					'type' => 'textarea',
					'std' => ''
				),
			array(
					'name' =>  __('Caption Background', tavoweb),
					'desc' => __('If you would like to add a semi transparent background to your caption, activate this option.', tavoweb),
					'id' => '_nectar_slider_caption_background',
					'type' => 'checkbox',
	                'std' => ''
				),	
			array( 
					'name' => __('Insert Down Arrow That Leads to Content Below?', tavoweb),
					'desc' => __('This is particularly useful when using tall sliders to let the user know there\'s content underneath.', tavoweb),
					'id' => '_nectar_slider_down_arrow',
					'type' => 'checkbox',
					'std' => ''
				),	
			array( 
					'name' => __('Link Type', tavoweb),
					'desc' => __('Please select how you would like to link your slide.', tavoweb),
					'id' => '_nectar_slider_link_type',
					'type' => 'choice_below',
					'options' => array(
						'button_links' => 'Button Links',
						'full_slide_link' => 'Full Slide Link'
					),
					'std' => 'button_links'
				),	
			array( 
					'name' => __('Button Text', tavoweb),
					'desc' => __('Enter the text for your button here.', tavoweb),
					'id' => '_nectar_slider_button',
					'type' => 'slider_button_textarea',
					'std' => '',
					'extra' => 'first'
				),
			array( 
					'name' => __('Button Link', tavoweb),
					'desc' => __('Enter a URL here.', tavoweb),
					'id' => '_nectar_slider_button_url',
					'type' => 'slider_button_textarea',
					'std' => '',
					'extra' => 'inline'
				),
			array( 
					'name' => __('Button Style', tavoweb),
					'desc' => __('Desired button style', tavoweb),
					'id' => '_nectar_slider_button_style',
					'type' => 'slider_button_select',
					'std' => '',
					'options' => array(
						'solid_color' => __('Solid Color BG', tavoweb),
						'solid_color_2' => __('Solid Color BG W/ Tilt Hover', tavoweb),
						'transparent' => __('Transparent With Border', tavoweb),
						'transparent_2' => __('Transparent W/ Solid BG Hover', tavoweb)
					),
					'extra' => 'inline'
				),
			array( 
					'name' => __('Button Color', tavoweb),
					'desc' => __('Desired color', tavoweb),
					'id' => '_nectar_slider_button_color',
					'type' => 'slider_button_select',
					'std' => '',
					'options' => array(
						'primary-color' => __('Primary Color', tavoweb),
						'extra-color-1' => __('Extra Color #1', tavoweb),
						'extra-color-2' => __('Extra Color #2', tavoweb),
						'extra-color-3' => __('Extra Color #3', tavoweb)
					),
					'extra' => 'last'
				),
				
			
			array( 
					'name' => __('Button Text', tavoweb),
					'desc' => __('Enter the text for your button here.', tavoweb),
					'id' => '_nectar_slider_button_2',
					'type' => 'slider_button_textarea',
					'std' => '',
					'extra' => 'first'
				),
			array( 
					'name' => __('Button Link', tavoweb),
					'desc' => __('Enter a URL here.', tavoweb),
					'id' => '_nectar_slider_button_url_2',
					'type' => 'slider_button_textarea',
					'std' => '',
					'extra' => 'inline'
				),
			array( 
					'name' => __('Button Style', tavoweb),
					'desc' => __('Desired button style', tavoweb),
					'id' => '_nectar_slider_button_style_2',
					'type' => 'slider_button_select',
					'std' => '',
					'options' => array(
						'solid_color' => __('Solid Color Background', tavoweb),
						'solid_color_2' => __('Solid Color BG W/ Tilt Hover', tavoweb),
						'transparent' => __('Transparent With Border', tavoweb),
						'transparent_2' => __('Transparent W/ Solid BG Hover', tavoweb)
					),
					'extra' => 'inline'
				),
			array( 
					'name' => __('Button Color', tavoweb),
					'desc' => __('Desired color', tavoweb),
					'id' => '_nectar_slider_button_color_2',
					'type' => 'slider_button_select',
					'std' => '',
					'options' => array(
						'primary-color' => __('Primary Color', tavoweb),
						'extra-color-1' => __('Extra Color #1', tavoweb),
						'extra-color-2' => __('Extra Color #2', tavoweb),
						'extra-color-3' => __('Extra Color #3', tavoweb)
					),
					'extra' => 'last'
				),
				
			array( 
					'name' => __('Slide Link', tavoweb),
					'desc' => __('Please enter your URL that will be used to link the slide.', tavoweb),
					'id' => '_nectar_slider_entire_link',
					'type' => 'text',
					'std' => ''
				),
				
			array( 
					'name' => __('Slide Video Popup', tavoweb),
					'desc' => __('Enter in an embed code from Youtube or Vimeo that will be used to display your video in a popup. (You can also use the WordPress video shortcode)', tavoweb),
					'id' => '_nectar_slider_video_popup',
					'type' => 'textarea',
					'std' => ''
				),
				
			array( 
					'name' => __('Slide Content Alignment', tavoweb),
					'desc' => __('Horizontal Alignment', tavoweb),
					'id' => '_nectar_slide_xpos_alignment',
					'type' => 'caption_pos',
					'options' => array(
						'left' => 'Left',
						'centered' => 'Centered',
						'right' => 'Right',
					),
					'std' => 'left',
					'extra' => 'first'
				),
				
			array( 
					'name' => __('Slide Content Alignment', tavoweb),
					'desc' => __('Vertical Alignment', tavoweb),
					'id' => '_nectar_slide_ypos_alignment',
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
				'name' => __('Extra Class Name', tavoweb),
				'desc' => __('If you would like to enter a custom class name to this slide for css purposes, enter it here.', tavoweb),
				'id' => '_nectar_slider_slide_custom_class',
				'type' => 'text',
				'std' => ''
			)
		)
	);
	$callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
	
	
	
	
}


?>