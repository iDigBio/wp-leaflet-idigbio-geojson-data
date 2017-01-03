# WP Leaflet iDigBio geojson data #

This Wordpress plugin provides data from [iDigBio] to maps produced
by the [leaflet-map] plugin.


## Installation and use ##

Install the [leaflet-map] plugin and the
wp-leaflet-idigbio-geojson-data plugin. To install this plugin get the
.zip file from the [Releases] tab and unzip it in the
`wp-content/plugins` folder of your wordpress install or go to the
plugins manager and upload it there.

Include both [shortcodes][shortcode] on the page. Any attributes
specified in the shortcode will be passed to the [iDigBio Search API]
as a [Record Query Field].


### Example use ###

    [leaflet-map lat=39 lng=-84.5 zoom=7 width=575 height=250 align="right"]
    [idigbio_geojson_data genus="Flexicalymene"]
    <span style="font-style: italic;">Map point data provided by <a href="https://www.idigbio.org/">iDigBio.</a></span>

## Search API details ##

This queries the [iDigBio search api] for data points. Any
attributes specified in the shortcode will be passed as
a [Record query Field]. Only string/number parameter types are
currently supported.


[iDigBio Search API]: https://github.com/idigbio/idigbio-search-api/wiki
[Record Query Field]: https://github.com/idigbio/idigbio-search-api/wiki/Index-Fields#record-query-fields
[iDigBio]: https://www.idigbio.org/home
[leaflet-map]: https://wordpress.org/plugins/leaflet-map/
[shortcode]: https://codex.wordpress.org/Shortcode
[Releases]: https://github.com/iDigBio/wp-leaflet-idigbio-geojson-data/releases
