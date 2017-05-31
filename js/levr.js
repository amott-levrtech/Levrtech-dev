/*!
 * Bootstrap v3.3.5 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under the MIT license
 */
$('#privacyModel').on('hidden.bs.modal', function () {
  $(this).removeData('bs.modal');
});


 function initialize() {
       var mapOptions = {
                center: new google.maps.LatLng(28.1823294, -82.352912),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                scrollwheel: false,
                draggable: false,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true,
            };
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);



