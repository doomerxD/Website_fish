function initMap() {
    latlng = new google.maps.LatLng(lat, lng);
    map = document.getElementById("map");
    opt = {
        zoom: 13,
        center: latlng,
    };
    mapObj = new google.maps.Map(map, opt);
    marker = new google.maps.Marker({
        position: latlng,
        map: mapObj,
        title: '現在地',
    });
}