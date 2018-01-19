<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "salient_redux";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

   

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $theme_menu_icon = null;
    if(floatval(get_bloginfo('version')) >= "3.8") {
        $current_color = get_user_option( 'admin_color' );
        if($current_color == 'light') {
            $theme_menu_icon = NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/icons/salient-grey.svg';
        } else {
            $theme_menu_icon = NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/icons/salient.svg';
        }
    } 


    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        'disable_tracking' => true,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'TavoWEB', 'redux-framework-demo' ),
        'page_title'           => __( 'Temos nustatymai', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 54,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => $theme_menu_icon,
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => '',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => ' ',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/TavoWEB',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = '';
    } else {
         $args['intro_text'] = '';
    }

    // Add content after the form.
    $args['footer_text'] = '';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /* EXT LOADER */
    if(!function_exists('redux_register_custom_extension_loader')) :
    function redux_register_custom_extension_loader($ReduxFramework) {
        $path = dirname( __FILE__ ) . '/extensions/';
        $folders = scandir( $path, 1 );        
        foreach($folders as $folder) {
            if ($folder === '.' or $folder === '..' or !is_dir($path . $folder) ) {
                continue;   
            } 
            $extension_class = 'ReduxFramework_Extension_' . $folder;
            if( !class_exists( $extension_class ) ) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters( 'redux/extension/'.$ReduxFramework->args['opt_name'].'/'.$folder, $class_file );
                if( $class_file ) {
                    require_once( $class_file );
                    $extension = new $extension_class( $ReduxFramework );
                }
            }
        }
    }
    // Modify {$redux_opt_name} to match your opt_name
    add_action("redux/extensions/".$opt_name ."/before", 'redux_register_custom_extension_loader', 0);
    endif;


    //write dynamic css
    //$options = get_nectar_theme_options(); 
    //if(!empty($options['external-dynamic-css']) && $options['external-dynamic-css'] == 1) {
        add_action ('redux/options/salient_redux/saved', 'generate_options_css');
    //}


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

  

     Redux::setSection( $opt_name, array(
        'title'            => __( 'General Settings', tavoweb ),
        'id'               => 'general-settings',
        'customizer_width' => '450px',
        'desc'             => 'Welcome to the Salient options panel! You can switch between option groups by using the left-hand tabs.',
        'fields'           => array(

        )
    ) );
    
    $border_border_sizes = array();
    for($i = 1; $i<100; $i++) {
         $border_border_sizes[$i] = $i;
    }
     Redux::setSection( $opt_name, array(
        'title'            => __( 'Styling', 'redux-framework-demo' ),
        'id'               => 'general-settings-styling',
        'subsection'       => true,
        'fields'           => array(
           array(
                'id' => 'theme-skin', 
                'type' => 'select', 
                'title' => __('Theme Skin', tavoweb),
                'subtitle' => 'This will alter the overall styling of various theme elements',
                'options' => array(
                    "original" => "Original",
                    "ascend" => "Ascend",
                    "material" => "Material"
                ),
                'default' => 'ascend'
            ),
            array(
                'id' => 'favicon',
                'type' => 'media',
                'title' => __('Favicon Upload', tavoweb), 
                'subtitle' => __('Upload a 16px x 16px .png or .gif image that will be your favicon.', tavoweb),
                'desc' => ''
            ),

            array(
                'id' => 'button-styling', 
                'type' => 'select', 
                'title' => __('Button Styling', tavoweb),
                'subtitle' => 'This will effect the overall styling of buttons',
                'options' => array(
                    "default" => "Default",
                    "slightly_rounded" => "Slightly Rounded",
                    "slightly_rounded_shadow" => "Slightly Rounded W/ Shadow",
                    "rounded" => "Rounded",
                    "rounded_shadow" => "Rounded W/ Shadow",
                ),
                'default' => 'default' 
            ),
            array(
                'id' => 'theme-icon-style', 
                'type' => 'select', 
                'title' => __('Theme Icon Style', tavoweb),
                'subtitle' => 'Select your theme icon style here - will be used for menu icons such as shopping cart, search and theme elements such as nectar love, portfolio single navigation etc.',
                'options' => array(
                    "inherit" => "Inherit from skin",
                    "minimal" => "Minimal"
                ),
                'default' => 'minimal'
            ),
            array(
                'id' => 'overall-bg-color',
                'type' => 'color',
                'title' => __('Overall Background Color', tavoweb), 
                'subtitle' => 'Default is #ffffff', 
                'transparent' => false,
                'desc' => '',
                'default' => '#ffffff'
            ),

             array(
                'id' => 'overall-font-color',
                'type' => 'color',
                'title' => __('Overall Font Color', tavoweb), 
                'subtitle' => 'Default is #676767', 
                'transparent' => false,
                'desc' => '',
                'default' => ''
            ),
               array(
                'id' => 'body-border',
                'type' => 'switch',
                'title' => __('Body Border (Passepartout)', tavoweb), 
                'subtitle' => __('This will add a border around the edges of the screen', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            array(
                'id' => 'body-border-color',
                'type' => 'color',
                'required' => array( 'body-border', '=', '1' ),
                'title' => __('Body Border Color', tavoweb), 
                'subtitle' => 'Default is #ffffff', 
                'transparent' => false,
                'desc' => '',
                'default' => '#ffffff'
            ),
            array(
                'id' => 'body-border-size', 
                'type' => 'select', 
                'required' => array( 'body-border', '=', '1' ),
                'title' => __('Body Border Size', tavoweb),
                'subtitle' => 'Please choose your desired size in px here. Default is 20px.',
                'options' => $border_border_sizes,
                'default' => '20px' 
            ),
        )
    ) );

     Redux::setSection( $opt_name, array(
        'title'            => __( 'Functionality', 'redux-framework-demo' ),
        'id'               => 'general-settings-functionality',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id' => 'back-to-top',
                'type' => 'switch',
                'title' => __('Back To Top Button', tavoweb), 
                'subtitle' => __('Toggle whether or not to enable a back to top button on your pages.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),
            array(
                'id' => 'back-to-top-mobile',
                'type' => 'checkbox',
                'title' => __('Keep Back To Top Button On Mobile', tavoweb), 
                'subtitle' => __('Toggle whether or not to show or hide the back to top button when viewing on a mobile device.', tavoweb),
                'desc' => '',
                'required' => array( 'back-to-top', '=', '1' ),
                'default' => '0' 
            ),
            array(
                'id' => 'smooth-scrolling',
                'type' => 'switch',
                'title' => __('Styled Scrollbar', tavoweb), 
                'subtitle' => __('Toggle whether or not to enable the styled scrollbar - turning this on will lower scrolling performance', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            
            array(
                'id' => 'one-page-scrolling',
                'type' => 'switch',
                'title' => __('One Page Scroll Support (Animated Anchor Links)', tavoweb), 
                'subtitle' => __('Toggle whether or not to enable one page scroll support', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),
            array(
                'id' => 'responsive',
                'type' => 'switch',
                'title' => __('Enable Responsive Design', tavoweb), 
                'subtitle' => __('This adjusts the layout of your website depending on the screen size/device.', tavoweb),
                'desc' => '',
                'next_to_hide' => '1',
                'default' => '1' 
            ),
            array(
                'id' => 'ext_responsive',
                'type' => 'checkbox',
                'required' => array( 'responsive', '=', '1' ),
                'title' => __('Extended Responsive Design', tavoweb), 
                'subtitle' => __('This will enhance the way the theme responds when viewing on screens larger than 1000px & increase the max width.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),
            array(
                'id'        => 'max_container_width',
                'type'      => 'slider',
                'required' => array( 'ext_responsive', '=', '1' ),
                'title'     => __('Max Website Container Width', tavoweb),
                'subtitle'  => __('When using the extended responsive design your container will scale to a maximum width of 1425px, use this option if you\'d like to increase that value.', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 1425,
                "min"       => 1425,
                "step"      => 1,
                "max"       => 2000,
                'display_value' => 'text'
            ),
                         array(
                'id' => 'lightbox_script', 
                'type' => 'select', 
                'title' => __('Theme Lightbox', tavoweb),
                'subtitle' => 'Please choose your desired lightbox script here',
                'options' => array(
                    "magnific" => "Magnific",
                    "none" => "None"
                ),
                'default' => 'magnific' 
            ),
            array(
                'id' => 'default-lightbox',
                'type' => 'checkbox',
                'title' => __('Auto Lightbox Image Links', tavoweb), 
                'subtitle' => __('This will allow all image links to open in a lightbox - including the images links within standard WordPress galleries.', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '0' 
            ),

             array(
                'id' => 'column_animation_easing', 
                'type' => 'select', 
                'title' => __('Column/Image Animation Easing', tavoweb),
                'subtitle' => 'This is the easing that will be used on all animated column/images you set',
                'options' => array(
                    'linear'=>'linear',
                    'swing'=>'swing',
                    'easeInQuad'=>'easeInQuad',
                    'easeOutQuad' => 'easeOutQuad',
                    'easeInOutQuad'=>'easeInOutQuad',
                    'easeInCubic'=>'easeInCubic',
                    'easeOutCubic'=>'easeOutCubic',
                    'easeInOutCubic'=>'easeInOutCubic',
                    'easeInQuart'=>'easeInQuart',
                    'easeOutQuart'=>'easeOutQuart',
                    'easeInOutQuart'=>'easeInOutQuart',
                    'easeInQuint'=>'easeInQuint',
                    'easeOutQuint'=>'easeOutQuint',
                    'easeInOutQuint'=>'easeInOutQuint',
                    'easeInExpo'=>'easeInExpo',
                    'easeOutExpo'=>'easeOutExpo',
                    'easeInOutExpo'=>'easeInOutExpo',
                    'easeInSine'=>'easeInSine',
                    'easeOutSine'=>'easeOutSine',
                    'easeInOutSine'=>'easeInOutSine',
                    'easeInCirc'=>'easeInCirc',
                    'easeOutCirc'=>'easeOutCirc',
                    'easeInOutCirc'=>'easeInOutCirc',
                    'easeInElastic'=>'easeInElastic',
                    'easeOutElastic'=>'easeOutElastic',
                    'easeInOutElastic'=>'easeInOutElastic',
                    'easeInBack'=>'easeInBack',
                    'easeOutBack'=>'easeOutBack',
                    'easeInOutBack'=>'easeInOutBack',
                    'easeInBounce'=>'easeInBounce',
                    'easeOutBounce'=>'easeOutBounce',
                    'easeInOutBounce'=>'easeInOutBounce'
                ),
                'default' => 'easeOutCubic' 
            ),
            array(
                'id' => 'column_animation_timing', 
                'type' => 'text', 
                'title' => __('Column/Image Animation Timing', tavoweb),
                'subtitle' => __('Enter the time in miliseconds e.g. "400" - default is "650"', tavoweb),
                'desc' => '',
                'default' => '750'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'CSS/Script Related', 'redux-framework-demo' ),
        'id'               => 'general-settings-extra',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id' => 'external-dynamic-css',
                'type' => 'checkbox',
                'title' => __('Move Dynamic/Custom CSS Into External Stylesheet?', tavoweb), 
                'subtitle' => __('This gives you the option move all the dynamic css that lives in the head by default into its own file for aesthetic & caching purposes. <b>Note:</b> your server will need the ability/permission to write to the static file (dynamic-combined.css) using file_put_contents', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            array(
                'id' => 'google-analytics',
                'type' => 'textarea',
                'title' => __('Google Analytics', tavoweb), 
                'subtitle' => __('Please enter in your google analytics tracking code here. <br/> Remember to include the <strong>entire script from google</strong>, if you just enter your tracking ID it won\'t work.', tavoweb),
                'desc' => __('', tavoweb)
            ),
            array(
                'id' => 'google-maps-api-key', 
                'type' => 'text', 
                'title' => __('Google Maps API Key', tavoweb),
                'subtitle' => __('In order to use Google maps you need to generate an API key and enter it here - please see the <a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">official documentation</a> for more information', tavoweb),
                'desc' => '',
                'default' => ''
            ),
             array(
                'id'=>'custom-css',
                'type' => 'ace_editor',
                'title' => __('Custom CSS Code', tavoweb), 
                'subtitle' => __('If you have any custom CSS you would like added to the site, please enter it here.', tavoweb),
                'mode' => 'css',
                'theme' => 'monokai',
                'desc' => ''
            )
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Toggle Theme Features', 'redux-framework-demo' ),
        'id'               => 'general-settings-theme-features',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id' => 'disable_tgm',
                'type' => 'checkbox',
                'title' => __('Disable Theme Reccomended Plugin Notifications', tavoweb), 
                'subtitle' => __('This will remove the notifications shown for installing/updating reccomended theme plugins (Salient Visual Composer/WooCommerce/Contact From 7). Enable if you don\'t need them anymore & are fimilar with keeping track of plugin updates in WordPress. <b>Will yield Admin panel performance improvement</b>', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

            array(
                'id' => 'disable_home_slider_pt',
                'type' => 'checkbox',
                'title' => __('Disable Home Slider', tavoweb), 
                'subtitle' => __('This will remove the Home Slider post type <b>Will yield Admin panel & front-end performance improvement</b>', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

            array(
                'id' => 'disable_nectar_slider_pt',
                'type' => 'checkbox',
                'title' => __('Disable Nectar Slider', tavoweb), 
                'subtitle' => __('This will remove the Nectar Slider post type <b>Will yield Admin panel & front-end performance improvement</b>', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
           
        )
    ) );


    

    Redux::setSection( $opt_name, array(
        'id'               => 'accent-color',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        'title' => __('Accent Colors', tavoweb),
        'desc' => __('All accent color related options are listed here.', tavoweb),
        'fields'           => array(
              array(
                'id' => 'accent-color',
                'type' => 'color',
                 'transparent' => false,
                'title' => __('Accent Color', tavoweb), 
                'subtitle' => __('Change this color to alter the accent color globally for your site.', tavoweb), 
                'desc' => '',
                'default' => '#3452ff'
            ),
            array(
                'id' => 'extra-color-1',
                'type' => 'color',
                 'transparent' => false,
                'title' => __('Extra Color #1', tavoweb), 
                'subtitle' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', tavoweb), 
                'desc' => '',
                'default' => '#ff1053'
            ),
            array(
                'id' => 'extra-color-2',
                'type' => 'color',
                 'transparent' => false,
                'title' => __('Extra Color #2', tavoweb), 
                'subtitle' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', tavoweb), 
                'desc' => '',
                'default' => '#2AC4EA'
            ),
            array(
                'id' => 'extra-color-3',
                'type' => 'color',
                 'transparent' => false,
                'title' => __('Extra Color #3', tavoweb), 
                'subtitle' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', tavoweb), 
                'desc' => '',
                'default' => '#333333'
            ),

            array(
                'id' => 'extra-color-gradient',
                'type' => 'color_gradient',
                'transparent' => false,
                'title' => __('Extra Color Gradient', tavoweb), 
                'subtitle' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', tavoweb), 
                'desc' => '',
                'default'  => array(
                    'from' => '#3452ff',
                    'to'   => '#ff1053' 
                ),
            ),

             array(
                'id' => 'extra-color-gradient-2',
                'type' => 'color_gradient',
                'transparent' => false,
                'title' => __('Extra Color Gradient #2', tavoweb), 
                'subtitle' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', tavoweb), 
                'desc' => '',
                'default'  => array(
                    'from' => '#2AC4EA',
                    'to'   => '#32d6ff' 
                ),
            ),
            
        )
    ) );


    
     Redux::setSection( $opt_name, array(
        'id'               => 'boxed-layout',
        'customizer_width' => '450px',
        'icon' => 'el el-website',
        'title' => __('Boxed Layout', tavoweb),
        'desc' => __('All boxed layout related options are listed here.', tavoweb),
        'fields'           => array(
             array(
                'id' => 'boxed_layout',
                'type' => 'switch',
                'title' => __('Enable Boxed Layout?', tavoweb), 
                'subtitle' => __('', tavoweb),
                'desc' => '',
                'next_to_hide' => '6',
                'default' => '0' 
            ),
            array(
                'id' => 'background-color',
                'type' => 'color',
                'title' => __('Background Color', tavoweb), 
                'subtitle' => __('If you would rather simply use a solid color for your background, select one here.', tavoweb), 
                'desc' => '',
                'transparent' => false,
                'required' => array( 'boxed_layout', '=', '1' ),
                'default' => '#f1f1f1'
            ),    
            array(
                'id' => 'background_image',
                'type' => 'media',
                'title' => __('Background Image', tavoweb), 
                'subtitle' => __('Upload your background here', tavoweb),
                'required' => array( 'boxed_layout', '=', '1' ),
                'desc' => ''
            ),
            array(
                'id' => 'background-repeat', 
                'type' => 'select', 
                'title' => __('Background Repeat', tavoweb),
                'subtitle' => __('Do you want your background to repeat? (Turn on when using patterns)', tavoweb), 
                'required' => array( 'boxed_layout', '=', '1' ),
                'options' => array(
                    "no-repeat" => "No-Repeat",
                    "repeat" => "Repeat"
                )
            ),
            array(
                'id' => 'background-position', 
                'type' => 'select', 
                'title' => __('Background Position', tavoweb),
                'subtitle' => __('How would you like your background image to be aligned?', tavoweb),
                'required' => array( 'boxed_layout', '=', '1' ),
                'options' => array(
                    "left top" => "Left Top",
                     "left center" => "Left Center",
                     "left bottom" => "Left Bottom",
                     "center top" => "Center Top",
                     "center center" => "Center Center",
                     "center bottom" => "Center Bottom",
                     "right top" => "Right Top",
                     "right center" => "Right Center",
                     "right bottom" => "Right Bottom"
                )
            ),
            array(
                'id' => 'background-attachment', 
                'type' => 'select', 
                'title' => __('Background Attachment', tavoweb),
                'subtitle' => __('Would you prefer your background to scroll with your site or be fixed and not move', tavoweb),
                'required' => array( 'boxed_layout', '=', '1' ),
                'options' => array(
                    "scroll" => "Scroll",
                    "fixed" => "Fixed"
                )
            ),
            array(
                'id' => 'background-cover',
                'type' => 'checkbox',
                'title' => __('Auto resize background image to fit window?', tavoweb), 
                'subtitle' => __('This will ensure your background image always fits no matter what size screen the user has. (Don\'t use with patterns)', tavoweb),
                'required' => array( 'boxed_layout', '=', '1' ),
                'desc' => '',
                'default' => '0' 
            ),
            
        )
    ) );
    

     // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'redux-framework-demo' ),
        'id'     => 'typography',
        'desc'   => __( 'All typography related options are listed here', 'redux-framework-demo' ),
        'icon'   => 'el el-font',
        'fields' => array(
           
        )
    ) );
    

    $nectar_std_fonts = array(
        'Arial, sans-serif'                                    => 'Arial',
        'Cambria, Georgia, serif'                              => 'Cambria',
        'Copse, sans-serif'                                    => 'Copse',
        "Courier, monospace"                                   => "Courier, monospace",
        "Garamond, serif"                                      => "Garamond",
        "Georgia, serif"                                       => "Georgia",
        "Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif",
        'Helvetica, sans-serif'                                => 'Sans Serif',
        "'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace",
        "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
        "'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif",
        "'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif",
        "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
        "Tahoma,Geneva, sans-serif"                            => "Tahoma",
        "'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif",
        "Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif",
        'Lovelo, sans-serif' => 'Lovelo'
    );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Navigation & Page Header', 'redux-framework-demo' ),
        'id'               => 'typography-slider',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id' => 'extended-theme-font',
                'type' => 'checkbox',
                'title' => __('Load Ext. Characters in Default Font', tavoweb),
                'subtitle' => 'Check this option if you wish to use ext latin characters in the default theme font',
                'default' => '0' 
            ),

            array(
                'id'       => 'navigation_font_family',
                'type'     => 'typography',
                'title'    => __( 'Navigation Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Navigation font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),
            array(
                'id'       => 'navigation_dropdown_font_family',
                'type'     => 'typography',
                'title'    => __( 'Navigation Dropdown Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Navigation Dropdown font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'compiler' => true,
                'default'  => array()
            ),
            
        
            array(
                'id'       => 'page_heading_font_family',
                'type'     => 'typography',
                'title'    => __( 'Page Heading Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Page Heading font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

             array(
                'id'       => 'page_heading_subtitle_font_family',
                'type'     => 'typography',
                'title'    => __( 'Page Heading Subtitle Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Page Heading Subtitle font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

             array(
                'id'       => 'off_canvas_nav_font_family',
                'type'     => 'typography',
                'title'    => __( 'Off Canvas Navigation', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Off Canvas Navigation properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

             array(
                'id'       => 'off_canvas_nav_subtext_font_family',
                'type'     => 'typography',
                'title'    => __( 'Off Canvas Navigation Sub Text', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Off Canvas Navigation Sub Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'General HTML elements', 'redux-framework-demo' ),
        'id'               => 'typography-general',
        'subsection'       => true,
        'fields'           => array(
             array(
                'id'       => 'body_font_family',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Body font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
               
            ),
             array(
                'id'       => 'h1_font_family',
                'type'     => 'typography',
                'title'    => __( 'Heading 1', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the H1 Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

             array(
                'id'       => 'h2_font_family',
                'type'     => 'typography',
                'title'    => __( 'Heading 2', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the H2 Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

              array(
                'id'       => 'h3_font_family',
                'type'     => 'typography',
                'title'    => __( 'Heading 3', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the H3 Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

            array(
                'id'       => 'h4_font_family',
                'type'     => 'typography',
                'title'    => __( 'Heading 4', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the H4 Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

             array(
                'id'       => 'h5_font_family',
                'type'     => 'typography',
                'title'    => __( 'Heading 5', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the H5 Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

            array(
                'id'       => 'h6_font_family',
                'type'     => 'typography',
                'title'    => __( 'Heading 6', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the H6 Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

            array(
                'id'       => 'i_font_family',
                'type'     => 'typography',
                'title'    => __( 'Italic', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the italic Text properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

             array(
                'id'       => 'label_font_family',
                'type'     => 'typography',
                'title'    => __( 'Form Labels', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Form Label properties. When using the "Material" theme skin, sidebar links will inherit this as well.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),
        )
    ) );

 Redux::setSection( $opt_name, array(
        'title'            => __( 'Nectar Specific elements', 'redux-framework-demo' ),
        'id'               => 'typography-nectar',
        'subsection'       => true,
        'fields'           => array(
              
              array(
                'id'       => 'nectar_slider_heading_font_family',
                'type'     => 'typography',
                'title'    => __( 'Nectar/Home Slider Heading Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Nectar Slider Heading font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

            array(
                'id'       => 'home_slider_caption_font_family',
                'type'     => 'typography',
                'title'    => __( 'Nectar/Home Slider Caption Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Nectar Slider Caption font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),


              array(
                'id'       => 'testimonial_font_family',
                'type'     => 'typography',
                'title'    => __( 'Testimonial Slider/Blockquote Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Testimonial Slider/Blockquote font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'all_styles'  => false,
                'fonts' =>  $nectar_std_fonts,
                'default'  => array()
            ),

            array(
                'id'       => 'sidebar_footer_h_font_family',
                'type'     => 'typography',
                'title'    => __( 'Sidebar, Carousel, Nectar Button & Footer Headers Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Sidebar, Carousel, Nectar Button & Footer Headers font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

            array(
                'id'       => 'portfolio_filters_font_family',
                'type'     => 'typography',
                'title'    => __( 'Portfolio Filters', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Portfolio filter font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

            array(
                'id'       => 'portfolio_caption_font_family',
                'type'     => 'typography',
                'title'    => __( 'Portfolio Caption/Excerpt', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Portfolio project caption/excerpt font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

             array(
                'id'       => 'team_member_h_font_family',
                'type'     => 'typography',
                'title'    => __( 'Sub-headers & Team Member Names Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the Sub-headers & Team Member Name properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

            array(
                'id'       => 'nectar_dropcap_font_family',
                'type'     => 'typography',
                'title'    => __( 'Dropcap', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the dropcap font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

            array(
                'id'       => 'nectar_sidebar_footer_headers_font_family',
                'type'     => 'typography',
                'title'    => __( 'Sidebar/Footer Headers', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the font properties for headers used in sidebars & the footer.', 'redux-framework-demo' ),
                'google'   => true,
                'fonts' =>  $nectar_std_fonts,
                'all_styles'  => false,
                'default'  => array()
            ),

             
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Responsive Settings', 'redux-framework-demo' ),
        'id'               => 'typography-responsive',
        'subsection'       => true,
        'fields'           => array(
              
            array(
                'id' => 'use-responsive-heading-typography',
                'type' => 'switch',
                'title' => __('Custom Responsive Headings', tavoweb), 
                'subtitle' => __('If left off, Salient will calculate the responsive typography settings for your h1-h6 tags automatically.', tavoweb),
                'desc' => ''
            ),

            array(
                'id'    => 'info-use-responsive-heading-typography',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('How These Settings Work',  tavoweb),
                'icon'  => 'el el-info-circle',
                'required' => array( 'use-responsive-heading-typography', '=', '1' ),
                'desc'  => __( 'Set the amount (in %) you would like each heading tag to decrease by for every viewport. <br/> For example, a value of "100" would mean the font stays at 100% of the font size defined and a value of "50" would mean the font shrinks to "50%" of the font size defined. <br/> <br/> <i>Note: these will apply to all heading tags defined by you throughout your site, but some Nectar Elements will override the sizing within themselves.</i>',  tavoweb)
            ),

            array(
                'id'        => 'h1-small-desktop-font-size',
                'type'      => 'slider',
                'title'     => __('H1 Small Desktop', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 75,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h1-tablet-font-size',
                'type'      => 'slider',
                'title'     => __('H1 Tablet', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 70,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h1-phone-font-size',
                'type'      => 'slider',
                'title'     => __('H1 Phone', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 65,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'   =>'responsive-heading-typography-divider-1',
                'desc' => __('', 'redux-framework-demo'),
                'type' => 'divide',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),



            array(
                'id'        => 'h2-small-desktop-font-size',
                'type'      => 'slider',
                'title'     => __('H2 Small Desktop', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 85,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h2-tablet-font-size',
                'type'      => 'slider',
                'title'     => __('H2 Tablet', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 80,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h2-phone-font-size',
                'type'      => 'slider',
                'title'     => __('H2 Phone', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 70,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'   =>'responsive-heading-typography-divider-2',
                'desc' => __('', 'redux-framework-demo'),
                'type' => 'divide',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),


            array(
                'id'        => 'h3-small-desktop-font-size',
                'type'      => 'slider',
                'title'     => __('H3 Small Desktop', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 85,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h3-tablet-font-size',
                'type'      => 'slider',
                'title'     => __('H3 Tablet', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 80,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h3-phone-font-size',
                'type'      => 'slider',
                'title'     => __('H3 Phone', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 70,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'   =>'responsive-heading-typography-divider-3',
                'desc' => __('', 'redux-framework-demo'),
                'type' => 'divide',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),


            array(
                'id'        => 'h4-small-desktop-font-size',
                'type'      => 'slider',
                'title'     => __('H4 Small Desktop', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h4-tablet-font-size',
                'type'      => 'slider',
                'title'     => __('H4 Tablet', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 90,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h4-phone-font-size',
                'type'      => 'slider',
                'title'     => __('H4 Phone', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 90,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'   =>'responsive-heading-typography-divider-4',
                'desc' => __('', 'redux-framework-demo'),
                'type' => 'divide',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),



            array(
                'id'        => 'h5-small-desktop-font-size',
                'type'      => 'slider',
                'title'     => __('H5 Small Desktop', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h5-tablet-font-size',
                'type'      => 'slider',
                'title'     => __('H5 Tablet', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h5-phone-font-size',
                'type'      => 'slider',
                'title'     => __('H5 Phone', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'   =>'responsive-heading-typography-divider-5',
                'desc' => __('', 'redux-framework-demo'),
                'type' => 'divide',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),



             array(
                'id'        => 'h6-small-desktop-font-size',
                'type'      => 'slider',
                'title'     => __('H6 Small Desktop', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h6-tablet-font-size',
                'type'      => 'slider',
                'title'     => __('H6 Tablet', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),

            array(
                'id'        => 'h6-phone-font-size',
                'type'      => 'slider',
                'title'     => __('H6 Phone', tavoweb),
                'subtitle'  => __('', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 10,
                "step"      => 5,
                "max"       => 100,
                'display_value' => 'text',
                'required' => array( 'use-responsive-heading-typography', '=', '1' )
            ),



             
        )
    ) );



    
     Redux::setSection( $opt_name, array(
        'title'  => __( 'Header Navigation', 'redux-framework-demo' ),
        'id'     => 'header-nav',
        'desc'   => __( 'All header navigation related options are listed here.', 'redux-framework-demo' ),
        'icon'   => 'el el-lines',
        'fields' => array(
           
        )
    ) );




Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo & General Styling', 'redux-framework-demo' ),
        'id'               => 'header-nav-general',
        'subsection'       => true,
        'fields'           => array(
              
             array(
                'id' => 'use-logo',
                'type' => 'switch',
                'title' => __('Use Image for Logo?', tavoweb), 
                'subtitle' => __('If left unchecked, plain text will be used instead (generated from site name).', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'logo',
                'type' => 'media', 
                'title' => __('Logo Upload', tavoweb), 
                'subtitle' => __('Upload your logo here and enter the height of it below', tavoweb),
                'required' => array( 'use-logo', '=', '1' ),
                'desc' => '' 
            ),
            array(
                'id' => 'retina-logo',
                'type' => 'media', 
                'title' => __('Retina Logo Upload', tavoweb), 
                'subtitle' => __('Upload at exactly 2x the size of your standard logo. Supplying this will keep your logo crisp on screens with a higher pixel density.', tavoweb),
                'desc' => '' ,
                 'required' => array( 'use-logo', '=', '1' )
            ),
            array(
                'id' => 'logo-height', 
                'type' => 'text', 
                'title' => __('Logo Height', tavoweb),
                'subtitle' => __('Don\'t include "px" in the string. e.g. 30', tavoweb),
                'desc' => '',
                'validate' => 'numeric',
                 'required' => array( 'use-logo', '=', '1' ),
            ),
            array(
                'id' => 'mobile-logo-height', 
                'type' => 'text', 
                'title' => __('Mobile Logo Height', tavoweb),
                'subtitle' => __('Don\'t include "px" in the string. e.g. 24', tavoweb),
                'desc' => '',
                 'required' => array( 'use-logo', '=', '1' ),
                'validate' => 'numeric'
            ),
            array(
                'id' => 'header-padding', 
                'type' => 'text', 
                'title' => __('Header Padding', tavoweb),
                'subtitle' => __('Don\'t include "px" in the string. e.g. 28', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            
           

             array(
                'id' => 'header-remove-fixed',
                'type' => 'checkbox',
                'title' => __('Header Remove Desktop Stickiness', tavoweb), 
                'subtitle' => __('By default your header will always remain at the top of the screen even when scrolling down the page. Enabling this will remove that functionality and cause it to stay at the top of the page.', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '0' 
            ),

             array(
                'id' => 'header-mobile-fixed',
                'type' => 'checkbox',
                'title' => __('Header Sticky On Mobile', tavoweb), 
                'subtitle' => __('Do you want the header to be sticky on mobile devices?', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '1' 
            ),
           
             array(
                'id'        => 'header-menu-mobile-breakpoint',
                'type'      => 'slider',
                'title'     => __('Mobile Breakpoint', tavoweb),
                'subtitle'  => __('Define at what window size (in px) the header navigation menu will collapse into the mobile menu style - larger values are useful when you have navigations with many items which wouldn\'t fit on one line when viewed on small desktops/laptops.', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 1000,
                "min"       => 1000,
                "step"      => 10,
                "max"       => 1450,
                'display_value' => 'text'
            ),
             array(
                'id' => 'header-box-shadow', 
                'type' => 'select', 
                'title' => __('Header Box Shadow', tavoweb),
                'subtitle' => __('Please select your header box shadow here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'small' => __('Small', tavoweb), 
                    'large' => __('Large', tavoweb),
                    'none' => __('None', tavoweb)
                ),
                'default' => 'small'
            ),
             array(
                'id'        => 'header-menu-item-spacing',
                'type'      => 'slider',
                'title'     => __('Menu Item Spacing', tavoweb),
                'subtitle'  => __('Set the padding that will display on each side of your header menu items - space will be set in pixels.', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 10,
                "min"       => 8,
                "step"      => 1,
                "max"       => 50,
                'display_value' => 'label'
            ),
              array(
                'id' => 'header-bg-opacity',
                'type'      => 'slider',
                'title'     => __('Header BG Opacity', tavoweb),
                'subtitle'  => __('Please set your header BG opacity here. <br/> <br/> <i>Note:</i> if you\'re trying to have your header completely see through before scrolling, setting this very low is not how to achieve it. The fully transparent style as shown on many of the demos is the option titled "
Use Transparent Header When Applicable" which is available in the Header Navigation > Transparency tab.', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 1,
                "step"      => 1,
                "max"       => 100,
                'display_value' => 'label'
            ),
            
            array(
                'id' => 'header-color', 
                'type' => 'select', 
                'title' => __('Header Color Scheme', tavoweb),
                'subtitle' => __('Please select your header color scheme here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'light' => __('Light', tavoweb), 
                    'dark' => __('Dark', tavoweb),
                    'custom' => __('Custom', tavoweb)
                ),
                'default' => 'light'
            ),
        

            array(
                'id' => 'header-background-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Header Background', tavoweb),
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'required' => array( 'header-color', '=', 'custom' ),
                'default' => '#ffffff'
            ),
            
            array(
                'id' => 'header-font-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Header Font', tavoweb), 
                'class' => 'five-columns',
                'required' => array( 'header-color', '=', 'custom' ),
                'transparent' => false,
                'desc' => '',
                'default' => '#888888'
            ),
            
            array(
                'id' => 'header-font-hover-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Header Font Hover', tavoweb),
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#27CCC0'
            ),
            
            array(
                'id' => 'header-dropdown-background-color',
                'type' => 'color',
                'title' => '', 
                'class' => 'five-columns',
                'transparent' => false,
                'subtitle' => __('Dropdown Background', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'desc' => '',
                'default' => '#1F1F1F'
            ),
            
            array(
                'id' => 'header-dropdown-background-hover-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Dropdown Background Hover', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#313233'
            ),
            
            array(
                'id' => 'header-dropdown-font-color',
                'type' => 'color',
                'title' => '',
                'subtitle' => __('Dropdown Font', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#CCCCCC'
            ),
            
            array(
                'id' => 'header-dropdown-font-hover-color',
                'type' => 'color',
                'title' => '',
                'required' => array( 'header-color', '=', 'custom' ),
                'subtitle' => __('Dropdown Font Hover', tavoweb), 
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'default' => '#27CCC0'
            ),

            array(
                'id' => 'header-dropdown-heading-font-color',
                'type' => 'color',
                'title' => '',
                'subtitle' => __('Mega Menu Heading Font', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#ffffff'
            ),

            array(
                'id' => 'header-dropdown-heading-font-hover-color',
                'type' => 'color',
                'title' => '',
                'subtitle' => __('Mega Menu Heading Font Hover', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#ffffff'
            ),

            array(
                'id' => 'header-separator-color',
                'type' => 'color',
                'title' => '',
                'subtitle' => __('Header Separators', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#eeeeee'
            ),
            
            array(
                'id' => 'secondary-header-background-color',
                'type' => 'color',
                'title' => '', 
                'required' => array( 'header-color', '=', 'custom' ),
                'subtitle' => __('2nd Header Background', tavoweb), 
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'default' => '#F8F8F8'
            ),
            
            array(
                'id' => 'secondary-header-font-color',
                'type' => 'color',
                'title' => '',
                'subtitle' => __('2nd Header Font', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#666666'
            ),
            
            array(
                'id' => 'secondary-header-font-hover-color',
                'type' => 'color',
                'title' => '',
                'subtitle' => __('2nd Header Font Hover', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#222222'
            ),

             array(
                'id' => 'header-slide-out-widget-area-background-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Background', tavoweb),
                'required' => array( 'header-color', '=', 'custom' ),
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'default' => '#3452ff'
            ),

             array(
                'id' => 'header-slide-out-widget-area-background-color-2',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Background 2 (Used for gradient)', tavoweb),
                'required' => array( 'header-color', '=', 'custom' ),
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'default' => ''
            ),

  
             array(
                'id' => 'header-slide-out-widget-area-header-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Headers', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#ffffff'
            ),

            array(
                'id' => 'header-slide-out-widget-area-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Text', tavoweb), 
                'required' => array( 'header-color', '=', 'custom' ),
                'class' => 'five-columns',
                'transparent' => false,
                'desc' => '',
                'default' => '#eefbfa'
            ),
            
            array(
                'id' => 'header-slide-out-widget-area-hover-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Link Hover', tavoweb),
                'class' => 'five-columns',
                'required' => array( 'header-color', '=', 'custom' ),
                'transparent' => false,
                'desc' => '',
                'default' => '#ffffff'
            ),
            array(
                'id' => 'header-slide-out-widget-area-close-bg-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Close Button Background', tavoweb),
                'required' => array( array( 'header-color', '=', 'custom'), array( 'theme-skin', '=', 'material') ),
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'default' => '#ff1053'
            ),
            array(
                'id' => 'header-slide-out-widget-area-close-icon-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Off Canvas Navigation Close Button Icon', tavoweb),
                'required' => array( array( 'header-color', '=', 'custom'), array( 'theme-skin', '=', 'material') ),
                'desc' => '',
                'class' => 'five-columns',
                'transparent' => false,
                'default' => '#ffffff'
            ),
            
 
        )
    ) );





Redux::setSection( $opt_name, array(
        'title'            => __( 'Layout Related', 'redux-framework-demo' ),
        'id'               => 'header-nav-layout',
        'subsection'       => true,
        'fields'           => array(
              
             
            array(
                'id' => 'header_format',
                'type' => 'image_select',
                'title' => __('Header Layout', tavoweb), 
                'subtitle' => __('Please select the layout you desire. The Left header does not allow some of the options other headers do such as "transparency", and effects like "resize on scroll".', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                'default' => array('title' => 'Default Layout', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/default-header.png'),
                                'centered-menu' => array('title' => 'Centered Menu', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/centered-menu.png'),
                                'centered-menu-under-logo' => array('title' => 'Centered Menu Alt', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/centered-menu-under-logo.png'),
                                'centered-logo-between-menu' => array('title' => 'Centered Logo Between Menu', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/centered-logo-menu.png'),
                                'menu-left-aligned' => array('title' => 'Menu Left Aligned', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/menu-left-aligned.png'),
                                'left-header' => array('title' => 'Left Header', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/fixed-left.png')
                            ),
                'default' => 'default'
            ),  
            array(
                'id' => 'header-fullwidth',
                'type' => 'checkbox',
                'title' => __('Full Width Header', tavoweb), 
                'subtitle' => __('Do you want the header to span the full width of the page?', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '0' 
            ),

            array(
                'id' => 'header-disable-search',
                'type' => 'checkbox',
                'title' => __('Remove Header search', tavoweb), 
                'subtitle' => __('Active to remove the search functionality from your header', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

             array(
                'id' => 'header-disable-ajax-search',
                'type' => 'checkbox',
                'title' => __('Disable AJAX from search', tavoweb), 
                'subtitle' => __('This will turn off the autocomplete suggestions from appearing when typing in the search box.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),

             array(
                'id' => 'header_layout', 
                'type' => 'select', 
                'title' => __('Header Secondary Nav', tavoweb),
                'subtitle' => __('Please select your header layout here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'standard' => __('Standard Header', tavoweb), 
                    'header_with_secondary' => __('Header With Secondary Navigation', tavoweb),
                ),
                'default' => 'standard'
            ),
            array(
                'id' => 'enable_social_in_header',
                'type' => 'switch',
                'title' => __('Enable Social Icons?', tavoweb), 
                'subtitle' => __('Do you want the secondary nav to display social icons?', tavoweb),
                'desc' => '',
                'default' => '0'
            ),  
             array(
                'id' => 'use-facebook-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Facebook Icon', tavoweb), 
                'subtitle' => '',
                'desc' => '',
                'required' => array( 'enable_social_in_header', '=', '1' ),
            ),
            array(
                'id' => 'use-twitter-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Twitter Icon', tavoweb), 
                'subtitle' => '',
                'desc' => '',
                'required' => array( 'enable_social_in_header', '=', '1' ),
            ),
            array(
                'id' => 'use-google-plus-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Google+ Icon', tavoweb), 
                'subtitle' => '',
                'desc' => '',
                'required' => array( 'enable_social_in_header', '=', '1' ),
            ),
            array(
                'id' => 'use-vimeo-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Vimeo Icon', tavoweb), 
                'subtitle' => '',
                'desc' => '',
                'required' => array( 'enable_social_in_header', '=', '1' ),
            ),
            array(
                'id' => 'use-dribbble-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Dribbble Icon', tavoweb), 
                'subtitle' => '',
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'desc' => ''
            ),
            array(
                'id' => 'use-pinterest-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Pinterest Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-youtube-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Youtube Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-tumblr-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Tumblr Icon', tavoweb),
                'required' => array( 'enable_social_in_header', '=', '1' ), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-linkedin-icon-header',
                'type' => 'checkbox',
                'title' => __('Use LinkedIn Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-rss-icon-header',
                'type' => 'checkbox',
                'title' => __('Use RSS Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-behance-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Behance Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-instagram-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Instagram Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-flickr-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Flickr Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-spotify-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Spotify Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-github-icon-header',
                'type' => 'checkbox',
                'title' => __('Use GitHub Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-stackexchange-icon-header',
                'type' => 'checkbox',
                'title' => __('Use StackExchange Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-soundcloud-icon-header',
                'type' => 'checkbox',
                'title' => __('Use SoundCloud Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
             array(
                'id' => 'use-vk-icon-header',
                'type' => 'checkbox',
                'title' => __('Use VK Icon', tavoweb), 
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-vine-icon-header',
                'type' => 'checkbox',
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'title' => __('Use Vine Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-houzz-icon-header',
                'type' => 'checkbox',
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'title' => __('Use Houzz Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-yelp-icon-header',
                'type' => 'checkbox',
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'title' => __('Use Yelp Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-email-icon-header',
                'type' => 'checkbox',
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'title' => __('Use Email Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-phone-icon-header',
                'type' => 'checkbox',
                'required' => array( 'enable_social_in_header', '=', '1' ),
                'title' => __('Use Phone Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            )
            

             
        )
    ) );

            
            




     Redux::setSection( $opt_name, array(
        'title'            => __( 'Transparency', 'redux-framework-demo' ),
        'id'               => 'header-nav-transparency',
        'subsection'       => true,
        'fields'           => array(
              
             
            array(
                'id' => 'transparent-header',
                'type' => 'switch',
                'title' => __('Use Transparent Header When Applicable?', tavoweb), 
                'subtitle' => __('If activated this will cause your header to be completely transparent before the user scrolls. Valid instances where this will get used include using a Page Header or using a Full width/screen Nectar Slider at the top of a page.', tavoweb),
                'desc' => '',
                'default' => '0'
            ),
            
            array(
                'id' => 'header-starting-logo',
                'type' => 'media', 
                'title' => __('Header Starting Logo Upload', tavoweb), 
                'subtitle' => __('This will be used when the header is transparent before the user scrolls. (Will be swapped for the regualr logo upon scrolling)', tavoweb),
                'desc' => '' ,
                'required' => array( 'transparent-header', '=', '1' ),

            ),
            array(
                'id' => 'header-starting-retina-logo',
                'type' => 'media', 
                'title' => __('Header Starting Retina Logo Upload', tavoweb), 
                'subtitle' => __('Retina version of the header starting logo.', tavoweb),
                'required' => array( 'transparent-header', '=', '1' ),
                'desc' => ''  
            ),

            array(
                'id' => 'header-starting-logo-dark',
                'type' => 'media', 
                'title' => __('Header Starting Dark Logo Upload', tavoweb), 
                'subtitle' => __('This will be used when on a Nectar Slide set to use the dark text color and the header is transparent before the user scrolls. (If nothing is uploaded, the default logo will be used)', tavoweb),
                'desc' => '' ,
                'required' => array( 'transparent-header', '=', '1' ),
            ),
            array(
                'id' => 'header-starting-retina-logo-dark',
                'type' => 'media', 
                'title' => __('Header Starting Dark Retina Logo Upload', tavoweb), 
                'subtitle' => __('Retina version of the header starting dark logo.  (If nothing is uploaded, the default logo will be used)', tavoweb),
                'desc' => '',
                'required' => array( 'transparent-header', '=', '1' ), 
            ),
            
            array(
                'id' => 'header-starting-color',
                'type' => 'color',
                'title' => __('Header Starting Text Color', tavoweb),
                'subtitle' => __('Please select the color you desire for your header text before the user scrolls', tavoweb),
                'desc' => '',
                'transparent' => false,
                'required' => array( 'transparent-header', '=', '1' ),
                'default' => '#ffffff'
            ),
            array(
                'id' => 'header-transparent-dark-color',
                'type' => 'color',
                'title' => __('Header Dark Text Color', tavoweb),
                'subtitle' => __('Please select the color you desire for your header navigation links when the dark header is triggered. This occurs on dark Nectar Slides, dark rows when using permenant transparent etc.', tavoweb),
                'desc' => '',
                'transparent' => false,
                'required' => array( 'transparent-header', '=', '1' ),
                'default' => '#000000'
            ),
            array(
                'id' => 'header-permanent-transparent',
                'type' => 'checkbox',
                'switch' => true,
                'title' => __('Header Permanent Transparent', tavoweb), 
                'subtitle' => __('Turning this on will allow your header to remain transparent even after scroll down', tavoweb),
                'required' => array( 'transparent-header', '=', '1' ),
                'desc' => '',
                'default' => '0' 
            ),
            array(
                'id' => 'header-inherit-row-color',
                'type' => 'checkbox',
                'title' => __('Header Inherit Row Color', tavoweb), 
                'subtitle' => __('Turning this on will allow your header to take on the background & text colors of the row that it passes. (Ideal for one page sites) <br/> <br/>  See <a href="https://www.youtube.com/user/ThemeNectar">tutorial</a> for full example and details', tavoweb),
                'desc' => '',
                'switch' => true,
                'required' => array( 'transparent-header', '=', '1' ),
                'default' => '0' 
            ),
            array(
                'id' => 'header-remove-border',
                'type' => 'checkbox',
                'title' => __('Remove Border On Transparent Header', tavoweb), 
                'subtitle' => __('Turning this on will remove the border that normally appears with the transparent header', tavoweb),
                'desc' => '',
                'required' => array( array( 'transparent-header', '=', '1' ), array( 'theme-skin', '!=', 'material') ),
                'default' => '0' 
            ),

             
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Animation Effects', 'redux-framework-demo' ),
        'id'               => 'header-nav-animation-effects',
        'subsection'       => true,
        'fields'           => array(
              
             
            array(
                'id' => 'header-hover-effect', 
                'type' => 'select', 
                'title' => __('Header Link Hover/Active Effect', tavoweb),
                'subtitle' => __('Please select your header link hover/active effect here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'default' => __('Color Change', tavoweb), 
                    'animated_underline' => __('Animated Underline', tavoweb)
                ),
                'default' => 'animated_underline'
            ),
            array(
                'id' => 'header-hide-until-needed',
                'type' => 'checkbox',
                'title' => __('Header Hide Until Needed', tavoweb), 
                'subtitle' => __('Do you want the header to be hidden after scrolling until needed? i.e. the user scrolls back up towards the top', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '' 
            ),

             array(
                'id' => 'header-resize-on-scroll',
                'type' => 'switch',
                'title' => __('Header Resize On Scroll', tavoweb), 
                'subtitle' => __('Do you want the header to shrink a little when you scroll?', tavoweb),
                'desc' => '',
                'default' => '1' 
            ), 
            array(
                'id' => 'header-resize-on-scroll-shrink-num', 
                'type' => 'text', 
                'title' => __('Header Logo Shrink Number (in px)', tavoweb),
                'subtitle' => __('Don\'t include "px" in the string. e.g. 6', tavoweb),
                'desc' => '',
                 'required' => array( 'header-resize-on-scroll', '=', '1' ),
                'validate' => 'numeric'
            ),
            

             
        )
    ) );


Redux::setSection( $opt_name, array(
        'title'            => __( 'Dropdown/Megamenu', 'redux-framework-demo' ),
        'id'               => 'header-nav-dropdowns',
        'subsection'       => true,
        'fields'           => array(
              
             
           
             array(
                'id' => 'header-dropdown-style', 
                'type' => 'select', 
                'title' => __('Header Dropdown Style', tavoweb),
                'subtitle' => __('Please select the style that will be used for submenus in your main navigation', tavoweb),
                'desc' => '',
                'options' => array(
                    'classic' => __('Classic', tavoweb), 
                    'minimal' => __('Minimal', tavoweb)
                ),
                'default' => 'classic'
            ),  

            array(
                'id' => 'header-dropdown-opacity',
                'type'      => 'slider',
                'title'     => __('Header Dropdown Opacity', tavoweb),
                'subtitle'  => __('Please select your dropdown opacity here', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 100,
                "min"       => 1,
                "step"      => 1,
                "max"       => 100,
                'display_value' => 'label'
            ),


            array(
                'id' => 'header-megamenu-width', 
                'type' => 'select', 
                'title' => __('Header Mega Menu Width', tavoweb),
                'subtitle' => __('Please choose whether you would like your megamenu to be constraiuned to the same width of the header container or if you would prefer to be the full width of the page.', tavoweb),
                'desc' => '',
                'options' => array(
                    'contained' => __('Contained To Header Item Width', tavoweb), 
                    'full-width' => __('Full Screen Width', tavoweb)
                ),
                'default' => 'contained'
            ),  

            array(
                'id' => 'header-megamenu-remove-transparent',
                'type' => 'switch',
                'title' => __('Megamenu Removes Transparent Header', tavoweb), 
                'subtitle' => __('This will cause your header navigation to temporarily disable the transparent effect when your megamenu is open', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            

             
        )
    ) );


Redux::setSection( $opt_name, array(
        'title'            => __( 'Off Canvas Navigation', 'redux-framework-demo' ),
        'id'               => 'header-nav-off-canvas-navigation',
        'subsection'       => true,
        'fields'           => array(
              
          array(
                'id' => 'header-slide-out-widget-area-style', 
                'type' => 'select', 
                'title' => __('Off Canvas Menu Style', tavoweb),
                'subtitle' => __('Please select your off canvas menu style here. <br/> The "Slide Out From Right Hover Triggered" style will force the "Full Width Header" option regardless of your selection.', tavoweb),
                'desc' => '',
                'options' => array(
                    'slide-out-from-right' => __('Slide Out From Right', tavoweb), 
                    'slide-out-from-right-hover' => __('Slide Out From Right Hover Triggered', tavoweb), 
                    'fullscreen' => __('Fullscreen Cover Slide + Blur BG', tavoweb),
                    'fullscreen-alt' => __('Fullscreen Cover Fade', tavoweb)
                ),
                'default' => 'slide-out-from-right',
            ),
          array(
              'id' => 'header-slide-out-widget-area-dropdown-behavior', 
              'type' => 'select', 
              'title' => __('Off Canvas Menu Dropdown Behavior', tavoweb),
              'subtitle' => __('Please select the functionality for how dropdowns will behave in your off canvas menu', tavoweb),
              'desc' => '',
              'options' => array(
                  'default' => __('Dropdown Parent Link Toggles Submenu', tavoweb), 
                  'separate-dropdown-parent-link' => __('Separate Dropdown Parent Link From Dropdown Toggle', tavoweb)
              ),
              'default' => 'default',
              'required' => array(  array('header-slide-out-widget-area-style', '!=', 'fullscreen'), array('header-slide-out-widget-area-style', '!=', 'fullscreen-alt' ) ),
          ),
          
          array(
                'id' => 'header-slide-out-widget-area',
                'type' => 'switch',
                'title' => __('Off Canvas Menu', tavoweb), 
                'subtitle' => __('This will add a header link that reveals an off canvas menu', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

            array(
                'id' => 'header-slide-out-widget-area-social',
                'type' => 'checkbox',
                'title' => __('Off Canvas Menu Add Social', tavoweb), 
                'subtitle' => __('This will add the social links you have links set for in the "Social Media" tab to your off canvas menu', tavoweb),
                'desc' => '',
                'default' => '0' ,
                  'required' => array( 'header-slide-out-widget-area', '=', '1' ),
            ),
             array(
                'id' => 'header-slide-out-widget-area-bottom-text',
                'type' => 'text',
                'title' => __('Off Canvas Menu Bottom Text', tavoweb), 
                 'required' => array( 'header-slide-out-widget-area', '=', '1' ),
                'subtitle' => __('This will add some text fixed at the bottom of your off canvas menu - useful for copyright or quick contact info etc.', tavoweb),
                'desc' => '',
                'default' => '' 
            ),
            array(
                'id' => 'header-slide-out-widget-area-overlay-opacity', 
                'type' => 'select', 
                'title' => __('Off Canvas Menu Overlay Strength', tavoweb),
                'subtitle' => __('Please select your Slide Out Widget Area overlay strength here.', tavoweb),
                'desc' => '',
                 'required' => array( 'header-slide-out-widget-area', '=', '1' ),
                'options' => array(
                    'solid' => __('Solid', tavoweb), 
                    'dark' => __('Dark', tavoweb), 
                    'medium' => __('Medium', tavoweb),
                    'light' => __('Light', tavoweb)
                ),
                'default' => 'dark'
            ),
            array(
                'id' => 'header-slide-out-widget-area-top-nav-in-mobile',
                'type' => 'checkbox',
                  'required' => array( 'header-slide-out-widget-area', '=', '1' ),
                'title' => __('Off Canvas Menu Mobile Nav Menu items', tavoweb), 
                'subtitle' => __('This will cause your off canvas menu to inherit any navigation items assigned in your "Top Navigation" menu location when viewing on a mobile device', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

             
        )
    ) );



    
     Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'redux-framework-demo' ),
        'id'     => 'footer',
        'desc'   => __( 'All footer related options are listed here.', 'redux-framework-demo' ),
        'icon'   => 'el el-file',
        'fields' => array(
             array(
                'id' => 'enable-main-footer-area',
                'type' => 'switch',
                'title' => __('Main Footer Area', tavoweb), 
                'subtitle' => __('Do you want use the main footer that contains all the widgets areas?', tavoweb),
                'desc' => '',
                'default' => '1' 
            ), 
            
            array(
                'id' => 'footer_columns',
                'type' => 'image_select',
                'required' => array( 'enable-main-footer-area', '=', '1' ),
                'title' => __('Footer Columns', tavoweb), 
                'subtitle' => __('Please select the number of columns you would like for your footer. <i>Note: using the 1 Column layout will also center the copyright area.</i>', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                '1' => array('title' => '1 Column Centered', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/1colg.png'),
                                '2' => array('title' => '2 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/2col.png'),
                                '3' => array('title' => '3 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/3col.png'),
                                '4' => array('title' => '4 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/4col.png'),
                                '5' => array('title' => '4 Columns Alt', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/4colalt.png')
                            ),
                'default' => '4'
            ),  
            
            array(
                'id' => 'footer-custom-color',
                'type' => 'switch',
                'title' => __('Custom Footer Color Scheme', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            
            array(
                'id' => 'footer-background-color',
                'type' => 'color',
                'title' => '', 
                'subtitle' => __('Footer Background Color', tavoweb),
                'desc' => '',
                'required' => array( 'footer-custom-color', '=', '1' ),
                'class' => 'five-columns always-visible',
                'default' => '#313233',
                'transparent' => false
            ),
            
            array(
                'id' => 'footer-font-color',
                'type' => 'color',
                'title' => '', 
                 'required' => array( 'footer-custom-color', '=', '1' ),
                'subtitle' => __('Footer Font Color', tavoweb), 
                'class' => 'five-columns always-visible',
                'desc' => '',
                'default' => '#CCCCCC',
                'transparent' => false
            ),
            
            array(
                'id' => 'footer-secondary-font-color',
                'type' => 'color',
                'title' => '', 
                 'required' => array( 'footer-custom-color', '=', '1' ),
                'subtitle' => __('2nd Footer Font Color', tavoweb),
                'class' => 'five-columns always-visible',
                'desc' => '',
                'default' => '#777777',
                'transparent' => false
            ),
            
            array(
                'id' => 'footer-copyright-background-color',
                'type' => 'color',
                'title' => '', 
                 'required' => array( 'footer-custom-color', '=', '1' ),
                'class' => 'five-columns always-visible',
                'subtitle' => __('Copyright Background Color', tavoweb), 
                'desc' => '',
                'default' => '#1F1F1F',
                'transparent' => false
            ),
            
            array(
                'id' => 'footer-copyright-font-color',
                'type' => 'color',
                 'required' => array( 'footer-custom-color', '=', '1' ),
                'title' => '', 
                'class' => 'five-columns always-visible',
                'subtitle' => __('Footer Copyright Font Color', tavoweb), 
                'desc' => '',
                'default' => '#777777',
                'transparent' => false
            ),
            array(
                'id' => 'footer-copyright-icon-hover-color',
                'type' => 'color',
                 'required' => array( 'footer-custom-color', '=', '1' ),
                'title' => '', 
                'class' => 'five-columns always-visible',
                'subtitle' => __('Footer Copyright Icon  Hover Color', tavoweb), 
                'desc' => '',
                'default' => '#ffffff',
                'transparent' => false
            ),
              array(
                'id' => 'footer-copyright-line', 
                'type' => 'checkbox', 
                'title' => __('Footer Add Line Above Copyright', tavoweb),
                'subtitle' => __('This will add a thin line to separate your footer widget area from the copyright section', tavoweb),
                'default' => '' 
            ),

            array(
                'id' => 'footer-full-width',
                'type' => 'switch',
                'title' => __('Footer Full Width', tavoweb), 
                'subtitle' => __('This to cause your footer content to display full width.', tavoweb),
                'desc' => '',
                'default' => '0' 
            ), 


             array(
                'id' => 'footer-reveal',
                'type' => 'switch',
                'title' => __('Footer Reveal Effect', tavoweb), 
                'subtitle' => __('This to cause the footer to appear as though it\'s being reveal by the main content area when scrolling down to it', tavoweb),
                'desc' => '',
                'default' => '0' 
            ), 

              array(
                'id' => 'footer-reveal-shadow', 
                'type' => 'select', 
                'required' => array( 'footer-reveal', '=', '1' ),
                'title' => __('Footer Reveal Shadow', tavoweb),
                'subtitle' => __('Please select the type of shadow you would like to appear on your footer', tavoweb),
                'options' => array(
                    "none" => "None",
                    "small" => "Small",
                    "large" => "Large",
                    "large_2" => "Large & same color as footer BG"
                ),
                'default' => 'none'
            ),

             array(
                'id' => 'disable-copyright-footer-area',
                'type' => 'checkbox',
                'title' => __('Disable Footer Copyright Area', tavoweb), 
                'subtitle' => __('This will hide the copyright bar in your footer', tavoweb),
                'desc' => '',
                'default' => '' 
            ),  

            array(
                'id' => 'footer-copyright-text',
                'type' => 'text',
                'title' => __('Footer Copyright Section Text', tavoweb), 
                'subtitle' => __('Please enter the copyright section text. e.g. All Rights Reserved, Salient Inc.', tavoweb),
                'desc' => __('', tavoweb)
            ),
            
             array(
                'id' => 'disable-auto-copyright',
                'type' => 'checkbox',
                'title' => __('Disable Automatic Copyright', tavoweb), 
                'subtitle' => __('By default, your copyright section will say "© {YEAR} {SITENAME}" before the additional text you add above in the Footer Copyright Section Text input - This option allows you to remove that.', tavoweb), 
                'desc' => ''
            ),
            
            array(
                'id' => 'footer-background-image',
                'type' => 'media',
                'title' => __('Footer Background Image', tavoweb), 
                'subtitle' => __('Upload an image that will be used as the background image on your footer. ', tavoweb),
                'desc' => ''
            ),

            array(
                'id'        => 'footer-background-image-overlay',
                'type'      => 'slider',
                'title'     => __('Footer Background Overlay', tavoweb),
                'subtitle'  => __('Adjust the overlay opacity here - the overlay colors pulls from your defined footer background color.', tavoweb),
                'desc'      => __('', tavoweb),
                "default"   => 0.8,
                "min"       => 0,
                "step"      => 0.1,
                "max"       => 1,
                "resolution" => 0.1,
                'display_value' => 'text'
            ),

            array(
                'id' => 'use-facebook-icon',
                'type' => 'checkbox',
                'title' => __('Use Facebook Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-twitter-icon',
                'type' => 'checkbox',
                'title' => __('Use Twitter Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-google-plus-icon',
                'type' => 'checkbox',
                'title' => __('Use Google+ Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-vimeo-icon',
                'type' => 'checkbox',
                'title' => __('Use Vimeo Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-dribbble-icon',
                'type' => 'checkbox',
                'title' => __('Use Dribbble Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-pinterest-icon',
                'type' => 'checkbox',
                'title' => __('Use Pinterest Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-youtube-icon',
                'type' => 'checkbox',
                'title' => __('Use Youtube Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-tumblr-icon',
                'type' => 'checkbox',
                'title' => __('Use Tumblr Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-linkedin-icon',
                'type' => 'checkbox',
                'title' => __('Use LinkedIn Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-rss-icon',
                'type' => 'checkbox',
                'title' => __('Use RSS Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-behance-icon',
                'type' => 'checkbox',
                'title' => __('Use Behance Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-instagram-icon',
                'type' => 'checkbox',
                'title' => __('Use Instagram Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-flickr-icon',
                'type' => 'checkbox',
                'title' => __('Use Flickr Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-spotify-icon',
                'type' => 'checkbox',
                'title' => __('Use Spotify Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-github-icon',
                'type' => 'checkbox',
                'title' => __('Use GitHub Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-stackexchange-icon',
                'type' => 'checkbox',
                'title' => __('Use StackExchange Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-soundcloud-icon',
                'type' => 'checkbox',
                'title' => __('Use SoundCloud Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-vk-icon',
                'type' => 'checkbox',
                'title' => __('Use VK Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-vine-icon',
                'type' => 'checkbox',
                'title' => __('Use Vine Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-houzz-icon',
                'type' => 'checkbox',
                'title' => __('Use Houzz Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-yelp-icon',
                'type' => 'checkbox',
                'title' => __('Use Yelp Icon', tavoweb), 
                'subtitle' => '',
                'desc' => ''
            )
        )
    ) );

    



    Redux::setSection( $opt_name, array(
        'title'            => __( 'Page Transitions', 'redux-framework-demo' ),
        'id'               => 'page_transitions',
        'desc'             => __( 'All page transition options are listed here.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'   => 'el el-refresh',
        'fields' => array(

              array(
                'id' => 'ajax-page-loading',
                'type' => 'switch',
                'title' => __('Animated Page Transitions', tavoweb), 
                'subtitle' => __('This will enable an animation between loading your pages.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),

             array(
                'id' => 'transition-method', 
                'type' => 'select', 
                'title' => __('Animated Transition Method', tavoweb),
                'subtitle' => __('<strong> AJAX </strong> will result in a smoother seamless transition, but won\'t work by default for pages that use plugins which rely on Javascript. (only recommended for advanced users) <br/><br/>  <strong>Standard</strong> will simulate the effect of AJAX loading and allow for the use of any plugins to function regularly.', tavoweb),
                'options' => array(
                    "standard" => "Standard",
                    "ajax" => "AJAX"
                ),
                'default' => 'standard'
            ),

              array(
                'id' => 'disable-transition-fade-on-click',
                'type' => 'checkbox',
                'title' => __('Disable Fade Out On Click', tavoweb), 
                'subtitle' => __('This will disable the default functionality of your page fading out when clicking a link with the Standard transition method. Is useful if your page transitions are conflicting with third party plugins that take over certain anchors such as lighboxes.', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

            array(
                'id' => 'transition-effect', 
                'type' => 'select', 
                'title' => __('Transition Effect', tavoweb),
                'subtitle' => __('Please select your transition effect here', tavoweb),
                'options' => array(
                    "standard" => "Fade with loading icon",
                    "center_mask_reveal" => "Center mask reveal",
                    "horizontal_swipe_basic" => "Horizontal basic swipe",
                    "horizontal_swipe" => "Horizontal multi layer swipe"
                ),
                'default' => 'standard'
            ),

            array(
                'id' => 'loading-icon', 
                'type' => 'select', 
                'required' => array( 'transition-effect', '=', 'standard' ),
                'title' => __('Loading Icon Style', tavoweb),
                'subtitle' => __('Select your loading icon style here', tavoweb),
                'options' => array(
                    "default" => "Default",
                    "material" => "Material Design"
                ),
                'default' => 'material'
            ),
            array(
                'id' => 'loading-icon-colors',
                'type' => 'color_gradient',
                'transparent' => false,
                'title' => __('Loading Icon Coloring', tavoweb), 
                'subtitle' => __('The icon will animate between the two colors - or just use the first if a second is not supplied.', tavoweb), 
                'desc' => '',
                'required' => array( 'loading-icon', '=', 'material' ),
                'default'  => array(
                    'from' => '#3452ff',
                    'to'   => '#3452ff' 
                ),
            ),
             array(
                'id' => 'loading-image',
                'type' => 'media',
                'required' => array( 'transition-effect', '=', 'standard' ),
                'title' => __('Custom Loading Image', tavoweb), 
                'subtitle' => __('Upload a .png or .gif image that will be used in all applicable areas on your site as the loading image. ', tavoweb),
                'desc' => ''
            ),
             array(
                'id' => 'loading-image-animation', 
                'type' => 'select', 
                'required' => array( 'transition-effect', '=', 'standard' ),
                'title' => __('Loading Image CSS Animation', tavoweb),
                'subtitle' => __('This will add a css based animation onto your defined image', tavoweb),
                'options' => array(
                    "none" => "Default",
                    "spin" => "Smooth Spin"
                ),
                'default' => 'none'
            ),
             array(
                'id' => 'transition-bg-color',
                'type' => 'color',
                'title' => __('Page Transition BG Color', tavoweb), 
                'subtitle' =>  __('Use this to define the color of your page transition background.', tavoweb), 
                'desc' => '',
                'default' => '',
                'transparent' => false
            ),
              array(
                'id' => 'transition-bg-color-2',
                'type' => 'color',
                'title' => __('Page Transition BG Color 2', tavoweb), 
                'subtitle' =>  __('Use this to define the second color of your page transition background.', tavoweb), 
                'desc' => '',
                'default' => '',
                'required' => array( 'transition-effect', '=', 'horizontal_swipe' ),
                'transparent' => false
            )
        

        )
    ) );


    

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Page Header', 'redux-framework-demo' ),
        'id'               => 'page_header',
        'desc'             => __( 'All global page header options are listed here. (there are also many options located in your page header metabox available on every edit page screen which are configured on a per-page basis', 'redux-framework-demo' ),
        'customizer_width' => '400px',
         'icon'   => 'el el-file',
        'fields' => array(

            array(
                'id' => 'header-animate-in-effect', 
                'type' => 'select', 
                'title' => __('Load In Animation', tavoweb),
                'subtitle' => __('Page headers refer to any page header set in the page header meta box. <br/> <br/> <strong>None:</strong> No animation will occur (default). <br/> <strong>Slide down:</strong> Will apply for all non full screen page headers. <br/> <strong>Slight zoom out:</strong> Will apply to all page headers that have an image/video set (bg color only won\'t show the effect). <br/>', tavoweb),
                'options' => array(
                    "none" => "None",
                    "slide-down" => "Slide Down",
                    "zoom-out" => "Slight Zoom Out"
                ),
                'default' => 'none'
            ),

            array(
                'id' => 'header-down-arrow-style', 
                'type' => 'select', 
                'title' => __('Down Arrow Style', tavoweb),
                'subtitle' => __('Page headers that are set to fullscreen will show an arrow at the bottom so the user knows there is more content below - select the style for that here.', tavoweb),
                'options' => array(
                    "default" => "Default",
                    "scroll-animation" => "Scroll Animation"
                ),
                'default' => 'default'
            ),
        

        )
    ) );
    



    Redux::setSection( $opt_name, array(
        'title'            => __( 'Form Styling', 'redux-framework-demo' ),
        'id'               => 'form_styling',
        'desc'             => __( 'All form styling options are listed here.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-edit',
        'fields' => array(

               array(
                'id' => 'form-style', 
                'type' => 'select', 
                'title' => __('Overall Form Style', tavoweb),
                'subtitle' => __('Sets the style of all form elements used.', tavoweb),
                'options' => array(
                    "default" => "Inherit from theme skin",
                    "minimal" => "Minimal"
                ),
                'default' => 'minimal'
            ),

              array(
                'id' => 'form-fancy-select',
                'type' => 'switch',
                'title' => __('Enable Fancy Select/Checkbox/Radio Styling', tavoweb), 
                'subtitle' => __('This will ensure the styling of your advanced form elements look consistent on all browsers and are more user friendly.', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),

            array(
                'id' => 'form-submit-btn-style', 
                'type' => 'select', 
                'title' => __('Submit Button Style', tavoweb),
                'subtitle' => __('Select your desired style which will be used for submit buttons throughout your site', tavoweb),
                'desc' => '',
                'options' => array(
                    'default' => __('Default', tavoweb), 
                    'regular' => __('Nectar Btn', tavoweb),
                    'see-through' => __('Nectar Btn See Through', tavoweb)            
                ),
                'default' => 'regular'
            )
        

        )
    ) );

    

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Call To Action', 'redux-framework-demo' ),
        'id'               => 'cta',
        'desc'             => __( 'All call to action options are listed here.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-bell',
        'fields' => array(

                array(
                'id' => 'cta-text', 
                'type' => 'text', 
                'title' => __('Call to Action Text', tavoweb),
                'subtitle' => __('Add the text that you would like to appear in the global call to action section.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'cta-btn', 
                'type' => 'text', 
                'title' => __('Call to Action Button Text', tavoweb),
                'subtitle' => __('If you would like a button to be the link in the global call to action section, please enter the text for it here.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'cta-btn-link',  
                'type' => 'text', 
                'title' => __('Call to Action Button Link URL', tavoweb),
                'subtitle' => __('Please enter the URL for the call to action section here.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'exclude_cta_pages',
                'title' => __('Pages to Exclude the Call to Action Section', tavoweb),
                'subtitle' => __('Select any pages you wish to exclude the Call to Action section from. You can select multiple pages.', tavoweb),
                'args' => array(
                    'sort_order' => 'ASC'
                ),
                'desc' => '',
                'type'     => 'select',
                'data'     => 'pages',
                'multi'    => true,
            ),
            
            array(
                'id' => 'cta-background-color',
                'type' => 'color',
                'title' => __('Call to Action Background Color', tavoweb), 
                'subtitle' => '', 
                'desc' => '',
                'default' => '#ECEBE9',
                'transparent' => false
            ),
            
            array(
                'id' => 'cta-text-color',
                'type' => 'color',
                'title' => __('Call to Action Font Color', tavoweb), 
                'subtitle' => '', 
                'desc' => '',
                'default' => '#4B4F52',
                'transparent' => false
            ),
            
            array(
                'id' => 'cta-btn-color', 
                'type' => 'select', 
                'title' => __('Call to Action Button Color', tavoweb),
                'subtitle' => '',
                'desc' => '',
                'options' => array(
                    'accent-color' => __('Accent Color', tavoweb), 
                    'extra-color-1' => __('Extra Color 1', tavoweb),
                    'extra-color-2' => __('Extra Color 2', tavoweb),
                    'extra-color-3' => __('Extra Color 3', tavoweb),
                    'see-through' => __('See Through', tavoweb)
                ),
                'default' => 'accent-color'
            )
        

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Portfolio', 'redux-framework-demo' ),
        'id'               => 'portfolio',
        'desc'             => __( 'All portfolio options are listed here.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'   => 'el el-th',
        'fields' => array(

             
            

        )
    ) );


Redux::setSection( $opt_name, array(
        'title'            => __( 'Styling', 'redux-framework-demo' ),
        'id'               => 'portfolio-style',
        'subsection'       => true,
        'fields'           => array(
                array(
                'id' => 'main_portfolio_layout',
                'type' => 'image_select',
                'title' => __('Main Layout', tavoweb), 
                'subtitle' => __('Please select the number of columns you would like for your portfolio.', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                '3' => array('title' => '3 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/3col.png'),
                                '4' => array('title' => '4 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/4col.png'),
                                'fullwidth' => array('title' => 'Full Width', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/fullwidth.png')
                            ),
                'default' => '3'
            ),  
            array(
                'id' => 'main_portfolio_project_style',
                'type' => 'radio',
                'title' => __('Project Style', tavoweb), 
                'subtitle' => __('Please select the style you would like your projects to display in on your portfolio pages.', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                '1' => __('Meta below thumb w/ links on hover', tavoweb),
                                '2' => __('Meta on hover + entire thumb link', tavoweb),
                                '7' => __('Meta on hover w/ zoom + entire thumb link', tavoweb),
                                '8' => __('Meta overlaid - bottom left aligned', tavoweb),
                                '3' => __("Title overlaid w/ zoom effect on hover", tavoweb),
                                '5' => __("Title overlaid w/ zoom effect on hover alt", tavoweb),
                                '4' => __("Meta from bottom on hover + entire thumb link", tavoweb),
                                '6' => __("Meta + 3D Parallax on hover", tavoweb) ,
                                '9' => __('Meta below thumb w/ shadow hover', tavoweb) 
                            ),
                'default' => '1'
            ),

            array(
                'id' => 'main_portfolio_item_spacing',
                'type' => 'select',
                'title' => __('Project Item Spacing', tavoweb), 
                'subtitle' => __('Please select the spacing you would like between your items', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                "default" => "Default",
                                "1px" => "1px",
                                "2px" => "2px",
                                "3px" => "3px",
                                "4px" => "4px",
                                "5px" => "5px",
                                "6px" => "6px",
                                "7px" => "7px",
                                "8px" => "8px",
                                "9px" => "9px",
                                "10px" => "10px",
                                "15px" => "15px",
                                "20px" => "20px"
                            ),
                'default' => 'default',
                'required' => array( 'main_portfolio_layout', '=', 'fullwidth' )
            ),

            array(
                'id' => 'portfolio_use_masonry', 
                'type' => 'checkbox',
                'title' => __('Masonry Style?', tavoweb),
                'subtitle' => __('This will allow your portfolio items to display in a masonry layout as opposed to a fixed grid. You can define your masonry sizes in each project. <br/><br/> If using the full width layout, will only be active with the alternative project style.', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '0' 
            ),  
            array(
                'id' => 'portfolio_masonry_grid_sizing',
                'type' => 'select',
                'title' => __('Masonry Grid Sizing', tavoweb), 
                'subtitle' => __('Please select the grid layout for your masonry portfolio. This will change the dimensions of the "Masonry Item Sizing" field you choose for your projects in the project configuration metabox. After changing this, you will need to run the <a target="_blank" href="https://wordpress.org/plugins/regenerate-thumbnails/">regenerate thumbnails</a> plugin to recrop any featured images that are already uploaded. You must upload your images at a minimum of these dimensions or larger - uploading smaller than the size chosen will result in an incorrect layout.<br/> <strong class="top-margin">Square Based Grid</strong><br/><table class="masonry_table"><tr><th>Masonry Size</th><th>Dimensions</th></tr><tr><td>Regular</td><td>500x500</td></tr><tr><td>Wide</td><td>1000x500</td></tr><tr><td>Tall</td><td>1000x500</td></tr><tr><td>Wide & Tall</td><td>1000x1000</td></tr></table>    <strong>Photography Based</strong><br/><table class="masonry_table"><tr><th>Masonry Size</th><th>Dimensions</th></tr><tr><td>Regular</td><td>450x600</td></tr><tr><td>Wide</td><td>900x600</td></tr><tr><td>Wide & Tall</td><td>900x1200</td></tr></table> ', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                "default" => "Sqaure Grid Based (Default)",
                                "photography" => "Photography Based"
                            ),
                'default' => 'default'
            ),
             array(
                'id' => 'portfolio_inline_filters',
                'type' => 'checkbox',
                'title' => __('Display Filters Horizontally?', tavoweb), 
                'subtitle' => __('This will allow your filters to display horizontally instead of in a dropdown.', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '0' 
            ),
              array(
                'id' => 'portfolio_single_nav',
                'type' => 'radio',
                'title' => __('Single Project Page Navigation', tavoweb), 
                'subtitle' => __('Please select the navigation you would like your projects to use.', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                'in_header' => __('In Project Header', tavoweb),
                                'after_project' => __('At Bottom Of Project', tavoweb),
                                'after_project_2' => __('At Bottom W/ Featured Image', tavoweb)
                            ),
                'default' => 'after_project'
            ),  
             array(
                'id' => 'portfolio_loading_animation',
                'type' => 'select',
                'title' => __('Load In Animation', tavoweb), 
                'subtitle' => __('Please select the loading animation you would like', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                "none" => "None",
                                "fade_in" => "Fade In",
                                "fade_in_from_bottom" => "Fade In From Bottom",
                                "perspective" => "Perspective Fade In"
                            ),
                'default' => 'fade_in_from_bottom'
            ),
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Functionality', 'redux-framework-demo' ),
        'id'               => 'portfolio-functionality',
        'subsection'       => true,
        'fields'           => array(
                array(
                'id' => 'portfolio_sidebar_follow', 
                'type' => 'checkbox',
                'title' => __('Portfolio Sidebar Follow on Scroll', tavoweb),
                'subtitle' => __('When supplying extra content, a sidebar enabled page can get quite tall and feel empty on the right side. Enable this option to have your sidebar follow you down the page.', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '0' 
            ), 
            array(
                'id' => 'portfolio_social',
                'type' => 'switch',
                'title' => __('Social Media Sharing Buttons', tavoweb), 
                'subtitle' => __('Activate this to enable social sharing buttons on your portfolio items.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),  
             array(
                'id' => 'portfolio_social_style',
                'type' => 'select',
                'title' => __('Social Sharing Style', tavoweb), 
                'subtitle' => __('Please select the style you would like your portfolio sharing buttons to display in. Note: If using the default style, only non full width projects will be able to show them.', tavoweb),
                'desc' => __('', tavoweb),
                'required' => array( 'portfolio_social', '=', '1' ),
                'options' => array(
                                "default" => "In Sidebar (default)",
                                "fixed_bottom_right" => "Fixed To Bottom Right Of Screen",
                            ),
                'default' => 'default'
            ),
             array(
                'id' => 'portfolio-facebook-sharing',
                'type' => 'checkbox',
                'title' => __('Facebook', tavoweb), 
                'subtitle' => __('Share it.', tavoweb),
                'default' => '1',
                'required' => array( 'portfolio_social', '=', '1' ),
                'desc' => '',
            ),
            array(
                'id' => 'portfolio-twitter-sharing',
                'type' => 'checkbox',
                'title' => __('Twitter', tavoweb), 
                'subtitle' => __('Tweet it.', tavoweb),
                  'required' => array( 'portfolio_social', '=', '1' ),
                'default' => '1', 
                'desc' => '',
            ),
             array(
                'id' => 'portfolio-google-plus-sharing',
                'type' => 'checkbox',
                  'required' => array( 'portfolio_social', '=', '1' ),
                'title' => __('Google+', tavoweb), 
                'subtitle' => __('Share it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'portfolio-pinterest-sharing',
                'type' => 'checkbox',
                  'required' => array( 'portfolio_social', '=', '1' ),
                'title' => __('Pinterest', tavoweb), 
                'subtitle' => __('Pin it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'portfolio-linkedin-sharing',
                'type' => 'checkbox',
                  'required' => array( 'portfolio_social', '=', '1' ),
                'title' => __('LinkedIn', tavoweb), 
                'subtitle' => __('Share it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            
            array(
                'id' => 'portfolio_date',
                'type' => 'checkbox',
                'title' => __('Display Dates on Projects?', tavoweb), 
                'subtitle' => __('Toggle whether or not to show the date on your projects.', tavoweb),
                'desc' => '',
                'switch' => true,
                'default' => '1' 
            ),                                                      
            array(
                'id' => 'portfolio_pagination', 
                'type' => 'switch',
                'title' => __('Portfolio Pagination', tavoweb),
                'subtitle' => __('Would you like your portfolio items to be paginated?', tavoweb),
                'desc' => '',
                'default' => '0',
            ),
             array(
                'id' => 'portfolio_pagination_type',
                'type' => 'select', 
                'title' => __('Pagination Type', tavoweb),
                'subtitle' => __('Please select your pagination type here.', tavoweb),
                'desc' => '',
                  'required' => array( 'portfolio_pagination', '=', '1' ),
                'options' => array(
                    'default' => __('Default', tavoweb), 
                    'infinite_scroll' => __('Infinite Scroll', tavoweb)
                ),
                'default' => 'default'
            ),
            array(
                'id' => 'portfolio_extra_pagination',
                'type' => 'switch',
                 'required' => array( 'portfolio_pagination', '=', '1' ),
                'title' => __('Display Pagination Numbers', tavoweb), 
                'subtitle' => __('Do you want the page numbers to be visible in your portfolio pagination?', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            array(
                'id' => 'portfolio_pagination_number', 
                'type' => 'text', 
                 'required' => array( 'portfolio_pagination', '=', '1' ),
                'title' => __('Items Per page', tavoweb),
                'subtitle' => __('How many of your portfolio items would you like to display per page?', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),  
             array(
                'id' => 'portfolio_rewrite_slug', 
                'type' => 'text', 
                'title' => __('Custom Slug', tavoweb),
                'subtitle' => __('If you want your portfolio post type to have a custom slug in the url, please enter it here. <br/><br/> <b>You will still have to refresh your permalinks after saving this!</b> <br/>This is done by going to Settings > Permalinks and clicking save.', tavoweb),
                'desc' => ''
            ), 
            array(
                'id' => 'carousel-title', 
                'type' => 'text', 
                'title' => __('Custom Recent Projects Title', tavoweb),
                'subtitle' => __('This is be used anywhere you place the recent work shortcode and on the "Recent Work" home layout. e.g. Recent Work', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'carousel-link', 
                'type' => 'text', 
                'title' => __('Custom Recent Projects Link Text', tavoweb),
                'subtitle' => __('This is be used anywhere you place the recent work shortcode and on the "Recent Work" home layout. e.g. View All Work', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'portfolio-sortable-text', 
                'type' => 'text', 
                'title' => __('Custom Portfolio Page Sortable Text', tavoweb),
                'subtitle' => __('e.g. Sort Portfolio', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'main-portfolio-link', 
                'type' => 'text', 
                'title' => __('Main Portfolio Page URL', tavoweb),
                'subtitle' => __('This will be used to link back to your main portfolio from the more details page and for the recent projects link. i.e. The portfolio page that you are displaying all project categories on.', tavoweb),
                'desc' => ''
            ),
             array(
                'id' => 'portfolio_same_category_single_nav',
                'type' => 'checkbox',
                'title' => __('Single Project Nav Arrows Limited To Same Category', tavoweb), 
                'subtitle' => __('This will cause your single project page next/prev arrows to lead only to projects that exist in the same category as the current.', tavoweb),
                'desc' => '',
                'default' => '0' 
            )
        
        )
    ) );



 Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog', 'redux-framework-demo' ),
        'id'               => 'blog',
        'desc'             => __( 'All blog options are listed here.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-list',
        'fields' => array(

             
            

        )
    ) );



 Redux::setSection( $opt_name, array(
        'title'            => __( 'Styling', 'redux-framework-demo' ),
        'id'               => 'Blog-style',
        'subsection'       => true,
        'fields'           => array(
             array(
                'id' => 'blog_type', 
                'type' => 'select', 
                'title' => __('Blog Type', tavoweb),
                'subtitle' => __('Please select your blog format here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'std-blog-sidebar' => __('Standard Blog W/ Sidebar', tavoweb), 
                    'std-blog-fullwidth' => __('Standard Blog No Sidebar', tavoweb),
                    'masonry-blog-sidebar' => __('Masonry Blog W/ Sidebar', tavoweb),
                    'masonry-blog-fullwidth' => __('Masonry Blog No Sidebar', tavoweb),
                    'masonry-blog-full-screen-width' => __('Masonry Blog Fullwidth', tavoweb)
                ),
                'default' => 'std-blog-sidebar'
            ), 
             array(
                'id' => 'blog_standard_type',
                'type' => 'radio',
                'title' => __('Standard Blog Style', tavoweb), 
                'subtitle' => __('Please select the style you would like your posts to use when the standard layout is displayed', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                'classic' => __('Classic', tavoweb),
                                'minimal' => __('Minimal', tavoweb),
                                'featured_img_left' => __('Featured Image Left', tavoweb)
                            ),
                'default' => 'classic',
                'required' => array( 'blog_type', 'contains', 'std-blog' )
            ),
            array(
                'id' => 'blog_masonry_type',
                'type' => 'radio',
                'title' => __('Masonry Style', tavoweb), 
                'subtitle' => __('Please select the style you would like your posts to use when the masonry layout is displayed', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                'classic' => __('Classic', tavoweb),
                                'classic_enhanced' => __('Classic Enhanced', tavoweb),
                                'material' =>  __('Material', tavoweb),
                                'meta_overlaid' => __('Meta Overlaid', tavoweb),
                                'auto_meta_overlaid_spaced' => __('Auto Masonry: Meta Overlaid Spaced', tavoweb)
                            ),
                'default' => 'classic'
            ),
            
            array(
                'id' => 'blog_auto_masonry_spacing',
                'type' => 'select',
                'title' => __('Auto Masonry Spacing', tavoweb), 
                'subtitle' => __('Please select the amount of spacing you would like for your auto masonry layout', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                     '4px' => '4px',
                     '8px' => '8px',
                     '12px' => '12px',
                     '16px' => '16px',
                     '20px' => '20px',
                            ),
                'default' => '8px',
                'required' => array( 'blog_masonry_type', '=', 'auto_meta_overlaid_spaced' )
            ),
            
            array(
                'id' => 'blog_loading_animation',
                'type' => 'select',
                'title' => __('Load In Animation', tavoweb), 
                'subtitle' => __('Please select the loading animation you would like', tavoweb),
                'desc' => __('', tavoweb),
                'options' => array(
                                "none" => "None",
                                "fade_in" => "Fade In",
                                "fade_in_from_bottom" => "Fade In From Bottom",
                                "perspective" => "Perspective Fade In"
                            ),
                'default' => 'none'
            ),
           
            array(
                'id' => 'blog_header_type', 
                'type' => 'select', 
                'title' => __('Blog Header Type', tavoweb),
                'subtitle' => __('Please select your blog header format here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'default' => __('Variable height & meta overlaid', tavoweb), 
                    'default_minimal' => __('Variable height minimal', tavoweb), 
                    'fullscreen' => __('Fullscreen with meta under', tavoweb)
                ),
                'default' => 'default'
            ), 
             array(
                'id' => 'blog_hide_sidebar',
                'type' => 'checkbox',
                'title' => __('Hide Sidebar on Single Post', tavoweb), 
                'subtitle' => __('Using this will remove the sidebar from appearing on your single post page.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ), 
            array(
                'id' => 'blog_enable_ss',
                'type' => 'checkbox',
                'title' => __('Enable Sticky Sidebar', tavoweb), 
                'subtitle' => __('Would you like to have your sidebar follow down as your scroll in a sticky manner?', tavoweb),
                'desc' => '',
                'default' => '0',
            ),  
            array(
                'id' => 'blog_hide_featured_image',
                'type' => 'checkbox',
                'title' => __('Hide Featured Image on Single Post', tavoweb), 
                'subtitle' => __('Using this will remove the featured image from appearing in the top of your single post page.', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),  
             array(
                'id' => 'blog_archive_bg_image',
                'type' => 'media',
                'title' => __('Archive Header Background Image', tavoweb), 
                'subtitle' => __('Upload an optional background that will be used on all blog archive pages.', tavoweb),
                'desc' => ''
            )
            
        )
    ) );



Redux::setSection( $opt_name, array(
        'title'            => __( 'Functionality', 'redux-framework-demo' ),
        'id'               => 'blog-functionality',
        'subsection'       => true,
        'fields'           => array(
        
             array( 
                'id' => 'author_bio',
                'type' => 'checkbox',
                'title' => __('Author\'s Bio', tavoweb), 
                'subtitle' => __('Display the author\'s bio at the bottom of posts?', tavoweb),
                'desc' => __('', tavoweb),
                'default' => '1' 
            ),
            array(
                'id' => 'blog_auto_excerpt',
                'type' => 'checkbox',
                'title' => __('Automatic Post Excerpts', tavoweb), 
                'subtitle' => __('Using this will create automatic excerpts for your posts, placing a read more button after.', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),  
             array(
                'id' => 'blog_excerpt_length', 
                'type' => 'text', 
                'required' => array( 'blog_auto_excerpt', '=', '1' ),
                'title' => __('Excerpt Length', tavoweb),
                'subtitle' => __('How many words would you like to display for your post excerpts? The default is 30.', tavoweb),
                'desc' => ''
            ),
           array(
                'id' => 'blog_next_post_link',
                'type' => 'checkbox',
                'title' => __('Post Navigation Links On Single Post Page', tavoweb), 
                'subtitle' => __('Using this will add navigation link(s) at the bottom of every post page.', tavoweb),
                'desc' => '',
                'type' => 'switch',
                'default' => '1' 
            ), 
            array(
                'id' => 'blog_next_post_link_style',
                'type' => 'select',
                'title' => __('Post Navigation Style', tavoweb), 
                'subtitle' => __('Please select the style you would like your post navigation to display in."', tavoweb),
                'desc' => __('', tavoweb),
                'required' => array( 'blog_next_post_link', '=', '1' ),
                'options' => array(
                                "fullwidth_next_only" => "Fullwidth Next Link Only",
                                "fullwidth_next_prev" => "Fullwidth Next & Prev Links",
                                "contained_next_prev" => "Contained Next & Prev Links"
                            ),
                'default' => 'fullwidth_next_only'
            ),
          
            array(
                 'id' => 'blog_related_posts',
                 'type' => 'checkbox',
                 'title' => __('Related Posts On Single Post Page', tavoweb), 
                 'subtitle' => __('Using this will add related post links at the bottom of every post page.', tavoweb),
                 'desc' => '',
                 'type' => 'switch',
                 'default' => '0' 
             ), 
             
             array(
                 'id' => 'blog_related_posts_style',
                 'type' => 'select',
                 'title' => __('Related Posts Style', tavoweb), 
                 'subtitle' => __('Please select the style you would like for the related posts"', tavoweb),
                 'desc' => __('', tavoweb),
                 'required' => array( 'blog_related_posts', '=', '1' ),
                 'options' => array(
                          "material" => "Material",
                          "classic_enhanced" => "Classic Enhanced",
                  ),
                 'default' => 'material'
             ),
             
             array(
                 'id' => 'blog_related_posts_title_text',
                 'type' => 'select',
                 'title' => __('Related Posts Title Text', tavoweb), 
                 'subtitle' => __('Please select the header text you would like above the related posts"', tavoweb),
                 'desc' => __('', tavoweb),
                 'required' => array( 'blog_related_posts', '=', '1' ),
                 'options' => array(
                                 "related_posts" => "Related Posts",
                                 "similar_posts" => "Similar Posts",
                                 "you_may_also_like" => "You May Also Like",
                                 "recommended_for_you" => "Recommended For You",
                                 "hidden" => "None (Hidden)",
                             ),
                 'default' => 'related_posts'
             ),
               
           array(
                'id' => 'blog_social',
                'type' => 'switch',
                'title' => __('Social Media Sharing Buttons', tavoweb), 
                'subtitle' => __('Activate this to enable social sharing buttons on your blog posts.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),  
            array(
                'id' => 'blog_social_style',
                'type' => 'select',
                'title' => __('Social Sharing Style', tavoweb), 
                'subtitle' => __('Please select the style you would like your blog sharing buttons to display in."', tavoweb),
                'desc' => __('', tavoweb),
                'required' => array( 'blog_social', '=', '1' ),
                'options' => array(
                                "default" => "Default (Determined by Blog Header Type)",
                                "fixed_bottom_right" => "Fixed To Bottom Right Of Screen",
                            ),
                'default' => 'default'
            ),
             array(
                'id' => 'blog-facebook-sharing',
                'type' => 'checkbox',
                'required' => array( 'blog_social', '=', '1' ),
                'title' => __('Facebook', tavoweb), 
                'subtitle' =>  __('Share it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'blog-twitter-sharing',
                'type' => 'checkbox',
                'required' => array( 'blog_social', '=', '1' ),
                'title' => __('Twitter', tavoweb), 
                'subtitle' =>  __('Tweet it.', tavoweb),
                'default' => '1', 
                'desc' => '',
            ),
            array(
                'id' => 'blog-google-plus-sharing',
                'type' => 'checkbox',
                'required' => array( 'blog_social', '=', '1' ),
                'title' => __('Google+', tavoweb), 
                'subtitle' =>  __('Share it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'blog-pinterest-sharing',
                'type' => 'checkbox',
                'required' => array( 'blog_social', '=', '1' ),
                'title' => __('Pinterest', tavoweb), 
                'subtitle' =>  __('Pin it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'blog-linkedin-sharing',
                'type' => 'checkbox',
                'required' => array( 'blog_social', '=', '1' ),
                'title' => __('LinkedIn', tavoweb), 
                'subtitle' =>  __('Share it.', tavoweb),
                'default' => '1',
                'desc' => '',
            ),
            
            array(
                'id' => 'display_tags',
                'type' => 'checkbox',
                'title' => __('Display Tags', tavoweb), 
                'subtitle' => __('Display tags at the bottom of posts?', tavoweb),
                'desc' => __('', tavoweb),
                'switch' => true,
                'default' => '0' 
            ),
            
            array(
                'id' => 'display_full_date',
                'type' => 'switch',
                'title' => __('Display Full Date', tavoweb), 
                'subtitle' => __('This will add the year to the date post meta on all blog pages.', tavoweb),
                'desc' => __('', tavoweb),
                'default' => '0' 
            ),
            array(
                'id' => 'blog_pagination_type',
                'type' => 'select', 
                'title' => __('Pagination Type', tavoweb),
                'subtitle' => __('Please select your pagination type here.', tavoweb),
                'desc' => '',
                'options' => array(
                    'default' => __('Default', tavoweb), 
                    'infinite_scroll' => __('Infinite Scroll', tavoweb)
                ),
                'default' => 'default'
            ),
            array(
                'id' => 'extra_pagination',
                'type' => 'checkbox',
                'title' => __('Display Pagination Numbers', tavoweb), 
                'subtitle' => __('Do you want the page numbers to be visible in your pagination? (will only activate if using default pagination type)', tavoweb),
                'desc' => __('', tavoweb),
                'switch' => true,
                'default' => '0' 
            ),
            array(
                'id' => 'recent-posts-title', 
                'type' => 'text', 
                'title' => __('Custom Recent Posts Title', tavoweb),
                'subtitle' => __('This is be used anywhere you place the recent posts shortcode and on the "Recent Posts" home layout. e.g. Recent Posts', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'recent-posts-link', 
                'type' => 'text', 
                'title' => __('Custom Recent Posts Link Text', tavoweb),
                'subtitle' => __('This is be used anywhere you place the recent posts shortcode and on the "Recent Posts" home layout. e.g. View All Posts', tavoweb),
                'desc' => ''
            ),

        )
    ) );
    

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact', 'redux-framework-demo' ),
        'id'               => 'contact',
        'desc'             => __( 'To convert an address into latitude & longitude please use <a href="http://www.latlong.net/convert-address-to-lat-long.html">this converter.</a>', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-phone',
        'fields' => array(

             
             array(
                'id' => 'zoom-level',
                'type' => 'text',
                'title' => __('Default Map Zoom Level', tavoweb), 
                'subtitle' => __('Value should be between 1-18, 1 being the entire earth and 18 being right at street level.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'enable-map-zoom',
                'type' => 'checkbox',
                'title' => __('Enable Map Zoom In/Out', tavoweb), 
                'subtitle' => __('Do you want users to be able to zoom in/out on the map?', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            array(
                'id' => 'center-lat',
                'type' => 'text',
                'title' => __('Map Center Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for the maps center point.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'center-lng',
                'type' => 'text',
                'title' => __('Map Center Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for the maps center point.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'use-marker-img',
                'type' => 'switch',
                'title' => __('Use Image for Markers', tavoweb), 
                'subtitle' => __('Do you want a custom image to be used for the map markers?', tavoweb),
                'desc' => __('', tavoweb),
                'default' => '0' 
            ),
            array(
                'id' => 'marker-img',
                'type' => 'media',
                'required' => array( 'use-marker-img', '=', '1' ),
                'title' => __('Marker Icon Upload', tavoweb), 
                'subtitle' => __('Please upload an image that will be used for all the markers on your map.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'enable-map-animation',
                'type' => 'checkbox',
                'title' => __('Enable Marker Animation', tavoweb), 
                'subtitle' => __('This will cause your markers to do a quick bounce as they load in.', tavoweb),
                'desc' => '',
                'default' => '1' 
            ),
            array(
                'id' => 'map-point-1',
               'type' => 'switch',
                'title' => __('Location #1', tavoweb), 
                'subtitle' => __('Toggle location #1', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude1',
                'type' => 'text',
                'required' => array( 'map-point-1', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your first location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude1',
                'type' => 'text',
                'required' => array( 'map-point-1', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your first location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info1',
                'type' => 'textarea',
                'required' => array( 'map-point-1', '=', '1' ),
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your first location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            array(
                'id' => 'map-point-2',
               'type' => 'switch',
                'title' => __('Location #2', tavoweb), 
                'subtitle' => __('Toggle location #2', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude2',
                'type' => 'text',
                'required' => array( 'map-point-2', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your second location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude2',
                'required' => array( 'map-point-2', '=', '1' ),
                'type' => 'text',
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your second location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info2',
                'type' => 'textarea',
                'required' => array( 'map-point-2', '=', '1' ),
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your second location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            array(
                'id' => 'map-point-3',
               'type' => 'switch',
                'title' => __('Location #3', tavoweb), 
                'subtitle' => __('Toggle location #3', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude3',
                'type' => 'text',
                'required' => array( 'map-point-3', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your third location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude3',
                'required' => array( 'map-point-3', '=', '1' ),
                'type' => 'text',
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your third location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info3',
                'type' => 'textarea',
                'required' => array( 'map-point-3', '=', '1' ),
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your third location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            array(
                'id' => 'map-point-4',
                'type' => 'switch',
                'title' => __('Location #4', tavoweb), 
                'subtitle' => __('Toggle location #4', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude4',
                'type' => 'text',
                'required' => array( 'map-point-4', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your fourth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude4',
                'type' => 'text',
                'required' => array( 'map-point-4', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your fourth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info4',
                'required' => array( 'map-point-4', '=', '1' ),
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your fourth location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            
            array(
                'id' => 'map-point-5',
                'type' => 'switch',
                'title' => __('Location #5', tavoweb), 
                'subtitle' => __('Toggle location #5', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude5',
                'type' => 'text',
                'required' => array( 'map-point-5', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your fifth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude5',
                'type' => 'text',
                'required' => array( 'map-point-5', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your fifth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info5',
                'required' => array( 'map-point-5', '=', '1' ),
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your fifth location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            array(
                'id' => 'map-point-6',
                'type' => 'switch',
                'title' => __('Location #6', tavoweb), 
                'subtitle' => __('Toggle location #6', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude6',
                'type' => 'text',
                'required' => array( 'map-point-6', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your sixth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude6',
                'required' => array( 'map-point-6', '=', '1' ),
                'type' => 'text',
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your sixth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info6',
                'required' => array( 'map-point-6', '=', '1' ),
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your sixth location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            
            array(
                'id' => 'map-point-7',
                'type' => 'switch',
                'title' => __('Location #7', tavoweb), 
                'subtitle' => __('Toggle location #7', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude7',
                'required' => array( 'map-point-7', '=', '1' ),
                'type' => 'text',
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your seventh location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude7',
                'type' => 'text',
                'required' => array( 'map-point-7', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your seventh location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info7',
                'type' => 'textarea',
                 'required' => array( 'map-point-7', '=', '1' ),
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your seventh location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            
            array(
                'id' => 'map-point-8',
                'type' => 'switch',
                'title' => __('Location #8', tavoweb), 
                'subtitle' => __('Toggle location #8', tavoweb),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'default' => '0' 
            ),
             array(
                'id' => 'latitude8',
                 'required' => array( 'map-point-8', '=', '1' ),
                'type' => 'text',
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your eighth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude8',
                'type' => 'text',
                 'required' => array( 'map-point-8', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your eighth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info8',
                'type' => 'textarea',
                'required' => array( 'map-point-8', '=', '1' ),
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your eighth location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            
            array(
                'id' => 'map-point-9',
               'type' => 'switch',
                'title' => __('Location #9', tavoweb), 
                'subtitle' => __('Toggle location #9', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude9',
                'type' => 'text',
                'required' => array( 'map-point-9', '=', '1' ),
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your ninth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude9',
                'type' => 'text',
                'required' => array( 'map-point-9', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your ninth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info9',
                'type' => 'textarea',
                'required' => array( 'map-point-9', '=', '1' ),
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your ninth location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            array(
                'id' => 'map-point-10',
                'type' => 'switch',
                'title' => __('Location #10', tavoweb), 
                'subtitle' => __('Toggle location #10', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
             array(
                'id' => 'latitude10',
                'type' => 'text',
                'title' => __('Latitude', tavoweb), 
                'subtitle' => __('Please enter the latitude for your tenth location.', tavoweb),
                'desc' => '',
                 'required' => array( 'map-point-10', '=', '1' ),
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude10',
                'type' => 'text',
                'required' => array( 'map-point-10', '=', '1' ),
                'title' => __('Longitude', tavoweb), 
                'subtitle' => __('Please enter the longitude for your tenth location.', tavoweb),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info10',
                'required' => array( 'map-point-10', '=', '1' ),
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', tavoweb), 
                'subtitle' => __('If you would like to display any text in an info window for your tenth location, please enter it here.', tavoweb),
                'desc' => ''
            ),
            
            
            array(
                'id' => 'add-remove-locations',
                'type' => 'add_remove',
                'title' => __('Show More or Less Locations', tavoweb), 
                'desc' => '',
                'grouping' => 'map-point'
            ),
            
            array(
                'id' => 'map-greyscale',
                'type' => 'switch',
                'title' => __('Greyscale Color', tavoweb), 
                'subtitle' => __('Toggle a greyscale color scheme (will also unlock a custom color option)', tavoweb),
                'desc' => '',
                'default' => '0' 
            ),
            array(
                'id' => 'map-color',
                'type' => 'color',
                'required' => array( 'map-greyscale', '=', '1' ),
                'transparent' => false,
                'title' => __('Map Extra Color', tavoweb), 
                'subtitle' =>  __('Use this to define a main color that will be used in combination with the greyscale option for your map', tavoweb), 
                'desc' => '',
                'default' => ''
            ),
            array(
                'id' => 'map-ultra-flat',
                'type' => 'checkbox',
                'required' => array( 'map-greyscale', '=', '1' ),
                'title' => __('Ultra Flat Map', tavoweb), 
                'subtitle' =>  __('This removes street/landmark text & some extra details for a clean look', tavoweb), 
                'desc' => '',
                'default' => ''
            ),
            array(
                'id' => 'map-dark-color-scheme',
                'type' => 'checkbox',
                'required' => array( 'map-greyscale', '=', '1' ),
                'title' => __('Dark Color Scheme', tavoweb), 
                'subtitle' =>  __('Enable this option for a dark colored map (This will override the extra color choice) ', tavoweb), 
                'desc' => '',
                'default' => ''
            )
            

        )
    ) );




 Redux::setSection( $opt_name, array(
        'title'            => __( 'Home Slider', 'redux-framework-demo' ),
        'id'               => 'home_slider',
        'desc'             => __( 'All home page related options are listed here.', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields' => array(

             
             array(
                'id' => 'slider-caption-animation',
                'type' => 'switch',
                'title' => __('Slider Caption Animations', tavoweb), 
                'subtitle' => __('This will add transition animations to your captions.', tavoweb),
                'desc' => __('', tavoweb),
                'default' => '1' 
            ),
            array(
                'id' => 'slider-background-cover',
                'type' => 'checkbox',
                'title' => __('Slider Image Resize', tavoweb), 
                'subtitle' => __('This will automatically resize your slide images to fit the users screen size by using the background-size cover css property.', tavoweb),
                'desc' => __('', tavoweb),
                'switch' => true,
                'default' => '1' 
            ),
            array(
                'id' => 'slider-autoplay',
                'type' => 'checkbox',
                'title' => __('Autoplay Slider?', tavoweb), 
                'subtitle' => __('This will cause the automatic advance of slides until the user begins interaction.', tavoweb),
                'desc' => __('', tavoweb),
                'switch' => true,
                'default' => '1' 
            ),
            array(
                'id' => 'slider-advance-speed', 
                'type' => 'text', 
                'title' => __('Slider Advance Speed', tavoweb),
                'subtitle' => __('This is how long it takes before automatically switching to the next slide.', tavoweb),
                'desc' => __('enter in milliseconds (default is 5500)', tavoweb), 
                'validate' => 'numeric'
            ),
             array(
                'id' => 'slider-animation-speed', 
                'type' => 'text', 
                'title' => __('Slider Animation Speed', tavoweb),
                'subtitle' => __('This is how long it takes to animate when switching between slides.', tavoweb),
                'desc' => __('enter in milliseconds (default is 800)', tavoweb), 
                'validate' => 'numeric'
            ),
            array(
                'id' => 'slider-height',
                'type' => 'text', 
                'title' => __('Slider Height', tavoweb), 
                'subtitle' => __('Please enter your desired height for the home slider. <br/> The safe minimum height is 400. <br/> The theme demo uses 650.', tavoweb),
                'desc' => __('Don\'t include "px" in the string. e.g. 650', tavoweb), 
                'validate' => 'numeric'
            ),
             array(
                'id' => 'slider-bg-color',
                'type' => 'color',
                'title' => __('Slider Background Color', tavoweb), 
                'subtitle' => __('This color will only be seen if your slides aren\'t wide enough to accomidate large resolutions. ', tavoweb), 
                'desc' => '',
                'transparent' => false,
                'default' => '#000000'
            ),      
            

        )
    ) );



Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Media', 'redux-framework-demo' ),
        'id'               => 'social_media',
        'desc'             => __( 'Enter in your social media locations here and then activate which ones you would like to display in your footer options & header options tabs. <br/><br/> <strong>Remember to include the "http://" in all URLs!</strong>', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-share',
        'fields' => array(

             
            array(
                'id' => 'sharing_btn_accent_color',
                'type' => 'switch',
                'title' => __('Sharing Button Accent Color?', tavoweb), 
                'subtitle' => __('This will allow your sharing buttons (the ones in posts/projects & social shortcode) to use the accent color rather than the actual branding color.', tavoweb),
                'desc' => __('', tavoweb),
                'default' => '1' 
            ),
            array(
                'id' => 'facebook-url', 
                'type' => 'text', 
                'title' => __('Facebook URL', tavoweb),
                'subtitle' => __('Please enter in your Facebook URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'twitter-url', 
                'type' => 'text', 
                'title' => __('Twitter URL', tavoweb),
                'subtitle' => __('Please enter in your Twitter URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'google-plus-url', 
                'type' => 'text', 
                'title' => __('Google+ URL', tavoweb),
                'subtitle' => __('Please enter in your Google+ URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'vimeo-url', 
                'type' => 'text', 
                'title' => __('Vimeo URL', tavoweb),
                'subtitle' => __('Please enter in your Vimeo URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'dribbble-url', 
                'type' => 'text', 
                'title' => __('Dribbble URL', tavoweb),
                'subtitle' => __('Please enter in your Dribbble URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'pinterest-url', 
                'type' => 'text', 
                'title' => __('Pinterest URL', tavoweb),
                'subtitle' => __('Please enter in your Pinterest URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'youtube-url', 
                'type' => 'text', 
                'title' => __('Youtube URL', tavoweb),
                'subtitle' => __('Please enter in your Youtube URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'tumblr-url', 
                'type' => 'text', 
                'title' => __('Tumblr URL', tavoweb),
                'subtitle' => __('Please enter in your Tumblr URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'linkedin-url', 
                'type' => 'text', 
                'title' => __('LinkedIn URL', tavoweb),
                'subtitle' => __('Please enter in your LinkedIn URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'rss-url', 
                'type' => 'text', 
                'title' => __('RSS URL', tavoweb),
                'subtitle' => __('If you have an external RSS feed such as Feedburner, please enter it here. Will use built in Wordpress feed if left blank.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'behance-url', 
                'type' => 'text', 
                'title' => __('Behance URL', tavoweb),
                'subtitle' => __('Please enter in your Behance URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'flickr-url', 
                'type' => 'text', 
                'title' => __('Flickr URL', tavoweb),
                'subtitle' => __('Please enter in your Flickr URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'spotify-url', 
                'type' => 'text', 
                'title' => __('Spotify URL', tavoweb),
                'subtitle' => __('Please enter in your Spotify URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'instagram-url', 
                'type' => 'text', 
                'title' => __('Instagram URL', tavoweb),
                'subtitle' => __('Please enter in your Instagram URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'github-url', 
                'type' => 'text', 
                'title' => __('GitHub URL', tavoweb),
                'subtitle' => __('Please enter in your GitHub URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'stackexchange-url', 
                'type' => 'text', 
                'title' => __('StackExchange URL', tavoweb),
                'subtitle' => __('Please enter in your StackExchange URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'soundcloud-url', 
                'type' => 'text', 
                'title' => __('SoundCloud URL', tavoweb),
                'subtitle' => __('Please enter in your SoundCloud URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'vk-url', 
                'type' => 'text', 
                'title' => __('VK URL', tavoweb),
                'subtitle' => __('Please enter in your VK URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'vine-url', 
                'type' => 'text', 
                'title' => __('Vine URL', tavoweb),
                'subtitle' => __('Please enter in your Vine URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'vine-url', 
                'type' => 'text', 
                'title' => __('Vine URL', tavoweb),
                'subtitle' => __('Please enter in your Vine URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'houzz-url', 
                'type' => 'text', 
                'title' => __('Houzz URL', tavoweb),
                'subtitle' => __('Please enter in your Houzz URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'yelp-url', 
                'type' => 'text', 
                'title' => __('Yelp URL', tavoweb),
                'subtitle' => __('Please enter in your Yelp URL.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'email-url', 
                'type' => 'text', 
                'title' => __('Email link', tavoweb),
                'subtitle' => __('Please enter in your URL link.', tavoweb),
                'desc' => ''
            ),
            array(
                'id' => 'phone-url', 
                'type' => 'text', 
                'title' => __('Phone Link', tavoweb),
                'subtitle' => __('Please enter in your Phone link.', tavoweb),
                'desc' => ''
            )
            

        )
    ) );




    global $woocommerce; 
    if ($woocommerce) {
            
         Redux::setSection( $opt_name, array(
        'title'            => __( 'WooCommerce', 'redux-framework-demo' ),
        'id'               => 'woocommerce',
        'desc'             => __( 'All WooCommerce related options are listed here', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-shopping-cart',
        'fields' => array(

                    array(
                        'id' => 'enable-cart',
                        'type' => 'switch',
                        'title' => __('Enable WooCommerce Cart In Nav', tavoweb), 
                        'sub_desc' => __('This will add a cart item to your main navigation.', tavoweb),
                        'desc' => '',
                        'default' => '1' 
                    ),
                    array(
                        'id' => 'ajax-cart-style',
                        'type' => 'select',
                        'title' => __('Cart In Nav Style', tavoweb), 
                        'subtitle' => __('Please select the style you would like for your AJAX cart', tavoweb),
                        'desc' => __('', tavoweb),
                        'options' => array(
                                        "dropdown" => "Dropdown",
                                        "slide_in" => "Slide In Full Page Height"
                                    ),
                        'default' => 'dropdown',
                         'required' => array( 'enable-cart', '=', '1' ),
                    ),
                    array(
                        'id' => 'main_shop_layout',
                        'type' => 'image_select',
                        'title' => __('Main Shop Layout', tavoweb), 
                        'sub_desc' => __('Please select layout you would like to use on your main shop page.', tavoweb),
                        'desc' => __('', tavoweb),
                        'options' => array(
                                        'fullwidth' => array('title' => 'Fullwidth', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/no-sidebar.png'),
                                        'no-sidebar' => array('title' => 'No Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/no-sidebar.png'),
                                        'right-sidebar' => array('title' => 'Right Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/right-sidebar.png'),
                                        'left-sidebar' => array('title' => 'Left Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/left-sidebar.png')
                                    ),
                        'default' => 'no-sidebar'
                    ),  
                    array(
                        'id' => 'single_product_layout',
                        'type' => 'image_select',
                        'title' => __('Single Product Layout', tavoweb), 
                        'sub_desc' => __('Please select layout you would like to use on your single product page.', tavoweb),
                        'desc' => __('', tavoweb),
                        'options' => array(
                                        'no-sidebar' => array('title' => 'No Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/no-sidebar.png'),
                                        'right-sidebar' => array('title' => 'Right Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/right-sidebar.png'),
                                        'left-sidebar' => array('title' => 'Left Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/left-sidebar.png')
                                    ),
                        'default' => 'no-sidebar'
                    ),    
                    array(
                        'id' => 'product_style',
                        'type' => 'radio',
                        'title' => __('Product Style', tavoweb), 
                        'sub_desc' => __('Please select the style you would like your products to display in (single product page styling will also vary slightly with each)', tavoweb),
                        'desc' => __('', tavoweb),
                        'options' => array(
                                        'classic' => __('Add to cart Icon on Hover (Classic)', tavoweb),
                                        'text_on_hover' => __('Add to cart text on hover', tavoweb),
                                        'material' => __('Add to cart text on hover (Material Design)', tavoweb)
                                    ),
                        'default' => 'classic'
                    ),
                     array(
                        'id' => 'product_bg_color',
                        'type' => 'color',
                        'transparent' => false,
                        'title' => __('Material Design Product Item BG Color', tavoweb), 
                        'subtitle' => __('Set this to match the BG color of your product images.', tavoweb), 
                        'desc' => '',
                        'required' => array( 'product_style', '=', 'material' ),
                        'default' => '#ffffff'
                    ),
                     array(
                        'id' => 'product_archive_bg_color',
                        'type' => 'color',
                         'transparent' => false,
                        'title' => __('Product Archive Page BG Color', tavoweb), 
                        'subtitle' => __('Allows to you set the BG color for all product archive pages', tavoweb), 
                        'desc' => '',
                        'default' => '#f6f6f6'
                    ),
                     array(
                        'id' => 'product_hover_alt_image',
                        'type' => 'switch',
                        'title' => __('Show first gallery image on Product hover', tavoweb), 
                        'sub_desc' => __('', tavoweb),
                        'desc' => 'Using this will cause your products to show the first gallery image (if supplied) on hover',
                        'default' => '0' 
                    ),
                     array(
                        'id' => 'single_product_gallery_type',
                        'type' => 'radio',
                        'title' => __('Single Product Gallery Type', tavoweb), 
                        'sub_desc' => __('Please select what gallery type you would like on your single product page', tavoweb),
                        'desc' => __('', tavoweb),
                        'options' => array(
                                        'default' => __('Default lightbox functionality', tavoweb),
                                        'ios_slider' => __('Gallery slider with zoom on Hover', tavoweb)
                                    ),
                        'default' => 'default'
                    ),
                     array(
                        'id' => 'product_tab_position',
                        'type' => 'radio',
                        'title' => __('Product Tab Position', tavoweb), 
                        'sub_desc' => __('Please select what area you would like your tabs to display in on the single product page', tavoweb),
                        'desc' => __('', tavoweb),
                        'options' => array(
                                        'in_sidebar' => __('In Side Area', tavoweb),
                                        'fullwidth' => __('Fullwidth Under Images', tavoweb)
                                    ),
                        'default' => 'in_sidebar'
                    ),
                     array(
                        'id' => 'woo-products-per-page', 
                        'type' => 'text', 
                        'title' => __('Products Per Page', tavoweb),
                        'subtitle' => __('Please enter your desired your products per page (default is 12)', tavoweb),
                        'desc' => '',
                        'validate' => 'numeric'
                    ),
                    array(
                        'id' => 'woo_social',
                        'type' => 'switch',
                        'title' => __('Social Media Sharing Buttons', tavoweb), 
                        'sub_desc' => __('Activate this to enable social sharing buttons on your product page.', tavoweb),
                        'desc' => '',
                        'default' => '1' 
                    ),
                    array(
                        'id' => 'woo-facebook-sharing',
                        'type' => 'checkbox',
                        'title' => __('Facebook', tavoweb), 
                        'sub_desc' =>  __('Share it.', tavoweb),
                        'default' => '1',
                        'required' => array( 'woo_social', '=', '1' ),
                        'desc' => '',
                    ),
                    array(
                        'id' => 'woo-twitter-sharing',
                        'type' => 'checkbox',
                        'title' => __('Twitter', tavoweb), 
                        'sub_desc' =>  __('Tweet it.', tavoweb),
                        'default' => '1', 
                        'required' => array( 'woo_social', '=', '1' ),
                        'desc' => '',
                    ),
                     array(
                        'id' => 'woo-google-plus-sharing',
                        'type' => 'checkbox',
                        'title' => __('Google+', tavoweb), 
                        'sub_desc' =>  __('Share it.', tavoweb),
                        'default' => '1',
                        'required' => array( 'woo_social', '=', '1' ),
                        'desc' => '',
                    ),
                    array(
                        'id' => 'woo-pinterest-sharing',
                        'type' => 'checkbox',
                        'title' => __('Pinterest', tavoweb), 
                        'sub_desc' =>  __('Pin it.', tavoweb),
                        'default' => '1',
                        'required' => array( 'woo_social', '=', '1' ),
                        'desc' => '',
                    ),
                    array(
                        'id' => 'woo-linkedin-sharing',
                        'type' => 'checkbox',
                        'title' => __('LinkedIn', tavoweb), 
                        'sub_desc' =>  __('Share it.', tavoweb),
                        'default' => '0',
                        'required' => array( 'woo_social', '=', '1' ),
                        'desc' => '',
                    )               
               
        )
    ) );
}


    

   

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

