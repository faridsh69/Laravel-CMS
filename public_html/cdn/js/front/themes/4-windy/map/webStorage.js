function LocalStorageWebStorageImpl() {
    this.webStorageType = 'localStorage';

    this.getItem = function(name) {
        // console.log('*** getItem ***', name, localStorage.getItem(name));
        return localStorage.getItem(name);
    };

    this.setItem = function(name, value) {
        localStorage.setItem(name, value);
    };

    this.clear = function() {
        console.log(localStorage);
        localStorage.clear();
    };
}

function WebStorageFactory() {
    var webStorage = null;

    if (window.localStorage) {
        webStorage = new LocalStorageWebStorageImpl();
    } else {
        alert("Your browser don't support localStorage");
    }

    this.getWebStorage = function() {
        return webStorage;
    }
}

var webStorage = new WebStorageFactory().getWebStorage();



// var zoom_tiles = [
//     {zoom: 1, max: 1},
//     {zoom: 2, max: 3}, // 9
//     {zoom: 3, max: 7}, // 58
//     {zoom: 4, max: 15}, // 283
//     {zoom: 5, max: 31},
//     {zoom: 6, max: 63},
//     {zoom: 7, max: 127},
//     {zoom: 8, max: 255},
//     {zoom: 9, max: 511},
//     {zoom: 10, max: 1023},
// ];
// function loadImageToWebStorage(zoom, x, y){
//     // az to address cache/9/53_35.png ye image misaze bad age load beshe michine to storage
//     // var url = "cache/" + zoom + "/" + x + "_" + y + ".png";
//     var url = "http://mt0.googleapis.com/vt?src=apiv3&x=" + x + "&y=" + y + "&z=" + zoom;
//     var image = new Image();
//     image.crossOrigin = "Anonymous";
//     i++;
//     image.onload = function() {
//         console.log(i);
//         webStorage.setItem([zoom, x, y].join('_'), imageToBase64(image));
//     };
//     image.src = url;
// }









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
        saveBase64AsFile(imageToBase64(image), fileName);
    };
    image.src = url;
}


function getGmapTileImgSrc(coord, zoom) {
    return "http://mt0.googleapis.com/vt?src=apiv3&x=" + coord.x + "&y=" + coord.y + "&z=" + zoom;
}

function getServerTilesImageSource(coord, zoom) {
    return "/cdn/images/test/map/tiles/" + zoom + "_" + coord.x + "_" + coord.y + ".png";
}

