<?php
/* 
Plugin Name: WP Google Fonts
Plugin URI: http://adrian3.com/projects/wordpress-plugins/wordpress-google-fonts-plugin/
Version: v1.8
Author: <a href="http://adrian3.com/">Adrian3</a>
Description: The Wordpress Google Fonts Plugin makes it even easier to add and customize Google fonts on your site through Wordpress. 
Author: Adrian Hanft
Author URI: http://adrian3.com/projects/wordpress-plugins/
*/

/*  Copyright 2010  Adrian Hanft

* Licensed under the Apache License, Version 2.0 (the "License")
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/

// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );


if (!class_exists('googlefonts')) {
    class googlefonts {
        //This is where the class variables go, don't forget to use @var to tell what they're for
        /**
        * @var string The options string name for this plugin
        */
        var $optionsName = 'googlefonts_options';
        
        /**
        * @var string $localizationDomain Domain used for localization
        */
        var $localizationDomain = "googlefonts";
        
        /**
        * @var string $pluginurl The path to this plugin
        */ 
        var $thispluginurl = '';
        /**
        * @var string $pluginurlpath The path to this plugin
        */
        var $thispluginpath = '';
            
        /**
        * @var array $options Stores the options for this plugin
        */
        var $options = array();
        
        //Class Functions
        /**
        * PHP 4 Compatible Constructor
        */
        function googlefonts(){$this->__construct();}
        
        /**
        * PHP 5 Constructor
        */        
        function __construct(){
            //Language Setup
            $locale = get_locale();
            $mo = dirname(__FILE__) . "/languages/" . $this->localizationDomain . "-".$locale.".mo";
            load_textdomain($this->localizationDomain, $mo);

            //"Constants" setup
            $this->thispluginurl = PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)).'/';
            $this->thispluginpath = PLUGIN_PATH . '/' . dirname(plugin_basename(__FILE__)).'/';
            
            //Initialize the options
            //This is REQUIRED to initialize the options when the plugin is loaded!
            $this->getOptions();
            
            //Actions        
            add_action("admin_menu", array(&$this,"admin_menu_link"));
            add_action("wp_head", array(&$this,"googlefontsstart"));
            add_action("wp_head", array(&$this,"addgooglefontscss"));            

            /*
            add_action("wp_head", array(&$this,"add_css"));
            add_action('wp_print_scripts', array(&$this, 'add_js'));
            */
            
            //Filters
            /*
            add_filter('the_content', array(&$this, 'filter_content'), 0);
            */
        }
        
        
        
 function googlefontsstart() {
echo '

<!-- Google Fonts -->
';

// Allan
if ($this->options['googlefonts_font1'] == 'Allan') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allan:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Allan') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allan:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Allan') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allan:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Allan') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allan:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Allan') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allan:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Allan') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allan:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Allerta
if ($this->options['googlefonts_font1'] == 'Allerta') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Allerta') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Allerta') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Allerta') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Allerta') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Allerta') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Allerta Stencil
if ($this->options['googlefonts_font1'] == 'Allerta Stencil') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta+Stencil\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Allerta Stencil') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta+Stencil\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Allerta Stencil') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta+Stencil\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Allerta Stencil') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta+Stencil\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Allerta Stencil') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta+Stencil\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Allerta Stencil') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Allerta+Stencil\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Anonymous Pro
if ($this->options['googlefonts_font1'] == 'Anonymous Pro') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Anonymous Pro') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Anonymous Pro') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Anonymous Pro') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Anonymous Pro') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Anonymous Pro') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Anonymous Pro:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Anonymous Pro:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Anonymous Pro:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Anonymous Pro:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Anonymous Pro:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Anonymous Pro:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Anonymous+Pro:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Arimo
if ($this->options['googlefonts_font1'] == 'Arimo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Arimo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Arimo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Arimo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Arimo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Arimo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Arimo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Arimo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Arimo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Arimo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Arimo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Arimo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Arvo
if ($this->options['googlefonts_font1'] == 'Arvo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Arvo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Arvo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Arvo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Arvo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Arvo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Arvo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Arvo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Arvo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Arvo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Arvo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Arvo:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Bentham
if ($this->options['googlefonts_font1'] == 'Bentham') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Bentham\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Bentham') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Bentham\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Bentham') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Bentham\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Bentham') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Bentham\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Bentham') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Bentham\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Bentham') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Bentham\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Buda Light
if ($this->options['googlefonts_font1'] == 'Buda:light') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Buda:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Buda:light') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Buda:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Buda:light') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Buda:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Buda:light') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Buda:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Buda:light') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Buda:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Buda:light') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Buda:light\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Cabin
if ($this->options['googlefonts_font1'] == 'Cabin') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cabin:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cabin') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cabin:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cabin') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cabin:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cabin') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cabin:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cabin') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cabin:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cabin') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cabin:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Calligraffitti
if ($this->options['googlefonts_font1'] == 'Calligraffitti') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Calligraffitti\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Calligraffitti') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Calligraffitti\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Calligraffitti') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Calligraffitti\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Calligraffitti') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Calligraffitti\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Calligraffitti') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Calligraffitti\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Calligraffitti') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Calligraffitti\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Cantarell
if ($this->options['googlefonts_font1'] == 'Cantarell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cantarell') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cantarell') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cantarell') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cantarell') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cantarell') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Cantarell:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cantarell:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cantarell:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cantarell:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cantarell:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cantarell:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Cardo
if ($this->options['googlefonts_font1'] == 'Cardo') 							{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cardo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cardo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cardo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cardo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cardo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Cherry Cream Soda
if ($this->options['googlefonts_font1'] == 'Cherry Cream Soda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cherry+Cream+Soda\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cherry Cream Soda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cherry+Cream+Soda\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cherry Cream Soda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cherry+Cream+Soda\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cherry Cream Soda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cherry+Cream+Soda\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cherry Cream Soda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cherry+Cream+Soda\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cherry Cream Soda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cherry+Cream+Soda\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Chewy
if ($this->options['googlefonts_font1'] == 'Chewy') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Chewy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Chewy') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Chewy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Chewy') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Chewy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Chewy') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Chewy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Chewy') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Chewy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Chewy') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Chewy\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Coda
if ($this->options['googlefonts_font1'] == 'Coda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coda:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Coda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coda:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Coda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coda:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Coda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coda:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Coda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coda:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Coda') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coda:800\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Coming Soon
if ($this->options['googlefonts_font1'] == 'Coming Soon') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coming+Soon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Coming Soon') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coming+Soon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Coming Soon') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coming+Soon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Coming Soon') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coming+Soon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Coming Soon') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coming+Soon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Coming Soon') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Coming+Soon\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Copse
if ($this->options['googlefonts_font1'] == 'Copse') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Copse\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Copse') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Copse\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Copse') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Copse\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Copse') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Copse\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Copse') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Copse\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Copse') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Copse\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Corben Bold
if ($this->options['googlefonts_font1'] == 'Corben:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Corben:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Corben:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Corben:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Corben:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Corben:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Corben:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Corben:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Corben:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Corben:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Corben:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Corben:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Cousine
if ($this->options['googlefonts_font1'] == 'Cousine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cousine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cousine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cousine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cousine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cousine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Cousine:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cousine:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cousine:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cousine:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cousine:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cousine:regular,italic,bold,bolditalic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cousine:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Crafty Girls
if ($this->options['googlefonts_font1'] == 'Crafty Girls') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crafty+Girls\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Crafty Girls') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crafty+Girls\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Crafty Girls') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crafty+Girls\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Crafty Girls') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crafty+Girls\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Crafty Girls') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crafty+Girls\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Crafty Girls') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crafty+Girls\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Crimson Text
if ($this->options['googlefonts_font1'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Crushed
if ($this->options['googlefonts_font1'] == 'Crushed') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crushed\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Crushed') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crushed\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Crushed') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crushed\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Crushed') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crushed\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Crushed') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crushed\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Crushed') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crushed\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Covered By Your Grace
if ($this->options['googlefonts_font1'] == 'Covered By Your Grace') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Covered By Your Grace') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Covered By Your Grace') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Covered By Your Grace') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Covered By Your Grace') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Covered By Your Grace') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Covered+By+Your+Grace\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Cuprum
if ($this->options['googlefonts_font1'] == 'Cuprum') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cuprum\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Cuprum') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cuprum\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Cuprum') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cuprum\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Cuprum') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cuprum\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Cuprum') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cuprum\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Cuprum') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cuprum\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Droid Sans
if ($this->options['googlefonts_font1'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Droid Sans:regular,bold') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Droid Sans:regular,bold') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Droid Sans:regular,bold') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Droid Sans:regular,bold') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Droid Sans:regular,bold') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Droid Sans:regular,bold') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Droid Sans Mono
if ($this->options['googlefonts_font1'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Droid Serif
if ($this->options['googlefonts_font1'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Droid Serif:regular,italic,bold,bolditalic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid Serif:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Droid Serif:regular,italic,bold,bolditalic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid Serif:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Droid Serif:regular,italic,bold,bolditalic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid Serif:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Droid Serif:regular,italic,bold,bolditalic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid Serif:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Droid Serif:regular,italic,bold,bolditalic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid Serif:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Droid Serif:regular,italic,bold,bolditalic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid Serif:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Fontdiner Swanky
if ($this->options['googlefonts_font1'] == 'Fontdiner Swanky') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Fontdiner+Swanky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Fontdiner Swanky') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Fontdiner+Swanky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Fontdiner Swanky') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Fontdiner+Swanky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Fontdiner Swanky') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Fontdiner+Swanky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Fontdiner Swanky') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Fontdiner+Swanky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Fontdiner Swanky') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Fontdiner+Swanky\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Geo
if ($this->options['googlefonts_font1'] == 'Geo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Geo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Geo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Geo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Geo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Geo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Geo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Geo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Geo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Geo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Geo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Geo\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Gruppo
if ($this->options['googlefonts_font1'] == 'Gruppo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Gruppo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Gruppo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Gruppo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Gruppo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Gruppo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Gruppo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Gruppo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Gruppo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Gruppo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Gruppo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Gruppo\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Homemade Apple
if ($this->options['googlefonts_font1'] == 'Homemade Apple') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Homemade+Apple\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Homemade Apple') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Homemade+Apple\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Homemade Apple') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Homemade+Apple\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Homemade Apple') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Homemade+Apple\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Homemade Apple') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Homemade+Apple\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Homemade Apple') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Homemade+Apple\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Inconsolata
if ($this->options['googlefonts_font1'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\' />'; }

// IM Fell DW Pica
if ($this->options['googlefonts_font1'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell DW Pica:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell DW Pica:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell DW Pica:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell DW Pica:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell DW Pica:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell DW Pica:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell Double Pica:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Double Pica:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Double Pica:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Double Pica:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Double Pica:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Double Pica:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell English:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell English:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell English:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell English:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell English:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell English:regular,italic') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell French Canon:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell French Canon:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell French Canon:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell French Canon:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell French Canon:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell French Canon:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell Great Primer:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Great Primer:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Great Primer:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Great Primer:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Great Primer:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Great Primer:regular,italic') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Irish Growler
if ($this->options['googlefonts_font1'] == 'Irish Growler') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Irish+Growler\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Irish Growler') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Irish+Growler\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Irish Growler') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Irish+Growler\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Irish Growler') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Irish+Growler\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Irish Growler') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Irish+Growler\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Irish Growler') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Irish+Growler\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Sans:100
if ($this->options['googlefonts_font1'] == 'Josefin Sans:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Sans:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Sans:light
if ($this->options['googlefonts_font1'] == 'Josefin Sans:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Sans:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Sans Regular
if ($this->options['googlefonts_font1'] == 'Josefin Sans') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Sans:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Sans:600
if ($this->options['googlefonts_font1'] == 'Josefin Sans:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Sans:600,600italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:600,600italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:600,600italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:600,600italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:600,600italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:600,600italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Sans Bold 700
if ($this->options['googlefonts_font1'] == 'Josefin Sans:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Sans:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Slab:100
if ($this->options['googlefonts_font1'] == 'Josefin Slab:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Slab:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:100,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Slab:light
if ($this->options['googlefonts_font1'] == 'Josefin Slab:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Slab:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:light,lightitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:light,lightitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Slab Regular
if ($this->options['googlefonts_font1'] == 'Josefin Slab') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Slab:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:regular,regularitalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Slab:600
if ($this->options['googlefonts_font1'] == 'Josefin Slab:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:600') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Slab:600,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:600,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:600,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:600,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:600,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:600,100italic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:600,600italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Josefin Slab Bold
if ($this->options['googlefonts_font1'] == 'Josefin Slab:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Josefin Slab:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Josefin Slab:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Josefin Slab:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Josefin Slab:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Josefin Slab:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Josefin Slab:bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Slab:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Just Another Hand
if ($this->options['googlefonts_font1'] == 'Just Another Hand') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Another+Hand\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Just Another Hand') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Another+Hand\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Just Another Hand') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Another+Hand\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Just Another Hand') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Another+Hand\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Just Another Hand') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Another+Hand\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Just Another Hand') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Another+Hand\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Just Me Again Down Here
if ($this->options['googlefonts_font1'] == 'Just Me Again Down Here') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Just Me Again Down Here') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Just Me Again Down Here') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Just Me Again Down Here') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Just Me Again Down Here') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Just Me Again Down Here') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Kenia
if ($this->options['googlefonts_font1'] == 'Kenia') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kenia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Kenia') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kenia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Kenia') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kenia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Kenia') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kenia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Kenia') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kenia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Kenia') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kenia\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Kranky
if ($this->options['googlefonts_font1'] == 'Kranky') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kranky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Kranky') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kranky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Kranky') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kranky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Kranky') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kranky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Kranky') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kranky\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Kranky') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kranky\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Kristi
if ($this->options['googlefonts_font1'] == 'Kristi') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kristi\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Kristi') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kristi\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Kristi') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kristi\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Kristi') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kristi\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Kristi') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kristi\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Kristi') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Kristi\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato 100
if ($this->options['googlefonts_font1'] == 'Lato:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato 100 plus italic
if ($this->options['googlefonts_font1'] == 'Lato:100,100italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:100,100italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:100,100italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:100,100italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:100,100italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:100,100italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato Light
if ($this->options['googlefonts_font1'] == 'Lato:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:light\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:light') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:light\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato Light plus italic
if ($this->options['googlefonts_font1'] == 'Lato:light,lightitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:light,lightitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:light,lightitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:light,lightitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:light,lightitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:light,lightitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:100,100italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato Regular
if ($this->options['googlefonts_font1'] == 'Lato:regular') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:regular') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:regular') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:regular') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:regular') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:regular') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato Regular plus italic
if ($this->options['googlefonts_font1'] == 'Lato:regular,regularitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:regular,regularitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:regular,regularitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:regular,regularitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:regular,regularitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:regular,regularitalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:regular,regularitalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato Bold
if ($this->options['googlefonts_font1'] == 'Lato:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:bold') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato Bold plus italic
if ($this->options['googlefonts_font1'] == 'Lato:bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato 900
if ($this->options['googlefonts_font1'] == 'Lato:900') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:900') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:900') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:900') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:900') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:900') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lato 900 plus italic
if ($this->options['googlefonts_font1'] == 'Lato:900,900italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900,900italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lato:900,900italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900,900italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lato:900,900italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900,900italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lato:900,900italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900,900italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lato:900,900italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900,900italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lato:900,900italic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lato:900,900italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lekton
if ($this->options['googlefonts_font1'] == 'Lekton') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lekton') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lekton') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lekton') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lekton') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lekton') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lekton bold, italic, bold italic
if ($this->options['googlefonts_font1'] == 'Lekton:regular,italic,bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lekton:regular,italic,bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lekton:regular,italic,bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lekton:regular,italic,bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lekton:regular,italic,bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lekton:regular,italic,bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lekton:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Lobster
if ($this->options['googlefonts_font1'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Luckiest Guy
if ($this->options['googlefonts_font1'] == 'Luckiest Guy') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Luckiest+Guy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Luckiest Guy') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Luckiest+Guy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Luckiest Guy') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Luckiest+Guy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Luckiest Guy') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Luckiest+Guy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Luckiest Guy') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Luckiest+Guy\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Luckiest Guy') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Luckiest+Guy\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Maiden Orange
if ($this->options['googlefonts_font1'] == 'Maiden Orange') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Maiden+Orange\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Maiden Orange') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Maiden+Orange\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Maiden Orange') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Maiden+Orange\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Maiden Orange') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Maiden+Orange\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Maiden Orange') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Maiden+Orange\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Maiden Orange') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Maiden+Orange\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Merriweather
if ($this->options['googlefonts_font1'] == 'Merriweather') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Merriweather\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Merriweather') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Merriweather\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Merriweather') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Merriweather\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Merriweather') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Merriweather\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Merriweather') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Merriweather\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Merriweather') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Merriweather\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Molengo
if ($this->options['googlefonts_font1'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Mountains of Christmas
if ($this->options['googlefonts_font1'] == 'Mountains of Christmas') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Mountains+of+Christmas\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Mountains of Christmas') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Mountains+of+Christmas\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Mountains of Christmas') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Mountains+of+Christmas\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Mountains of Christmas') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Mountains+of+Christmas\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Mountains of Christmas') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Mountains+of+Christmas\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Mountains of Christmas') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Mountains+of+Christmas\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Neucha
if ($this->options['googlefonts_font1'] == 'Neucha') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neucha\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Neucha') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neucha\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Neucha') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neucha\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Neucha') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neucha\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Neucha') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neucha\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Neucha') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neucha\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Neuton
if ($this->options['googlefonts_font1'] == 'Neuton') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neuton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Neuton') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neuton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Neuton') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neuton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Neuton') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neuton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Neuton') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neuton\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Neuton') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Neuton\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Nobile
if ($this->options['googlefonts_font1'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Nobile:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Nobile:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Nobile:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Nobile:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Nobile:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Nobile:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// OFL Sorts Mill Goudy TT
if ($this->options['googlefonts_font1'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'OFL Sorts Mill Goudy TT:regular,italic') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL Sorts Mill Goudy TT:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'OFL Sorts Mill Goudy TT:regular,italic') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL Sorts Mill Goudy TT:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'OFL Sorts Mill Goudy TT:regular,italic') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL Sorts Mill Goudy TT:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'OFL Sorts Mill Goudy TT:regular,italic') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL Sorts Mill Goudy TT:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'OFL Sorts Mill Goudy TT:regular,italic') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL Sorts Mill Goudy TT:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'OFL Sorts Mill Goudy TT:regular,italic') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL Sorts Mill Goudy TT:regular,italic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Old Standard
if ($this->options['googlefonts_font1'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Old Standard TT:regular,italic,bold') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old Standard TT:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Old Standard TT:regular,italic,bold') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old Standard TT:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Old Standard TT:regular,italic,bold') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old Standard TT:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Old Standard TT:regular,italic,bold') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old Standard TT:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Old Standard TT:regular,italic,bold') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old Standard TT:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Old Standard TT:regular,italic,bold') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old Standard TT:regular,italic,bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Orbitron
if ($this->options['googlefonts_font1'] == 'Orbitron') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Orbitron') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Orbitron') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Orbitron') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Orbitron') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Orbitron') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Orbitron 500
if ($this->options['googlefonts_font1'] == 'Orbitron:500') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:500\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Orbitron:500') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:500\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Orbitron:500') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:500\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Orbitron:500') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:500\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Orbitron:500') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:500\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Orbitron:500') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:500\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Orbitron Bold
if ($this->options['googlefonts_font1'] == 'Orbitron:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Orbitron:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Orbitron:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Orbitron:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Orbitron:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Orbitron:bold') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Orbitron 900
if ($this->options['googlefonts_font1'] == 'Orbitron:900') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Orbitron:900') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Orbitron:900') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Orbitron:900') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Orbitron:900') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:900\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Orbitron:900') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Orbitron:900\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Permanent Marker
if ($this->options['googlefonts_font1'] == 'Permanent Marker') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Permanent+Marker\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Permanent Marker') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Permanent+Marker\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Permanent Marker') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Permanent+Marker\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Permanent Marker') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Permanent+Marker\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Permanent Marker') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Permanent+Marker\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Permanent Marker') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Permanent+Marker\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Philosopher
if ($this->options['googlefonts_font1'] == 'Philosopher') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Philosopher\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Philosopher') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=Philosopher\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Philosopher') 		  	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Philosopher\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Philosopher') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Philosopher\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Philosopher') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Philosopher\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Philosopher') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Philosopher\' rel=\'stylesheet\' type=\'text/css\' />'; }

