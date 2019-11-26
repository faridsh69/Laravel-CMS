W.tag("rplanner", '<div class="progress-bar noselect" data-ref="pbar"><div class="progress-line"><div class="played"></div><div class="avbl"></div><i></i></div><div class="timecode ghost-timecode noselect desktop-timecode" style="opacity:0;"><div class="box"></div></div><div class="timecode main-timecode noselect desktop-timecode"><div class="box"></div><div class="loading ld-lgray size-l loader-path"></div></div></div><div class="rplanner-calendar" data-ref="calendar"></div><div class="not-in-sync animation" data-icon="&#xE02F;" data-ref="notInSync">Map is not in sync <small>Route planner supports only the ECMWF forecast model, but you are displaying a different model on the map.</small><div class="buttons"><span data-do="sync,ok" class="button btn-white size-s">Ok</span> <span data-do="sync,switch" class="button btn-white size-s">Switch to ECMWF</span></div></div><div data-ref="wrapper" class="table-wrapper show noselect notap"><div class="legend-wrapper"><div class="legend" data-ref="legend"></div></div><div data-ref="noElevation" class="rplanner-info-text no-elevation size-l fg-gray"><i data-icon="&#xe028;" class="size-xxxl"></i><br>No elevation at all. It seems to be a boat trip.</div><div class="data-table noselect flex-container" data-ref="dataTable"><div data-ref="needMorePoints" class="rplanner-info-text size-xxl fg-red">Click on the map to add more waypoints</div><div data-ref="error" class="rplanner-info-text size-xxl fg-red">Some error occured. Please, try it again.</div><div class="forecast-table grab animation show" data-ref="forecastTable"><canvas data-ref="canvas" class="grab"></canvas><svg data-ref="svg" class="rplanner-adjust-top nomouse"></svg><div data-ref="sliderLine" class="rplanner-slider nomouse animation"></div><div data-ref="sliderDot" class="rplanner-dot nomouse animation"></div><div data-ref="sliderInfo" class="rplanner-info nomouse animation"></div></div></div><div id="rp-infobox" class="size-xl fg-gray" data-ref="distance" class="centered size-xxl"></div></div><div id="rplanner-box"><div class="transparent-switch compact size-m" data-ref="display"><div>Load route forecast for:</div><div data-do="set,elevation" class="inlined" data-icon="n">Elevation</div><div data-do="set,car" class="inlined" data-icon="&#xe040;">Car, hiking</div><div data-do="set,airgram" class="inlined" data-icon="|">Airgram</div><div data-do="set,vfr" class="inlined" data-icon=":">VFR</div><div data-do="set,ifr" class="inlined" data-icon="Q">IFR</div><div data-do="set,boat" class="inlined" data-icon="&#xe028;">Boat</div></div><div class="rplanner-dirs notap noselect">Directions&nbsp;<div data-ref="numDirection" class="drop-down-menu open-up noselect notap"><ul class="animation"><li data-do="set,horizontal">from left to right</li><li data-do="set,vertical">from bottom to top</li><li data-do="set,north">north up</li></ul></div></div><a class="rplanner-test inlined fg-red" data-do="url,https://community.windy.com/topic/9013" data-icon-after="L">This is a <b>beta version</b></a></div><div id="route-detail-container"><span data-do="routeDetail" class="button btn-red size-s">Route detail</span></div><div class="loading size-ultra full show" data-ref="loader"></div>', '.onrplanner #rh-bottom,.onrplanner #bottom,.onrplanner #weather,.onrplanner #share,.onrplanner #mobile-menu,.onrplanner #poismodel{display:none}.onrplanner #rhpane{margin-bottom:10px;margin-top:10px}.onrplanner #rhpane #ovr-menu{display:none}.onrplanner #rhpane #overlay{margin-bottom:15px}.onrplanner .picker .picker-content span{padding-right:20px}.onrplanner .picker .picker-content .picker-share,.onrplanner .picker .picker-content .picker-link{display:none}#device-mobile .onrplanner #logo,#device-mobile .onrplanner #plugin-picker,#device-mobile .onrplanner #user{display:none !important}@media screen and (max-height:400px){.onrplanner #search{display:none}}.onrplanner #map-container{cursor:crosshair}.onrplanner #map-container .labels-layer [data-id],.onrplanner #map-container .windy-pois [data-id]{pointer-events:none}.onrplanner #map-container .windy-pois{opacity:.7}#map-container .distance-icon div,#map-container .distance-icon span{border:2.5px solid transparent;background-clip:padding-box;height:22px;overflow:hidden;padding-top:.5px}#map-container .distance-icon div{text-align:center;width:22px;border-radius:22px;cursor:move;background-color:#9D0300;font-weight:bold;font-size:11px}#map-container .distance-icon span{background-color:rgba(68,65,65,0.84);cursor:pointer;display:none;width:33px;position:absolute;left:11px;top:0;font-size:15px;z-index:-1;text-align:right;padding-right:2px;border-top-right-radius:22px;border-bottom-right-radius:22px}#map-container .distance-icon:hover span{display:block}#plugin-rplanner{pointer-events:auto;width:100vw;position:relative;z-index:10;transition:margin-bottom .3s ease-in-out;-webkit-transition:margin-bottom .3s ease-in-out;margin-bottom:-110%;font-size:12px;color:#222;box-shadow:content-box}#plugin-rplanner.open{margin-bottom:0}#plugin-rplanner.open .closing-x,#plugin-rplanner.open .progress-bar,#plugin-rplanner.open .rplanner-calendar{opacity:1}#plugin-rplanner .closing-x,#plugin-rplanner .progress-bar,#plugin-rplanner .rplanner-calendar{display:block;opacity:0}#device-tablet #plugin-rplanner .closing-x,#device-desktop #plugin-rplanner .closing-x{font-size:40px;top:-1.1em;left:.1em;right:initial}#plugin-rplanner .progress-bar,#plugin-rplanner .rplanner-calendar{left:140px;position:absolute;right:160px;bottom:100%}#plugin-rplanner .progress-bar{height:12px;margin-bottom:21px;opacity:0;transition:opacity .1s ease-in-out .1s}#plugin-rplanner .progress-bar .timecode{font-size:13px}#plugin-rplanner .rplanner-calendar{height:26px;white-space:nowrap}#plugin-rplanner .rplanner-calendar div{pointer-events:none;display:inline-block;box-sizing:border-box;text-align:left;padding:6px 0 0 8px;font-size:12px;line-height:1;height:26px;white-space:nowrap;overflow:hidden}#plugin-rplanner .rplanner-calendar div:not(:first-child){border-left:1px solid rgba(68,65,65,0.84)}#plugin-rplanner .table-wrapper{white-space:nowrap;position:relative;overflow:hidden;transition:height .1s ease-in-out;height:110px}#plugin-rplanner .table-wrapper .legend-wrapper{width:140px;height:100%;position:relative;float:left}#plugin-rplanner .table-wrapper .legend-wrapper .legend{width:140px;height:100%;transition:none;-webkit-transition:none}#plugin-rplanner .table-wrapper .legend-wrapper .legend>div{right:5px}#plugin-rplanner .table-wrapper .legend-wrapper .legend .l-rc-rain{color:blue}#plugin-rplanner .table-wrapper .legend-wrapper .legend .l-rc-conv{color:#a038bf}#plugin-rplanner .table-wrapper .legend-wrapper .legend .l-rc-snow{color:#4d9ab3}#plugin-rplanner .table-wrapper .legend-wrapper .legend .legend-left{width:100px;max-width:100px}#plugin-rplanner .table-wrapper #rp-infobox{display:block;position:absolute;left:0;width:140px;top:15px;text-align:center}#plugin-rplanner .table-wrapper #rp-infobox span{color:black}#plugin-rplanner .table-wrapper #rp-infobox .gain-loss{text-align:left;display:inline-block;margin-top:10px;line-height:2}#plugin-rplanner .table-wrapper #rp-infobox .gain-loss [data-tooltip]{cursor:unset}#plugin-rplanner .table-wrapper #rp-infobox .metric-clickable{padding:0 .3em}#plugin-rplanner .table-wrapper #rp-infobox [data-do="metric,distance"]{border-bottom:1px dotted rgba(0,0,0,0.45);text-decoration:none;padding:0;margin-left:6px}#plugin-rplanner .table-wrapper #rp-infobox [data-do="metric,distance"]::after{font-size:.7em;opacity:.3;margin-left:.2em;top:0}#plugin-rplanner .table-wrapper::before,#plugin-rplanner .table-wrapper::after{pointer-events:none;opacity:0;position:absolute;top:0;height:calc(100% - 41px);width:40px;overflow:hidden;z-index:45;content:\'\';transition:opacity .2s ease-in-out}#plugin-rplanner .table-wrapper::after{right:0;background:linear-gradient(to right, rgba(255,255,255,0), rgba(248,248,248,0.9) 75%, rgba(248,248,248,0.9))}#plugin-rplanner .table-wrapper::before{left:140px;background:linear-gradient(to left, rgba(255,255,255,0), rgba(248,248,248,0.9) 75%, rgba(248,248,248,0.9))}#plugin-rplanner .table-wrapper .rplanner-info-text{position:absolute;top:50%;left:50%;transform:translateX(-50%) translateY(-50%);display:none}#plugin-rplanner .table-wrapper .rplanner-info-text.no-elevation{margin-left:70px;text-align:center}#plugin-rplanner .table-wrapper .rplanner-info-text.show{display:block}#plugin-rplanner .table-wrapper .data-table{overflow-y:hidden;overflow-x:scroll;-webkit-overflow-scrolling:touch;-webkit-flex-direction:row;-moz-flex-direction:row;flex-direction:row;box-sizing:content-box;position:relative;padding-bottom:45px;margin-bottom:-20px}#plugin-rplanner .table-wrapper .data-table .rplanner-slider{top:0;height:100%;display:block;width:1px;position:absolute;background-color:#d49500}#plugin-rplanner .table-wrapper .data-table .rplanner-dot{top:0;height:8px;width:8px;margin-left:-4px;margin-top:-4px;border-radius:100%;display:block;position:absolute;background-color:#d49500}#plugin-rplanner .table-wrapper .data-table .rplanner-info{top:0;height:100%;display:block;position:absolute}#plugin-rplanner .table-wrapper .data-table .rplanner-info>span{transform:translateX(-50%);font-size:.8em;display:inline-block;background-color:#888;border-radius:3px;padding:2px 4px;color:white;position:absolute}#plugin-rplanner .table-wrapper .data-table .rplanner-info>.distance{top:5px}#plugin-rplanner .table-wrapper .data-table .rplanner-info>.elevation{bottom:5px}#plugin-rplanner .table-wrapper .data-table .forecast-table>canvas{position:relative;display:block;top:0}#plugin-rplanner .table-wrapper .data-table .forecast-table>svg{position:absolute;left:0;top:0;width:100%;height:100%}#plugin-rplanner #rplanner-box{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;border-top:2px solid #e5e5e5;flex-direction:row;-webkit-flex-direction:row;-ms-flex-direction:row;align-items:center;align-content:center;color:#7a7a7a;background-color:#f8f8f8;position:absolute;bottom:0;padding:0 10px;top:inherit;white-space:nowrap;width:calc(100% - 140px);height:40px;left:140px}#plugin-rplanner #rplanner-box .transparent-switch{color:inherit}#plugin-rplanner #rplanner-box .transparent-switch div:first-child{display:none}#plugin-rplanner #rplanner-box .transparent-switch div::before{color:#9D0300;top:.175em}#plugin-rplanner #rplanner-box .transparent-switch .selected{background-color:#9D0300;color:white}#plugin-rplanner #rplanner-box .transparent-switch .selected::before{color:white}#plugin-rplanner #rplanner-box .checkbox{white-space:pre-wrap;text-align:center;font-size:.8em;line-height:1;color:#9D0300;float:right;margin-left:2em;display:none}#plugin-rplanner #rplanner-box .checkbox::before{display:block;padding-bottom:.2em}#plugin-rplanner #rplanner-box .checkbox.off{color:#999}#plugin-rplanner #rplanner-box .rplanner-dirs{margin-left:40px;margin-top:4px}#plugin-rplanner #rplanner-box .rplanner-test{margin-left:auto}@media only screen and (max-width:1000px){#device-desktop #plugin-rplanner #rplanner-box .rplanner-test{display:none}}#plugin-rplanner.has-scroll .table-wrapper::after{opacity:1}#plugin-rplanner.has-scroll-left .table-wrapper::before{opacity:1}#plugin-rplanner[data-view="elevation"][data-has-elevation="false"]:not([data-waypoints="0"]):not([data-waypoints="1"]) .no-elevation{display:block}#plugin-rplanner[data-view="elevation"] #rplanner-box .transparent-switch>div:first-child{display:table-cell}#plugin-rplanner[data-view="elevation"] #rplanner-box .transparent-switch [data-do="set,elevation"]{display:none}#plugin-rplanner[data-view="elevation"] #rplanner-box .rplanner-dirs{display:none}#plugin-rplanner[data-waypoints="0"] #route-detail-container,#plugin-rplanner[data-waypoints="1"] #route-detail-container,#plugin-rplanner[data-waypoints="0"] #rplanner-box,#plugin-rplanner[data-waypoints="1"] #rplanner-box{opacity:.6;pointer-events:none}#plugin-rplanner[data-waypoints="0"] #rplanner-box,#plugin-rplanner[data-waypoints="1"] #rplanner-box,#plugin-rplanner[data-waypoints="0"] #route-detail-container,#plugin-rplanner[data-waypoints="1"] #route-detail-container{display:none}#plugin-rplanner[data-waypoints="0"] .rplanner-info-text,#plugin-rplanner[data-waypoints="1"] .rplanner-info-text{top:55px}#plugin-rplanner[data-waypoints="0"] .table-wrapper,#plugin-rplanner[data-waypoints="1"] .table-wrapper{height:110px !important}#plugin-rplanner[data-waypoints="0"] .table-wrapper .data-table [data-ref="needMorePoints"],#plugin-rplanner[data-waypoints="1"] .table-wrapper .data-table [data-ref="needMorePoints"]{display:block}#plugin-rplanner[data-waypoints="0"] .table-wrapper #rp-infobox,#plugin-rplanner[data-waypoints="1"] .table-wrapper #rp-infobox,#plugin-rplanner[data-waypoints="0"] .table-wrapper .legend-wrapper,#plugin-rplanner[data-waypoints="1"] .table-wrapper .legend-wrapper{display:none}#plugin-rplanner #route-detail-container{position:absolute;bottom:3px;width:140px;text-align:center}#plugin-rplanner #window-route-detail{padding:1.5em;width:330px;left:8px}#plugin-rplanner #window-route-detail::before{right:80%}#plugin-rplanner #window-route-detail::after{right:calc(80% + 1px )}#plugin-rplanner #window-route-detail table{width:100%;margin-bottom:1.5em}#plugin-rplanner #window-route-detail table td{font-size:12px;padding:6px 3px;border-bottom:1px solid rgba(232,232,232,0.18)}#plugin-rplanner #window-route-detail .closing-x{font-size:20px;top:-5px;left:auto;right:-5px}#plugin-rplanner #window-route-detail .dist-ball{width:15px;height:15px;font-size:12px;font-weight:bold;border-radius:7px;line-height:15px;color:white;background-color:#9D0300}#plugin-rplanner .not-in-sync{position:absolute;bottom:100%;margin-bottom:70px;z-index:-10;color:white;background-color:rgba(68,65,65,0.84);padding:.3em 1em;font-size:16px;max-width:300px;line-height:1.4}#plugin-rplanner .not-in-sync .buttons{text-align:center}#plugin-rplanner .not-in-sync small{display:block;font-size:.7em;margin:.5em 0}#plugin-rplanner .not-in-sync::before{padding-right:.3em;position:relative;top:.15em}#plugin-rplanner .legend-warnings .legend-right::before{font-family:iconfont;display:block;content:\'\\e02f\'}', "", function(t) {
    var e = this;
    ! function(t, n, r, i, a, o, s, l, d, h, c, p, f, u, g, v, m, b, w, x, y, k, M, D, T, I) {
        "use strict";
        t = t && t.hasOwnProperty("default") ? t.default : t, n = n && n.hasOwnProperty("default") ? n.default : n, r = r && r.hasOwnProperty("default") ? r.default : r, i = i && i.hasOwnProperty("default") ? i.default : i, a = a && a.hasOwnProperty("default") ? a.default : a, o = o && o.hasOwnProperty("default") ? o.default : o, s = s && s.hasOwnProperty("default") ? s.default : s, l = l && l.hasOwnProperty("default") ? l.default : l, d = d && d.hasOwnProperty("default") ? d.default : d;
        var C = "default" in h ? h.default : h;
        c = c && c.hasOwnProperty("default") ? c.default : c, p = p && p.hasOwnProperty("default") ? p.default : p, f = f && f.hasOwnProperty("default") ? f.default : f, u = u && u.hasOwnProperty("default") ? u.default : u, g = g && g.hasOwnProperty("default") ? g.default : g, v = v && v.hasOwnProperty("default") ? v.default : v, m = m && m.hasOwnProperty("default") ? m.default : m, b = b && b.hasOwnProperty("default") ? b.default : b, w = w && w.hasOwnProperty("default") ? w.default : w, x = x && x.hasOwnProperty("default") ? x.default : x, y = y && y.hasOwnProperty("default") ? y.default : y, k = k && k.hasOwnProperty("default") ? k.default : k, M = M && M.hasOwnProperty("default") ? M.default : M, D = D && D.hasOwnProperty("default") ? D.default : D, T = T && T.hasOwnProperty("default") ? T.default : T, I = I && I.hasOwnProperty("default") ? I.default : I;
        var S = g.instance({
                ident: "rplanner"
            }),
            F = C.distance.convertNumber.bind(C.distance),
            z = L.geodesic([], {
                weight: 4,
                opacity: .8,
                color: "white",
                steps: 40,
                wrap: !1,
                bubblingMouseEvents: !1
            }).on("click", function(t) {
                for (var e = t.latlng, n = e.lat, r = e.lng, i = z.getLatLngs(), a = 1 / 0, o = -1, s = 0; s < i.length; s++)
                    for (var l = 0; l < i[s].length - 1; l++) {
                        var d = i[s][l],
                            h = d.lat,
                            c = d.lng,
                            p = Math.pow(h - n, 2) + Math.pow(c - r, 2);
                        p < a && (a = p, o = s + 1)
                    }
                if (o < 0) return;
                var f = V();
                f.splice(o, 0, {
                    lat: n,
                    lng: r
                }), A(f)
            }).addTo(f),
            P = [],
            W = [],
            N = 0,
            E = !1;
        var A = function(t) {
                Z(), t.map(function(t) {
                    return O(t, !0)
                }), _()
            },
            O = function(t, e) {
                var n = t.lat,
                    r = t.lon,
                    i = t.lng,
                    a = P.length + 1;
                void 0 === r && (r = i);
                var o = '<span data-delete="' + a + '" class="iconfont">&#xe013;</span><div>' + a + "</div>",
                    s = L.divIcon({
                        className: "distance-icon",
                        iconSize: [22, 22],
                        html: o
                    }),
                    l = L.marker([+n, +r], {
                        draggable: !0,
                        icon: s
                    }).on("drag", _).on("click", H).addTo(f);
                P.push({
                    ident: a,
                    marker: l
                }), e || _()
            },
            H = function(t) {
                var e = t.originalEvent,
                    r = parseInt(e && e.target && e.target.dataset.delete);
                if (r) {
                    var i = P.filter(function(t) {
                        return t.ident !== r
                    }).map(function(t) {
                        return t.marker.getLatLng()
                    });
                    0 === i.length && n.emit("rqstClose", "rplanner"), A(i)
                }
            },
            G = function(t) {
                if (Array.isArray(t)) {
                    var e = t[0],
                        n = t[1];
                    O(e.lat, e.lon), O(n.lat, n.lon)
                } else "string" == typeof t && /\d+/.test(t) ? (t.split(";").forEach(function(t) {
                    var e = t.split(","),
                        n = e[0],
                        r = e[1];
                    O({
                        lat: n,
                        lon: r
                    }, !0)
                }), _()) : o.isValidLatLonObj(t) ? O(t) : _();
                z.isEmpty() && P.length && !f.getBounds().contains(P[0].marker.getLatLng()) ? f.panTo(P[0].marker.getLatLng()) : z.isEmpty() || f.fitBounds(z.getBounds(), {
                    animate: !0,
                    paddingTopLeft: [20, 100],
                    paddingBottomRight: [20, 250]
                })
            },
            B = function() {
                for (var t = P.map(function(t) {
                        return t.marker.getLatLng()
                    }), e = [], n = 1; n < t.length; n++) e.push([t[n - 1], t[n]]);
                return e
            },
            V = function() {
                return P.map(function(t) {
                    return t.marker.getLatLng()
                })
            },
            _ = function() {
                var t = B();
                z.setLatLngs(t), Y(t), U(t)
            },
            R = function(t, e) {
                return Math.round(L.CRS.Earth.distance({
                    lat: +t.lat.toFixed(2),
                    lng: +t.lng.toFixed(2)
                }, {
                    lat: +e.lat.toFixed(2),
                    lng: +e.lng.toFixed(2)
                }))
            },
            q = new L.Bounds,
            X = function(t) {
                var e = z.getLatLngs(),
                    n = Math.floor(e[t].length / 2),
                    r = z._rings[t][n - 4],
                    i = z._rings[t][n + 4],
                    a = z._rings[t][0],
                    o = z._rings[t][z._rings[t].length - 1];
                if ((a.x - o.x) * (a.x - o.x) + (a.y - o.y) * (a.y - o.y) < 1e3) return {};
                var s = r.y - i.y,
                    l = r.x - i.x,
                    d = [];
                z._projectLatlngs([e[t][n]], d, q);
                var h = 180 * Math.atan2(s, l) / Math.PI;
                return h = Math.round(h), h = Math.abs(h) > 90 ? h + 180 : h, {
                    x: d[0][0].x,
                    y: d[0][0].y,
                    angle: h
                }
            },
            j = function(t) {
                Array.isArray(t) || (t = B());
                var e, n = z._renderer._container;
                (e = n.getElementById("segment-labels")) && n.removeChild(e);
                for (var r = '<g class="segment-labels" id="segment-labels">', i = 0; i < t.length; i++) {
                    var a = X(i),
                        o = a.x,
                        s = a.y,
                        l = a.angle;
                    void 0 !== o && (r += '<text x="0" y="0" text-anchor="middle" dominant-baseline="central"\n\t\t\t\ttransform="translate(' + o + "," + s + ") rotate(" + l + ' 0 0)" fill="#F8F8F8"\n\t\t\t\tfont-weight="bold" class="labels-temp" font-size="10"\n\t\t\t\tdy="14px" text-anchor="middle">' + F(R(t[i][0], t[i][1])) + C.distance.metric + "</text>")
                }
                r += "</g>", n.insertAdjacentHTML("beforeend", r)
            },
            Y = o.throttle(function(t) {
                if (W = [], N = 0, t.length > 0) {
                    var e, n;
                    for (e = 0; e < t.length; e++)
                        for (var r = 1; r < t[e].length; r++) {
                            var i = t[e][r - 1];
                            n = t[e][r];
                            var a = z._vincenty_inverse(i, n).initialBearing,
                                o = R(i, n),
                                s = Math.PI / 180,
                                l = {
                                    lng: i.lng * s,
                                    sinLat: Math.sin(i.lat * s),
                                    cosLat: Math.cos(i.lat * s),
                                    sinInitialBearing: Math.sin((a + 360) % 360 * s),
                                    cosInitialBearing: Math.cos((a + 360) % 360 * s)
                                };
                            W.push({
                                ident: t[e][r - 1].ident,
                                point: f.wrapLatLng(i),
                                distance: o,
                                initialBearing: a,
                                rads: l
                            }), N += o
                        }
                    W.push({
                        ident: P[e - 1].ident,
                        point: f.wrapLatLng(n)
                    })
                } else P.length > 0 && W.push({
                    ident: P[0].ident,
                    point: f.wrapLatLng(P[0].marker.getLatLng())
                });
                S.emit("waypoints", {
                    points: W,
                    total: N
                })
            }, 200),
            U = o.throttle(j, 50),
            Z = function() {
                P.forEach(function(t) {
                    return f.removeLayer(t.marker)
                }), P = [], W = []
            },
            K = null,
            J = f.myMarkers.pulsatingIcon,
            Q = function(t) {
                var e = t.pos;
                if (void 0 === e && K) f.removeLayer(K), K = null;
                else if (void 0 !== e) {
                    var n = et(e);
                    K ? K.setLatLng(n) : K = L.marker(n, {
                        icon: J
                    }).addTo(f)
                }
            },
            $ = 180 / Math.PI,
            tt = 6378137,
            et = function(t) {
                var e, n = 0;
                for (e = 0; e < W.length; e++) {
                    var r = W[e].distance / N;
                    if (n + r >= t) break;
                    n += r
                }
                var i = W[e].rads,
                    a = i.lng,
                    o = i.sinLat,
                    s = i.cosLat,
                    l = i.cosInitialBearing,
                    d = i.sinInitialBearing,
                    h = N * (t - n),
                    c = Math.cos(h / tt),
                    p = Math.sin(h / tt),
                    f = Math.asin(o * c + s * p * l),
                    u = (a + Math.atan2(d * p * s, c - o * Math.sin(f))) * $;
                return L.latLng([f * $, u > 180 ? u - 360 : u < -180 ? u + 360 : u])
            },
            nt = function(t) {
                E || (u.on("rplanner", O), n.on("metricChanged", j), f.on("zoomend", j), S.on("hover", Q), E = !0), Z(), G(t)
            },
            rt = function() {
                Z(), _(), E && (u.off("rplanner", O), n.off("metricChanged", j), f.off("zoomend", j), S.off("hover", Q), E = !1)
            },
            it = function() {
                var t = P.reverse().map(function(t) {
                    return t.marker.getLatLng()
                });
                A(t)
            };

        function at(t, e, n) {
            void 0 === n && (n = []);
            var r = Math.floor(e.length / 2),
                i = function(t, e) {
                    return t < e[0] && (t = 0), t > e[1] && (t = e[1]), t
                };
            return t.map(function(a, o) {
                for (var s = 0; s < n.length; s++)
                    if (Math.abs(n[s].position - o) <= r) return a;
                for (var l = 0, d = 0; d < e.length; d++) {
                    var h = i(o + (d - r), [0, t.length - 1]);
                    l += e[d] * t[h]
                }
                return l
            })
        }
        var ot = function(t, e, n) {
            var r = [],
                i = [];
            return t.forEach(function(t) {
                !r.length || t.position > r[r.length - 1].center + e ? r.push({
                    center: t.position,
                    data: [t]
                }) : (r[r.length - 1].data.push(t), r[r.length - 1].center = function(t) {
                    for (var e = 0, n = 0; n < t.length; n++) e += t[n].position;
                    return e / t.length
                }(r[r.length - 1].data))
            }), r.forEach(function(t) {
                var e = {
                    value: n ? -1 / 0 : 1 / 0,
                    pos: Number.NaN
                };
                t.data.forEach(function(t) {
                    (n && t.value > e.value || !n && t.value < e.value) && (e = t)
                }), i.push(e)
            }), i
        };

        function st(t) {
            var e = function(t) {
                for (var e = 0, n = 0; n < t.length; n++) e += t[n];
                return e
            }(t) / 1;
            return t.map(function(t) {
                return t / e
            })
        }

        function lt(t) {
            var e = t.domain,
                n = t.range,
                r = t.clip,
                i = n[0],
                a = n[1],
                o = e[0],
                s = e[1],
                l = i > a ? [i, a] : [a, i],
                d = l[0],
                h = l[1],
                c = (a - i) / (s - o),
                p = function(t) {
                    return (t - o) * c + i
                };
            return {
                get: r ? function(t) {
                    return Math.max(Math.min(p(t), d), h)
                } : p,
                invert: function(t) {
                    return (t - i) / c + o
                }
            }
        }
        var dt = function(t, e, n, r, i) {
                return (.5 * -t + 3 * e * .5 - 3 * n * .5 + .5 * r) * i * i * i + (t - 5 * e * .5 + 2 * n - .5 * r) * i * i + (.5 * -t + .5 * n) * i + e
            },
            ht = function(t, e, n) {
                return dt(dt(t[0], t[1], t[2], t[3], e), dt(t[4], t[5], t[6], t[7], e), dt(t[8], t[9], t[10], t[11], e), dt(t[12], t[13], t[14], t[15], e), n)
            },
            ct = function(t, e) {
                return Math.min(Math.max(t, 0), e - 1)
            },
            pt = {
                distance: {
                    metric: C.distance,
                    name: b.DISTANCE
                },
                temp: {
                    metric: C.temp,
                    name: b.TEMP,
                    icon: w.temp.icon
                },
                wind: {
                    metric: C.wind,
                    name: b.WIND,
                    icon: w.wind.icon
                },
                windDir: {
                    metric: {},
                    name: b.WIND_DIR
                },
                windGust: {
                    metric: C.wind,
                    name: b.GUST,
                    icon: w.gust.icon
                },
                rain: {
                    metric: C.rain,
                    name: b.RAIN,
                    icon: w.rain.icon
                },
                elevation: {
                    metric: C.elevation,
                    name: b.ELEVATION
                },
                waves: {
                    metric: C.waves,
                    name: b.WAVES
                },
                cbase: {
                    metric: C.altitude,
                    name: b.CLOUD_ALT
                },
                ctop: {
                    metric: C.altitude,
                    name: b.CTOP
                },
                vis: {
                    metric: C.visibilityNoRules,
                    name: b.SURFACE_VISIBILITY
                },
                precip: {
                    metric: C.rain,
                    name: b.CLOUDS
                },
                warnings: {
                    metric: {},
                    name: b.WX_WARNINGS
                },
                dewpoint: {
                    metric: C.dewpointSpread,
                    name: b.DEW_POINT_SPREAD
                },
                isa: {
                    metric: C.temp,
                    name: b.ISA_DIFFERENCE
                }
            },
            ft = function(t) {
                return t.map(function(t) {
                    return t.point.lat.toFixed(2) + "," + t.point.lng.toFixed(2)
                }).join(";")
            },
            ut = function(t) {
                return x.get("/rplanner/v1/elevation/" + ft(t))
            },
            gt = function(t, e) {
                var n = s.get("path");
                return -1 === n.indexOf("/") && (n = n.substring(0, 4) + "/" + n.substring(4, 6) + "/" + n.substring(6, 8) + "/" + n.substring(8, 10)), x.get("/rplanner/v1/forecast/" + e + "/" + ft(t) + "?dst=" + n)
            },
            vt = y.instance({
                ident: "direction",
                steps: 512,
                default: [
                    [0, [241, 5, 21, 255]],
                    [20, [232, 133, 58, 255]],
                    [40, [207, 119, 84, 255]],
                    [120, [98, 98, 98, 255]],
                    [140, [60, 154, 129, 255]],
                    [180, [4, 164, 114, 255]],
                    [220, [60, 154, 129, 255]],
                    [240, [98, 98, 98, 255]],
                    [320, [207, 119, 84, 255]],
                    [340, [232, 133, 58, 255]],
                    [360, [241, 5, 21, 255]]
                ]
            }),
            mt = vt.getColor.call(vt),
            bt = function(t, e) {
                var n = (t + (e || 0) + 360) % 360,
                    r = mt.RGBA.call(mt, n);
                return "rgba(" + r[0] + "," + r[1] + "," + r[2] + ",1)"
            };
        for (var wt = function(t) {
                var e = {},
                    n = t.max,
                    r = Math.min(0, t.min);
                e.extremes = function(t, e, n, r) {
                    for (var i = [], a = [], o = 1 / 0, s = -1 / 0, l = Number.NaN, d = Number.NaN, h = !0, c = 0; c < t.length; c++) {
                        var p = t[c];
                        p > s && (s = p, d = c), p < o && (o = p, l = c), h ? p < s - e && (i.push({
                            position: d,
                            value: s,
                            max: !0
                        }), o = p, l = c, h = !1) : p > o + e && (a.push({
                            position: l,
                            value: o,
                            max: !1
                        }), s = p, d = c, h = !0)
                    }
                    return i = ot(i, n, !0), a = ot(a, r, !1), i.concat(a)
                }(t.elevations, .15 * (n - r), .05 * t.elevations.length, .2 * t.elevations.length);
                var i = st([.1, .15, .5, .15, .1]);
                return e.elevationsGraph = at(t.elevations, i, e.extremes), e.elevations = t.elevations, e.distances = t.distances, e.min = t.min, e.max = t.max, e
            }, xt = {
                elevation: {
                    canvasHeight: 150
                },
                vfr: {
                    canvasHeight: 230
                },
                ifr: {
                    canvasHeight: 275
                },
                car: {
                    canvasHeight: 230
                },
                boat: {
                    canvasHeight: 170
                },
                airgram: {
                    canvasHeight: 275
                }
            }, yt = {
                1e3: 100,
                950: 600,
                925: 750,
                900: 900,
                850: 1500,
                800: 2e3,
                700: 3e3,
                600: 4200,
                500: 5500,
                400: 7e3,
                300: 9e3,
                250: 1e4,
                200: 11700,
                150: 13500
            }, kt = v.extend({
                canvas: m.extend({}),
                init: function(t, e, n) {
                    var r = this;
                    void 0 === n && (n = {});
                    var i = t.canvas,
                        a = t.svg,
                        o = t.legend,
                        s = t.dataTable,
                        l = t.wrapper;
                    return this.canvasEl = i, this.svg = a, this.legend = o, this.dataTable = s, this.wrapper = l, this.node = e, this.geopotentialHeight = n.geopotentialHeight || !1, this.data = {}, this.getX = function(t) {
                        return r.x && r.x.get(t) || null
                    }, this.getY = function(t) {
                        return r.y && r.y.get(t) || null
                    }, this.getInvertX = function(t) {
                        return r.x && r.x.invert(t) || null
                    }, this.getInvertY = function(t) {
                        return r.y && r.y.invert(t) || null
                    }, this.onHover(t), this.setDirCorrection(), this
                },
                initCanvas: function(t) {
                    var e = t.totalDistance,
                        n = t.view;
                    if (!xt[n]) throw 'Cannot find size definition for view "' + n + '".';
                    var r = xt[n].canvasHeight,
                        i = function(t, e) {
                            var n = Math.min(66, Math.max(3, Math.floor(e / 1e4))) + 1;
                            return {
                                tdCount: n,
                                tdWidth: Math.max(t / n, 30)
                            }
                        }(this.dataTable.offsetWidth, e),
                        a = i.tdWidth,
                        o = i.tdCount;
                    this.tdWidth = a, this.canvas = this.canvas.init(this.canvasEl, o, a, r), this.x = lt({
                        range: [a / 2, this.canvas.w - a / 2],
                        domain: [0, e]
                    }), this.width = Math.round(this.canvas.w), this.height = Math.round(this.canvas.h), this.ctx = this.canvas.ctx, this.view = n, this.wrapper.style.height = r + 40 + "px"
                },
                clean: function() {
                    for (var t = this.svg.children.length - 1; t >= 0; t--) this.svg.children[t].remove();
                    this.legend.innerHTML = ""
                },
                onHover: function(t) {
                    var e = this;
                    t.canvas.onmousemove = function(n) {
                        var r = Math.min(Math.max(0, n.offsetX - e.tdWidth / 2) / (t.canvas.offsetWidth - e.tdWidth), 1),
                            i = {};
                        if (e.data.elevation && "boat" !== e.view) {
                            var a = Math.ceil((e.data.elevation.distances.length - 1) * r);
                            i.elevationGraph = e.data.elevation.elevationsGraph[a], i.elevation = e.data.elevation.elevations[a], i.distance = e.data.elevation.distances[a]
                        } else i.distance = Math.round(e.data.totalDistance * r);
                        S.emit("hover", {
                            pos: r,
                            data: i
                        });
                        var o = r * (e.width - e.tdWidth) + e.tdWidth / 2;
                        ! function(e) {
                            t.sliderLine.style.left = e + "px", t.sliderLine.classList.add("show")
                        }(o),
                        function(e, n) {
                            var r = pt.elevation,
                                i = pt.distance;
                            t.sliderInfo.style.left = e + "px", t.sliderInfo.innerHTML = '\n\t\t\t<span class="distance">' + i.metric.convertNumber(n.distance) + i.metric.metric + "</span>\n\t\t\t" + (void 0 !== n.elevation ? '<span class="elevation">' + (k.thousands(r.metric.convertNumber(n.elevation)) || 0) + r.metric.metric + "</span>" : "") + "\n\t\t", t.sliderInfo.classList.add("show")
                        }(o, i), ["car", "vfr", "ifr", "elevation"].includes(e.view) ? function(n, r) {
                            e.y && (t.sliderDot.style.left = n + "px", t.sliderDot.style.top = e.height - e.y.get(r) + "px", t.sliderDot.classList.add("show"))
                        }(o, i.elevationGraph) : e.view
                    }, t.canvas.onmouseleave = function() {
                        S.emit("hover", {
                            pos: void 0
                        }), t.sliderLine.classList.remove("show"), t.sliderDot.classList.remove("show"), t.sliderInfo.classList.remove("show")
                    }
                },
                setDirCorrection: function(t) {
                    var e = t || s.get("rplannerDir");
                    this.dirCorrection = "horizontal" === e ? 90 : "vertical" === e ? 0 : null
                },
                setGeopotentialHeight: function(t) {
                    this.geopotentialHeight = t
                },
                setElevationData: function(t) {
                    this.node.dataset.hasElevation = 0 !== t.min || 0 !== t.max, this.data.elevation = wt(t)
                },
                setForecastData: function(t) {
                    this.data.forecast = function(t) {
                        for (var e = 0; e < t.distances.length; e++) t.data.cbase && null === t.data.cbase[e] && (t.data.cbase[e] = 1e5), t.data.ctop && null === t.data.ctop[e] && (t.data.ctop[e] = 1e5), t.data.ctop && t.data.cbase && t.data.cbase[e] < 1e5 && t.data.ctop[e] < t.data.cbase[e] && (t.data.ctop[e] = t.data.cbase[e]);
                        return t
                    }(t)
                },
                setDistanceData: function(t) {
                    this.data.waypoints = t.points, this.data.totalDistance = t.total
                },
                printLegend: function(t) {
                    var e = t.key,
                        n = t.height,
                        r = t.offset,
                        i = pt[e],
                        a = i ? '<div class="legend-' + e + '" style="position: absolute; top: ' + r + "px; height: " + n + "px; line-height: " + n + 'px;">\n\t\t\t\t<span class="legend-left">' + (i.name || "") + '</span>\n\t\t\t\t<span\n\t\t\t\t\tdata-do="metric,' + i.metric.ident + '"\n\t\t\t\t\tclass="legend-right ' + (i.metric.ident ? "metric-clickable" : "") + '"\n\t\t\t\t>' + (i.metric.metric || "") + "</span>\n\t\t\t</div>" : '<div style="height: ' + n + 'px;" />';
                    this.legend.innerHTML += a
                },
                levelsToMeters: yt,
                levels: Object.keys(yt).map(function(t) {
                    return Number(t)
                }),
                getRatioGhY: function(t) {
                    var e = this.getInvertY(this.height);
                    return yt[t] / e
                }
            }), Lt = v.extend({
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.data,
                        i = t.ident,
                        a = t.lines,
                        o = t.colors,
                        s = t.legend,
                        l = t.renderer;
                    return this.offset = e, this.height = n, this.data = r, this.ident = i, this.lines = a, this.colors = o, this.legend = s, this.renderer = l, this
                },
                _getSvgLine: function(t) {
                    for (var e = t.x, n = t.y, r = t.valIdx, i = t.lineIdx, a = this.lines[i](r), o = a.value, s = a.rotation, l = a.color, d = a.fontSize, h = a.isIcon, c = a.shadow, p = a.bold, f = a.circle, u = "", g = Boolean(c), v = g ? 1 : 0, m = 0; m <= v; m++) {
                        f && (u += '<circle fill="' + f.color + '" cx="' + e + '" cy="' + n + '" r="' + f.radius + '"></circle>', n -= .5);
                        var b = s || 0 === s ? (s + (this.renderer.dirCorrection || 0)) % 360 : null;
                        u += '<text\n\t\t\t\tx="' + e + '" y="' + n + '"\n\t\t\t\tfont-size="' + d + 'px"\n\t\t\t\t' + (p ? 'font-weight="bold"' : "") + "\n\t\t\t\t" + (null !== b ? 'transform="rotate(' + b + " " + e + " " + n + ')"' : "") + "\n\t\t\t\t" + (g ? 'fill="' + (c.color || "#F8F8F8") + '" style="stroke:' + (c.color || "#F8F8F8") + "; stroke-width:" + (c.width || "0.5em") + '"' : 'fill="' + l + '"') + "\n\t\t\t\t" + (h ? 'font-family="iconfont"' : "") + '\n\t\t\t\ttext-anchor="middle"\n\t\t\t\tdominant-baseline="central"\n\t\t\t>' + o + "</text>", g = !1
                    }
                    return u
                },
                _colorize: function(t, e, n) {
                    void 0 === n && (n = 1);
                    var r = e.RGBA.call(e, t);
                    return "rgba(" + r[0] + "," + r[1] + "," + r[2] + "," + n + ")"
                },
                _add3colors: function(t) {
                    var e = t.gradient,
                        n = t.data,
                        r = t.i,
                        i = t.opacity;
                    void 0 === i && (i = 1);
                    var a = n[Math.max(r - 1, 0)],
                        o = n[r],
                        s = n[Math.min(r + 1, n.length - 1)],
                        l = this._colorize(a ? .5 * (o + a) : o, this.colors, i),
                        d = this._colorize(o, this.colors, i),
                        h = this._colorize(s ? .5 * (o + s) : o, this.colors, i);
                    e.addColorStop(0, l), e.addColorStop(.5, d), e.addColorStop(1, h)
                },
                printValues: function() {
                    for (var t = '<g class="labels-' + this.ident + '">', e = this.data.distances, n = 0; n < e.length; n++)
                        for (var r = 0; r < this.lines.length; r++) {
                            var i = this.renderer.x.get(e[n]),
                                a = this.offset + (r + 1) * (this.height / (this.lines.length + 1)) + (this.lines.length - 1) * ([-1, 1][r] || 0);
                            t += this._getSvgLine({
                                x: i,
                                y: a,
                                valIdx: n,
                                lineIdx: r
                            })
                        }
                    return t += "</g>", this.renderer.svg.insertAdjacentHTML("beforeend", t), this
                },
                printBackground: function() {
                    this.renderer.ctx.globalCompositeOperation = "destination-over";
                    for (var t = this.renderer.tdWidth / 2, e = this.data, n = e.data, r = e.distances, i = 0; i < r.length; i++) {
                        var a = Math.round(this.renderer.x.get(r[i])),
                            o = this.renderer.ctx.createLinearGradient(a - t, 0, a + t, 0);
                        this._add3colors({
                            gradient: o,
                            data: n,
                            i: i
                        }), this.renderer.ctx.fillStyle = o, this.renderer.ctx.fillRect(a - t, this.offset, this.renderer.tdWidth, this.height)
                    }
                    return this.renderer.ctx.globalCompositeOperation = "source-over", this
                },
                printLegend: function() {
                    return this.renderer.printLegend({
                        key: this.ident,
                        offset: this.offset,
                        height: this.height
                    }), this
                }
            }), Mt = w.wind.convertNumber, Dt = M.windDetail.getColor.call(M.windDetail), Tt = w.temp.convertNumber, It = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data.icon
                    }, this.offset = e, this.height = n, this.renderer = r, this
                },
                print: function() {
                    for (var t = this.data, e = t.data, n = t.distances, r = this.renderer, i = r.getX, a = r.svg, o = '<g class="weather-icons">', s = 0; s < n.length; s++) {
                        var l = i(n[s]) - Math.round(this.height / 2);
                        o += '<image\n                height="' + this.height + '"\n                width="' + this.height + '"\n                xlink:href="' + D.iconsDir + "/png_27@2x/" + e[s] + '.png"\n                transform="translate(' + l + "," + this.offset + ')"\n            />'
                    }
                    o += "</g>", a.insertAdjacentHTML("beforeend", o)
                }
            }, Ct = w.rain.convertNumber, St = Lt.extend({
                printGraph: function() {
                    var t = this,
                        e = this.data,
                        n = e.distances,
                        r = e.data,
                        i = this.renderer,
                        a = i.ctx,
                        o = i.tdWidth,
                        s = i.getX,
                        l = o / 2,
                        d = function(e) {
                            return (e < 3 ? e / 3 * .25 : e < 10 ? (e - 3) / 7 * .25 + .25 : e < 20 ? (e - 10) / 10 * .25 + .5 : Math.min(.9, (e - 20) / 30 * .25 + .75)) * t.height
                        },
                        h = function(t, e, n, r, i) {
                            return .5 * (2 * e + (-t + n) * i + (2 * t - 5 * e + 4 * n - r) * i * i + (3 * e - t - 3 * n + r) * i * i * i)
                        };
                    a.beginPath(), a.globalCompositeOperation = "destination-over", a.fillStyle = "#CEF1FA";
                    for (var c = 0; c < n.length; c++) {
                        var p = s(n[c]),
                            f = [r[Math.max(c - 2, 0)], r[Math.max(c - 1, 0)], r[c], r[Math.min(c + 1, r.length - 1)], r[Math.min(c + 2, r.length - 1)]].map(d);
                        a.moveTo(p - l, this.offset + this.height);
                        for (var u = .5; u <= 1; u += .1) a.lineTo(p - 2 * l * (1 - u), this.offset + this.height - h(f[0], f[1], f[2], f[3], u));
                        for (var g = 0; g <= .5; g += .1) a.lineTo(p + 2 * l * g, this.offset + this.height - h(f[1], f[2], f[3], f[4], g));
                        a.lineTo(p + l, this.offset + this.height), a.fill()
                    }
                    return a.globalCompositeOperation = "source-over", a.closePath(), this
                }
            }), Ft = C.distance.convertNumber.bind(C.distance), zt = Lt.extend({
                printGrid: function() {
                    var t = this.data.data,
                        e = this.renderer,
                        n = e.ctx,
                        r = e.getX;
                    n.beginPath(), n.strokeStyle = "#555";
                    for (var i = 0; i < t.length; i++) {
                        var a = r(t[i]);
                        n.moveTo(a, this.offset), n.lineTo(a, 4)
                    }
                    return n.stroke(), n.closePath(), this
                }
            }), Pt = Lt.extend({
                printGrid: function() {
                    var t = this.data.data,
                        e = this.renderer,
                        n = e.ctx,
                        r = e.height,
                        i = e.getX;
                    n.strokeStyle = "rgba(157, 3, 0, 0.5)", n.beginPath(), n.setLineDash([5, 3]);
                    for (var a = 0; a < t.length; a++) {
                        var o = i(t[a]);
                        n.moveTo(o, 0), n.lineTo(o, r)
                    }
                    return n.stroke(), n.setLineDash([]), n.closePath(), this
                }
            }), Wt = function(t) {
                for (var e = t.offset, n = t.height, r = t.renderer, i = function(t) {
                        var e = t.getInvertX,
                            n = e(70) - e(0),
                            r = 1e6 / Ft(1e6),
                            i = Math.pow(10, Math.round(n).toString().length - 1);
                        return r * Math.ceil(n / (5 * i)) * 5 * i / 1e3
                    }(r), a = [], o = 0; o < r.data.totalDistance; o += i) a.push(o);
                return zt.init({
                    offset: e,
                    height: n,
                    ident: "distance",
                    renderer: r,
                    lines: [function(t) {
                        return {
                            fontSize: 12,
                            color: "#555",
                            value: a[t] > 1e5 ? Math.round(Ft(a[t])) : Ft(a[t])
                        }
                    }],
                    data: {
                        distances: a,
                        data: a
                    }
                })
            }, Nt = C.elevation.convertNumber.bind(C.elevation), Et = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer,
                        i = t.domain;
                    return this.data = {
                        distances: r.data.elevation.distances,
                        data: r.data.elevation
                    }, this.offset = e, this.height = n, this.renderer = r, this.ident = "elevation", this.domain = [Math.min.apply(this, i), Math.max.apply(this, i)], this.renderer.y = lt({
                        range: [r.height - n - e, r.height - e],
                        domain: i
                    }), this
                },
                printGraph: function(t) {
                    void 0 === t && (t = {
                        topColor: "rgba(136, 136, 136, 0.4)",
                        bottomColor: "rgba(136, 136, 136, 0.1)"
                    });
                    var e = t.topColor,
                        n = t.bottomColor,
                        r = this.data,
                        i = r.data,
                        a = r.distances,
                        o = this.renderer,
                        s = o.ctx,
                        l = o.getX,
                        d = o.getY,
                        h = o.data.totalDistance,
                        c = this.renderer.width,
                        p = s.createLinearGradient(0, this.offset, 0, this.offset + this.height);
                    p.addColorStop(0, e), p.addColorStop(1, n), s.beginPath(), s.fillStyle = p, s.strokeStyle = "rgb(136, 136, 136)";
                    for (var f = st([.05, .2, .5, .2, .05]), u = Math.ceil(l(0) / 3), g = at(i.elevations.slice(0, u).reverse(), f), v = at(i.elevations.slice(i.elevations.length - u).reverse(), f), m = this.domain[0] ? 0 : d(0), b = 0; b < g.length; b++) s.lineTo(3 * (b - 1), this.offset + this.height - d(g[b]) + m);
                    for (var w = 0; w < i.elevationsGraph.length; w++) s.lineTo(l(a[w]), this.offset + this.height - d(i.elevationsGraph[w]) + m);
                    for (var x = 0; x < v.length; x++) s.lineTo(l(h) + 3 * (x + 1), this.offset + this.height - d(v[x]) + m);
                    return s.stroke(), s.lineTo(c, this.height + this.offset), s.lineTo(0, this.height + this.offset), s.fill(), s.closePath(), this
                },
                printPeaks: function() {
                    var t = this,
                        e = this.data,
                        n = e.distances,
                        r = e.data,
                        i = this.renderer,
                        a = i.ctx,
                        o = i.svg,
                        s = i.getX,
                        l = i.getY;
                    a.beginPath(), a.strokeStyle = "rgba(136, 136, 136, 0.6)", a.setLineDash([2, 1]);
                    var d = '<g class="labels-elevation">';
                    return r.extremes.forEach(function(e) {
                        var i = s(n[e.position]),
                            o = t.offset + t.height - l(r.elevationsGraph[e.position]),
                            h = (k.thousands(Nt(r.elevations[e.position])) || 0) + " " + C.elevation.metric;
                        d += '<text\n                            transform="translate(' + i + "," + (o - (e.max ? 12 : 22)) + ')"\n                            fill="#888" font-size="8" text-anchor="middle"\n                        >' + h + "</text>", a.moveTo(i, o - (e.max ? 8 : 18)), a.lineTo(i, o - 2)
                    }), a.stroke(), a.setLineDash([]), a.closePath(), d += "</g>", o.insertAdjacentHTML("beforeend", d), this
                },
                printLegend: function(t) {
                    void 0 === t && (t = {});
                    var e = t.height,
                        n = t.offset;
                    return this.renderer.printLegend({
                        key: this.ident,
                        offset: n || this.offset,
                        height: e || this.height
                    }), this
                }
            }, At = function(t) {
                return Et.init(t)
            }, Ot = w.waves.convertNumber, Ht = M.wavesDetail.getColor.call(M.wavesDetail), Gt = C.dewpointSpread.convertNumber.bind(C.dewpointSpread), Bt = M.dewpointSpreadDetail.getColor.call(M.dewpointSpreadDetail), Vt = T.extend({
                bottomWhitten: !1,
                strokeStyle: "#4d9ab3",
                lineWidth: 1
            }), _t = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer,
                        i = 0;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.distances.map(function(t, e) {
                            for (var n = r.data.elevation; t > n.distances[i] && i < n.distances.length - 1;) i++;
                            return r.data.forecast.data.deg0[e] + n.elevations[i]
                        })
                    }, this.offset = e, this.height = n, this.renderer = r, this
                },
                printIsotherm: function() {
                    return Vt.mixinCanvas(this.renderer.canvas).setHeight(this.height).setOffset(this.offset).setViewport(0, this.renderer.y.invert(this.renderer.height)).render(this.data.data).resetCanvas(), this
                },
                printLabels: function() {
                    for (var t = this.renderer.y.invert(this.renderer.height), e = this.data, n = e.distances, r = e.data, i = Math.max(3, Math.round(n.length / 4)), a = '<g class="labels-deg0">', o = i; o < n.length; o += i) {
                        var s = this.renderer.x.get(n[o]),
                            l = (1 - r[o] / t) * this.height,
                            d = (1 - r[Math.max(o - 1, 0)] / t) * this.height,
                            h = (1 - r[Math.min(o + 1, r.length - 1)] / t) * this.height,
                            c = 180 * Math.atan2(h - d, 2 * this.renderer.tdWidth) / Math.PI;
                        a += '<text\n\t\t\t\tx="' + s + '" y="' + l + '" fill="#F8F8F8"\n\t\t\t\tstyle="stroke:#F8F8F8; stroke-width:0.35em"\n                font-weight="bold" font-size="8.4px" text-anchor="middle"\n\t\t\t\tdominant-baseline="central" transform="rotate(' + c + " " + s + " " + l + ')">' + b.FREEZING.toLowerCase() + "</text>", a += '<text\n\t\t\t\tx="' + s + '" y="' + l + '" fill="#4d9ab3"\n\t\t\t\tfont-size="8.4px" text-anchor="middle"\n\t\t\t\tdominant-baseline="central" transform="rotate(' + c + " " + s + " " + l + ')">' + b.FREEZING.toLowerCase() + "</text>"
                    }
                    return a += "</g>", this.renderer.svg.insertAdjacentHTML("afterbegin", a), this
                }
            }, Rt = function(t) {
                return _t.init(t)
            }, qt = M.visibilityDetail.getColor.call(M.visibilityDetail), Xt = C.visibilityNoRules.convertNumber.bind(C.visibilityNoRules), jt = C.altitude.convertNumber.bind(C.altitude), Yt = M.altitudeDetail.getColor.call(M.altitudeDetail), Ut = function(t) {
                return t >= 1e4 ? Math.floor(t / 1e3) + "k" : t
            }, Zt = function(t) {
                var e = t.offset,
                    n = t.height,
                    r = t.renderer,
                    i = r.data.forecast,
                    a = i.distances,
                    o = i.data;
                return Lt.instance().init({
                    offset: e,
                    height: n,
                    ident: "ctop",
                    renderer: r,
                    lines: [function(t) {
                        return {
                            fontSize: 8.4,
                            color: "#222",
                            value: o.ctop[t] >= 15e3 ? "--" : Ut(jt(o.ctop[t]))
                        }
                    }],
                    colors: Yt,
                    data: {
                        distances: a,
                        data: o.ctop
                    }
                })
            }, Kt = new Uint8Array(256), Jt = 0; Jt < 160; Jt++) Kt[Jt] = ct(24 * Math.floor((Jt + 12) / 16), 160);
        var Qt, $t = function(t) {
                return Kt[Math.floor(ct(t, 160))]
            },
            te = [-70, .038, 6],
            ee = [-60, .025, 4],
            ne = [null, "950h", "925h", "900h", "850h", "800h", "700h", null],
            re = [0, 16, 20, 24, 40, 53.3, 80, 100],
            ie = function(t, e, n) {
                return t + n * (e - t)
            },
            ae = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data
                    }, this.offset = e, this.height = n, this.renderer = r, this
                },
                getElevation: function(t, e) {
                    var n = this.renderer.getInvertY,
                        r = this.data.data;
                    if (this.renderer.geopotentialHeight) return .01 * re[t];
                    if (0 === t) return 0;
                    var i = Math.round(n(this.height - this.offset)),
                        a = ne[t];
                    return a ? (r["gh-" + a][e] || r["gh-" + a][Math.min(Math.max(e, 0), r["gh-" + a].length - 1)]) / i : 1
                },
                printClouds: function() {
                    for (var t = this.data, e = t.distances, n = t.data, r = this.renderer, i = r.ctx, a = r.tdWidth, o = r.width, s = e.length, l = s - s, d = s, h = ne.length, c = d - l, p = c * h, f = new Float32Array(p + p), u = 0, g = 0; g < h; ++g)
                        if (null === ne[g])
                            for (var v = l; v < d; ++v) f[u++] = 0, f[u++] = 0;
                        else
                            for (var m = l; m < d; ++m) {
                                var b = this.getElevation(g, m),
                                    w = ie(ee[0], te[0], b),
                                    x = ie(ee[1], te[1], b),
                                    y = ie(ee[2], te[2], b),
                                    k = 1 - .8 * Math.pow(b, .7),
                                    L = Number(n["rh-" + ne[g]][m]),
                                    M = Math.max(0, Math.min((L + w) * x, 1));
                                f[u++] = Math.pow(M, y) * k, f[u++] = L
                            }
                        var D = document.createElement("canvas");
                    D.width = o, D.height = this.height;
                    for (var T, I, C = this.height + this.height, S = [], F = 0; F < c + 1; ++F) S[F] = this.height;
                    for (var z = D.getContext("2d"), P = z.getImageData(0, 0, o, this.height), W = P.data, N = this.height, E = a + 1 >> 1, A = new Int32Array(C), O = new Float32Array(16), H = 0; H < h - 1; ++H)
                        for (var G = c + c, B = G * ct(H + 2, h), V = G * ct(H + 1, h), _ = G * ct(H + 0, h), R = G * ct(H - 1, h), q = 0, X = E, j = 0; j < c + 1; ++j) {
                            T = S[j], I = Math.ceil(this.height - 1 - this.getElevation(H + 1, j) * N), S[j] = I;
                            var Y = T - I,
                                U = 1 / Y,
                                Z = 2 * ct(j - 2, c),
                                K = 2 * ct(j - 1, c),
                                J = 2 * ct(j + 0, c),
                                Q = 2 * ct(j + 1, c);
                            O[0] = f[B + Z], O[1] = f[B + K], O[2] = f[B + J], O[3] = f[B + Q], O[4] = f[V + Z], O[5] = f[V + K], O[6] = f[V + J], O[7] = f[V + Q], O[8] = f[_ + Z], O[9] = f[_ + K], O[10] = f[_ + J], O[11] = f[_ + Q], O[12] = f[R + Z], O[13] = f[R + K], O[14] = f[R + J], O[15] = f[R + Q];
                            var $ = X - q,
                                tt = 1 / $,
                                et = 4 * (I * o + q);
                            if (0 === j && Y > 0)
                                for (var nt = 1 / Y, rt = 0; rt < Y; rt++) A[--C] = H, A[--C] = Math.round(1e4 * nt * rt);
                            for (var it = 0; it < Y; ++it)
                                for (var at = et + it * o * 4, ot = 0; ot < $; ++ot) {
                                    var st = $t(160 * ht(O, tt * ot, U * it));
                                    W[at++] = 255 - st, W[at++] = 255 - st, W[at++] = 255 - st, W[at++] = st > 10 ? 192 : 0
                                }
                            q = X, (X += Math.floor(a)) > o && (X = o)
                        }
                    return z.putImageData(P, 0, 0), i.globalCompositeOperation = "destination-over", i.drawImage(D, 0, this.offset, o, this.height), i.globalCompositeOperation = "source-over", this
                }
            },
            oe = {
                1e3: "100m 330ft",
                950: "600m 2000ft",
                925: "750m 2500ft",
                900: "900m 3000ft",
                850: "1500m 5000ft",
                800: "2000m 6400ft",
                700: "3000m FL100",
                600: "4200m FL140",
                500: "5500m FL180",
                400: "7000m FL240",
                300: "9000m FL300",
                250: "10km FL340",
                200: "11.7km FL390",
                150: "13,5km FL450"
            },
            se = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data
                    }, this.offset = e, this.height = n, this.renderer = r, this
                },
                getTextLabel: function(t) {
                    return this.renderer.geopotentialHeight ? t + "h" : oe[t]
                },
                printHeights: function(t) {
                    var e = this.renderer,
                        n = e.ctx,
                        r = e.width;
                    n.font = "8px Verdana", n.fillStyle = "rgba(0,0,0,0.4)", n.setLineDash([4, 4]), n.lineWidth = 1, n.strokeStyle = "rgba(0,0,0,0.1)", n.beginPath();
                    for (var i = 0; i < t.length; i++)
                        if (oe[t[i]])
                            for (var a = this.offset + Math.round(this.height - this.renderer.getRatioGhY(t[i]) * this.height), o = 0; o < 2; o++) {
                                var s = 0;
                                o && (s = this.renderer.width, n.moveTo(0, a), n.lineTo(r, a)), n.textAlign = o ? "right" : "left", n.fillText(" " + this.getTextLabel(t[i]) + " ", s, a - 8 + 6)
                            }
                        return n.stroke(), n.setLineDash([]), this
                }
            },
            le = function(t) {
                return se.init(t)
            },
            de = function(t, e) {
                return '<tspan font-size="9.6px" x="0" dy="-12px" fill="' + e + '">' + t + "</tspan>"
            },
            he = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data
                    }, this.ident = "precip", this.offset = e, this.height = n, this.renderer = r, this
                },
                printBar: function(t, e, n, r) {
                    return this.renderer.ctx.beginPath(), this.renderer.ctx.fillStyle = r, this.renderer.ctx.fillRect(t - 3, e - n, 6, n), this.renderer.ctx.closePath(), this
                },
                printBars: function() {
                    for (var t = this.data, e = t.distances, n = t.data, r = n.snowprecip, i = n.convprecip, a = n.precip, o = '<g class="precip-labels">', s = this.offset + this.height, l = 0; l < e.length; l++) {
                        var d = this.renderer.x.get(e[l]),
                            h = r[l] || 0,
                            c = i[l] || 0,
                            p = Math.max((a[l] || 0) - h - c, 0),
                            f = h > .1 ? h < 5 ? 10 * h : 50 + 2.5 * (h - 5) : 0,
                            u = p < 5 ? 7 * p : 35 + 1 * (p - 5),
                            g = c < 5 ? 7 * c : 35 + 1 * (c - 5),
                            v = (f + u + g) / this.height;
                        v > 1 && (f /= v, u /= v, g /= v), o += '<text\n\t\t\t\ttransform="translate(' + d + "," + (s - f - u - g + 10) + ')"\n\t\t\t\ttext-anchor="middle">', f && (h = w.snowAccu.convertNumber(h), this.printBar(d, s, f, "#4d9ab3"), o += de(h > 1 ? Math.round(h) : h, "#4d9ab3")), g && (c = w.rainAccu.convertNumber(c), this.printBar(d, s - f, g, "#9f50ff"), o += de(c > 5 ? Math.round(c) : c, "#9f50ff")), u && (p = w.rainAccu.convertNumber(p), this.printBar(d, s - f - g, u, "#0040ff"), o += de(p > 5 ? Math.round(p) : p, "#0040ff")), o += "</text>"
                    }
                    return o += "</g>", this.renderer.svg.insertAdjacentHTML("beforeend", o), this
                },
                printLegend: function() {
                    return this.renderer.printLegend({
                        key: this.ident,
                        offset: this.offset + this.height - 40,
                        height: 15
                    }), this.renderer.legend.innerHTML += '\n\t\t\t<div style="top: ' + (this.offset - 70) + 'px; position: absolute;">\n\t\t\t\t<span class="legend-left l-rc-note l-rc-rain">' + b.JUST_RAIN + '</span>\n\t\t\t\t<span class="legend-right iconfont l-rc-rain">9</span><br />\n\t\t\t\t<span class="legend-left l-rc-note l-rc-conv">' + b.CONVECTIVE_RAIN + '</span>\n\t\t\t\t<span class="legend-right iconfont l-rc-conv">~</span><br />\n\t\t\t\t<span class="legend-left l-rc-note l-rc-snow">' + b.SNOW + '</span>\n\t\t\t\t<span class="legend-right iconfont l-rc-snow">8</span>\n\t\t\t</div>', this
                }
            },
            ce = function(t, e, n, r, i, a, o, s) {
                if (r = -r, null !== o) {
                    var l = -o * (Math.PI / 180),
                        d = Math.cos(l) * r - Math.sin(l) * i,
                        h = Math.sin(l) * r + Math.cos(l) * i;
                    r = d, i = h
                }
                var c = Math.sqrt(r * r + i * i),
                    p = .17 * a,
                    f = .35 * a,
                    u = Math.round(.388768 * c);
                if (u > 0) {
                    var g = r / c,
                        v = i / c,
                        m = g * p * .5 - v * f,
                        b = v * p * .5 + g * f,
                        w = -p * g,
                        x = -p * v,
                        y = 180 * Math.atan2(r, i) / Math.PI + 180;
                    if (t.strokeStyle = t.fillStyle = bt(s || 0 === s ? y : 120, -s), t.beginPath(), t.moveTo(e, n), e += g * a, n += v * a, t.lineTo(e, n), 1 == u && (e += w, n += x), u >= 10) {
                        for (; u >= 10;) u -= 10, t.lineTo(e + w + m, n + x + b), t.lineTo(e + w, n + x), t.fill(), e += w, n += x;
                        e += w, n += x
                    }
                    for (; u > 0;) {
                        t.moveTo(e, n);
                        var k = 1 == u ? .5 : 1;
                        t.lineTo(e + m * k, n + b * k), e += w, n += x, u -= 2
                    }
                    t.stroke()
                } else t.strokeStyle = t.fillStyle = "rgba(0, 0, 0, 0.20)", t.beginPath(), t.arc(e, n, .07 * a, 0, 2 * Math.PI, !1), t.stroke(), t.beginPath(), t.arc(e, n, .16 * a, 0, 2 * Math.PI, !1), t.stroke()
            },
            pe = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer,
                        i = t.customYgetter;
                    return this.data = r.data.forecast, this.offset = e, this.height = n, this.renderer = r, this.customYgetter = i, this
                },
                printMarks: function(t) {
                    for (var e = this.data, n = e.distances, r = e.data, i = e.bearings, a = n.length, o = t.length, s = a * o, l = this.renderer.tdWidth, d = new Float32Array(s + s), h = 0, c = 0; c < o; ++c)
                        for (var p = "wind_u-" + t[c] + "h", f = "wind_v-" + t[c] + "h", u = r[p], g = r[f], v = 0; v < a; ++v) d[h++] = Number(u[v]), d[h++] = Number(g[v]);
                    var m = l + 1 >> 1;
                    this.renderer.ctx.lineWidth = 1;
                    for (var b = 0; b < o; ++b)
                        for (var w = this.customYgetter ? this.customYgetter(t[b]) : this.offset + Math.round(this.height - this.renderer.getRatioGhY(t[b]) * this.height), x = 0; x < a; ++x) {
                            var y = m + l * x,
                                k = b * a + x << 1,
                                L = d[k],
                                M = d[k + 1],
                                D = null !== this.renderer.dirCorrection ? -this.renderer.dirCorrection : null,
                                T = null !== this.renderer.dirCorrection ? (i[x] + (D || 0)) % 360 : null,
                                I = 0 === x && L < 0 || x === a - 1 && L > 0 ? 11.5 : 16.25;
                            ce(this.renderer.ctx, y, w, L, M, I, T, D)
                        }
                }
            },
            fe = function(t) {
                return pe.init(t)
            },
            ue = {
                path: "m139.27 139.33c1.483-1.483 2.4-3.534 2.4-5.8v-3e-3 -32.184h-3e-3c0-4.529-3.665-8.202-8.187-8.202s-8.188 3.673-8.188 8.202h-4e-3v11.049l-52.159-42.23 65.279-55.373c2.015-1.495 3.326-3.885 3.326-6.588 0-4.528-3.665-8.201-8.189-8.201h-0.014-125.32-0.014c-4.522 0-8.189 3.673-8.189 8.201h-1e-3v125.33h2e-3c0 4.528 3.666 8.202 8.189 8.202s8.188-3.674 8.188-8.202v-117.13l97.254-1e-3 -57.128 47.208c-1.989 1.497-3.282 3.872-3.282 6.556 0 2.699 1.309 5.088 3.318 6.582l58.504 48.584h-13.711c-4.524 0-8.19 3.67-8.19 8.198s3.666 8.202 8.19 8.202h32.143c2.259 0 4.308-0.918 5.79-2.402z",
                scale: .08,
                yCorrection: 0,
                xCorrection: 0
            },
            ge = {
                path: "M112 352l288 0c9 0 16 7 16 16 0 9-7 16-16 16l-288 0c-9 0-16-7-16-16 0-9 7-16 16-16z m288-32l-288 0c-9 0-16-7-16-16 0-9 7-16 16-16l288 0c9 0 16 7 16 16 0 9-7 16-16 16z m0-64l-288 0c-9 0-16-7-16-16 0-9 7-16 16-16l288 0c9 0 16 7 16 16 0 9-7 16-16 16z m0-64l-288 0c-9 0-16-7-16-16 0-9 7-16 16-16l288 0c9 0 16 7 16 16 0 9-7 16-16 16z",
                scale: .04,
                yCorrection: -5,
                xCorrection: -4
            },
            ve = {
                FG: ge,
                FZFG: ge,
                TH: ue,
                LGTH: ue,
                HVTH: ue
            },
            me = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data.warn
                    }, this.ident = "warnings", this.offset = e, this.height = n, this.renderer = r, this
                },
                printIcons: function() {
                    var t = this.renderer.ctx;
                    t.fillStyle = "#FFFFFF", t.fillRect(0, this.offset, this.renderer.width, this.height);
                    for (var e = this.data, n = e.distances, r = e.data, i = '<g class="labels-warn">', a = 0; a < n.length; a++) {
                        var o = this.renderer.x.get(n[a]),
                            s = this.offset;
                        if (r[a]) {
                            var l = ve[r[a]] || {},
                                d = l.scale,
                                h = l.path,
                                c = l.yCorrection;
                            i += '<path\n\t\t\t\t\tfill="#000000"\n\t\t\t\t\tstroke="#FFFFFF"\n\t\t\t\t\tstroke-width="3"\n\t\t\t\t\ttransform="translate(' + (o - 6 + l.xCorrection) + "," + (s + 2 + c) + ")\n\t\t\t\t\tscale(" + d + ')"\n\t\t\t\t\td="' + h + '" />'
                        } else i += '<text\n\t\t\t\t\tx="' + o + '" y="' + (s + 7) + '"\n\t\t\t\t\tfont-size="8.4px"\n\t\t\t\t\tfill="#222"\n\t\t\t\t\ttext-anchor="middle"\n\t\t\t\t\tdominant-baseline="central"\n\t\t\t\t>--</text>'
                    }
                    return i += "</g>", this.renderer.svg.insertAdjacentHTML("afterbegin", i), this
                },
                printLegend: function() {
                    return this.renderer.printLegend({
                        key: this.ident,
                        offset: this.offset - 2,
                        height: this.height
                    }), this
                }
            },
            be = function(t) {
                return me.init(t)
            },
            we = C.temp.convertNumber.bind(C.temp),
            xe = 273.15,
            ye = Math.min(window.devicePixelRatio || 1, 2),
            ke = function(t) {
                return Math.round(t * ye)
            },
            Le = function(t) {
                return t > 11e3 ? 216.64999999999998 : Math.round(288.15 + t * (-1.98 / 304.8))
            },
            Me = {
                "-10": [12, 95, 37],
                "-9": [34, 119, 50],
                "-8": [53, 143, 61],
                "-7": [74, 166, 74],
                "-6": [112, 184, 107],
                "-5": [144, 201, 136],
                "-4": [172, 216, 162],
                "-3": [196, 229, 187],
                "-2": [217, 240, 209],
                "-1": [234, 247, 229],
                0: [248, 248, 248],
                1: [255, 231, 222],
                2: [255, 212, 198],
                3: [255, 190, 172],
                4: [255, 165, 146],
                5: [249, 138, 120],
                6: [241, 109, 95],
                7: [215, 88, 86],
                8: [182, 74, 81],
                9: [147, 60, 72],
                10: [112, 48, 60]
            },
            De = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data
                    }, this.offset = e, this.height = n, this.renderer = r, this.ident = "isa", this.dst = this._computeValues(), this
                },
                _computeValues: function() {
                    for (var t = this.data.data, e = this.renderer.levelsToMeters, n = Array.from(this.renderer.levels).sort(function(t, e) {
                            return e - t
                        }), r = t["temp-1000h"].length, i = n.length, a = new Float32Array(r * i), o = 0, s = 0; s < i; ++s)
                        for (var l = 0; l < r; ++l) a[o++] = Number(t["temp-" + n[s] + "h"][l]) - Le(e[n[s]]);
                    for (var d, h = this.renderer, c = h.width, p = h.tdWidth, f = ke(p), u = ke(this.height), g = ke(c), v = new Int8Array(g * u), m = f + 1 >> 1, b = u, w = 0; w < i - 1; ++w) {
                        d = b, b = ke(this.offset + Math.round(this.height - this.renderer.getRatioGhY(n[w + 1]) * this.height));
                        for (var x = r * ct(w + 2, i), y = r * ct(w + 1, i), k = r * ct(w + 0, i), L = r * ct(w - 1, i), M = d - b, D = 1 / M, T = 0, I = m, C = 0; C < r + 1; ++C) {
                            for (var S = ct(C - 2, r), F = ct(C - 1, r), z = ct(C + 0, r), P = ct(C + 1, r), W = [a[x + S], a[x + F], a[x + z], a[x + P], a[y + S], a[y + F], a[y + z], a[y + P], a[k + S], a[k + F], a[k + z], a[k + P], a[L + S], a[L + F], a[L + z], a[L + P]], N = I - T, E = 1 / N, A = b * g + T, O = 0; O < M; ++O)
                                for (var H = A + O * g, G = 0; G < N && H < v.length; ++G, H++) {
                                    var B = ht(W, E * G, D * O);
                                    v[H] = Math.floor(.2 * (B + 2.5))
                                }
                            T = I, (I += f) > g && (I = g)
                        }
                    }
                    return v
                },
                printHeatmap: function() {
                    var t = this.renderer,
                        e = t.ctx,
                        n = t.width,
                        r = ke(this.height),
                        i = ke(n),
                        a = document.createElement("canvas");
                    a.width = i, a.height = r;
                    for (var o = a.getContext("2d"), s = o.getImageData(0, 0, i, r), l = s.data, d = l.length - 4, h = 0, c = 0; c < r && !(h >= d); c++)
                        for (var p = 0; p < i && !(h >= d); p++) {
                            var f = c * i + p,
                                u = Me[this.dst[f]] || [0, 0, 0];
                            l[h++] = u[0], l[h++] = u[1], l[h++] = u[2], l[h++] = 223
                        }
                    return o.putImageData(s, 0, 0), e.globalCompositeOperation = "destination-over", e.drawImage(a, 0, ke(this.offset), i / ye, r / ye), e.globalCompositeOperation = "source-over", this
                },
                printValues: function() {
                    var t, e, n, r, i, a, o = this.renderer,
                        s = o.ctx,
                        l = o.width,
                        d = o.tdWidth,
                        h = ke(d),
                        c = this.data.data["temp-1000h"].length,
                        p = 3,
                        f = h * p,
                        u = ke(this.height),
                        g = ke(l);
                    for (s.fillStyle = "#888", s.textAlign = "center", s.font = "8px Verdana"; p < c - 3;) {
                        var v = f;
                        a = 0, n = 0, i = -1 / 0;
                        for (var m = 0; m < u; m++) {
                            if (e != (t = this.dst[v]) || m === u - 1) {
                                if ((r = m - Math.round((m - a) / 2)) - n > 12) {
                                    var b = we(5 * i + xe) - we(xe);
                                    0 !== i && s.fillText("ISA" + (b < 0 ? b : "+" + b) + "°", f / ye, (r + 6) / ye)
                                }
                                a = m, n = r, i = -1 / 0
                            }
                            e = t, i = Math.max(t, e, i), v += g
                        }
                        p += 4, f += 4 * h
                    }
                    return this
                },
                printLegend: function(t) {
                    void 0 === t && (t = {});
                    var e = t.height,
                        n = t.offset;
                    return this.renderer.printLegend({
                        key: this.ident,
                        offset: n || this.offset,
                        height: e || this.height
                    }), this
                }
            },
            Te = C.temp.convertNumber.bind(C.temp),
            Ie = ["1000h", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "200h", "150h"],
            Ce = [1e3, 950, 925, 900, 850, 800, 700, 600, 500, 400, 300, 200, 150],
            Se = Math.min(window.devicePixelRatio || 1, 2),
            Fe = 1 + Math.floor((273.15 - 193) / 5),
            ze = 273.15 - 5 * Fe,
            Pe = function(t, e, n) {
                return t.map(function(r, i) {
                    return o.bound(function(t, e, n) {
                        return t + n * (e - t)
                    }(t[i], e[i], n), 0, 255)
                })
            },
            We = function(t) {
                return Math.round(t * Se)
            },
            Ne = function(t, e, n) {
                var r = [t[n - 1 - e], t[n - e], t[n + 1 - e], t[n - 1], t[n], t[n + 1], t[n - 1 + e], t[n + e], t[n + 1 + e]],
                    i = 0,
                    a = !1,
                    o = !1;
                r[1] !== r[7] && (i += 2), r[3] !== r[5] && (i += 2), r[0] !== r[6] && (i += 1), r[2] !== r[8] && (i += 1), r[0] !== r[2] && (i += 1), r[6] !== r[8] && (i += 1);
                for (var s = 0; s < r.length; s++) r[s] === Fe - 1 && (a = !0), r[s] === Fe && (o = !0);
                return a && o ? Math.min(2 + 48 * i, 128) : Math.max(1 - .03 * i, .05)
            },
            Ee = function() {
                for (var t = [], e = [
                        [203, [255, 209, 233, 255]],
                        [219, [183, 225, 255, 255]],
                        [233, [229, 137, 255, 255]],
                        [243, [153, 170, 255, 255]],
                        [258, [192, 195, 243, 255]],
                        [263, [251, 206, 241, 255]],
                        [268, [195, 251, 253, 255]],
                        [272, [197, 219, 255, 255]],
                        [274, [206, 255, 203, 255]],
                        [278, [171, 245, 166, 255]],
                        [283, [238, 239, 175, 255]],
                        [288, [239, 221, 198, 255]],
                        [293, [241, 205, 205, 255]],
                        [298, [247, 214, 241, 255]],
                        [303, [248, 218, 249, 255]],
                        [308, [222, 213, 253, 255]],
                        [331, [208, 200, 251, 255]]
                    ], n = e.length, r = ze + 2.5; r < 328;) {
                    for (var i = 1; i < n; ++i)
                        if (r < e[i][0]) {
                            var a = (r - e[i - 1][0]) / (e[i][0] - e[i - 1][0]);
                            t.push(Pe(Pe(e[i - 1][1], e[i][1], a), [160, 160, 160, 255], .3));
                            break
                        }
                    r += 5
                }
                return t
            }(),
            Ae = {
                init: function(t) {
                    var e = t.offset,
                        n = t.height,
                        r = t.renderer;
                    return this.data = {
                        distances: r.data.forecast.distances,
                        data: r.data.forecast.data
                    }, this.ident = "temp", this.offset = e, this.height = n, this.renderer = r, this
                },
                printTemperatures: function() {
                    for (var t = this.data.data, e = t["temp-1000h"].length, n = Ie.length, r = new Float32Array(e * n), i = 0, a = 0; a < n; ++a)
                        for (var o = 0; o < e; ++o) r[i++] = Number(t["temp-" + Ie[a]][o]);
                    for (var s, l = this.renderer, d = l.ctx, h = l.width, c = l.tdWidth, p = We(c), f = We(this.height), u = We(h), g = -ze, v = d.createImageData(u, f), m = v.data, b = new Uint8Array(u * f), w = (f - 1) / 850, x = p + 1 >> 1, y = f, k = 0; k < n - 1; ++k) {
                        s = y, y = Math.round((Ce[k + 1] + -150) * w);
                        for (var L = e * ct(k + 2, n), M = e * ct(k + 1, n), D = e * ct(k + 0, n), T = e * ct(k - 1, n), I = s - y, C = 1 / I, S = 0, F = x, z = 0; z < e + 1; ++z) {
                            for (var P = ct(z - 2, e), W = ct(z - 1, e), N = ct(z + 0, e), E = ct(z + 1, e), A = [r[L + P], r[L + W], r[L + N], r[L + E], r[M + P], r[M + W], r[M + N], r[M + E], r[D + P], r[D + W], r[D + N], r[D + E], r[T + P], r[T + W], r[T + N], r[T + E]], O = F - S, H = 1 / O, G = y * u + S, B = 0; B < I; ++B)
                                for (var V = G + B * u, _ = 0; _ < O && V < b.length; ++_, V++) {
                                    var R = ht(A, H * _, C * B);
                                    b[V] = Math.floor(.2 * (R + g))
                                }
                            S = F, (F += p) > u && (F = u)
                        }
                    }
                    var q = m.length - 4;
                    i = 0;
                    for (var X = 0; X < f && !(i >= q); X++)
                        for (var j = 0; j < u && !(i >= q); j++) {
                            var Y = X * u + j,
                                U = 1;
                            X > 0 && X < f - 1 && j > 0 && j < u - 1 && (U = Ne(b, u, Y));
                            var Z = Ee[b[Y]] || [0, 0, 0];
                            U < .99 ? (m[i++] = Math.round(Z[0] * U), m[i++] = Math.round(Z[1] * U), m[i++] = Math.round(Z[2] * U)) : U > 2 ? (m[i++] = Math.min(Z[0] + U, 255), m[i++] = Math.min(Z[1] + U, 255), m[i++] = Math.min(Z[2] + U, 255)) : (m[i++] = Z[0], m[i++] = Z[1], m[i++] = Z[2]), m[i++] = 255
                        }
                    d.putImageData(v, 0, We(this.offset));
                    var K, J, Q = 2,
                        $ = p * Q;
                    for (d.fillStyle = "rgba(255, 255, 255, 0.8)", d.textAlign = "center", d.font = "8px Verdana"; Q < e;) {
                        var tt = $;
                        y = 0;
                        for (var et = 0; et < f - 6; et++) {
                            if (K = b[tt], J >= 0 && J != K && et - y > 12) {
                                var nt = Math.round(ze + 5 * Math.max(K, J));
                                d.fillText(Te(nt) + "°", $ / Se, (et + 12 * .35) / Se), y = et
                            }
                            J = K, tt += u
                        }
                        Q += 4, $ += 4 * p
                    }
                    return this
                },
                printHeights: function() {
                    var t, e, n, r, i, a = this.renderer,
                        o = a.ctx,
                        s = a.width,
                        l = (this.height - 1) / 850;
                    for (o.fillStyle = "rgba(32, 32, 32, 0.50)", o.font = "9px Verdana", o.setLineDash([2, 4]), o.lineWidth = Se, o.strokeStyle = "rgba(0, 0, 0, 0.20)", o.beginPath(), n = 0; n < 2; n++)
                        for (o.textAlign = n ? "right" : "left", i = 0 === n ? 2 : s - 2, e = 0; e < Ie.length - 1; e++) "925h" !== (r = Ie[e]) && (t = Math.round((Ce[e] + -150) * l), o.fillText(r, i, t + 3), n && e && (o.moveTo(30, t), o.lineTo(s - 30, t)));
                    return o.stroke(), o.setLineDash([]), this
                },
                printLegend: function(t) {
                    void 0 === t && (t = {});
                    var e = t.height,
                        n = t.offset;
                    return this.renderer.printLegend({
                        key: this.ident,
                        offset: n || this.offset,
                        height: e || this.height
                    }), this
                }
            },
            Oe = kt.extend({
                renderDistances: function() {
                    Wt({
                            offset: 0,
                            height: 20,
                            renderer: this
                        }).printGrid().printValues(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = function(t) {
                                    for (var e = [], n = 1; n < t.length - 1; n++) e.push((e[e.length - 1] || 0) + t[n - 1].distance);
                                    return e
                                }(r.data.waypoints);
                            return Pt.init({
                                offset: e,
                                height: n,
                                ident: "waypoint",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 10,
                                        color: "#FFFFFF",
                                        circle: {
                                            color: "#9D0300",
                                            radius: 7
                                        },
                                        value: t + 2,
                                        bold: !0
                                    }
                                }],
                                data: {
                                    distances: i,
                                    data: i
                                }
                            })
                        }({
                            offset: 0,
                            height: 20,
                            renderer: this
                        }).printGrid().printValues()
                },
                renderElevation: function() {
                    At({
                        offset: 40,
                        height: 110,
                        renderer: this,
                        domain: [this.data.elevation.min, this.data.elevation.max]
                    }).printGraph().printPeaks()
                },
                renderBasicForecast: function() {
                    var t;
                    (t = {
                        offset: 20,
                        height: 20,
                        renderer: this
                    }, It.init(t)).print(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.distances,
                                o = i.data;
                            return Lt.instance().init({
                                offset: e,
                                height: n,
                                ident: "temp",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 13.2,
                                        color: "#222",
                                        value: Tt(o.temp[t]) + "°"
                                    }
                                }],
                                data: {
                                    distances: a,
                                    data: o.temp
                                }
                            })
                        }({
                            offset: 45,
                            height: 18,
                            renderer: this
                        }).printValues().printLegend(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.distances,
                                o = i.data;
                            return St.init({
                                offset: e,
                                height: n,
                                ident: "rain",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 9.6,
                                        color: "#042ca5",
                                        value: o.precip[t] ? Ct(o.precip[t]) : ""
                                    }
                                }],
                                data: {
                                    distances: a,
                                    data: o.precip
                                }
                            })
                        }({
                            offset: 63,
                            height: 22,
                            renderer: this
                        }).printValues().printGraph().printLegend(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.data,
                                o = i.distances;
                            return Lt.instance().init({
                                offset: e,
                                height: n,
                                ident: "wind",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 12,
                                        color: "#222",
                                        value: Mt(a.wind[t])
                                    }
                                }],
                                colors: Dt,
                                data: {
                                    distances: o,
                                    data: a.wind
                                }
                            })
                        }({
                            offset: 85,
                            height: 18,
                            renderer: this
                        }).printValues().printBackground().printLegend(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.data,
                                o = i.distances;
                            return Lt.instance().init({
                                offset: e,
                                height: n,
                                ident: "windGust",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 8.4,
                                        color: "#222",
                                        value: Mt(a.gust[t])
                                    }
                                }],
                                colors: Dt,
                                data: {
                                    distances: o,
                                    data: a.gust
                                }
                            })
                        }({
                            offset: 103,
                            height: 16,
                            renderer: this
                        }).printValues().printBackground().printLegend(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.data,
                                o = i.distances,
                                s = i.bearings,
                                l = function(t) {
                                    return null !== r.dirCorrection ? (a.windDir[t] - s[t] + 360) % 360 : a.windDir[t]
                                };
                            return Lt.instance().init({
                                offset: e,
                                height: n,
                                ident: "windDir",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 12,
                                        color: bt(null !== r.dirCorrection ? l(t) : 120),
                                        isIcon: !0,
                                        value: "4",
                                        rotation: l(t)
                                    }
                                }],
                                data: {
                                    distances: o,
                                    data: a.windDir
                                }
                            })
                        }({
                            offset: 119,
                            height: 20,
                            renderer: this
                        }).printValues().printLegend()
                },
                renderCarElevation: function() {
                    At({
                        offset: this.height - 65,
                        height: 65,
                        renderer: this,
                        domain: [this.data.elevation.min, this.data.elevation.max]
                    }).printGraph().printPeaks().printLegend()
                },
                renderWaves: function() {
                    (function(t) {
                        var e = t.offset,
                            n = t.height,
                            r = t.renderer,
                            i = r.data.forecast,
                            a = i.distances,
                            o = i.data,
                            s = i.bearings;
                        return Lt.instance().init({
                            offset: e,
                            height: n,
                            ident: "waves",
                            renderer: r,
                            lines: [function(t) {
                                return {
                                    fontSize: 9.7,
                                    color: "#565656",
                                    isIcon: !0,
                                    value: o.wavesDir[t] ? "#" : "",
                                    rotation: o.wavesDir[t] && null !== r.dirCorrection ? (o.wavesDir[t] - s[t] + 360) % 360 : o.wavesDir[t]
                                }
                            }, function(t) {
                                return {
                                    fontSize: 10.8,
                                    color: "#222",
                                    value: o.waves[t] ? Ot(o.waves[t]) : "--"
                                }
                            }],
                            colors: Ht,
                            data: {
                                distances: a,
                                data: o.waves
                            }
                        })
                    })({
                        offset: 140,
                        height: 30,
                        renderer: this
                    }).printValues().printBackground().printLegend()
                },
                renderVfrElevation: function() {
                    At({
                        offset: 0,
                        height: this.height - 80,
                        renderer: this,
                        domain: [0, 3750]
                    }).printGraph({
                        topColor: "#eed599",
                        bottomColor: "#fbf4e6"
                    })
                },
                renderVfr: function() {
                    var t, e = [1e3, 950, 900, 850, 800, 700];
                    (function(t) {
                        var e = t.offset,
                            n = t.height,
                            r = t.renderer,
                            i = r.data.forecast,
                            a = i.distances,
                            o = i.data,
                            s = a.map(function(t, e) {
                                return parseFloat((Gt(o.temp[e]) - Gt(o.dewpoint[e])).toFixed(1))
                            });
                        return Lt.instance().init({
                            offset: e,
                            height: n,
                            ident: "dewpoint",
                            renderer: r,
                            lines: [function(t) {
                                return {
                                    fontSize: 8.4,
                                    color: "#222",
                                    value: (e = s[t], e > Gt(10) - Gt(0) ? Math.round(e) : e)
                                };
                                var e
                            }],
                            colors: Bt,
                            data: {
                                distances: a,
                                data: s
                            }
                        })
                    })({
                        offset: this.height - 16,
                        height: 16,
                        renderer: this
                    }).printBackground().printValues().printLegend(),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.distances,
                                o = i.data;
                            return Lt.instance().init({
                                offset: e,
                                height: n,
                                ident: "cbase",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 8.4,
                                        color: "#222",
                                        value: o.cbase[t] >= 5e3 ? "--" : Ut(jt(o.cbase[t]))
                                    }
                                }],
                                colors: Yt,
                                data: {
                                    distances: a,
                                    data: o.cbase
                                }
                            })
                        }({
                            offset: this.height - 48,
                            height: 16,
                            renderer: this
                        }).printBackground().printValues().printLegend(), Zt({
                            offset: this.height - 64,
                            height: 16,
                            renderer: this
                        }).printBackground().printValues().printLegend(), be({
                            offset: this.height - 80,
                            height: 16,
                            renderer: this
                        }).printIcons().printLegend(), (t = {
                            offset: 0,
                            height: this.height - 80,
                            renderer: this
                        }, ae.init(t)).printClouds(), le({
                            offset: 0,
                            height: this.height - 80,
                            renderer: this
                        }).printHeights(e),
                        function(t) {
                            var e = t.offset,
                                n = t.height,
                                r = t.renderer,
                                i = r.data.forecast,
                                a = i.distances,
                                o = i.data;
                            return Lt.instance().init({
                                offset: e,
                                height: n,
                                ident: "vis",
                                renderer: r,
                                lines: [function(t) {
                                    return {
                                        fontSize: 8.4,
                                        color: "#222",
                                        value: (e = Xt(o.vis[t]), e > 5 ? Math.round(e) : e)
                                    };
                                    var e
                                }],
                                colors: qt,
                                data: {
                                    distances: a,
                                    data: o.vis
                                }
                            })
                        }({
                            offset: this.height - 32,
                            height: 16,
                            renderer: this
                        }).printBackground().printValues().printLegend(), fe({
                            offset: 0,
                            height: this.height - 80,
                            renderer: this
                        }).printMarks(e), Rt({
                            offset: 0,
                            height: this.height - 80,
                            renderer: this
                        }).printIsotherm().printLabels(),
                        function(t) {
                            return he.init(t)
                        }({
                            offset: this.height - 115,
                            height: 35,
                            renderer: this
                        }).printBars().printLegend()
                },
                renderIfrElevation: function() {
                    At({
                        offset: 0,
                        height: this.height - 32,
                        renderer: this,
                        domain: [0, 15e3]
                    }).printGraph({
                        topColor: "#eed599",
                        bottomColor: "#fbf4e6"
                    })
                },
                renderIfr: function() {
                    var t, e = [900, 800, 700, 600, 500, 400, 300, 200, 150];
                    (t = {
                        offset: 0,
                        height: this.height - 32,
                        renderer: this
                    }, De.init(t)).printValues().printHeatmap().printLegend({
                        height: 20,
                        offset: Math.round((this.height - 52) / 2)
                    }), Zt({
                        offset: this.height - 16,
                        height: 16,
                        renderer: this
                    }).printBackground().printValues().printLegend(), be({
                        offset: this.height - 32,
                        height: 16,
                        renderer: this
                    }).printIcons().printLegend(), Rt({
                        offset: 0,
                        height: this.height - 32,
                        renderer: this
                    }).printIsotherm().printLabels(), fe({
                        offset: 0,
                        height: this.height - 32,
                        renderer: this
                    }).printMarks(e), le({
                        offset: 0,
                        height: this.height - 32,
                        renderer: this
                    }).printHeights(e)
                },
                renderAirgram: function() {
                    var t, e = this;
                    (t = {
                        offset: 0,
                        height: this.height,
                        renderer: this
                    }, Ae.init(t)).printTemperatures().printHeights().printLegend({
                        height: 20,
                        offset: Math.round((this.height - 20) / 2)
                    }), fe({
                        offset: 0,
                        height: this.height,
                        renderer: this,
                        customYgetter: function(t) {
                            var n = 100 - (t - 150) / 850 * 100;
                            return Math.round((1 - .01 * n) * e.height)
                        }
                    }).printMarks([1e3, 950, 900, 850, 800, 700, 600, 500, 400, 300, 200])
                }
            }),
            He = v.extend({
                init: function(t) {
                    return this.refs = t, this.lastTotal = -1, S.on("waypoints", this.onWaypoints.bind(this)), n.on("metricChanged", this.render.bind(this)), this
                },
                onWaypoints: function(t) {
                    var e = t.total;
                    this.lastTotal = e, this.render()
                },
                setDetails: function(t) {
                    void 0 === t && (t = {});
                    var e = t.gain,
                        n = t.loss,
                        r = t.min,
                        i = t.max;
                    return this.gain = e, this.loss = n, this.min = r, this.max = i, this
                },
                render: function() {
                    if (this.lastTotal > -1) {
                        var t = k.thousands(h.distance.convertNumber(this.lastTotal)),
                            e = "";
                        if (t && (e += "<div>\n\t\t\t\t\t" + t + '<span data-do="metric,distance" data-icon-after="K" class="metric-clickable inlined">' + h.distance.metric + "</span>\n\t\t\t\t</div>"), e += '<div class="size-s gain-loss">', this.gain || 0 === this.gain) e += '\n\t\t\t\t\t<div data-tooltip="Total ascent" class="tooltip-right">\n\t\t\t\t\t\t<span data-icon="3" class="inlined"> ' + (k.thousands(h.elevation.convertNumber(this.gain)) || 0) + '</span><span data-do="metric,elevation"\n\t\t\t\t\t\tclass="metric-clickable">' + h.elevation.metric + "</span>\n\t\t\t\t\t</div>\n\t\t\t\t";
                        if (this.loss || 0 === this.loss) e += '\n\t\t\t\t\t<div data-tooltip="Total descent" class="tooltip-right">\n\t\t\t\t\t\t<span data-icon="4" class="inlined"> ' + (k.thousands(h.elevation.convertNumber(this.loss)) || 0) + '</span><span data-do="metric,elevation"\n\t\t\t\t\t\tclass="metric-clickable">' + h.elevation.metric + "</span>\n\t\t\t\t\t</div>\n\t\t\t\t";
                        if (this.max || 0 === this.max) e += '\n\t\t\t\t\t<div data-tooltip="Max elevation (AMSL)" class="tooltip-right">\n\t\t\t\t\t\t<span data-icon="n" class="inlined"> ' + (k.thousands(h.elevation.convertNumber(this.max)) || 0) + '</span><span data-do="metric,elevation"\n\t\t\t\t\t\tclass="metric-clickable">' + h.elevation.metric + "</span>\n\t\t\t\t\t</div>\n\t\t\t\t";
                        if (this.min || 0 === this.min) e += '\n\t\t\t\t\t<div data-tooltip="Min elevation (AMSL)" class="tooltip-right">\n\t\t\t\t\t\t<span data-icon="&#xe00a;" class="inlined"> ' + (k.thousands(h.elevation.convertNumber(this.min)) || 0) + '</span><span data-do="metric,elevation"\n\t\t\t\t\t\tclass="metric-clickable">' + h.elevation.metric + "</span>\n\t\t\t\t\t</div>\n\t\t\t\t";
                        e += "</div>", this.refs.distance.innerHTML = e
                    }
                    return this
                }
            }),
            Ge = C.distance.convertNumber.bind(C.distance),
            Be = I.instance({
                ident: "route-detail",
                attachPoint: "#route-detail-container",
                className: "drop-down-window down",
                html: ""
            }),
            Ve = function(t) {
                Be.html = function(t) {
                    return void 0 === t && (t = []), t.length <= 1 ? "<p>Not enough waypoints</p>" : "<table>\n        <tr>\n            <td></td>\n            <td>lat</td>\n            <td>lon</td>\n            <td>bearing</td>\n            <td>" + C.distance.metric + "</td>\n        </tr>\n        " + t.map(function(t, e) {
                        return '<tr>\n                    <td><div class="dist-ball">' + (e + 1) + "<div></td>\n                    <td>" + t.point.lat.toFixed(2) + "</td>\n                    <td>" + t.point.lng.toFixed(2) + "</td>\n                    <td>" + (t.initialBearing || 0 === t.initialBearing ? "<span>" + Math.round((t.initialBearing + 360) % 360) + "°</span>" : "") + "</td>\n                    <td>" + (t.distance || 0 === t.distance ? Ge(t.distance) : "") + "</td>\n                </tr>"
                    }).join("") + '\n    </table>\n    <div class="centered mobilehide">\n        <div class="button size-s" data-icon="." data-do="download,gpx">GPX</div>\n        <div class="button size-s" data-icon="." data-do="download,kml">KML</div>\n        <div class="button size-s" data-do="rqstOpen,share">Share</div>\n        <div class="button size-s" data-do="reverse">Reverse route</div>\n    </div>'
                }(t), Be.setContent.call(Be, Be.html)
            },
            _e = Be.open.bind(Be),
            Re = Be.close.bind(Be),
            qe = e,
            Xe = !1,
            je = function(t) {
                return t ? ((Qt = t.reduce(function(t, e) {
                    return t.then(function() {
                        for (var t = [], n = arguments.length; n--;) t[n] = arguments[n];
                        if (Xe) throw Xe = !1, {
                            interrupted: !0
                        };
                        return e.apply(void 0, t)
                    })
                }, Promise.resolve())).then(function() {
                    Qt.done = !0
                }).catch(function() {
                    Qt.done = !0
                }), Qt) : ((Qt = Promise.resolve()).done = !0, Qt)
            };
        je();
        var Ye = !1,
            Ue = "elevation",
            Ze = {},
            Ke = Oe.init(e.refs, e.node, {
                geopotentialHeight: !1
            }),
            Je = He.init(e.refs),
            Qe = function(t) {
                if (t && t.length) {
                    var e = ft(t);
                    d.url("distance/" + ("elevation" !== Ue ? Ue + "/" : "") + e)
                }
            },
            $e = function() {
                if (!Qt.done) return Xe = !0, void Qt.then($e).catch($e);
                Ve(Ze.points), qe.refs.dataTable.scrollLeft = 0, qe.refs.loader.classList.add("show"), qe.refs.forecastTable.classList.remove("show"), qe.refs.error.classList.remove("show"), qe.node.dataset.view = Ue;
                var t = Ze && Ze.points && Ze.points.length || 0;
                qe.node.dataset.waypoints = t;
                var e = function() {
                    o.toggleClass(qe.node, qe.refs.dataTable.scrollLeft < qe.refs.dataTable.scrollWidth - qe.refs.dataTable.offsetWidth, "has-scroll"), o.toggleClass(qe.node, qe.refs.dataTable.scrollLeft > 100, "has-scroll-left")
                };
                if (qe.refs.dataTable.addEventListener("scroll", e), Ke.clean(), t >= 2) {
                    var r;
                    switch (Ke.initCanvas({
                        totalDistance: Ze.total,
                        view: Ue
                    }), e(), Ke.setDistanceData(Ze), Ue) {
                        case "elevation":
                            r = [function() {
                                return ut(Ze.points)
                            }, function(t) {
                                var e = t.data;
                                Ke.setElevationData(e), Ke.renderElevation(), Je.setDetails(e)
                            }];
                            break;
                        case "car":
                            r = [function() {
                                return Je.setDetails(void 0)
                            }, function() {
                                return ut(Ze.points)
                            }, function(t) {
                                var e = t.data;
                                Ke.setElevationData(e), Ke.renderCarElevation()
                            }, function() {
                                return gt(Ze.points, "car")
                            }, function(t) {
                                var e = t.data;
                                Ke.setForecastData(e), Ke.renderBasicForecast()
                            }];
                            break;
                        case "boat":
                            r = [function() {
                                return Je.setDetails(void 0)
                            }, function() {
                                return gt(Ze.points, "boat")
                            }, function(t) {
                                var e = t.data;
                                Ke.setForecastData(e), Ke.renderBasicForecast(), Ke.renderWaves()
                            }];
                            break;
                        case "vfr":
                            r = [function() {
                                return Je.setDetails(void 0)
                            }, function() {
                                return ut(Ze.points)
                            }, function(t) {
                                var e = t.data;
                                Ke.setElevationData(e), Ke.renderVfrElevation()
                            }, function() {
                                return gt(Ze.points, "vfr")
                            }, function(t) {
                                var e = t.data;
                                Ke.setForecastData(e), Ke.renderVfr()
                            }];
                            break;
                        case "ifr":
                            r = [function() {
                                return Je.setDetails(void 0)
                            }, function() {
                                return ut(Ze.points)
                            }, function(t) {
                                var e = t.data;
                                Ke.setElevationData(e), Ke.renderIfrElevation()
                            }, function() {
                                return gt(Ze.points, "ifr")
                            }, function(t) {
                                var e = t.data;
                                Ke.setForecastData(e), Ke.renderIfr()
                            }];
                            break;
                        case "airgram":
                            r = [function() {
                                return Je.setDetails(void 0)
                            }, function() {
                                return gt(Ze.points, "airgram")
                            }, function(t) {
                                var e = t.data;
                                Ke.setForecastData(e), Ke.renderAirgram()
                            }]
                    }
                    je(r).then(function() {
                        Ke.renderDistances(), qe.refs.loader.classList.remove("show"), qe.refs.forecastTable.classList.add("show"), Je.render(), n.emit("uiChanged"), Qe(Ze.points)
                    }).catch(function(t) {
                        t.interrupted ? console.warn("Rendering has been interrupted.") : (console.error(t), qe.refs.error.classList.add("show"), qe.refs.loader.classList.remove("show"))
                    })
                } else Je.setDetails(void 0), Je.render(), Qe(Ze.points), qe.refs.loader.classList.remove("show")
            },
            tn = o.debounce($e, 500),
            en = function(t) {
                Ke.setDirCorrection(t), tn()
            },
            nn = function(t) {
                var e = t.points,
                    n = t.total;
                Ze = {
                    points: e,
                    total: n
                }, tn()
            },
            rn = function() {
                var t = s.get("product");
                "ecmwf" !== t && "ecmwfWaves" !== t ? qe.refs.notInSync.classList.add("show") : qe.refs.notInSync.classList.remove("show")
            };
        e.onopen = function(t) {
            Ue = t && t.view || Ue, an.set(Ue), "object" == typeof t && t.length ? t = t.map(function(t) {
                return t.lat + "," + t.lon
            }).join(";") : t && t.coords && (t = t.coords), Ye || (S.on("waypoints", nn), s.on("timestamp", tn), s.on("level", tn), s.on("product", rn), s.on("overlay", rn), s.on("rplannerDir", en), n.on("metricChanged", tn), Ye = !0), rn(), n.emit("searchClose"), nt(t)
        }, e.onclose = function() {
            rt(), Re(), Ue = "elevation";
            for (var t = qe.refs.display.children, e = 0; e < t.length; e++) t[e].classList.remove("selected");
            qe.refs.notInSync.classList.remove("show"), Ye && (S.off("waypoints", nn), s.off("timestamp", tn), s.off("level", tn), s.off("product", rn), s.off("overlay", rn), s.off("rplannerDir", en), n.off("metricChanged", tn), Ye = !1)
        }, c.instance({
            el: e.refs.numDirection,
            bindStore: "rplannerDir"
        });
        var an = t.instance({
            el: e.refs.display,
            initValue: Ue,
            onset: function(t) {
                Ue = t, tn()
            }
        });
        a.instance({
            progressBar: e.refs.pbar,
            offset: 0,
            borderOffset: 10,
            UIident: "rplanner"
        }), r.instance({
            scrollEl: e.refs.dataTable
        }), i.instance({
            el: e.node,
            stopPropagation: !0,
            click: function(t, e) {
                switch (t) {
                    case "metric":
                        C[e] && C[e].cycleMetric();
                        break;
                    case "routeDetail":
                        Ve(Ze.points), Be.isOpen ? Re() : _e();
                        break;
                    case "download":
                        ! function(t, e) {
                            var n = "track-" + (new Date).toUTCString().replace(/[:,]/g, "").replace(/ /g, "-") + "." + t,
                                r = "gpx" === t ? function(t, e) {
                                    return '<?xml version="1.0" encoding="utf-8"?>\n\t\t<gpx creator="Windy.com" version="1.1" xmlns="http://www.topografix.com/GPX/1/1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd">\n\t\t\t<trk>\n\t\t\t\t<name>Windy.com ' + t + "</name>\n\t\t\t\t<trkseg>" + e.map(function(t, e) {
                                        var n = t.point;
                                        return '<trkpt lat="' + n.lat + '" lon="' + n.lng + '">\n\t\t\t\t\t\t        <name>' + (e + 1) + "</name>\n\t\t\t\t\t        </trkpt>"
                                    }).join("") + "</trkseg>\n\t\t\t</trk>\n\t\t</gpx>"
                                }(n, e) : function(t, e) {
                                    return '<?xml version="1.0" encoding="utf-8"?>\n\t\t<kml xmlns="http://www.opengis.net/kml/2.2">\n\t\t<Document>\n\t\t\t<name>Windy.com ' + t + '</name>\n\t\t\t<open>1</open>\n\t\t\t<description>\n\t\t\t<![CDATA[\n\t\t\t\tpopisek\n\t\t\t]]>\n\t\t\t</description>\n\t\t\t<Style id="path"><LineStyle><color>b20000ff</color><width>6</width></LineStyle></Style>\n\t\t\t<Style id="routepoint"><IconStyle><color>b20000ff</color><Icon><href>http://maps.google.com/mapfiles/kml/shapes/placemark_square.png</href></Icon></IconStyle></Style>\n\t\t\t<Style id="waypoint"><IconStyle><color>b20000ff</color><Icon><href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href></Icon></IconStyle></Style>\n\t\t\t<Folder>\n\t\t\t\t<name>1. část</name>\n\t\t\t\t<visibility>1</visibility>\n\t\t\t\t<open>1</open>\n\t\t\t\t<Placemark><name>Windy.com ' + t + "</name><styleUrl>#path</styleUrl>\n\t\t\t\t<LineString>\n\t\t\t\t\t<altitudeMode>clampToGround</altitudeMode>\n\t\t\t\t\t<tessellate>1</tessellate>\n\t\t\t\t\t<coordinates>\n                        " + e.map(function(t) {
                                        var e = t.point;
                                        return e.lng + "," + e.lat + ",0"
                                    }).join("\n") + "\n\t\t\t\t\t</coordinates>\n\t\t\t\t</LineString>\n\t\t\t\t</Placemark>\n\t\t\t</Folder>\n\t\t</Document>\n\t\t</kml>"
                                }(n, e);
                            o.download(r, "application/gpx+xml", n)
                        }(e, Ze.points);
                        break;
                    case "reverse":
                        it();
                        break;
                    case "sync":
                        if (qe.refs.notInSync.classList.remove("show"), "switch" === e) {
                            var n = s.get("overlay"),
                                r = l.ecmwf,
                                i = l.ecmwfWaves,
                                a = r.overlays.includes(n),
                                d = i.overlays.includes(n);
                            (a || d ? Promise.resolve() : s.set("overlay", "wind")).then(function() {
                                return s.set("product", d ? "ecmwfWaves" : "ecmwf")
                            })
                        }
                }
            }
        });
        qe.refs.calendar.innerHTML = p("#calendar").innerHTML
    }(W.require("Switch"), W.require("broadcast"), W.require("DraggableDiv"), W.require("ClickHandler"), W.require("TimestampBar"), W.require("utils"), W.require("store"), W.require("products"), W.require("location"), W.require("metrics"), W.require("BindedDropDown"), W.require("$"), W.require("map"), W.require("singleclick"), W.require("Evented"), W.require("Class"), W.require("ImageMaker"), W.require("trans"), W.require("overlays"), W.require("http"), W.require("Color"), W.require("format"), W.require("colors"), W.require("rootScope"), W.require("ImageGraph"), W.require("Window"))
});