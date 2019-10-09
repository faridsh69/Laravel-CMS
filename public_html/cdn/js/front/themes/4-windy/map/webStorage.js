function imageToBase64(image) {
    var canvas = document.createElement("canvas");
    canvas.width = image.width;
    canvas.height = image.height;

    var context = canvas.getContext("2d");
    context.drawImage(image, 0, 0);

    return canvas.toDataURL("image/png");
}

function saveBase64AsFile(base64, fileName) {
    var link = document.createElement("a");
    link.setAttribute("href", base64);
    link.setAttribute("download", fileName);
    link.click();
}

function saveImageToLocal(zoom, x, y){
    var fileName = [zoom, x, y].join('_');
    var url_windy_map = 'https://tiles.windy.com/tiles/v9.0/darkmap/' + 
        zoom + '/' + x + '/' + y + '.png';
    var url_google_map = "http://mt0.googleapis.com/vt?src=apiv3&x=" +
        x + "&y=" + y + "&z=" + zoom;
    var image = new Image();
    image.crossOrigin = "Anonymous";
    image.onload = function() {
        // imageToBase64 will create base64 of images
        // saveBase64AsFile will create a link for download image
        saveBase64AsFile(imageToBase64(image), fileName);
    };
    image.src = url_windy_map;
}

function saveImageToLocalLoop(zoom_index, images_array, coordinate_index)
{
    var x = images_array[coordinate_index].split('_')[0];
    var y = images_array[coordinate_index].split('_')[1];
    saveImageToLocal(zoom_index, x, y);
}

var coordinate_index = 0;
function loopCoordinates(zoom_index, images_array)
{
    coordinate_length = images_array.length;
    setTimeout(function(){
        saveImageToLocalLoop(zoom_index, images_array, coordinate_index);
        coordinate_index ++;
        if (coordinate_index < coordinate_length) {
            loopCoordinates(zoom_index, images_array);
        }
    }, 200);
}

function saveImagesToLocal(init_zoom, maximum_zoom){
    for(var zoom_index = init_zoom;zoom_index < maximum_zoom; zoom_index++){
        var maximum_coordinate = 1; 
        for(var maximum_loop_index = 0; maximum_loop_index < zoom_index; maximum_loop_index++){
            maximum_coordinate = maximum_coordinate * 2;
        }
        maximum_coordinate = maximum_coordinate - 1;
        images_array = [];

        iran_matris = [[0.6, 0.7], [0.35, 0.45]];
        iran_x_min = Math.floor(iran_matris[0][0] * maximum_coordinate);
        iran_x_max = Math.floor(iran_matris[0][1] * maximum_coordinate);
        iran_y_min = Math.floor(iran_matris[1][0] * maximum_coordinate);
        iran_y_max = Math.floor(iran_matris[1][1] * maximum_coordinate);
        
        for(coordinate_x = iran_x_min; coordinate_x <= iran_x_max; coordinate_x ++){
            for(coordinate_y = iran_y_min; coordinate_y <= iran_y_max; coordinate_y ++){
                images_array.push(coordinate_x + '_' + coordinate_y);
            }
        }
        console.log(images_array);

        loopCoordinates(zoom_index, images_array);
    }
}

function saveJson(urlJsonLable, fileName) 
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var link = document.createElement("a");
            var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(this.responseText);
            link.setAttribute("href", dataStr);
            link.setAttribute("download", fileName);
            link.click();
        }
    };
    xhttp.open("GET", urlJsonLable, true);
    xhttp.send();
}

function saveJsonToLocal(zoom, x, y){
    var fileName = [zoom, x, y].join('_') + '.json';
    var urlJsonLable = 'https://tiles.windy.com/labels/v1.3/en/' + 
        zoom + '/' + x + '/' + y + '.json';
    saveJson(urlJsonLable, fileName);
}

function saveJsonToLocalLoop(zoom_index, json_array, coordinate_index)
{
    var x = json_array[coordinate_index].split('_')[0];
    var y = json_array[coordinate_index].split('_')[1];
    saveJsonToLocal(zoom_index, x, y);
}

var coordinate_index = 1900;
function loopCoordinatesJson(zoom_index, json_array)
{
    coordinate_length = json_array.length;
    setTimeout(function(){
        saveJsonToLocalLoop(zoom_index, json_array, coordinate_index);
        coordinate_index ++;
        if (coordinate_index < coordinate_length) {
            loopCoordinatesJson(zoom_index, json_array);
        }
    }, 400);
}