function saveImagesToLocal(){
    for(var zoom_index = 7;zoom_index < 8; zoom_index++){
        var maximum_coordinate = 1; 
        for(var maximum_loop_index = 0; maximum_loop_index < zoom_index; maximum_loop_index++){
            maximum_coordinate = maximum_coordinate * 2;
        }
        maximum_coordinate = maximum_coordinate - 1;
        console.log(maximum_coordinate);
        for(coordinate_x = 70; coordinate_x <= 80; coordinate_x ++){
            for(coordinate_y = 45; coordinate_y <= 55; coordinate_y ++){
                saveImageToLocal(zoom_index, coordinate_x, coordinate_y);
            }
        }
    }
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
// saveImagesToLocal();
initMap();


// function getOsmTileImgSrc(coord, zoom) {
//     return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
// }


// map.mapTypes.set("OSM", new google.maps.ImageMapType({
//     getTileUrl: getOsmTileImgSrc,
//     tileSize: new google.maps.Size(256, 256),
//     name: "OSM",
//     maxZoom: 15
// }));

// function getLocalTileImgSrc(coord, zoom) {
//     return "cache/" + zoom + "/" + coord.x + "_" + coord.y + ".png";
// }

// function getWebStorageTileImgSrc(coord, zoom) {
//     return webStorage.getItem([zoom, coord.x, coord.y].join('_'));
// }



// map.mapTypes.set("LocalGmap", new google.maps.ImageMapType({
//     getTileUrl: getLocalTileImgSrc,
//     tileSize: new google.maps.Size(256, 256),
//     name: "LocalGmap",
//     maxZoom: 15
// }));

// map.mapTypes.set("WebStorageGmap", new google.maps.ImageMapType({
//     getTileUrl: getWebStorageTileImgSrc,
//     tileSize: new google.maps.Size(256, 256),
//     name: "WebStorageGmap",
//     maxZoom: 15
// }));

// map.mapTypes.set("LocalMyGmap", new google.maps.ImageMapType({
//     getTileUrl: function(coord, zoom) {
//         return checkTileInSprites(coord, zoom) ?
//             getLocalTileImgSrc(coord, zoom) :
//             getGmapTileImgSrc(coord, zoom);
//     },
//     tileSize: new google.maps.Size(256, 256),
//     name: "LocalMyGmap",
//     maxZoom: 15
// }));

// map.mapTypes.set("WebStorageMyGmap", new google.maps.ImageMapType({
//     getTileUrl: function(coord, zoom) {
//         var image = getWebStorageTileImgSrc(coord, zoom);
//         return image ? image :  getGmapTileImgSrc(coord, zoom);
//     },
//     tileSize: new google.maps.Size(256, 256),
//     name: "WebStorageMyGmap",
//     maxZoom: 15
// }));



















// function CustomControl(controlDiv, map, title, handler) {
//     controlDiv.style.padding = '5px';

//     var controlUI = document.createElement('DIV');
//     controlUI.style.backgroundColor = 'white';
//     controlUI.style.borderStyle = 'solid';
//     controlUI.style.borderWidth = '2px';
//     controlUI.style.cursor = 'pointer';
//     controlUI.style.textAlign = 'center';
//     controlUI.title = title;
//     controlDiv.appendChild(controlUI);

//     var controlText = document.createElement('DIV');
//     controlText.style.fontFamily = 'Arial,sans-serif';
//     controlText.style.fontSize = '12px';
//     controlText.style.paddingLeft = '4px';
//     controlText.style.paddingRight = '4px';
//     controlText.innerHTML = title;
//     controlUI.appendChild(controlText);

//     google.maps.event.addDomListener(controlUI, 'click', handler);
// }

// var clearWebStorageDiv = document.createElement('DIV');
// var clearWebStorageButton = new CustomControl(clearWebStorageDiv, map,
//     'Clear Web Storage',  clearWebStorage);

// var prepareWebStorageDiv = document.createElement('DIV');
// var prepareWebStorageButton = new CustomControl(prepareWebStorageDiv, map,
//     'Prepare Web Storage', prepareWebStorage);

// clearWebStorageDiv.index = 1;
// prepareWebStorageDiv.index = 1;
// map.controls[google.maps.ControlPosition.TOP_RIGHT].push(clearWebStorageDiv);
// map.controls[google.maps.ControlPosition.TOP_RIGHT].push(prepareWebStorageDiv);


// google.maps.event.addListener(map, 'click', function(point) {
//     var marker = new google.maps.Marker({
//         position: point.latLng,
//         map: map
//     });

//     google.maps.event.addListener(marker, 'dblclick', function() {
//         marker.setMap(null);
//     });

//     google.maps.event.addListener(marker, 'click', function() {
//         new google.maps.InfoWindow({
//             content: 'lat: ' + point.latLng.lat() + '<br>lng:' + point.latLng.lng()
//         }).open(map, marker);
//     });
// });

// function prepareWebStorage() {
//     console.log('*** prepareWebStorage ***');
//     for (var zoom in spriteRanges) {
//         if (zoom > max_zoom) {
//             break;
//         }
//         var sprites = spriteRanges[zoom];
//         for (var x=sprites.tl.x; x<=sprites.br.x; x++) {
//             for (var y=sprites.tl.y; y<=sprites.br.y; y++) {
//                 loadImageToWebStorage(zoom, x, y);
//             }
//         }
//     }
// }

// var spriteRanges = {
//     // tl = top_left
//     // br = bottom_right
//     // {zoom: {tl: {}, br: {}}
//     0: {
//         tl: {x: 0, y: 0},
//         br: {x: 0, y: 0}
//     },
//     1: {
//         tl: {x: 1, y: 0},
//         br: {x: 1, y: 0}
//     },
//     2: {
//         tl: {x: 2, y: 1},
//         br: {x: 2, y: 1}
//     },
//     3: {
//         tl: {x: 4, y: 2},
//         br: {x: 4, y: 2}
//     },
//     4: {
//         tl: {x: 9, y: 5},
//         br: {x: 9, y: 5}
//     },
//     5: {
//         tl: {x: 18, y: 10},
//         br: {x: 18, y: 10}
//     },
//     6: {
//         tl: {x: 36, y: 20},
//         br: {x: 36, y: 20}
//     },
//     7: {
//         tl: {x: 73, y: 41},
//         br: {x: 73, y: 41}
//     },
//     8: {
//         tl: {x: 147, y: 82},
//         br: {x: 147, y: 82}
//     },
//     9: {
//         tl: {x: 294, y: 164},
//         br: {x: 295, y: 164}
//     },
//     10: {
//         tl: {x: 589, y: 328},
//         br: {x: 591, y: 329}
//     },
//     11: {
//         tl: {x: 1179, y: 657},
//         br: {x: 1182, y: 659}
//     },
//     12: {
//         tl: {x: 2358, y: 1315},
//         br: {x: 2364, y: 1319}
//     },
//     13: {
//         tl: {x: 4717, y: 2630},
//         br: {x: 4728, y: 2639}
//     },
//     14: {
//         tl: {x: 9439, y: 5262},
//         br: {x: 9452, y: 5277}
//     },
//     15: {
//         tl: {x: 18878, y: 10525},
//         br: {x: 18905, y: 10554}
//     },
//     16: {
//         tl: {x: 37757, y: 21051},
//         br: {x: 37810, y: 21108}
//     }
// };

// var max_zoom = 13;

// function checkTileInSprites(coord, zoom) {
//     var sprites = spriteRanges[zoom];
//     return sprites.tl.x <= coord.x && coord.x <= sprites.br.x && sprites.tl.y <= coord.y && coord.y <= sprites.br.y;
// }

