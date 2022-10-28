function setLocation(pos) {

    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    
    console.log(lat);
    console.log(lng);
    
    $(".lat_input").val(lat);
    $(".lng_input").val(lng);

}

function showErr(err) {
    switch (err.code) {
        case 1 :
            alert("位置情報の利用が許可されていません");
            break;
        case 2 :
            alert("デバイスの位置が判定できません");
            break;
        case 3 :
            alert("タイムアウトしました");
            break;
        default :
            alert(err.message);
    }
}

if ("geolocation" in navigator) {
    var opt = {
        "enableHighAccuracy": true,
        "timeout": 10000,
        "maximumAge": 0,
    };
    navigator.geolocation.getCurrentPosition(setLocation, showErr, opt);
} else {
    alert("ブラウザが位置情報取得に対応していません");
}

$('.btn').prop('disabled', false)
