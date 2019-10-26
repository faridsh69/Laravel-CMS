<!DOCTYPE html>
<html lang="en" id="device-mobile">

<head>
    <title>Windy: Wind map &amp; weather forecast</title>
    <base href="/">
    <link rel="canonical" href="/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,viewport-fit=cover">
    <link href="/v/index.css" rel="stylesheet" type="text/css">
    <script>
        window.W = {
            version: "21.4.2",
            assets: "20",// "19.15.0.ind.4a35", // 21.4.2.ind.f3ff
            target: "index",
            build: "2019-10-25, 09:12",
            startTs: Date.now()
        };
        try {
            1204 < window.screen.width && (document.documentElement.id = "device-desktop")
        } catch (e) {}
    </script>
    <meta name='minifest-ecmwf-hres' content='{"v":"2.0","ref":"2019-06-21T12:00:00Z","update":"2019-06-21T19:34:37Z","dst":[[3,3,144],[6,150,240]]}'>
    <meta name="model" content="ecmwf">
    <meta name="geoip" content="86.55.66.215,35.6961,51.4231,IR,">
    <meta name="token" content="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE1NjExNzU3NjUsImluZiI6eyJpcCI6Ijg2LjU1LjY2LjIxNSIsInVhIjoiTW96aWxsYVwvNS4wIChXaW5kb3dzIE5UIDYuMTsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXRcLzUzNy4zNiAoS0hUTUwsIGxpa2UgR2Vja28pIENocm9tZVwvNzUuMC4zNzcwLjEwMCBTYWZhcmlcLzUzNy4zNiJ9LCJleHAiOjE1NjEzNDg1NjV9.nm-0Hf82FnIjVTSxEOY3t33vSMcrRgpN66rtlDDGhFE">
    <script src="/v/leaflet140_patched_tileLayer.v14.js"></script>
    <script>
        window.Promise || document.write('<script src="js/promise.v10.js"><\/script>')
    </script>

    <script src="/v/index.js"></script>
    <link rel="dns-prefetch" href="https://node.windy.com">
    <link rel="dns-prefetch" href="https://tiles.windy.com">
    <link rel="dns-prefetch" href="https://ims.windy.com">
    <meta name="description" content="Weather radar, wind and waves forecast for kiters, surfers, paragliders, pilots, sailors and anyone else. Worldwide animated weather map, with easy to use layers and precise spot forecast. METAR, TAF and NOTAMs for any airport in the World. SYNOP codes from weather stations and buoys. Forecast models ECMWF, GFS, NAM and NEMS">
    <meta name="keywords" content="Windyty, Windytv, windy app, wind map, windfinder, windguru, wind forecast, weather forecast, GFS, ECMWF, NEMS, METAR, TAF">
    <meta name="author" content="Windyty, SE">
    <meta name="application-name" content="Windy.com">
    <meta property="fb:app_id" content="426030704216458">
    <meta property="og:title" content="Windy as forecasted">
    <meta property="og:type" content="article">
    <meta property="og:image" content="https://www.windy.com/img/socialshare3.jpg">
    <meta property="og:url" content="https://www.windy.com/">
    <meta property="og:description" content="Wind map and weather forecast">
    <meta property="og:site_name" content="Windy.com/">
    <meta property="article:published_time" content="">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Windy as forecasted">
    <meta name="twitter:site" content="@windyforecast">
    <meta name="twitter:creator" content="@windyforecast">
    <meta name="twitter:url" content="https://www.windy.com/">
    <meta name="twitter:description" content="Wind map and weather forecast">
    <meta name="twitter:image" content="https://www.windy.com/img/socialshare3.jpg">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
    <meta name="msapplication-TileColor" content="#666666">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/kfboghlfmbkcjhddfklnbpobkajncacl">
    <meta name="apple-itunes-app" content="app-id=1161387262">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#9D0300">
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
                <input type="text" id="q" data-placeholder="SEARCH" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off">
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