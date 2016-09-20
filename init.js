var iDigBio = {
  initLeafletData: function(rq) {
    'use strict';
    jQuery(function() {
      var params = {
        'rq': rq,
        'type': 'points'
      };
      var url = 'https://search.idigbio.org/v2/mapping';
      var getPopupContents = function(props) {
        if (props && props.uuid) {
          return '<div class="popup">' +
            '<em>' + props.scientificname + '</em><br>' +
            '<a href="https://www.idigbio.org/portal/records/'+ props.uuid + '" target="_blank">View record on iDigBio</a></div>';
        }
        else return null;
      };
      var addGeoJsonLayer = function(data) {
        //If the map isn't there, try again in a bit.
        if(!(WPLeafletMapPlugin && WPLeafletMapPlugin.maps && WPLeafletMapPlugin.maps[0])) {
          setTimeout(function() {addGeoJsonLayer(data);}, 250);
          return;
        }
        var geojsonurl = data['geojson'];
        var l = new L.TileLayer.GeoJSON(geojsonurl, null, {
          onEachFeature: function (feature, layer) {
            var popupString = getPopupContents(feature.properties);
            if(popupString) {
              layer.bindPopup(popupString);
            }
          }
        });
        WPLeafletMapPlugin.maps[0].addLayer(l);
      };
      jQuery.get(url, params).done(addGeoJsonLayer);
    });
  }
};
