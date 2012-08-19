<?php
/*
Plugin Name: Lean Pencil
Plugin URI: http://leanpencil.com
Description: Let us help you write better content.
Author: Sophia Lee
Author URI: http://leanpencil.com/
Version: 0.0.1
*/
/*  Copyright 2012  leaningpencil.com  (email : sophialee001@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'LEANPENCIL_VERSION' ) )
    define( 'LEANPENCIL_VERSION', '1.6.14.6' );

if ( ! defined( 'LEANPENCIL_PLUGIN_DIR' ) )
    define( 'LEANPENCIL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'LEANPENCIL_PLUGIN_BASENAME' ) )
    define( 'LEANPENCIL_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

if ( ! defined( 'LEANPENCIL_PLUGIN_DIRNAME' ) )
    define( 'LEANPENCIL_PLUGIN_DIRNAME', dirname( LEANPENCIL_PLUGIN_BASENAME ) );

if ( ! defined( 'LEANPENCIL_PLUGIN_URL' ) )
    define( 'LEANPENCIL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( ! defined( 'LEANPENCIL_PLUGIN_IMAGES_URL' ) )
    define( 'LEANPENCIL_PLUGIN_IMAGES_URL', LEANPENCIL_PLUGIN_URL . 'images/' );
if ( ! defined( 'LEANPENCIL_PLUGIN_JS_URL' ) )
    define( 'LEANPENCIL_PLUGIN_JS_URL', LEANPENCIL_PLUGIN_URL . 'js/' );
if ( ! defined( 'WP_CONTENT_URL' ) )
    define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_ADMIN_URL' ) )
    define( 'WP_ADMIN_URL', get_option( 'siteurl' ) . '/wp-admin' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
    define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
    define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );




if ( is_admin() ){
	
	add_action( 'admin_menu', 'leanpencil_create_menu' );
	
    function leanpencil_create_menu() {

        //create custom top-level menu
        add_menu_page( 'Lean Pencil Settings Page', 'Lean Pencil',
       		'manage_options', __FILE__, 'lean_pencil_settings_page',
            plugins_url( '/images/wp-icon.png', __FILE__ ) );

        //create submenu items
        add_submenu_page( __FILE__, 'About Lean Pencil Plugin', 'About', 'manage_options',
            __FILE__.'_about', leanpencil_menu_about_page );
        add_submenu_page( __FILE__, 'Help with Lean Pencil Plugin', 'Help', 'manage_options',
            __FILE__.'_help', leanpencil_menu_help_page );
        add_submenu_page( __FILE__, 'Uninstall Lean Pencil Plugin', 'Uninstall', 'manage_options',
            __FILE__.'_uninstall', leanpencil_menu_uninstall_page );

    }
	
	add_action( 'add_meta_boxes', 'lean_pencil_review_options_create' );

    function lean_pencil_review_options_create() {

        //create a custom meta box
        add_meta_box( 'lean-pencil-meta', 'Lean Pencil', 'lean_pencil_review_options_function',
            'post', 'normal', 'high' );

    }
	
	function lean_pencil_review_options_function( $post ) {

        //retrieve the metadata value if it exists
        $boj_mbe_image = get_post_meta( $post->ID, '_lean_pencil_form', true );
        ?>
			<style type="text/css">
            #lp-option-table th, 
            #lp-option-table td {
                vertical-align:top;
            
                padding: 5px;
            }
            #lp-option-table th {
                text-align: right;	
            }
            #lp-option-table ul.lp-list {
                margin-top: 0;	
            }
            #lp-option-table input[type="checkbox"], input[type="radio"] {
                vertical-align: baseline;
                margin-right: 5px;
            }
			
			.info, .success, .warning, .error {
			border: 1px solid;
			margin: 10px 0px;
			padding:15px 50px 15px 50px;
			}
			.info {
			color: #00529B;
			background-color: #BDE5F8;
			}
			.success {
			color: #4F8A10;
			background-color: #DFF2BF;
			}
			.warning {
			color: #9F6000;
			background-color: #FEEFB3;;
			}
			.error {
			color: #D8000C;
			background-color: #FFBABA;
			}
			.hidden {
				display: none;	
			}
            </style>
<div class="success hidden">Your order has been processed.</div>
<div class="error hidden">Error processing your order. Please try again later.</div>
            
            <table id="lp-option-table">
                        <tbody>
                        
                        <tr>
                        <th scope="row">Options</th>
                        <td><ul id="lp-credit-list" class="lp-list"><li><label>
                            <input type="checkbox" name="lp_credits" value="Title" id="options_0">
                            Title (5 credits)</label>
                    </li>
                    <li>
                          <label>
                            <input type="checkbox" name="lp_credits" value="Images" id="options_1">
                            Images (5 credits)</label>
                        </li>
                        
                        <li>
                          <label>
                            <input type="checkbox" name="lp_credits" value="SEO" id="options_2">
                            SEO description (5 credits)</label>
                          </li>
                          
                          <li>
                          <label>
                            <input type="checkbox" name="lp_credits" value="Tweet" id="options_3">
                            Tweet (1 credit)</label>
                          </li>
                             <li>
                           <label>
                            <input type="checkbox" name="lp_credits" value="Facebook" id="options_4">
                            Facebook (1 credit)</label>
                          </li>
                             <li>
                           <label>
                            <input type="checkbox" name="lp_credits" value="Pinterest" id="options_5">
                            Pinterest (1 credit)</label>
                          </li>
                          <li>
                           <label>
                            <input type="checkbox" name="lp_credits" value="Proofreading" id="options_6">
                            Proofreading and grammar (5 credit)</label>
                          </li>
                          
                          </ul></td>
                        </tr>
            
                        <tr>
                        <th scope="row">Images</th>
                        <td><input type="text" value="" name="img" size="62">		</td>
                        </tr>
            
                        <tr>
                        <th scope="row">SEO Description</th>
                        <td>
                        <textarea cols="60" rows="3" name="seo_keywords"></textarea>
                        </td>
                        </tr>
                
                            <tr>
                        <th scope="row">
                        Total			</th>
                        <td>
                        <span id="num_credits">0</span> credits
                 
                        </td>
                        </tr>
                        
                            <tr>
                        <th scope="row">
                    </th>
                        <td>
                        
                        <input type="button" id="lp_confirm" tabindex="3" value="Confirm Order" class="button">
                        </td>
                        </tr>
                        
                        </tbody></table>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
      <script  type="text/javascript">
	
      	$(document).ready(function (e) {
	
	function addCredits() {
		
		var total = 0;
		$("#lp-credit-list").find("input:checkbox:checked").each(
			function() {
				total += parseInt(this.value, 10);
			}
		);
		$("#num_credits").html(total);
	}
	addCredits();
	
	$("#lp-credit-list input:checkbox").change( function() { 
		addCredits();
	});

    function confirmOrder() {
        //fields required:
        //post_title, tinymce.get()[0].getContent(),options_*, img,seo_keywords
        var postData = {
            title: $("input[name='post_title']").val(),
            content: tinymce.get()[0].getContent().slice(0,1800),  //XXX: this is limited in get request size
            img: $("input[name='img']").val(),
            seo_keyword: $("input[name='seo_keyword']").val(),
            options: $("input[name='lp_credits']").map(
                function (i,e) { return $(e).val(); }
                ).toArray().join(',')
        };

        //alert(JSON.stringify(postData));
        // TODO: 1. get JSON and call API
        $.getJSON(
            "http://api.leanpencil.com/api/v0/content.json?jsoncallback=?",
            postData,
            function () {
                alert("Order confirmed - confirmation sent to Email!");
            }
        );
        return 0;
    }

    $("#lp_confirm").click(confirmOrder);
	
});
      </script>
    

        <?php

    }
	add_action('lp_print_scripts', 'lean_pencil_javascript');
	function lean_pencil_javascript() {
		
	 
		  wp_enqueue_script( 'jquery' );
		  wp_enqueue_script('lean_pencil_script', LEANPENCIL_PLUGIN_JS_URL.'/js/script.js');	  
		  echo "TEST" . LEANPENCIL_PLUGIN_JS_URL;
		
	}

	
}
?>