// PT Sans
if ($this->options['googlefonts_font1'] == 'PT Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'PT Sans') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'PT Sans') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'PT Sans') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'PT Sans') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'PT Sans') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'PT Sans:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'PT Sans:regular,italic,bold,bolditalic') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'PT Sans:regular,italic,bold,bolditalic') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'PT Sans:regular,italic,bold,bolditalic') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'PT Sans:regular,italic,bold,bolditalic') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'PT Sans:regular,italic,bold,bolditalic') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'PT Sans Caption') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'PT Sans Caption') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'PT Sans Caption') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'PT Sans Caption') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'PT Sans Caption') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'PT Sans Caption') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'PT Sans Caption:regular,bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'PT Sans Caption:regular,bold') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'PT Sans Caption:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'PT Sans Caption:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'PT Sans Caption:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'PT Sans Caption:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Caption:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'PT Sans Narrow') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'PT Sans Narrow') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'PT Sans Narrow') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'PT Sans Narrow') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'PT Sans Narrow') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'PT Sans Narrow') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'PT Sans Narrow:regular,bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'PT Sans Narrow:regular,bold') 			  { echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'PT Sans Narrow:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'PT Sans Narrow:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'PT Sans Narrow:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'PT Sans Narrow:regular,bold') 	  		{ echo '<link href=\'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:Bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Puritan
if ($this->options['googlefonts_font1'] == 'Puritan') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Puritan') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Puritan') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Puritan') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Puritan') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Puritan') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Puritan:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Puritan:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Puritan:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Puritan:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Puritan:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Puritan:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Puritan:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Raleway
if ($this->options['googlefonts_font1'] == 'Raleway:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Raleway:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Raleway:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Raleway:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Raleway:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Raleway:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Raleway:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Raleway:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Raleway:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Raleway:100\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Raleway:100') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Raleway:100\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Reenie Beanie
if ($this->options['googlefonts_font1'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Rock Salt
if ($this->options['googlefonts_font1'] == 'Rock Salt') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Rock+Salt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Rock Salt') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Rock+Salt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Rock Salt') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Rock+Salt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Rock Salt') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Rock+Salt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Rock Salt') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Rock+Salt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Rock Salt') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Rock+Salt\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Schoolbell
if ($this->options['googlefonts_font1'] == 'Schoolbell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Schoolbell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Schoolbell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Schoolbell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Schoolbell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Schoolbell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Schoolbell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Schoolbell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Schoolbell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Schoolbell\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Schoolbell') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Schoolbell\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Slackey
if ($this->options['googlefonts_font1'] == 'Slackey') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Slackey\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Slackey') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Slackey\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Slackey') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Slackey\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Slackey') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Slackey\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Slackey') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Slackey\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Slackey') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Slackey\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Sniglet
if ($this->options['googlefonts_font1'] == 'Sniglet:800') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sniglet:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Sniglet:800') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sniglet:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Sniglet:800') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sniglet:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Sniglet:800') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sniglet:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Sniglet:800') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sniglet:800\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Sniglet:800') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sniglet:800\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Sunshiney
if ($this->options['googlefonts_font1'] == 'Sunshiney') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sunshiney\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Sunshiney') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sunshiney\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Sunshiney') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sunshiney\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Sunshiney') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sunshiney\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Sunshiney') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sunshiney\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Sunshiney') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Sunshiney\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Syncopate
if ($this->options['googlefonts_font1'] == 'Syncopate') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Syncopate\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Syncopate') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Syncopate\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Syncopate') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Syncopate\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Syncopate') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Syncopate\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Syncopate') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Syncopate\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Syncopate') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Syncopate\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Tangerine
if ($this->options['googlefonts_font1'] == 'Tangerine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Tinos
if ($this->options['googlefonts_font1'] == 'Tinos') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Tinos') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Tinos') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Tinos') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Tinos') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Tinos') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Tinos:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Tinos:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Tinos:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Tinos:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Tinos:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Tinos:regular,italic,bold,bolditalic') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tinos:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Ubuntu
if ($this->options['googlefonts_font1'] == 'Ubuntu') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Ubuntu') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Ubuntu') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Ubuntu') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Ubuntu') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Ubuntu') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Ubuntu:regular,italic,bold,bolditalic
if ($this->options['googlefonts_font1'] == 'Ubuntu:regular,italic,bold,bolditalic') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Ubuntu:regular,italic,bold,bolditalic') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Ubuntu:regular,italic,bold,bolditalic') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Ubuntu:regular,italic,bold,bolditalic') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Ubuntu:regular,italic,bold,bolditalic') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Ubuntu:regular,italic,bold,bolditalic') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// UnifrakturCook
if ($this->options['googlefonts_font1'] == 'UnifrakturCook:bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturCook:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'UnifrakturCook:bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturCook:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'UnifrakturCook:bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturCook:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'UnifrakturCook:bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturCook:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'UnifrakturCook:bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturCook:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'UnifrakturCook:bold') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturCook:bold\' rel=\'stylesheet\' type=\'text/css\' />'; }

