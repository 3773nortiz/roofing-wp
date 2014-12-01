<?php

if(!defined('WP_UNINSTALL_PLUGIN'))
	exit ();

delete_option( 'jb_cf7_integrator' );
delete_option( 'jb_cf7_aweber_access_keys' );
delete_option( 'jb_cf7_aw_custom_fields' );
delete_option( 'jb_cf7_gr_custom_fields' );
delete_option( 'jb_cf7_mc_custom_fields' );
delete_option( 'jb_cf7_is_custom_fields' );
delete_option( 'cf7_email_aw_lists' );
delete_option( 'cf7_email_gr_lists' );
delete_option( 'cf7_email_mc_lists' );
delete_option( 'cf7_email_is_lists' );