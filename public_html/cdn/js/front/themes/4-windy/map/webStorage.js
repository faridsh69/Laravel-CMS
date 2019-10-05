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
    }, 100);
}

function saveImagesToLocal(init_zoom, maximum_zoom){
    for(var zoom_index = init_zoom;zoom_index < maximum_zoom; zoom_index++){
        var maximum_coordinate = 1; 
        for(var maximum_loop_index = 0; maximum_loop_index < zoom_index; maximum_loop_index++){
            maximum_coordinate = maximum_coordinate * 2;
        }
        maximum_coordinate = maximum_coordinate - 1;
        images_array = [];
        for(coordinate_x = 0; coordinate_x <= maximum_coordinate; coordinate_x ++){
            for(coordinate_y = 0; coordinate_y <= maximum_coordinate; coordinate_y ++){
                images_array.push(coordinate_x + '_' + coordinate_y);
            }
        }

        loopCoordinates(zoom_index, images_array);
    }
}
// saveImagesToLocal(7, 8);

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

var coordinate_index = 0;
function loopCoordinatesJson(zoom_index, json_array)
{
    coordinate_length = json_array.length;
    setTimeout(function(){
        saveJsonToLocalLoop(zoom_index, json_array, coordinate_index);
        coordinate_index ++;
        if (coordinate_index < coordinate_length) {
            loopCoordinatesJson(zoom_index, json_array);
        }
    }, 200);
}

function saveLabelsToLocal(init_zoom, maximum_zoom){
    for(var zoom_index = init_zoom;zoom_index < maximum_zoom; zoom_index++){
        var maximum_coordinate = 1; 
        for(var maximum_loop_index = 0; maximum_loop_index < zoom_index; maximum_loop_index++){
            maximum_coordinate = maximum_coordinate * 2;
        }
        maximum_coordinate = maximum_coordinate - 1;
        json_array = [];
        for(coordinate_x = 0; coordinate_x <= maximum_coordinate; coordinate_x ++){
            for(coordinate_y = 0; coordinate_y <= maximum_coordinate; coordinate_y ++){
                json_array.push(coordinate_x + '_' + coordinate_y);
                // this command will save images with browser
                // saveJsonToLocal(zoom_index, coordinate_x, coordinate_y);
            }
        }

        loopCoordinatesJson(zoom_index, json_array);
    }
}
saveLabelsToLocal(5, 6);

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
// initMap();
