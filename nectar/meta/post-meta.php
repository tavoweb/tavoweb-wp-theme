<?php 

	
	add_action('add_meta_boxes_post', 'nectar_metabox_posts');
	function nectar_metabox_posts(){
		
		
		$options = get_nectar_theme_options(); 
		if(!empty($options['transparent-header']) && $options['transparent-header'] == '1') {
			$disable_transparent_header = array( 
						'name' =>  __('Disable Transparency From Navigation', tavoweb),
						'desc' => __('You can use this option to force your navigation header to stay a solid color even if it qaulifies to trigger to <a target="_blank" href="'. admin_url('?page=redux_options&tab=4#header-padding') .'"> transparent effect</a> you have activate in the Salient options panel.', tavoweb),
						'id' => '_disable_transparent_header',
						'type' => 'checkbox',
		                'std' => ''
					);
		} else {
			$disable_transparent_header = null;
		}
		
		
		if ( floatval(get_bloginfo('version')) < "3.6" ) { 

			#-----------------------------------------------------------------#
			# Gallery
			#-----------------------------------------------------------------# 
			$meta_box = array(
				'id' => 'nectar-metabox-post-gallery',
				'title' =>  __('Gallery Settings', tavoweb),
				'description' => __('Please use the sections that have appeared under the Featured Image block labeled "Second Slide, Third Slide..." etc to add images to your gallery.', tavoweb),
				'post_type' => 'post',
				'context' => 'normal',
				'priority' => 'high',
				'fields' => array(
		    		
				)
			);
			$callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
			add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
		} else {
			
		
			$meta_box = array(
				'id' => 'nectar-metabox-post-gallery',
				'title' =>  __('Gallery Configuration', tavoweb),
				'description' => 'Once you\'ve inserted a WordPress gallery using the "Add Media" button above, you can use the gallery slider checkbox below to transform your images into a slider.',
				'post_type' => 'post',
				'context' => 'normal',
				'priority' => 'high',
				'fields' => array(
					array(
							'name' =>  __('Gallery Slider', tavoweb),
							'desc' => __('Would you like to turn your gallery into a slider?', tavoweb),
							'id' => '_nectar_gallery_slider',
							'type' => 'checkbox',
		                    'std' => 1
						)
				)
			);
			$callback = create_function( '$post,$meta_box', 'nectar_create_meta_box( $post, $meta_box["args"] );' );
		    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );

		}
		
		
		#-----------------------------------------------------------------#
		# Quote
		#-----------------------------------------------------------------# 
	    $meta_box = array(
			'id' => 'nectar-metabox-post-quote',
			'title' =>  __('Quote Settings', tavoweb),
			'description' => '',
			'post_type' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
						'name' =>  __('Quote Author', tavoweb),
						'desc' => __('Please input the name of who your quote is from. Is left blank the post title will be used.', tavoweb),
						'id' => '_nectar_quote_author',
						'type' => 'text',
						'std' => ''
					),
				array(
						'name' =>  __('Quote Content', tavoweb),
						'desc' => __('Please type the text for your quote here.', tavoweb),
						'id' => '_nectar_quote',
						'type' => 'textarea',
	                    'std' => ''
					)
			)
		);
	    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
		
		#-----------------------------------------------------------------#
		# Link
		#-----------------------------------------------------------------# 
		$meta_box = array(
			'id' => 'nectar-metabox-post-link',
			'title' =>  __('Link Settings', tavoweb),
			'description' => '',
			'post_type' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
						'name' =>  __('Link URL', tavoweb),
						'desc' => __('Please input the URL for your link. I.e. http://www.themenectar.com', tavoweb),
						'id' => '_nectar_link',
						'type' => 'text',
						'std' => ''
					)
			)
		);
	    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	    
		#-----------------------------------------------------------------#
		# Video
		#-----------------------------------------------------------------# 
	    $meta_box = array(
			'id' => 'nectar-metabox-post-video',
			'title' => __('Video Settings', 'nectar'),
			'description' => '',
			'post_type' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array( 
					'name' => __('MP4 File URL', tavoweb),
					'desc' => __('Please upload the .m4v video file.', tavoweb),
					'id' => '_nectar_video_m4v',
					'type' => 'media', 
					'std' => ''
				),
				array( 
						'name' => __('OGV File URL', tavoweb),
						'desc' => __('Please upload the .ogv video file', tavoweb),
						'id' => '_nectar_video_ogv',
						'type' => 'media',
						'std' => ''
					),
				array( 
						'name' => __('Preview Image', tavoweb),
						'desc' => __('Image should be at least 680px wide. Click the "Upload" button to begin uploading your image, followed by "Select File" once you have made your selection. Only applies to self hosted videos.', tavoweb),
						'id' => '_nectar_video_poster',
						'type' => 'file',
						'std' => ''
					),
				array(
						'name' => __('Embedded Code', tavoweb),
						'desc' => __('If the video is an embed rather than self hosted, enter in a Vimeo or Youtube embed code here. <strong> Embeds work worse with the parallax effect, but if you must use this, Vimeo is recommended. </strong> ', tavoweb),
						'id' => '_nectar_video_embed',
						'type' => 'textarea',
						'std' => ''
					)
			)
		);
		add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
		
		#-----------------------------------------------------------------#
		# Audio
		#-----------------------------------------------------------------# 
		$meta_box = array(
			'id' => 'nectar-metabox-post-audio',
			'title' =>  __('Audio Settings', tavoweb),
			'description' => '',
			'post_type' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array( 
					'name' => __('MP3 File URL', tavoweb),
					'desc' => __('Please enter in the URL to the .mp3 file', tavoweb),
					'id' => '_nectar_audio_mp3',
					'type' => 'text',
					'std' => ''
				),
				array( 
						'name' => __('OGA File URL', tavoweb),
						'desc' => __('Please enter in the URL to the .ogg or .oga file', tavoweb),
						'id' => '_nectar_audio_ogg',
						'type' => 'text',
						'std' => ''
					)
			)
		);
		add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
		
		

		#-----------------------------------------------------------------#
		# Post Configuration
		#-----------------------------------------------------------------# 
		if(!empty($options['blog_masonry_type']) && $options['blog_masonry_type'] == 'meta_overlaid' ||
			!empty($options['blog_masonry_type']) && $options['blog_masonry_type'] == 'classic_enhanced') {
			$meta_box = array(
				'id' => 'nectar-metabox-post-config',
				'title' =>  __('Post Configuration', tavoweb),
				'description' => __('Configure the various options for how your post will display', tavoweb),
				'post_type' => 'post',
				'context' => 'normal',
				'priority' => 'high',
				'fields' => array(
					array( 
						'name' => __('Masonry Item Sizing', tavoweb),
						'desc' => __('This will only be used if you choose to display your portfolio in the masonry format', tavoweb),
						'id' => '_post_item_masonry_sizing',
						'type' => 'select',
						'std' => 'tall_regular',
						'options' => array(
							"regular" => "Regular",
					  		"wide_tall" => "Regular Alt",
					  		"large_featured" => "Large Featured",
						)
					)
				)
			);
			add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
		}
		

		
		#-----------------------------------------------------------------#
		# Header Settings
		#-----------------------------------------------------------------#
		if(!empty($options['blog_header_type']) && $options['blog_header_type'] == 'fullscreen') {
			$header_height = null;

			$bg_overlay = array(
				'name' =>  __('Background Overlay', tavoweb),
				'desc' => __('This will add a slight overlay onto your header which will allow lighter text to be easily visible on light images ', tavoweb),
				'id' => '_nectar_header_overlay',
				'type' => 'checkbox',
                'std' => 1
			);
			$bg_bottom_shad = array(
				'name' =>  __('Bottom Shadow', tavoweb),
				'desc' => __('This will add a subtle shadow at the bottom of your header', tavoweb),
				'id' => '_nectar_header_bottom_shadow',
				'type' => 'checkbox',
                'std' => 1
			);

		} else {
			$header_height = array( 
					'name' => __('Page Header Height', tavoweb),
					'desc' => __('How tall do you want your header? <br/>Don\'t include "px" in the string. e.g. 350 <br/><strong>This only applies when you are using an image/bg color.</strong>', tavoweb),
					'id' => '_nectar_header_bg_height',
					'type' => 'text',
					'std' => ''
				);
			$bg_overlay = null;
			$bg_bottom_shad = null;
		}

	    $meta_box = array(
			'id' => 'nectar-metabox-page-header',
			'title' => __('Post Header Settings', tavoweb),
			'description' => __('Here you can configure how your page header will appear. ', tavoweb),
			'post_type' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array( 
						'name' => __('Page Header Image', tavoweb),
						'desc' => __('The image should be between 1600px - 2000px wide and have a minimum height of 475px for best results.', tavoweb),
						'id' => '_nectar_header_bg',
						'type' => 'file',
						'std' => ''
					),
				array(
						'name' =>  __('Parallax Header?', tavoweb),
						'desc' => __('If you would like your header to have a parallax scroll effect check this box.', tavoweb),
						'id' => '_nectar_header_parallax',
						'type' => 'checkbox',
		                'std' => 1
					),	
				$header_height,
				array( 
						'name' => __('Background Alignment', tavoweb),
						'desc' => __('Please choose how you would like your header background to be aligned', tavoweb),
						'id' => '_nectar_page_header_bg_alignment',
						'type' => 'select',
						'std' => 'top',
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
						'desc' => __('Set your desired page header font color - will only be used if using a header bg image/color', tavoweb),
						'id' => '_nectar_header_font_color',
						'type' => 'color',
						'std' => ''
					),
				$bg_overlay,
				$bg_bottom_shad,
				$disable_transparent_header	
			)
		);
		add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
			
		
		
	}

	
	
	


?>