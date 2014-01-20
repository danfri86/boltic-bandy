(function(e){"use strict";var t=function(e){this.$container=e};t.prototype={init:function(){this.initDomElements();this.initMapElements();this.initMarkerPosition();this.addListeners();this.autocomplete()},initDomElements:function(){this.canvas=this.$container.find(".rwmb-map-canvas")[0];this.$coordinate=this.$container.find(".rwmb-map-coordinate");this.$findButton=this.$container.find(".rwmb-map-goto-address-button");this.addressField=this.$findButton.val()},initMapElements:function(){var t=e(this.canvas).data("default-loc"),n;t?t=t.split(","):t=[53.346881,-6.25886];n=new google.maps.LatLng(t[0],t[1]);this.map=new google.maps.Map(this.canvas,{center:n,zoom:14,streetViewControl:0,mapTypeId:google.maps.MapTypeId.ROADMAP});this.marker=new google.maps.Marker({position:n,map:this.map,draggable:!0});this.geocoder=new google.maps.Geocoder},initMarkerPosition:function(){var e=this.$coordinate.val(),t,n;if(e){t=e.split(",");this.marker.setPosition(new google.maps.LatLng(t[0],t[1]));n=t.length>2?parseInt(t[2],10):14;this.map.setCenter(this.marker.position);this.map.setZoom(n)}else this.addressField&&this.geocodeAddress()},addListeners:function(){var e=this;google.maps.event.addListener(this.map,"click",function(t){e.marker.setPosition(t.latLng);e.updateCoordinate(t.latLng)});google.maps.event.addListener(this.marker,"drag",function(t){e.updateCoordinate(t.latLng)});this.$findButton.on("click",function(){e.geocodeAddress();return!1})},autocomplete:function(){var t=this;if(!this.addressField||this.addressField.split(",").length>1)return;e("#"+this.addressField).autocomplete({source:function(n,r){t.geocoder.geocode({address:n.term},function(t){r(e.map(t,function(e){return{label:e.formatted_address,value:e.formatted_address,latitude:e.geometry.location.lat(),longitude:e.geometry.location.lng()}}))})},select:function(e,n){var r=new google.maps.LatLng(n.item.latitude,n.item.longitude);t.map.setCenter(r);t.marker.setPosition(r);t.updateCoordinate(r)}})},updateCoordinate:function(e){this.$coordinate.val(e.lat()+","+e.lng())},geocodeAddress:function(){var e="",t=new Array,n=this.addressField.split(","),r,i=this;for(r=0;r<n.length;r++)t[r]=jQuery("#"+n[r]).val();e=t.join(",").replace(/\n/g,",").replace(/,,/g,",");e&&this.geocoder.geocode({address:e},function(e,t){if(t===google.maps.GeocoderStatus.OK){i.map.setCenter(e[0].geometry.location);i.marker.setPosition(e[0].geometry.location);i.updateCoordinate(e[0].geometry.location)}})}};e(function(){e(".rwmb-map-field").each(function(){var n=new t(e(this));n.init()})})})(jQuery);