// UnifrakturMaguntia
if ($this->options['googlefonts_font1'] == 'UnifrakturMaguntia') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturMaguntia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'UnifrakturMaguntia') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturMaguntia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'UnifrakturMaguntia') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturMaguntia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'UnifrakturMaguntia') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturMaguntia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'UnifrakturMaguntia') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturMaguntia\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'UnifrakturMaguntia') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=UnifrakturMaguntia\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Unkempt
if ($this->options['googlefonts_font1'] == 'Unkempt') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Unkempt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Unkempt') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Unkempt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Unkempt') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Unkempt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Unkempt') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Unkempt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Unkempt') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Unkempt\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Unkempt') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Unkempt\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Vibur
if ($this->options['googlefonts_font1'] == 'Vibur') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vibur\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Vibur') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vibur\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Vibur') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vibur\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Vibur') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vibur\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Vibur') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vibur\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Vibur') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vibur\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Vollkorn
if ($this->options['googlefonts_font1'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Vollkorn:regular,italic,bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Vollkorn:regular,italic,bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Vollkorn:regular,italic,bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Vollkorn:regular,italic,bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Vollkorn:regular,italic,bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Vollkorn:regular,italic,bold,bolditalic') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Walter Turncoat
if ($this->options['googlefonts_font1'] == 'Walter Turncoat') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Walter+Turncoat\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Walter Turncoat') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Walter+Turncoat\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Walter Turncoat') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Walter+Turncoat\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Walter Turncoat') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Walter+Turncoat\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Walter Turncoat') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Walter+Turncoat\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Walter Turncoat') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Walter+Turncoat\' rel=\'stylesheet\' type=\'text/css\' />'; }

