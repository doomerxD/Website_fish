function getLatLng() {
    var addressInput = document.getElementById('addressInput').value;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode(
        {
            address: addressInput
        },
        function (results, status) {

            console.log(results, status)

            var latlng = "";

            if (status == google.maps.GeocoderStatus.OK) {
            
                for (var i in results) {
                    if (results[i].geometry) {

                        
                        var lat = results[i].geometry.location.lat();
                        var lng = results[i].geometry.location.lng();

                        $('#lat').val(lat);
                        $('#lng').val(lng);
                        document.getElementById('place').submit();
                        break;
                    }
                }
            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                alert("住所が見つかりませんでした。");
            } else if (status == google.maps.GeocoderStatus.ERROR) {
                alert("サーバ接続に失敗しました。");
            } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
                alert("リクエストが無効でした。");
            } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                alert("リクエストの制限回数を超えました。");
            } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
                alert("サービスが使えない状態でした。");
            } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
                alert("原因不明のエラーが発生しました。");
            }
        });
}
$('#searchGeo').on('click',() => {
    getLatLng();
});