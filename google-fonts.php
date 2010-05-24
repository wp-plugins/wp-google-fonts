<?php
/* 
Plugin Name: WP Google Fonts
Plugin URI: http://adrian3.com/projects/wordpress-plugins/wordpress-google-fonts-plugin/
Version: v1.0
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

if ($this->options['googlefonts_font'] == 'Cantarell') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Cardo') 						{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Josefin Sans Std Light') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Reenie Beanie') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Tangerine') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font'] == 'Yanone Kaffeesatz') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\'>'; }




if ($this->options['googlefonts_font2'] == 'Cantarell') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Cardo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Josefin Sans Std Light') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font2'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\'>'; }




if ($this->options['googlefonts_font3'] == 'Cantarell') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Cardo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Josefin Sans Std Light') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font3'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\'>'; }




if ($this->options['googlefonts_font4'] == 'Cantarell') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Cardo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Josefin Sans Std Light') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font4'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\'>'; }




if ($this->options['googlefonts_font5'] == 'Cantarell') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Cardo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Josefin Sans Std Light') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font5'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\'>'; }




if ($this->options['googlefonts_font6'] == 'Cantarell') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Cardo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Cardo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Crimson Text') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Droid Sans') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Droid Sans Mono') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans+Mono\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Droid Serif') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Droid+Serif\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Inconsolata') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Inconsolata\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell DW Pica') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell DW Pica SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Double Pica') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Double Pica SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell English') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell English SC') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+English+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell French Canon') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell French Canon SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+French+Canon SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Great Primer') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'IM Fell Great Primer SC') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Josefin Sans Std Light') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Lobster') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Lobster\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Molengo') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Molengo\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Nobile') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'OFL Sorts Mill Goudy TT') 	{ echo '<link href=\'http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Old Standard TT') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Old+Standard+TT\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Reenie Beanie') 			{ echo '<link href=\'http://fonts.googleapis.com/css?family=Reenie+Beanie\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Tangerine') 				{ echo '<link href=\'http://fonts.googleapis.com/css?family=Tangerine\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Vollkorn') 					{ echo '<link href=\'http://fonts.googleapis.com/css?family=Vollkorn\' rel=\'stylesheet\' type=\'text/css\'>'; }
if ($this->options['googlefonts_font6'] == 'Yanone Kaffeesatz') 		{ echo '<link href=\'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz\' rel=\'stylesheet\' type=\'text/css\'>'; }


}




function addgooglefontscss() {
echo '
<style type="text/css" media="screen">
';

//Google Font #1 Styles:
if ($this->options['googlefont1_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_body'] == "checked") { echo 'body 				{ font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_p'] == "checked") { echo 'p 					{ font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont1_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $this->options['googlefonts_font']; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont1_css']);

//Google Font #2 Styles:
if ($this->options['googlefont2_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $this->options['googlefonts_font2']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $this->options['googlefonts_font2']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $this->options['googlefonts_font2']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $this->options['googlefonts_font2']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $this->options['googlefonts_font2']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $this->options['googlefonts_font2']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_body'] == "checked") { echo 'body 				{ font-family: \''; echo $this->options['googlefont2_font']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont2_p'] == "checked") { echo 'p 					{ font-family: \''; echo $this->options['googlefont2_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont2_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $this->options['googlefont2_font']; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont2_css']);

//Google Font #3 Styles:
if ($this->options['googlefont3_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $this->options['googlefonts_font3']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $this->options['googlefonts_font3']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $this->options['googlefonts_font3']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $this->options['googlefonts_font3']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $this->options['googlefonts_font3']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $this->options['googlefonts_font3']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_body'] == "checked") { echo 'body 				{ font-family: \''; echo $this->options['googlefont3_font']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont3_p'] == "checked") { echo 'p 					{ font-family: \''; echo $this->options['googlefont3_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont3_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $this->options['googlefont3_font']; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont3_css']);

//Google Font #4 Styles:
if ($this->options['googlefont4_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $this->options['googlefonts_font4']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $this->options['googlefonts_font4']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $this->options['googlefonts_font4']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $this->options['googlefonts_font4']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $this->options['googlefonts_font4']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $this->options['googlefonts_font4']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_body'] == "checked") { echo 'body 				{ font-family: \''; echo $this->options['googlefont4_font']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont4_p'] == "checked") { echo 'p 					{ font-family: \''; echo $this->options['googlefont4_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont4_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $this->options['googlefont4_font']; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont4_css']);

//Google Font #5 Styles:
if ($this->options['googlefont5_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $this->options['googlefonts_font5']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $this->options['googlefonts_font5']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $this->options['googlefonts_font5']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $this->options['googlefonts_font5']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $this->options['googlefonts_font5']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $this->options['googlefonts_font5']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_body'] == "checked") { echo 'body 				{ font-family: \''; echo $this->options['googlefont5_font']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont5_p'] == "checked") { echo 'p 					{ font-family: \''; echo $this->options['googlefont5_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont5_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $this->options['googlefont5_font']; echo '\', arial, serif; } 
'; }
echo stripslashes($this->options['googlefont5_css']);

//Google Font #6 Styles:
if ($this->options['googlefont6_heading1'] == "checked") { echo 'h1 { font-family: \''; echo $this->options['googlefonts_font6']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading2'] == "checked") { echo 'h2 { font-family: \''; echo $this->options['googlefonts_font6']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading3'] == "checked") { echo 'h3 { font-family: \''; echo $this->options['googlefonts_font6']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading4'] == "checked") { echo 'h4 { font-family: \''; echo $this->options['googlefonts_font6']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading5'] == "checked") { echo 'h5 { font-family: \''; echo $this->options['googlefonts_font6']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_heading6'] == "checked") { echo 'h6 { font-family: \''; echo $this->options['googlefonts_font6']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_body'] == "checked") { echo 'body 				{ font-family: \''; echo $this->options['googlefont6_font']; echo '\', arial, serif; } 
'; }                          
if ($this->options['googlefont6_p'] == "checked") { echo 'p 					{ font-family: \''; echo $this->options['googlefont6_font']; echo '\', arial, serif; } 
'; }
if ($this->options['googlefont6_blockquote'] == "checked") { echo 'blockquote 	{ font-family: \''; echo $this->options['googlefont6_font']; echo '\', arial, serif; } 
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

$this->options['googlefonts_font'] = $_POST['googlefonts_font'];
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
<p>This control panel gives you the ability to control how your Google Fonts fonts are displayed. <br />
For more information about this plugin, please visit the <a href="http://adrian3.com/projects/wordpress-plugins/wordpress-google-fonts-plugin/" title="Google Fonts plugin page">Google Fonts plugin page</a>. <br />
Thanks for using Google Fonts, and I hope you like this plugin. <a href="http://adrian3.com/" title="-Adrian 3">-Adrian3</a></p>
 




                <form method="post" id="googlefonts_options">
                <?php wp_nonce_field('googlefonts-update-options'); ?>

<hr />






<h2>Font 1 Options</h2>

<p><strong>Select Font:</strong></p>

<select name="googlefonts_font" id="googlefonts_font">
<option selected="selected"><?php echo $this->options['googlefonts_font'] ;?></option>
<option value="off">None (Turn off Font 1)</option>
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cardo">Cardo</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Josefin Sans Std Light">Josefin Sans Std Light</option>
<option value="Lobster">Lobster</option>
<option value="Molengo">Molengo</option>
<option value="Nobile">Nobile</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Tangerine">Tangerine</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
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
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cardo">Cardo</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Josefin Sans Std Light">Josefin Sans Std Light</option>
<option value="Lobster">Lobster</option>
<option value="Molengo">Molengo</option>
<option value="Nobile">Nobile</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Tangerine">Tangerine</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
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
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cardo">Cardo</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Josefin Sans Std Light">Josefin Sans Std Light</option>
<option value="Lobster">Lobster</option>
<option value="Molengo">Molengo</option>
<option value="Nobile">Nobile</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Tangerine">Tangerine</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
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
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cardo">Cardo</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Josefin Sans Std Light">Josefin Sans Std Light</option>
<option value="Lobster">Lobster</option>
<option value="Molengo">Molengo</option>
<option value="Nobile">Nobile</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Tangerine">Tangerine</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
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
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cardo">Cardo</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Josefin Sans Std Light">Josefin Sans Std Light</option>
<option value="Lobster">Lobster</option>
<option value="Molengo">Molengo</option>
<option value="Nobile">Nobile</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Tangerine">Tangerine</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
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
<option value="Cardo">Cardo</option>
<option value="Cantarell">Cantarell</option>
<option value="Cardo">Cardo</option>
<option value="Crimson Text">Crimson Text</option>
<option value="Droid Sans">Droid Sans</option>
<option value="Droid Sans Mono">Droid Sans Mono</option>
<option value="Droid Serif">Droid Serif</option>
<option value="Inconsolata">Inconsolata</option>
<option value="IM Fell DW Pica">IM Fell DW Pica</option>
<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
<option value="IM Fell Double Pica">IM Fell Double Pica</option>
<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
<option value="IM Fell English">IM Fell English</option>
<option value="IM Fell English SC">IM Fell English SC</option>
<option value="IM Fell French Canon">IM Fell French Canon</option>
<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
<option value="IM Fell Great Primer">IM Fell Great Primer</option>
<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
<option value="Josefin Sans Std Light">Josefin Sans Std Light</option>
<option value="Lobster">Lobster</option>
<option value="Molengo">Molengo</option>
<option value="Nobile">Nobile</option>
<option value="OFL Sorts Mill Goudy TT">OFL Sorts Mill Goudy TT</option>
<option value="Old Standard TT">Old Standard TT</option>
<option value="Reenie Beanie">Reenie Beanie</option>
<option value="Tangerine">Tangerine</option>
<option value="Vollkorn">Vollkorn</option>
<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
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
<a href="http://code.google.com/webfonts/"><img src="<?php 	echo get_bloginfo('wpurl'); 
	echo '/wp-content/plugins/google-fonts/images/font_list.jpg'; ?>" /></a>
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