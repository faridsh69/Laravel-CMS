<!DOCTYPE html>
<html lang="fa" id="device-desktop">
<head>
    <title>Nahaja Map</title>
    <base href="/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,viewport-fit=cover">
    <link href="/v/index.css" rel="stylesheet" type="text/css">
    <script>
        window.W = {
            version: "20", // 21.4.2
            assets: "20",// "19.15.0.ind.4a35", // 21.4.2.ind.f3ff
            target: "index",
            build: "2019-10-25, 09:12",
            startTs: Date.now()
        };
    </script>
    <meta name='minifest-ecmwf-hres' content='{"v":"2.0","ref":"2019-06-21T12:00:00Z","update":"2019-06-21T19:34:37Z","dst":[[3,3,144],[6,150,240]]}'>
    <meta name="model" content="ecmwf">
    <meta name="geoip" content="86.55.66.215,35.6961,51.4231,IR,">
    <meta name="token" content="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE1NjExNzU3NjUsImluZiI6eyJpcCI6Ijg2LjU1LjY2LjIxNSIsInVhIjoiTW96aWxsYVwvNS4wIChXaW5kb3dzIE5UIDYuMTsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXRcLzUzNy4zNiAoS0hUTUwsIGxpa2UgR2Vja28pIENocm9tZVwvNzUuMC4zNzcwLjEwMCBTYWZhcmlcLzUzNy4zNiJ9LCJleHAiOjE1NjEzNDg1NjV9.nm-0Hf82FnIjVTSxEOY3t33vSMcrRgpN66rtlDDGhFE">
    <script src="/v/leaflet140_patched_tileLayer.v14.js"></script>
    <script>
        window.Promise || document.write('<script src="js/promise.v10.js"><\/script>')
    </script>
    <script src="/v/index_map.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico">
    <style>
        .progress-bar{
            display: none;
        }
        #menu-burger2{
            display: none;
        }
        .search-input{
            display: none;
        }
        #fav{
            display: none !important;
        }
        #share{
            display: none !important;
        }
        #product-switch{
            display: none !important;
        }
        #pois-switch{
            display: none !important;
        }
        #info-icon{
            display: none !important;
        }
        #rh-icons{
            display: none !important;
        }
        #isolines{
            display: none !important;
        }
        .mobilehide{
            display: none !important;
        }
    </style>
</head>

<body class="onweather">
    <div id="map-container" style="position: fixed; top: 0; bottom: 0; left: 0; right: 0; width: 100vw; height: 100vh;" class="noselect"></div><a id="contrib" class="mobilehide" href="http://www.openstreetmap.org/copyright">(c) OSM &amp; contributors</a>
    <div id="bottom" class="shy left-border right-border bottom-border">
        <div id="progress-bar" class="progress-bar">
            <div class="progress-line">
                <div class="played"></div>
                <div class="avbl"></div><i></i></div>
            <div class="timecode ghost-timecode">
                <div class="box"></div>
            </div>
            <div data-title="D_LT2" class="timecode main-timecode">
                <div class="box"></div>
                <div class="loading ld-lgray size-l loader-path"></div>
            </div>
            <div id="playpause" class="play-pause iconfont clickable"></div>
            <div id="calendar"></div>
        </div>
        <div id="accumulations" class="size-s fg-yellow"><span id="acc-title-rain" data-t="RAINACCU" class="capitalize"></span> <span id="acc-title-snow" data-t="SNOWACCU" class="capitalize"></span>
            <div class="ui-switch noselect notap"></div>
        </div>
        <div id="mobile-calendar">
            <div id="timecode-mobile" data-title="D_LT2" class="timecode">
                <div id="mobile_box" class="box"></div>
                <div class="loading ld-lgray size-l loader-path"></div>
            </div>
            <div id="days"></div>
            <div id="playpause-mobile" class="play-pause iconfont bottom-border"></div>
        </div>
        <div id="legend-mobile" class="metric-legend bottom-border"></div>
    </div>
    <div id="bottom-credits" class="mobilehide inlined" data-icon-after="k" data-t="DEVELOPED"></div>
    <div data-plugin="detail-rhpane"></div>
    <ul id="mobile-menu" class="bottom-border">
        <li data-do="title" data-icon="]" id="mm-home"><span data-t="HOME"></span></li>
        <li data-do="rqstOpen,menu" class="mm-menu" data-icon="d"><span data-t="MENU"></span></li>
        <li data-do="search" data-icon="&#xe02c;"><span data-t="JUST_SEARCH"></span></li>
        <li class="mm-favs" data-do="rqstOpen,favs" data-icon="m"><span data-t="MENU_FAVS"></span> <img class="avatar">
            <div class="alerts-num"></div>
        </li>
    </ul>
    <div id="logo-wrapper" class="top-border left-border right-border">
        <a id="logo" target="_top" class="clickable noselect notap" data-do="title">
            <div class="w-sprite" style="display: none;"></div><img class="text" alt="Windy.com" src="img/logo201802/logo-text-windycom-white.png"></a>
    </div>
    <a id="open-in-app" data-do="openapp" class="top-border" data-t="MENU_MOBILE"></a>
    <div id="plugins" class="shy"></div>
    <div id="search" class="shy left-border top-border">
        <div id="search-weather-bg">
            <div id="search-top-wrapper">
                <div id="menu-burger2" class="mobilehide tooltip-down" data-tooltipsrc="MENU" data-do="toggle,lhpane">
                    <div class="iconfont clickable-size">d</div>
                </div>
                <input type="text" id="q" data-placeholder="SEARCH" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" class="search-input">
                <div id="share" class="mobilehide tooltip-down iconfont" data-tooltipsrc="SHARE" data-do="share">F</div>
                <div id="fav" class="noselect shy">
                    <div class="fav-line fav-off iconfont clickable-size tooltip-down" data-do="rqstOpen,fav-alert-menu" data-tooltipsrc="D_FAVORITES">m</div>
                    <div class="fav-line fav-on iconfont clickable-size tooltip-down" data-do="rqstOpen,fav-alert-menu" data-tooltipsrc="D_FAVORITES2">k</div><span data-plugin="fav-alert-menu"></span></div>
                <div id="search-my-loc" class="noselect shy iconfont">j</div>
                <div class="delete iconfont">[</div>
                <div class="cancel-search iconfont">&#xe013;</div>
            </div><span data-plugin="weather" style="display: none;"></span></div>
        <div id="warnings" class="weather-box animation flex-container" style="display: none;"></div>
        <div id="articles" class="weather-box animation" style="display: none;"></div>
        <div class="results waiting" style="display: none;">
            <div class="results-data"></div>
            <div class="results-img"><img data-do="hit"></div>
        </div>
    </div>
    <div id="mobile-ovr-info" class="top-border right-border uiyellow inlined noselect"></div>
    <div id="rh-icons" class="shy top-border right-border"><span data-plugin="user"></span>
        <div id="login" data-do="login" data-icon="p" data-t="JUST_LOGIN" class="clickable-size mobilehide"></div>
    </div>
    <div id="not-supported" style="display:none;">Your browser is not supported. Please use the latest verion of Chrome, Firefox or Safari</div>
    <div id="unlegal-embed" class="fullscreen bg-red" style="display: none;"><a href="https://www.windy.com" class="size-xxxl" target="_top">www.windy.com</a></div>
</body>

</html>