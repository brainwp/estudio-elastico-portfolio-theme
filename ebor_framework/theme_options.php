<?php 

add_action('customize_register', 'other_customize');
function other_customize($wp_customize) {

class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="3" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

class CBP_Customizer_Number_Control extends WP_Customize_Control {

	public $type = 'number';
	
	public function render_content() {
	?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
		</label>
	<?php
	}
	
}

$social_options = array(
    'pinterest'=> 'Pinterest',
    'rss'=> 'RSS',
    'facebook'=> 'Facebook',
    'twitter'=> 'Twitter',
    'flickr'=> 'Flickr',
    'dribbble'=> 'Dribbble',
    'behance'=> 'Behance',
    'linkedin'=> 'LinkedIn',
    'vimeo'=> 'Vimeo',
    'youtube'=> 'Youtube',
    'kkype'=> 'Skype',
    'tumblr'=> 'Tumblr',
    'delicious'=> 'Delicious',
    '500px'=> '500px',
    'grooveshark'=> 'Grooveshark',
    'forrst'=> 'Forrst',
    'digg'=> 'Digg',
    'blogger'=> 'Blogger',
    'klout'=> 'Klout',
    'dropbox'=> 'Dropbox',
    'github'=> 'Github',
    'songkick'=> 'Singkick',
    'posterous'=> 'Posterous',
    'appnet'=> 'Appnet',
    'gplus'=> 'Google Plus',
    'stumbleupon'=> 'Stumbleupon',
    'lastfm'=> 'LastFM',
    'spotify'=> 'Spotify',
    'instagram'=> 'Instagram',
    'evernote'=> 'Evernote',
    'paypal'=> 'Paypal',
    'picasa'=> 'Picasa',
    'soundcloud'=> 'Soundcloud',
);

//CREATE CUSTOM STYLING SUBSECTION
$wp_customize->add_section( 'site_settings', array(
	'title'          => 'Site Settings',
	'priority'       => 34,
) );

//comments TITLE
$wp_customize->add_setting( 'load_more_title', array(
    'default'        => 'Load More',
    'type' => 'option'
) );

//commentstitle
$wp_customize->add_control( 'load_more_title', array(
    'label' => __('GLOBAL - Text For Load More Buttons', 'other'),
    'type' => 'text',
    'section' => 'site_settings',
    'priority'       => 5,
) );

//gallery height
$wp_customize->add_setting( 'delay_time', array(
    'default'        => '5000',
    'type' => 'option'
) );

//header height
$wp_customize->add_control( new CBP_Customizer_Number_Control( $wp_customize, 'delay_time', array(
    'label' => __('GLOBAL - Adjust delay time of galleries (ms)', 'marble'),
    'type' => 'number',
    'section' => 'site_settings',
    'priority'       => 3,
) ) );

$wp_customize->add_setting( 'ajax_control', array(
    'default' => 1,
    'type' => 'option'
) );

$wp_customize->add_control( 'ajax_control', array(
    'label' => __("SITEWIDE - Use AJAX for Loading? Disable if you're having plugin troubles.", 'other'),
    'type' => 'checkbox',
    'section' => 'site_settings',
    'priority'       => 7,
) );

$wp_customize->add_setting( 'crop_images', array(
    'default' => 1,
    'type' => 'option'
) );

$wp_customize->add_control( 'crop_images', array(
    'label' => __("SITEWIDE - Vertically crop images in the homepage gallery?", 'other'),
    'type' => 'checkbox',
    'section' => 'site_settings',
    'priority'       => 8,
) );

///////////////////////////////////////
//     BLOG SECTION                 //
/////////////////////////////////////
	
	//CREATE CUSTOM STYLING SUBSECTION
	$wp_customize->add_section( 'blog_settings', array(
		'title'          => 'Blog Settings',
		'priority'       => 35,
	) );
	
	//blog layout
	$wp_customize->add_setting('blog_layout', array(
	    'default'        => 'masonry',
	    'type' => 'option'
	));
	
	//blog layout
	$wp_customize->add_control( 'blog_layout', array(
	    'label'   => __('Choose layout for Blog.', 'other'),
	    'section' => 'blog_settings',
	    'type'    => 'select',
	    'priority' => 4,
	    'choices'    => array(
	    	'masonryhome' => 'Full Grid',
	        'masonry' => 'Masonry',
	        'medium' => 'Medium',
	        'full' => 'Large',
	    ),
	));
	
	//comments TITLE
	$wp_customize->add_setting( 'comments_title', array(
	    'default'        => 'Would you like to share your thoughts?',
	    'type' => 'option'
	) );
	
	//commentstitle
	$wp_customize->add_control( 'comments_title', array(
	    'label' => __('Comments Title', 'other'),
	    'type' => 'text',
	    'section' => 'blog_settings',
	    'priority'       => 5,
	) );
	
	//blog continue
	$wp_customize->add_setting( 'blog_continue', array(
	    'default'        => 'Continue Reading &rarr;',
	    'type' => 'option'
	) );
	
	//blog continue
	$wp_customize->add_control( 'blog_continue', array(
	    'label' => __('Blog "Continue Reading" Text', 'other'),
	    'type' => 'text',
	    'section' => 'blog_settings',
	    'priority'       => 6,
	) );
	
	//index date
	$wp_customize->add_setting( 'index_date', array(
	    'default' => 0,
	    'type' => 'option'
	) );
	
	//index date
	$wp_customize->add_control( 'index_date', array(
	    'label' => __('META - INDEX - Show date?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 7,
	) );
	
	//index categories
	$wp_customize->add_setting( 'index_categories', array(
	    'default' => 0,
	    'type' => 'option'
	) );
	
	//index categories
	$wp_customize->add_control( 'index_categories', array(
	    'label' => __('META - INDEX - Show tags?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 8,
	) );
	
	//index comments
	$wp_customize->add_setting( 'index_comments', array(
	    'default' => 0,
	    'type' => 'option'
	) );
	
	//index comments
	$wp_customize->add_control( 'index_comments', array(
	    'label' => __('META - INDEX - Show comments?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 9,
	) );

	//single date
	$wp_customize->add_setting( 'single_date', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//single date
	$wp_customize->add_control( 'single_date', array(
	    'label' => __('META - SINGLE - Show date?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 11,
	) );
	
	//single categories
	$wp_customize->add_setting( 'single_categories', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//single categories
	$wp_customize->add_control( 'single_categories', array(
	    'label' => __('META - SINGLE - Show tags?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 12,
	) );
	
	//single comments
	$wp_customize->add_setting( 'single_comments', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//single comments
	$wp_customize->add_control( 'single_comments', array(
	    'label' => __('META - SINGLE - Show comments?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'blog_settings',
	    'priority'       => 13,
	) );
	
	
///////////////////////////////////////
//     PORTFOLIO SECTION            //
/////////////////////////////////////
	
	//CREATE CUSTOM STYLING SUBSECTION
	$wp_customize->add_section( 'portfolio_settings', array(
		'title'          => 'Portfolio Settings',
		'priority'       => 36,
	) ); 
	
	//portfolio posts
	$wp_customize->add_setting( 'portfolio_posts_per_page', array(
	    'default'        => "16",
	    'type' => 'option'
	) );
	
	//portfolio posts
	$wp_customize->add_control( 'portfolio_posts_per_page', array(
	    'label'   => __('GLOBAL - Posts Per Page for Portfolio', 'other'),
	    'type' => 'text',
	    'section' => 'portfolio_settings',
	    'priority' => 5
	) );
	
	//portfolio posts
	$wp_customize->add_setting( 'portfolio_details_title', array(
	    'default'        => "Portfolio Details",
	    'type' => 'option'
	) );
	
	//portfolio posts
	$wp_customize->add_control( 'portfolio_details_title', array(
	    'label'   => __('SINGLE - Title For Prject Details', 'other'),
	    'type' => 'text',
	    'section' => 'portfolio_settings',
	    'priority' => 5
	) );
	
	//portfolio columns
	$wp_customize->add_setting('portfolio_layout', array(
	    'default'  => 'masonry',
	    'type' => 'option'
	));
	
	//portfolio columns
	$wp_customize->add_control( 'portfolio_layout', array(
	    'label'   => __('ARCHIVE - Portfolio Layout', 'other'),
	    'section' => 'portfolio_settings',
	    'type'    => 'select',
	    'priority' => 7,
	    'choices'    => array(
	    	'masonry' => 'Masonry',
	    	'vertical' => 'Vertical',
	    	'horizontal' => 'Horizontal',
	    	'lightbox' => 'Lightbox',
	    )
	));
	
	//index categories
	$wp_customize->add_setting( 'display_portfolio_meta', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//index categories
	$wp_customize->add_control( 'display_portfolio_meta', array(
	    'label' => __('SINGLE - Display Additional Details on Posts?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//index categories
	$wp_customize->add_setting( 'portfolio_animate', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//index categories
	$wp_customize->add_control( 'portfolio_animate', array(
	    'label' => __('GLOBAL - Animate Hovers on Vertical and Horizontal Layouts?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	
	//index categories
	$wp_customize->add_setting( 'portfolio_index_categories', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//index categories
	$wp_customize->add_control( 'portfolio_index_categories', array(
	    'label' => __('META - INDEX - Show categories?', 'other'),
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio date
	$wp_customize->add_setting( 'portfolio_date', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//portfolio date
	$wp_customize->add_control( 'portfolio_date', array(
	    'label' => 'META - SINGLE - Show project date?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio categories
	$wp_customize->add_setting( 'portfolio_categories', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//portfolio categories
	$wp_customize->add_control( 'portfolio_categories', array(
	    'label' => 'META - SINGLE - Show project categories?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio client
	$wp_customize->add_setting( 'portfolio_client', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//portfolio client
	$wp_customize->add_control( 'portfolio_client', array(
	    'label' => 'META - SINGLE - Show project client?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio url
	$wp_customize->add_setting( 'portfolio_comments', array(
	    'default' => 0,
	    'type' => 'option'
	) );
	
	//portfolio url
	$wp_customize->add_control( 'portfolio_comments', array(
	    'label' => 'COMMENTS - SINGLE - Enable comments on portfolio?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );
	
	//portfolio url
	$wp_customize->add_setting( 'portfolio_url', array(
	    'default' => 1,
	    'type' => 'option'
	) );
	
	//portfolio url
	$wp_customize->add_control( 'portfolio_url', array(
	    'label' => 'META - SINGLE - Show project URL?',
	    'type' => 'checkbox',
	    'section' => 'portfolio_settings',
	) );

///////////////////////////////////////
//     COLOURS SECTION              //
/////////////////////////////////////

//wrapper colour
$wp_customize->add_setting('wrapper_background', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

//wrapper colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrapper_background', array(
    'label'    => __('GLOBAL - Page Background (Light)', 'other'),
    'section'  => 'colors',
)));

//highlight colour
$wp_customize->add_setting('highlight_colour', array(
    'default'           => '#e74c3c',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

//highlight colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_colour', array(
    'label'    => __('GLOBAL - Highlight Colour', 'other'),
    'section'  => 'colors',
)));

//highlight colour
$wp_customize->add_setting('highlight_hover_colour', array(
    'default'           => '#c0392b',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

//highlight colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_hover_colour', array(
    'label'    => __('GLOBAL - Highlight Hover Colour', 'other'),
    'section'  => 'colors',
)));

//text colour
$wp_customize->add_setting('text_colour', array(
    'default'           => '#444444',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

//text colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_colour', array(
    'label'    => __('GLOBAL - Text Colour', 'other'),
    'section'  => 'colors',
)));

//text colour
$wp_customize->add_setting('hover_background', array(
    'default'           => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

//text colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'hover_background', array(
    'label'    => __('GLOBAL - Image Hover Background Colour', 'other'),
    'section'  => 'colors',
)));

//text colour
$wp_customize->add_setting('hover_background_text', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

//text colour
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'hover_background_text', array(
    'label'    => __('GLOBAL - Image Hover Background Text Colour', 'other'),
    'section'  => 'colors',
)));


///////////////////////////////////////
//     CUSTOM LOGO SECTION          //
/////////////////////////////////////
	
	//CREATE CUSTOM LOGO SUBSECTION
	$wp_customize->add_section( 'custom_logo_section', array(
		'title'          => 'Custom Logo',
		'priority'       => 30,
	) );

	//CUSTOM LOGO SETTINGS
    $wp_customize->add_setting('custom_logo', array(
        'default'           => '',
        'type' => 'option'

    ));
	
	//CUSTOM LOGO
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
        'label'    => __('Custom Logo Upload', 'other'),
        'section'  => 'custom_logo_section'
    )));
    
    //CUSTOM RETINA LOGO SETTINGS
    $wp_customize->add_setting('custom_logo_retina', array(
        'default'           => '',
        'type' => 'option'

    ));
	
	//CUSTOM RETINA LOGO
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo_retina', array(
        'label'    => __('Retina Logo - Needs @2x on the file e.g logo@2x.png', 'other'),
        'section'  => 'custom_logo_section'
    )));
    
    //logo alt text
    $wp_customize->add_setting( 'custom_logo_alt_text', array(
        'default'        => 'Alt Text',
        'type' => 'option'
    ) );
    
    //logo alt text
    $wp_customize->add_control( 'custom_logo_alt_text', array(
        'label' => __('Custom Logo Alt Text', 'other'),
        'type' => 'text',
        'section' => 'custom_logo_section',
    ) );
    
    //small LOGO SETTINGS
    $wp_customize->add_setting('small_logo', array(
        'default'           => '',
        'type' => 'option'
    ));
	
	//SMALL LOGO
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'small_logo', array(
        'label'    => __('Small logo for mobile', 'other'),
        'section'  => 'custom_logo_section'
    )));
    
    //small LOGO SETTINGS
    $wp_customize->add_setting('small_logo_retina', array(
        'default'           => '',
        'type' => 'option'
    ));
    
    //SMALL LOGO
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'small_logo_retina', array(
        'label'    => __('Small logo mobile retina - Needs @2x on the file e.g logo@2x.png', 'other'),
        'section'  => 'custom_logo_section'
    )));

///////////////////////////////////////
//     CUSTOM FAVICON SECTION       //
/////////////////////////////////////
	

	//CUSTOM FAVICON SETTINGS
    $wp_customize->add_setting('custom_favicon', array(
        'default'           => '',
        'type' => 'option'

    ));
	
	//CUSTOM FAVICON
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_favicon', array(
        'label'    => __('Custom Favicon Upload', 'other'),
        'section'  => 'title_tagline',
        'settings' => 'custom_favicon',
        'priority'       => 21,
    )));
    
    //CUSTOM FAVICON SETTINGS
        $wp_customize->add_setting('mobile_favicon', array(
            'default'           => '',
            'type' => 'option'
    
        ));
    	
    	//CUSTOM FAVICON
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mobile_favicon', array(
            'label'    => __('Non-Retina Mobile Favicon Upload', 'other'),
            'section'  => 'title_tagline',
            'settings' => 'mobile_favicon',
            'priority'       => 22,
        )));
        
    //CUSTOM FAVICON SETTINGS
        $wp_customize->add_setting('72_favicon', array(
            'default'           => '',
            'type' => 'option'
    
        ));
    	
    	//CUSTOM FAVICON
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '72_favicon', array(
            'label'    => __('1st & 2nd Generation iPad Favicon (72x72px)', 'other'),
            'section'  => 'title_tagline',
            'settings' => '72_favicon',
            'priority'       => 23,
        )));
   
   //CUSTOM FAVICON SETTINGS
       $wp_customize->add_setting('114_favicon', array(
           'default'           => '',
           'type' => 'option'
       ));
   	
   	//CUSTOM FAVICON
       $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '114_favicon', array(
           'label'    => __('Retina iPhone Favicon (114x114px)', 'other'),
           'section'  => 'title_tagline',
           'settings' => '114_favicon',
           'priority'       => 24,
       )));

//CUSTOM FAVICON SETTINGS
    $wp_customize->add_setting('144_favicon', array(
        'default'           => '',
        'type' => 'option'
    ));
	
	//CUSTOM FAVICON
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, '144_favicon', array(
        'label'    => __('Retina iPad Favicon (144x144px)', 'other'),
        'section'  => 'title_tagline',
        'settings' => '144_favicon',
        'priority'       => 25,
    )));
   
   ///////////////////////////////////////
   //     CUSTOM CSS SECTION           //
   /////////////////////////////////////
   	
   	//CREATE CUSTOM CSS SUBSECTION
   	$wp_customize->add_section( 'custom_css_section', array(
   		'title'          => 'Custom CSS',
   		'priority'       => 200,
   	) ); 
      
      $wp_customize->add_setting( 'custom_css', array(
          'default'        => '',
          'type'           => 'option',
      ) );
       
      $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'custom_css', array(
          'label'   => __('Custom CSS', 'other'),
          'section' => 'custom_css_section',
          'settings'   => 'custom_css',
      ) ) );
      
      
  ///////////////////////////////////////
  //     TEAM SECTION            //
  /////////////////////////////////////
  	
  	//CREATE CUSTOM STYLING SUBSECTION
  	$wp_customize->add_section( 'team_settings', array(
  		'title'          => 'Team Settings',
  		'priority'       => 36,
  	) ); 
  	
  	//portfolio columns
  	$wp_customize->add_setting('team_layout', array(
  	    'default'  => 'masonry',
  	    'type' => 'option'
  	));
  	
  	//portfolio columns
  	$wp_customize->add_control( 'team_layout', array(
  	    'label'   => __('ARCHIVE - Team Layout', 'other'),
  	    'section' => 'team_settings',
  	    'type'    => 'select',
  	    'priority' => 7,
  	    'choices'    => array(
  	    	'masonry' => 'Masonry',
  	    	'vertical' => 'Vertical',
  	    	'horizontal' => 'Horizontal',
  	    )
  	));
   
}

?>