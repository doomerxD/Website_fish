function initMap() {
    map = document.getElementById("map");
    const lat = $('#lat').data();
    const lng = $('#lng').data();
    console.log(lat);
    let tokyoTower = {lat: Number(lat.name), lng: Number(lng.name)};
    opt = {
        zoom: 13, 
        center: tokyoTower, 
    };
    
    mapObj = new google.maps.Map(map, opt);
    
    marker = new google.maps.Marker({
        position: tokyoTower,
        map: mapObj,
        title: 'tokyotower',
    });
}