function saveLabelsToLocal(init_zoom, maximum_zoom){
    for(var zoom_index = init_zoom;zoom_index < maximum_zoom; zoom_index++){
        var maximum_coordinate = 1; 
        for(var maximum_loop_index = 0; maximum_loop_index < zoom_index; maximum_loop_index++){
            maximum_coordinate = maximum_coordinate * 2;
        }
        maximum_coordinate = maximum_coordinate - 1;

        iran_matris = [[0.6, 0.7], [0.35, 0.45]];
        iran_x_min = Math.floor(iran_matris[0][0] * maximum_coordinate);
        iran_x_max = Math.floor(iran_matris[0][1] * maximum_coordinate);
        iran_y_min = Math.floor(iran_matris[1][0] * maximum_coordinate);
        iran_y_max = Math.floor(iran_matris[1][1] * maximum_coordinate);

        json_array = [];
        for(coordinate_x = iran_x_min; coordinate_x <= iran_x_max; coordinate_x ++){
            for(coordinate_y = iran_y_min; coordinate_y <= iran_y_max; coordinate_y ++){
                json_array.push(coordinate_x + '_' + coordinate_y);
                // this command will save images with browser
                // saveJsonToLocal(zoom_index, coordinate_x, coordinate_y);
            }
        }
        console.log(json_array);

        loopCoordinatesJson(zoom_index, json_array);
    }
}



function saveWindSurfaceImage(wind_images_array, )
{
    var wind_images_item = wind_images_array[wind_images_array_index];
    var date_year = wind_images_item[0];
    var date_month = wind_images_item[1];
    var date_day = wind_images_item[2];
    var date_hour =wind_images_item[3];
    var m1 = wind_images_item[4];
    var m2 = wind_images_item[5];
    var m3 = wind_images_item[6];

    var extra_url = date_year + '/' + date_month + '/' + date_day + '/' + date_hour + '/'
        + m1 + '/' + m2 + '/' + m3 + '/' + 'wind-surface.jpg';
    var wind_surface_url = 'https://ims.windy.com/ecmwf-hres/' + extra_url;
    var fileName = extra_url;
        
    var image = new Image();
    image.crossOrigin = "Anonymous";
    image.onload = function() {
        saveBase64AsFile(imageToBase64(image), fileName);
    };
    image.src = wind_surface_url;
}

var wind_images_array_index = 0;
function loopWindSurfaceImages(wind_images_array)
{
    wind_images_array_length = wind_images_array.length;
    setTimeout(function(){
        saveWindSurfaceImage(wind_images_array, wind_images_array_index);
        wind_images_array_index ++;
        if (wind_images_array_index < wind_images_array_length) {
            loopWindSurfaceImages(wind_images_array);
        }
    }, 500);
}
function setZero(integer){
    if(integer < 10){
        return '0' + integer;
    }
    return integer;
}

var date = new Date();
var years = [date.getFullYear()]; // just this year
var months = [setZero(date.getMonth() + 1)]; // just this month
var days = []; // 10 days later
for(i=1;i < 6; i++){
    days.push(setZero(date.getDate() + i));
}
days = ['10'];
months = ['10'];
var hours = ['00', '03', '06', '09', '12', '15', '18', '21']; // just after now to 6 days
// var hours = ['00', '06', '12', '18']; // just after now 6 - 10 days
// var hours = ['12']; // just after now 6 - 10 days
var zooms = ['257w2', '257w3', '257w4']; // 257w2 -> zoom ta 4 257w3 zoom ta 7  
var coordinates_257w2 = [0,1,2,3];
var coordinates_257w3 = [0,1,2,3,4,5,6,7];
var coordinates_257w4 = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];

function saveWindSurfaceImageToLocal(init_zoom, maximum_zoom){
    wind_images_array = [];
    years.forEach(function(year){
        months.forEach(function(month){
            days.forEach(function(day){
                hours.forEach(function(hour){
                    zooms.forEach(function(zoom){
                        if(zoom === '257w2'){
                            coordinates = coordinates_257w2;
                        }else if(zoom === '257w3'){
                            coordinates = coordinates_257w3;
                        }else if(zoom === '257w4'){
                            coordinates = coordinates_257w4;
                        }
                        coordinates.forEach(function(coordiante_x){
                            coordinates.forEach(function(coordiante_y){
                                wind_images_array.push([year, month, day, hour, zoom, coordiante_x, coordiante_y]);
                            });
                        });
                    });
                });
            });
        });
    });
    console.log(wind_images_array);
    loopWindSurfaceImages(wind_images_array);
}


function getServerTilesImageSource(coord, zoom) {
    // return "/cdn/images/front/themes/4-windy/map/tiles/" 
    return "/cdn/images/front/themes/4-windy/map/tiles-windy/" 
        + zoom + "_" + coord.x + "_" + coord.y + ".png";
}

function initMap() {
    var element = document.getElementById("map");
    var map = new google.maps.Map(element, {
        center: new google.maps.LatLng(35.902254, 51.561850),
        zoom: 4,
        mapTypeId: "MyGmap",
    });
    map.mapTypes.set("MyGmap", new google.maps.ImageMapType({
        getTileUrl: getServerTilesImageSource,
        tileSize: new google.maps.Size(256, 256),
        name: "MyGmap",
        maxZoom: 15
    }));
}
saveLabelsToLocal(9, 10) ;
// saveImagesToLocal(10, 11);
// saveWindSurfaceImageToLocal(1, 2);
// initMap();
