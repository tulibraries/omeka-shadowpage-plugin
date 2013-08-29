# Omeka ShadowPage Plugin Readme

## About this plugin 

This plugin uses the Shadowbox.js Javascript application to create keyboard- and mouse-operable page-turning functionality for Omeka items
that include image files.  Shadowbox.js 3.0.3 is currently bundled with this plugin.  

## Installing and Enabling the Plugin

- Unzip the archive and place the plugin into the /plugins directory of your Omeka installation.

- Copy "shadowbox.js" from the "shadowbox/shadowbox-3.0.3/" directory of the plugin into your active theme's "javascripts" directory.

- Copy "shadowbox.css" as well as all .png images from the "shadowbox/shadowbox-3.0.3/" directory of the plugin into your active theme's 
"css" directory.

- In your active theme, open the file "items/show.php."  

- In the HTML/PHP code for show.php, do a search-and-replace to call the ShadowPage functions.

Search for the following line in show.php:

	<?php echo item_image_gallery(); ?>

And replace it with the following:

	<?php echo shadowpage_public_items_shadowpage_gallery(); ?>

Next, search for the following line in show.php:

	<?php echo files_for_item(); ?>

And replace it with the following:

	<?php echo shadowpage_public_items_shadowpage_gallery(); ?>

- Save show.php and re-upload your custom theme.  On items that contain image files, shadowbox functionality should now be installed.

