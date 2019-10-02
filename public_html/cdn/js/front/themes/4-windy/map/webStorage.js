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
    var url = "http://mt0.googleapis.com/vt?src=apiv3&x=" + x + "&y=" + y + "&z=" + zoom;
    var image = new Image();
    image.crossOrigin = "Anonymous";
    image.onload = function() {
        // imageToBase64 will create base64 of images
        // saveBase64AsFile will create a link for download image
        saveBase64AsFile(imageToBase64(image), fileName);
    };
    image.src = url;
}

function saveImagesToLocal(init_zoom, maximum_zoom){
    for(var zoom_index = init_zoom;zoom_index < maximum_zoom; zoom_index++){
        var maximum_coordinate = 1; 
        for(var maximum_loop_index = 0; maximum_loop_index < zoom_index; maximum_loop_index++){
            maximum_coordinate = maximum_coordinate * 2;
        }
        maximum_coordinate = maximum_coordinate - 1;
        console.log(maximum_coordinate);
        for(coordinate_x = 70; coordinate_x <= 80; coordinate_x ++){
            for(coordinate_y = 45; coordinate_y <= 55; coordinate_y ++){
                // this command will save images with browser
                saveImageToLocal(zoom_index, coordinate_x, coordinate_y);
            }
        }
    }
}
// saveImagesToLocal(7, 8);

function getServerTilesImageSource(coord, zoom) {
    return "/cdn/images/front/themes/4-windy/map/tiles/" + zoom + "_" + coord.x + "_" + coord.y + ".png";
}

function initMap() {
    var element = document.getElementById("map");
    var map = new google.maps.Map(element, {
        center: new google.maps.LatLng(35.902254, 51.561850),
        zoom: 7,
        mapTypeId: "MyGmap",
    });
    map.mapTypes.set("MyGmap", new google.maps.ImageMapType({
        getTileUrl: getServerTilesImageSource,
        tileSize: new google.maps.Size(256, 256),
        name: "MyGmap",
        maxZoom: 15
    }));
}
initMap();
