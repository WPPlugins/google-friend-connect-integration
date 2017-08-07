=== Google Friend Connect Integration ===
Contributors: SocialMind
Donate link: http://www.socialarrow.com
Tags: social networks, google friend connect, friend connect
Requires at least: 2.0.2
Tested up to: 2.7
Stable tag: 0.75


Purpose: To easily allow the integration of Google Friend Connect with 
WordPress.
== Description ==


Please use with discretion as the next release will be out within days.  This present release is for testing purposes only and is NOT meant to be used on a High Profile Blog.

(It should cause no conflicts or problems really, but is not customizable
 and may become obsolete with the next few releases)

Present Functions:  Update Site ID # and Width of Gadgets in the Administration Settings and add three widgets,
a Members Gadget, a Login Gadget and a Wall Gadget

== Installation ==


Step 1:  Upload the gfcintegration folder to the plugin directory of Wordpress and Activate

Step 2:  Go to http://www.google.com/friendconnect/ and signup for your site if you haven't already. Continue till you have generated the "Member Gadget" code in the fourth step of Googles setup.  (Downloading the two files must be done manually through googles setup in this version)

Step 3: Find the "Site ID" Number in you Member Gadget Code and put this in the Admin Settings of GFC Integration (The Site ID line should look like this in your code:
site: '00865087787750565108' - use the NUMBER ONLY for GFCI admin SiteId Setting)

Step 4: Add The Member, Login, and/or Wall Gadget wherever you'd like.  You can adjust the width in the GFC Integrate Admin Settings. *NOTE* All widgets are fixed at 230px presently.  Future release will allow alot of customization options.


`<?php code(); // goes in backticks ?>