// Yanone Kaffeesatz
if ($this->options['googlefonts_font1'] == 'Yanone Kaffeesatz') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Yanone Kaffeesatz:300') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Yanone Kaffeesatz:300') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Yanone Kaffeesatz:300') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Yanone Kaffeesatz:300') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Yanone Kaffeesatz:300') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Yanone Kaffeesatz:300') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300\' rel=\'stylesheet\' type=\'text/css\' />'; }

if ($this->options['googlefonts_font1'] == 'Yanone Kaffeesatz:400') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Yanone Kaffeesatz:400') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Yanone Kaffeesatz:400') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Yanone Kaffeesatz:400') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Yanone Kaffeesatz:400') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Yanone Kaffeesatz:400') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400\' rel=\'stylesheet\' type=\'text/css\' />'; }


if ($this->options['googlefonts_font1'] == 'Yanone Kaffeesatz:700') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font2'] == 'Yanone Kaffeesatz:700') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font3'] == 'Yanone Kaffeesatz:700') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font4'] == 'Yanone Kaffeesatz:700') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font5'] == 'Yanone Kaffeesatz:700') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700\' rel=\'stylesheet\' type=\'text/css\' />'; }
if ($this->options['googlefonts_font6'] == 'Yanone Kaffeesatz:700') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700\' rel=\'stylesheet\' type=\'text/css\' />'; }




}


function addgooglefontscss() {
	$fullfontname1 = $this->options['googlefonts_font1'];
	$shortfontname1 = explode(":", $fullfontname1);
	$fullfontname2 = $this->options['googlefonts_font2'];
	$shortfontname2 = explode(":", $fullfontname2);
	$fullfontname3 = $this->options['googlefonts_font3'];
	$shortfontname3 = explode(":", $fullfontname3);
	$fullfontname4 = $this->options['googlefonts_font4'];
	$shortfontname4 = explode(":", $fullfontname4);
	$fullfontname5 = $this->options['googlefonts_font5'];
	$shortfontname5 = explode(":", $fullfontname5);
	$fullfontname6 = $this->options['googlefonts_font6'];
	$shortfontname6 = explode(":", $fullfontname6);

	
echo '
<style type="text/css" media="screen">
';

//Google Font #1 Styles:
if ($this->options['googlefont1_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $shortfontname1[0];  echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }                                                                                         
if ($this->options['googlefont1_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }                                                                                         
if ($this->options['googlefont1_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }                                                                                         
if ($this->options['googlefont1_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }                                                                                         
if ($this->options['googlefont1_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_body'] == "checked") { echo 'body 				{ font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_p'] == "checked") { echo 'p 					{ font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $shortfontname1[0]; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont1_css']);

//Google Font #2 Styles:
if ($this->options['googlefont2_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_body'] == "checked") { echo 'body 				{ font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_p'] == "checked") { echo 'p 					{ font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont2_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $shortfontname2[0]; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont2_css']);

//Google Font #3 Styles:
if ($this->options['googlefont3_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_body'] == "checked") { echo 'body 				{ font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_p'] == "checked") { echo 'p 					{ font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont3_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $shortfontname3[0]; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont3_css']);

//Google Font #4 Styles:
if ($this->options['googlefont4_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_body'] == "checked") { echo 'body 				{ font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_p'] == "checked") { echo 'p 					{ font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont4_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $shortfontname4[0]; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont4_css']);

//Google Font #5 Styles:
if ($this->options['googlefont5_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_body'] == "checked") { echo 'body 				{ font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_p'] == "checked") { echo 'p 					{ font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont5_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $shortfontname5[0]; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont5_css']);

//Google Font #6 Styles:
if ($this->options['googlefont6_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_body'] == "checked") { echo 'body 				{ font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_p'] == "checked") { echo 'p 					{ font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont6_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $shortfontname6[0]; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont6_css']);


echo '
</style>
<!-- fonts delivered by Wordpress Google Fonts, a plugin by Adrian3.com -->

