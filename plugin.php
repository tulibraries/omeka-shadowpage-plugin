<?php
 
// add plugin hooks
add_plugin_hook('public_head', 'shadowpage_public_head');

$url = $_SERVER['HTTP_HOST'];
$fullPath = 'http://' . $url . PUBLIC_BASE_URL;
define('FULL_OMEKA_PATH', $fullPath);
function shadowpage_public_head($request)
{
  // goes to "javascripts" folder in your public theme directory.  Make sure to download the latest version of Shadowbox, then
  // extract the files and place "shadowbox.js" here, and "shadowbox.css" in the "css" directory of your theme
    queue_js_file('shadowbox');
    $script = "Shadowbox.init();";
    queue_js_string($script);
    queue_css_file('shadowbox');
    $css=".download-full-res{
    float: left;
    clear:left;
  }";
  
queue_css_string($css);
}

function shadowpage_public_items_shadowpage_gallery()
{
  $basePath = FULL_OMEKA_PATH;
  $item = get_current_record('item');
  $item = get_record_by_id('item', $item->id);
  set_current_record('item', $item);
  $files = $item->Files;
  echo '<div id="itemfiles" class="element">';
  $fr_link_string = array();
  foreach($files as $file):
    if (metadata($item, 'has thumbnail')){
    echo '<div class="shadowpage-thumb">'.file_markup($file, array('linkAttributes'=>array('rel'=>'shadowbox[gal1]'))).'</div>';
    $fr_link_string[] = '<div class="download-full-res"><a href="'. $basePath . '/files/original/'.$file['filename'].'" title="Download ' . $file['original_filename'] . '">' . $file['original_filename'] . '</a></div>';
    }
  endforeach;
 
  echo '</div>';
  echo '<h3>&darr; File Download Links &darr;</h3>';
 foreach($fr_link_string as $links):
    echo $links;
  endforeach;
  
  
  
}

// save plugin configuration page
function shadowpage_config()
{
    // save the message as a plugin option
    set_option('hello_world_message', trim($_POST['hello_world_message']));
}

 
// show plugin configuration page
function shadowpage_config_form()
{


}
 
?>