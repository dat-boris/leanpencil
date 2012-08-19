<?php
    // If uninstall not called from WordPress exit
    if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
        exit ();
    // Delete option from options table
    delete_option( 'boj_myplugin_options' );
    //remove any additional options and custom tables

    register_activation_hook( __FILE__, 'boj_myplugin_activate' );
    function boj_myplugin_activate() {
        //register the uninstall function
        register_uninstall_hook( __FILE__, 'boj_myplugin_uninstaller' );
    }
    function boj_myplugin_uninstaller() {
        //delete any options, tables, etc the plugin created
        delete_option( 'boj_myplugin_options' );
    }
?>