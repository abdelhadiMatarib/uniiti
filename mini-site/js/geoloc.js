var map;
var geocoder;
var ptLocation;
/*
 * 1) geoloc adress to get len + lat
 * 2) from position coords, put a marker in google map
 * 3) using poisition coords to get nearest metro + parking (with google api)
 * 4) using poisition coords to get nearest velib (using madebymonsieur api)
 *          doc => http://open-api.madebymonsieur.com/velib
 */
function codeAddress() {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( {
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            //define ptLocation to be able to calculate distance between two points
            ptLocation = results[0].geometry.location
            //putting marker into the map
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
            //looking up for nearest parkings and metro stations
            var request = {
                location: results[0].geometry.location,
                radius: '750',
                types: ['subway_station', 'parking'],
                rankby: 'distance'
            };

            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, callback); // callback to put data in html
            //nearest vélib
            $.ajax({
                url: "/mini-site/request/getVelib.php",
                method: "POST",
                data:{
                    len: ptLocation.pb,
                    lat:ptLocation.qb
                },
                success: function(data) {
                    try
                    {
                        results = $.parseJSON(data); 
                        console.log(results)
                        if(results[results.length-1].total_available_bikes>0){
                            //callback to put data in html
                            callbackVelib(results);
                        }
                                 
                    }catch(e){
                                    
                    }
                }
            });
                        
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

/**
 * init google map api and start codeAdress function
 */
function initialize() {
    var mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(48.871323, 2.344978),
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    codeAddress();
            
  
}
google.maps.event.addDomListener(window, 'load', initialize);
            
//puts data in html div (parking + metro)
function callback(results, status) {  
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        if(results.length>0){
            var stringParking = "<ul>";
            var stringMetro = "<ul>";
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                if(place.types[0]=="parking"){
                    var met = distHaversine(ptLocation, place.geometry.location);
                    stringParking += "<li>"+place.name+" <span>("+(met*1000)+" mètres)</span></li>";
                               
                }else{
                    // its a subway station
                    var met = distHaversine(ptLocation, place.geometry.location);
                    stringMetro += "<li>"+place.name+" <span>("+(met*1000)+" mètres)</span></li>";
                }
            }
            stringParking += "</ul>";
            stringMetro += "</ul>";
            $('#parking').append(stringParking);
            $('#metro').append(stringMetro);
        }
    }
}
//puts data into html div (velib)
function callbackVelib(results) {  
    if(results.length>1){
        var stringVelib = "<ul>";
        for (var i = 0; i < results.length-1; i++) {
            var place = results[i];
            // its a subway station
            stringVelib += "<li>"+place.address+" <span>("+(place.dist)+" mètres)</span></li>";
                            
        }
        stringVelib += "</ul>";
        $('#velib').append(stringVelib);
    }
}
               
rad = function(x) {
    return x*Math.PI/180;
}
/**
 * return a distance between two google's points
 */
distHaversine = function(p1, p2) {
    var R = 6371; // earth's mean radius in km
    var dLat  = rad(p2.lat() - p1.lat());
    var dLong = rad(p2.lng() - p1.lng());

    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) * Math.sin(dLong/2) * Math.sin(dLong/2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c;

    return d.toFixed(3);
}
    