';
}








       
        /**
        * Retrieves the plugin options from the database.
        * @return array
        */
        function getOptions() {
            //Don't forget to set up the default options
            if (!$theOptions = get_option($this->optionsName)) {
                $theOptions = array(
	

	
	'googlefonts1_on_off'=>'unchecked',
	'googlefonts2_on_off'=>'unchecked',
	'googlefonts3_on_off'=>'unchecked',
	'googlefonts4_on_off'=>'unchecked',
	'googlefonts5_on_off'=>'unchecked',
	'googlefonts6_on_off'=>'unchecked',	

	'googlefont1_css_on_off'=>'unchecked',
	'googlefont1_css'=>' ',
	'googlefont1_heading1'=>'unchecked',
	'googlefont1_heading2'=>'unchecked',
	'googlefont1_heading3'=>'unchecked',
	'googlefont1_heading4'=>'unchecked',
	'googlefont1_heading5'=>'unchecked',
	'googlefont1_heading6'=>'unchecked',
	'googlefont1_body'=>'unchecked',
	'googlefont1_blockquote'=>'unchecked',
	'googlefont1_p'=>'unchecked',
	'googlefont1_li'=>'unchecked',

	'googlefont2_css_on_off'=>'unchecked',
	'googlefont2_css'=>' ',
	'googlefont2_heading1'=>'unchecked',
	'googlefont2_heading2'=>'unchecked',
	'googlefont2_heading3'=>'unchecked',
	'googlefont2_heading4'=>'unchecked',
	'googlefont2_heading5'=>'unchecked',
	'googlefont2_heading6'=>'unchecked',
	'googlefont2_body'=>'unchecked',
	'googlefont2_blockquote'=>'unchecked',
	'googlefont2_p'=>'unchecked',
	'googlefont2_li'=>'unchecked',	

	'googlefont3_css_on_off'=>'unchecked',
	'googlefont3_css'=>' ',
	'googlefont3_heading1'=>'unchecked',
	'googlefont3_heading2'=>'unchecked',
	'googlefont3_heading3'=>'unchecked',
	'googlefont3_heading4'=>'unchecked',
	'googlefont3_heading5'=>'unchecked',
	'googlefont3_heading6'=>'unchecked',
	'googlefont3_body'=>'unchecked',
	'googlefont3_blockquote'=>'unchecked',
	'googlefont3_p'=>'unchecked',
	'googlefont3_li'=>'unchecked',
	
	'googlefont4_css_on_off'=>'unchecked',
	'googlefont4_css'=>' ',
	'googlefont4_heading1'=>'unchecked',
	'googlefont4_heading2'=>'unchecked',
	'googlefont4_heading3'=>'unchecked',
	'googlefont4_heading4'=>'unchecked',
	'googlefont4_heading5'=>'unchecked',
	'googlefont4_heading6'=>'unchecked',
	'googlefont4_body'=>'unchecked',
	'googlefont4_blockquote'=>'unchecked',
	'googlefont4_p'=>'unchecked',
	'googlefont4_li'=>'unchecked',
	
	'googlefont5_css_on_off'=>'unchecked',
	'googlefont5_css'=>' ',
	'googlefont5_heading1'=>'unchecked',
	'googlefont5_heading2'=>'unchecked',
	'googlefont5_heading3'=>'unchecked',
	'googlefont5_heading4'=>'unchecked',
	'googlefont5_heading5'=>'unchecked',
	'googlefont5_heading6'=>'unchecked',
	'googlefont5_body'=>'unchecked',
	'googlefont5_blockquote'=>'unchecked',
	'googlefont5_p'=>'unchecked',
	'googlefont5_li'=>'unchecked',

	'googlefont6_css_on_off'=>'unchecked',
	'googlefont6_css'=>' ',
	'googlefont6_heading1'=>'unchecked',
	'googlefont6_heading2'=>'unchecked',
	'googlefont6_heading3'=>'unchecked',
	'googlefont6_heading4'=>'unchecked',
	'googlefont6_heading5'=>'unchecked',
	'googlefont6_heading6'=>'unchecked',
	'googlefont6_body'=>'unchecked',
	'googlefont6_blockquote'=>'unchecked',
	'googlefont6_p'=>'unchecked',
	'googlefont6_li'=>'unchecked',

	'googlefonts_on_off'=>'off'	
			);
                update_option($this->optionsName, $theOptions);
            }
            $this->options = $theOptions;
            
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            //There is no return here, because you should use the $this->options variable!!!
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
        /**
        * Saves the admin options to the database.
        */
        function saveAdminOptions(){
            return update_option($this->optionsName, $this->options);
        }
        
        /**
        * @desc Adds the options subpanel
        */
        function admin_menu_link() {
            //If you change this from add_options_page, MAKE SURE you change the filter_plugin_actions function (below) to
            //reflect the page filename (ie - options-general.php) of the page your plugin is under!
            add_options_page('Google Fonts', 'Google Fonts', 10, basename(__FILE__), array(&$this,'admin_options_page'));
            add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array(&$this, 'filter_plugin_actions'), 10, 2 );
        }
        
        /**
        * @desc Adds the Settings link to the plugin activate/deactivate page
        */
        function filter_plugin_actions($links, $file) {
           //If your plugin is under a different top-level menu than Settiongs (IE - you changed the function above to something other than add_options_page)
           //Then you're going to want to change options-general.php below to the name of your top-level page
           $settings_link = '<a href="options-general.php?page=' . basename(__FILE__) . '">' . __('Settings') . '</a>';
           array_unshift( $links, $settings_link ); // before other links

           return $links;
        }
        
        /**
        * Adds settings/options page
        */
        function admin_options_page() { 
            if($_POST['googlefonts_save']){
                if (! wp_verify_nonce($_POST['_wpnonce'], 'googlefonts-update-options') ) die('Whoops! There was a problem with the data you posted. Please go back and try again.'); 

$this->options['googlefonts_on_off'] = $_POST['googlefonts_on_off'];

$this->options['googlefonts1_on_off'] = $_POST['googlefonts1_on_off'];
$this->options['googlefonts2_on_off'] = $_POST['googlefonts2_on_off'];
$this->options['googlefonts3_on_off'] = $_POST['googlefonts3_on_off'];
$this->options['googlefonts4_on_off'] = $_POST['googlefonts4_on_off'];
$this->options['googlefonts5_on_off'] = $_POST['googlefonts5_on_off'];
$this->options['googlefonts6_on_off'] = $_POST['googlefonts6_on_off'];

$this->options['googlefonts_font1'] = $_POST['googlefonts_font1'];
$this->options['googlefonts_font2'] = $_POST['googlefonts_font2'];
$this->options['googlefonts_font3'] = $_POST['googlefonts_font3'];
$this->options['googlefonts_font4'] = $_POST['googlefonts_font4'];
$this->options['googlefonts_font5'] = $_POST['googlefonts_font5'];
$this->options['googlefonts_font6'] = $_POST['googlefonts_font6'];


$this->options['googlefont1_heading1'] = $_POST['googlefont1_heading1'];
$this->options['googlefont1_heading2'] = $_POST['googlefont1_heading2'];
$this->options['googlefont1_heading3'] = $_POST['googlefont1_heading3'];
$this->options['googlefont1_heading4'] = $_POST['googlefont1_heading4'];
$this->options['googlefont1_heading5'] = $_POST['googlefont1_heading5'];
$this->options['googlefont1_heading6'] = $_POST['googlefont1_heading6'];
$this->options['googlefont1_body'] = $_POST['googlefont1_body'];
$this->options['googlefont1_blockquote'] = $_POST['googlefont1_blockquote'];
$this->options['googlefont1_p'] = $_POST['googlefont1_p'];
$this->options['googlefont1_li'] = $_POST['googlefont1_li'];
$this->options['googlefont1_css_on_off'] = $_POST['googlefont1_css_on_off'];
$this->options['googlefont1_css'] = $_POST['googlefont1_css'];

$this->options['googlefont2_heading1'] = $_POST['googlefont2_heading1'];
$this->options['googlefont2_heading2'] = $_POST['googlefont2_heading2'];
$this->options['googlefont2_heading3'] = $_POST['googlefont2_heading3'];
$this->options['googlefont2_heading4'] = $_POST['googlefont2_heading4'];
$this->options['googlefont2_heading5'] = $_POST['googlefont2_heading5'];
$this->options['googlefont2_heading6'] = $_POST['googlefont2_heading6'];
$this->options['googlefont2_body'] = $_POST['googlefont2_body'];
$this->options['googlefont2_blockquote'] = $_POST['googlefont2_blockquote'];
$this->options['googlefont2_p'] = $_POST['googlefont2_p'];
$this->options['googlefont2_li'] = $_POST['googlefont2_li'];
$this->options['googlefont2_css_on_off'] = $_POST['googlefont2_css_on_off'];
$this->options['googlefont2_css'] = $_POST['googlefont2_css'];

$this->options['googlefont3_heading1'] = $_POST['googlefont3_heading1'];
$this->options['googlefont3_heading2'] = $_POST['googlefont3_heading2'];
$this->options['googlefont3_heading3'] = $_POST['googlefont3_heading3'];
$this->options['googlefont3_heading4'] = $_POST['googlefont3_heading4'];
$this->options['googlefont3_heading5'] = $_POST['googlefont3_heading5'];
$this->options['googlefont3_heading6'] = $_POST['googlefont3_heading6'];
$this->options['googlefont3_body'] = $_POST['googlefont3_body'];
$this->options['googlefont3_blockquote'] = $_POST['googlefont3_blockquote'];
$this->options['googlefont3_p'] = $_POST['googlefont3_p'];
$this->options['googlefont3_li'] = $_POST['googlefont3_li'];
$this->options['googlefont3_css_on_off'] = $_POST['googlefont3_css_on_off'];
$this->options['googlefont3_css'] = $_POST['googlefont3_css'];

$this->options['googlefont4_heading1'] = $_POST['googlefont4_heading1'];
$this->options['googlefont4_heading2'] = $_POST['googlefont4_heading2'];
$this->options['googlefont4_heading3'] = $_POST['googlefont4_heading3'];
$this->options['googlefont4_heading4'] = $_POST['googlefont4_heading4'];
$this->options['googlefont4_heading5'] = $_POST['googlefont4_heading5'];
$this->options['googlefont4_heading6'] = $_POST['googlefont4_heading6'];
$this->options['googlefont4_body'] = $_POST['googlefont4_body'];
$this->options['googlefont4_blockquote'] = $_POST['googlefont4_blockquote'];
$this->options['googlefont4_p'] = $_POST['googlefont4_p'];
$this->options['googlefont4_li'] = $_POST['googlefont4_li'];
$this->options['googlefont4_css_on_off'] = $_POST['googlefont4_css_on_off'];
$this->options['googlefont4_css'] = $_POST['googlefont4_css'];

$this->options['googlefont5_heading1'] = $_POST['googlefont5_heading1'];
$this->options['googlefont5_heading2'] = $_POST['googlefont5_heading2'];
$this->options['googlefont5_heading3'] = $_POST['googlefont5_heading3'];
$this->options['googlefont5_heading4'] = $_POST['googlefont5_heading4'];
$this->options['googlefont5_heading5'] = $_POST['googlefont5_heading5'];
$this->options['googlefont5_heading6'] = $_POST['googlefont5_heading6'];
$this->options['googlefont5_body'] = $_POST['googlefont5_body'];
$this->options['googlefont5_blockquote'] = $_POST['googlefont5_blockquote'];
$this->options['googlefont5_p'] = $_POST['googlefont5_p'];
$this->options['googlefont5_li'] = $_POST['googlefont5_li'];
$this->options['googlefont5_css_on_off'] = $_POST['googlefont5_css_on_off'];
$this->options['googlefont5_css'] = $_POST['googlefont5_css'];

$this->options['googlefont6_heading1'] = $_POST['googlefont6_heading1'];
$this->options['googlefont6_heading2'] = $_POST['googlefont6_heading2'];
$this->options['googlefont6_heading3'] = $_POST['googlefont6_heading3'];
$this->options['googlefont6_heading4'] = $_POST['googlefont6_heading4'];
$this->options['googlefont6_heading5'] = $_POST['googlefont6_heading5'];
$this->options['googlefont6_heading6'] = $_POST['googlefont6_heading6'];
$this->options['googlefont6_body'] = $_POST['googlefont6_body'];
$this->options['googlefont6_blockquote'] = $_POST['googlefont6_blockquote'];
$this->options['googlefont6_p'] = $_POST['googlefont6_p'];
$this->options['googlefont6_li'] = $_POST['googlefont6_li'];
$this->options['googlefont6_css_on_off'] = $_POST['googlefont6_css_on_off'];
$this->options['googlefont6_css'] = $_POST['googlefont6_css'];
                                        
                                        
                $this->saveAdminOptions();
                
                echo '<div class="updated"><p>Success! Your changes were sucessfully saved!</p></div>';
            }
?>                                   
                <div class="wrap">
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

<h1>Google Font Control Panel</h1>
<p><img src="<?php 	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/wp-google-fonts/images/google-fonts-logo.jpg'; ?>" align="right" />This control panel gives you the ability to control how your Google Fonts fonts are displayed. For more information about this plugin, please visit the <a href="http://adrian3.com/projects/wordpress-plugins/wordpress-google-fonts-plugin/" title="Google Fonts plugin page">Google Fonts plugin page</a>. Thanks for using Google Fonts, and I hope you like this plugin. <a href="http://adrian3.com/" title="-Adrian 3">-Adrian3</a></p>
 




                <form method="post" id="googlefonts_options">
                <?php wp_nonce_field('googlefonts-update-options'); ?>

<hr />



<?php
	function listgooglefontoptions() { echo '
<option value="Allan">Allan</option>
<option value="Anonymous Pro">Anonymous Pro</option>
<option value="Anonymous Pro:regular,italic,bold,bolditalic">Anonymous Pro (plus italic, bold, and bold italic)</option>
<option value="Allerta Stencil">Allerta Stencil</option>
<option value="Allerta">Allerta</option>
<option value="Arimo">Arimo</option>
<option value="Arimo:regular,italic,bold,bolditalic">Arimo (plus italic, bold, and bold italic)</option>
<option value="Arvo">Arvo</option>
<option value="Arvo:regular,italic,bold,bolditalic">Arvo (plus italic, bold, and bold italic)</option>
<option value="Bentham">Bentham</option>
<option value="Buda:light">Buda</option>
<option value="Cabin">Cabin</option>
<option value="Calligraffitti">Calligraffitti</option>
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cantarell:regular,italic,bold,bolditalic">Cantarell (plus italic, bold, and bold italic)</option>
<option value="Cardo">Cardo</option>
<option value="Cherry Cream Soda">Cherry Cream Soda</option>
<option value="Chewy">Chewy</option>
<option value="Coda">Coda</option>
<option value="Coming Soon">Coming Soon</option>
<option value="Copse">Copse</option>
<option value="Corben:bold">Corben</option>
<option value="Cousine">Cousine</option>
<option value="Cousine:regular,italic,bold,bolditalic">Cousine (plus italic, bold, and bold italic)</option>
<option value="Covered By Your Grace">Covered By Your Grace</option>
<option value="Crafty Girls">Crafty Girls</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Crushed">Crushed</option>
<option value="Cuprum">Cuprum</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans:regular,bold">Droid Sans (plus bold)</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Droid Serif:regular,italic,bold,bolditalic">Droid Serif (plus italic, bold, and bold italic)</option>
<option value="Fontdiner Swanky">Fontdiner Swanky</option>
<option value="Geo">Geo</option>
<option value="Gruppo">Gruppo</option>
<option value="Homemade Apple">Homemade Apple</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica:regular,italic">IM Fell DW Pica (plus italic)</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica:regular,italic">IM Fell Double Pica (plus italic)</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English:regular,italic">IM Fell English (plus italic)</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon:regular,italic">IM Fell French Canon (plus italic)</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer:regular,italic">IM Fell Great Primer (plus italic)</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Irish Growler">Irish Growler</option>
<option value="Josefin Sans:100">Josefin Sans 100</option>
<option value="Josefin Sans:100,100italic">Josefin Sans 100 (plus italic)</option>
<option value="Josefin Sans:light">Josefin Sans Light 300</option>
<option value="Josefin Sans:light,lightitalic">Josefin Sans Light 300 (plus italic)</option>
<option value="Josefin Sans">Josefin Sans Regular 400</option>
<option value="Josefin Sans:regular,regularitalic">Josefin Sans Regular 400 (plus italic)</option>
<option value="Josefin Sans:600">Josefin Sans 600</option>
<option value="Josefin Sans:600,600italic">Josefin Sans 600 (plus italic)</option>
<option value="Josefin Sans:bold">Josefin Sans Bold 700</option>
<option value="Josefin Sans:bold,bolditalic">Josefin Sans Bold 700 (plus italic)</option>
<option value="Josefin Slab:100">Josefin Slab 100</option>
<option value="Josefin Slab:100,100italic">Josefin Slab 100 (plus italic)</option>
<option value="Josefin Slab:light">Josefin Slab Light 300</option>
<option value="Josefin Slab:light,lightitalic">Josefin Slab Light 300 (plus italic)</option>
<option value="Josefin Slab">Josefin Slab Regular 400</option>
<option value="Josefin Slab:regular,regularitalic">Josefin Slab Regular 400 (plus italic)</option>
<option value="Josefin Slab:600">Josefin Slab 600</option>
<option value="Josefin Slab:600,600italic">Josefin Slab 600 (plus italic)</option>
<option value="Josefin Slab:bold">Josefin Slab Bold 700</option>
<option value="Josefin Slab:bold,bolditalic">Josefin Slab Bold 700 (plus italic)</option>
<option value="Just Another Hand">Just Another Hand</option>
<option value="Just Me Again Down Here">Just Me Again Down Here</option>
<option value="Kenia">Kenia</option>
<option value="Kranky">Kranky</option>
<option value="Kristi">Kristi</option>
<option value="Lato:100">Lato 100</option>
<option value="Lato:100,100italic">Lato 100 (plus italic)</option>
<option value="Lato:light">Lato Light 300</option>
<option value="Lato:light,lightitalic">Lato Light 300 (plus italic)</option>
<option value="Lato:regular">Lato Regular 400</option>
<option value="Lato:regular,regularitalic">Lato Regular 400 (plus italic)</option>
<option value="Lato:bold">Lato Bold 700</option>
<option value="Lato:bold,bolditalic">Lato Bold 700 (plus italic)</option>
<option value="Lato:900">Lato 900</option>
<option value="Lato:900,900italic">Lato 900 (plus italic)</option>
<option value="Lekton"> Lekton </option>
<option value="Lekton:regular,italic,bold">Lekton (plus italic and bold)</option>
<option value="Lobster">Lobster</option>
<option value="Luckiest Guy">Luckiest Guy</option>
<option value="Maiden Orange">Maiden Orange</option>
<option value="Merriweather">Merriweather</option>
<option value="Molengo">Molengo</option>
<option value="Mountains of Christmas">Mountains of Christmas</option>
<option value="Nobile">Nobile</option>
<option value="Nobile:regular,italic,bold,bolditalic">Nobile (plus italic, bold, and bold italic)</option>
<option value="Neucha">Neucha</option>
<option value="Neuton">Neuton</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="OFL Sorts Mill Goudy TT:regular,italic">OFL Sorts Mill Goudy TT (plus italic)</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Old Standard TT:regular,italic,bold">Old Standard TT (plus italic and bold)</option>
<option value="Orbitron">Orbitron Regular (400)</option>
<option value="Orbitron:500">Orbitron 500</option>
<option value="Orbitron:bold">Orbitron Regular (700)</option>
<option value="Orbitron:900">Orbitron 900</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Permanent Marker">Permanent Marker</option>
<option value="Philosopher">Philosopher</option>
<option value="PT Sans">PT Sans</option>
<option value="PT Sans:regular,italic,bold,bolditalic">PT Sans (plus itlic, bold, and bold italic)</option>
<option value="PT Sans Caption">PT Sans Caption</option>
<option value="PT Sans Caption:regular,bold">PT Sans Caption (plus bold)</option>
<option value="PT Sans Narrow">PT Sans Narrow</option>
<option value="PT Sans Narrow:regular,bold">PT Sans Narrow (plus bold)</option>
<option value="Puritan">Puritan</option>
<option value="Puritan:regular,italic,bold,bolditalic">Puritan (plus italic, bold, and bold italic)</option>
<option value="Raleway:100">Raleway</option>
<option value="Rock Salt">Rock Salt</option>
<option value="Schoolbell">Schoolbell</option>
<option value="Slackey">Slackey</option>
<option value="Sniglet:800">Sniglet</option>
<option value="Sunshiney">Sunshiney</option>
<option value="Syncopate">Syncopate</option>
<option value="Tangerine">Tangerine</option>
<option value="Tinos">Tinos</option>
<option value="Tinos:regular,italic,bold,bolditalic">Tinos (plus italic, bold, and bold italic)</option>
<option value="Ubuntu">Ubuntu</option>
<option value="Ubuntu:regular,italic,bold,bolditalic">Ubuntu (plus italic, bold, and bold italic)</option>
<option value="Unkempt">Unkempt</option>
<option value="UnifrakturCook:bold">UnifrakturCook</option>
<option value="UnifrakturMaguntia">UnifrakturMaguntia</option>
<option value="Vibur">Vibur</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Vollkorn:regular,italic,bold,bolditalic">Vollkorn (plus italic, bold, and bold italic)</option>
<option value="Walter Turncoat">Walter Turncoat</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
<option value="Yanone Kaffeesatz:300">Yanone Kaffeesatz:300</option>
<option value="Yanone Kaffeesatz:400">Yanone Kaffeesatz:400</option>
<option value="Yanone Kaffeesatz:700">Yanone Kaffeesatz:700</option>
';
	}
?>


<h2>Font 1 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font1" id="googlefonts_font1">
<option selected="selected"><?php echo $this->options['googlefonts_font1'] ;?></option>
<option value="off">None (Turn off Font 1)</option>

<?php listgooglefontoptions(); ?>

</select>

<p><strong>Elements you want to assign this font to:*</strong></p>

<input type="checkbox" <?php if ($this->options['googlefont1_body'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_body" value="checked"> All (body tag)<br>                                                         
<input type="checkbox" <?php if ($this->options['googlefont1_heading1'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_heading1" value="checked"> Headline 1 (h1 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_heading2'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_heading2" value="checked"> Headline 2 (h2 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_heading3'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_heading3" value="checked"> Headline 3 (h3 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_heading4'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_heading4" value="checked"> Headline 4 (h4 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_heading5'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_heading5" value="checked"> Headline 5 (h5 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_heading6'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_heading6" value="checked"> Headline 6 (h6 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_blockquote'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_blockquote" value="checked"> Blockquotes<br>
<input type="checkbox" <?php if ($this->options['googlefont1_p'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_p" value="checked"> Paragraphs (p tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont1_li'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont1_li" value="checked"> Lists (li tags)<br>

<p><strong>Custom CSS:*</strong></p>
<textarea name="googlefont1_css" cols="70" rows="8" id="googlefont1_css">
<?php echo stripslashes($this->options['googlefont1_css']) ; ?>
</textarea>

<p><input type="submit" name="googlefonts_save" value="Save" /></p>

<hr />








<h2>Font 2 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font2" id="googlefonts_font2">
<option selected="selected"><?php echo $this->options['googlefonts_font2'] ;?></option>
<option value="off">None (Turn off Font 1)</option>

<?php listgooglefontoptions(); ?>

</select>

<p><strong>Elements you want to assign this font to:*</strong><br />

<input type="checkbox" <?php if ($this->options['googlefont2_body'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_body" value="checked"> All (body tag)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_heading1'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_heading1" value="checked"> Headline 1 (h1 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_heading2'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_heading2" value="checked"> Headline 2 (h2 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_heading3'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_heading3" value="checked"> Headline 3 (h3 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_heading4'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_heading4" value="checked"> Headline 4 (h4 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_heading5'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_heading5" value="checked"> Headline 5 (h5 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_heading6'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_heading6" value="checked"> Headline 6 (h6 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_blockquote'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_blockquote" value="checked"> Blockquotes<br>
<input type="checkbox" <?php if ($this->options['googlefont2_p'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_p" value="checked"> Paragraphs (p tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont2_li'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont2_li" value="checked"> Lists (li tags)<br>


<p><strong>Custom CSS:*</strong></p>
<p><textarea name="googlefont2_css" cols="70" rows="8" id="googlefont2_css">
<?php echo stripslashes($this->options['googlefont2_css']) ; ?>
</textarea>

<p><input type="submit" name="googlefonts_save" value="Save" /></p>

<hr />







<h2>Font 3 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font3" id="googlefonts_font3">
<option selected="selected"><?php echo $this->options['googlefonts_font3'] ;?></option>
<option value="off">None (Turn off Font 1)</option>

<?php listgooglefontoptions(); ?>

</select>

<p><strong>Elements you want to assign this font to:*</strong><br />

<input type="checkbox" <?php if ($this->options['googlefont3_body'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_body" value="checked"> All (body tag)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_heading1'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_heading1" value="checked"> Headline 1 (h1 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_heading2'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_heading2" value="checked"> Headline 2 (h2 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_heading3'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_heading3" value="checked"> Headline 3 (h3 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_heading4'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_heading4" value="checked"> Headline 4 (h4 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_heading5'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_heading5" value="checked"> Headline 5 (h5 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_heading6'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_heading6" value="checked"> Headline 6 (h6 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_blockquote'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_blockquote" value="checked"> Blockquotes<br>
<input type="checkbox" <?php if ($this->options['googlefont3_p'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_p" value="checked"> Paragraphs (p tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont3_li'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont3_li" value="checked"> Lists (li tags)<br>


<p><strong>Custom CSS:*</strong></p>
<p><textarea name="googlefont3_css" cols="70" rows="8" id="googlefont3_css">
<?php echo stripslashes($this->options['googlefont3_css']) ; ?>
</textarea>

<p><input type="submit" name="googlefonts_save" value="Save" /></p>

<hr />







<h2>Font 4 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font4" id="googlefonts_font4">
<option selected="selected"><?php echo $this->options['googlefonts_font4'] ;?></option>
<option value="off">None (Turn off Font 1)</option>

<?php listgooglefontoptions(); ?>

</select>

<p><strong>Elements you want to assign this font to:*</strong><br />

<input type="checkbox" <?php if ($this->options['googlefont4_body'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_body" value="checked"> All (body tag)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_heading1'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_heading1" value="checked"> Headline 1 (h1 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_heading2'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_heading2" value="checked"> Headline 2 (h2 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_heading3'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_heading3" value="checked"> Headline 3 (h3 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_heading4'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_heading4" value="checked"> Headline 4 (h4 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_heading5'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_heading5" value="checked"> Headline 5 (h5 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_heading6'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_heading6" value="checked"> Headline 6 (h6 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_blockquote'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_blockquote" value="checked"> Blockquotes<br>
<input type="checkbox" <?php if ($this->options['googlefont4_p'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_p" value="checked"> Paragraphs (p tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont4_li'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont4_li" value="checked"> Lists (li tags)<br>


<p><strong>Custom CSS:*</strong></p>
<p><textarea name="googlefont4_css" cols="70" rows="8" id="googlefont4_css">
<?php echo stripslashes($this->options['googlefont4_css']) ; ?>
</textarea>

<p><input type="submit" name="googlefonts_save" value="Save" /></p>

<hr />







<h2>Font 5 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font5" id="googlefonts_font5">
<option selected="selected"><?php echo $this->options['googlefonts_font5'] ;?></option>

<option value="off">None (Turn off Font 1)</option>

<?php listgooglefontoptions(); ?>
</select>

<p><strong>Elements you want to assign this font to:*</strong><br />

<input type="checkbox" <?php if ($this->options['googlefont5_body'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_body" value="checked"> All (body tag)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_heading1'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_heading1" value="checked"> Headline 1 (h1 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_heading2'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_heading2" value="checked"> Headline 2 (h2 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_heading3'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_heading3" value="checked"> Headline 3 (h3 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_heading4'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_heading4" value="checked"> Headline 4 (h4 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_heading5'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_heading5" value="checked"> Headline 5 (h5 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_heading6'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_heading6" value="checked"> Headline 6 (h6 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_blockquote'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_blockquote" value="checked"> Blockquotes<br>
<input type="checkbox" <?php if ($this->options['googlefont5_p'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_p" value="checked"> Paragraphs (p tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont5_li'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont5_li" value="checked"> Lists (li tags)<br>


<p><strong>Custom CSS:*</strong></p>
<p><textarea name="googlefont5_css" cols="70" rows="8" id="googlefont5_css">
<?php echo stripslashes($this->options['googlefont5_css']) ; ?>
</textarea>

<p><input type="submit" name="googlefonts_save" value="Save" /></p>

<hr />







<h2>Font 6 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font6" id="googlefonts_font6">
<option selected="selected"><?php echo $this->options['googlefonts_font6'] ;?></option>
<option value="off">None (Turn off Font 1)</option>

<?php listgooglefontoptions(); ?>

</select>

<p><strong>Elements you want to assign this font to:*</strong><br />

<input type="checkbox" <?php if ($this->options['googlefont6_body'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_body" value="checked"> All (body tag)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_heading1'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_heading1" value="checked"> Headline 1 (h1 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_heading2'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_heading2" value="checked"> Headline 2 (h2 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_heading3'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_heading3" value="checked"> Headline 3 (h3 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_heading4'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_heading4" value="checked"> Headline 4 (h4 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_heading5'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_heading5" value="checked"> Headline 5 (h5 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_heading6'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_heading6" value="checked"> Headline 6 (h6 tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_blockquote'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_blockquote" value="checked"> Blockquotes<br>
<input type="checkbox" <?php if ($this->options['googlefont6_p'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_p" value="checked"> Paragraphs (p tags)<br>
<input type="checkbox" <?php if ($this->options['googlefont6_li'] == "checked") { echo 'checked'; } else { echo 'unchecked'; } ?> name="googlefont6_li" value="checked"> Lists (li tags)<br>


<p><strong>Custom CSS:*</strong></p>
<p><textarea name="googlefont6_css" cols="70" rows="8" id="googlefont6_css">
<?php echo stripslashes($this->options['googlefont6_css']) ; ?>
</textarea>

<p><input type="submit" name="googlefonts_save" value="Save" /></p>

<hr />



<h3>Available Fonts:</h3>
<a href="<?php 	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/wp-google-fonts/images/font_list_large.jpg'; ?>"><img src="<?php 	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/wp-google-fonts/images/font_list.jpg'; ?>" /></a>
<p>
This plugin uses open source fonts that are hosted on Google's servers. For more information about this service, you can visit the 
	<a href="http://code.google.com/webfonts/">Google Font Directory</a>.
</p>
<hr />


<h2>* CSS WARNING</h2>
<p>Most likely the theme you are using has defined very specific elements in its stylesheet and these may override the generic tags specified above. If you don't see any changes after checking the style boxes above, you will need to enter custom css into the CSS box. An example of CSS that would be more specific would be:</p>
	
<p>#container p { font-family: 'Reenie Beanie', arial, serif; }</p>

<p>This would define all paragraphs found within a &lt;div id=&quot;container&quot;&gt;&lt;/div&gt; element. Stylesheets (CSS) can be sensitive and tricky sometimes. If you are new to CSS the <a href="http://www.w3schools.com/css/" title="w3schools tutorials">w3schools tutorials</a> are a great place to start.

</form>
    </td>
  </tr>
</table>

<?php }
  } //End Class
} //End if class exists statement

//instantiate the class
if (class_exists('googlefonts')) {
    $googlefonts_var = new googlefonts();
}
?>