<?php
/*
Plugin Name: Google Friend Connect Integration
Plugin URI: http://www.socialarrow.com
Description: Easily integrate Google Friend Connect with Wordpress
Version: 0.75
Author: Social Mind
Author URI: http://www.socialarrow.com
*/
/*  Copyright 2008  SocialMind  (email : socialmind@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('admin_menu', 'gfc_plugin_menu');

function gfci_sit() {
  $gfci_val = get_option( gfci_side_id );
  echo $gfci_val;
}

function gfci_wid() {
	$gfci_val2 = get_option( gfci_widg_wid );
	echo $gfci_val2;
}

function gfc_plugin_menu() {
  add_options_page('GFC Integration', 'GFC Integration', 8, __FILE__, 'gfci_options_page');
}

function gfci_options_page() {

    $gfci_opt = 'gfci_side_id';
    $gfci_opt2 = 'gfci_widg_wid';
    $hidden_field_name = 'gfci_submit_hidden';
    $gfci_site_id = 'gfci_side_id';
    $gfci_widg_wid = 'gfci_widg_wid';
    $opt_val = get_option( $gfci_opt );
    $opt_val2 = get_option( $gfci_widg_wid);
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        $opt_val = $_POST[ $gfci_site_id ];
        $opt_val2 = $_POST[ $gfci_widg_wid ];
	update_option( $gfci_opt, $opt_val );
	update_option( $gfci_opt2, $opt_val2 );
?>
<div class="updated"><p><strong><?php _e('Options saved.', 'gfci_trans_domain' ); ?></strong></p></div>
<?php

    }
    echo '<div class="wrap">';
    echo "<h2>" . __( 'Google Friend Connect Integration Options', 'gfci_trans_domain' ) . "</h2>";
    
    ?>

<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Friend Connect SiteId:", 'gfci_trans_domain' ); ?> 
<input type="text" name="<?php echo $gfci_site_id; ?>" value="<?php echo $opt_val; ?>" size="20">
</p><hr />

<p><?php _e("Blanket Gadget Width(in Pixels):", 'gfci_trans_domain2' ); ?> 
<input type="text" name="<?php echo $gfci_widg_wid; ?>" value="<?php echo $opt_val2; ?>" size="20">
</p><hr />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'gfci_trans_domain2' ) ?>" />
</p>

</form>
</div>

<?php
 
}
function GFCIWidget_Members($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo $after_title;
?>
<!-- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>

<!-- Define the div tag where the gadget will be inserted. -->
<div id="gfci-member" style="width:<?php echo gfci_wid(); ?>px;border:1px solid #cccccc;"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['HEIGHT'] = '385';
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderMembersGadget(
 { id: 'gfci-member',
   site: '<?php echo gfci_sit(); ?>'},
  skin);
</script>
<?php
  echo $after_widget;
}

function GFCIWidget_Wall($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo $after_title;
?>
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<div id="gfci-wall" style="width:<?php echo gfci_wid(); ?>px;border:1px solid #cccccc;"></div>
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['DEFAULT_COMMENT_TEXT'] = '- add your comment here -';
skin['HEADER_TEXT'] = 'Comments';
skin['POSTS_PER_PAGE'] = '5';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderWallGadget(
 { id: 'gfci-wall',
   site: '<?php echo gfci_sit(); ?>',
   'view-params':{"scope":"SITE","features":"video,comment"}
},
  skin);
</script>
<?php
  echo $after_widget;
}

function GFCIWidget_Login($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo $after_title;
?>
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<div id="gfci-login" style="width:<?php echo gfci_wid(); ?>;border:1px solid #cccccc;"></div>
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['ALIGNMENT'] = 'center';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderSignInGadget(
 { id: 'gfci-login',
   site: '<?php echo gfci_sit(); ?>'},
  skin);
</script>
<?php
  echo $after_widget;
}

function GFCIWidget_LameGame($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo $after_title;
?>
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<div id="gfci-lamegame" style="width:<?php echo gfci_wid(); ?>px;border:1px solid #cccccc;"></div>
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#cccccc';
skin['ENDCAP_BG_COLOR'] = '#e0ecff';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderOpenSocialGadget(
 { id: 'gfci-lamegame',
   url:'http://www.google.com/friendconnect/gadgets/lamegame.xml',
   site: '<?php echo gfci_sit(); ?>'},
  skin);
</script>
<?php
  echo $after_widget;
}

function myGFCI_init() {

  register_sidebar_widget(__('GFC Member Gadget'), 'GFCIWidget_Members');
  register_sidebar_widget(__('GFC Wall Gadget'), 'GFCIWidget_Wall');
  register_sidebar_widget(__('GFC Login Gadget'), 'GFCIWidget_Login');
  register_sidebar_widget(__('GFC Lame Game!'), 'GFCIWidget_LameGame');
}
add_action("plugins_loaded", "myGFCI_init");
?>
