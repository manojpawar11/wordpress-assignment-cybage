<?php
/**
 * Plugin Name: Animation Plugin
 * Plugin URI: 
 * Description: Animation Plugin using w3school.use shortcode [Animation color='#98bf21' text='test'].
 * Version: 1.0
 * Author: Manoj
  */

//If this file is called directly, abort!!!
defined( 'ABSPATH' ) or die('Access denied!');

    
class Animatiion {
        public function __construct() {
            add_action('admin_menu',array($this,'pluginAdminMenu'));
            add_shortcode('Animation', array($this, 'shortcode'));
            function an_add_scripts(){
                wp_register_script( 'an_script', plugins_url( 'scripts.js', __FILE__ ), array( 'jquery' ), '1.0', true );
                wp_enqueue_script( 'an_script' );
             
                            }
            add_action( 'wp_enqueue_scripts', 'an_add_scripts' );
        }
             
         
        public function pluginAdminMenu(){
            add_menu_page( 'Animatiion Settings', 'Animatiion Settings', 'manage_options', 'animation-settings', array($this,'pluginAdminMenuPage'), 'dashicons-editor-unlink');
        }
     
        public function pluginAdminMenuPage(){
            echo '<h1>My Plugin Settings</h1>';
        }   

        public function shortcode($atts)
        {
            // extract the attributes into variables
            extract(shortcode_atts(array(
                'color' => '#fff',
                'text' => "hello",
                
            ), $atts));
             
            // pass the attributes to getImages function and render the images
            return $this->getAnimationBlock( $color, $text);
        }

        public function getAnimationBlock($color = '#fff', $text = 'hello')
        {
            $htmlData = "<button>Start Animation</button>";
            $htmlData .='<div id="animate" style="background:'.$color.';height:100px;width:200px;position:absolute;">'.$text.'</div>';
            return $htmlData;
        }

    
}
 
$myPlugin = new Animatiion();