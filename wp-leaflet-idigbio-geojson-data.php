<?php
/**
 * @package Akismet
 */
/*
   Plugin Name: wp-leaflet-idigbio-geojson-data
   Description: Add shortcode for filling in geojson feature data of occurences of the given scientific name.
   Version: 1.2.3
   Author: iDigBio
   Author URI: https://www.idigbio.org/
   License: GPLv2 or later
 */

function idigbio_geojson_data_handler($atts) {
  if (empty($atts)) {
    $title = get_the_title();
    $title = preg_replace('/<em>(.*)<\/em>/', '$1', $title);
    $atts = array("scientificname" => $title,);
  }
  $json = json_encode($atts);
  wp_enqueue_script("leaflet-tilelayer-geojson",
                    "https://cdnjs.cloudflare.com/ajax/libs/leaflet-tilelayer-geojson/1.0.4/TileLayer.GeoJSON.min.js",
                    Array("leaflet_js",),
                    "1.04",
                    true);
  wp_enqueue_script('wp-idigbio-leaflet-geojson-data',
                    plugins_url( '/init.js', __FILE__ ),
                    array("leaflet-tilelayer-geojson", "jquery"),
                    "1.2.3",
                    true);
  wp_add_inline_script("wp-idigbio-leaflet-geojson-data","iDigBio.initLeafletData('${json}');", "after");
}
add_shortcode('idigbio_geojson_data', 'idigbio_geojson_data_handler');
?>
