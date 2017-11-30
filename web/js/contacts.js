(function initMap() {
    var options = {
        zoom: 17,
        // mapTypeControl: false,
        center: {
            lat: 59.965329,
            lng: 30.34146
        }
    }

    var map = new google.maps.Map(document.getElementById('map'), options);

    var markers = [
        {
            coords: {lat: 59.965228, lng: 30.344189},
            iconImage: '/web/img/icon/map-marker.svg',
            title: "1500 West Artesia Square"
        }
    ];

    for (var i = 0; i < markers.length; i++) {
        addMarker(markers[i]);
    }

    function addMarker(props) {
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map,
            icon:props.iconImage,
            title: props.title
        });

        if (props.iconImage) {
            marker.setIcon(props.iconImage);
        }

        if (props.content) {
            var infoWindow = new google.maps.InfoWindow({
                content: props.content
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        }
    } 
})();


