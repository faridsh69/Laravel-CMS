/*!
	Copyright(c) 2014 - 2017 Citationtech SE, Windyty SE, Ivo Lukacovic
	Copyright(c) 2014 - 2018 Windyty SE
	All rights reserved
*/
! function() {
    var e, t = Date.now(),
        n = {};
    window.windySentErrors = [], window.onerror = i.bind(null, "error");
    try {
        new Float32Array(100)
    } catch (e) {
        return i("startup", "Type Array not supported", null, null, null, e, "errorLogger"), void document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("not-supported").style.display = "block"
        })
    }

    function i(i, a, r, o, l, c, d) {
        var u, h, f = W.rootScope,
            m = Date.now();
        try {
            "error" === i && "object" == typeof a ? (a = (h = a).message, r = r || h.filename, o = o || h.lineno, l = l || h.colno, u = h.error && h.error.stack) : c && "object" == typeof c && (r = r || c.fileName || c.sourceURL, a = (a && "string" == typeof a ? a : "") + ": " + c.message, u = c.stack, o = o || c.lineNumber || c.line, l = l || c.columNumber || c.column);
            var p = {
                    runningMs: m - t,
                    type: i,
                    module: d,
                    msg: a,
                    line: o,
                    col: l,
                    url: window.location.href,
                    script: r && r.replace(/.*\//, ""),
                    ver: W.version,
                    target: W.target,
                    stack: u
                },
                g = s(p.msg, 20) || "universal-key",
                v = 0;
            if ((v = g in n ? n[g]++ : n[g] = 0) % 10 || v > 100) return;
            if (v > 0 && (p.msg = "(" + v + "x) " + p.msg, p.repeated = v), o && p.script && (p.scriptLine = s(p.script, 10) + "-" + o), W.latestBcasts && W.latestBcasts.length) {
                p.latestBcast = "";
                for (var y = 0; y < W.latestBcasts.length; y++) p.latestBcast += W.latestBcasts[y].txt + " (" + (m - W.latestBcasts[y].ts) + "ms. ago)\n"
            }
            if (f) {
                p.uid = f.user && f.user.username;
                var w = W.store && W.store.get("country") || "xx";
                e || (e = w + "-" + (p.uid ? p.uid : f.sessionCounter)), p.sessionName = e, p.sessionCounter = f.sessionCounter, p.lang = W.store && W.store.get("usedLang"), p.retina = f.isRetina, p.size = window.screen.width + "x" + window.screen.height, p.glParticles = f.glParticlesOn, p.platform = f.platform
            }
            "index" === W.target && (window.top !== window.self && (p.target = "unlegalIframe"), /Android.* wv\)/.test(window.navigator.userAgent) && (p.target = "unlegalWebView"), window.cordova && (p.target = "unlegalCordova")), p.errorID = s(p.msg, 60);
            var b = new XMLHttpRequest,
                T = JSON.stringify(p);
            b.open("post", "http://www.advaned-offline.map/test-windy/sedlina/err", !0), b.setRequestHeader("Content-type", "application/json; charset=utf-8"), b.onreadystatechange = function() {
                4 === b.readyState && (delete p.uid, window.windySentErrors.push(p))
            }, b.send(T)
        } catch (e) {}
    }

    function s(e, t) {
        return e ? e.toString().substr(0, t).toLowerCase().replace(/[^\w\s-]/g, "").replace(/[\s_-]+/g, "-").replace(/^-+|-+$/g, "") : ""
    }
    window.wError = function(e, t, n) {
        console.error(e, t, n), i("user", t, null, null, null, n, e)
    }
}(),
/*!
Adrian Cooney <cooney.adrian@gmail.com> License: MIT */
function(e) {
    var t = {};

    function n(i) {
        var s = [];
        i.dependencies.forEach(function(e) {
            var a = t[e];
            if (!a) throw new Error("DI error: Module " + e + " not defined. Required by: " + i.name);
            a.wasLoaded ? s.push(a.loaded) : s.push(n(a))
        });
        try {
            i.loaded = i.callback.apply(null, s), i.wasLoaded = !0
        } catch (e) {
            window.wError("tinyrequire", "DI error: Can not resolve " + i.name + " module", e)
        }
        return i.name && (i.name in e ? window.wError("tinyrequire", "DI error: Object W." + i.name + " already exists") : e[i.name] = i.loaded), i.loaded
    }
    var i = {};
    e.require = function(e) {
        if ("string" == typeof e) {
            var i = t[e];
            return i.wasLoaded ? i.loaded : n(i)
        }
        Array.isArray(e) && n({
            dependencies: e,
            callback: function() {}
        })
    }, e.define = function(e, n, i) {
        if (t[e]) throw new Error("DI conflict: Module " + e + " already defined.");
        t[e] = {
            name: e,
            dependencies: n,
            callback: i,
            loaded: null,
            wasLoaded: !1
        }
    }, e.tag = function(e, t, n, s, a) {
        i[e] = {
            html: t,
            css: n,
            callback: a
        }
    }, e.tags = i, e.loadOrphanedModules = function() {
        for (var e in t) t[e].wasLoaded || n(t[e])
    }
}(window.W),
/*! */
L.CanvasLayer = L.Layer.extend({
        initialize: function(e) {
            L.Util.setOptions(this, e || {}), this.targetPane = "tilePane", this._showCanvasOn = !0, this.onInit()
        },
        addTo: function(e) {
            return this.failed = !1, e.addLayer(this), this
        },
        onAdd: function(e) {
            this._map = e;
            var t = e.getSize(),
                n = e.options.zoomAnimation && L.Browser.any3d;
            if (this._canvas = L.DomUtil.create("canvas", "leaflet-canvas"), this.onResizeCanvas(t.x, t.y), L.DomUtil.addClass(this._canvas, "leaflet-layer leaflet-zoom-" + (n ? "animated" : "hide")), e.getPanes()[this.targetPane].appendChild(this._canvas), !this.onCreateCanvas(this._canvas)) return this.failed = !0, void this.onCanvasFailed();
            e.on("resize", this._resize, this), e.on("zoomanim", this._animateZoom, this), e.on("zoom", this._onZoom, this), e.on("zoomstart", this._onZoomStart, this), e.on("zoomend", this._onZoomEnd, this), this.options.disableAutoReset || e.on("moveend", this._moveEnd, this), this._reset(), this._redraw()
        },
        onRemove: function(e) {
            this.onRemoveCanvas(this._canvas), e.getPanes()[this.targetPane].removeChild(this._canvas), e.off("resize", this._resize, this), e.off("zoomanim", this._animateZoom, this), e.off("zoom", this._onZoom, this), e.off("zoomstart", this._onZoomStart, this), e.off("zoomend", this._onZoomEnd, this), this.options.disableAutoReset || e.off("moveend", this._moveEnd, this), this._canvas = null
        },
        getCanvas: function() {
            return this._canvas
        },
        showCanvas: function(e) {
            this._showCanvasOn !== e && (this._showCanvasOn = e, this._canvas.style.display = this._showCanvasOn ? "block" : "none")
        },
        onResizeCanvas: function(e, t) {
            this._canvas.width = e, this._canvas.height = t
        },
        _resize: function(e) {
            this.onResizeCanvas(e.newSize.x, e.newSize.y)
        },
        _reset: function() {
            var e = this._map.containerPointToLayerPoint([0, 0]);
            L.DomUtil.setPosition(this._canvas, e), this._center = this._map.getCenter(), this._zoom = this._map.getZoom(), this.onReset()
        },
        reset: function() {
            this._reset()
        },
        onReset: function() {},
        _redraw: function() {
            this._frame = null
        },
        redraw: function() {
            return this._frame || (this._frame = L.Util.requestAnimFrame(this._redraw, this)), this
        },
        _moveEnd: function() {
            this._reset(), this.onMoveEnd()
        },
        _onZoomStart: function() {
            this.wasOnZoom = !1
        },
        _onZoomEnd: function() {
            this.canvasDisplay(!0)
        },
        canvasDisplay: function(e) {
            this._canvas && (this._canvas.style.display = e ? "block" : "none")
        },
        _animateZoom: function(e) {
            this.wasOnZoom && this.canvasDisplay(!1);
            var t = this._map.getZoomScale(e.zoom),
                n = this._map._latLngBoundsToNewLayerBounds(this._map.getBounds(), e.zoom, e.center).min;
            L.DomUtil.setTransform ? L.DomUtil.setTransform(this._canvas, n, t) : this._canvas.style[L.DomUtil.TRANSFORM] = L.DomUtil.getTranslateString(n) + " scale(" + t + ")"
        },
        _onZoom: function() {
            this.wasOnZoom = !0, this._updateTransform(this._map.getCenter(), this._map.getZoom())
        },
        _updateTransform: function(e, t) {
            var n = this._map.getZoomScale(t, this._zoom),
                i = this._canvas._leaflet_pos || new L.Point(0, 0),
                s = this._map.getSize().multiplyBy(.5 + (this.options.padding || 0)),
                a = this._map.project(this._center, t),
                r = this._map.project(e, t).subtract(a),
                o = s.multiplyBy(-n).add(i).add(s).subtract(r);
            L.DomUtil.setTransform ? L.DomUtil.setTransform(this._canvas, o, n) : this._canvas.style[L.DomUtil.TRANSFORM] = L.DomUtil.getTranslateString(o) + " scale(" + n + ")"
        },
        onInit: function() {},
        onCreateCanvas: function() {
            return !0
        },
        onCanvasFailed: function() {},
        onRemoveCanvas: function() {},
        onMoveEnd: function() {},
        onZoomEnd: function() {}
    }), L.PoisOverlay = L.Layer.extend({
        initialize: function(e) {
            this.className = e
        },
        getPane: function() {
            return this._map.getPanes().markerPane
        },
        onAdd: function(e) {
            this._map = e, this.displayed = !0, this._container || (this._container = L.DomUtil.create("div", "leaflet-layer windy-pois pois-" + this.className)), this.getPane().appendChild(this._container), this._map.on("viewreset", this._reset, this), this._reset(), this._markers = {}
        },
        getHtml: function(e, t, n) {
            var i = n.html;
            void 0 === i && (i = "");
            var s = n.style;
            void 0 === s && (s = "");
            var a = n.attrs;
            void 0 === a && (a = []);
            var r = this._map.latLngToLayerPoint(t);
            return '<div data-id="' + e + '"\n                    data-lat="' + t.lat + '" data-lon="' + t.lng + '"\n                    style="transform: translate(' + r.x + "px, " + r.y + "px); " + s + '"\n                    ' + (a ? a.join(" ") : "") + ">" + i + "</div>"
        },
        addPois: function(e, t) {
            this._container && this._container.insertAdjacentHTML("beforeend", e), this._markers = t
        },
        removePois: function() {
            this._container && (this._container.innerHTML = "")
        },
        onRemove: function() {
            this.getPane().removeChild(this._container), this.displayed = !1, this._map.off("viewreset", this._reset, this)
        },
        replaceMarker: function(e, t) {
            var n = this._container.querySelector('[data-id="' + e + '"]');
            n && (n.outerHTML = t)
        },
        getAllMarkers: function() {
            return this._container.querySelectorAll("[data-id]")
        },
        _reset: function() {
            this.forAllMarkers(this.getPosReset.bind(this))
        },
        forAllMarkers: function(e, t) {
            for (var n, i, s, a = this.getAllMarkers(), r = a.length, o = 0; o < r; o++) n = a[o], (s = this._markers[n.dataset.id]) && (i = e(s, t), this.setPoistion(n, i))
        },
        getPosReset: function(e) {
            return this._map.latLngToLayerPoint(e)
        },
        setPoistion: function(e, t) {
            e.style.transform = "translate(" + t.x + "px, " + t.y + "px)"
        }
    }), /*! */
    W.define("Class", [], function() {
        return {
            extend: function() {
                for (var e = arguments, t = Object.create(this), n = 0; n < arguments.length; n++) {
                    var i = e[n];
                    for (var s in i) t[s] = i[s]
                }
                return t
            },
            instance: function() {
                var e = this.extend.apply(this, arguments);
                return "function" == typeof e._init && e._init.call(e), e
            }
        }
    }), /*! */
    W.define("Evented", ["Class"], function(e) {
        /*!
        Copyright(c) 2011 Daniel Lamb <daniellmb.com> MIT Licensed */
        var t = [];
        return W.latestBcasts = t, e.extend({
            _init: function() {
                this.latestId = 1, this._eventedCache = {}, this.trigger = this.emit, this.fire = this.emit
            },
            emit: function(e, n, i, s, a) {
                var r, o, l;
                r = this.ident, o = e, l = n, t.push({
                    ts: Date.now(),
                    txt: r + ": " + o + ("string" == typeof l ? " " + l : "")
                }), t.length > 5 && t.shift();
                var c = this._eventedCache[e];
                if (c)
                    for (var d = c.length; d--;) {
                        var u = c[d];
                        try {
                            u.callback.call(u.context, n, i, s, a), u.once && this.off(u.id)
                        } catch (t) {
                            window.wError("Evented", "Failed to call " + e, t)
                        }
                    }
            },
            on: function(e, t, n, i) {
                return e in this._eventedCache || (this._eventedCache[e] = []), this._eventedCache[e].push({
                    id: ++this.latestId,
                    callback: t,
                    context: n || this,
                    once: i
                }), this.latestId
            },
            once: function(e, t, n) {
                return this.on(e, t, n, !0)
            },
            off: function(e, t, n) {
                if ("number" == typeof e)
                    for (var i in this._eventedCache) {
                        var s = this._eventedCache[i];
                        if (s) {
                            for (var a = s.length; a--;) s[a].id === e && s.splice(a, 1);
                            0 === s.length && delete this._eventedCache[i]
                        }
                    } else {
                        var r = this._eventedCache[e];
                        if (r) {
                            for (var o = r.length; o--;) r[o].callback !== t || n && n !== r[o].context || r.splice(o, 1);
                            0 === r.length && delete this._eventedCache[e]
                        }
                    }
            }
        })
    }), /*! */
    W.define("http", ["lruCache", "rootScope", "utils", "broadcast"], function(e, t, n, i) {
        var s = new e(50),
            a = "",
            r = 0,
            o = null,
            l = function(e, i) {
                var s = document.head.querySelector('meta[name="token"]'),
                    r = {
                        token: s && s.content,
                        token2: t.userToken || i || "pending",
                        uid: o,
                        sc: t.sessionCounter,
                        pr: +e,
                        v: t.version
                    };
                a = n.qs(r)
            };
        l(), i.on("tokenRecieved", l.bind(null, !1)), i.on("provisionaryToken", l.bind(null, !0)), i.on("identityCreated", function(e) {
            o = e, l()
        });
        var c = function(e) {
                return {
                    headers: e.headers,
                    status: e.status,
                    data: e.data && e.isJSON ? JSON.parse(e.data) : e.data
                }
            },
            d = "application/json binary/" + (W.assets || "").replace(/\./g, ""),
            u = function(e, o, l) {
                var u, h;
                if (void 0 === l && (l = {}), "object" == typeof l.qs) {
                    var f = n.qs(l.qs);
                    f && (o = n.addQs(o, f))
                }
                var m = /^\/?users\//.test(o) || l.withCredentials,
                    p = o;
                if (void 0 === l.cache && "get" === e && (l.cache = !0), l.cache && (u = s.get(o))) return Promise.resolve(u) == u ? u : Promise.resolve(c(u));
                var g = new XMLHttpRequest,
                    v = !1;
                if (!/^http/.test(o) && !/^v\/\d+/.test(o) && (o = n.joinPath(t.nodeServer, o), /node\.windy/.test(o) && (o = n.addQs(o, a + "&poc=" + ++r)), /^\/?forecast\//.test(p))) {
                    var y = /^(.+)\/forecast\/([^\/]+)\/([^\/]+)\/(.+)$/.exec(o),
                        w = y[1],
                        b = y[2],
                        T = y[3],
                        L = b + "/" + T + "/" + y[4];
                    o = w + "/" + ("Zm9yZWNhc3Q/" + window.btoa(T).replace(/=/g, "")) + "/" + window.btoa(L).replace(/=/g, ""), v = !0
                }
                o = encodeURI(o), g.open(e, o, !0), l.binary && (g.responseType = "arraybuffer"), m && (g.withCredentials = !0), g.setRequestHeader("Accept", d), h = new Promise(function(e, t) {
                    var n, a = {},
                        r = {};
                    g.onreadystatechange = function() {
                        if (4 === g.readyState)
                            if (l.parseHeaders && g.getAllResponseHeaders().split(/\n/).forEach(function(e) {
                                    (n = e.match(/(.*:?): (.*)/)) && (a[n[1].toLowerCase()] = n[2])
                                }), g.status >= 200 && g.status < 300 || 304 === g.status) {
                                r = {
                                    status: g.status,
                                    headers: a
                                }, l.binary ? r.data = g.response : v ? (r.isJSON = !0, r.data = window.atob(g.responseText)) : (r.isJSON = /json/.test(g.getResponseHeader("Content-Type")), r.data = g.responseText), l.cache && s.put(p, r);
                                var o = c(r);
                                e(o)
                            } else 0 === g.status && i.emit("noConnection", "http"), l.cache && s.remove(p), t(g.status)
                    }
                });
                var S = null;
                "post" !== e && "put" !== e || (g.setRequestHeader("Content-type", "application/json; charset=utf-8"), S = JSON.stringify(l.data));
                try {
                    g.send(S)
                } catch (e) {
                    return i.emit("noConnection", "http"), Promise.reject(e)
                }
                return l.cache && s.put(p, h), h
            };
        return {
            get: u.bind(null, "get"),
            delete: u.bind(null, "delete"),
            post: u.bind(null, "post"),
            put: u.bind(null, "put"),
            resetCache: function() {
                return s.removeAll()
            }
        }
    }), /*! */
    W.define("storage", ["rootScope", "http", "utils"], function(e, t, n) {
        var i, s = {
            isAvbl: !0,
            put: function(e, t) {
                return window.localStorage.setItem(e, JSON.stringify(t))
            },
            hasKey: function(e) {
                return e in window.localStorage
            },
            get: function(e) {
                return JSON.parse(window.localStorage.getItem(e))
            },
            remove: function(e) {
                return window.localStorage.removeItem(e)
            },
            getFile: function(n, i) {
                var s = this;
                void 0 === i && (i = {});
                var a = this.get(n);
                return a && (i.aboluteURL || a.version === e.version) && (!i.test || a.data && a.data[i.test]) ? Promise.resolve(a.data) : new Promise(function(a, r) {
                    t.get(i.aboluteURL ? n : e.assets + "/" + n).then(function(t) {
                        t.version = i.aboluteURL ? "notAplicable" : e.version, !i.test || i.test in t.data ? (s.put(n, t), a(t.data)) : r("File did not passed the test")
                    }).catch(function(e) {
                        window.wError("storage", "Failed to load lang file as .json", e), r(e)
                    })
                })
            }
        };
        try {
            if (window.localStorage.setItem("test", "bar"), "bar" !== window.localStorage.getItem("test")) throw new Error("Comparsion failed");
            window.localStorage.removeItem("test"), i = s
        } catch (e) {
            var a = {},
                r = {
                    isAvbl: !1,
                    put: function(e, t) {
                        return a[e] = t
                    },
                    hasKey: function(e) {
                        return e in a
                    },
                    get: function(e) {
                        return e in a ? a[e] : null
                    },
                    remove: function(e) {
                        return delete a[e]
                    }
                };
            r.getFile = s.getFile.bind(r), i = r
        }
        return i
    }), /*! */
    W.define("$", [], function() {
        return function(e, t) {
            return (t || document).querySelector(e)
        }
    }), /*! */
    W.define("lruCache", [], function() {
        /*! MIT. (c) 2010 Rasmus Andersson <http://hunch.se/> */
        function e(e) {
            this.size = 0, this.limit = e, this._keymap = {}
        }
        return e.prototype.put = function(e, t) {
            var n = {
                key: e,
                value: t
            };
            if (this._keymap[e] = n, this.tail ? (this.tail.newer = n, n.older = this.tail) : this.head = n, this.tail = n, this.size === this.limit) return this.shift();
            this.size++
        }, e.prototype.toJSON = function() {
            for (var e = [], t = this.head; t;) e.push({
                key: t.key,
                value: t.value
            }), t = t.newer;
            return e
        }, e.prototype.shift = function() {
            var e = this.head;
            return e && (this.head.newer ? (this.head = this.head.newer, this.head.older = void 0) : this.head = void 0, e.newer = e.older = void 0, delete this._keymap[e.key]), e
        }, e.prototype.get = function(e, t) {
            var n = this._keymap[e];
            if (void 0 !== n) return n === this.tail ? t ? n : n.value : (n.newer && (n === this.head && (this.head = n.newer), n.newer.older = n.older), n.older && (n.older.newer = n.newer), n.newer = void 0, n.older = this.tail, this.tail && (this.tail.newer = n), this.tail = n, t ? n : n.value)
        }, e.prototype.remove = function(e) {
            var t = this._keymap[e];
            if (t) return delete this._keymap[t.key], t.newer && t.older ? (t.older.newer = t.newer, t.newer.older = t.older) : t.newer ? (t.newer.older = void 0, this.head = t.newer) : t.older ? (t.older.newer = void 0, this.tail = t.older) : this.head = this.tail = void 0, this.size--, t.value
        }, e.prototype.removeAll = function() {
            this.head = this.tail = void 0, this.size = 0, this._keymap = {}
        }, e
    }), /*! */
    W.define("log", ["ga", "utils", "broadcast", "storage", "store", "rootScope", "seoParser", "router"], function(e, t, n, i, s, a, r, o) {
        var l = {},
            c = i.get("log2018") || {},
            d = t.debounce(function() {
                return i.put("log2018", c)
            }, 5e3),
            u = function(t) {
                t in l || (l[t] = 1, e.pageview(t), h(t))
            },
            h = function(e) {
                var t = e.split("/"),
                    n = t[0],
                    i = t[1],
                    s = t[2];
                if (n = n.substring(0, 2), /ov|pl|mo|an|pa|de|po|is|ve|le/.test(n) && ("pl" !== n || !/rhpane|picker|patch|detail|pois|user|radar|lhpane|noui|articles/.test(i))) {
                    var a = n + "/" + i + (s ? "/" + s : "");
                    a in c ? c[a]++ : c[a] = 1, d()
                }
            };
        return u("version/" + a.version), "/" !== r.startupUrl && u("startup" + r.startupUrl), o.url404 && u("404" + r.startupUrl), n.on("log", u), n.on("paramsChanged", function(e, t) {
            if (t) {
                var n = e[t];
                n && ("path" === t && (n = Math.round((s.get("timestamp") - Date.now()) / 864e5) + "d"), u(t + "/" + n), "ecmwf" !== e.product && u("model/" + e.product), "surface" !== e.level && u("level/" + e.level))
            }
        }), n.on("pluginOpened", function(e) {
            return u("plugin/" + e)
        }), s.on("pois", function(e) {
            return u("pois/" + e)
        }), n.on("animationStarted", u.bind(null, "animation")), {
            has: function(e) {
                return c[e]
            },
            clientLog: c
        }
    }), /*! */
    W.define("ga", ["rootScope", "store", "utils"], function(e, t, n) {
        var i = window.screen,
            s = n.qs({
                ul: e.prefLang,
                sr: i.width + "x" + i.height,
                cid: t.getDeviceID(),
                an: "Windy",
                av: e.version
            }),
            a = 1;
        /utm_/.test(window.location.search) && (s += "&" + function(e) {
            for (var t, n = /utm_(source|medium|term|campaign|content)=([^&]+)/g, i = {
                    source: "cs",
                    medium: "cm",
                    term: "ck",
                    campaign: "cn",
                    content: "cc"
                }, s = []; t = n.exec(e);) s.push(i[t[1]] + "=" + t[2]);
            return s.join("&")
        }(window.location.search));
        var r = !0,
            o = function(t) {
                var n = "dp=" + t + "&dl=" + encodeURIComponent(document.location) + "&" + s;
                if (e.user && (n += "&uid=" + e.user.userslug), r) {
                    var i = document.referrer;
                    /www.advaned-offline.map/.test(i) || (n += "&dr=" + encodeURIComponent(i)), r = !1
                }
                setTimeout(function() {
                    var e = new XMLHttpRequest;
                    e.open("HEAD", "http://www.advaned-offline.map/test-windy/sedlina/ga/" + a + "?" + n, !0), e.send(null)
                }, 100)
            };
        return {
            pageview: o
        }
    }), /*! */
    W.define("utils", ["rootScope"], function(e) {
        var t = {
            tsMinute: 6e4
        };
        t.tsHour = 60 * t.tsMinute;
        var n = "bcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789a",
            i = n.split("");
        return t.num2char = function(e) {
            var t = "";
            do {
                t = n.charAt(e % 60) + t, e = Math.floor(e / 60)
            } while (e);
            return t
        }, t.char2num = function(e) {
            for (var t = 0, n = 0; n < e.length; n++) t = 60 * t + i.indexOf(e.charAt(n));
            return t
        }, t.latLon2str = function(e) {
            var n = Math.floor(100 * (e.lat + 90)),
                i = Math.floor(100 * (e.lon + 180));
            return t.num2char(n) + "a" + t.num2char(i)
        }, t.str2latLon = function(e) {
            var n = e.split("a");
            return {
                lat: t.char2num(n[0]) / 100 - 90,
                lon: t.char2num(n[1]) / 100 - 180
            }
        }, t.toggleClass = function(e, t, n) {
            return e.classList[t ? "add" : "remove"](n)
        }, t.emptyFun = function() {}, t.emptyGIF = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==", t.isValidLatLonObj = function(e) {
            return e && "object" == typeof e && "lat" in e && "lon" in e && !isNaN(+e.lat) && !isNaN(+e.lon)
        }, t.normalizeLatLon = function(e) {
            return parseFloat(e).toFixed(3)
        }, t.replaceClass = function(e, t, n) {
            void 0 === n && (n = document.body);
            var i = n.className;
            e.test(i) ? n.className = i.replace(e, t) : n.classList.add(t)
        }, t.each = function(e, t) {
            for (var n in e) t(e[n], n)
        }, t.clone = function(e, n) {
            var i;
            if (null === e || "object" != typeof e) i = e;
            else if (e instanceof Date)(i = new Date).setTime(e.getTime());
            else if (e instanceof Array) {
                i = [];
                for (var s = 0, a = e.length; s < a; s++) i[s] = t.clone(e[s])
            } else if (e instanceof Object)
                for (var r in i = {}, e) !e.hasOwnProperty(r) || n && !n.includes(r) || (i[r] = t.clone(e[r]));
            else console.warn("Unable to copy obj! Its type isn't supported.");
            return i
        }, t.compare = function(e, t, n) {
            return n || (n = Object.keys(e)), !n.filter(function(n) {
                return e[n] !== t[n]
            }).length
        }, t.deg2rad = function(e) {
            return e * Math.PI / 180
        }, t.degToRad = .017453292, t.radToDeg = 57.2957795, t.debounce = function(e, t, n) {
            var i;
            return function() {
                var s = arguments,
                    a = this;

                function r() {
                    i = null, n || e.apply(a, s)
                }
                var o = n && !i;
                clearTimeout(i), i = setTimeout(r, t), o && e.apply(a, s)
            }
        }, t.throttle = function(e, t) {
            var n, i, s = this;

            function a() {
                n = !1, i && (r.apply(s, i), i = !1)
            }

            function r() {
                n ? i = arguments : (e.apply(s, arguments), setTimeout(a, t), n = !0)
            }
            return r
        }, t.pad = function(e, t) {
            for (var n = String(e); n.length < (t || 2);) n = "0" + n;
            return n
        }, t.template = function(e, t) {
            return e ? e.replace(/\{\{?\s*(.+?)\s*\}?\}/g, function(e, n) {
                return void 0 === t[n] ? "" : t[n]
            }) : ""
        }, t.wind2obj = function(e) {
            return {
                wind: Math.sqrt(e[0] * e[0] + e[1] * e[1]),
                dir: 10 * Math.floor(18 + 18 * Math.atan2(e[0], e[1]) / Math.PI)
            }
        }, t.wave2obj = function(e) {
            return {
                period: Math.sqrt(e[0] * e[0] + e[1] * e[1]),
                dir: 10 * Math.floor(18 + 18 * Math.atan2(e[0], e[1]) / Math.PI),
                size: e[2]
            }
        }, t.hasDirection = function(e) {
            return "number" == typeof + e.dir && e.dir <= 360 && null != e.dir && e.wind > 0
        }, t.windDir2html = function(e) {
            return t.hasDirection(e) ? '<div class="iconfont" style="transform: rotate(' + e.dir + "deg); -webkit-transform:rotate(" + e.dir + 'deg);">"</div>' : ""
        }, t.isNear = function(e, t) {
            return Math.abs(+e.lat - +t.lat) < .01 && Math.abs(+e.lon - +t.lon) < .01
        }, t.bound = function(e, t, n) {
            return Math.max(Math.min(e, n), t)
        }, t.smoothstep = function(e, n, i) {
            var s = t.bound((i - e) / (n - e), 0, 1);
            return s * s * s * (s * (6 * s - 15) + 10)
        }, t.lonDegToXUnit = function(e) {
            return .5 + .00277777777777777 * e
        }, t.latDegToYUnit = function(e) {
            return t.lat01ToYUnit(.5 - .00555555555555555 * e)
        }, t.lat01ToYUnit = function(e) {
            return (Math.PI - Math.log(Math.tan(.5 * (1 - e) * Math.PI))) / (2 * Math.PI)
        }, t.unitXToLonDeg = function(e) {
            return 360 * (e - .5)
        }, t.unitYToLatDeg = function(e) {
            return Math.atan(Math.exp(Math.PI - e * (2 * Math.PI))) / (.5 * Math.PI) * 180 - 90
        }, t.nowDeltaTS = 0, t.getAdjustedNow = function(e) {
            var n, i = Date.now() - t.nowDeltaTS;
            return e && ((n = i - e) < 0 && (t.nowDeltaTS += n), n > 1e4 && (t.nowDeltaTS += n)), i
        }, t.isValidLang = function(t) {
            return e.supportedLanguages.includes(t)
        }, t.joinPath = function(e, t) {
            return e + ("/" === t.charAt(0) ? "" : "/") + t
        }, t.addQs = function(e, t) {
            return e + (/\?/.test(e) ? "&" : "?") + t
        }, t.qs = function(e) {
            var n = [];
            return t.each(e, function(e, t) {
                return void 0 !== e && n.push(t + "=" + e)
            }), n.join("&")
        }, t.getFcstUrl = function(t, n, i, s) {
            var a = n.lat,
                r = n.lon;
            return "/forecast/point/" + t + "/" + e.pointForecast + "/" + a + "/" + r + "?source=" + i + (s ? "&" + s : "")
        }, t.loadScript = function(e) {
            return new Promise(function(t, n) {
                var i = document.createElement("script");
                i.type = "text/javascript", i.async = !0, i.onload = t, i.onerror = n, document.head.appendChild(i), i.src = e
            })
        }, t.copy2clipboard = function(e) {
            var t = document.createElement("textarea");
            t.value = e, document.body.appendChild(t), t.select(), document.execCommand("copy"), document.body.removeChild(t)
        }, t.download = function(e, t, n) {
            var i = document.createElement("a"),
                s = e instanceof Blob ? e : new Blob([e], {
                    type: t
                });
            i.style.display = "none", document.body.appendChild(i), i.href = window.URL.createObjectURL(s), i.setAttribute("download", n), i.click(), window.URL.revokeObjectURL(i.href), document.body.removeChild(i)
        }, t
    }), /*! */
    W.define("format", ["trans", "store", "utils"], function(e, t, n) {
        var i = {},
            s = function(e, t) {
                return "" + (e % 12 || 12) + (t = null != t ? ":" + n.pad(t) : "") + (e >= 12 ? " PM" : " AM")
            },
            a = function(e, t) {
                return e + ":" + (null != t ? n.pad(t) : "00")
            };
        i.getHoursFunction = function() {
            return t.is12hFormat() ? s : a
        }, i.hourUTC = function(e) {
            return n.pad(new Date(e).getUTCHours()) + ":00Z"
        }, i.hourMinuteUTC = function(e) {
            var t = new Date(e);
            return n.pad(t.getUTCHours()) + ":" + n.pad(t.getUTCMinutes()) + "Z"
        }, i.thousands = function(e) {
            return e ? e.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : ""
        };
        var r = ["N", "NE", "E", "SE", "S", "SW", "W", "NW", "N"],
            o = function(t) {
                var n = Math.floor((+t + 22.5) / 45);
                return e["DIRECTION_" + r[n]] || "-"
            },
            l = function(e) {
                return e + "°"
            };
        i.getDirFunction = function() {
            return t.get("numDirection") ? l : o
        }, i.obsoleteClass = function(e, t) {
            void 0 === t && (t = 30);
            var n = (Date.now() / 1e3 - e) / 60;
            return n < .3 * t ? "fresh" : n < t ? "normal" : "obsolete"
        }, i.howOld = function(t) {
            var i = !1,
                s = -1;
            if ("diffMin" in t) s = +t.diffMin;
            else if ("ts" in t) s = Math.floor((Date.now() - +t.ts) / 6e4);
            else if ("min" in t) s = Math.floor(Date.now() / 6e4 - +t.min);
            else {
                if (!("ux" in t)) return "";
                s = Math.floor((Date.now() / 1e3 - +t.ux) / 60)
            }
            if (s < 0) {
                if (t.translate) return "";
                s = Math.abs(s), i = !0
            }
            if (t && t.translate) {
                if (0 === s) return e.NOW;
                if (s < 60) return n.template(e.METAR_MIN_AGO, {
                    DURATION: s
                });
                if (s < 240) {
                    var a = Math.floor(s / 60),
                        r = s - 60 * a;
                    return n.template(e.METARS_H_M_AGO, {
                        DURATION: a,
                        DURATIONM: r
                    })
                }
                return s < 1440 ? n.template(e.METAR_HOURS_AGO, {
                    DURATION: Math.floor(s / 60)
                }) : n.template(e.METARS_DAYS_AGO, {
                    DURATION: Math.floor(s / 1440)
                })
            }
            return (t.useAgo && i ? "in " : "") + (s < 60 ? Math.floor(s) + "m" : Math.floor(s / 60) + "h " + Math.floor(s % 60) + "m") + (t.useAgo && !i ? " ago" : "")
        };
        var c = function(e) {
            return [Math.abs(0 | e), "°", 0 | (e < 0 ? e = -e : e) % 1 * 60, "'", 0 | 60 * e % 1 * 60, '"'].join("")
        };
        return i.DD2DMS = function(e, t) {
            return [e < 0 ? "S" : "N", c(e), ", ", t < 0 ? "W" : "E", c(t)].join("")
        }, i.utcOffsetStr = function(e) {
            return (e < 0 ? "-" : "+") + n.pad(Math.abs(Math.round(e))) + ":00"
        }, i.seoString = function(e) {
            return e.replace(/[\/,.]/g, " ").replace(/₂/g, "2").replace(/₃/g, "3").replace(/\s+/g, "-").replace(/-+/g, "-")
        }, i.seoLang = function(e) {
            return "en" === e ? "" : e + "/"
        }, i
    }), /*! */
    W.define("langEn", [], function() {
        return {
            MON: "Monday",
            TUE: "Tuesday",
            WED: "Wednesday",
            THU: "Thursday",
            FRI: "Friday",
            SAT: "Saturday",
            SUN: "Sunday",
            MON2: "Mon",
            TUE2: "Tue",
            WED2: "Wed",
            THU2: "Thu",
            FRI2: "Fri",
            SAT2: "Sat",
            SUN2: "Sun",
            SMON01: "Jan",
            SMON02: "Feb",
            SMON03: "Mar",
            SMON04: "Apr",
            SMON05: "May",
            SMON06: "Jun",
            SMON07: "Jul",
            SMON08: "Aug",
            SMON09: "Sep",
            SMON10: "Oct",
            SMON11: "Nov",
            SMON12: "Dec",
            TODAY: "Today",
            TOMORROW: "Tomorrow",
            LATER: "Later",
            ALL: "All",
            HOURS_SHORT: "hrs",
            FOLLOW: "Follow us",
            EMBED: "Embed widget on page",
            MENU: "Menu",
            MENU_SETTINGS: "Settings",
            MENU_HELP: "Help",
            MENU_ABOUT: "About us",
            MENU_LOCATION: "Find my location",
            MENU_FULLSCREEN: "Fullscreen mode",
            MENU_DISTANCE: "Distance & planning",
            ADD_RADAR: "Add radar",
            MENU_HISTORICAL: "Show historical data",
            MENU_MOBILE: "Download App",
            MENU_FAVS: "Favorites",
            MENU_FEEDBACK: "Feedback",
            MENU_UPLOAD: "Upload KML, GPX or geoJSON file",
            MENU_VIDEO: "Create video or animated GIF",
            MENU_PLUGIN: "Install Windy plugin",
            MENU_ERROR: "Error console",
            MENU_NEWS: "Weather news",
            SHOW_PICKER: "Show weather picker",
            TOOLBOX_INFO: "info",
            TOOLBOX_ANIMATION: "animation",
            TOOLBOX_START: "Hide/show animated particles",
            MENU_F_MODEL: "Data",
            MENU_U_INTERVAL: "Update interval",
            MENU_D_UPDATED: "Updated",
            MENU_D_REFTIME: "Reference time",
            MENU_D_NEXT_UPDATE: "Next update expected at:",
            ABOUT_OVERLAY: "About",
            ABOUT_DATA: "About these data",
            OVERLAY: "Layer",
            MODEL: "Forecast model",
            WIND: "Wind",
            GUST: "Wind gusts",
            GUSTACCU: "Wind accumulation",
            WIND_DIR: "Wind dir.",
            TEMP: "Temperature",
            DISTANCE: "Distance",
            PRESS: "Pressure",
            CLOUDS: "Clouds, rain",
            CLOUDS2: "Clouds",
            CLOUD_ALT: "Cloud base",
            RADAR: "Weather radar",
            RADAR_BLITZ: "Radar, lightning",
            SATELLITE: "Satellite",
            TOTAL_CLOUDS: "Total clouds",
            LOW_CLOUDS: "Low clouds",
            MEDIUM_CLOUDS: "Medium clouds",
            HIGH_CLOUDS: "High clouds",
            CAPE: "CAPE Index",
            RAIN: "Rain, snow",
            RAIN_THUNDER: "Rain, thunder",
            RAIN3H: "Precip. past 3h",
            JUST_RAIN: "Rain",
            CONVECTIVE_RAIN: "Convective r.",
            RAINRATE: "Max. rain rate",
            LIGHT_THUNDER: "Light thunder",
            THUNDER: "Thunderstorms",
            HEAVY_THUNDER: "Heavy thunder",
            SNOW: "Snow",
            OZONE: "Ozone layer",
            PM2P5: "PM2.5",
            AIR_QUALITY: "Air quality",
            NO22: "NO₂",
            AOD550: "Aerosol",
            SHOW_GUST: "force of wind gusts",
            RH: "Humidity",
            WAVES: "Waves",
            WAVES2: "Waves, sea",
            SWELL: "Swell",
            SWELL1: "Swell 1",
            SWELL2: "Swell 2",
            SWELL3: "Swell 3",
            WWAVES: "Wind waves",
            ALL_WAVES: "All waves",
            SWELLPER: "Swell period",
            RACCU: "Rain accumulation",
            SACCU: "Snow accumulation",
            ACCU: "Accumulations",
            RAINACCU: "RAIN ACCUMULATION",
            SNOWACCU: "SNOW ACCUMULATION",
            SNOWCOVER: "Actual Snow Cover",
            SST: "Surface sea temperature",
            SST2: "Sea temperature",
            CURRENT: "Currents",
            VISIBILITY: "Visibility",
            SURFACE_VISIBILITY: "Surface visibility",
            ACTUAL_TEMP: "Actual temperature",
            SSTAVG: "Average sea temperature",
            AVAIL_FOR: "Available for:",
            DEW_POINT: "Dew point",
            DEW_POINT_SPREAD: "Dew point spread",
            ISA_DIFFERENCE: "ISA difference",
            SLP: "Pressure (sea l.)",
            QFE: "Station pressure",
            SNOWDEPTH: "Snow depth",
            NEWSNOW: "New snow",
            SNOWDENSITY: "Snow density",
            GH: "Geopot. height",
            FLIGHT_RULES: "Flight rules",
            CTOP: "Cloud tops",
            FREEZING: "Freezing altitude",
            COSC: "CO concentration",
            SO2SM: "SO2 mass",
            DUSTSM: "Dust mass",
            WX_WARNINGS: "Weather warnings",
            PTYPE: "Precip. type",
            FOG: "Fog",
            FLOOD: "Flood",
            FIRE: "Fire",
            EFORECAST: "Extreme forecast",
            RADAR_SAT: "Radar & Satellite",
            FZ_RAIN: "Freezing rain",
            MX_ICE: "Mixed ice",
            WET_SN: "Wet snow",
            RA_SN: "Rain with snow",
            PELLETS: "Ice pellets",
            HAIL: "Hail",
            ELEVATION: "Elevation",
            MORE_LAYERS: "More layers...",
            NONE: "None",
            ACC_LAST_DAYS: "Last {{num}} days",
            ACC_LAST_HOURS: "Last {{num}} hours",
            ACC_NEXT_DAYS: "Next {{num}} days",
            ACC_NEXT_HOURS: "Next {{num}} hours",
            ALTITUDE: "Altitude",
            SFC: "Surface",
            CLICK_ON_LEGEND: "Click to change units",
            ALTERNATIVE_UNIT_CHANGE: "Any Layer unit can be changed by clicking on color legend",
            COPY_TO_C: "Copy to clipboard",
            SEARCH: "Search location...",
            JUST_SEARCH: "Search",
            NEXT: "Next results...",
            LOW_PREDICT: "Low predictability of forecast",
            DAYS_AGO: "{{daysago}} days ago:",
            SHOW_ACTUAL: "Show actual forecast",
            SHARE: "Share",
            SHARE_FCST: "Share forecast",
            SHARE_LINK: "Share link",
            JUST_EMBED: "Embed",
            POSITION: "Position",
            WIDTH: "Width",
            HEIGHT: "Height",
            DEFAULT_UNITS: "Default units",
            NOW: "Now",
            FORECAST_FOR: "Forecast for",
            ZOOM_LEVEL: "Zoom level",
            EXPERT_MODE: "Expert mode",
            EXPERT_MODE_DESC: " Do not fold overlays in quick menu",
            DETAILED: "Detailed forecast for this location",
            PERIOD: "Period",
            DRAG_ME: "Drag me if you want",
            D_FCST: "Forecast for this location",
            D_WEBCAMS: "Webcams in vicinity",
            D_STATIONS: "Nearest weather stations",
            D_NO_WEBCAMS: "There are no webcams around this location (or we don't know about them)",
            D_DAYLIGHT: "image during daylight",
            D_DISTANCE: "distance",
            D_MILES: "miles",
            D_MORE_THAN_HOUR: "more than hour ago",
            D_MIN_AGO: "{{duration}} minutes ago",
            D_SUNRISE: "Sunrise",
            D_SUNSET: "sunset",
            D_DUSK: "dusk",
            D_SUN_NEVER_SET: "Sun never set",
            D_POLAR_NIGHT: "Polar night",
            D_LT2: "local time",
            D_FAVORITES: "Add to Favorites",
            D_FAVORITES2: "Remove from Favorites",
            D_WAVE_FCST2: "Waves and sea",
            D_MISSING_CAM: "Add new webcam",
            D_HOURS: "Hours",
            D_TEMP2: "Temp.",
            D_PRECI: "Precit.",
            D_ABOUT_LOC: "About this location",
            D_ABOUT_LOC2: "About location",
            D_TIMEZONE: "Timezone",
            D_WEBCAMS_24: "Show last 24 hours",
            D_FORECAST_FOR: "{{duration}} days forecast",
            E_MESSAGE: "Awesome weather forecast at",
            METAR_VAR: "Variable",
            METAR_MIN_AGO: "{DURATION}m ago",
            METAR_HOURS_AGO: "{DURATION}h ago",
            METARS_H_M_AGO: "{DURATION}h {DURATIONM}m ago",
            METARS_DAYS_AGO: "{DURATION} days ago",
            DEVELOPED: "Developed with",
            FAVS_DELETE: "delete",
            SHOW_ON_MAP: "Display on map",
            POI_STATIONS: "Weather stations",
            POI_AD: "Airports",
            POI_CAMS: "Webcams",
            POI_PG: "Paragliding spots",
            POI_KITE: "Kite/WS spots",
            POI_SURF: "Surfing spots",
            POI_EMPTY: "Empty map",
            POI_WIND: "Reported wind",
            POI_TEMP: "Reported temp.",
            POI_FAVS: "My favourites",
            POI_FCST: "Forecasted weather",
            POI_TIDE: "Tide forecast",
            P_ANDROID_APP: "Windy for Android, free on Google Play",
            ND_MODEL: "Forecast model",
            ND_COMPARE: "Compare forecasts",
            ND_DISPLAY: "Display",
            ND_DISPLAY_BASIC: "Basic",
            S_ADVANCED_SETTINGS: "Advanced settings",
            S_COLORS: "Customize color scale",
            S_SAVE: "Save",
            S_SAVE2: "Login/Register to save all your settings to the cloud",
            S_SAVE_AUTO: "Your settings are saved to the cloud",
            S_SPEED: "Speed",
            S_ADD_OVERLAYS: "Show / add more layers",
            S_OVR_QUICK: "Add to quick menu",
            U_LOGIN: "Login",
            U_LOGOUT: "Logout",
            U_PROFILE: "My profile",
            U_PASSWD: "Change password",
            U_CHANGE_PIC: "Change my picture",
            OVR_RECOMENDED: "Recommended for:",
            OVR_ALL: "All",
            OVR_FLYING: "Flying",
            OVR_WATER: "Water",
            OVR_SKI: "Ski",
            MSG_OFFLINE: "WOW it appears that you are offline :-(",
            MSG_ONLINE_APP: "Online again, click here to reload app :-)",
            MSG_LOGIN_SUCCESFULL: "You have successfully logged in!",
            FORGOT_PASSWORD: "Forgot Password?",
            USERNAME_EMAIL: "Username / Email",
            DONT_HAVE_ACCOUNT: "Don't have an account?",
            REGISTER_HERE: "register here",
            PASSWD: "Password",
            LOGIN: "Login",
            LOGIN_FAILED: "Login Unsuccessful",
            ALERTS_LINK_SHORT: "Alert for this spot",
            MY_ALERTS: "My Alerts",
            DIRECTION_N: "N",
            DIRECTION_NE: "NE",
            DIRECTION_E: "E",
            DIRECTION_SE: "SE",
            DIRECTION_S: "S",
            DIRECTION_SW: "SW",
            DIRECTION_W: "W",
            DIRECTION_NW: "NW",
            DIRECTIONS: "Directions",
            DIRECTIONS_ANY: "Any direction",
            ACTIVATE: "Activate",
            DEACTIVATE: "Deactivate",
            REGISTER: "Register",
            JUST_LOGIN: "Login",
            MY_ACCOUNT: "My account",
            EDIT_ALERT: "Edit alert",
            FAVS_RENAME: "Rename",
            ADD_ALERT: "Create alert",
            HOME: "Home",
            MAP: "Map",
            MORE: "More",
            LESS: "Less",
            COMPARE: "Compare",
            PRESS_ISOLINES: "Pressure isolines",
            PART_ANIMATION: "Particles animation",
            R_TIME_RANGE: "Time range",
            MY_LOCATION: "My location",
            D_ISOLINES: "Display isolines",
            // DONATE: "Donate",
            // ARTICLES: "Articles",
            NEW: "New!",
            WHAT_IS_NEW: "What is new:",
            PRIVACY: "Privacy protection",
            SOUNDING: "Sounding",
            SOUND_ON: "Sound",
            BLITZ_ON: "Show lightning",
            WFORECAST: "weather forecast",
            TITLE: "نهاجا",
            HURR_TRACKER: "Hurricane tracker",
            TOC: "Terms and conditions",
            SEND: "Send",
            SEARCH_LAYER: "Search layer...",
            CANCEL_SEARCH: "Cancel search",
            NOT_FOUND: "Nothing to be found",
            P_LOGIN_SYNC: "Please <b>login</b> or <b>register</b> to synchronize all your favourites and settings with all your devices.",
            P_LOGIN_CLOUD: "Please <b>login</b> or <b>register</b> to backup all your favourites and settings to the cloud.",
            P_LOCATION: "Please allow Windy to use location services (GPS) while using the app, so we can show weather at your location. We do not store your location at our servers.",
            DONE: "Done",
            HMAP: "Outdoor map",
            LICENCE: "Licence",
            LIST: "list",
            GALLERY: "gallery"
        }
    }),
    /*! */
    W.define("supportedLanguages", [], function() {
        return ["en", "zh-TW", "zh", "ja", "fr", "ko", "it", "ru", "nl", "cs", "tr", "pl", "sv", "fi", "ro", "el", "hu", "hr", "ca", "da", "ar", "fa", "hi", "ta", "sk", "uk", "bg", "he", "is", "lt", "et", "vi", "sl", "sr", "id", "th", "sq", "pt", "nb", "es", "de", "bn"]
    }), /*! */
    W.define("Calendar", ["format", "utils", "trans", "Class"], function(e, t, n, i) {
        return i.extend({
            weekdays: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
            calendarHours: 240,
            numOfHours: 240,
            localeHours: e.getHoursFunction(),
            _init: function() {
                this.midnight = this.getMidnight(), this.startOfTimeline = this.startOfTimeline || this.midnight, this.start = this.startOfTimeline.getTime(), this.days = [], this.endOfcalendar = this.add(this.startOfTimeline, this.calendarHours), this.endOfCal = this.endOfcalendar.getTime(), this.maxTimestamp = this.endOfcalendar.getTime(), this.type = this.endOfcalendar < this.midnight ? "historical" : this.startOfTimeline < this.midnight ? "mixed" : "forecast", this.timestamps = [], this.paths = [], this.interTimestamps = [], this.minifestFile && this.createTimestampsFromMinifest(this.minifestFile) ? this.minifestValid = !0 : (this.createTimestamps(), this.minifestValid = !1), this.end = Math.min(this.timestamps[this.timestamps.length - 1], this.endOfCal);
                for (var e = this.add(this.startOfTimeline, 12), t = 0; t < this.calendarHours / 24; t++) {
                    var n = this.add(this.startOfTimeline, t, "days").getTime(),
                        i = this.add(this.startOfTimeline, 24),
                        s = this.add(i, t, "days").getTime(),
                        a = this.add(e, t, "days"),
                        r = a.getTime(),
                        o = this.weekdays[a.getDay()];
                    this.days[t] = {
                        display: o + "2",
                        displayLong: o,
                        day: a.getDate(),
                        middayTs: r,
                        start: n,
                        end: s,
                        month: a.getMonth() + 1,
                        year: a.getFullYear()
                    }
                }
                for (var l = 1; l < this.paths.length; l++) this.interTimestamps.push(this.timestamps[l - 1] + Math.floor((this.timestamps[l] - this.timestamps[l - 1]) / 2));
                return this
            },
            add: function(e, n, i) {
                var s = new Date(e.getTime());
                return s.setTime(e.getTime() + ("days" === i ? 24 : 1) * n * t.tsHour), s
            },
            boundTs: function(e) {
                return t.bound(e, this.start, this.end)
            },
            getMidnight: function() {
                var e = new Date;
                return e.setHours(0), e.setMinutes(0), e.setSeconds(0), e.setMilliseconds(0), e
            },
            createTimestamps: function() {
                var e = this.startOfTimeline.getUTCHours() % 3;
                e && (this.startOfTimeline = this.add(this.startOfTimeline, 3 - e, "hours"));
                for (var t = 0; t < this.numOfHours; t += 3) {
                    var n = this.add(this.startOfTimeline, t, "hours");
                    this.paths.push(this.date2path(n)), this.timestamps.push(n.getTime())
                }
            },
            prepareTimesFromMinifest: function(e) {
                return e && "object" == typeof e && e.ref && (e.dst || e.dstTime) ? (this.refTime = e.ref.replace(/(\d+)-(\d+)-(\d+)T(\d+):.*/, "$1$2$3$4"), this.refTimeTxt = e.ref, this.updateTxt = e.update, this.refTimeTs = new Date(e.ref).getTime(), this.updateTs = new Date(e.update).getTime(), !0) : (window.wError("Calendar", "Invalid format of minifest " + (e.dst ? "2.0" : "3.0")), !1)
            },
            createTimestampsFromMinifest: function(e) {
                var n = this;
                if (!this.prepareTimesFromMinifest(e)) return !1;
                if (e.dst) {
                    var i = t.tsHour,
                        s = Math.min(12, this.numOfHours / 24),
                        a = this.add(this.startOfTimeline, s, "days").getTime();
                    e.dst.forEach(function(e) {
                        for (var t = e[1]; t <= e[2]; t += e[0]) {
                            var s = n.refTimeTs + t * i;
                            s <= a && (n.timestamps.push(s), n.paths.push(n.date2path(new Date(s))))
                        }
                    })
                } else e.dstTime.forEach(function(e) {
                    var t = new Date(e);
                    n.timestamps.push(t.getTime()), n.paths.push(t.toISOString().replace(/(\d\d\d\d)-(\d\d)-(\d\d)T(\d\d):.*/, "$1$2$3$4"))
                });
                return !0
            },
            date2path: function(e) {
                return e.toISOString().replace(/(\d\d\d\d)-(\d\d)-(\d\d)T(\d\d):.*/, "$1/$2/$3/$4")
            },
            ts2path: function(e) {
                for (var t = this.interTimestamps, n = 0; n < t.length; n++)
                    if (e < t[n]) return this.paths[n];
                return this.paths[this.paths.length - 1]
            },
            path2date: function(e) {
                var t = e.split("/");
                return new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], 0, 0))
            },
            ts2string: function(e) {
                var t = new Date(e),
                    i = t.getDay(),
                    s = t.getDate(),
                    a = this.localeHours(t.getHours());
                return n[this.weekdays[i]] + " " + s + " - " + a
            }
        })
    }), /*! */
    W.define("Metric", ["store", "broadcast", "Class"], function(e, t, n) {
        return n.extend({
            separator: "",
            defaults: [null, null],
            _init: function() {
                this.key = "metric_" + this.ident, e.insert(this.key, {
                    def: this.getDefault(),
                    save: !0,
                    sync: !0,
                    allowed: Object.keys(this.conv)
                }), this.metric = e.get(this.key), e.on(this.key, this.onMetricChanged, this), e.once("isImperial", this.setDefault, this)
            },
            onMetricChanged: function(e) {
                this.metric = e, t.emit("metricChanged", this.ident, e)
            },
            getDefault: function() {
                return e.get("isImperial") && this.defaults.length > 1 ? this.defaults[1] : this.defaults[0]
            },
            setDefault: function() {
                e.setDefault(this.key, this.getDefault())
            },
            convertValue: function(e, t) {
                return void 0 === e ? "" : this.convertNumber(e) + (t || this.separator) + (this.conv[this.metric].label || this.metric)
            },
            convertNumber: function(e) {
                var t = this.conv[this.metric],
                    n = t.conversion(e);
                return t.precision ? parseFloat(n.toFixed(t.precision)) : Math.round(n)
            },
            listMetrics: function() {
                return Object.keys(this.conv)
            },
            howManyMetrics: function() {
                return this.listMetrics().length
            },
            setMetric: function(t) {
                e.set(this.key, t)
            },
            cycleMetric: function() {
                var e = this.description.indexOf(this.metric) + 1;
                e === this.description.length && (e = 0), this.setMetric(this.description[e])
            },
            renderLegend: function(e, t, n) {
                var i = n.description,
                    s = n.lines;
                e.getColor();
                var a = s.length,
                    r = i.indexOf(this.metric),
                    o = 100 / (s.length + 1),
                    l = [],
                    c = e.color(s[0][0]);
                l.push(c, c, c);
                for (var d = '<span style="width:' + o + '%">' + this.metric + "</span>", u = 0; u < a; u++) {
                    var h = s[u][0],
                        f = s[Math.min(u + 1, a - 1)][0],
                        m = e.color(h),
                        p = e.color(.5 * (h + f));
                    l.push(m, p), d += '<span style="width: ' + o + '%">' + s[u][1 + r] + "</span>"
                }
                t.dataset.overlay = this.ident, t.classList[this.howManyMetrics() > 1 ? "remove" : "add"]("one-metric"), t.style.background = "linear-gradient(to right, " + l.join(",") + ")", t.innerHTML = d
            }
        })
    }), /*! */
    W.define("Color", ["utils", "store", "Class"], function(e, t, n) {
        return n.extend({
            prepare: !1,
            save: !0,
            sync: !0,
            opaque: !0,
            _init: function() {
                this.key = "color2_" + this.ident, t.insert(this.key, {
                    def: this.default,
                    save: this.save,
                    sync: this.sync,
                    allowed: this.checkValidity
                }), t.on(this.key, this.colorChanged, this), this.prepare && this.getColor()
            },
            checkValidity: function(e) {
                if (!Array.isArray(e)) return !1;
                for (var t = 0; t < e.length; t++)
                    if (!Array.isArray(e[t])) return !1;
                return !0
            },
            colorChanged: function(e) {
                e && this.colors && this.forceGetColor()
            },
            changeColor: function(e, n) {
                t.set(this.key, e, n)
            },
            toDefault: function() {
                t.remove(this.key)
            },
            setMinMax: function() {
                this.min = this.gradient[0][0], this.max = this.gradient[this.gradient.length - 1][0]
            },
            forceGetColor: function() {
                return this.colors = null, this.getColor()
            },
            color: function(e) {
                var t = this.RGBA(e);
                return "rgb(" + t[0] + "," + t[1] + "," + t[2] + ")"
            },
            colorDark: function(e, t) {
                var n = this.RGBA(e);
                return "rgb(" + Math.max(0, n[0] - t) + "," + Math.max(0, n[1] - t) + "," + Math.max(0, n[2] - t) + ")"
            },
            RGBA: function(e) {
                var t = this.value2index(e);
                return [this.colors[t], this.colors[++t], this.colors[++t], this.colors[++t]]
            },
            getMulArray: function(e, t) {
                for (var n = [], i = e.length, s = 0; s < i; s++) n.push(e[s] * t);
                return n
            },
            lerpArray: function(e, t, n) {
                for (var i = 1 - n, s = e.length, a = [], r = 0; r < s; r++) a.push(e[r] * i + t[r] * n);
                return a
            },
            rgba2yuva: function(e) {
                var t = e[0],
                    n = e[1],
                    i = e[2],
                    s = .299 * t + .587 * n + .114 * i;
                return [s, .565 * (i - s), .713 * (t - s), e[3]]
            },
            yuva2rgba: function(e) {
                var t = e[0],
                    n = e[1],
                    i = e[2];
                return [t + 1.403 * i, t - .344 * n - .714 * i, t + 1.77 * n, e[3]]
            },
            gradYuva: function(e, t, n, i) {
                var s = this.lerpArray(e, t, n);
                if (i) {
                    var a = this.vec2size(e[1], e[2]),
                        r = this.vec2size(t[1], t[2]);
                    if (a > .05 && r > .05) {
                        var o = this.vec2size(s[1], s[2]);
                        if (o > .01) {
                            var l = (a * (1 - n) + r * n) / o;
                            s[1] *= l, s[2] *= l
                        }
                    }
                }
                return s
            },
            vec2size: function(e, t) {
                return Math.sqrt(e * e + t * t)
            },
            getGradientColorYUVA: function(e, t, n) {
                for (var i = this.rgba2yuva(this.getMulArray(e, 1 / 255)), s = this.rgba2yuva(this.getMulArray(t, 1 / 255)), a = this.gradYuva(i, s, n, !0), r = this.yuva2rgba(a), o = 0; o < r.length; o++) r[o] = Math.max(0, Math.min(256 * r[o], 255));
                return r
            },
            makePremultiplied: function(e) {
                for (var t = e[3] / 255, n = 0; n < 3; n++) e[n] = Math.max(0, Math.min(t * e[n], 255));
                return e
            },
            createGradientArray: function(e, t, n) {
                void 0 === e && (e = !0), void 0 === t && (t = !1), void 0 === n && (n = 1);
                var i, s, a, r, o = this.steps + 1,
                    l = new Uint8Array(o << 2),
                    c = (this.max - this.min) / this.steps,
                    d = 0,
                    u = this.gradient,
                    h = 1,
                    f = u[0],
                    m = u[h++];
                for (r = 0; r < this.steps; r++)(i = (this.min + c * r) * n) > m[0] && h < u.length && (f = m, m = u[h++]), a = (i - f[0]) / (m[0] - f[0]), s = this.getGradientColorYUVA(f[1], m[1], a), t && this.makePremultiplied(s), l[d++] = Math.round(s[0]), l[d++] = Math.round(s[1]), l[d++] = Math.round(s[2]), l[d++] = e ? 255 : Math.round(s[3]);
                return this.neutralGrayIndex = d, l[d++] = l[d++] = l[d++] = 128, l[d++] = 255, l
            },
            createSteppedArray: function(e, t, n) {
                n || (n = t);
                for (var i, s = e.length, a = new Uint8Array(s), r = s >> 2, o = t >> 1, l = n, c = 0, d = 0; d < r;) {
                    for (i = 0; i < 4; i++) a[4 * d + i] = e[c + i];
                    --l <= 0 && (l = t, c = 4 * (d + o)), d++
                }
                return a
            },
            combinedArray: function(t, n, i, s) {
                void 0 === i && (i = .5), void 0 === s && (s = .5);
                for (var a, r, o = t.length, l = new Uint8Array(o), c = 0; c < o;) {
                    for (r = i * ((r = (.299 * t[c] + .587 * t[c + 1] + .114 * t[c + 2]) / (.299 * n[c] + .587 * n[c + 1] + .114 * n[c + 2])) - 1), r += 1, a = 0; a < 3; a++) l[c + a] = e.bound(Math.round(r * n[c + a] * (1 - s) + s * t[c + a]), 0, 255);
                    l[c + 3] = t[c + 3], c += 4
                }
                return l
            },
            getColor: function() {
                var e = this;
                return this.colors ? this : (this.gradient = t.get(this.key), this.setMinMax(), this.colors = this.createGradientArray(this.opaque), this.startingValue = this.min, this.maxIndex = this.steps - 1 << 2, this.step = (this.max - this.startingValue) / this.steps, this.value2index = function(t) {
                    return isNaN(t) ? e.neutralGrayIndex : Math.max(0, Math.min(e.maxIndex, (t - e.startingValue) / e.step << 2))
                }, this)
            }
        })
    }), /*! */
    W.define("Product", ["utils", "rootScope", "http", "store", "Class", "Calendar", "Window", "rhMessage"], function(e, t, n, i, s, a, r, o) {
        return s.extend({
            ident: null,
            initPromise: null,
            maxTileZoom: 10,
            animationSpeed: 3600,
            fileSuffix: "jpg",
            JPGtransparency: !1,
            PNGtransparency: !1,
            dataQuality: "normal",
            betterDataQuality: [],
            animation: !0,
            modelName: void 0,
            modelResolution: void 0,
            provider: void 0,
            interval: void 0,
            forecastSize: 240,
            directory: void 0,
            labelsTemp: !0,
            imVersion: 2,
            logo: void 0,
            overlays: [],
            _init: function() {
                var e;
                this.productExpires = 0, this.minifest = {}, this.pathGenerator = (e = {}, e[2] = "{server}/{directory}/{path}/257w<z>/<y>/<x>/{filename}-{level}.{fileSuffix}", e[3] = "{server}/im/v3.0/forecast/{directory}/{refTime}/{path}/wm_grid_257/<z>/<x>/<y>/{filename}-{level}.{fileSuffix}", e)[this.imVersion]
            },
            refTime: function() {
                return this.calendar ? this.calendar.refTime : ""
            },
            getUpdateTimes: function() {
                return this.calendar ? {
                    refTime: this.calendar.refTimeTxt,
                    minUpdate: this.calendar.updateTs
                } : {}
            },
            setExpireTime: function() {
                this.productExpires = Date.now() + 5 * e.tsMinute
            },
            moveTs: function(t, n) {
                if (void 0 === n && (n = !1), n) {
                    var s = this.acTimes.indexOf(i.get("acTime"));
                    if (s > -1) return s = e.bound(s + (t ? 1 : -1), 0, this.acTimes.length), i.set("acTime", this.acTimes[s]), !0
                } else {
                    var a = this.calendar,
                        r = a.paths,
                        o = a.timestamps,
                        l = r.indexOf(i.get("path"));
                    if (l > -1) return l = e.bound(l + (t ? 1 : -1), 0, r.length), i.set("timestamp", o[l]), !0
                }
            },
            loadMinifest: function(e) {
                var i = (new Date).toISOString().replace(/.*T(\d+):(\d+).*/, "$1$2"),
                    s = this.server || t.server,
                    a = this.directory,
                    r = 3 === this.imVersion ? s + "/im/v3.0/forecast/" + a + "/info.json?" + i : s + "/" + a + "/minifest2.json?" + i;
                return n.get(r, {
                    cache: !e
                })
            },
            open: function() {
                var e = this;
                return t.isMobileOrTable || this.printLogo(), this.loadingPromise ? this.loadingPromise : Date.now() < this.productExpires ? Promise.resolve(this.calendar) : (this.loadingPromise = new Promise(function(t) {
                    e.loadMinifest().then(function(t) {
                        var n = t.data;
                        n.refTime && (n.ref = n.refTime, delete n.refTime), e.minifest.ref !== n.ref && (e.minifest = n, e.calendar = a.instance({
                            numOfHours: e.forecastSize,
                            minifestFile: e.minifest
                        }), i.set("lastModified", new Date(e.minifest.ref).getTime()))
                    }).catch(function(t) {
                        e.createBackupMinifest(), window.wError("Product", "Minifest load/parsing failed", t)
                    }).then(function() {
                        e.setExpireTime(), e.loadingPromise = null, t(e.calendar)
                    })
                }), this.loadingPromise)
            },
            close: function() {
                t.isMobileOrTable || this.removeLogo()
            },
            createBackupMinifest: function() {
                if (this.imVersion >= 3) {
                    var e = "Cannot get info.json from ims server.";
                    throw r.instance({
                        ident: "message",
                        className: "bg-error",
                        html: "<span>" + e + "</span>"
                    }).open(), e
                }
                this.minifest = {
                    note: "!!!This is automatically generated fallback minifest!!!",
                    ref: (new Date).toISOString().replace(/T.*$/, "T00:34:56Z"),
                    update: (new Date).toISOString(),
                    dst: [
                        [3, 3, 144],
                        [6, 150, 240]
                    ]
                }, this.calendar = a.instance({
                    numOfHours: this.forecastSize,
                    minifestFile: this.minifest
                })
            },
            isInBounds: function(e) {
                return !this.bounds || e.west > this.bounds.west && e.east < this.bounds.east && e.north < this.bounds.north && e.south > this.bounds.south
            },
            pointIsInBounds: function(e) {
                return !this.bounds || +e.lon > this.bounds.west && +e.lon < this.bounds.east && +e.lat < this.bounds.north && +e.lat > this.bounds.south
            },
            printLogo: function() {
                o.clear(), this.logo && (this.logoEl || (this.logoEl = document.createElement("div"), this.logoEl.innerHTML = this.logo, this.logoEl.className = "rh-absoluted rh-transparent"), o.insert(this.logoEl))
            },
            removeLogo: function() {
                this.logoEl && this.logo && o.remove(this.logoEl)
            }
        })
    }), /*! */
    W.define("StaticProduct", ["Product"], function(e) {
        return e.extend({
            dailyCache: (new Date).toISOString().replace(/^\d+-(\d+)-(\d+)T.*$/, "$1$2"),
            _init: function() {},
            refTime: function() {
                return this.dailyCache
            },
            open: function() {
                return Promise.resolve()
            }
        })
    }), /*! */
    W.define("Layer", ["Class", "products", "utils", "rootScope", "store"], function(e, t, n, i, s) {
        return e.extend({
            c: null,
            m: null,
            ident: "",
            renderer: "tileLayer",
            filename: null,
            sea: !1,
            dataQuality: null,
            fileSuffix: null,
            JPGtransparency: !1,
            renderParams: {
                renderFrom: "R"
            },
            getColor: function() {
                return this.c.getColor()
            },
            getParams: function(e, a) {
                var r = n.clone(e),
                    o = t[this.product || a],
                    l = this.levels || o.levels,
                    c = Object.assign(r, {
                        layer: this.ident,
                        server: this.server || o.server || i.server,
                        JPGtransparency: this.JPGtransparency || o.JPGtransparency,
                        PNGtransparency: this.PNGtransparency || o.PNGtransparency,
                        maxTileZoom: this.maxTileZoom || o.maxTileZoom,
                        transformR: this.transformR || null,
                        transformG: this.transformG || null,
                        transformB: this.transformB || null,
                        directory: o.directory,
                        imVersion: o.imVersion,
                        filename: this.filename || e.overlay || this.ident,
                        fileSuffix: this.fileSuffix || o.fileSuffix,
                        dataQuality: this.dataQuality || o.dataQuality,
                        upgradeDataQuality: (this.betterDataQuality || o.betterDataQuality || []).includes(this.ident)
                    });
                if (c.hasMoreLevels ? l.includes(c.level) || (c.level = l[0]) : c.level = "surface", "100m" === c.level && "wind" !== c.overlay && (c.level = "surface"), this.renderParams && (c = Object.assign(c, this.renderParams)), c.refTime = o.refTime(), this.product && /^cams/.test(a) && this.product !== a) {
                    var d = t.ecmwf.calendar;
                    c.path = d.ts2path(s.get("timestamp")), c.refTime = d.refTime, c.level = this.levels && this.levels[0] || c.level
                }
                return c.fullPath = n.template(this.pathGenerator || o.pathGenerator, c), c.imVersion < 3 && (c.fullPath = n.addQs(c.fullPath, "reftime=" + c.refTime)), c
            }
        })
    }), /*! */
    W.define("Overlay", ["layers", "trans", "Class"], function(e, t, n) {
        return n.extend({
            ident: "",
            trans: null,
            hasMoreLevels: !1,
            poiInCities: !0,
            _init: function() {
                var t = e[this.ident];
                if (t) {
                    var n = t.m;
                    n && (this.convertValue = n.convertValue.bind(n), this.convertNumber = n.convertNumber.bind(n), this.setMetric = n.setMetric.bind(n), this.cycleMetric = n.cycleMetric.bind(n), this.listMetrics = n.listMetrics.bind(n), this.m = n), this.c = t.c, this.l = t.l
                }
            },
            paintLegend: function(e) {
                this.m && this.m.description ? this.m.renderLegend(this.c, e, this.l || this.m) : e.innerHTML = ""
            },
            getColor: function() {
                return this.c && this.c.getColor()
            },
            getName: function() {
                return t[this.trans] || this.ident
            }
        })
    }), /*! */
    W.define("overlays", ["Overlay", "layers", "colors"], function(e, t, n) {
        Object.defineProperty(e, "metric", {
            get: function() {
                return this.m ? this.m.metric : ""
            }
        });
        var i = {};
        i.wind = e.instance({
            ident: "wind",
            hasMoreLevels: !0,
            trans: "WIND",
            icon: "|",
            layers: ["windParticles", "wind"]
        }), i.temp = e.instance({
            ident: "temp",
            trans: "TEMP",
            icon: "",
            layers: ["windParticles", "temp"],
            hasMoreLevels: !0
        }), i.dewpoint = e.instance({
            parentMenu: "temp",
            ident: "dewpoint",
            trans: "DEW_POINT",
            icon: "",
            layers: ["windParticles", "dewpoint"],
            hasMoreLevels: !0
        }), i.gust = e.instance({
            parentMenu: "wind",
            ident: "gust",
            trans: "GUST",
            icon: "",
            layers: ["windParticles", "gust"]
        }), i.gustAccu = e.instance({
            parentMenu: "wind",
            ident: "gustAccu",
            trans: "GUSTACCU",
            icon: "",
            isAccu: !0,
            layers: ["windParticles", "gustAccu"]
        }), i.rh = e.instance({
            parentMenu: "temp",
            ident: "rh",
            icon: "/",
            trans: "RH",
            layers: ["windParticles", "rh"],
            hasMoreLevels: !0
        }), i.pressure = e.instance({
            ident: "pressure",
            trans: "PRESS",
            icon: "",
            layers: ["windParticles", "pressure"]
        }), i.rain = e.instance({
            ident: "rain",
            trans: "RAIN_THUNDER",
            icon: "",
            layers: ["windParticles", "rain"]
        }), i.clouds = e.instance({
            ident: "clouds",
            trans: "CLOUDS2",
            icon: "7",
            layers: ["windParticles", "clouds"],
            paintLegend: function(e) {
                this.m.renderLegend(t.rain.c, e, this.m)
            }
        }), i.lclouds = e.instance({
            parentMenu: "clouds",
            ident: "lclouds",
            trans: "LOW_CLOUDS",
            icon: "",
            layers: ["windParticles", "lclouds"]
        }), i.mclouds = e.instance({
            parentMenu: "clouds",
            ident: "mclouds",
            trans: "MEDIUM_CLOUDS",
            icon: "",
            layers: ["windParticles", "mclouds"]
        }), i.hclouds = e.instance({
            parentMenu: "clouds",
            ident: "hclouds",
            trans: "HIGH_CLOUDS",
            layers: ["windParticles", "hclouds"],
            icon: ""
        }), i.cape = e.instance({
            parentMenu: "clouds",
            ident: "cape",
            trans: "CAPE",
            layers: ["windParticles", "cape"],
            icon: "~"
        }), i.cbase = e.instance({
            parentMenu: "clouds",
            ident: "cbase",
            trans: "CLOUD_ALT",
            icon: ":",
            layers: ["windParticles", "cbase"]
        }), i.snowAccu = e.instance({
            parentMenu: "rain",
            ident: "snowAccu",
            trans: "NEWSNOW",
            icon: "",
            isAccu: !0,
            layers: ["snowAccu"]
        }), i.rainAccu = e.instance({
            parentMenu: "rain",
            ident: "rainAccu",
            trans: "RACCU",
            icon: "9",
            isAccu: !0,
            layers: ["rainAccu"]
        }), i.waves = e.instance({
            ident: "waves",
            trans: "WAVES",
            icon: "",
            layers: ["waveParticles", "waves"]
        }), i.wwaves = e.instance({
            parentMenu: "waves",
            ident: "wwaves",
            trans: "WWAVES",
            icon: "|",
            layers: ["waveParticles", "wwaves"]
        }), i.swell1 = e.instance({
            parentMenu: "waves",
            ident: "swell1",
            trans: "SWELL",
            icon: "{",
            layers: ["waveParticles", "swell1"]
        }), i.swell2 = e.instance({
            parentMenu: "waves",
            ident: "swell2",
            trans: "SWELL2",
            icon: "",
            layers: ["waveParticles", "swell2"]
        }), i.swell3 = e.instance({
            parentMenu: "waves",
            ident: "swell3",
            trans: "SWELL3",
            icon: "",
            layers: ["waveParticles", "swell3"]
        }), i.swell = i.swell1, i.currents = e.instance({
            parentMenu: "waves",
            ident: "currents",
            trans: "CURRENT",
            icon: "q",
            layers: ["currentParticles", "currents"]
        }), i.sst = e.instance({
            parentMenu: "waves",
            ident: "sst",
            trans: "SST2",
            icon: "",
            layers: ["currentParticles", "sst"]
        }), i.visibility = e.instance({
            parentMenu: "clouds",
            ident: "visibility",
            trans: "VISIBILITY",
            icon: "c",
            layers: ["windParticles", "visibility"]
        }), i.fog = e.instance({
            parentMenu: "clouds",
            ident: "fog",
            trans: "FOG",
            icon: "d",
            layers: ["fog"]
        }), i.thunder = e.instance({
            parentMenu: "rain",
            ident: "thunder",
            trans: "THUNDER",
            icon: "",
            layers: ["windParticles", "thunder"]
        }), i.snowcover = e.instance({
            parentMenu: "rain",
            ident: "snowcover",
            trans: "SNOWDEPTH",
            icon: "N",
            layers: ["windParticles", "snowcover"]
        }), i.cloudtop = e.instance({
            parentMenu: "clouds",
            ident: "cloudtop",
            trans: "CTOP",
            icon: "Q",
            layers: ["windParticles", "cloudtop"]
        }), i.deg0 = e.instance({
            parentMenu: "temp",
            ident: "deg0",
            trans: "FREEZING",
            icon: "",
            layers: ["windParticles", "deg0"]
        }), i.airQ = e.instance({
            ident: "airQ",
            trans: "AIR_QUALITY",
            icon: "",
            virtual: !0
        }), i.gtco3 = e.instance({
            parentMenu: "airQ",
            ident: "gtco3",
            trans: "OZONE",
            icon: "",
            layers: ["ecmwfWindParticles150h", "gtco3"]
        }), i.pm2p5 = e.instance({
            parentMenu: "airQ",
            ident: "pm2p5",
            trans: "PM2P5",
            icon: "",
            layers: ["ecmwfWindParticles", "pm2p5"]
        }), i.no2 = e.instance({
            parentMenu: "airQ",
            ident: "no2",
            trans: "NO22",
            icon: "",
            layers: ["ecmwfWindParticles", "no2"]
        }), i.aod550 = e.instance({
            parentMenu: "airQ",
            ident: "aod550",
            trans: "AOD550",
            icon: "",
            layers: ["ecmwfWindParticles600h", "aod550"]
        }), i.cosc = e.instance({
            parentMenu: "airQ",
            ident: "cosc",
            trans: "COSC",
            icon: "",
            layers: ["ecmwfWindParticles", "cosc"]
        }), i.so2sm = e.instance({
            parentMenu: "airQ",
            ident: "so2sm",
            trans: "SO2SM",
            icon: "",
            layers: ["ecmwfWindParticles", "so2sm"]
        }), i.dustsm = e.instance({
            parentMenu: "airQ",
            ident: "dustsm",
            trans: "DUSTSM",
            icon: "",
            layers: ["ecmwfWindParticles", "dustsm"]
        }), i.ptype = e.instance({
            parentMenu: "rain",
            ident: "ptype",
            trans: "PTYPE",
            icon: "",
            layers: ["ecmwfWindParticles", "ptype"],
            paintLegend: function(e) {
                this.m.renderLegend(n.ptype.getColor(), e)
            }
        }), i.gh = e.instance({
            ident: "gh",
            layers: ["gh"]
        }), i.radarSat = e.instance({
            ident: "radarSat",
            virtual: !0,
            trans: "RADAR_SAT",
            icon: "O"
        }), i.radar = e.instance({
            parentMenu: "radarSat",
            allwaysOn: !0,
            poiInCities: !1,
            ident: "radar",
            trans: "RADAR",
            icon: "",
            layers: ["radar"]
        }), i.satellite = e.instance({
            parentMenu: "radarSat",
            allwaysOn: !0,
            poiInCities: !1,
            ident: "satellite",
            trans: "SATELLITE",
            icon: "",
            layers: ["satellite"]
        }), i.satelliteIRBT = e.instance({
            ident: "satellite",
            trans: "SATELLITE",
            trans2: "INFRA+",
            hideFromList: !0,
            icon: ""
        }), i.capAlerts = e.instance({
            ident: "capAlerts",
            trans: "WX_WARNINGS",
            icon: "",
            layers: ["capAlerts"]
        }), i.map = e.instance({
            ident: "map",
            trans: "HMAP",
            icon: "",
            layers: ["map"]
        });
        var s = e.extend({
            icon: "",
            trans: "EFORECAST"
        });
        return i.efiWind = s.instance({
            ident: "efiWind",
            trans2: "WIND",
            layers: ["efiWind"]
        }), i.efiTemp = s.instance({
            ident: "efiTemp",
            trans2: "TEMP",
            hideFromList: !0,
            layers: ["efiTemp"]
        }), i.efiRain = s.instance({
            ident: "efiRain",
            trans2: "RAIN",
            hideFromList: !0,
            layers: ["efiRain"]
        }), i
    }), /*! */
    W.define("metrics", ["Metric", "trans"], function(e, t) {
        var n = function(e) {
                return e
            },
            i = function(e) {
                return {
                    "°C": {
                        conversion: function(e) {
                            return e - 273.15
                        },
                        precision: e
                    },
                    "°F": {
                        conversion: function(e) {
                            return 9 * e / 5 - 459.67
                        },
                        precision: e
                    }
                }
            },
            s = {
                "%": {
                    conversion: function(e) {
                        return Math.round(100 * e)
                    },
                    precision: 0
                }
            };
        return {
            temp: e.instance({
                ident: "temp",
                separator: "",
                defaults: ["°C", "°F"],
                conv: i(0),
                description: ["°C", "°F"],
                lines: [
                    [252, -20, -5],
                    [262, -10, 15],
                    [272, 0, 30],
                    [282, 10, 50],
                    [292, 20, 70],
                    [302, 30, 85],
                    [313, 40, 100]
                ]
            }),
            dewpointSpread: e.instance({
                ident: "dewpointSpread",
                separator: "",
                defaults: ["°C", "°F"],
                conv: i(1),
                description: ["°C", "°F"]
            }),
            wind: e.instance({
                ident: "wind",
                defaults: ["kt"],
                conv: {
                    kt: {
                        conversion: function(e) {
                            return 1.943844 * e
                        },
                        precision: 0
                    },
                    bft: {
                        conversion: function(e) {
                            return e < .3 ? 0 : e < 1.5 ? 1 : e < 3.3 ? 2 : e < 5.5 ? 3 : e < 8 ? 4 : e < 10.8 ? 5 : e < 13.9 ? 6 : e < 17.2 ? 7 : e < 20.7 ? 8 : e < 24.5 ? 9 : e < 28.4 ? 10 : e < 32.6 ? 11 : 12
                        },
                        precision: 0
                    },
                    "m/s": {
                        conversion: n,
                        precision: 0
                    },
                    "km/h": {
                        conversion: function(e) {
                            return 3.6 * e
                        },
                        precision: 0
                    },
                    mph: {
                        conversion: function(e) {
                            return 2.236936 * e
                        },
                        precision: 0
                    }
                },
                description: ["kt", "bft", "m/s", "mph", "km/h"],
                lines: [
                    [0, 0, 0, 0, 0, 0],
                    [3, 5, 2, 3, 6, 10],
                    [5, 10, 3, 5, 10, 20],
                    [10, 20, 5, 10, 20, 35],
                    [15, 30, 7, 15, 35, 55],
                    [20, 40, 8, 20, 45, 70],
                    [30, 60, 11, 30, 70, 100]
                ]
            }),
            rh: e.instance({
                ident: "rh",
                defaults: ["%"],
                conv: {
                    "%": {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["%"],
                lines: [
                    [30, 30],
                    [50, 50],
                    [80, 80],
                    [90, 90],
                    [100, 100]
                ]
            }),
            clouds: e.instance({
                ident: "clouds",
                defaults: ["rules"],
                conv: {
                    rules: {
                        conversion: n,
                        precision: 0
                    },
                    "%": {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["rules", "%"],
                lines: [
                    [25, "FEW", 25],
                    [50, "SCT", 50],
                    [70, "BKN", 70],
                    [100, "OVC", 100]
                ]
            }),
            pressure: e.instance({
                ident: "pressure",
                defaults: ["hPa", "inHg", "mmHg"],
                conv: {
                    hPa: {
                        conversion: function(e) {
                            return e / 100
                        },
                        precision: 0
                    },
                    mmHg: {
                        conversion: function(e) {
                            return e / 133.322387415
                        },
                        precision: 0
                    },
                    inHg: {
                        conversion: function(e) {
                            return e / 3386.389
                        },
                        precision: 2
                    }
                },
                description: ["hPa", "inHg", "mmHg"],
                lines: [
                    [99e3, 990, 29.2, 742],
                    [1e5, 1e3, 29.6, 750],
                    [101e3, 1010, 29.8, 757],
                    [102e3, 1020, 30.1, 765],
                    [103e3, 1030, 30.4, 772]
                ]
            }),
            rain: e.instance({
                ident: "rain",
                defaults: ["mm", "in"],
                conv: { in : {
                        conversion: function(e) {
                            return .039 * e
                        },
                        precision: 2
                    }, mm: {
                        conversion: n,
                        precision: 1
                    }
                },
                description: ["mm", "in"],
                lines: [
                    [1.5, 1.5, ".06"],
                    [2, 2, ".08"],
                    [3, 3, ".11"],
                    [7, 7, ".24"],
                    [10, 10, ".39"],
                    [20, 20, ".78"],
                    [30, 30, 1.2]
                ]
            }),
            cape: e.instance({
                ident: "cape",
                defaults: ["J/kg"],
                conv: {
                    "J/kg": {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["J/kg"],
                lines: [
                    [0, 0],
                    [500, 500],
                    [1500, 1500],
                    [2500, 2500],
                    [5e3, 5e3]
                ]
            }),
            gtco3: e.instance({
                ident: "gtco3",
                defaults: ["DU"],
                conv: {
                    DU: {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["DU"],
                lines: [
                    [150, 150],
                    [220, 220],
                    [280, 280],
                    [330, 330],
                    [400, 400]
                ]
            }),
            aod550: e.instance({
                ident: "aod550",
                defaults: ["AOD"],
                conv: {
                    AOD: {
                        conversion: n,
                        precision: 3
                    }
                },
                description: ["AOD"],
                lines: [
                    [0, 0],
                    [.25, .25],
                    [.5, .5],
                    [1, 1],
                    [2, 2],
                    [4, 4]
                ]
            }),
            pm2p5: e.instance({
                ident: "pm2p5",
                defaults: ["µg/m³"],
                conv: {
                    "µg/m³": {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["µg/m³"],
                lines: [
                    [0, 0],
                    [10, 10],
                    [20, 20],
                    [100, 100],
                    [1e3, 1e3]
                ]
            }),
            no2: e.instance({
                ident: "no2",
                defaults: ["µg/m³"],
                conv: {
                    "µg/m³": {
                        conversion: n,
                        precision: 2
                    }
                },
                description: ["µg/m³"],
                lines: [
                    [0, 0],
                    [1, 1],
                    [5, 5],
                    [25, 25],
                    [100, 100]
                ]
            }),
            altitude: e.instance({
                ident: "altitude",
                defaults: ["m", "ft"],
                conv: {
                    m: {
                        conversion: function(e) {
                            return 100 * Math.round(e / 100)
                        },
                        precision: 0
                    },
                    ft: {
                        conversion: function(e) {
                            return 100 * Math.round(.0328 * e)
                        },
                        precision: 0
                    }
                },
                description: ["m", "ft"],
                lines: [
                    [0, 0, 0],
                    [1e3, 1e3, 3e3],
                    [1500, 1500, 5e3],
                    [5e3, "5k", "FL150"],
                    [9e3, "9k", "FL300"]
                ]
            }),
            snow: e.instance({
                ident: "snow",
                defaults: ["cm", "in"],
                conv: { in : {
                        conversion: function(e) {
                            return .39 * e
                        },
                        precision: 1
                    }, cm: {
                        conversion: n,
                        precision: 1
                    }
                },
                description: ["cm", "in"],
                lines: [
                    [2, 2, ".8"],
                    [5, 5, 2],
                    [10, 10, 4],
                    [50, 50, 20],
                    [100, "1m", "3ft"],
                    [300, "3m", "9ft"]
                ]
            }),
            elevation: e.instance({
                ident: "elevation",
                defaults: ["m", "ft"],
                conv: {
                    m: {
                        conversion: n,
                        precision: 0
                    },
                    ft: {
                        conversion: function(e) {
                            return Math.round(3.28 * e)
                        },
                        precision: 0
                    }
                },
                description: ["m", "ft"]
            }),
            distance: e.instance({
                ident: "distance",
                defaults: ["km", "mi"],
                conv: {
                    km: {
                        conversion: function(e) {
                            return e / 1e3
                        },
                        precision: 1
                    },
                    mi: {
                        conversion: function(e) {
                            return e / 1609.344
                        },
                        precision: 1
                    },
                    NM: {
                        conversion: function(e) {
                            return e / 1852
                        },
                        precision: 1
                    }
                },
                description: ["km", "mi", "NM"]
            }),
            waves: e.instance({
                ident: "waves",
                defaults: ["m", "ft"],
                conv: {
                    m: {
                        conversion: n,
                        precision: 1
                    },
                    ft: {
                        conversion: function(e) {
                            return 3.28 * e
                        },
                        precision: 0
                    }
                },
                description: ["m", "ft"],
                lines: [
                    [.5, .5, 1.6],
                    [1, 1, 3.3],
                    [1.5, 1.5, 5],
                    [2, 2, 6.6],
                    [6, 6, 20],
                    [9, 9, 30]
                ]
            }),
            currents: e.instance({
                ident: "currents",
                separator: " ",
                defaults: ["kt"],
                conv: {
                    kt: {
                        conversion: function(e) {
                            return 1.943844 * e
                        },
                        precision: 1
                    },
                    "m/s": {
                        conversion: n,
                        precision: 2
                    },
                    "km/h": {
                        conversion: function(e) {
                            return 3.6 * e
                        },
                        precision: 1
                    },
                    mph: {
                        conversion: function(e) {
                            return 2.236936 * e
                        },
                        precision: 1
                    }
                },
                description: ["kt", "m/s", "mph", "km/h"],
                lines: [
                    [0, 0, 0, 0, 0],
                    [.2, .4, .2, .4, .7],
                    [.4, .8, .4, .9, 1.4],
                    [.8, 1.6, .8, 1.8, 2.9],
                    [1, 2, 1, 2.2, 3.6],
                    [1.6, 3.2, 1.6, 3.6, 5.8]
                ]
            }),
            visibility: e.instance({
                ident: "visibility",
                defaults: ["km", "sm"],
                conv: {
                    rules: {
                        conversion: function(e) {
                            return e / 1e3
                        },
                        label: "km",
                        precision: 1
                    },
                    km: {
                        conversion: function(e) {
                            return e / 1e3
                        },
                        precision: 1
                    },
                    sm: {
                        conversion: function(e) {
                            return .00328 * e
                        },
                        precision: 1
                    }
                },
                description: ["rules", "km", "sm"],
                lines: [
                    [0, "LIFR", ".8", ".5"],
                    [3e3, "IFR", 2.7, 1.5],
                    [7e3, "MVFR", 6, 4],
                    [16e3, "VFR", 16, 10]
                ]
            }),
            visibilityNoRules: e.instance({
                ident: "visibilityNoRules",
                defaults: ["km", "sm"],
                conv: {
                    km: {
                        conversion: function(e) {
                            return e / 1e3
                        },
                        precision: 1
                    },
                    sm: {
                        conversion: function(e) {
                            return .00328 * e
                        },
                        precision: 1
                    }
                },
                description: ["km", "sm"],
                lines: [
                    [0, ".8", ".5"],
                    [3e3, 2.7, 1.5],
                    [7e3, 6, 4],
                    [16e3, 16, 10]
                ]
            }),
            so2: e.instance({
                ident: "so2",
                defaults: ["µg/m³"],
                conv: {
                    "µg/m³": {
                        conversion: n,
                        precision: 2
                    }
                },
                description: ["µg/m³", "µg/m³"],
                lines: [
                    [0, 0],
                    [1, 1],
                    [5, 5],
                    [10, 10],
                    [80, 80]
                ]
            }),
            dust: e.instance({
                ident: "dust",
                defaults: ["µg/m³"],
                conv: {
                    "µg/m³": {
                        conversion: n,
                        precision: 1
                    }
                },
                description: ["µg/m³", "µg/m³"],
                lines: [
                    [0, 0],
                    [50, 50],
                    [100, 100],
                    [500, 500],
                    [800, 800]
                ]
            }),
            cosc: e.instance({
                ident: "cosc",
                defaults: ["ppbv"],
                conv: {
                    ppbv: {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["ppbv", "ppbv"],
                lines: [
                    [0, 0],
                    [50, 50],
                    [100, 100],
                    [500, 500],
                    [1200, 1200]
                ]
            }),
            radar: e.instance({
                ident: "radar",
                defaults: ["dBZ"],
                conv: {
                    dBZ: {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["dBZ", "dBZ"],
                lines: [
                    [0, 0],
                    [30, 30],
                    [40, 40],
                    [50, 50],
                    [60, 60],
                    [70, 70]
                ]
            }),
            satellite: e.instance({
                ident: "satellite",
                defaults: ["K"],
                conv: {
                    K: {
                        conversion: function(e) {
                            return -.5 * e + 320
                        },
                        precision: 0
                    }
                },
                description: ["K", "K"],
                lines: [
                    [160, 240],
                    [180, 230],
                    [200, 220],
                    [220, 210],
                    [240, 200]
                ]
            }),
            ptype: e.instance({
                ident: "ptype",
                defaults: ["ptype"],
                conv: {
                    ptype: {
                        conversion: n,
                        precision: 0,
                        label: ""
                    }
                },
                ptype2text: {
                    0: "RAIN",
                    1: "JUST_RAIN",
                    2: "THUNDER",
                    3: "FZ_RAIN",
                    4: "MX_ICE",
                    5: "SNOW",
                    6: "WET_SN",
                    7: "RA_SN",
                    8: "PELLETS",
                    9: "LIGHT_THUNDER",
                    10: "THUNDER",
                    11: "HEAVY_THUNDER"
                },
                convertNumber: function(e) {
                    return t[this.ptype2text[e]]
                },
                renderLegend: function(e, t) {
                    var n = this;
                    e.getColor();
                    var i = [1, 3, 4, 5, 6, 7, 8].map(function(t) {
                        return '<span style="background: ' + e.colorDark(t, 50) + ';">' + n.convertNumber(t) + "</span>"
                    }).join("");
                    t.style.background = null, t.dataset.overlay = "ptype", t.innerHTML = i
                }
            }),
            gh: e.instance({
                ident: "gh",
                defaults: ["m"],
                conv: {
                    m: {
                        conversion: n,
                        precision: 0
                    }
                }
            }),
            fog: e.instance({
                ident: "fog",
                defaults: ["type"],
                conv: {
                    type: {
                        conversion: n,
                        precision: 0
                    }
                },
                description: ["type"],
                lines: [
                    [1, "Fog"],
                    [2, "Fog & rime"]
                ]
            }),
            lightDensity: e.instance({
                ident: "lightDensity",
                defaults: ["l/km²"],
                conv: {
                    "l/km²": {
                        conversion: n,
                        precision: 2
                    }
                },
                description: ["l/km²", "l/km²"],
                lines: [
                    [0, 0],
                    [.025, ".025"],
                    [.1, ".1"],
                    [1, 1],
                    [10, 10],
                    [20, 20]
                ]
            }),
            efiWind: e.instance({
                ident: "efiWind",
                defaults: ["%"],
                conv: s,
                description: ["%", "%"],
                lines: [
                    [-1, "unusually"],
                    [-.75, "calm"],
                    [.25, ""],
                    [.75, "extreme"],
                    [1, "wind"]
                ]
            }),
            efiTemp: e.instance({
                ident: "efiTemp",
                defaults: ["%"],
                conv: s,
                description: ["%", "%"],
                lines: [
                    [-1, "extreme"],
                    [-.75, "cold"],
                    [-.25, ""],
                    [.25, ""],
                    [.75, "extreme"],
                    [1, "warm"]
                ]
            }),
            efiRain: e.instance({
                ident: "efiRain",
                defaults: ["%"],
                conv: s,
                description: ["%", "%"],
                lines: [
                    [-1, "very dry"],
                    [0, ""],
                    [.1, ""],
                    [.75, "extreme"],
                    [1, "precip."]
                ]
            })
        }
    }), /*! */
    W.define("layers", ["colors", "metrics", "Layer", "legends"], function(e, t, n, i) {
        var s = {},
            a = function(e) {
                return Math.max(0, Math.pow(2, e) - .001)
            };
        return s.capAlerts = n.instance({
            ident: "capAlerts",
            renderer: "capAlerts"
        }), s.pressureIsolines = n.instance({
            ident: "pressureIsolines",
            renderer: "isolines",
            levels: ["surface"]
        }), s.ghIsolines = n.instance({
            ident: "ghIsolines",
            renderer: "isolines",
            levels: ["950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"]
        }), s.tempIsolines = n.instance({
            ident: "tempIsolines",
            renderer: "isolines",
            levels: ["surface", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"]
        }), s.deg0Isolines = n.instance({
            ident: "deg0Isolines",
            renderer: "isolines",
            levels: ["surface"]
        }), s.windParticles = n.instance({
            ident: "windParticles",
            renderer: "particles",
            filename: "wind",
            fileSuffix: "jpg",
            renderParams: {
                particlesIdent: "wind"
            }
        }), s.ecmwfWindParticles = n.instance({
            ident: "ecmwfWindParticles",
            renderer: "particles",
            product: "ecmwf",
            levels: ["surface"],
            filename: "wind",
            fileSuffix: "jpg",
            renderParams: {
                particlesIdent: "wind"
            }
        }), s.ecmwfWindParticles150h = n.instance({
            ident: "ecmwfWindParticles150h",
            renderer: "particles",
            product: "ecmwf",
            levels: ["150h"],
            filename: "wind",
            fileSuffix: "jpg",
            renderParams: {
                particlesIdent: "wind"
            }
        }), s.ecmwfWindParticles600h = n.instance({
            ident: "ecmwfWindParticles600h",
            renderer: "particles",
            product: "ecmwf",
            levels: ["600h"],
            filename: "wind",
            fileSuffix: "jpg",
            renderParams: {
                particlesIdent: "wind"
            }
        }), s.waveParticles = n.instance({
            ident: "waveParticles",
            renderer: "particles",
            PNGtransparency: !0,
            renderParams: {
                particlesIdent: "waves"
            }
        }), s.currentParticles = n.instance({
            ident: "currentParticles",
            renderer: "particles",
            PNGtransparency: !0,
            product: "sea",
            filename: "sstcombined",
            renderParams: {
                particlesIdent: "currents"
            }
        }), s.wind = n.instance({
            ident: "wind",
            renderParams: {
                renderFrom: "RG"
            },
            c: e.wind,
            m: t.wind
        }), s.temp = n.instance({
            ident: "temp",
            c: e.temp,
            m: t.temp
        }), s.dewpoint = n.instance({
            ident: "dewpoint",
            c: e.temp,
            m: t.temp
        }), s.gust = n.instance({
            ident: "gust",
            c: e.wind,
            m: t.wind
        }), s.gustAccu = n.instance({
            ident: "gustAccu",
            fileSuffix: "jpg",
            JPGtransparency: !0,
            pathGenerator: "{server}/{directory}/{acTime}/257w<z>/<y>/<x>/gust-surface.jpg?acc=maxip",
            c: e.wind,
            m: t.wind
        }), s.rh = n.instance({
            ident: "rh",
            c: e.rh,
            m: t.rh
        }), s.pressure = n.instance({
            ident: "pressure",
            fileSuffix: "png",
            PNGtransparency: !0,
            c: e.pressure,
            m: t.pressure
        }), s.rain = n.instance({
            ident: "rain",
            renderer: "tileLayerPatternator",
            filename: "rainlogptype2",
            fileSuffix: "png",
            PNGtransparency: !0,
            c: e.rain,
            m: t.rain,
            renderParams: {
                pattern: "rainPattern",
                interpolateNearestG: !0
            },
            transformR: a,
            transformG: function(e) {
                return Math.round(4 * e) / 4
            }
        }), s.ptype = n.instance({
            ident: "ptype",
            renderer: "tileLayerPatternator",
            filename: "rainlogptype",
            fileSuffix: "png",
            PNGtransparency: !0,
            c: e.justGray,
            m: t.ptype,
            renderParams: {
                pattern: "ptypePattern",
                interpolateNearestG: !0
            },
            transformR: a,
            transformG: Math.round
        }), s.thunder = n.instance({
            ident: "thunder",
            filename: "lightdens",
            transformR: a,
            c: e.lightDensity,
            m: t.lightDensity
        }), s.clouds = n.instance({
            ident: "clouds",
            filename: "cloudsrain",
            renderParams: {
                renderFrom: "RG",
                isMultiColor: !0
            },
            c: e.clouds,
            m: t.rain,
            transformG: function(e) {
                return e < 10 ? e : 10 * (e - 10) + 10
            },
            getColor2: function() {
                return e.rainClouds.getColor()
            },
            getAmountByColor: function(e, t) {
                return t < .3 ? 0 : t < 3 ? 1 : t < 6 ? 2 : 3
            }
        }), s.lclouds = n.instance({
            ident: "lclouds",
            c: e.lclouds,
            m: t.clouds
        }), s.mclouds = n.instance({
            ident: "mclouds",
            c: e.mclouds,
            m: t.clouds
        }), s.hclouds = n.instance({
            ident: "hclouds",
            c: e.hclouds,
            m: t.clouds
        }), s.cape = n.instance({
            ident: "cape",
            c: e.cape,
            m: t.cape
        }), s.cbase = n.instance({
            ident: "cbase",
            fileSuffix: "png",
            PNGtransparency: !0,
            c: e.cbase,
            m: t.altitude,
            l: i.cbase
        }), s.fog = n.instance({
            ident: "fog",
            filename: "fogtype",
            fileSuffix: "png",
            c: e.fog,
            m: t.fog
        }), s.snowAccu = n.instance({
            ident: "snowAccu",
            c: e.snow,
            m: t.snow,
            transformR: a,
            fileSuffix: "png",
            PNGtransparency: !0,
            pathGenerator: "{server}/{directory}/{acTime}/257w<z>/<y>/<x>/snowaccumulationlog-surface.png",
            renderParams: {
                interpolate: "interpolateOverlay"
            }
        }), s.rainAccu = n.instance({
            ident: "rainAccu",
            transformR: a,
            fileSuffix: "png",
            PNGtransparency: !0,
            pathGenerator: "{server}/{directory}/{acTime}/257w<z>/<y>/<x>/rainaccumulationlog-surface.png",
            renderParams: {
                interpolate: "interpolateOverlay"
            },
            c: e.rainAccu,
            m: t.rain,
            l: i.rainAccu
        }), s.waves = n.instance({
            ident: "waves",
            PNGtransparency: !0,
            renderParams: {
                interpolate: "interpolateWaves",
                renderFrom: "B",
                sea: !0
            },
            c: e.waves,
            m: t.waves
        }), s.wwaves = s.waves.instance({
            ident: "wwaves"
        }), s.swell1 = s.waves.instance({
            ident: "swell1"
        }), s.swell2 = s.waves.instance({
            ident: "swell2"
        }), s.swell3 = s.waves.instance({
            ident: "swell3"
        }), s.swell = s.swell1, s.currents = n.instance({
            ident: "currents",
            filename: "sstcombined",
            PNGtransparency: !0,
            renderParams: {
                renderFrom: "RG",
                sea: !0
            },
            c: e.currents,
            m: t.currents
        }), s.sst = n.instance({
            ident: "sst",
            PNGtransparency: !0,
            pathGenerator: "{server}/{directory}/latest/257w<z>/<y>/<x>/sst-surface.png",
            renderParams: {
                sea: !0
            },
            c: e.temp,
            m: t.temp,
            l: i.sst
        }), s.visibility = n.instance({
            ident: "visibility",
            c: e.visibility,
            m: t.visibility
        }), s.snowcover = n.instance({
            ident: "snowcover",
            filename: "snowcoverlog",
            transformR: a,
            c: e.snow,
            m: t.snow
        }), s.cloudtop = n.instance({
            ident: "cloudtop",
            hasParticles: !0,
            levels: ["surface"],
            c: e.levels,
            m: t.altitude,
            l: i.ctops
        }), s.deg0 = n.instance({
            ident: "deg0",
            levels: ["surface"],
            c: e.deg0,
            m: t.altitude
        }), s.cosc = n.instance({
            ident: "cosc",
            filename: "chem_cosc",
            c: e.cosc,
            m: t.cosc,
            transformR: function(e) {
                return Math.pow(2, e) - 1
            }
        }), s.so2sm = n.instance({
            ident: "so2sm",
            filename: "chem_so2sm",
            c: e.so2,
            m: t.so2,
            fileSuffix: "png",
            transformR: function(e) {
                return Math.pow(2, e) - .001
            }
        }), s.dustsm = n.instance({
            ident: "dustsm",
            filename: "chem_dustsm",
            hasParticles: !1,
            c: e.dust,
            m: t.dust,
            transformR: function(e) {
                return Math.pow(2, e) - .1
            }
        }), s.radar = n.instance({
            ident: "radar",
            renderer: "radar",
            c: e.radar,
            m: t.radar
        }), s.satellite = n.instance({
            ident: "satellite",
            renderer: "satellite",
            c: e.satellite,
            m: t.satellite
        }), s.gtco3 = n.instance({
            ident: "gtco3",
            c: e.gtco3,
            m: t.gtco3
        }), s.pm2p5 = n.instance({
            ident: "pm2p5",
            c: e.pm2p5,
            m: t.pm2p5,
            transformR: function(e) {
                return Math.pow(2, e) - .001
            }
        }), s.no2 = n.instance({
            ident: "no2",
            c: e.no2,
            m: t.no2,
            transformR: function(e) {
                return Math.pow(2, e) - .001
            }
        }), s.aod550 = n.instance({
            ident: "aod550",
            filename: "aod550_log",
            c: e.aod550,
            m: t.aod550,
            transformR: function(e) {
                return Math.pow(2, e) - .001
            }
        }), s.gh = n.instance({
            ident: "gh",
            m: t.gh
        }), s.map = n.instance({
            ident: "map",
            renderer: "map"
        }), s.efiWind = n.instance({
            ident: "efiWind",
            filename: "wsi",
            renderer: "efi",
            c: e.efiWind,
            m: t.efiWind
        }), s.efiTemp = n.instance({
            ident: "efiTemp",
            filename: "ti",
            renderer: "efi",
            c: e.efiTemp,
            m: t.efiTemp
        }), s.efiRain = n.instance({
            ident: "efiRain",
            filename: "tpi",
            renderer: "efi",
            c: e.efiRain,
            m: t.efiRain
        }), s
    }), /*! */
    W.define("models", ["store", "broadcast", "$", "rootScope", "products", "layers", "overlays"], function(e, t, n, i, s, a, r) {
        var o = n('meta[name="model"]');
        o && o.content && i.globalProducts.includes(o.content) && "ecmwf" !== o.content && e.set("product", o.content);
        var l = {},
            c = {},
            d = Object.keys(s);
        Object.keys(a).forEach(function(e) {
            l[e] = [];
            for (var t = 0; t < d.length; t++) s[d[t]].overlays.includes(e) && l[e].push(d[t])
        }), Object.keys(r).forEach(function(e) {
            c[e] = [];
            for (var t = 0; t < d.length; t++) s[d[t]].overlays.includes(e) && c[e].push(d[t])
        }), t.once("paramsChanged", function() {
            u(), t.on("mapChanged", u)
        });
        var u = function() {
                var t = h(i.map).concat(i.globalProducts);
                if (e.set("visibleProducts", t) && !t.includes(e.get("product"))) {
                    var n = e.get("prefferedProduct"),
                        a = e.get("overlay");
                    if (s[n].overlays.includes(a)) return e.set("product", n);
                    var r = t.filter(function(e) {
                        return s[e].overlays.includes(a)
                    });
                    r.length && e.set("product", r[0])
                }
            },
            h = function(e, t) {
                var n, a, r = t ? i.localPointProducts : i.localProducts,
                    o = [];
                for (a = 0; a < r.length; a++) n = r[a], s[n].pointIsInBounds(e) && o.push(n);
                return o
            };
        return {
            betterProducts: h,
            getProduct: function(t, n) {
                var a = l[t],
                    r = e.get("prefferedProduct");
                return 2 === a.length && a.includes("cams") ? s.camsEu.pointIsInBounds(i.map) ? "camsEu" : "cams" : a.includes(n) ? n : a.includes(r) ? r : a.includes("ecmwfWaves") && "ecmwf" === r ? "ecmwfWaves" : a.includes("gfsWaves") && "gfs" === r ? "gfsWaves" : a[0]
            },
            layer2product: l,
            overlay2product: c,
            getPointProducts: function(e) {
                return i.globalPointProducts.concat(h(e, !0))
            }
        }
    }), /*! */
    W.define("products", ["Product", "StaticProduct", "Calendar", "$", "rootScope", "radar", "satellite"], function(e, t, n, i, s, a, r) {
        var o = {},
            l = "© 2016 ECMWF: This service is based on data and products of the European Centre for Medium-range Weather Forecasts",
            c = "© Generated using Copernicus Atmosphere Monitoring Service Information [2019]. Neither the European Commission nor ECMWF is responsible for any use of this information.";
        o.ecmwf = e.instance({
            ident: "ecmwf",
            directory: "/../../cdn/storage/ecmwf-hres",
            directoryMeta: "ecmwf-hres",
            modelName: "ECMWF",
            modelResolution: 9,
            provider: "ECMWF",
            interval: 720,
            copy: l,
            dataQuality: "normal",
            betterDataQuality: ["rain", "clouds", "lclouds", "mclouds", "hclouds", "cbase", "snowAccu", "rainAccu", "snowcover", "ptype", "sst"],
            levels: ["surface", "100m", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"],
            overlays: ["snowcover", "wind", "temp", "pressure", "clouds", "lclouds", "mclouds", "hclouds", "rh", "gust", "cbase", "cape", "dewpoint", "rain", "visibility", "deg0", "cloudtop", "thunder", "snowAccu", "rainAccu", "ptype", "sst", "gustAccu"],
            acTimes: ["next12h", "next24h", "next3d", "next5d", "next10d"],
            isolines: ["pressure", "gh", "temp", "deg0"],
            _init: function() {
                e._init.call(this);
                try {
                    var t = i('meta[name="minifest-' + this.directoryMeta + '"]'),
                        s = t && t.content;
                    if (!s) throw "noMinifestStr";
                    if (this.minifest = JSON.parse(s), this.calendar = n.instance({
                            numOfHours: this.forecastSize,
                            minifestFile: this.minifest
                        }), !this.calendar.minifestValid) throw "minifestNotValid";
                    this.setExpireTime()
                } catch (e) {
                    window.wError("products", "Cant create ecmwf calendar from meta tag", e), this.createBackupMinifest()
                }
            }
        }), o.cams = e.instance({
            ident: "cams",
            provider: "Copernicus",
            interval: 1440,
            copy: c,
            PNGtransparency: !0,
            imVersion: 3,
            modelName: "CAMS",
            modelResolution: 40,
            fileSuffix: "png",
            directory: "cams-global",
            dataQuality: "low",
            levels: ["surface"],
            overlays: ["gtco3", "aod550", "pm2p5", "no2"],
            acTimes: [],
            isolines: [],
            labelsTemp: !1,
            logo: '<a href="https://atmosphere.copernicus.eu/" target="_blank"><img style="max-width:150px;height:auto;" src="img/providers/copernicus-white.svg" /></a>'
        }), o.camsEu = e.instance({
            ident: "camsEu",
            provider: "Copernicus",
            interval: 1440,
            copy: c,
            PNGtransparency: !0,
            imVersion: 3,
            modelName: "CAMS EU",
            modelResolution: 10,
            fileSuffix: "png",
            directory: "cams-eu",
            bounds: {
                west: -25,
                east: 45,
                north: 70,
                south: 30
            },
            maxTileZoom: 3,
            dataQuality: "normal",
            levels: ["surface"],
            overlays: ["pm2p5", "no2"],
            acTimes: [],
            isolines: [],
            labelsTemp: !1,
            logo: '<a class="mobilehide" href="https://atmosphere.copernicus.eu/" target="_blank"><img style="max-width:150px;height:auto;" src="img/providers/copernicus-white.svg" /></a>'
        }), o.gfs = e.instance({
            ident: "gfs",
            provider: "NOAA",
            interval: 360,
            modelName: "GFS",
            modelResolution: 22,
            directory: "gfs",
            maxTileZoom: 3,
            dataQuality: "low",
            betterDataQuality: ["rain", "clouds", "lclouds", "mclouds", "hclouds"],
            levels: ["surface", "100m", "975h", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"],
            overlays: ["wind", "temp", "pressure", "clouds", "rh", "gust", "dewpoint", "rain", "lclouds", "mclouds", "hclouds", "snowAccu", "rainAccu", "ptype", "gustAccu", "cape"],
            acTimes: ["next12h", "next24h", "next3d", "next5d", "next10d"],
            isolines: ["pressure", "gh", "temp"]
        }), o.iconEu = e.instance({
            ident: "iconEu",
            provider: "DWD",
            interval: 360,
            modelName: "ICON",
            modelResolution: 7,
            JPGtransparency: !0,
            animation: !0,
            dataQuality: "high",
            betterDataQuality: ["rain", "clouds", "lclouds", "mclouds", "hclouds"],
            directory: "icon-eu",
            forecastSize: 144,
            bounds: {
                west: -23,
                east: 44,
                north: 70,
                south: 30
            },
            levels: ["surface", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"],
            overlays: ["snowcover", "wind", "temp", "pressure", "clouds", "lclouds", "mclouds", "hclouds", "rh", "gust", "cape", "dewpoint", "rain", "deg0", "snowAccu", "rainAccu", "ptype", "gustAccu"],
            acTimes: ["next12h", "next24h", "next2d", "next3d", "next5d"],
            isolines: ["pressure", "gh", "temp"]
        }), o.arome = e.instance({
            ident: "arome",
            provider: "MF",
            interval: 360,
            modelName: "AROME",
            modelResolution: 2,
            JPGtransparency: !0,
            animation: !0,
            dataQuality: "ultra",
            betterDataQuality: [],
            directory: "arome",
            labelsTemp: !1,
            forecastSize: 72,
            bounds: {
                west: -10,
                east: 15,
                north: 55,
                south: 38
            },
            levels: ["surface"],
            overlays: ["wind", "temp", "clouds", "lclouds", "mclouds", "hclouds", "rh", "gust", "cape", "dewpoint", "rain", "ptype"],
            acTimes: [],
            isolines: []
        }), o.iconGlobal = e.instance({
            ident: "iconGlobal",
            provider: "DWD",
            interval: 360,
            modelName: "ICON",
            modelResolution: 13,
            labelsTemp: !1,
            dataQuality: "normal",
            directory: "icon-global",
            forecastSize: 144,
            overlays: ["fog"],
            levels: ["surface"]
        }), o.nems = e.instance({
            ident: "nems",
            modelName: "NEMS",
            modelResolution: 4,
            provider: "Meteoblue.com",
            interval: 720,
            JPGtransparency: !0,
            animation: !0,
            dataQuality: "high",
            betterDataQuality: ["rain", "clouds"],
            directory: "mbeurope",
            labelsTemp: !1,
            forecastSize: 72,
            bounds: {
                west: -19,
                east: 33,
                north: 57,
                south: 33
            },
            levels: ["surface", "975h", "950h", "925h", "900h", "850h"],
            overlays: ["wind", "temp", "clouds", "rh", "gust", "dewpoint", "rain"],
            logo: '<a class="mobilehide" href="https://www.meteoblue.com/" target="_blank">NEMS4 model by <img style="max-width:90px;height:auto;" src="img/logo-mb.svg" /></a>'
        }), o.mblue = t.instance({
            ident: "mblue",
            modelName: s.isMobile ? "MBLUE" : "METEOBLUE"
        });
        var d = e.extend({
            provider: "NOAA",
            interval: 360,
            modelName: "NAM",
            dataQuality: "high",
            betterDataQuality: ["rain", "clouds", "lclouds", "hclouds", "mclouds"],
            JPGtransparency: !0,
            forecastSize: 72,
            animationSpeed: 2e3,
            levels: ["surface", "975h", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"],
            overlays: ["wind", "temp", "clouds", "rh", "gust", "pressure", "dewpoint", "rain", "lclouds", "hclouds", "mclouds", "snowAccu", "rainAccu", "ptype", "gustAccu"],
            acTimes: ["next12h", "next24h", "next48h", "next60h"],
            isolines: ["pressure", "temp"]
        });
        return o.namConus = d.instance({
            ident: "namConus",
            modelResolution: 5,
            directory: "nam-conus",
            bounds: {
                west: -137,
                east: -55,
                north: 53,
                south: 20
            }
        }), o.namHawaii = d.instance({
            ident: "namHawaii",
            modelResolution: 3,
            directory: "nam-hawaii",
            bounds: {
                west: -167,
                east: -147,
                north: 30,
                south: 14
            }
        }), o.namAlaska = d.instance({
            ident: "namAlaska",
            modelResolution: 6,
            directory: "nam-alaska",
            bounds: {
                west: -179,
                east: -129,
                north: 80,
                south: 53
            }
        }), o.ecmwfWaves = e.instance({
            ident: "ecmwfWaves",
            modelName: "ECMWF WAM",
            modelResolution: 13,
            provider: "ECMWF",
            interval: 720,
            copy: l,
            labelsTemp: !1,
            directory: "ecmwf-wam",
            fileSuffix: "png",
            dataQuality: "normal",
            overlays: ["waves", "swell1", "swell2", "swell3", "wwaves"],
            levels: ["surface"]
        }), o.gfsWaves = e.instance({
            ident: "gfsWaves",
            modelName: "Wavewatch 3",
            modelResolution: 22,
            provider: "NOAA",
            interval: 360,
            labelsTemp: !1,
            directory: "wwatch",
            fileSuffix: "png",
            dataQuality: "low",
            overlays: ["waves", "swell1", "swell2", "wwaves"],
            levels: ["surface"]
        }), o.sea = t.instance({
            ident: "sea",
            animation: !1,
            modelName: "NESDIS",
            modelResolution: 22,
            provider: "NOAA",
            labelsTemp: !1,
            interval: 2880,
            dataQuality: "low",
            overlays: ["currents"],
            levels: ["surface"],
            pathGenerator: "{server}/sst/latest/257w<z>/<y>/<x>/{filename}.png"
        }), o.geos5 = e.instance({
            ident: "geos5",
            modelName: "NASA GEOS-5",
            modelResolution: 22,
            labelsTemp: !1,
            provider: "NASA",
            interval: 3240,
            directory: "nasa-chem",
            dataQuality: "normal",
            overlays: ["cosc", "dustsm", "so2sm"],
            levels: ["surface"]
        }), o.radar = a, o.satellite = r, o.capAlerts = t.instance({
            ident: "capAlerts",
            productReady: !0,
            labelsTemp: !1,
            modelName: "CAP Alerts",
            interval: 0,
            provider: "National weather institutes",
            overlays: ["capAlerts"]
        }), o.map = t.instance({
            ident: "map",
            productReady: !0,
            labelsTemp: !1,
            modelName: "Outdoor Map",
            interval: 0,
            provider: "Seznam.cz",
            overlays: ["map"]
        }), o.efi = e.instance({
            ident: "efi",
            provider: "ECMWF",
            interval: 720,
            copy: l,
            imVersion: 3,
            modelName: "ECMWF",
            modelResolution: 9,
            labelsTemp: !1,
            directory: "ecmwf-efi",
            dataQuality: "normal",
            levels: ["surface"],
            overlays: ["efiWind", "efiTemp", "efiRain"]
        }), o
    }), /*! */
    W.define("legends", [], function() {
        return {
            cbase: {
                description: ["m", "ft"],
                lines: [
                    [0, 0, 0],
                    [200, 300, 1e3],
                    [500, 500, 1500],
                    [1500, "1.5k", 5e3]
                ]
            },
            sst: {
                description: ["°C", "°F"],
                lines: [
                    [272, 0, 30],
                    [282, 10, 50],
                    [292, 20, 70],
                    [302, 30, 85],
                    [313, 40, 100]
                ]
            },
            ctops: {
                description: ["m", "ft"],
                lines: [
                    [0, 0, 0],
                    [5e3, "5k", "FL150"],
                    [9e3, "9k", "FL300"],
                    [12e3, "12k", "FL400"],
                    [15e3, "15k", "FL500"]
                ]
            },
            rainAccu: {
                description: ["mm", "in"],
                lines: [
                    [5, 5, ".2"],
                    [10, 10, ".4"],
                    [20, 20, ".8"],
                    [40, 40, 1.5],
                    [1e3, "1m", "3ft"]
                ]
            }
        }
    }), /*! */
    W.define("detail", ["Evented"], function(e) {
        return e.instance({
            ident: "detail"
        })
    }), /*! */
    W.define("broadcast", ["Evented"], function(e) {
        return e.instance({
            ident: "bcast"
        })
    }), /*! */
    W.define("detectDevice", [], function() {
        var e, t, n, i, s = window.navigator.userAgent,
            a = /android/i.test(s) ? "android" : /(iPhone|iPod|iPad)/i.test(s) ? "ios" : /windows phone/i.test(s) ? "wphone" : "desktop",
            r = (e = window.screen.width, t = window.screen.height, n = Math.max(e, t), i = Math.min(e, t), n <= 600 || n <= 960 && i <= 600 ? "mobile" : n <= 1024 || 1024 === i && "ios" === a ? "tablet" : "desktop");
        return window.addEventListener("load", function() {
            document.body.classList.add("platform-" + a), document.documentElement.id = "device-" + r
        }), {
            platform: a,
            device: r
        }
    }), /*! */
    W.define("rootScope", ["supportedLanguages", "detectDevice"], function(e, t) {
        var n = t.platform,
            i = t.device,
            s = window.navigator,
            a = {
                version: W.version,
                target: W.target,
                platform: n,
                device: i,
                supportedLanguages: e,
                glParticlesOn: !1,
                server: "http://www.advaned-offline.map/test-windy",
                nodeServer: "http://www.advaned-offline.map/test-windy",
                tileServer: "http://www.advaned-offline.map/test-windy",
                community: "http://www.advaned-offline.map/test-windy",
                assets: "v/" + W.assets,
                levels: ["surface", "100m", "975h", "950h", "925h", "900h", "850h", "800h", "700h", "600h", "500h", "400h", "300h", "250h", "200h", "150h"],
                pointForecast: "v2.5",
                iconsDir: "img/icons4",
                overlays: ["wind", "gust", "gustAccu", "rain", "rainAccu", "snowAccu", "snowcover", "ptype", "thunder", "temp", "dewpoint", "rh", "deg0", "clouds", "hclouds", "mclouds", "lclouds", "fog", "cloudtop", "cbase", "visibility", "cape", "waves", "swell1", "swell2", "swell3", "wwaves", "sst", "currents", "airQ", "no2", "pm2p5", "aod550", "gtco3", "cosc", "dustsm", "so2sm", "pressure", "efiWind", "efiTemp", "efiRain", "capAlerts", "map"],
                // overlays: ["radarSat", "radar", "satellite", "wind", "gust", "gustAccu", "rain", "rainAccu", "snowAccu", "snowcover", "ptype", "thunder", "temp", "dewpoint", "rh", "deg0", "clouds", "hclouds", "mclouds", "lclouds", "fog", "cloudtop", "cbase", "visibility", "cape", "waves", "swell1", "swell2", "swell3", "wwaves", "sst", "currents", "airQ", "no2", "pm2p5", "aod550", "gtco3", "cosc", "dustsm", "so2sm", "pressure", "efiWind", "efiTemp", "efiRain", "capAlerts", "map"],
                // overlays: ["wind", "temp", "cloudTop", "rh", "hclouds", "cbase", "pressure"],
                acTimes: ["next12h", "next24h", "next2d", "next48h", "next60h", "next3d", "next5d", "next10d"],
                isolines: ["off", "pressure", "gh", "temp", "deg0"],
                localProducts: ["nems", "namConus", "namHawaii", "namAlaska", "iconEu", "arome", "camsEu"],
                globalProducts: ["gfs", "ecmwf", "sea", "geos5", "radar", "ecmwfWaves", "gfsWaves", "iconGlobal", "capAlerts", "cams", "map", "efi", "satellite"],
                seaProducts: ["sea", "ecmwfWaves", "gfsWaves"],
                camsProducts: ["cams", "camsEu"],
                localPointProducts: ["namConus", "namHawaii", "namAlaska", "iconEu", "arome"],
                globalPointProducts: ["gfs", "ecmwf", "mblue"],
                isCrawler: /googlebot/i.test(s.userAgent),
                isMobile: "mobile" === i,
                isTablet: "tablet" === i,
                isMobileOrTablet: "mobile" === i || "tablet" === i,
                isRetina: window.devicePixelRatio && window.devicePixelRatio > 1,
                prefLang: s.languages ? s.languages[0] : s.language || s.browserLanguage || s.systemLanguage || s.userLanguage || "en",
                map: {},
                hereMapsID: "app_id=Ps0PWVjNew3jM9lpFHFG&app_code=eEg9396D7_C6NCcM1DUK2A",
                sznMap: "https://windytiles.mapy.cz/turist-en/{z}-{x}-{y}",
                levelsData: {
                    "150h": ["150hPa", "13,5km FL450"],
                    "200h": ["200hPa", "11.7km FL390"],
                    "250h": ["250hPa", "10km FL340"],
                    "300h": ["300hPa", "9000m FL300"],
                    "400h": ["400hPa", "7000m FL240"],
                    "500h": ["500hPa", "5500m FL180"],
                    "600h": ["600hPa", "4200m FL140"],
                    "700h": ["700hPa", "3000m FL100"],
                    "800h": ["800hPa", "2000m 6400ft"],
                    "850h": ["850hPa", "1500m 5000ft"],
                    "900h": ["900hPa", "900m 3000ft"],
                    "925h": ["925hPa", "750m 2500ft"],
                    "950h": ["950hPa", "600m 2000ft"],
                    "975h": ["975hPa", "300m 1000ft"],
                    "100m": ["100m", "330ft"],
                    surface: ["", ""]
                },
                pois: {
                    favs: ["POI_FAVS", "k"],
                    cities: ["POI_FCST", "&"],
                    wind: ["POI_WIND", "&#xe008;"],
                    temp: ["POI_TEMP", "&#xe005;"],
                    metars: ["POI_AD", "Q"],
                    cams: ["POI_CAMS", "l"],
                    pgspots: ["POI_PG", "&#xe009;"],
                    kitespots: ["POI_KITE", "&#xe002;"],
                    surfspots: ["POI_SURF", "{"],
                    tide: ["POI_TIDE", "q"],
                    empty: ["POI_EMPTY", "t"]
                }
            };
        return a.products = a.globalProducts.concat(a.localProducts).concat(a.camsProducts), a
    }), /*! */
    W.define("trans", ["utils", "storage", "rootScope", "store", "seoParser", "langEn"], function(e, t, n, i, s, a) {
        var r = {
                main: {
                    loaded: "en",
                    filename: "lang/{lang}.json",
                    test: "MON"
                },
                widgets: {
                    filename: "lang/widgets/{lang}.json",
                    test: "EMBED_SELECT_VIEW"
                },
                alerts: {
                    filename: "lang/alerts/{lang}.json",
                    test: "ALERT_DELETE"
                },
                settings: {
                    filename: "lang/settings/{lang}.json",
                    test: "S_LANG"
                },
            },
            o = a,
            l = "en",
            c = i.get("lang"),
            d = s.lang || n.prefLang;

        function u(e) {
            return /\|/.test(e) ? e.replace(/(\w+)\|(\w+):(\w+)/, function(t, n, i, s) {
                var a = o[n];
                return a && s ? a.replace(/\{\{[^}]+\}\}/g, s) : e
            }) : o[e] || e
        }
        "auto" !== c && e.isValidLang(c) && (d = c), o.loadLangFile = function(n, s) {
            return void 0 === s && (s = i.get("usedLang")), new Promise(function(i, a) {
                if (r[n].loaded !== s) {
                    var l = r[n],
                        c = l.filename,
                        d = l.test;
                    c = e.template(c, {
                        lang: s
                    }), t.getFile(c, {
                        aboluteURL: !1,
                        test: d
                    }).then(function(e) {
                        Object.assign(o, e), r[n].loaded = s, i(e)
                    }).catch(a)
                } else i()
            })
        };
        var h = ["title", "placeholder", "t", "afterbegin", "beforeend", "tooltipsrc"];

        function f(e) {
            var t = Object.keys(r).filter(function(e) {
                return r[e].loaded
            }).map(function(t) {
                return o.loadLangFile(t, e)
            });
            Promise.all(t).then(function() {
                o.translateDocument(document.body), i.set("usedLang", e), document.documentElement.lang = e
            })
        }
        o.translateDocument = function(e) {
            h.forEach(function(t) {
                for (var n, i, s = e.querySelectorAll("[data-" + t + "]"), a = 0, r = s.length; a < r; a++) switch (i = u((n = s[a]).dataset[t]), t) {
                    case "t":
                        /</.test(i) ? n.innerHTML = i : n.textContent = i;
                        break;
                    case "title":
                    case "placeholder":
                        void 0 !== n[t] && (n[t] = i);
                        break;
                    case "tooltipsrc":
                        n.dataset.tooltip = i;
                        break;
                    case "afterbegin":
                        3 == n.firstChild.nodeType && n.removeChild(n.firstChild), n.insertAdjacentHTML(t, i);
                        break;
                    case "beforeend":
                        3 == n.lastChild.nodeType && n.removeChild(n.lastChild), n.insertAdjacentHTML(t, i)
                }
            })
        }, d && (e.isValidLang(d) ? l = d : (d = d.replace(/-\S+$/, "")) !== (l = e.isValidLang(d) ? d : "en") && (n.missingLang = d));
        var m = function() {
            o.translateDocument(document.body), f(l), i.on("lang", function(e) {
                "auto" !== e && e !== i.get("usedLang") && f(e)
            })
        };
        return "loading" !== document.readyState ? m() : document.addEventListener("DOMContentLoaded", m), o
    }), /*! */
    W.define("store", ["dataSpecifications", "storage", "rootScope", "Evented", "broadcast"], function(e, t, n, i, s) {
        var a = {},
            r = i.instance({
                ident: "store"
            }),
            o = function(e, t, n) {
                return t.compare ? !t.compare(n, h(e)) : e in a ? a[e] !== n : f(e) !== n
            },
            l = function(e, t) {
                return "function" == typeof e.allowed ? e.allowed(t) : Array.isArray(e.def) ? Array.isArray(t) && t.every(function(t) {
                    return e.allowed.includes(t)
                }) : e.allowed.includes(t)
            },
            c = function(t, n) {
                e[t].def = n, delete a[t]
            },
            d = function(t, n, i) {
                void 0 === i && (i = {});
                var s = e[t];
                if (s) {
                    if (!i.doNotCheckValidity && !l(s, n)) return s.asyncSet ? Promise.reject() : void 0;
                    if (s.syncSet && (i.forceChange || o(t, s, n))) {
                        var a = s.syncSet(n);
                        if (i.forceChange || o(t, s, a)) return u(t, s, i, a), !0
                    } else {
                        if (s.asyncSet) {
                            if (i.forceChange || o(t, s, n)) {
                                var r = s.asyncSet(n);
                                return r.then(function(e) {
                                    (i.forceChange || o(t, s, e)) && u(t, s, i, e)
                                }).catch(function(e) {
                                    return window.wError("store", "Unable to change store value " + t + ", " + n, e)
                                }), r
                            }
                            return Promise.resolve(n)
                        }
                        if (i.forceChange || o(t, s, n)) return u(t, s, i, n), !0
                    }
                } else window.wError("store", "Trying to set dataSpec. ident:", t)
            },
            u = function(e, i, s, o) {
                if (null === o ? delete a[e] : a[e] = o, i.save && !s.doNotStore && t.isAvbl) {
                    var l = s.update || Date.now();
                    t.put("settings_" + e, o), i.sync && (t.put("settings_" + e + "_ts", l), t.put("lastSyncableUpdatedItem", l)), n.user && i.sync && !s.doNotSaveToCloud && r.emit("_cloudSync")
                }
                r.emit(e, null === o ? i.def : o, s.UIident)
            },
            h = function(n) {
                if (n in a) return a[n];
                var i, s = e[n];
                return s ? (s.save && t.isAvbl ? null === (i = t.get("settings_" + n)) ? i = s.def : l(s, i) || (window.wError("store", "Attempt to get invalid value from localStorage", n), i = s.def) : i = s.def, a[n] = i, i) : (window.wError("Trying to get invalid dataSpec. ident:", n), null)
            },
            f = function(t) {
                return e[t].def
            };
        r.once("country", function(e) {
            c("hourFormat", /us|uk|ph|ca|au|nz|in|eg|sa|co|pk|my/.test(e) ? "12h" : "24h"), d("isImperial", /us|my|lr/.test(e))
        });
        var m, p = t.get("UUID");
        p || (p = (m = function() {
            return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1)
        })() + m() + "-" + m() + "-" + m() + "-" + m() + "-" + m() + m() + m(), t.put("UUID", p));
        return h("firstUserSession") || d("firstUserSession", Date.now()), n.sessionCounter = h("sessionCounter201803") + 1, d("sessionCounter201803", n.sessionCounter), s.emit("identityCreated", p), s.emit("provisionaryToken", t.get("userToken")), s.on("tokenRecieved", function(e) {
            return t.put("userToken", e)
        }), Object.assign(r, {
            get: h,
            set: d,
            remove: function(e, t) {
                void 0 === t && (t = {
                    doNotCheckValidity: !0
                }), d(e, null, t)
            },
            insert: function(t, n) {
                return e[t] = n
            },
            defineProperty: function(t, n, i) {
                return e[t][n] = i
            },
            getProperty: function(t) {
                return e[t]
            },
            setDefault: c,
            is12hFormat: function() {
                return "12h" === h("hourFormat")
            },
            getDeviceID: function() {
                return p
            },
            getAll: function() {
                Object.keys(e).map(function(e) {
                    return console.log(e + ":", h(e))
                })
            },
            getDefault: f,
            getAllowed: function(t) {
                var n = e[t].allowed;
                return n && Array.isArray(n) ? n : "Allowed values are checked by function"
            }
        })
    }), /*! */
    W.define("dataSpecifications", ["rootScope", "utils"], function(e, t) {
        var n = [!0, !1],
            i = function(e) {
                return "number" == typeof + e && !isNaN(+e)
            },
            s = function(e) {
                return void 0 !== e && "object" == typeof e
            },
            a = function(e) {
                return t.isValidLatLonObj(e) || null == e
            },
            r = function(e) {
                return e.slice().sort().toString()
            },
            o = function(e, t) {
                return r(e) === r(t)
            };
        return {
            overlay: {
                def: "wind",
                allowed: e.overlays,
                save: !1,
                sync: !1
            },
            level: {
                def: "surface",
                allowed: e.levels
            },
            acTime: {
                def: "next3d",
                allowed: e.acTimes
            },
            timestamp: {
                def: Date.now(),
                allowed: i
            },
            path: {
                def: "",
                allowed: function(e) {
                    return void 0 !== e && "string" == typeof e
                }
            },
            isolines: {
                def: "off",
                allowed: e.isolines,
                save: !0
            },
            product: {
                def: "ecmwf",
                allowed: e.products
            },
            availProducts: {
                def: ["ecmwf"],
                allowed: Array.isArray,
                compare: o
            },
            visibleProducts: {
                def: ["ecmwf"],
                allowed: Array.isArray,
                compare: o
            },
            availAcTimes: {
                def: ["next12h"],
                allowed: Array.isArray
            },
            prefferedProduct: {
                def: "ecmwf",
                allowed: ["ecmwf", "gfs"]
            },
            animation: {
                def: !1,
                allowed: n
            },
            calendar: {
                def: null,
                allowed: s
            },
            availLevels: {
                def: e.levels,
                allowed: e.levels
            },
            particlesAnim: {
                def: "on",
                allowed: ["on", "off", "intensive"],
                save: !0
            },
            lastModified: {
                def: 0,
                allowed: i
            },
            graticule: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !1
            },
            latlon: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !1
            },
            lang: {
                def: "auto",
                allowed: function(e) {
                    return "auto" === e || t.isValidLang(e)
                },
                save: !0,
                sync: !0
            },
            englishLabels: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !0
            },
            numDirection: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !0
            },
            favOverlays: {
                def: ["wind", "temp", "rh", "cloudtop", "pressure"],
                allowed: Array.isArray,
                save: !0,
                sync: !1
            },
            hourFormat: {
                def: "24h",
                allowed: ["12h", "24h"],
                save: !0,
                sync: !0
            },
            country: {
                def: "xx",
                save: !0,
                allowed: function(e) {
                    return /[a-z][a-z0-9]/.test(e)
                }
            },
            isImperial: {
                def: !1,
                allowed: n
            },
            map: {
                def: "sznmap",
                allowed: ["sznmap", "sat", "winter"],
                save: !0,
                sync: !1
            },
            showWeather: {
                def: !0,
                allowed: n,
                save: !0,
                sync: !1
            },
            disableWebGL: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !1
            },
            usedLang: {
                def: "en",
                allowed: e.supportedLanguages
            },
            expertMode: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !1
            },
            lhpaneSwitch: {
                def: "tools",
                save: !0,
                allowed: ["tools", "favs", "settings"]
            },
            particles: {
                def: {
                    multiplier: 1,
                    velocity: 1,
                    width: 1,
                    blending: 1,
                    opacity: 1
                },
                save: !0,
                allowed: function(e) {
                    var t;
                    if (!e || "object" != typeof e) return !1;
                    for (var n in this.def)
                        if ("number" != typeof(t = e[n]) || t > 2 || t < 0) return !1;
                    return !0
                }
            },
            startUp: {
                def: "ip",
                allowed: ["ip", "gps", "location"],
                save: !0
            },
            homeLocation: {
                def: null,
                allowed: a,
                save: !0,
                sync: !0
            },
            ipLocation: {
                def: null,
                allowed: a,
                save: !0
            },
            gpsLocation: {
                def: null,
                allowed: a,
                save: !0
            },
            startupReverseName: {
                def: null,
                allowed: s,
                save: !0
            },
            notams: {
                def: null,
                allowed: s,
                save: !0,
                sync: !0
            },
            email: {
                def: "",
                allowed: function(e) {
                    return /\S+@\S+/.test(e)
                },
                save: !0,
                sync: !0
            },
            metarsRAW: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !0
            },
            sessionCounter201803: {
                def: 0,
                allowed: i,
                save: !0
            },
            firstUserSession: {
                def: 0,
                allowed: i,
                save: !0
            },
            seenRadarInfo: {
                def: !1,
                save: !0,
                allowed: n
            },
            wasDragged: {
                def: !1,
                allowed: n,
                save: !0,
                sync: !0
            },
            detailLocation: {
                def: null,
                allowed: a
            },
            detailDisplay: {
                def: "table",
                allowed: ["table", "meteogram", "airgram", "waves", "wind"]
            },
            detailProduct: {
                def: "ecmwf",
                allowed: ["ecmwf", "mblue", "gfs", "iconEu", "ecmwfWaves", "gfsWaves", "namConus", "namAlaska", "namHawaii", "arome"]
            },
            detailAvailProducts: {
                def: ["ecmwf"],
                allowed: Array.isArray,
                compare: o
            },
            detailExtended: {
                def: !1,
                allowed: n
            },
            webcamsDaylight: {
                def: !1,
                allowed: n
            },
            capColorizeType: {
                def: "severity",
                allowed: ["severity", "type"]
            },
            capDisplay: {
                def: "all",
                allowed: ["all", "today", "tomm", "later"]
            },
            radarRange: {
                def: "-1",
                allowed: ["-12", "-6", "-1"]
            },
            radarTimestamp: {
                def: Date.now(),
                allowed: i
            },
            radarSpeed: {
                def: "medium",
                allowed: ["slow", "medium", "fast"]
            },
            radarCalendar: {
                def: {},
                allowed: s
            },
            radarAnimation: {
                def: !1,
                allowed: n
            },
            blitzOn: {
                def: !0,
                allowed: n
            },
            blitzSoundOn: {
                def: !0,
                allowed: n
            },
            satelliteRange: {
                def: "-2",
                allowed: ["-12", "-6", "-2"]
            },
            satelliteTimestamp: {
                def: Date.now(),
                allowed: i
            },
            satelliteCalendar: {
                def: {},
                allowed: s
            },
            satelliteAnimation: {
                def: !1,
                allowed: n
            },
            satelliteMode: {
                def: "VISIR",
                allowed: ["VISIR", "IR", "IRBT"]
            },
            satelliteSpeed: {
                def: "medium",
                allowed: ["slow", "medium", "fast"]
            },
            hpShown: {
                def: !1,
                allowed: n
            },
            pois: {
                def: "favs",
                allowed: Object.keys(e.pois),
                save: !0,
                sync: !1
            },
            favPois: {
                def: ["favs", "wind", "temp", "cities", "metars", "cams", "pgspots"],
                allowed: function(e) {
                    return Array.isArray(e) && e.length < 8
                },
                save: !0,
                sync: !0
            },
            visibility: {
                def: !0,
                allowed: n
            },
            displayLocation: {
                def: !0,
                allowed: n,
                save: !0
            },
            vibrate: {
                def: !0,
                allowed: n,
                save: !0
            },
            donations: {
                def: [],
                allowed: Array.isArray,
                compare: o,
                save: !0,
                sync: !0
            },
            zuluMode: {
                def: !1,
                allowed: n,
                save: !0
            },
            plugins: {
                def: [],
                allowed: Array.isArray,
                compare: o,
                save: !0,
                sync: !0
            },
            rplannerDir: {
                def: "horizontal",
                allowed: ["horizontal", "vertical", "north"],
                save: !0
            },
            stationsSort: {
                def: "profi",
                allowed: ["profi", "distance"],
                save: !0
            }
        }
    }), /*! */
    W.define("colors", ["Color"], function(e) {
        return {
            temp: e.instance({
                ident: "temp",
                steps: 2048,
                prepare: !0,
                default: [
                    [203, [115, 70, 105, 255]],
                    [218, [202, 172, 195, 255]],
                    [233, [162, 70, 145, 255]],
                    [248, [143, 89, 169, 255]],
                    [258, [157, 219, 217, 255]],
                    [265, [106, 191, 181, 255]],
                    [269, [100, 166, 189, 255]],
                    [273.15, [93, 133, 198, 255]],
                    [274, [68, 125, 99, 255]],
                    [283, [128, 147, 24, 255]],
                    [294, [243, 183, 4, 255]],
                    [303, [232, 83, 25, 255]],
                    [320, [71, 14, 0, 255]]
                ]
            }),
            wind: e.instance({
                ident: "wind",
                steps: 2048,
                prepare: !0,
                default: [
                    [0, [98, 113, 183, 255]],
                    [1, [57, 97, 159, 255]],
                    [3, [74, 148, 169, 255]],
                    [5, [77, 141, 123, 255]],
                    [7, [83, 165, 83, 255]],
                    [9, [53, 159, 53, 255]],
                    [11, [167, 157, 81, 255]],
                    [13, [159, 127, 58, 255]],
                    [15, [161, 108, 92, 255]],
                    [17, [129, 58, 78, 255]],
                    [19, [175, 80, 136, 255]],
                    [21, [117, 74, 147, 255]],
                    [24, [109, 97, 163, 255]],
                    [27, [68, 105, 141, 255]],
                    [29, [92, 144, 152, 255]],
                    [36, [125, 68, 165, 255]],
                    [46, [231, 215, 215, 256]],
                    [51, [219, 212, 135, 256]],
                    [77, [205, 202, 112, 256]],
                    [104, [128, 128, 128, 255]]
                ]
            }),
            windDetail: e.instance({
                ident: "windDetail",
                steps: 256,
                default: [
                    [0, [243, 243, 243, 255]],
                    [3, [243, 243, 243, 255]],
                    [4, [0, 200, 254, 255]],
                    [6, [0, 230, 0, 255]],
                    [10, [254, 174, 0, 255]],
                    [19, [254, 0, 150, 255]],
                    [100, [151, 50, 222, 255]]
                ]
            }),
            wavesDetail: e.instance({
                ident: "wavesDetail",
                steps: 256,
                default: [
                    [0, [255, 255, 255, 0]],
                    [.1, [255, 255, 255, 0]],
                    [1, [180, 180, 255, 255]],
                    [2.5, [254, 174, 0, 255]],
                    [20, [255, 255, 255, 255]]
                ]
            }),
            periodDetail: e.instance({
                ident: "periodDetail",
                steps: 256,
                default: [
                    [0, [255, 255, 255, 0]],
                    [5, [255, 255, 255, 0]],
                    [10, [255, 237, 180, 255]],
                    [20, [180, 255, 180, 255]]
                ]
            }),
            altitudeDetail: e.instance({
                ident: "altitudeDetail",
                steps: 256,
                default: [
                    [0, [255, 197, 254, 256]],
                    [129, [255, 199, 254, 256]],
                    [149, [255, 167, 179, 256]],
                    [279, [255, 177, 179, 256]],
                    [299, [175, 203, 255, 256]],
                    [879, [157, 194, 255, 256]],
                    [914, [159, 255, 170, 256]],
                    [1499, [163, 255, 172, 256]],
                    [7999, [255, 255, 255, 256]]
                ]
            }),
            visibilityDetail: e.instance({
                ident: "visibilityDetail",
                steps: 256,
                default: [
                    [0, [251, 180, 251, 256]],
                    [1600, [253, 173, 255, 256]],
                    [2200, [255, 175, 176, 256]],
                    [5e3, [255, 165, 165, 256]],
                    [6e3, [179, 187, 255, 256]],
                    [8e3, [169, 182, 255, 256]],
                    [9e3, [179, 255, 187, 256]],
                    [15e3, [178, 255, 171, 255]],
                    [20004, [255, 255, 255, 256]]
                ]
            }),
            dewpointSpreadDetail: e.instance({
                ident: "dewpointSpreadDetail",
                steps: 256,
                default: [
                    [0, [251, 180, 251, 256]],
                    [.1, [253, 173, 255, 256]],
                    [.25, [255, 175, 176, 256]],
                    [.5, [255, 165, 165, 256]],
                    [1, [179, 187, 255, 256]],
                    [2, [169, 182, 255, 256]],
                    [3, [179, 255, 187, 256]],
                    [4, [178, 255, 171, 255]],
                    [5, [255, 255, 255, 256]]
                ]
            }),
            rh: e.instance({
                ident: "rh",
                steps: 1024,
                default: [
                    [0, [173, 85, 56, 255]],
                    [30, [173, 110, 56, 255]],
                    [40, [173, 146, 56, 255]],
                    [50, [105, 173, 56, 255]],
                    [60, [56, 173, 121, 255]],
                    [70, [56, 174, 173, 255]],
                    [75, [56, 160, 173, 255]],
                    [80, [56, 157, 173, 255]],
                    [83, [56, 148, 173, 255]],
                    [87, [56, 135, 173, 255]],
                    [90, [56, 132, 173, 255]],
                    [93, [56, 123, 173, 255]],
                    [97, [56, 98, 157, 255]],
                    [100, [56, 70, 114, 255]]
                ]
            }),
            pressure: e.instance({
                ident: "pressure",
                steps: 1024,
                default: [
                    [99e3, [142, 179, 184, 255]],
                    [99500, [104, 180, 179, 255]],
                    [1e5, [69, 167, 166, 255]],
                    [100300, [57, 131, 147, 255]],
                    [100600, [57, 118, 147, 255]],
                    [100900, [57, 91, 147, 255]],
                    [101500, [58, 117, 53, 255]],
                    [101900, [159, 161, 65, 255]],
                    [102200, [173, 136, 57, 255]],
                    [102500, [170, 84, 67, 255]],
                    [103e3, [94, 60, 81, 255]]
                ]
            }),
            altitude: e.instance({
                ident: "altitude",
                steps: 1024,
                default: [
                    [0, [105, 83, 83, 255]],
                    [500, [162, 82, 140, 255]],
                    [750, [99, 174, 174, 255]],
                    [1000.15, [73, 106, 160, 255]],
                    [1500, [75, 131, 70, 255]],
                    [2e3, [191, 193, 93, 255]],
                    [3e3, [184, 149, 73, 255]],
                    [5e3, [182, 99, 83, 255]],
                    [1e4, [171, 81, 102, 255]],
                    [15e3, [108, 77, 97, 255]]
                ]
            }),
            deg0: e.instance({
                ident: "deg0",
                steps: 1024,
                default: [
                    [0, [188, 197, 195, 255]],
                    [500, [155, 195, 189, 255]],
                    [750, [93, 173, 156, 255]],
                    [1000.15, [80, 141, 129, 255]],
                    [1500, [55, 122, 109, 255]],
                    [2e3, [39, 93, 82, 255]],
                    [3e3, [33, 68, 73, 255]],
                    [5e3, [32, 55, 71, 255]],
                    [1e4, [28, 33, 64, 255]],
                    [15e3, [6, 6, 6, 255]]
                ]
            }),
            levels: e.instance({
                ident: "levels",
                steps: 2048,
                default: [
                    [0, [111, 111, 111, 255]],
                    [1e3, [111, 111, 111, 255]],
                    [4e3, [80, 121, 154, 255]],
                    [8e3, [78, 179, 102, 255]],
                    [1e4, [189, 189, 68, 255]],
                    [12e3, [177, 80, 80, 255]],
                    [15e3, [178, 80, 178, 255]],
                    [2e4, [184, 184, 184, 255]]
                ]
            }),
            rain: e.instance({
                ident: "rain",
                steps: 1024,
                default: [
                    [0, [111, 111, 111, 255]],
                    [.6, [60, 116, 160, 255]],
                    [6, [59, 161, 161, 255]],
                    [8, [59, 161, 61, 255]],
                    [10, [130, 161, 59, 255]],
                    [15, [161, 161, 59, 255]],
                    [20, [161, 59, 59, 255]],
                    [31, [161, 59, 161, 255]],
                    [50, [168, 168, 168, 255]]
                ]
            }),
            ptype: e.instance({
                ident: "ptype",
                steps: 128,
                default: [
                    [0, [111, 111, 111, 255]],
                    [1, [0, 208, 239, 255]],
                    [2, [0, 0, 255, 255]],
                    [3, [197, 27, 195, 255]],
                    [4, [129, 63, 63, 255]],
                    [5, [227, 227, 227, 255]],
                    [6, [129, 195, 129, 255]],
                    [7, [202, 211, 57, 255]],
                    [8, [183, 119, 8, 255]],
                    [9, [227, 73, 19, 255]],
                    [10, [195, 63, 63, 255]]
                ]
            }),
            rainClouds: e.instance({
                ident: "rainClouds",
                steps: 128,
                default: [
                    [0, [67, 87, 166, 255]],
                    [.8, [70, 102, 163, 255]],
                    [2, [62, 171, 171, 255]],
                    [6, [62, 171, 171, 255]],
                    [8, [62, 142, 62, 255]],
                    [10, [129, 156, 62, 255]],
                    [15, [171, 171, 62, 255]],
                    [20, [169, 62, 62, 255]],
                    [31, [171, 62, 171, 255]],
                    [50, [177, 177, 177, 255]]
                ]
            }),
            clouds: e.instance({
                ident: "clouds",
                steps: 800,
                default: [
                    [0, [146, 130, 70, 255]],
                    [10, [132, 119, 70, 255]],
                    [30, [116, 116, 116, 255]],
                    [80, [173, 183, 182, 255]],
                    [95, [190, 193, 193, 255]],
                    [100, [213, 213, 205, 255]]
                ]
            }),
            lclouds: e.instance({
                ident: "lclouds",
                steps: 800,
                default: [
                    [0, [156, 142, 87, 255]],
                    [10, [143, 131, 87, 255]],
                    [30, [129, 129, 129, 255]],
                    [60, [137, 159, 182, 255]],
                    [100, [187, 187, 187, 255]]
                ]
            }),
            hclouds: e.instance({
                ident: "hclouds",
                steps: 800,
                default: [
                    [0, [156, 142, 87, 255]],
                    [10, [143, 131, 87, 255]],
                    [30, [125, 157, 157, 255]],
                    [50, [141, 169, 169, 255]],
                    [100, [187, 187, 187, 255]]
                ]
            }),
            mclouds: e.instance({
                ident: "mclouds",
                steps: 800,
                default: [
                    [0, [156, 142, 87, 255]],
                    [10, [143, 131, 87, 255]],
                    [30, [157, 192, 157, 255]],
                    [50, [145, 171, 145, 255]],
                    [100, [187, 187, 187, 255]]
                ]
            }),
            cape: e.instance({
                ident: "cape",
                steps: 1024,
                default: [
                    [0, [110, 110, 110, 255]],
                    [350, [110, 110, 110, 255]],
                    [400, [93, 95, 127, 255]],
                    [500, [37, 98, 145, 255]],
                    [800, [37, 165, 37, 255]],
                    [1500, [163, 161, 55, 255]],
                    [2e3, [155, 112, 63, 255]],
                    [2500, [162, 55, 55, 255]],
                    [5001, [151, 68, 151, 255]]
                ]
            }),
            lightDensity: e.instance({
                ident: "lightDensity",
                steps: 2048,
                default: [
                    [0, [136, 136, 136, 255]],
                    [.015, [136, 136, 136, 255]],
                    [.025, [136, 200, 0, 255]],
                    [.1, [218, 218, 0, 255]],
                    [1, [241, 95, 0, 255]],
                    [2, [248, 78, 120, 255]],
                    [4, [135, 0, 0, 255]],
                    [15, [221, 101, 255, 255]]
                ]
            }),
            cbase: e.instance({
                ident: "cbase",
                steps: 512,
                default: [
                    [0, [166, 93, 165, 255]],
                    [129, [162, 97, 160, 255]],
                    [149, [167, 91, 91, 255]],
                    [279, [167, 91, 91, 255]],
                    [299, [98, 122, 160, 255]],
                    [879, [98, 122, 160, 255]],
                    [914, [90, 169, 90, 255]],
                    [1499, [91, 167, 99, 255]],
                    [7999, [119, 141, 120, 255]]
                ]
            }),
            snow: e.instance({
                ident: "snow",
                steps: 2048,
                default: [
                    [0, [97, 97, 97, 255]],
                    [2, [69, 82, 152, 255]],
                    [10, [65, 165, 167, 255]],
                    [20, [65, 141, 65, 255]],
                    [50, [168, 168, 65, 255]],
                    [80, [170, 126, 63, 255]],
                    [120, [167, 65, 65, 255]],
                    [500, [168, 65, 168, 255]]
                ]
            }),
            rainAccu: e.instance({
                ident: "rainAccu",
                steps: 4096,
                default: [
                    [0, [89, 89, 89, 255]],
                    [1, [90, 88, 101, 255]],
                    [5, [97, 88, 132, 255]],
                    [10, [52, 117, 142, 255]],
                    [30, [11, 140, 129, 255]],
                    [40, [92, 153, 100, 255]],
                    [80, [159, 157, 84, 255]],
                    [120, [211, 154, 120, 255]],
                    [500, [250, 157, 190, 255]],
                    [8e3, [220, 220, 220, 255]]
                ]
            }),
            waves: e.instance({
                ident: "waves",
                steps: 1024,
                default: [
                    [0, [159, 185, 191, 255]],
                    [.5, [48, 157, 185, 255]],
                    [1, [48, 98, 141, 255]],
                    [1.5, [56, 104, 191, 255]],
                    [2, [57, 60, 142, 255]],
                    [2.5, [187, 90, 191, 255]],
                    [3, [154, 48, 151, 255]],
                    [4, [133, 48, 48, 255]],
                    [5, [191, 51, 95, 255]],
                    [7, [191, 103, 87, 255]],
                    [10, [191, 191, 191, 255]],
                    [12, [154, 127, 155, 255]]
                ]
            }),
            currents: e.instance({
                ident: "currents",
                steps: 256,
                default: [
                    [0, [64, 77, 143, 255]],
                    [.02, [50, 86, 142, 255]],
                    [.06, [50, 123, 142, 255]],
                    [.1, [64, 120, 103, 255]],
                    [.15, [50, 133, 50, 255]],
                    [.2, [50, 141, 50, 255]],
                    [.3, [142, 132, 50, 255]],
                    [.4, [142, 113, 50, 255]],
                    [.5, [130, 77, 61, 255]],
                    [.6, [115, 50, 68, 255]],
                    [.7, [142, 50, 104, 255]],
                    [.8, [105, 68, 131, 255]],
                    [.85, [81, 70, 131, 255]],
                    [.9, [65, 98, 131, 255]],
                    [1, [73, 122, 131, 255]],
                    [1.5, [143, 143, 143, 255]],
                    [4, [143, 143, 143, 255]]
                ]
            }),
            visibility: e.instance({
                ident: "visibility",
                steps: 1024,
                default: [
                    [0, [163, 89, 163, 255]],
                    [1600, [161, 89, 163, 255]],
                    [2200, [167, 86, 86, 255]],
                    [5e3, [167, 86, 86, 255]],
                    [6e3, [89, 97, 163, 255]],
                    [8e3, [89, 101, 163, 255]],
                    [9e3, [60, 188, 73, 255]],
                    [15e3, [83, 167, 75, 255]],
                    [20004, [121, 121, 121, 255]]
                ]
            }),
            gtco3: e.instance({
                ident: "gtco3",
                steps: 512,
                default: [
                    [80, [115, 70, 105, 256]],
                    [218, [162, 70, 145, 256]],
                    [220, [110, 81, 217, 256]],
                    [260, [79, 151, 193, 256]],
                    [320, [82, 203, 167, 256]],
                    [360, [59, 197, 67, 256]],
                    [420, [231, 174, 5, 256]],
                    [500, [232, 83, 25, 256]]
                ]
            }),
            aod550: e.instance({
                ident: "aod550",
                steps: 8e3,
                default: [
                    [0, [0, 102, 151, 256]],
                    [.25, [125, 182, 209, 256]],
                    [.5, [170, 183, 189, 256]],
                    [1, [194, 195, 125, 256]],
                    [2, [232, 83, 25, 256]],
                    [3, [189, 52, 19, 256]],
                    [4, [75, 12, 0, 256]]
                ]
            }),
            pm2p5: e.instance({
                ident: "pm2p5",
                steps: 1024,
                default: [
                    [0, [0, 102, 151, 256]],
                    [10, [125, 182, 209, 256]],
                    [15, [170, 183, 189, 256]],
                    [25, [194, 195, 125, 256]],
                    [150, [232, 83, 25, 256]],
                    [200, [189, 52, 19, 256]],
                    [1e3, [75, 12, 0, 256]]
                ]
            }),
            no2: e.instance({
                ident: "no2",
                steps: 4096,
                default: [
                    [0, [0, 102, 151, 256]],
                    [1.5, [125, 182, 209, 256]],
                    [2, [170, 183, 189, 256]],
                    [3, [194, 195, 125, 256]],
                    [30, [232, 83, 25, 256]],
                    [40, [189, 52, 19, 256]],
                    [100, [75, 12, 0, 256]]
                ]
            }),
            so2: e.instance({
                ident: "so2",
                steps: 1024,
                default: [
                    [0, [171, 171, 171, 255]],
                    [.05, [170, 174, 143, 255]],
                    [.1, [164, 163, 120, 255]],
                    [.5, [158, 139, 74, 255]],
                    [2, [151, 112, 24, 255]],
                    [10, [140, 81, 0, 255]],
                    [20, [132, 64, 0, 255]],
                    [50, [121, 45, 0, 255]],
                    [80, [102, 11, 0, 255]]
                ]
            }),
            cosc: e.instance({
                ident: "cosc",
                steps: 1024,
                default: [
                    [0, [124, 124, 124, 255]],
                    [70, [124, 124, 108, 255]],
                    [110, [164, 157, 72, 255]],
                    [200, [136, 113, 47, 255]],
                    [450, [39, 31, 31, 255]],
                    [2200, [255, 22, 22, 255]]
                ]
            }),
            dust: e.instance({
                ident: "dust",
                steps: 1024,
                default: [
                    [0, [171, 171, 171, 255]],
                    [10, [148, 137, 118, 255]],
                    [80, [124, 104, 59, 255]],
                    [800, [100, 73, 0, 255]],
                    [1200, [74, 44, 0, 255]]
                ]
            }),
            radar: e.instance({
                ident: "radar",
                steps: 255,
                opaque: !1,
                save: !1,
                sync: !1,
                default: [
                    [0, [40, 16, 158, 0]],
                    [3, [40, 16, 158, 20]],
                    [8, [40, 16, 158, 100]],
                    [14, [0, 101, 154, 180]],
                    [20, [0, 144, 147, 220]],
                    [26, [0, 179, 125, 240]],
                    [32, [117, 208, 89, 255]],
                    [36, [220, 220, 30, 255]],
                    [40, [244, 202, 8, 255]],
                    [44, [245, 168, 24, 255]],
                    [48, [236, 130, 63, 255]],
                    [52, [205, 75, 75, 255]],
                    [56, [182, 45, 100, 255]],
                    [60, [156, 16, 109, 255]],
                    [64, [125, 0, 108, 255]],
                    [68, [92, 0, 100, 255]],
                    [100, [0, 0, 0, 255]],
                    [101, [0, 0, 0, 0]],
                    [255, [0, 0, 0, 0]]
                ]
            }),
            blitz: e.instance({
                ident: "blitz",
                steps: 288,
                opaque: !1,
                save: !1,
                sync: !1,
                default: [
                    [0, [12, 0, 0, 240]],
                    [.05, [48, 0, 0, 240]],
                    [.1, [100, 20, 0, 240]],
                    [.5, [130, 70, 0, 220]],
                    [1, [140, 130, 20, 200]]
                ]
            }),
            satellite: e.instance({
                ident: "satellite",
                steps: 256,
                opaque: !1,
                save: !1,
                sync: !1,
                default: [
                    [0, [0, 0, 0, 255]],
                    [159, [240, 240, 240, 255]],
                    [160, [0, 0, 128, 255]],
                    [170, [0, 0, 255, 255]],
                    [180, [0, 128, 255, 255]],
                    [190, [0, 255, 255, 255]],
                    [200, [128, 255, 128, 255]],
                    [210, [255, 255, 0, 255]],
                    [220, [255, 128, 0, 255]],
                    [230, [255, 0, 0, 255]],
                    [240, [128, 0, 0, 255]],
                    [256, [128, 0, 0, 255]]
                ]
            }),
            fog: e.instance({
                ident: "fog",
                steps: 512,
                default: [
                    [0, [110, 110, 110, 255]],
                    [1, [200, 200, 200, 255]],
                    [2, [200, 200, 255, 255]]
                ]
            }),
            justGray: e.instance({
                ident: "justGray",
                steps: 4,
                default: [
                    [-2e4, [111, 111, 111, 255]],
                    [2e4, [111, 111, 111, 255]]
                ]
            }),
            efiWind: e.instance({
                ident: "efiWind",
                steps: 256,
                default: [
                    [-1, [5, 165, 189, 256]],
                    [-.8, [30, 175, 119, 256]],
                    [-.4, [111, 111, 111, 255]],
                    [.4, [111, 111, 111, 255]],
                    [.8, [187, 174, 24, 256]],
                    [1, [189, 80, 32, 256]]
                ]
            }),
            efiTemp: e.instance({
                ident: "efiTemp",
                steps: 256,
                default: [
                    [-1, [43, 54, 209, 256]],
                    [-.8, [60, 164, 179, 256]],
                    [-.4, [111, 111, 111, 255]],
                    [.4, [111, 111, 111, 255]],
                    [.8, [128, 147, 24, 255]],
                    [1, [213, 0, 110, 256]]
                ]
            }),
            efiRain: e.instance({
                ident: "efiRain",
                steps: 256,
                default: [
                    [-1, [151, 75, 0, 256]],
                    [-.8, [187, 180, 0, 256]],
                    [-.4, [111, 111, 111, 255]],
                    [.4, [111, 111, 111, 255]],
                    [.8, [1, 162, 177, 256]],
                    [1, [4, 8, 181, 256]]
                ]
            })
        }
    }), /*! */
    W.define("radar", ["StaticProduct", "Evented"], function(e, t) {
        return e.instance(t, {
            ident: "radar",
            animation: !1,
            modelName: "",
            interval: 3,
            directory: "radar2/composite",
            server: "http://www.advaned-offline.map/test-windy",
            dataQuality: "radar",
            labelsTemp: !1,
            overlays: ["radar"],
            levels: ["surface"],
            open: function() {
                return this.loadMinifest(), Promise.resolve()
            }
        })
    }), /*! */
    W.define("satellite", ["StaticProduct", "Evented", "rootScope"], function(e, t, n) {
        return e.instance(t, {
            ident: "satellite",
            animation: !1,
            modelName: "EUMETSAT",
            provider: "EUMETSAT",
            interval: 3,
            directory: "satellite/composite",
            server: "https://sat.windy.com",
            fileName: "satellite.jpg?mosaic=true",
            dataQuality: 0,
            labelsTemp: !1,
            overlays: ["satellite"],
            levels: ["surface"],
            logo: '<a class="size-m uiyellow inlined" href="http://www.advaned-offline.map/test-windy/topic/8820" data-icon-after=">">This is <b>testing version</b> of our Satellite layer. Let us know how you like it</a>\n\n\t<a href="https://www.eumetsat.int/" target="_blank"><img src="img/providers/eumetsat2.svg" /></a>\n\t<div class="uiyellow size-m clickable inlined" data-do="rqstOpen,animate" data-icon="&#xe047;">Create video</div>',
            open: function() {
                return n.isMobileOrTable || this.once("loadedAll", this.printLogo.bind(this)), this.loadMinifest(), Promise.resolve()
            }
        })
    }), /*! */
    W.define("geolocation", ["$", "utils", "http", "store", "broadcast", "router"], function(e, t, n, i, s, a) {
        var r = function(e) {
                return void 0 === e && (e = {
                    enableHighAccuracy: !1,
                    timeout: 7e3
                }), navigator.geolocation ? new Promise(function(t) {
                    navigator.geolocation.getCurrentPosition(function(e) {
                        var n = {
                            lat: e.coords.latitude,
                            lon: e.coords.longitude,
                            source: "gps",
                            ts: Date.now()
                        };
                        i.set("gpsLocation", n), s.emit("newLocation", n), t(n)
                    }, function(e) {
                        t(c())
                    }, e)
                }) : Promise.resolve(c())
            },
            o = function(e, t) {
                return parseFloat(e).toFixed(2) + ", " + parseFloat(t).toFixed(2)
            },
            l = function(e, t, n, a, r) {
                n && (n = n.toLowerCase(), i.set("country", n));
                var l = {
                    ts: Date.now(),
                    source: r,
                    lat: parseFloat(e),
                    lon: parseFloat(t),
                    name: a || o(e, t)
                };
                i.set("ipLocation", l), s.emit("newLocation", l)
            },
            c = function() {
                var e = i.get("ipLocation"),
                    t = i.get("gpsLocation");
                return e && t ? e.ts > t.ts ? e : t : t || (e || {
                    lat: 0,
                    lon: -1 * (new Date).getTimezoneOffset() / 4,
                    cc: "us",
                    source: "fallback",
                    zoom: 3,
                    name: ""
                })
            };
        try {
            var d, u = e('meta[name="geoip"]');
            if (u && u.content && (d = u.content.split(","))) {
                var h = d[1],
                    f = d[2],
                    m = d[3],
                    p = d[4];
                l(h, f, m, p, "meta")
            } else n.get("/node/umisteni").then(function(e) {
                var t = e.data;
                l(t.ll[0], t.ll[1], t.country, t.city, "api")
            }).catch(window.wError.bind(null, "geolocation", "Unable to load||parse /node/umisteni"))
        } catch (e) {
            window.wError("geolocation", "Module initialization failed", e)
        }
        return {
            getFallbackName: o,
            getGPSlocation: r,
            getMyLatestPos: c,
            getHomeLocation: function(e) {
                var n = i.get("startUp"),
                    a = Date.now();
                if ("location" === n) e(i.get("homeLocation"));
                else if ("ip" === n) {
                    var o = c();
                    "fallback" === o.source || a - o.ts > 12 * t.tsHour ? s.once("newLocation", e) : e(o)
                } else {
                    var l = i.get("gpsLocation");
                    l && "gps" === l.source && a - l.ts < t.tsHour ? e(l) : r().then(e)
                }
            }
        }
    }), /*! */
    W.define("params", ["store", "models", "overlays", "utils", "broadcast", "products", "router", "renderCtrl"], function(e, t, n, i, s, a, r, o) {
        var l = i.debounce(d, 100);

        function c() {
            ["acTime", "level", "isolines", "path", "overlay", "product"].forEach(function(t) {
                e.on(t, l.bind(null, t))
            })
        }

        function d(t) {
            var i = e.get("overlay"),
                a = {
                    overlay: i,
                    hasMoreLevels: n[i].hasMoreLevels,
                    acTime: e.get("acTime"),
                    level: e.get("level"),
                    isolines: e.get("isolines"),
                    path: e.get("path"),
                    product: e.get("product")
                };
            s.emit("paramsChanged", a, t)
        }
        var u = a.ecmwf.calendar;
        e.setDefault("calendar", u), e.setDefault("path", u.ts2path(Date.now())), e.defineProperty("timestamp", "syncSet", function(t) {
            t = parseInt(t);
            var n = e.get("calendar");
            return n && (t = n.boundTs(t), e.set("path", n.ts2path(t))), t
        }), e.defineProperty("product", "asyncSet", function(t) {
            return new Promise(function(n, s) {
                var r = a[t];
                a[e.get("product")].close(), r.open().then(function(s) {
                    i.replaceClass(/product-\S+/, "product-" + t), s && (e.set("calendar", s), e.set("timestamp", i.bound(e.get("timestamp"), s.start, s.end), {
                        forceChange: !0
                    })), r.levels && (e.set("availLevels", r.levels), r.levels.includes(e.get("level")) || e.set("level", "surface")), r.acTimes && (e.set("availAcTimes", r.acTimes), r.acTimes.includes(e.get("acTime")) || e.set("acTime", r.acTimes[0])), /^gfs/.test(t) ? e.set("prefferedProduct", "gfs") : /^ecmwf/.test(t) && e.set("prefferedProduct", "ecmwf"), n(t)
                }).catch(s)
            })
        });
        var h, f = function(s) {
            var a = n[s];
            i.replaceClass(/overlay-\S+/, "overlay-" + s), i.toggleClass(document.body, a && a.hasMoreLevels, "has-more-levels"), e.set("availProducts", t.overlay2product[s])
        };
        e.defineProperty("overlay", "asyncSet", function(n) {
            var i = t.getProduct(n, e.get("product"));
            return i === e.get("product") ? (f(n), Promise.resolve(n)) : new Promise(function(t) {
                e.set("product", i).then(function() {
                    f(n), t(n)
                })
            })
        }), h = {
            forceChange: !0
        }, e.set("product", e.get("product"), h).then(function() {
            e.set("overlay", e.get("overlay"), h).then(function() {
                d(), c()
            })
        }).catch(function(t) {
            window.wError("params", "failed to launch params change", t), e.set("product", "ecmwf", h), e.set("overlay", "wind", h), setTimeout(function() {
                d(), c()
            }, 500)
        })
    }), /*! */
    W.define("reverseName", ["http", "store", "map", "geolocation"], function(e, t, n, i) {
        var s = i.getFallbackName;
        return {
            get: function(i, a) {
                var r = i.lat,
                    o = i.lon,
                    l = t.get("usedLang"),
                    c = a || n.getZoom();
                return new Promise(function(t) {
                    e.get("/reverse/v3/" + r + "/" + o + "/" + c + "?lang=" + l).then(function(e) {
                        var n = e.data,
                            i = n.locality,
                            a = n.suburb,
                            c = n.city,
                            d = n.county,
                            u = n.district,
                            h = n.state,
                            f = n.country,
                            m = n.island,
                            p = d || u || h || "",
                            g = a || i,
                            v = g && c && g !== c ? g + ", " + c : g || a || c || m || p || h && h + ", " + f || f;
                        t({
                            lat: r,
                            lon: o,
                            lang: l,
                            region: p,
                            country: f || "",
                            name: v || s(r, o),
                            nameValid: !!v
                        })
                    }).catch(function(e) {
                        t({
                            lat: r,
                            lon: o,
                            lang: l,
                            name: s(r, o)
                        })
                    })
                })
            }
        }
    }), /*! */
    W.define("router", ["store", "utils", "broadcast", "rootScope", "plugins", "seoParser"], function(e, t, n, i, s, a) {
        var r, o, l, c, d = !1;

        function u(e) {
            var t;
            return (t = /^\/(-?\d+\.\d+)\/(-?\d+\.\d+)(?:\/(meteogram|airgram|waves|wind))?(?:\/(\w+)-([^\/]+))?/.exec(e)) ? {
                plugin: "detail",
                params: {
                    lat: +t[1],
                    lon: +t[2],
                    source: "url",
                    display: t[3]
                }
            } : (t = /^\/distance\/?(vfr|ifr|car|boat|airgram)?\/?(.*)/.exec(e)) ? {
                plugin: i.isMobileOrTablet ? "distance" : "rplanner",
                params: i.isMobileOrTablet ? t[2] || "" : {
                    coords: t[2] || "",
                    view: t[1] || "elevation"
                }
            } : (t = /^\/([^\/]+)\/(-?\d+\.\d+)\/(-?\d+\.\d+)$/.exec(e)) && t[1] in s ? {
                plugin: t[1],
                params: {
                    lat: +t[2],
                    lon: +t[3],
                    source: "url"
                }
            } : (t = /^\/([^\/]+)\/([^\/]+)$/.exec(e)) && t[1] in s ? {
                plugin: t[1],
                params: t[2]
            } : (t = /^\/([^\/]+)$/.exec(e)) && t[1] in s ? {
                plugin: t[1]
            } : (t = /^\/(\w\w\w\w)$/.exec(e)) ? {
                plugin: "airport",
                params: {
                    icao: t[1].toUpperCase(),
                    source: "url"
                }
            } : void(e && e.length > 3 && (d = !0))
        }

        function h(n) {
            for (var s, a = n.split(","), l = 0; l < a.length; l++) {
                var c;
                if (s = a[l], /^-?\d+\.\d+$/.test(s) && /^-?\d+\.\d+$/.test(a[l + 1]) && /^\d+$/.test(a[l + 2]) && (r = {
                        lat: parseFloat(s),
                        lon: parseFloat(a[l + 1]),
                        zoom: parseInt(a[l + 2])
                    }, l += 2), i.products.includes(s) && e.set("product", s), i.levels.includes(s) && e.set("level", s), i.overlays.includes(s) && e.set("overlay", s), i.acTimes.includes(s) && e.set("acTime", s), (c = /^(\d\d\d\d)-(\d\d)-(\d\d)-(\d\d)$/.exec(s)) && e.set("timestamp", Date.UTC(+c[1], +c[2] - 1, +c[3], +c[4], 0, 0, 0)), (c = /^(a:?[a-zA-Z0-9]{5})/.exec(s)) && (i.customAnimation = c[1]), (c = /^m:([a-zA-Z0-9]{5,})/.exec(s)) && (o = t.str2latLon(c[1])), (c = /^i:([a-z0-9]{3,})/.exec(s)) && e.set("isolines", c[1]), (c = /^d:picker/.exec(s)) && (o = r), c = /^(\w{3,20}):(\S+)/.exec(s)) {
                    var d = e.getProperty(c[1]);
                    !d || d.save || d.sync || e.set(c[1], c[2])
                }
            }
            return {
                sharedCoords: r,
                pickerCoords: o
            }
        }
        l = a.purl;
        var f = (c = decodeURIComponent(window.location.search.substring(1)) || "") ? c.replace(/&.*$/, "") : "";
        f && f.length > 10 && h(f);
        var m = function(e) {
                var t = /\/qs:([^\/]+)$/.exec(e);
                if (t) {
                    for (var n = t[1].split("&"), i = {}, s = 0; s < n.length; s++) {
                        var a = n[s].split("=");
                        i[decodeURIComponent(a[0])] = decodeURIComponent(a[1] || "")
                    }
                    return {
                        purl: e = e.replace(/\/qs:(\S+)$/, ""),
                        qs: i
                    }
                }
                return {
                    purl: e
                }
            }(l),
            p = m.qs,
            g = u(m.purl);
        return g ? (n.once("paramsChanged", n.emit.bind(n, "rqstOpen", g.plugin, p || g.params)), i.startupDetail = g.params || g.plugin, l = a.startupUrl) : l = "", g && g.plugin || !o || !r || (o.noEmit = !0, n.once("redrawFinished", n.emit.bind(n, "rqstOpen", "picker", o))), {
            url: l,
            url404: d,
            sharedCoords: r,
            parseSearch: h,
            resolveRoute: u
        }
    }), /*! */
    W.define("seoParser", ["utils", "store"], function(e, t) {
        var n, i, s, a = decodeURIComponent(window.location.pathname),
            r = null,
            o = a;
        return (n = /^\/(zh-TW|[a-z]{2})(\/.*)?$/.exec(a)) && e.isValidLang(n[1]) && (r = n[1], a = n[2]), (i = /^\/-(?:[^0-9\/][^\/]+)(?:-(\w+))(?:[^\/]*)$/.exec(a)) ? (s = i[1], a = "/", t.set("overlay", s)) : (i = /^\/-(?:[^0-9\/][^\/]+)?(\/.+)$/.exec(a)) && (a = i[1]), {
            lang: r,
            purl: a,
            startupUrl: o,
            overlay: s
        }
    }), /*! */
    W.define("cloudSync", ["dataSpecifications", "storage", "store", "http", "utils", "broadcast", "rootScope", "colors", "metrics", "user"], function(e, t, n, i, s, a, r, o, l, c) {
        var d = s.debounce(function() {
            var e = m();
            if (e && Object.keys(e).length > 0) {
                var n = Date.now();
                t.put("storedSettings", n), i.post("/users/settings", {
                    data: {
                        version: 3,
                        user: r.user.userslug,
                        data: e,
                        storeTs: n
                    }
                })
            }
        }, 3e3);
        a.on("userLoggedIn", function() {
            var s = t.get("storedSettings") || 0,
                r = t.get("lastSyncableUpdatedItem") || 0;
            i.get("/users/settings?storeTs=" + s, {
                cache: !1
            }).then(function(i) {
                var o = i.status,
                    l = i.data;
                r > s && d(), 304 !== o && l && l.data && l.version > 1 && (! function(i) {
                    var s = !1;
                    for (var r in e)
                        if (f(r) && u(r) in i) {
                            var o = h(r),
                                l = i[o],
                                c = t.get(o);
                            if (!c || c < l) {
                                var d = i[u(r)];
                                null === d ? n.remove(r, {
                                    doNotCheckValidity: !0,
                                    doNotSaveToCloud: !0
                                }) : n.set(r, d, {
                                    update: l,
                                    doNotSaveToCloud: !0
                                }), /color_/.test(r) && (s = !0)
                            }
                        }
                    s && a.emit("redrawLayers")
                }(l.data), l.storeTs > s && t.put("storedSettings", l.storeTs))
            }).catch(window.wError.bind(null, "settings", "Cant load/merge settings from cloud"))
        }), n.on("_cloudSync", d);
        var u = function(e) {
                return "settings_" + e
            },
            h = function(e) {
                return u(e) + "_ts"
            },
            f = function(t) {
                return t in e && "object" == typeof e[t] && e[t] && e[t].sync
            },
            m = function() {
                var n = {};
                for (var i in e) f(i) && t.hasKey(u(i)) && (n[u(i)] = t.get(u(i)), n[h(i)] = t.get(h(i)));
                return n
            }
    }), /*! */
    W.define("settingsCtrl", ["broadcast", "rootScope", "storage", "utils", "plugins"], function(e, t, n, i, s) {
        var a = n.get("settingsLastSaved") || 0;
        n.isAvbl && ("index" !== t.target || t.sessionCounter > 1) && Date.now() - a > 24 * i.tsHour && (e.once("redrawFinished", function() {
            var e = Date.now();
            n.put("settingsLastSaved", e), t.renderedTime = e, s["store-settings"].load().then(function() {
                return W.require("store-settings")
            })
        }), e.once("dependenciesResolved", function() {
            return t.loadedTime = Date.now()
        }))
    }), /*! */
    W.define("connection", ["broadcast", "Window"], function(e, t) {
        var n = !0,
            i = !1,
            s = null;

        function a(e) {
            e ? (n = !0, s && s.close(), setTimeout(function() {
                s = t.instance({
                    ident: "message",
                    className: "bg-ok",
                    html: '<span data-t="MSG_ONLINE_APP"></span>',
                    timeout: 1e4,
                    onopen: function() {
                        this.node.onclick = function() {
                            return window.location.reload()
                        }
                    }
                }).open()
            }, 500)) : setTimeout(r.bind(null, a), 2e3)
        }

        function r(e) {
            var t = new XMLHttpRequest;
            t.open("HEAD", "http://www.advaned-offline.map/test-windy/node/connection", !0), t.onreadystatechange = function() {
                4 === t.readyState && e(t.status >= 200 && t.status < 400)
            };
            try {
                t.send(null)
            } catch (t) {
                e(!1)
            }
        }
        return e.on("noConnection", function() {
                if (!n || i) return;
                i = !0, r(function(e) {
                    i = !1, e || (n = !1, s = t.instance({
                        ident: "message",
                        className: "bg-error",
                        html: '<span data-t="MSG_OFFLINE"></span>'
                    }).open(), r(a))
                })
            }),
            function() {
                return n
            }
    }), /*! */
    W.define("Plugin", ["Class", "rootScope", "utils", "trans"], function(e, t, n, i) {
        return e.extend({
            ident: "",
            dependencies: [],
            _init: function() {
                this.isLoaded = !1, this.loading = !1, this.depsLoaded = !1, this.coreLoaded = !1, this.open = this.load
            },
            getAssetsLocation: function() {
                return this.location ? "http" === this.location.substr(0, 4) ? this.location : n.joinPath("http://www.advaned-offline.map/js", this.location) : t.assets + "/plugins/" + this.ident + ".js"
            },
            load: function() {
                var e = this;
                return this.isLoaded ? Promise.resolve(!0) : this.loading ? this.promise : (this.loading = !0, this.promise = new Promise(function(t, s) {
                    for (var a = [], r = 0; r < e.dependencies.length; r++) {
                        var o = e.dependencies[r],
                            l = W.plugins[o],
                            c = l.load();
                        l && !l.isLoaded && a.push(c)
                    }
                    e.langFile && a.push(i.loadLangFile(e.langFile)), Promise.all(a).then(function() {
                        if (e.depsLoaded = !0, e.coreLoaded) return e.isLoaded = !0, void t();
                        n.loadScript(e.getAssetsLocation()).then(function() {
                            e.coreLoaded = !0, e.isLoaded = !0, e.loading = !1, t()
                        }).catch(function() {
                            window.wError("plugin", "Failed to load plugin: " + e.ident), e.loading = !1, s(e)
                        })
                    }).catch(function(t) {
                        window.wError("plugin", "Plugin error: " + e.ident, t), s()
                    })
                }), this.promise)
            },
            open: function() {},
            close: function() {},
            toggle: function() {}
        })
    }), /*! */
    W.define("TagPlugin", ["Plugin", "Window", "trans"], function(e, t, n) {
        return e.extend(t, {
            iAm: "plugin",
            unmountOnClose: !1,
            exclusive: null,
            hasURL: !0,
            _init: function() {
                t._init.call(this), this.isLoaded = !1, this.loading = !1, this.isMounted = !1, this.cssInserted = !1, this.bodyClass = "on" + this.ident
            },
            _unmount: function() {
                this.unmountOnClose ? (this.node.parentNode.removeChild(this.node), this.isMounted = !1) : this.node.style.display = "none"
            },
            open: function(e) {
                var t = this;
                return this.closingTimer && clearTimeout(this.closingTimer), this.isLoaded ? (this.isMounted || this._mount(), this._open(e), Promise.resolve()) : (this.loading || this.load(e).then(function() {
                    t.isMounted || t._mount(), t._open(e)
                }), this.promise)
            },
            _mount: function() {
                var e = W.tags[this.ident];
                e ? (e.css && !this.cssInserted && (this.cssInserted = !0, document.head.insertAdjacentHTML("beforeend", "<style>" + e.css + "</style>")), this.createNode(e.html), n.translateDocument(this.node), this.attachRefs(), e.callback && "function" == typeof e.callback && e.callback.call(this), this.isMounted = !0) : window.wError("plugin", "Error, tag: " + this.ident + " was not registered")
            }
        })
    }), /*! */
    W.define("TagAutoOpen", ["TagPlugin"], function(e) {
        return e.extend({
            hasURL: !1,
            load: function() {
                return e.load.call(this).then(this.open.bind(this)), this.promise
            }
        })
    }), /*! */
    W.define("RiotPlugin", ["TagPlugin", "broadcast"], function(e, t) {
        return e.extend({
            dependencies: ["riot"],
            _init: function() {
                e._init.call(this), this.riotTag = null
            },
            onclose: function() {
                this.riotTag && "function" == typeof this.riotTag.onclose && this.riotTag.onclose(), this.hasURL && W.location.reset()
            },
            _mount: function() {
                this.createNode('<span data-is="' + this.ident + '"></span>'), this.isMounted = !0
            },
            _unmount: function() {
                this.unmountOnClose && this.riotTag ? (this.riotTag.unmount(), this.node.parentNode.removeChild(this.node), this.isMounted = this.riotTag = !1) : this.node.style.display = "none"
            },
            _open: function(e) {
                var n = this,
                    i = this.isOpen;
                if (!this.isOpen) {
                    if (this.riotTag || (this.riotTag = riot.mount(this.ident)[0]), this.addHooks(), !this.riotTag) return void window.wError("plugin", "Unable to _open riot tag: ", this.ident);
                    document.body.classList.add("on" + this.ident), this.node.style.display = "block", setTimeout(function() {
                        n.node.classList.add("open"), t.emit("pluginOpened", n.ident)
                    }, 0), this.isOpen = !0
                }
                this.riotTag.onopen && this.riotTag.onopen(e, i), this.riotTag.onurl && (this.onurl = this.riotTag.onurl), this.hasURL && this.url(e)
            }
        })
    }), /*! */
    W.define("plugins", ["rootScope", "Plugin", "TagPlugin", "TagAutoOpen", "RiotPlugin"], function(e, t, n, i, s) {
        return {
            riot: t.instance({
                ident: "riot",
                location: "riot.v0312.js"
            }),
            geodesic: t.instance({
                ident: "geodesic",
                location: "geodesic110.js"
            }),
            d3: t.instance({
                ident: "d3",
                location: "d3.v0507.custom01.js"
            }),
            colorpicker: t.instance({
                ident: "colorpicker",
                location: "colorpicker.js"
            }),
            graticule: t.instance({
                ident: "graticule",
                location: "graticule20.js"
            }),
            nouislider: i.instance({
                ident: "nouislider",
                location: "nouislider.v0805.js"
            }),
            airgram: t.instance({
                ident: "airgram",
                dependencies: ["detail-render"]
            }),
            "favs-extended": t.instance({
                ident: "favs-extended"
            }),
            "gl-particles": t.instance({
                ident: "gl-particles"
            }),
            gestures: i.instance({
                ident: "gestures"
            }),
            particles: t.instance({
                ident: "particles"
            }),
            "store-settings": t.instance({
                ident: "store-settings"
            }),
            "detail-render": t.instance({
                ident: "detail-render"
            }),
            "product-descriptions": t.instance({
                ident: "product-descriptions"
            }),
            patternator: t.instance({
                ident: "patternator"
            }),
            "cap-utils": t.instance({
                ident: "cap-utils"
            }),
            seo: t.instance({
                ident: "seo"
            }),
            nearest: t.instance({
                ident: "nearest"
            }),
            "plugin-data-loader": t.instance({
                ident: "plugin-data-loader"
            }),
            flatpickr: i.instance({
                ident: "flatpickr"
            }),
            isolines: n.instance({
                ident: "isolines",
                hasURL: !1
            }),
            dev: n.instance({
                ident: "dev",
                exclusive: "neverClose",
                className: "window",
                dependencies: ["plugin-data-loader"],
                keyboard: !0
            }),
            patch: i.instance({
                ident: "patch",
                location: "http://www.advaned-offline.map/v/patch.js?refTime=" + (new Date).toISOString().replace(/^(.*):.*$/, "$1"),
                hasURL: !1
            }),
            "radar-sat": i.instance({
                ident: "radar-sat",
                hasURL: !1
            }),
            radar: n.instance({
                ident: "radar",
                title: "RADAR",
                hasURL: !1,
                exclusive: "neverClose",
                className: "shy left-border right-border notap",
                dependencies: ["radar-sat"],
                noCloseOnBackButton: !0
            }),
            satellite: n.instance({
                ident: "satellite",
                title: "SATELLITE",
                hasURL: !1,
                exclusive: "neverClose",
                className: "shy left-border right-border notap",
                dependencies: ["radar-sat"],
                noCloseOnBackButton: !0
            }),
            "cap-alerts": n.instance({
                ident: "cap-alerts",
                exclusive: "neverClose",
                hasURL: !1,
                dependencies: ["cap-utils"],
                className: "shy left-border right-border bottom-border"
            }),
            "extreme-forecast": n.instance({
                ident: "extreme-forecast",
                exclusive: "neverClose",
                hasURL: !1,
                className: "shy left-border right-border bottom-border flex-container"
            }),
            "map-layers": n.instance({
                ident: "map-layers",
                exclusive: "neverClose",
                hasURL: !1,
                dependencies: e.isMobileOrTablet ? [] : ["rhpane"],
                className: "shy left-border bottom-border rounded-box bg-transparent fg-yellow"
            }),
            "share-mobile": n.instance({
                ident: "share-mobile",
                hasURL: !1
            }),
            lookr: n.instance({
                ident: "lookr",
                hasURL: !1,
                className: "plugin-mobile-fullscreen"
            }),
            overlays: n.instance({
                title: "S_ADD_OVERLAYS",
                ident: "overlays",
                className: "plugin-rhpane top-border plugin-mobile-rhpane",
                exclusive: "rhpane"
            }),
            "hp-weather": n.instance({
                ident: "hp-weather",
                hasURL: !1,
                replaceMountingPoint: !0,
                className: "weather-box clickable-size",
                attachPoint: '[data-plugin="weather"]'
            }),
            detail: n.instance({
                ident: "detail",
                keyboard: !0,
                dependencies: e.isMobileOrTablet ? ["detail-render", "nearest"] : ["rhpane", "detail-render", "nearest"],
                className: "detail plugin-mobile-bottom-red bottom-border",
                htmlID: "detail",
                replaceMountingPoint: !0,
                hasURL: !1,
                exclusive: "all",
                attachPoint: e.isMobileOrTablet ? '[data-plugin="detail-rhpane"]' : '[data-plugin="detail"]'
            }),
            "detail-webcams": n.instance({
                ident: "detail-webcams",
                hasURL: !1
            }),
            station: n.instance({
                ident: "station",
                exclusive: "all",
                dependencies: ["nearest"],
                className: "detail plugin-mobile-bottom-red bottom-border bg-white",
                hasURL: !0
            }),
            "nearest-stations": n.instance({
                ident: "nearest-stations",
                dependencies: ["nearest"],
                className: "drop-down-window left boxshadow",
                hasURL: !1,
                unmountOnClose: !0
            }),
            rhpane: i.instance({
                ident: "rhpane",
                className: "right-border top-border flex-container",
                htmlID: "detail-rhpane-wrapper",
                hasURL: !1,
                displayBlock: !1,
                exclusive: "neverClose",
                replaceMountingPoint: !0,
                attachPoint: '[data-plugin="detail-rhpane"]'
            }),
            user: n.instance({
                ident: "user",
                htmlID: "user",
                hasURL: !1,
                exclusive: "neverClose",
                dependencies: ["favs-extended"],
                attachPoint: '[data-plugin="user"]'
            }),
            "fav-alert-menu": n.instance({
                ident: "fav-alert-menu",
                className: "drop-down-window size-l",
                hasURL: !1,
                closeOnClick: !0,
                attachPoint: '[data-plugin="fav-alert-menu"]'
            }),
            contextmenu: n.instance({
                ident: "contextmenu",
                className: "drop-down-window",
                closeOnClick: !0,
                hasURL: !1
            }),
            pois: n.instance({
                ident: "pois",
                hasURL: !1
            }),
            menu: n.instance({
                ident: "menu",
                className: "plugin-rhpane top-border plugin-mobile-rhpane",
                exclusive: "rhpane-mobile",
                title: "MENU"
            }),
            picker: n.instance({
                ident: "picker",
                hasURL: !1,
                className: "picker"
            }),
            pickerx: n.instance({
                ident: "pickerx",
                hasURL: !1,
                className: "pickerx"
            }),
            waves: n.instance({
                ident: "waves",
                hasURL: !1
            }),
            wind: n.instance({
                ident: "wind",
                hasURL: !1
            }),
            "user-menu": n.instance({
                ident: "user-menu",
                className: "drop-down-window right menu-items",
                closeOnClick: !e.isMobile,
                unmountOnClose: !0,
                attachPoint: e.isMobileOrTablet ? ".lhpane-user-line" : "#user",
                hasURL: !1
            }),
            "promo-mobile-intro": n.instance({
                ident: "promo-mobile-intro",
                className: "fg-white rounded-box",
                hasURL: !1
            }),
            webcam: n.instance({
                ident: "webcam",
                hasURL: !1,
                className: "plugin-mobile-bottom-red bottom-border",
                keyboard: !1
            }),
            sounding: n.instance({
                ident: "sounding",
                className: e.isMobile ? "drop-down-window down" : "drop-down-window",
                dependencies: ["d3"],
                attachPoint: e.isMobile ? "#plugins" : "#map-container .leaflet-popup-pane",
                title: "SOUNDING",
                hasURL: !1
            }),
            map: n.instance({
                title: "SHOW_ON_MAP",
                ident: "map",
                hasURL: !0,
                className: "plugin-rhpane top-border plugin-mobile-rhpane",
                exclusive: "rhpane"
            }),
            screenshot: n.instance({
                ident: "screenshot",
                dependencies: ["upload"],
                hasURL: !0
            }),
            settings: n.instance({
                ident: "settings",
                langFile: "settings",
                hasURL: !0,
                title: "MENU_SETTINGS",
                exclusive: "lhpane",
                unmountOnClose: !0,
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                dependencies: e.isMobileOrTablet ? [] : ["favs", "tools"]
            }),
            tools: n.instance({
                ident: "tools",
                hasURL: !0,
                unmountOnClose: !0,
                title: "MENU",
                exclusive: "lhpane",
                className: "plugin-lhpane top-border",
                dependencies: e.isMobileOrTablet ? [] : ["favs", "settings"]
            }),
            favs: n.instance({
                ident: "favs",
                title: "MENU_FAVS",
                hasURL: !0,
                keyboard: !0,
                unmountOnClose: !0,
                exclusive: "lhpane",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                dependencies: e.isMobileOrTablet ? ["gestures", "favs-extended"] : ["gestures", "settings", "tools", "favs-extended"]
            }),
            alerts: s.instance({
                ident: "alerts",
                langFile: "alerts",
                exclusive: "lhpane",
                hasURL: !1,
                keyboard: !0,
                unmountOnClose: !0,
                title: "MY_ALERTS",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                dependencies: ["riot", "nouislider", "favs-extended"]
            }),
            colors: s.instance({
                ident: "colors",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                exclusive: "lhpane",
                hasURL: !0,
                unmountOnClose: !0,
                keyboard: !0,
                title: "S_COLORS",
                dependencies: ["riot", "colorpicker"]
            }),
            privacy: s.instance({
                ident: "privacy",
                exclusive: "lhpane",
                hasURL: !0,
                keyboard: !0,
                unmountOnClose: !0,
                title: "PRIVACY",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                dependencies: ["riot"]
            }),
            hurricanes: s.instance({
                ident: "hurricanes",
                exclusive: "lhpane",
                hasURL: !0,
                unmountOnClose: !0,
                title: "HURR_TRACKER",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                dependencies: ["riot"]
            }),
            debug: s.instance({
                ident: "debug",
                exclusive: "lhpane",
                hasURL: !0,
                unmountOnClose: !0,
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                dependencies: ["riot"]
            }),
         
            info: s.instance({
                ident: "info",
                dependencies: e.isMobileOrTablet ? ["riot", "product-descriptions"] : ["riot", "rhpane", "product-descriptions"],
                className: "drop-down-window down",
                closeOnClick: !e.isMobileOrTablet,
                hasURL: !1,
                unmountOnClose: !0,
                exclusive: "middle-mobile",
                attachPoint: e.isMobileOrTablet ? "#plugins" : "#info-icon"
            }),
            "cap-alert": s.instance({
                ident: "cap-alert",
                dependencies: ["riot", "cap-utils", "detail-render"],
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                exclusive: "lhpane",
                hasURL: !1,
                title: "WX_WARNINGS"
            }),
            distance: s.instance({
                ident: "distance",
                title: "MENU_DISTANCE",
                exclusive: "lhpane",
                keyboard: !1,
                hasURL: !0,
                className: "plugin-mobile-bottom-red bottom-border",
                dependencies: ["riot", "geodesic"]
            }),
            animate: s.instance({
                ident: "animate",
                exclusive: "all",
                keyboard: !0,
                title: "Create Animation"
            }),
            airport: n.instance({
                ident: "airport",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen",
                exclusive: "lhpane",
                hasURL: !1,
                dependencies: ["detail-render", "gestures"]
            }),
            tides: s.instance({
                ident: "tides",
                className: "plugin-rhpane top-border plugin-mobile-fullscreen",
                exclusive: "rhpane",
                dependencies: ["riot", "pois"]
            }),
            share: s.instance({
                ident: "share",
                title: "SHARE",
                hasURL: !1,
                keyboard: !0
            }),
            widgets: s.instance({
                ident: "widgets",
                exclusive: "all",
                langFile: "widgets",
                title: "EMBED",
                keyboard: !0,
                className: "plugin-rhpane top-border plugin-mobile-fullscreen"
            }),
            multimodel: s.instance({
                ident: "multimodel",
                dependencies: ["riot", "detail-render"],
                className: "plugin-mobile-fullscreen"
            }),
            login: s.instance({
                ident: "login",
                className: "plugin-rhpane top-border plugin-mobile-fullscreen",
                exclusive: "all",
                keyboard: !0
            }),
            register: s.instance({
                ident: "register",
                langFile: "register",
                className: "plugin-rhpane top-border plugin-mobile-fullscreen",
                exclusive: "all",
                keyboard: !0
            }),
            "article-publisher": n.instance({
                ident: "article-publisher",
                dependencies: ["flatpickr"],
                className: "plugin-rhpane top-border left-border",
                hasURL: !0,
                title: "Windy Article publisher",
                keyboard: !0
            }),
            rplanner: n.instance({
                ident: "rplanner",
                onurl: function() {
                    return {
                        url: "distance",
                        title: null
                    }
                },
                _unmount: function() {
                    this.node.parentNode.removeChild(this.node), this.isMounted = !1
                },
                exclusive: "all",
                dependencies: e.isMobileOrTablet ? ["geodesic"] : ["geodesic", "rhpane"],
                className: "detail plugin-mobile-bottom-red bottom-border bg-white",
                hasURL: !0,
                attachPoint: e.isMobileOrTablet ? '[data-plugin="detail-rhpane"]' : '[data-plugin="rplanner"]'
            }),
            uploader: n.instance({
                ident: "uploader",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen-no-header",
                dependencies: ["upload"],
                exclusive: "lhpane",
                hasURL: !0,
                title: "Upload KML, GPX or geoJSON file",
                keyboard: !0
            }),
            upload: n.instance({
                ident: "upload",
                hasURL: !1
            }),
            plugins: n.instance({
                ident: "plugins",
                className: "plugin-lhpane top-border plugin-mobile-fullscreen-no-header",
                dependencies: ["plugin-data-loader"],
                exclusive: "lhpane",
                hasURL: !0,
                title: "Install Windy plugin",
                keyboard: !0
            })
        }
    }), /*! */
    W.define("pluginsCtrl", ["rootScope", "plugins", "broadcast", "utils"], function(e, t, n, i) {
        function s(e, n) {
            i.each(t, function(t, i) {
                t.exclusive && t.exclusive === n && t.isOpen && i !== e && t.close()
            })
        }

        function a(n, a) {
            "rplanner" === n && e.isMobileOrTablet ? n = "distance" : "distance" !== n || e.isMobileOrTablet || (n = "rplanner");
            var o = t[n];
            o && (o.exclusive && ("all" === o.exclusive ? i.each(t, function(e, t) {
                e.isOpen && t !== n && r(t)
            }) : "rhpane" !== o.exclusive && "lhpane" !== o.exclusive || (t.detail.close(), t.rplanner.close(), t.station.close(), e.isMobile ? (s(n, "rhpane"), s(n, "lhpane")) : s(n, o.exclusive))), o.open(a))
        }

        function r(e, n) {
            var i = t[e];
            i && "neverClose" !== i.exclusive && i.close(n)
        }
        n.on("rqstOpen", a), n.on("rqstClose", r), n.on("closeAll", function() {
            i.each(t, function(e, t) {
                e.isOpen && r(t)
            })
        }), n.on("toggle", function(e, n) {
            var i = t[e];
            if (!i) return;
            i.isOpen ? r(e) : a(e, n)
        })
    }), /*! */
    W.define("Bar", ["$", "utils", "Drag", "GhostBox", "Resizable", "rootScope"], function(e, t, n, i, s, a) {
        return s.extend(n, i, {
            offset: 0,
            borderOffset: 0,
            jumpingGhost: !0,
            bcastLimit: 100,
            jumpingWidth: 140,
            _init: function() {
                this.left = 0, this.calendarHours = 0, this.timestamp = Date.now(), this.resizableEl = this.progressBar, this.el = this.timecode = e(".main-timecode", this.progressBar), this.text = e(".box", this.timecode), this.progressLine = e(".progress-line", this.progressBar), this.b = e(".progress-line i", this.progressBar), this.played = e(".progress-line .played", this.progressBar), this.ghost = e(".ghost-timecode", this.progressBar), this.ghostTxt = e(".box", this.ghost), n._init.call(this), s._init.call(this), a.isMobile || i._init.call(this), this.progressLine.addEventListener("mouseup", this.click.bind(this)), this.ondragend = this.bcast.bind(this), this.throttledBcast = t.throttle.call(this, this.bcast, this.bcastLimit)
            },
            ondrag: function(e) {
                this.update(e + 20 - this.offset), this.throttledBcast()
            },
            update: function(e) {
                return this.left = t.bound(e, 0, this.maxWidth), this.timecode.style.left = this.left + this.offset + "px", this.text.textContent = this.createText(this.text), this.played && (this.played.style.width = this.left + "px"), this.left
            },
            createText: function() {},
            createGhostText: function() {},
            bcast: function() {
                this.timestamp = this.pos2ts(this.left), this.onbcast()
            },
            onbcast: function() {},
            pos2ts: function(e) {
                return this.calendar.start + e / this.pxRatio
            },
            addAnimation: function() {
                this.progressBar.classList.add("anim-allowed")
            },
            removeAnimation: function() {
                var e = this;
                window.setTimeout(function() {
                    e.progressBar.classList.remove("anim-allowed")
                }, 300)
            },
            click: function(e) {
                if (!this.dragging) {
                    this.addAnimation();
                    var n = t.bound(e.pageX - this.offset - this.borderOffset, 0, this.maxWidth);
                    this.timestamp = this.pos2ts(n), this.update(n), this.bcast(), this.removeAnimation()
                }
            },
            set: function(e) {
                this.addAnimation(), this.timestamp = e, this.update(this.ts2pos(e)), this.removeAnimation()
            },
            ts2pos: function(e) {
                return (e - this.calendar.start) * this.pxRatio
            },
            onresize: function() {
                if (this.calendar) {
                    if (this.progressWidth = this.progressBar.offsetWidth - this.offset, this.pxRatio = this.progressWidth / (this.calendar.endOfCal - this.calendar.start), this.maxWidth = this.ts2pos(this.calendar.end), this.progressLine.style.width = t.bound(this.maxWidth, 0, this.progressWidth) + "px", this.borderOffset = this.elLeft, this.b) {
                        var e = this.ts2pos(Date.now());
                        this.b.style.left = e + "px"
                    }
                    this.set(this.timestamp)
                }
            },
            updateGhost: function(e) {
                var n = t.bound(e.clientX - this.offset - this.borderOffset, 0, this.maxWidth);
                this.ghost.style.left = n + this.offset + "px", this.jumpingGhost && (this.ghost.style["margin-top"] = this.left - n < 40 && n - this.left < this.jumpingWidth ? "-25px" : "0px"), this.ghostTxt.textContent = this.createGhostText(n)
            }
        })
    }), /*! */
    W.define("BindedCheckbox", ["store", "Class"], function(e, t) {
        return t.extend({
            onValue: !0,
            offValue: !1,
            _init: function() {
                this.set(e.get(this.bindStore)), this.el.onclick = this.toggle.bind(this), e.on(this.bindStore, this.set, this)
            },
            unmount: function() {
                e.off(this.bindStore, this.set, this)
            },
            toggle: function() {
                var t = e.get(this.bindStore);
                e.set(this.bindStore, t === this.onValue ? this.offValue : this.onValue)
            },
            set: function(e) {
                this.el.classList[e === this.onValue ? "remove" : "add"]("off")
            }
        })
    }), /*! */
    W.define("BindedSwitch", ["$", "store", "Switch"], function(e, t, n) {
        return n.extend({
            _init: function() {
                this.initValue = t.get(this.bindStore), t.on(this.bindStore, this.set, this), "function" == typeof this.render && t.on("usedLang", this.render, this), n._init.call(this)
            },
            unmount: function() {
                t.off(this.bindStore, this.set, this), "function" == typeof this.render && t.off("usedLang", this.render, this)
            },
            set: function(t) {
                var n = e(".selected", this.el),
                    i = this.getEl(t);
                n && n.classList.remove("selected"), i && i.classList.add("selected")
            },
            click: function(e, n) {
                "set" === e ? t.set(this.bindStore, n) : "function" == typeof this[e] && this[e](n)
            }
        })
    }), /*! */
    W.define("Drag", ["Class"], function(e) {
        return e.extend({
            supportTouch: !0,
            preventDefault: !0,
            passiveListener: !0,
            _init: function() {
                this.dragging = !1, this.bindedDrag = this._drag.bind(this), this.bindedEndDrag = this.endDrag.bind(this), this.bindedStart = this.startDrag.bind(this), this.el.addEventListener("mousedown", this.bindedStart), this.supportTouch && this.el.addEventListener("touchstart", this.bindedStart)
            },
            destroy: function() {
                this.el.removeEventListener("mousedown", this.bindedStart), this.supportTouch && this.el.removeEventListener("touchstart", this.bindedStart)
            },
            getXY: function(e) {
                return e.touches ? [e.touches[0].pageX, e.touches[0].pageY] : [e.pageX, e.pageY]
            },
            startDrag: function(e) {
                this.preventDefault && e.preventDefault(), this.startXY = this.getXY(e), this.offsetX = -this.el.offsetLeft, this.offsetY = -this.el.offsetTop, this.dragging = !0, this.ondragstart && this.ondragstart.call(this, this.startXY), window.addEventListener("mousemove", this.bindedDrag), window.addEventListener("mouseup", this.bindedEndDrag), this.supportTouch && (window.addEventListener("touchmove", this.bindedDrag, this.passiveListener ? void 0 : {
                    passive: !1
                }), window.addEventListener("touchend", this.bindedEndDrag), window.addEventListener("touchcancel", this.bindedEndDrag))
            },
            _drag: function(e) {
                var t = this.getXY(e);
                this.ondrag(t[0] - this.startXY[0] - this.offsetX, t[1] - this.startXY[1] - this.offsetY, e)
            },
            endDrag: function(e) {
                window.removeEventListener("mousemove", this.bindedDrag), window.removeEventListener("touchmove", this.bindedDrag, this.passiveListener ? void 0 : {
                    passive: !1
                }), window.removeEventListener("mouseup", this.bindedEndDrag), window.removeEventListener("touchend", this.bindedEndDrag), window.removeEventListener("touchcancel", this.bindedEndDrag), this.ondragend && this.ondragend(e), this.dragging = !1
            }
        })
    }), /*! */
    W.define("DraggableDiv", ["Class", "utils"], function(e, t) {
        return e.extend({
            _init: function() {
                this.scrollEl.addEventListener("mousedown", this.startDrag.bind(this))
            },
            getX: function(e) {
                return e.touches ? e.touches[0].pageX : e.pageX
            },
            startDrag: function(e) {
                var n = this;
                e.preventDefault();
                var i = this.getX(e),
                    s = 0,
                    a = Date.now(),
                    r = 0,
                    o = 0,
                    l = this.scrollEl.scrollLeft,
                    c = function() {
                        var e = Date.now(),
                            i = e - a,
                            r = n.scrollEl.scrollLeft,
                            o = 1e3 * (r - l) / (1 + i);
                        a = e, l = r, s = t.bound(.8 * o + .2 * s, -500, 500)
                    },
                    d = setInterval(c, 100);
                c(), window.cancelAnimationFrame(this.inertiaAnim);
                var u = function() {
                        clearInterval(d), window.removeEventListener("mousemove", f), window.removeEventListener("mouseup", u), Math.abs(s) > 10 && (r = .6 * s, o = n.scrollEl.scrollLeft + r, a = Date.now(), n.inertiaAnim = window.requestAnimationFrame(h)), e.preventDefault(), e.stopPropagation()
                    },
                    h = function() {
                        var e = Date.now() - a,
                            t = -r * Math.exp(-e / 325);
                        Math.abs(t) > .5 && e < 3e3 && (n.scrollEl.scrollLeft = o + t, n.inertiaAnim = window.requestAnimationFrame(h))
                    },
                    f = function(e) {
                        var t = n.getX(e);
                        n.scrollEl.scrollLeft += i - t, i = t, e.preventDefault(), e.stopPropagation()
                    };
                window.addEventListener("mousemove", f), window.addEventListener("mouseup", u)
            }
        })
    }), /*! */
    W.define("ClickHandler", ["Class", "broadcast"], function(e, t) {
        return e.extend({
            _init: function() {
                this.el.addEventListener("click", this.onevent.bind(this))
            },
            onevent: function(e) {
                var t, n = e.target;
                for (this.stopPropagation && (e.preventDefault(), e.stopPropagation()); n && n !== this.el;) {
                    if (n && n.dataset && (t = n.dataset.do)) {
                        var i = t.split(",");
                        return void(this.defaultClickHandlers(e, i) || this.click.apply(this, i))
                    }
                    n = n.parentNode
                }
            },
            defaultClickHandlers: function(e, n) {
                switch (n[0]) {
                    case "rqstOpen":
                    case "toggle":
                    case "rqstClose":
                        return t.emit.apply(t, n), e.stopPropagation(), !0;
                    case "url":
                        return n.shift(), window.location.href = n.join(","), e.stopPropagation(), !0;
                    case "share":
                        return t.emit("rqstOpen", "share"), !0;
                    case "login":
                        return W.user.login(), !0
                }
                return !1
            }
        })
    }), /*! */
    W.define("GhostBox", ["Class"], function(e) {
        return e.extend({
            _init: function() {
                this.progressLine.addEventListener("mouseenter", this.onGhostMouseEnter.bind(this)), this.progressLine.addEventListener("mouseleave", this.onGhostMouseLeave.bind(this)), this.progressLine.addEventListener("mousemove", this.onGhostMouseMove.bind(this))
            },
            onGhostMouseEnter: function() {
                this.dragging || (this.ghost.style.opacity = 1)
            },
            onGhostMouseLeave: function() {
                this.ghost.style.opacity = 0
            },
            onGhostMouseMove: function(e) {
                this.dragging ? this.ghost.style.opacity = 0 : this.updateGhost(e)
            }
        })
    }), /*! */
    W.define("OverlaysMenu", ["overlays", "store", "trans", "rootScope", "utils", "BindedSwitch", "format"], function(e, t, n, i, s, a, r) {
        return a.extend({
            bindStore: "overlay",
            _init: function() {
                a._init.call(this), t.on("favOverlays", this.render, this), t.on("expertMode", this.render, this)
            },
            render: function() {
                this._render(), this.resize(), this.set(t.get("overlay"))
            },
            resize: function() {},
            set: function(e) {
                this.unfold(e), a.set.call(this, e)
            },
            unfold: function(t) {
                for (var n = e[t], i = n && n.parentMenu || t, a = this.el.querySelectorAll("[data-parent]"), r = 0; r < a.length; r++) {
                    var o = a[r];
                    s.toggleClass(o, o.dataset.parent === i, "menu-unfold")
                }
            },
            _render: function() {
                var a = t.get("favOverlays"),
                    o = t.get("expertMode"),
                    l = t.get("usedLang"),
                    c = {},
                    d = r.seoLang(l),
                    u = {},
                    h = 1,
                    f = 0;
                o || s.each(e, function(t, n) {
                    var i = t.virtual,
                        s = t.parentMenu;
                    i || !s || !a.includes(n) || !e[s].virtual || s in u || (u[s] = !0)
                });
                var m = i.overlays.map(function(t) {
                    var n = e[t],
                        s = n.allwaysOn,
                        l = n.icon,
                        f = n.trans,
                        m = n.parentMenu,
                        p = n.virtual,
                        g = t in u,
                        v = a.includes(t) || s || g;
                    if (!n || !f || !l || !v || o && p) return "";
                    var y = m && (a.includes(m) || u[m]);
                    m ? m in c ? c[m]++ : c[m] = 1 : h++;
                    var w = n.getName();
                    return '<a data-do="' + (p ? "unfold" : "set") + "," + t + '" data-parent="' + (m || "isParent") + '"\n\t\t\t\t\t\t' + (i.isCrawler ? 'href="' + d + "-" + r.seoString(w) + "-" + t + '"' : "") + "\n\t\t\t\t\t\t" + (!o && m && y ? 'class="sub-menu"' : "") + '>\n\t\t\t\t\t\t<div class="iconfont noselect notap">' + l + '</div>\n\t\t\t\t\t\t<div class="menu-text noselect notap">' + w + "</div>\n\t\t\t\t\t</a>"
                }).join("");
                for (var p in m += '<a style="display:none" data-do="toggle,overlays" id="ovr-menu"\n\t\t\t\t\t' + (i.isCrawler ? 'href="' + d + "-" + r.seoString(n.S_ADD_OVERLAYS) + '/overlays"' : "") + '\n\t\t\t\t\tclass="menu-unfold">\n\t\t\t\t\t\t<div class="iconfont noselect notap">&lt;</div>\n\t\t\t\t\t\t<div class="menu-text noselect notap">' + n.MORE_LAYERS + "</div>\n\t\t\t\t\t</a>", c) f = Math.max(f, c[p]);
                this.iconNum = o ? 1 + a.length : h + f, this.el.innerHTML = m
            }
        })
    }), /*! */
    W.define("ProductSwitch", ["BindedSwitch", "products", "store", "rootScope", "utils"], function(e, t, n, i, s) {
        return e.extend({
            bindStore: "product",
            showResolution: !0,
            menu: ["arome", "nems", "iconEu", "namConus", "namHawaii", "namAlaska", "ecmwf", "ecmwfWaves", "gfs", "gfsWaves", "cams", "camsEu"],
            _init: function() {
                e._init.call(this), n.on("availProducts", this.redraw, this), n.on("visibleProducts", this.redraw, this), this.redraw()
            },
            redraw: function() {
                var e = this,
                    s = n.get("availProducts"),
                    a = n.get("visibleProducts"),
                    r = n.get("product"),
                    o = i.seaProducts.includes(r),
                    l = i.camsProducts.includes(r);
                this.el.innerHTML = this.menu.map(function(n) {
                    var r = i.seaProducts.includes(n),
                        c = i.camsProducts.includes(n),
                        d = t[n];
                    return a.includes(n) && o === r && l === c ? '<div data-do="set,' + n + '"' + (s.includes(n) ? "" : 'class="disabled"') + ">" + d.modelName + (e.showResolution && d.modelResolution ? "<small>" + d.modelResolution + "km</small>" : "") + "</div>" : ""
                }).join(""), this.set(r)
            }
        })
    }), /*! */
    W.define("Resizable", ["utils", "broadcast", "Class"], function(e, t, n) {
        return n.extend({
            resizableEl: null,
            _init: function() {
                window.addEventListener("resize", e.debounce(this.resize.bind(this), 300)), t.on("pluginOpened", this.uiChanged, this), t.on("pluginClosed", this.uiChanged, this), t.on("detailRendered", this.resize, this), t.on("uiChanged", this.uiChanged, this), this.rects = {
                    left: -1
                }, this.resize()
            },
            uiChanged: function() {
                setTimeout(this.resize.bind(this), 200), setTimeout(this.resize.bind(this), 500), setTimeout(this.resize.bind(this), 1500)
            },
            resize: function() {
                var t = this.resizableEl.getBoundingClientRect();
                e.compare(t, this.rects, ["left", "right", "top", "bottom"]) || (this.height = Math.max(1, t.height), this.width = Math.max(1, t.width), this.rects = t, this.elTop = t.top, this.elBottom = t.bottom, this.elLeft = t.left, this.elRight = t.right, this.onresize(this.rects))
            },
            onresize: function() {}
        })
    }), /*! */
    W.define("Scrollable", ["Class", "utils"], function(e, t) {
        return e.extend({
            _init: function() {
                this.scrollTicking = !1, this.scrollEndTimer = 0, this.scrollEl.addEventListener("scroll", this.scrollFired.bind(this))
            },
            scrollFired: function(e) {
                this.scrollTicking || (window.requestAnimationFrame(this.onscroll.bind(this, e)), clearTimeout(this.scrollEndTimer), this.scrollEndTimer = setTimeout(this.onscrollend.bind(this), 100), this.scrollTicking = !0)
            },
            scrollTo: function(e) {
                var n = this,
                    i = this.scrollEl.scrollLeft,
                    s = Date.now(),
                    a = e - i,
                    r = s + Math.max(500, 1.2 * Math.abs(a)),
                    o = function() {
                        var e = Date.now();
                        n.scrollEl.scrollLeft = t.smoothstep(s, r, e) * a + i, e < r && window.requestAnimationFrame(o)
                    };
                o()
            },
            onscroll: function() {},
            onscrollend: function() {}
        })
    }), /*! */
    W.define("Swipe", ["Class"], function(e) {
        return e.extend({
            _swipeTresholdX: 50,
            _swipeTresholdY: 50,
            _init: function() {
                this.xDown = null, this.yDown = null, this.el.addEventListener("touchstart", this.touchStart.bind(this)), this.el.addEventListener("touchmove", this.touchMove.bind(this)), this.el.addEventListener("touchend", this.touchEnd.bind(this))
            },
            touchStart: function(e) {
                this.xFinal = this.xDown = e.touches[0].clientX, this.yFinal = this.yDown = e.touches[0].clientY
            },
            touchMove: function(e) {
                this.xFinal = e.touches[0].clientX, this.yFinal = e.touches[0].clientY
            },
            touchEnd: function(e) {
                var t = this.xDown - this.xFinal,
                    n = this.yDown - this.yFinal;
                Math.abs(t) > Math.abs(n) && Math.abs(t) > this._swipeTresholdX && Math.abs(n / t) < .2 ? this.onswipe(t > 0 ? "left" : "right", t, e) : Math.abs(n) > this._swipeTresholdY && Math.abs(t / n) < .2 && this.onswipe(n > 0 ? "up" : "down", n, e)
            },
            onswipe: function(e, t, n) {}
        })
    }), /*! */
    W.define("Switch", ["$", "ClickHandler"], function(e, t) {
        return t.extend({
            el: null,
            initValue: null,
            stopPropagation: !0,
            _init: function() {
                var e;
                this.el && this.initValue && (e = this.getEl(this.initValue)) && e.classList.add("selected"), this.selected = this.initValue, t._init.call(this)
            },
            getEl: function(t) {
                return e('*[data-do="set,' + t + '"]', this.el)
            },
            set: function(e, t) {
                this.click("set", e, t)
            },
            click: function(t, n, i) {
                if ("set" === t) {
                    var s = e(".selected", this.el),
                        a = this.getEl(n);
                    s && s.classList.remove("selected"), a && a.classList.add("selected"), i || n !== this.selected && this.onset(n), this.selected = n
                } else "function" == typeof this[t] && this[t](n)
            },
            onset: function() {}
        })
    }), /*! */
    W.define("Webcams", ["store", "map", "trans", "http", "format", "ClickHandler", "broadcast"], function(e, t, n, i, s, a, r) {
        return a.extend({
            maxAmount: 5,
            imgRatio: 400 / 224,
            data: [],
            useHover: !0,
            addListeners: function() {
                return this.hasListener || (e.on("webcamsDaylight", this.render, this), this.hasListener = !0), this
            },
            removeListeners: function() {
                this.hasListener && (e.off("webcamsDaylight", this.render, this), this.hasListener = !1), this.removeMarker()
            },
            load: function(e) {
                var t = this;
                return this.removeMarker(), new Promise(function(n) {
                    i.get("/node/webcams2/" + e.lat + "/" + e.lon, {
                        cache: !e.forceReload
                    }).then(function(e) {
                        var i = e.data;
                        t.daylight = !1, i.length > 0 ? (t.data = i.slice(0, t.maxAmount), t.render()) : (t.data = [], t.el && (t.el.innerHTML = "")), n(t.data)
                    })
                })
            },
            index2location: function(e) {
                return [this.data[e].location.latitude, this.data[e].location.longitude]
            },
            addMarker: function(e) {
                this.marker ? this.marker.setLatLng(this.index2location(e)) : this.marker = L.marker(this.index2location(e), {
                    icon: t.myMarkers.webcamIcon,
                    zIndexOffset: 1e3
                }).addTo(t)
            },
            removeMarker: function() {
                this.marker && (t.removeLayer(this.marker), this.marker = null)
            },
            render: function() {
                var t = this;
                if (this.data && this.data.length) {
                    var i = e.get("webcamsDaylight");
                    this.el.innerHTML = this.data.map(function(e, t) {
                        var a = e.distance,
                            r = e.image,
                            o = e.title,
                            l = i ? n.D_DAYLIGHT : s.howOld({
                                ux: +r.update,
                                translate: !0
                            }),
                            c = a > 0 ? ", " + n.D_DISTANCE + " " + a.toFixed(1) + " km, " + ((.62 * a).toFixed(1) + n.D_MILES) : "";
                        return '<div class="webcam" data-do="webcam,' + t + '" data-webcam="' + t + '"\n\t\t\tstyle="background-image: url( img/ajax-loader.gif );">\n\t\t\t<div class="iconfont" data-do="lookr,' + t + '" data-tooltip="' + n.D_WEBCAMS_24 + '">&#xe041;</div>\n\t\t\t<div class="wbcm-name noselect">' + o + '</div>\n\t\t\t<small class="noselect fresh-title ' + s.obsoleteClass(+r.update) + '">' + l + c + "</small>\n\t\t\t</div>"
                    }).join(""), this.useHover && this.el.querySelectorAll("div[data-webcam]").forEach(function(e) {
                        e.onmouseover = t.addMarker.bind(t, +e.dataset.webcam), e.onmouseout = t.removeMarker.bind(t)
                    })
                }
            },
            forEach: function(e) {
                for (var t = this.el.querySelectorAll(".webcam"), n = 0; n < t.length; n++) e(t[n], n)
            },
            setWH: function(e, t) {
                this.forEach(function(n) {
                    n.style.width = e + "px", n.style.height = t + "px"
                })
            },
            loadImages: function() {
                var t = this,
                    n = e.get("webcamsDaylight");
                this.forEach(function(e, i) {
                    var s = t.data[i].image[n ? "daylight" : "current"].preview;
                    e.style["background-image"] = "url(" + s + "), url( img/ajax-loader.gif )", e.classList.add("loaded")
                })
            },
            click: function(e, t) {
                "lookr" === e && r.emit("rqstOpen", "lookr", this.data[t])
            }
        })
    }), /*! */
    W.define("BindedBar", ["store", "Bar", "format"], function(e, t, n) {
        return t.extend({
            displayHour: n.getHoursFunction(),
            zuluMode: e.get("zuluMode"),
            _init: function() {
                t._init.call(this), e.on("usedLang", this.render, this), e.on("hourFormat", this.render, this), e.on("zuluMode", this.render, this), e.on(this.bindTimestamp, this.ontstamp, this), e.on(this.bindCalendar, this.setCal, this), this.ondragstart = this.stopAnim, this.setCal(e.get(this.bindCalendar)), this.set(e.get(this.bindTimestamp))
            },
            render: function() {
                this.zuluMode = e.get("zuluMode"), delete this.text.dataset.zulu, this.displayHour = n.getHoursFunction(), this.text.textContent = this.createText(this.text)
            },
            ontstamp: function(e, t) {
                this.UIident !== t && this.set(e)
            },
            onbcast: function() {
                e.set(this.bindTimestamp, this.timestamp, {
                    UIident: this.UIident
                })
            },
            stopAnim: function() {
                this.bindAnimation && e.set(this.bindAnimation, !1)
            },
            click: function(e) {
                this.stopAnim(), t.click.call(this, e)
            },
            setCal: function(e) {
                e && (this.numberOfHours = e.calendarHours, this.calendar = e, this.onresize())
            },
            createText: function() {},
            createGhostText: function() {}
        })
    }), /*! */
    W.define("Window", ["$", "trans", "Class", "broadcast"], function(e, t, n, i) {
        return n.extend({
            iAm: "window",
            domEl: null,
            attachPoint: "#plugins",
            keyboard: !1,
            hasURL: !1,
            closeOnClick: !1,
            replaceMountingPoint: !1,
            displayBlock: !0,
            timeout: null,
            _init: function() {
                this.isOpen = !1, this.closingTimer = null, this.timeoutTimer = null, this.bindedClose = this.close.bind(this), this.bodyClass = "on" + this.iAm + "-" + this.ident
            },
            removeHooks: function() {
                this.closeOnClick && (document.removeEventListener("mousedown", this.bindedClose, !0), document.removeEventListener("touchstart", this.bindedClose, !0)), this.keyboard && this.node.removeEventListener("keydown", this.keyCatcher)
            },
            addHooks: function() {
                this.closeOnClick && (document.addEventListener("mousedown", this.bindedClose, !0), document.addEventListener("touchstart", this.bindedClose, !0)), this.keyboard && this.node.addEventListener("keydown", this.keyCatcher)
            },
            close: function(e) {
                var t = this;
                this.isOpen && (this.isOpen = !1, document.body.classList.remove(this.bodyClass), this.node.classList.remove("open"), this.closingTimer = setTimeout(function() {
                    t._unmount(), i.emit("pluginClosed", t.ident)
                }, 500), "function" == typeof this.onclose && this.onclose(e), this.removeHooks(), this.hasURL && W.location.reset(), !this.closeOnClick && e && e.stopPropagation && e.stopPropagation())
            },
            keyCatcher: function(e) {
                e.stopPropagation()
            },
            createNode: function(t) {
                this.node = this.el = this.element = document.createElement("div"), this.node.id = this.htmlID || this.iAm + "-" + this.ident, this.className && (this.node.className = this.className), this.node.innerHTML = '<div class="closing-x"></div>' + t;
                var n = this.domEl || e(this.attachPoint);
                this.replaceMountingPoint ? n.parentElement.replaceChild(this.node, n) : n.appendChild(this.node), e(".closing-x", this.node).onclick = this.bindedClose
            },
            setContent: function(t) {
                if (!this.node) return this.createNode(t);
                this.node.innerHTML = '<div class="closing-x"></div>' + t, e(".closing-x", this.node).onclick = this.bindedClose
            },
            open: function(e) {
                return this.closingTimer && clearTimeout(this.closingTimer), this.timeoutTimer && clearTimeout(this.timeoutTimer), this.isOpen || (this._mount(), this._open(e)), this
            },
            attachRefs: function() {
                this.refs = {};
                for (var e = this.node.querySelectorAll("[data-ref]"), t = 0, n = e.length; t < n; t++) {
                    var i = e[t];
                    this.refs[i.dataset.ref] = i
                }
            },
            _mount: function() {
                this.createNode(this.html), t.translateDocument(this.node), this.attachRefs()
            },
            _unmount: function() {
                this.node.parentNode.removeChild(this.node)
            },
            _open: function(e) {
                var t = this;
                this.isOpen || (document.body.classList.add(this.bodyClass), this.displayBlock && (this.node.style.display = "block"), this.addHooks(), setTimeout(function() {
                    t.node.classList.add("open"), i.emit("pluginOpened", t.ident)
                }, 50), this.isOpen = !0, this.timeout && (this.timeoutTimer = setTimeout(this.close.bind(this), this.timeout))), this.onopen(e), this.hasURL && this.url(e)
            },
            url: function(e) {
                var t = W.location,
                    n = this.onurl(e);
                t.url(n.url), n.title && t.title(n.title)
            },
            onurl: function() {
                return {
                    url: this.ident,
                    title: t[this.title] || this.title || null
                }
            },
            onopen: function() {},
            onclose: function() {}
        })
    }), /*! */
    W.define("DropDown", ["Switch", "$"], function(e, t) {
        return e.extend({
            _init: function() {
                e._init.call(this), this.opened = !1, this.switch = t("ul", this.el), this.el.addEventListener("click", this.toggle.bind(this)), this.bindedClose = this.close.bind(this), this.fill()
            },
            fill: function() {
                var e = this.getEl(this.selected);
                e && (this.el.dataset.content = e.textContent)
            },
            set: function(t, n) {
                e.set.call(this, t, n), this.fill()
            },
            toggle: function() {
                this.opened ? (this.fill(), this.close()) : this.open()
            },
            open: function() {
                this.switch.classList.add("show"), this.el.classList.add("opened"), this.opened = !0
            },
            close: function() {
                this.switch.classList.remove("show"), this.el.classList.remove("opened"), this.opened = !1
            }
        })
    }), /*! */
    W.define("BindedDropDown", ["BindedSwitch", "DropDown", "store"], function(e, t, n) {
        return t.extend(e, {
            _init: function() {
                this.initValue = n.get(this.bindStore), n.on(this.bindStore, this.set, this), "function" == typeof this.render && n.on("usedLang", this.render, this), t._init.call(this)
            },
            set: function(t) {
                e.set.call(this, t), this.selected = t, this.fill()
            }
        })
    }), /*! */
    W.define("TimestampBar", ["BindedBar", "format", "trans"], function(e, t, n) {
        return e.extend({
            bindTimestamp: "timestamp",
            bindCalendar: "calendar",
            bindAnimation: "animation",
            createText: function(e) {
                var i = Math.floor(this.numberOfHours * this.left / (24 * this.progressWidth)),
                    s = this.calendar.days[i],
                    a = s ? "" + n[this.zuluMode ? s.display : s.displayLong] + (s.day && " " + s.day) + " - " : "";
                return this.zuluMode && (e.dataset.zulu = t.hourUTC(this.timestamp)), "" + a + this.displayHour(Math.round(this.numberOfHours * this.left / this.progressWidth) % 24)
            },
            createGhostText: function(e) {
                var t = parseInt(e / this.progressWidth * this.numberOfHours) % 24;
                return this.displayHour(t)
            }
        })
    }), /*! */
    W.define("location", ["trans", "store", "$", "utils", "broadcast", "rootScope", "router", "picker", "overlays", "format", "plugins"], function(e, t, n, i, s, a, r, o, l, c, d) {
        var u, h = c.seoString,
            f = c.seoLang,
            m = r.url,
            p = Date.now(),
            g = "نیروی هوایی ارتش جمهوری اسلامی ایران: " + e.TITLE,
            v = n('meta[name="description"]') || {},
            y = v && v.content,
            w = !1,
            b = n('link[rel="canonical"]'),
            T = null,
            L = null;
        "/" === m && (m = "");
        var S = function(e) {
                return W.models && W.models.layer2product[e].length > 1
            },
            A = function(e) {
                return e + (u ? "?" + u : "")
            },
            E = function(e) {
                return b.href = i.joinPath("http://www.advaned-offline.map", e)
            },
            C = i.emptyFun;
        a.isCrawler ? d.seo.load().then(function() {
            L = W.require("seo"), C = L.showURL
        }) : window.history && window.history.replaceState && (C = i.debounce(function() {
            try {
                var e = M();
                window.history.replaceState({
                    url: m,
                    search: u
                }, "", A(e)), E(e)
            } catch (e) {}
        }, 200));
        var M = function() {
                if ("" === m) {
                    var e = t.get("overlay");
                    return "wind" !== e && T ? x() + "-" + e : ""
                }
                return /overlays|settings|privacy|tools|widgets|favs|hurricanes/.test(m) && T ? i.joinPath(x(), m) : m
            },
            x = function() {
                return f(t.get("usedLang")) + "-" + h(T)
            },
            _ = i.debounce(function() {
                if (!P) return;
                var e, n = a.map,
                    s = [i.normalizeLatLon(n.lat), i.normalizeLatLon(n.lon), n.zoom],
                    r = t.get("timestamp");
                "accumulations" === P.product && "next24h" !== P.acTime ? s.unshift(P.acTime) : P.path && Math.abs(p - r) > 65e6 && s.unshift(P.path.replace(/\//g, "-"));
                "wind" !== P.overlay && s.unshift(P.overlay);
                "surface" !== P.level && s.unshift(P.level);
                !/^ecmwf/.test(P.product) && S(P.overlay) && s.unshift(P.product);
                "off" !== (e = t.get("isolines")) && s.push("i:" + e);
                a.picker && s.push("m:" + i.latLon2str(a.picker));
                a.customAnimation && s.push(a.customAnimation);
                u = s.join(","), C()
            }, 300),
            P = null;

        function D() {
            if (!w) {
                var e = t.get("overlay"),
                    n = l[e].getName();
                "wind" === e ? (T = null, document.title = g) : (T = n, document.title = "Windy: " + n)
            }
        }
        return s.on("paramsChanged", function(e) {
            P = e, _()
        }), s.on("mapChanged", _), s.on("detailRendered", _), o.on("pickerOpened", _), o.on("pickerMoved", _), o.on("pickerClosed", _), t.on("particlesAnim", _), t.on("overlay", D), t.on("usedLang", D), {
            description: function(e) {
                return v.content = e
            },
            setCanonical: E,
            getFrag: A,
            titleWithLang: x,
            getPath: function() {
                return m
            },
            getTitle: function() {
                return T
            },
            getSearch: function() {
                return u
            },
            getURL: function() {
                return "http://www.advaned-offline.map/" + A()
            },
            deleteSearch: function() {
                return u = null
            },
            url: function(e) {
                m = e, C()
            },
            title: function(e) {
                T = e, document.title = "Windy: " + e, w = !0
            },
            reset: function() {
                w = !1, v && (v.content = y), m = "", D(), C()
            }
        }
    }), /*! */
    W.define("components", ["radar", "products", "trans", "store", "query", "$", "utils", "rootScope", "broadcast", "overlays", "Class", "ClickHandler", "BindedSwitch", "BindedCheckbox", "TimestampBar"], function(e, t, n, i, s, a, r, o, l, c, d, u, h, f, m) {
        var p;
        h.instance({
            el: a("#accumulations .ui-switch"),
            bindStore: "acTime",
            _init: function() {
                h._init.call(this), i.on("availAcTimes", this.render, this)
            },
            render: function() {
                var e = i.get("availAcTimes");
                this.el.innerHTML = e.map(function(e) {
                    var t = /next(\d+)(h|d)/.exec(e);
                    return '<div data-do="set,' + e + '">' + r.template("h" === t[2] ? n.ACC_NEXT_HOURS : n.ACC_NEXT_DAYS, {
                        num: t[1]
                    }) + "</div>"
                }).join(""), this.set(i.get("acTime"))
            }
        }), f.instance({
            el: o.isMobile ? a("#playpause-mobile") : a("#playpause"),
            bindStore: "animation"
        }), o.isMobile || m.instance({
            progressBar: a("#progress-bar"),
            offset: 45,
            borderOffset: 10,
            UIident: "main"
        }), o.isMobileOrTablet ? (d.instance({
            el: a("#legend-mobile"),
            _init: function() {
                i.on("overlay", this.render, this), l.on("metricChanged", this.render, this), this.render()
            },
            render: function() {
                var e = i.get("overlay");
                c[e].paintLegend(this.el)
            }
        }), d.instance({
            el: a("#mobile-ovr-info"),
            _init: function() {
                this.debouncedRedraw = r.debounce(this.render.bind(this), 50), i.on("usedLang", this.render, this), i.on("level", this.debouncedRedraw), i.on("overlay", this.debouncedRedraw), i.on("product", this.debouncedRedraw), e.on("providerChanged", this.render, this), this.render()
            },
            render: function() {
                var e = i.get("overlay"),
                    n = c[e],
                    s = t[i.get("product")],
                    a = i.get("level"),
                    r = [];
                n.hasMoreLevels && "surface" !== a && r.push(o.levelsData[a][0].replace(/Pa/, "")), !/ecmwf/.test(s.ident) && s.modelName && s.modelName.length && r.push(s.modelName);
                var l = '<span class="uiyellow"\n\t\t\t\t' + (r.length ? 'data-notes="' + r.join(" ") + '"' : "") + "\n\t\t\t\t>" + n.getName() + "</span>";
                l != this.lastString && (this.el.innerHTML = l, this.el.dataset.icon = n.icon, this.lastString = l)
            }
        }), p = u.instance({
            el: a("#mm-radar"),
            nameEl: a("#mm-radar nav"),
            timer: null,
            _init: function() {
                h.instance({
                    el: this.nameEl,
                    bindStore: "overlay"
                }), u._init.call(this)
            },
            click: function() {
                this.scheduleClose.call(this, 1500)
            },
            scheduleClose: function(e) {
                this.timer && clearTimeout(this.timer), this.timer = setTimeout(this.close.bind(this), e)
            },
            open: function() {
                var e = this;
                this.nameEl.style.display = "block", setTimeout(function() {
                    return e.nameEl.style.opacity = "1"
                }, 50), this.scheduleClose(3e3)
            },
            close: function() {
                var e = this;
                this.nameEl.style.opacity = "0", setTimeout(function() {
                    return e.nameEl.style.display = "none"
                }, 200)
            }
        })) : l.once("dependenciesResolved", l.emit.bind(l, "rqstOpen", "rhpane")), u.instance({
            el: document.body,
            click: function(e) {
                switch (e) {
                    case "openapp":
                        window.location.href = "ios" === o.platform ? "https://apps.apple.com/app/apple-store/id1161387262?pt=118417623&ct=webapp&mt=8" : "https://play.google.com/store/apps/details?id=com.windyty.android&utm_source=menu&utm_medium=windy&utm_campaign=openAppLink&utm_content=openAppLink";
                        break;
                    case "title":
                        l.emit("back2home");
                        break;
                    case "search":
                        l.emit("closeAll"), s.set(""), l.emit("focusRqstd");
                        break;
                    case "openRadarSat":
                        p.open.call(p);
                        break;
                    case "hamburgerMenu":
                        l.emit("rqstOpen", i.get("lhpaneSwitch"));
                        break;
                    default:
                        l.emit(e)
                }
            }
        })
    }), /*! */
    W.define("keyboard", ["utils", "products", "overlays", "broadcast", "store", "rootScope"], function(e, t, n, i, s, a) {
        document.body.addEventListener("keydown", function(t) {
            var n, c = t.keyCode,
                d = !1;
            if (37 !== c && 39 !== c || !(n = r()))
                if (38 === c || 40 === c) {
                    for (var u = s.get("favOverlays"), h = s.get("overlay"), f = a.overlays.indexOf(h), m = a.overlays.length; f >= 0 && f < m;)
                        if (f += 38 === c ? -1 : 1, u.includes(a.overlays[f])) return void s.set("overlay", a.overlays[f]);
                    d = !0
                } else if (33 !== c && 34 !== c || !l()) 9 === c || 70 === c ? (i.emit("closeAll"), i.emit("focusRqstd"), d = !0) : 187 === c ? (i.emit("zoomIn"), d = !0) : 189 === c && (i.emit("zoomOut"), d = !0);
            else {
                var p = s.get("availLevels"),
                    g = p.indexOf(s.get("level"));
                g > -1 && (g = e.bound(g + (33 === c ? 1 : -1), 0, p.length), s.set("level", p[g])), d = !0
            } else {
                var v = 39 === c;
                n.moveTs.call(n, v, o()), d = !0
            }
            d && event.preventDefault()
        });
        var r = function() {
                var e = t[s.get("product")];
                return "calendar" in e ? e : null
            },
            o = function() {
                return n[s.get("overlay")].isAccu
            },
            l = function() {
                return /wind|rh|temp/.test(s.get("overlay"))
            }
    }), /*! */
    W.define("calendarUI", ["$", "utils", "rootScope", "trans", "store", "format", "Scrollable"], function(e, t, n, i, s, a, r) {
        n.isMobile && r.instance({
            scrollEl: e("#days"),
            box: e("#mobile_box"),
            nowBar: e("#now-bar"),
            hoursHtml: "",
            scrolling: !1,
            noAnimation: !1,
            scrollTimer: null,
            ticking: !1,
            tsPx: 3 * t.tsHour / 20,
            UIident: "botomCal",
            _init: function() {
                r._init.call(this), s.on("timestamp", this.set, this), s.on("hourFormat", this.render, this), s.on("calendar", this.render, this), s.on("usedLang", this.render, this), s.on("zuluMode", this.render, this), window.addEventListener("resize", setTimeout.bind(null, this.render.bind(this), 500)), setInterval(this.render.bind(this), t.tsHour), this.render(), this.set(s.get("timestamp"))
            },
            render: function() {
                var n = this;
                if (this.calendar = s.get("calendar"), this.zuluMode = s.get("zuluMode"), this.localeHours = a.getHoursFunction(), this.timestamp = 0, this.calendar) {
                    for (var r = this.calendar.days.filter(function(e) {
                            return e.start < n.calendar.end
                        }), o = "<b></b>", l = s.is12hFormat(), c = "", d = 1; d < 24; d += 3) {
                        var u = l ? (d + 11) % 12 + 1 : d;
                        c += "<li>" + t.pad(u) + "</li>"
                    }
                    for (var h = 0; h < r.length; h++) {
                        var f = r[h];
                        o += "<div>&nbsp;&nbsp;" + i[f.displayLong] + "&nbsp;" + f.day + "<ul>" + c + "</ul></div>"
                    }
                    this.scrollEl.innerHTML = o;
                    var m = s.get("timestamp");
                    delete this.box.dataset.zulu, this.set(m), this.renderBox(), e("b", this.scrollEl).style.left = window.innerWidth / 2 + (Date.now() - this.calendar.start) / this.tsPx + "px"
                }
            },
            slideUp: function() {
                this.scrolling || this.noAnimation || (this.scrolling = !0, document.body.classList.add("mobile-scroll")), this.noAnimation && (this.scrolling = !0, this.noAnimation = !1)
            },
            onscroll: function(e) {
                this.slideUp(), this.timestamp = this.tsPx * e.target.scrollLeft + this.calendar.start, this.renderBox(), this.scrollTicking = !1
            },
            renderBox: function() {
                this.zuluMode && (this.box.dataset.zulu = a.hourUTC(this.timestamp)), this.box.textContent = this.localeHours(new Date(this.timestamp).getHours())
            },
            onscrollend: function() {
                this.scrolling = !1, this.scrollTimer = null;
                var e = t.bound(this.timestamp, this.calendar.start, this.calendar.end);
                s.set("timestamp", e, {
                    UIident: this.UIident
                }), document.body.classList.remove("mobile-scroll")
            },
            set: function(e, t) {
                if (this.calendar && t !== this.UIident) {
                    this.timestamp = e;
                    var n = (e - this.calendar.start) / this.tsPx;
                    this.noAnimation = !0, this.scrollEl.scrollLeft = n
                }
            }
        })
    }), /*! */
    W.define("calendarUIdesktop", ["store", "$", "trans", "rootScope", "ClickHandler", "Resizable"], function(e, t, n, i, s, a) {
        if (!i.isMobile) {
            var r = t("#calendar");
            s.instance(a, {
                el: r,
                resizableEl: r,
                stopPropagation: !0,
                _init: function() {
                    s._init.call(this), a._init.call(this), e.on("calendar", this.render, this), e.on("usedLang", this.render, this), this.onresize = this.render.bind(this), this.click = e.set.bind(e, "timestamp"), this.render()
                },
                render: function() {
                    var t = e.get("calendar");
                    if (t) {
                        var n, i = "",
                            s = t.end,
                            a = t.days.length,
                            r = this.width / a,
                            o = 100 / a;
                        if (r > 100) n = this.createDayStringLong;
                        else if (r > 60) n = this.createDayString;
                        else {
                            if (!(r > 40)) return void(this.el.innerHTML = "");
                            n = this.createDayStringShort
                        }
                        for (var l = 0; l < a; l++) {
                            var c = t.days[l];
                            i += '<div data-do="' + Math.min(c.middayTs, s) + '"\n\t\t\t\t\tclass="uiyellow' + (c.middayTs < s ? " clickable" : " disabled") + '"\n\t\t\t\t\tstyle="width: ' + o + '%;">' + n(c) + "</div>"
                        }
                        this.el.innerHTML = i
                    }
                },
                createDayStringLong: function(e) {
                    return n[e.displayLong] + (e.day ? " " + e.day : "")
                },
                createDayString: function(e) {
                    return n[e.display] + (e.day ? " " + e.day : "")
                },
                createDayStringShort: function(e) {
                    return "" + n[e.display]
                }
            })
        }
    }), /*! */
    W.define("promo", ["utils", "$", "rootScope", "broadcast", "storage", "plugins", "geolocation", "log"], function(e, t, n, i, s, a, r, o) {
        var l = s.get("promos2") || {},
            c = e.debounce(function() {
                s.put("promos2", l)
            }, 500),
            d = function(e) {
                return l[e] || 0
            },
            u = function(e, t, n) {
                l[e + "_ts"] = n || Date.now(), l[e] = t, c()
            },
            h = a.patch;
        i.once("dependenciesResolved", h.load.bind(h));
        if (i.once("dependenciesResolved", function() {
                if (setInterval(function() {
                        document.body.classList.add("animate-logo"), setTimeout(function() {
                            return document.body.classList.remove("animate-logo")
                        }, 2e3)
                    }, 3e4), n.isMobile && ("ios" === n.platform || "android" === n.platform)) {
                    var e = ["#d49500", "#d40000", "#d4009b", "#8400d4", "#2200d4", "#0d869a", "#177900", "#ad7100"],
                        i = 0;
                    setInterval(function() {
                        ++i >= e.length && (i = 0), t("#open-in-app").style["background-color"] = e[i]
                    }, 12e3)
                }
            }), n.isMobile && s.isAvbl) {
            var f = document.body.classList;
            n.sessionCounter < 20 || n.sessionCounter >= 20 && !o.has("pl/menu") ? i.once("hpHidden", function() {
                n.user || (f.add("mm-show"), f.remove("mm-hide"), setTimeout(function() {
                    return f.add("mm-smaller")
                }, 3e3), setTimeout(function() {
                    return f.remove("mm-show")
                }, 1e4), setTimeout(function() {
                    return f.add("mm-hide")
                }, 13e3))
            }) : o.has("ov/satellite") || o.has("ov/radar") || i.once("hpHidden", function() {
                f.add("mm-radar-promo"), f.add("mm-smaller"), setTimeout(function() {
                    return f.remove("mm-smaller")
                }, 2e3), setTimeout(function() {
                    return f.add("mm-smaller")
                }, 6e3), setTimeout(function() {
                    return f.remove("mm-radar-promo")
                }, 8e3)
            })
        }
        return {
            getCounter: s.isAvbl ? d : function() {
                return 1e3
            },
            getCounter2: s.isAvbl ? function(e) {
                var t = (l[e + "_checked"] || 0) + 1;
                return l[e + "_checked"] = t, c(), {
                    displayed: d(e),
                    ts: l[e + "_ts"] || 0,
                    checked: t
                }
            } : function() {
                return {
                    displayed: 1e3,
                    ts: Date.now(),
                    checked: 1e3
                }
            },
            hitCounter: function(e) {
                u(e, d(e) + 1), i.emit("log", "promo/" + e)
            },
            neverSee: function(e) {
                return u(e, 1e3)
            },
            getAll: function() {
                return l
            }
        }
    }), /*! */
    W.define("loadersUI", ["broadcast", "utils"], function(e, t) {
        var n = t.debounce,
            i = !1;
        var s = n(function() {
            i = !0, document.body.classList.remove("loading-overlay"), document.body.classList.remove("loading-path"), document.body.classList.remove("loading-level")
        }, 300);
        e.on("paramsChanged", function(e, t) {
            /^(overlay|path|level)$/.test(t) && (s(), i = !1, setTimeout(function(e) {
                i || document.body.classList.add("loading-" + e)
            }.bind(null, t), 200))
        }), e.on("redrawFinished", s), e.on("loadingFailed", s), e.on("noConnection", s)
    }), /*! */
    W.define("user", ["rootScope", "broadcast", "http", "storage"], function(e, t, n, i) {
        function s(n) {
            var i = n.data;
            i && "object" == typeof i && (i.token && (e.userToken = i.token, t.emit("tokenRecieved", i.token)), i.auth && i.username ? (e.user = i, e.user.avatar = a(i.avatar), t.emit("rqstOpen", "user", i)) : r())
        }

        function a(t) {
            return t ? /^http/.test(t) ? t : "" + e.community + t + "?w=84" : "http://www.advaned-offline.map/img/avatar.jpg"
        }

        function r() {
            delete e.user, t.emit("rqstClose", "user")
        }

        function o(t) {
            var n = document.location.href;
            return document.createElement("a").href = n, e.community + "/" + (t || "login") + "?return=" + encodeURI(n) + "&utm_medium=windy&utm_source=login"
        }
        return n.get("http://www.advaned-offline.map/test-windy/users/info", {
            cache: !1,
            withCredentials: !0
        }).then(s).catch(r), {
            getAvatar: a,
            checkAuth: s,
            login: function(e) {
                window.location.href = o(e)
            },
            loginURL: o
        }
    }), /*! */
    W.define("timeAnimation", ["utils", "store", "products", "broadcast"], function(e, t, n, i) {
        var s, a, r = !1,
            o = null,
            l = null,
            c = 2,
            d = !1,
            u = 50;
        t.on("animation", function(e) {
            e !== r && (e ? function() {
                if (!(l = n[t.get("product")]).animation) return void p();
                r = !0, a = s = t.get("path"), c = 2, t.on("visibility", h), t.on("product", p), t.on("overlay", m), i.on("redrawFinished", f), i.on("paramsChanged", g), i.on("pluginOpened", p), v(), i.emit("animationStarted")
            }() : (r = !1, clearTimeout(o), t.off("visibility", h), t.off("product", p), t.off("overlay", m), i.off("redrawFinished", f), i.off("paramsChanged", g), i.off("pluginOpened", p)))
        });
        var h = function(e) {
                e || p()
            },
            f = function(e) {
                return s = e.path
            },
            m = function(e) {
                return /Accu$/.test(e) && p()
            },
            p = function() {
                return t.set("animation", !1)
            },
            g = function(e) {
                d = a !== s, a = e.path
            };

        function v() {
            c = e.bound(c + (d ? -.25 : .1), .8, 3);
            var n = t.get("timestamp") + u * l.animationSpeed * c;
            n < l.calendar.end ? (t.set("timestamp", n), o = setTimeout(v, u)) : p()
        }
    }), /*! */
    W.define("hp", ["map", "utils", "store", "query", "rootScope", "geolocation", "http", "broadcast", "storage"], function(e, t, n, i, s, a, r, o, l) {
        var c = !1,
            d = !1,
            u = n.get("showWeather"),
            h = e.getContainer();

        function f() {
            s.isMobile || i.showLoader(), setTimeout(function() {
                return i.hideLoader()
            }, 3e3), m(), a.getHomeLocation(g)
        }

        function m() {
            document.body.addEventListener("mousedown", p, !1), document.body.addEventListener("touchstart", p, !1), document.body.addEventListener("keydown", p, !1), h.addEventListener("click", p, !0), h.addEventListener("touchstart", p, !0), d = !0
        }

        function p(e) {
            if (e && e.target) {
                if ("mm-home" === e.target.id || "logo" === e.target.id) return;
                if ("search-my-loc" === e.target.id) return i.showLoader(), void a.getGPSlocation().then(g).catch(i.hideLoader.bind(i))
            }
            document.body.removeEventListener("mousedown", p, !1), document.body.removeEventListener("touchstart", p, !1), document.body.removeEventListener("keydown", p, !1), h.removeEventListener("click", p, !0), h.removeEventListener("touchstart", p, !0), d = !1, c = !0, o.emit("rqstClose", "hp-weather", e)
        }

        function g(e) {
            if (!c) {
                d || m();
                var i = t.normalizeLatLon(e.lat) + "/" + t.normalizeLatLon(e.lon),
                    s = t.getFcstUrl("ecmwf", e, "hp", "setup=summary&includeNow=true"),
                    a = {
                        wx: r.get(s, {
                            cache: !1
                        }),
                        capAlerts: r.get("/capalerts/" + i + "?lang=" + n.get("usedLang"), {
                            cache: !1
                        })
                    };
                o.emit("rqstOpen", "hp-weather", {
                    coords: e,
                    promises: a
                })
            }
        }
        return s.isResumed || !u || s.startupDetail ? document.body.classList.remove("onweather") : f(), o.on("back2home", function() {
            o.emit("closeAll"), n.set("timestamp", Date.now()), c = !1, a.getHomeLocation(function(t) {
                g(t), t.zoom = 5, e.center(t)
            })
        }), o.emit("log", "weather/" + (u ? n.get("startUp") : "userDisabled")), {
            cancelShow: function() {
                return c
            },
            show: g,
            hide: p
        }
    }), /*! */
    W.define("visibility", ["store"], function(e) {
        "hidden" in document && document.addEventListener("visibilitychange", function() {
            e.set("visibility", !document.hidden)
        })
    }), /*! */
    W.define("rhMessage", ["$"], function(e) {
        var t = function() {
            return e("#rh-bottom-messages")
        };
        return {
            insert: function(e) {
                var n = t();
                n && !n.contains(e) && n.appendChild(e)
            },
            remove: function(e) {
                var n = t();
                n && n.contains(e) && n.removeChild(e)
            },
            clear: function() {
                var e = t();
                e && (e.innerHTML = "")
            }
        }
    }), /*! */
    W.define("Renderer", ["plugins", "Class"], function(e, t) {
        return t.extend({
            _init: function() {
                this.isMounted = !1, this.isLoaded = !(this.dependency && this.dependency.length)
            },
            open: function(t) {
                var n = this;
                return this.isMounted ? Promise.resolve() : this.isLoaded ? (this.onopen(t), this.isMounted = !0, Promise.resolve()) : this.loadingPromise ? this.loadingPromise : (this.loadingPromise = new Promise(function(i) {
                    e[n.dependency].open(t).then(function() {
                        n.isLoaded = !0, n.onopen(t), n.isMounted = !0, i()
                    }).catch(window.wError.bind(null, "renderers", "Failed to load/open " + n.dependency)).then(function() {
                        n.loadingPromise = null
                    })
                }), this.loadingPromise)
            },
            onopen: function() {},
            close: function(e) {
                this.onclose(e), this.isMounted = !1
            },
            onclose: function() {},
            paramsChanged: function() {},
            redraw: function() {}
        })
    }), /*! */
    W.define("DataTiler", ["utils", "map", "dataLoader", "render", "Class", "rootScope"], function(e, t, n, i, s, a) {
        return s.extend({
            _tag: "DataTiler",
            loader: n,
            syncCounter: 0,
            getTiles: function(n) {
                var s = this,
                    r = t.getZoom();
                if (Math.floor(r) === r) {
                    this.syncCounter++;
                    for (var o = t.getPixelBounds(), l = [], c = o.min.x >> 8, d = o.max.x >> 8, u = o.min.y >> 8, h = o.max.y >> 8, f = u; f <= h; f++)
                        for (var m = c; m <= d; m++) {
                            var p = t.baseLayer._wrapCoords.call(t.baseLayer, {
                                x: m,
                                y: f,
                                z: r
                            });
                            l.push(p)
                        }
                    var g = e.clone(a.map),
                        v = i.getDataZoom(n, r),
                        y = Object.assign(g, {
                            pixelOriginX: o.min.x,
                            pixelOriginY: o.min.y,
                            dZoom: v,
                            origTiles: {
                                minX: c,
                                minY: u,
                                maxX: d,
                                maxY: h
                            }
                        }),
                        w = {},
                        b = [];
                    l.forEach(function(e) {
                        var t = i.whichTile(e, n);
                        if ((t = s.processTile(t, n)) && !w[t.url]) {
                            w[t.url] = 1;
                            var a = s.loader.loadTile(t);
                            b.push(a)
                        }
                    }), Promise.all(b).then(this.postProcess.bind(this, this.syncCounter, y, n))
                }
            },
            processTile: function(e) {
                return e
            },
            postProcess: function(e, t, n, s) {
                if (e === this.syncCounter) {
                    var a = this.sortTiles(t, n, s);
                    this.trans = 0 | i.getTrans(t.zoom, t.dZoom), this.shift = 0 | Math.log2(this.trans), this.lShift = 0 | Math.log2(this.trans * this.trans);
                    var r = t.pixelOriginX / this.trans % 256,
                        o = t.pixelOriginY / this.trans % 256;
                    r < 0 && (r = 256 + r), this.offsetX = r * this.trans | 0, this.offsetY = o * this.trans | 0, this.offset = 2056, this.width = t.width, this.height = t.height, this.w = i.getWTable(this.trans), this.tilesReady.call(this, a, t, n)
                }
            },
            sortTiles: function(e, n, s) {
                function a(e, s, a) {
                    var r = t.baseLayer._wrapCoords.call(t.baseLayer, {
                        x: e,
                        y: s,
                        z: a.zoom
                    });
                    return i.whichTile(r, n)
                }
                for (var r, o, l = [], c = function(t) {
                        var n = a(e.origTiles.minX, t, e);
                        if (!n || n.y !== o) {
                            r = null;
                            for (var i = [], c = e.origTiles.minX; c <= e.origTiles.maxX; c++)
                                if ((n = a(c, t, e)) && n.x !== r) {
                                    var d = s.filter(function(e) {
                                        return e.x === n.x && e.y === n.y
                                    })[0];
                                    i.push(d), r = n.x, o = n.y
                                }
                            i.length > 0 && l.push(i)
                        }
                    }, d = e.origTiles.minY; d <= e.origTiles.maxY; d++) c(d);
                return l
            }
        })
    }), /*! */
    W.define("Particles", ["Class", "store"], function(e, t) {
        return e.extend({
            configurable: !1,
            config: t.get("particles"),
            animation: "dot",
            stylesBlue: ["rgba(200,0,150,1)", "rgba(200,0,150,1)", "rgba(200,0,150,1)", "rgba(200,0,150,1)"],
            lineWidth: [.6, .6, .6, 1, 1.2, 1.6, 1.8, 2, 2.2, 2.4, 2.4, 2.4, 2.4, 2.6, 2.8, 3, 3, 3, 3, 3, 3, 3, 3, 3],
            zoom2speed: [.5, .5, .5, .6, .7, .8, .9, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
            level2reduce: {
                surface: 1,
                "100m": 1,
                "975h": 1,
                "950h": 1,
                "925h": .98,
                "900h": .9,
                "850h": .8,
                "800h": .77,
                "750h": .75,
                "700h": .7,
                "600h": .65,
                "500h": .6,
                "400h": .55,
                "300h": .5,
                "250h": .45,
                "200h": .45,
                "150h": .35
            },
            colors: [
                [200, 215, 235, 255],
                [215, 235, 255, 255],
                [235, 255, 255, 255],
                [255, 255, 255, 255]
            ],
            getIntensityFun: function() {
                return function(e) {
                    return Math.min(3, Math.floor(e / 40))
                }
            },
            _init: function() {
                var e = this;
                t.on("particles", function(t) {
                    return e.config = t
                })
            },
            getVelocityFun: function(e) {
                var t = this.zoom2speed[e.zoom],
                    n = this.configurable ? this.config.velocity : 1,
                    i = t * n * this.level2reduce[e.level] * this.velocity.max,
                    s = t * n * this.velocity.damper;
                return function(e) {
                    return i * (1 - 1 / (s * i * e - 1))
                }
            },
            getAmountMultiplier: function() {
                return this.configurable ? this.config.multiplier : 1
            },
            getAmount: function(e) {
                var t = e.speed2pixel < 1 ? 1 + 1.5 * (1 - e.speed2pixel) : 1,
                    n = this.getAmountMultiplier(),
                    i = 1 / (this.multiplier.constant * Math.pow(n * this.multiplier.pow, e.zoom - this.multiplier.zoom));
                return 0 | Math.min(15e3, Math.round(t * e.width * e.height * i))
            },
            getLineWidth: function(e) {
                return (this.configurable ? this.config.width : 1) * this.lineWidth[e.zoom]
            },
            getStyles: function(e) {
                var t = this.configurable ? this.config.opacity : 1;
                if (e.zoom >= 12) return this.stylesBlue;
                if (t <= 1) return this.colors[0].map(function(e) {
                    return "rgba(" + e + "," + e + "," + e + "," + t.toFixed(1) + ")"
                });
                var n = Math.min(3, Math.round(1.5 * t));
                return this.colors[n].map(function(e) {
                    return "rgba(" + e + "," + e + "," + e + ",1)"
                })
            },
            getMaxAge: function() {
                return 100
            },
            getBlendingAlpha: function(e) {
                var t = .9 * (this.configurable && 1 != this.config.blending ? this.config.blending : 1) * (e.speed2pixel < .8 ? 1 + (.8 - e.speed2pixel) / 7 : 1);
                return Math.min(.98, 2 * Math.round(100 * t / 2) / 100).toFixed(2)
            }
        })
    }), /*! */
    W.define("TileLayerCanvas", ["rootScope", "render", "utils", "dataLoader", "renderTile"], function(e, t, n, i, s) {
        return L.GridLayer.extend({
            latestParams: {},
            options: {
                async: !0,
                maxZoom: 11,
                updateWhenIdle: !!e.isMobileOrTablet,
                updateWhenZooming: !1,
                keepBuffer: e.isMobileOrTablet ? 1 : 4,
                disableTransformForTiles: !0
            },
            syncCounter: 0,
            inMotion: !1,
            hasSea: !1,
            className: "overlay-layer",
            onAdd: function(e) {
                L.GridLayer.prototype.onAdd.call(this, e), e.on("movestart", this.onMoveStart, this), e.on("moveend", this.onMoveEnd, this), this.on("load", this.checkLoaded, this)
            },
            onRemove: function(e) {
                e.off("movestart", this.onMoveStart, this), e.off("moveend", this.onMoveEnd, this), this.off("load", this.checkLoaded, this), L.GridLayer.prototype.onRemove.call(this, e), this.hasSea = !1, document.body.classList.remove("sea"), t.emit("toggleSeaMask", this.hasSea)
            },
            onMoveStart: function() {
                this.inMotion = !0
            },
            onMoveEnd: function() {
                this.inMotion = !1, this._loading || this.redrawFinished()
            },
            checkLoaded: function() {
                this.inMotion || this.redrawFinished()
            },
            redrawLayer: function() {
                var e = this._map,
                    t = e.getPixelBounds(),
                    n = t.min,
                    i = t.max,
                    s = n.divideBy(256)._floor(),
                    a = i.divideBy(256)._floor(),
                    r = L.bounds(s, a),
                    o = Math.round(e.getZoom());
                if (o > 11) this.redrawFinished();
                else {
                    this.removeOtherTiles(o, r);
                    var l = this.sortTilesFromCenterOut(r);
                    this._tilesToLoad = l.length;
                    for (var c = 0; c < l.length; c++) {
                        var d = l[c],
                            u = this._tileCoordsToKey(d);
                        u in this._tiles ? this.redrawTile(this._tiles[u]) : --this._tilesToLoad || this.redrawFinished()
                    }
                }
            },
            removeOtherTiles: function(e, t) {
                var n = t.min,
                    i = t.max;
                for (var s in this._tiles) {
                    var a = s.split(":"),
                        r = a[0],
                        o = a[1];
                    (+a[2] !== e || +r < n.x || +r > i.x || +o < n.y || +o > i.y) && this._removeTile(s)
                }
            },
            redrawTile: function(e) {
                var n = this;
                e.coords = this._wrapCoords(e.coords);
                var s = t.whichTile(e.coords, this.latestParams),
                    a = this.syncCounter;
                i.loadTile(s).then(function(t) {
                    n.renderTile.call(n, 2, e.el, a, s, t), --n._tilesToLoad || n.redrawFinished()
                }).catch(console.error)
            },
            paramsChanged: function(e) {
                e.fullPath === this.latestParams.fullPath && e.layer === this.latestParams.layer || (this.latestParams = n.clone(e), this.syncCounter++, this.redrawLayer())
            },
            sortTilesFromCenterOut: function(e) {
                var t, n, i = [],
                    s = e.getCenter(),
                    a = this._tileZoom;
                for (t = e.min.y; t <= e.max.y; t++)
                    for (n = e.min.x; n <= e.max.x; n++) {
                        var r = new L.Point(n, t);
                        r.z = a, i.push(r)
                    }
                return i.sort(function(e, t) {
                    return e.distanceTo(s) - t.distanceTo(s)
                }), i
            },
            redrawFinished: function() {
                this.latestParams.sea !== this.hasSea && (n.toggleClass(document.body, this.latestParams.sea, "sea"), this.hasSea = this.latestParams.sea, t.emit("toggleSeaMask", this.hasSea)), t.emit("rendered", "tileLayer")
            },
            createTile: function(e, n) {
                var s = this;
                e = this._wrapCoords(e);
                var a = t.whichTile(e, this.latestParams),
                    r = L.DomUtil.create("canvas"),
                    o = this.syncCounter;
                return r.width = r.height = 256, i.loadTile(a).then(function(e) {
                    r.style.width = r.style.height = "256px", s.renderTile.call(s, 2, r, o, a, e), n(void 0, r)
                }).catch(n), r
            },
            init: function(e) {
                this.latestParams = n.clone(e)
            },
            renderTile: s
        })
    }), /*! */
    W.define("dataLoader", ["store", "lruCache", "rootScope", "utils", "broadcast"], function(e, t, n, i, s) {
        var a = new t(50),
            r = 0,
            o = n.isMobile ? 3 : 6;
        var l = document.createElement("canvas"),
            c = l.getContext("2d");

        function d(e, t) {
            return this.url = e, this.status = "undefined", this.data = null, this.x = t.x, this.y = t.y, this.z = t.z, this.transformR = t.transformR, this.transformG = t.transformG, this.transformB = t.transformB, this
        }
        return d.prototype.load = function() {
            var e = this;
            return this.status = "loading", this.promise = new Promise(function(t, n) {
                var a = new Image;
                a.crossOrigin = "Anonymous", a.onload = function() {
                    l.width = a.width, l.height = a.height, c.drawImage(a, 0, 0, a.width, a.height);
                    var n = c.getImageData(0, 0, a.width, a.height);
                    e.data = n.data, e.status = "loaded";
                    var i = function(e, t) {
                            var n, i, s, a, r = new ArrayBuffer(28),
                                o = new Uint8Array(r),
                                l = new Float32Array(r),
                                c = 4 * t * 4 + 8;
                            for (a = 0; a < 28; a++) n = e[c], i = e[c + 1], s = e[c + 2], n = Math.round(n / 64), i = Math.round(i / 16), s = Math.round(s / 64), o[a] = (n << 6) + (i << 2) + s, c += 16;
                            return l
                        }(e.data, 257),
                        s = i[0],
                        o = (i[1] - i[0]) / 255,
                        d = i[2],
                        u = (i[3] - i[2]) / 255,
                        h = i[4],
                        f = (i[5] - i[4]) / 255;
                    e.decodeR = e.transformR ? function(t) {
                        return e.transformR(t * o + s)
                    } : function(e) {
                        return e * o + s
                    }, e.decodeG = e.transformG ? function(t) {
                        return e.transformG(t * u + d)
                    } : function(e) {
                        return e * u + d
                    }, e.decodeB = e.transformB ? function(t) {
                        return e.transformB(t * f + h)
                    } : function(e) {
                        return e * f + h
                    }, r = 0, t(e)
                }, a.onerror = function() {
                    e.status = "failed", s.emit("loadingFailed", e.url), ++r > o && (s.emit("noConnection"), r = 0), n("Failed to load tile")
                }, a.src = e.url, (a.complete || void 0 === a.complete) && (a.src = i.emptyGIF, a.src = e.url)
            }), this.promise
        }, {
            loadTile: function(e) {
                var t = e.url,
                    n = a.get(t);
                if (!n) return n = new d(t, e), a.put(t, n), n.load();
                switch (n.status) {
                    case "loaded":
                        return Promise.resolve(n);
                    case "loading":
                        return n.promise;
                    case "failed":
                        return a.remove(t), Promise.reject("Failed to load tile")
                }
            }
        }
    }), /*! */
    W.define("render", ["Evented"], function(e) {
        var t = e.instance({
            ident: "render"
        });
        t.zoom2zoom = {
            ultra: [0, 0, 0, 2, 3, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5],
            high: [0, 0, 0, 2, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
            normal: [0, 0, 0, 2, 2, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4],
            low: [0, 0, 0, 0, 0, 1, 1, 1, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3]
        }, t.getTrans = function(e, n) {
            return t.tileW(e) / t.tileW(n)
        }, t.tileW = function(e) {
            return Math.pow(2, e)
        };
        var n = Object.keys(t.zoom2zoom);
        t.getDataZoom = function(e, i) {
            var s = e.dataQuality;
            if (Number.isInteger(s)) return Math.min(e.maxTileZoom, i - s);
            var a = e.upgradeDataQuality ? n[Math.max(n.indexOf(s) - 1, 0)] : s;
            return Math.min(e.maxTileZoom, t.zoom2zoom[a][i])
        }, t.whichTile = function(e, n) {
            if (!n.fullPath) return null;
            var i = e.z,
                s = t.getDataZoom(n, i),
                a = t.getTrans(i, s),
                r = Math.floor(e.x / a),
                o = Math.floor(e.y / a),
                l = e.x % a,
                c = e.y % a,
                d = n.fullPath.replace("<z>", s).replace("<y>", o).replace("<x>", r),
                u = t.tileW(s);
            return r < 0 || o < 0 || r >= u || o >= u ? null : {
                url: d,
                x: r,
                y: o,
                z: s,
                intX: l,
                intY: c,
                trans: a,
                transformR: n.transformR || null,
                transformG: n.transformG || null,
                transformB: n.transformB || null
            }
        }, t.testJPGtransparency = function(e, t) {
            return 192 & e[t + 2] || 192 & e[t + 6] || 192 & e[t + 1030] || 192 & e[t + 1034]
        }, t.testPNGtransparency = function(e, t) {
            return !(e[t + 3] && e[t + 7] && e[t + 1028 + 3] && e[t + 1028 + 7])
        }, t.wTables = {}, t.getWTable = function(e) {
            if (e in t.wTables) return t.wTables[e];
            var n, i, s, a = 0;
            if (!(e <= 32)) return null;
            for (n = new Uint16Array(4 * e * e), s = 0; s < e; s++)
                for (i = 0; i < e; i++) n[a++] = (e - s) * (e - i), n[a++] = (e - s) * i, n[a++] = s * (e - i), n[a++] = i * s;
            return t.wTables[e] = n, n
        }, t.createCombinedFillFun = function(e, n, i, s) {
            var a = n.colors,
                r = i.colors,
                o = n.value2index.bind(n),
                l = i.value2index.bind(i),
                c = t.createFillFun(e, 2, n),
                d = t.createFillFun(e, 2, i),
                u = function(t, n, i, s) {
                    e[t] = n, e[t + 1] = i, e[t + 2] = s
                };
            return function(e, t, n, i) {
                var h = s(n, i);
                if (h > 0 && h < 4) var f = (t << 8) + e << 2,
                    m = o(n),
                    p = l(i),
                    g = a[m++],
                    v = a[m++],
                    y = a[m++],
                    w = r[p++],
                    b = r[p++],
                    T = r[p++];
                switch (h) {
                    case 0:
                        c(e, t, n);
                        break;
                    case 1:
                        u(f, w, b, T), u(f + 4, g, v, y), u(f + 1024, g, v, y), u(f + 1028, g, v, y);
                        break;
                    case 2:
                        u(f, w, b, T), u(f + 4, w, b, T), u(f + 1024, g, v, y), u(f + 1028, g, v, y);
                        break;
                    case 3:
                        u(f, w, b, T), u(f + 4, w, b, T), u(f + 1024, w, b, T), u(f + 1028, g, v, y);
                        break;
                    case 4:
                        d(e, t, i)
                }
            }
        }, t.createFillFun = function(e, t, n) {
            var i = n.colors,
                s = n.value2index.bind(n);
            switch (t) {
                case 1:
                    return function(t, n, a) {
                        var r = (n << 8) + t << 2,
                            o = s(a);
                        e[r++] = i[o++], e[r++] = i[o++], e[r] = i[o]
                    };
                case 2:
                    return function(t, n, a) {
                        var r = (n << 8) + t << 2,
                            o = s(a),
                            l = i[o++],
                            c = i[o++],
                            d = i[o];
                        e[r] = e[r + 4] = l, e[r + 1] = e[r + 5] = c, e[r + 2] = e[r + 6] = d, e[r += 1024] = e[r + 4] = l, e[r + 1] = e[r + 5] = c, e[r + 2] = e[r + 6] = d
                    }
            }
        };
        var i = document.createElement("canvas"),
            s = i.getContext("2d");
        return i.width = i.height = 256, s.fillStyle = "black", s.fillRect(0, 0, 256, 256), t.imgData = s.getImageData(0, 0, 256, 256), t.interpolateNearest = function(e, t, n, i, s, a, r, o, l, c) {
            null !== e && (r = e[t], o = e[t + 1], l = e[t + 2], c = e[t + 3]);
            var d = Math.max(r, o, l, c);
            return d === r ? n : d === o ? i : d === l ? s : d === c ? a : void 0
        }, t
    }), /*! */
    W.define("renderers", ["Renderer", "testWebGl", "map", "plugins", "tileLayer", "utils", "tileInterpolator"], function(e, t, n, i, s, a, r) {
        var o = e.extend({
                onopen: function(e) {
                    n.hasLayer(s) ? s.paramsChanged.call(s, e) : (s.init(e), s.addTo(n), s.getContainer().classList.add("overlay-layer"))
                },
                interpolator: r,
                paramsChanged: s.paramsChanged.bind(s),
                redraw: s.redrawLayer.bind(s),
                onclose: function(e) {
                    e.includes("tileLayer") || e.includes("tileLayerPatternator") || e.includes("efi") || n.removeLayer.call(n, s)
                }
            }),
            l = {};
        l.tileLayer = o.instance(), l.tileLayerPatternator = o.instance({
            dependency: "patternator",
            onopen: function(e) {
                W.require("rainPattern"), W.require("ptypePattern"), this.onopen = o.onopen.bind(this), o.onopen.call(this, e)
            }
        }), l.radar = e.instance({
            dependency: "radar",
            onopen: function() {
                this.onopen = i.radar.onopen, this.onclose = i.radar.onclose, this.redraw = i.radar.onredraw, this.interpolator = W.require("radarInterpolator")
            }
        }), l.satellite = e.instance({
            dependency: "satellite",
            onopen: function() {
                this.onopen = i.satellite.onopen, this.onclose = i.satellite.onclose, this.redraw = i.satellite.onredraw, this.interpolator = W.require("satelliteInterpolator")
            }
        }), l.capAlerts = e.instance({
            dependency: "cap-alerts",
            onopen: function() {
                var e = i["cap-alerts"];
                this.onopen = function(t) {
                    e.onopen(t), e.isOpen = !0
                }, this.onclose = function() {
                    e.onclose(), e.isOpen = !1
                }
            }
        }), l.isolines = e.instance({
            dependency: "isolines",
            onopen: function(e) {
                var t = W.require("isolines");
                this.onopen = t.onopen, this.onclose = t.onclose, this.paramsChanged = t.paramsChanged, this.redraw = t.redraw, t.onopen(e)
            }
        });
        var c = e.instance({
                dependency: "particles",
                onopen: function(e) {
                    var t = W.require("particlesOld");
                    this.paramsChanged = t.paramsChanged, this.onclose = t.close, this.redraw = t.redraw, t.open(e)
                }
            }),
            d = e.instance({
                dependency: "gl-particles",
                onopen: function(e) {
                    var t = W.require("gl-particles");
                    this.paramsChanged = t.paramsChanged, this.onclose = t.close, this.redraw = t.redraw, t.open(e) || (l.particles = c, this.close(), c.open(e))
                }
            });
        return l.particles = t.useGLparticles() ? d : c, l.map = e.instance({
            dependency: "map-layers",
            onopen: function() {
                var e = i["map-layers"];
                this.onopen = e.onopen, this.onclose = e.onclose, this.redraw = a.emptyFun, this.paramsChanged = a.emptyFun, this.interpolator = W.require("elevationInterpolator")
            }
        }), l.efi = o.instance({
            dependency: "extreme-forecast",
            onopen: function(e) {
                o.onopen.call(this, e), i["extreme-forecast"].onopen()
            },
            onclose: function(e) {
                o.onclose.call(this, e), i["extreme-forecast"].onclose()
            }
        }), l
    }), /*! */
    W.define("renderCtrl", ["renderers", "layers", "overlays", "broadcast", "utils", "render"], function(e, t, n, i, s, a) {
        var r = Object.keys(e),
            o = {},
            l = 0,
            c = 0;
        i.on("paramsChanged", function(i) {
            o = i, u();
            var s = n[i.overlay].layers.slice(),
                a = [];
            "off" !== i.isolines && s.unshift(i.isolines + "Isolines");
            var d = s.map(function(e) {
                var n = t[e];
                return a.push(n.renderer), {
                    renderer: n.renderer,
                    params: n.getParams.call(n, i, i.product)
                }
            });
            r.forEach(function(t) {
                var n = e[t];
                a.indexOf(t) < 0 && n.isMounted && n.close.call(n, a)
            });
            var f = [];
            d.forEach(function(t) {
                var n = e[t.renderer];
                n.isMounted ? n.paramsChanged.call(n, t.params) : f.push(n.open.call(n, t.params))
            }), f.length > 0 && Promise.all(f).catch(window.wError.bind(null, "renderCtrl", "Unable to load render"));
            l = d.length, c = setTimeout(h, 5e3)
        }), i.on("movestart", function() {
            var e = n[o.overlay];
            l = e && e.layers.length
        }), i.on("redrawLayers", function() {
            l = 0, s.each(e, function(e) {
                e.isMounted && (e.redraw(), l++)
            })
        }), a.on("rendered", function() {
            0;
            --l <= 0 && (u(), d())
        });
        var d = s.debounce(function() {
            return i.emit.call(i, "redrawFinished", o)
        }, 200);

        function u() {
            clearTimeout(c), c = 0
        }

        function h() {
            l = 0, i.emit("redrawFinished", o)
        }
    }), /*! */
    W.define("particles", ["Particles"], function(e) {
        return {
            wind: e.instance({
                configurable: !0,
                multiplier: {
                    constant: 50,
                    pow: 1.6,
                    zoom: 2
                },
                velocity: {
                    max: .1,
                    damper: 1e-5
                },
                glSpeedCurvePowParam: .7,
                glMinSpeedParam: 1.5,
                glMaxSpeedParam: 30,
                glParticleWidth: 1.3,
                glParticleLengthEx: .1,
                glSpeedPx: 100,
                glCountMul: 1
            }),
            currents: e.instance({
                multiplier: {
                    constant: 50,
                    pow: 1.5,
                    zoom: 2
                },
                velocity: {
                    max: .4,
                    damper: .35
                },
                glSpeedCurvePowParam: .4,
                glMinSpeedParam: .2,
                glMaxSpeedParam: 1.2,
                glParticleWidth: .6,
                glParticleLengthEx: .1,
                glSpeedPx: 50,
                glVelocity: 1,
                glOpacity: 1.3,
                glBlending: 1.05,
                glCountMul: 4,
                getBlendingAlpha: function() {
                    return .96
                }
            }),
            waves: e.instance({
                animation: "wavecle",
                styles: ["rgba(100,100,100,0.25)", "rgba(150,150,150,0.3)", "rgba(200,200,200,0.35)", "rgba(255,255,255,0.4)"],
                lineWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                multiplier: {
                    constant: 50,
                    pow: 1.3,
                    zoom: 2
                },
                velocity: {
                    max: .02,
                    damper: .015
                },
                glSpeedCurvePowParam: 1,
                glMinSpeedParam: .5,
                glMaxSpeedParam: 10,
                glParticleWidth: 5.5,
                glParticleLengthEx: 1,
                glSpeedPx: 8,
                glVelocity: 1,
                glOpacity: 1.6,
                glBlending: .93,
                glCountMul: 1.5,
                getIntensityFun: function() {
                    return function(e) {
                        return e < 12 ? 0 : e < 25 ? 1 : e < 37 ? 2 : e < 62 ? 3 : e < 75 ? 2 : e < 85 ? 1 : 0
                    }
                },
                getStyles: function() {
                    return this.styles
                },
                getBlendingAlpha: function() {
                    return .9
                }
            })
        }
    }), /*! */
    W.define("interpolator", ["renderers"], function(e) {
        var t = function() {
            return null
        };
        return function(n) {
            var i = function() {
                for (var t in e) {
                    var n = e[t];
                    if (n.isMounted && "interpolator" in n) return n.interpolator
                }
            }();
            i ? i.createFun(n) : n(t, t, !1)
        }
    }), /*! */
    W.define("tileInterpolator", ["map", "render", "tileLayer", "DataTiler"], function(e, t, n, i) {
        return i.instance({
            createFun: function(e) {
                return this.cb = e, this.getTiles(n.latestParams)
            },
            tilesReady: function(n, i, s) {
                var a = this,
                    r = function(e, i) {
                        var r = i + a.offsetY >> a.shift,
                            o = r >> 8,
                            l = r - (o << 8),
                            c = l % a.trans,
                            d = e + a.offsetX >> a.shift,
                            u = d >> 8,
                            h = d - (u << 8),
                            f = h % a.trans,
                            m = a.trans,
                            p = n && n[o] && n[o][u];
                        if (!p) return console.warn("interpolator: Undefined dTile"), NaN;
                        var g = p.data,
                            v = a.offset + h + (l << 8) + l << 2;
                        if (s.PNGtransparency && t.testPNGtransparency(g, v)) return NaN;
                        if (s.JPGtransparency && t.testJPGtransparency(g, v)) return NaN;
                        var y = g[v],
                            w = g[v + 4],
                            b = g[v + 1],
                            T = g[v + 5],
                            L = g[v + 2],
                            S = g[v + 6],
                            A = g[v += 1028],
                            E = g[v + 4],
                            C = g[v + 1],
                            M = g[v + 5],
                            x = g[v + 2],
                            _ = g[v + 6],
                            P = (m - c) * (m - f),
                            D = (m - c) * f,
                            R = c * (m - f),
                            O = f * c,
                            N = m * m,
                            k = (y * P + w * D + A * R + E * O) / N,
                            I = s.interpolateNearestG ? t.interpolateNearest(null, 0, b, T, C, M, P, D, R, O) : (b * P + T * D + C * R + M * O) / N,
                            W = (L * P + S * D + x * R + _ * O) / N;
                        return [p.decodeR(k), p.decodeG(I), p.decodeB(W)]
                    };
                this.cb(function(t) {
                    var n = t.lat,
                        i = t.lon,
                        s = e.latLngToContainerPoint([n, i]),
                        o = s.x,
                        l = s.y;
                    return o < 0 || l < 0 || o > a.width || l > a.height ? null : r.call(a, o, l)
                }, r)
            }
        })
    }), /*! */
    W.define("tileLayer", ["TileLayerCanvas"], function(e) {
        return new e
    }), /*! */
    W.define("renderTile", ["render", "layers"], function(e, t) {
        return function(n, i, s, a, r) {
            if (s === this.syncCounter) {
                Date.now();
                n |= 0;
                var o = this.latestParams,
                    l = o.isMultiColor,
                    c = r.data,
                    d = i.getContext("2d"),
                    u = e.imgData.data,
                    h = void 0;
                "png" === o.fileSuffix ? o.PNGtransparency && (h = e.testPNGtransparency) : o.JPGtransparency && (h = e.testJPGtransparency);
                var f, m, p, g, v, y, w, b, T, L, S, A, E = !1,
                    C = 0 | a.trans,
                    M = 0 | Math.log2(C),
                    x = 0 | Math.log2(C * C),
                    _ = 0 | a.intX,
                    P = 0 | a.intY,
                    D = 256 >> M,
                    R = e.getWTable(C),
                    O = 0,
                    N = 0,
                    k = _ * D | 0,
                    I = P * D | 0,
                    U = 0,
                    F = 0,
                    G = 256,
                    z = 0,
                    H = 0,
                    B = 0,
                    j = 0,
                    V = 0,
                    q = 0,
                    Y = 0,
                    Z = 0,
                    X = 0,
                    $ = 0,
                    Q = 0,
                    J = t[o.layer],
                    K = "B" === o.renderFrom,
                    ee = "RG" === o.renderFrom,
                    te = r.decodeR,
                    ne = r.decodeG;
                for (l ? (T = e.createCombinedFillFun(u, J.getColor(), J.getColor2(), J.getAmountByColor), L = e.createFillFun(u, n, J.getColor())) : T = L = e.createFillFun(u, n, J.getColor()), K && (te = r.decodeB), A = 0; A < 256; A += n)
                    for (B = A - ((F = A >> M) << M), S = 0; S < 256; S += n) H = S - ((U = S >> M) << M), G !== U && (N = 2056 + U + k + (((z = F + I) << 8) + z) << 2, void 0 !== h && (E = h(c, N)), !0 === K && (N += 2), j = c[N], V = c[N + 4], q = c[N + 1028], Y = c[N + 1032], !0 === ee && (Z = c[N + 1], X = c[N + 5], $ = c[N + 1029], Q = c[N + 1033]), G = U), E ? L(S, A, NaN) : (w = te(null !== R ? j * R[O = H + (B << M) << 2] + V * R[O + 1] + q * R[O + 2] + Y * R[O + 3] >> x : j * (f = (1 - (v = H / C)) * (1 - (y = B / C))) + V * (m = v * (1 - y)) + q * (p = y * (1 - v)) + Y * (g = v * y)), !0 === ee && (b = ne(null !== R ? Z * R[O] + X * R[O + 1] + $ * R[O + 2] + Q * R[O + 3] >> x : Z * f + X * m + $ * p + Q * g)), l ? T(S, A, w, b) : T(S, A, ee ? Math.sqrt(w * w + b * b) : w));
                d.putImageData(e.imgData, 0, 0), "pattern" in o && o.pattern in W && W[o.pattern].addPattern(d, C, c, 2056, k, I, D, te, ne)
            }
        }
    }), /*! */
    W.define("GlObj", [], function() {
        function e(e, t) {
            void 0 === e && (e = !1), void 0 === t && (t = !1), this.keepRefs = e, this.keepRefsShaders = t, this.reset()
        }
        var t;
        return e.getNextPowerOf2Size = function(e) {
            return 1 << Math.floor(Math.log2(e + e - 1))
        }, e.removeFromArray = function(e, t) {
            var n, i = -1;
            for (n = 0; n < t.length; n++) t[n] === e && (i = n);
            return i > -1 && t.splice(i, 1), i
        }, e.littleEndian = (t = new ArrayBuffer(2), new DataView(t).setInt16(0, 256, !0), 256 === new Int16Array(t)[0]), e.prototype = {
            reset: function() {
                this.framebuffers = [], this.buffers = [], this.shaders = [], this.programs = [], this.textures = [], this.gl = null, this.canvas = null
            },
            create: function(e, t, n) {
                if (this._id = n || "noname", !this.gl && !this.canvas) return this.canvas = e, this.gl = e.getContext("webgl", t) || e.getContext("experimental-webgl", t), this.gl
            },
            get: function() {
                return this.gl
            },
            getCanvas: function() {
                return this.canvas
            },
            createShader: function(e, t, n) {
                var i = this.get(),
                    s = i.createShader(t ? i.VERTEX_SHADER : i.FRAGMENT_SHADER);
                if (this.keepRefsShaders && this.shaders.push(s), i.shaderSource(s, e), i.compileShader(s), !i.getShaderParameter(s, i.COMPILE_STATUS)) {
                    var a = new Error(i.getShaderInfoLog(s));
                    throw a.contextLost = i.isContextLost(), a.isVertexShader = t, a.name = n, a.full = "ERROR compileShader! name: " + a.name + "; " + (a.isVertexShader ? "VS" : "FS") + "; " + (a.contextLost ? "contextLost" : "NOT contextLost") + "; msg: " + a.message, a
                }
                return s
            },
            createProgramObj: function(e, t, n, i) {
                var s, a, r = this.get(),
                    o = r.createProgram(),
                    l = {
                        program: o
                    },
                    c = "";
                if (!o) throw (a = new Error).full = "gl.createProgram() is null; name: " + i, a;
                if (this.keepRefs && this.programs.push(o), o.name = i, n && n.length > 0)
                    for (s = 0; s < n.length; s++) c += "#define " + n[s] + "\n";
                var d = this.createShader(c + e, !0, i),
                    u = this.createShader(c + t, !1, i);
                if (r.attachShader(o, d), r.attachShader(o, u), r.linkProgram(o), !r.getProgramParameter(o, r.LINK_STATUS)) throw (a = new Error(r.getProgramInfoLog(o))).contextLost = r.isContextLost(), a.name = i, a.full = "ERROR linkProgram! name: " + a.name + "; " + (a.contextLost ? "contextLost" : "NOT contextLost") + "; msg: " + a.message, a;
                var h = r.getProgramParameter(o, r.ACTIVE_ATTRIBUTES);
                for (s = 0; s < h; s++) {
                    var f = r.getActiveAttrib(o, s);
                    l[f.name] = r.getAttribLocation(o, f.name)
                }
                var m = r.getProgramParameter(o, r.ACTIVE_UNIFORMS);
                for (s = 0; s < m; s++) {
                    var p = r.getActiveUniform(o, s);
                    l[p.name] = r.getUniformLocation(o, p.name)
                }
                return l
            },
            deleteProgramObj: function(t) {
                e.removeFromArray(t, this.programs), this.get().deleteProgram(t)
            },
            bindAttribute: function(e, t, n, i, s, a, r) {
                var o = this.get();
                o.bindBuffer(o.ARRAY_BUFFER, e), o.enableVertexAttribArray(t), o.vertexAttribPointer(t, n, i, s, a, r)
            },
            createTextureFromBase64: function(e, t, n, i) {
                var s = this,
                    a = this.get(),
                    r = new Image,
                    o = this.createTexture2D(e, t, n, null, 1, 1, a.RGBA);
                return r.onload = function() {
                    s.resizeTexture2D(o, r, r.width, r.height, a.RGBA)
                }, r.src = i, o
            },
            createTexture2D: function(e, t, n, i, s, a, r) {
                var o = this.get(),
                    l = o.createTexture();
                return this.keepRefs && this.textures.push(l), l._width = s, l._height = a, o.bindTexture(o.TEXTURE_2D, l), this.setBindedTexture2DParams(e, t, n), this.resizeTexture2D(l, i, s, a, r)
            },
            deleteTexture2D: function(t) {
                e.removeFromArray(t, this.textures), this.get().deleteTexture(t)
            },
            bindTexture2D: function(e, t, n) {
                var i = this.get();
                i.activeTexture(i.TEXTURE0 + (t || 0)), i.bindTexture(i.TEXTURE_2D, e), n && i.uniform1i(n, t)
            },
            resizeTexture2D: function(e, t, n, i, s) {
                var a = this.get();
                return s = s || a.RGBA, e._width = n, e._height = i, e._format = s, a.bindTexture(a.TEXTURE_2D, e), null === t || t instanceof Uint8Array ? a.texImage2D(a.TEXTURE_2D, 0, s, n, i, 0, s, a.UNSIGNED_BYTE, t) : a.texImage2D(a.TEXTURE_2D, 0, s, s, a.UNSIGNED_BYTE, t), a.bindTexture(a.TEXTURE_2D, null), e
            },
            setBindedTexture2DParams: function(e, t, n) {
                var i = this.get();
                i.texParameteri(i.TEXTURE_2D, i.TEXTURE_MIN_FILTER, e), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_MAG_FILTER, t), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_WRAP_S, n), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_WRAP_T, n)
            },
            createBuffer: function(e) {
                var t = this.get().createBuffer();
                return this.keepRefs && this.buffers.push(t), this.setBufferData(t, e), t
            },
            deleteBuffer: function(t) {
                e.removeFromArray(t, this.buffers), this.get().deleteBuffer(t)
            },
            setBufferData: function(e, t) {
                var n = this.get();
                n.bindBuffer(n.ARRAY_BUFFER, e), n.bufferData(n.ARRAY_BUFFER, t, n.STATIC_DRAW)
            },
            createIndexBuffer: function(e) {
                var t = this.get(),
                    n = t.createBuffer();
                return this.keepRefs && this.buffers.push(n), t.bindBuffer(t.ELEMENT_ARRAY_BUFFER, n), t.bufferData(t.ELEMENT_ARRAY_BUFFER, e, t.STATIC_DRAW), n
            },
            createFramebuffer: function() {
                var e = this.get().createFramebuffer();
                return this.keepRefs && this.framebuffers.push(e), e
            },
            deleteFramebuffer: function(t) {
                e.removeFromArray(t, this.framebuffers), this.get().deleteFramebuffer(t)
            },
            bindFramebuffer: function(e, t) {
                var n = this.get();
                n.bindFramebuffer(n.FRAMEBUFFER, e), t && n.framebufferTexture2D(n.FRAMEBUFFER, n.COLOR_ATTACHMENT0, n.TEXTURE_2D, t, 0)
            },
            release: function() {
                if (this.gl) {
                    var e = this.get();
                    e.flush(), e.finish();
                    var t, n, i = this.textures.length;
                    for (t = 0; t < i; t++) n = this.textures[t], e.isTexture(n) && e.deleteTexture(n);
                    for (i = this.programs.length, t = 0; t < i; t++) n = this.programs[t], e.isProgram(n) && e.deleteProgram(n);
                    for (i = this.shaders.length, t = 0; t < i; t++) n = this.shaders[t], e.isShader(n) && e.deleteShader(n);
                    for (i = this.buffers.length, t = 0; t < i; t++) n = this.buffers[t], e.isBuffer(n) && e.deleteBuffer(n);
                    for (i = this.framebuffers.length, t = 0; t < i; t++) n = this.framebuffers[t], e.isFramebuffer(n) && e.deleteFramebuffer(n);
                    this.reset()
                }
            }
        }, e
    }), /*! */
    W.define("testWebGl", ["GlObj", "store", "storage", "rootScope"], function(e, t, n, i) {
        return {
            shRectVS: "\n\tattribute vec2 aPos;\n\tvarying vec2 vTc;\n\tvoid main(void) {\n\t\tgl_Position = vec4( aPos, 0.0, 1.0 );\n\t\tvTc = aPos.xy * 0.5 + 0.5;\n\t}\n",
            shEncodeDecodeFS: "\n\tprecision highp float;\n\tuniform vec4 uPars;\n\tuniform sampler2D sTex0;\n\tvarying vec2 vTc;\n\tvoid main(void) {\n\t\tvec4 tex0 = texture2D( sTex0, vTc );\n\t\tvec2 pos = tex0.ba + tex0.rg * uPars.x;\n\t\tvec2 rg = fract( pos * uPars.y + uPars.z );\n\t\tgl_FragColor.ba = pos + rg * uPars.w;\n\t\tgl_FragColor.rg = rg;\n\t}\n",
            retOk: "ok",
            glo: new e,
            useRadar: function() {
                var e = !1;
                try {
                    e = this.useRadarInner()
                } catch (e) {
                    window.wError("testWebGl", "Error testing radar", e)
                }
                return this.glo.release(), e
            },
            useRadarInner: function() {
                var e = this,
                    t = n.get("radarTest01"),
                    i = window.navigator.userAgent,
                    s = function() {
                        var t = e.runRadarTest();
                        return n.put("radarTest01", {
                            status: t,
                            ua: i
                        }), t === e.retOk
                    };
                return t && t.ua === i ? t.status === this.retOk : s()
            },
            runRadarTest: function() {
                return this.status = "error-unspecified", this.status
            },
            useGLparticles: function() {
                var e = !1;
                try {
                    e = this.useGLparticlesInner()
                } catch (e) {
                    0, window.wError("testWebGl", "useGLparticles", e)
                }
                return this.glo.release(), e
            },
            useGLparticlesInner: function() {
                var e = this,
                    s = t.get("disableWebGL"),
                    a = n.get("webGLtest3"),
                    r = window.navigator.userAgent,
                    o = function() {
                        var t = e.runParticlesTest();
                        return n.put("webGLtest3", {
                            status: t,
                            ua: r
                        }), t === e.retOk
                    };
                return "desktop" === i.platform && "embed2" !== W.target && (!s && (a && a.ua === r ? a.status === this.retOk : o()))
            },
            runParticlesTest: function() {
                this.it = {}, this.status = "error-unspecified";
                try {
                    this.initWebGl() && this.runParticlesUpdateTest()
                } catch (e) {
                    window.wError("testWebGl", "Unspecified error", e)
                }
                return this.it = null, this.status
            },
            runParticlesUpdateTest: function() {
                var e = 0;
                try {
                    this.initParticleUpdateTest() && (this.status = this.startParticleUpdateTest(), e = this.status === this.retOk ? 2 : 1)
                } catch (e) {
                    this.status = "error-in-particle-update-test"
                }
                return e
            },
            compileShader: function(e, t, n, i, s) {
                var a;
                s = s || "testWebGl";
                try {
                    a = this.glo.createProgramObj(e, t, n, i)
                } catch (e) {
                    0, window.wError(s, e.full), this.shaderErrors++, a = null
                }
                return a
            },
            initWebGl: function() {
                var e = null;
                try {
                    this.it.fragment = document.createDocumentFragment();
                    var t = document.createElement("canvas");
                    this.it.fragment.appendChild(t);
                    e = this.glo.create(t, {
                        antialias: !1,
                        depth: !1,
                        stencil: !1,
                        alpha: !0,
                        premultipliedAlpha: !0,
                        preserveDrawingBuffer: !1
                    }, "testWebGl"), this.it.gl = e, e ? this.it.framebuffer = this.glo.createFramebuffer() : window.WebGLRenderingContext ? this.status = "error-no-WebGL-context" : this.status = "error-no-WebGL-browser"
                } catch (e) {
                    window.wError("testWebGl", "initWebGl exception: " + e)
                }
                return e
            },
            startParticleUpdateTest: function() {
                return this.renderParticleUpdateTest(1 / 255.5, 255, .125 / 255, -1 / 255), this.compareDataFast(this.it.data0, this.it.data1) > 1e3 ? "no-particles-update" : this.retOk
            },
            initParticleUpdateTest: function() {
                var e = this.glo,
                    t = e.get();
                if (this.shaderErrors = 0, this.it.shEncodeDecode = this.compileShader(this.shRectVS, this.shEncodeDecodeFS, null, "EncodeDecode", "glParticlesTest"), this.shaderErrors > 0) return this.status = "error-shader-compilation", !1;
                this.it.vertexBufferRect = e.createBuffer(new Float32Array([-1, -1, 1, -1, 1, 1, -1, 1])), this.it.w = 128, this.it.h = 256, this.it.data0 = new Uint8Array(this.it.w * this.it.h * 4), this.it.data1 = new Uint8Array(this.it.w * this.it.h * 4);
                var n, i, s = 0;
                for (i = 0; i < this.it.h; i++)
                    for (n = 0; n < this.it.w; n++) this.it.data0[s++] = n + n, this.it.data0[s++] = n + n + 1, this.it.data0[s++] = i, this.it.data0[s++] = i;
                return this.it.texture0 = e.createTexture2D(t.NEAREST, t.NEAREST, t.REPEAT, this.it.data0, this.it.w, this.it.h), this.it.texture1 = e.createTexture2D(t.NEAREST, t.NEAREST, t.REPEAT, this.it.data1, this.it.w, this.it.h), !0
            },
            renderParticleUpdateTest: function(e, t, n, i) {
                var s = this.glo,
                    a = s.get();
                s.bindFramebuffer(this.it.framebuffer, this.it.texture1), a.viewport(0, 0, this.it.w, this.it.h);
                var r = this.it.shEncodeDecode;
                a.useProgram(r.program), s.bindAttribute(this.it.vertexBufferRect, r.aPos, 2, a.FLOAT, 0, 8, 0), s.bindTexture2D(this.it.texture0, 0, r.sTex0), a.uniform4f(r.uPars, e, t, n, i), a.drawArrays(a.TRIANGLE_FAN, 0, 4), a.readPixels(0, 0, this.it.w, this.it.h, a.RGBA, a.UNSIGNED_BYTE, this.it.data1), s.bindFramebuffer(null)
            },
            compareDataFast: function(e, t) {
                for (var n = 0, i = 0; i < e.length; i++) {
                    e[i] !== t[i] && ++n
                }
                return n
            }
        }
    }), /*! */
    W.define("ImageGraph", ["ImageMaker"], function(e) {
        return e.extend({
            bottomWhitten: !0,
            getY: function(e, t, n, i) {
                return i * (n - e) / (n - t)
            },
            getControlPoint: function(e, t, n) {
                var i = 0;
                return n[1] <= t[1] && e[1] <= t[1] || n[1] >= t[1] && e[1] >= t[1] || (i = n[1] - e[1]), [.2 * (n[0] - e[0]) + t[0], .2 * i + t[1]]
            },
            createGradient: function(e, t, n) {
                for (var i, s, a = this.fillColors.length, r = this.fillColors[0][0], o = this.fillColors[a - 1][0], l = 1 / (o - r), c = this.h / (e - t), d = c * (o - t), u = c * (r - t), h = this.ctx.createLinearGradient(0, u, 0, d), f = 0; f < a; ++f) s = this.fillColors[f][1], i = l * (this.fillColors[f][0] - r), h.addColorStop(i, "rgba( " + s[0] + ", " + s[1] + ", " + s[2] + ", " + n + " )");
                return h
            },
            maskEnds: function(e) {
                var t = this.ctx,
                    n = t.createLinearGradient(0, 0, e, 0);
                return t.globalCompositeOperation = "destination-out", n.addColorStop(0, "rgba(255,255,255,1)"), n.addColorStop(1, "rgba(255,255,255,0)"), t.fillStyle = n, t.fillRect(0, 0, e, this.h), (n = t.createLinearGradient(this.w - e, 0, this.w, 0)).addColorStop(0, "rgba(255,255,255,0)"), n.addColorStop(1, "rgba(255,255,255,1)"), t.fillStyle = n, t.fillRect(this.w - e, 0, this.w, this.h), this
            },
            setViewport: function(e, t) {
                return this.viewport = [e, t], this
            },
            findMinMax: function(e) {
                return [Math.min.apply(Math, e), Math.max.apply(Math, e)]
            },
            render: function(e, t) {
                void 0 === t && (t = 1), this.checkData(e);
                var n, i, s = this.ctx,
                    a = e.length,
                    r = this.tdWidth,
                    o = r >> 1,
                    l = this.h,
                    c = [],
                    d = -r - o,
                    u = this.viewport || this.findMinMax(e),
                    h = u[0],
                    f = u[1];
                for (i = 0; i < a + 4; ++i) n = e[Math.max(0, Math.min(i - 2, a - 1))], c.push([d, this.getY(n, h, f, l), n]), d += r;
                for (i = 0; i < a; ++i) c[i + 2][1] = .6 * c[i + 2][1] + .15 * (c[i + 1][1] + c[i + 3][1]) + .05 * (c[i][1] + c[i + 4][1]);
                for (s.beginPath(), s.moveTo(c[1][0], l), s.lineTo(c[1][0], c[1][1]), i = 0; i < a + 1; ++i) {
                    var m = this.getControlPoint(c[i], c[i + 1], c[i + 2]),
                        p = this.getControlPoint(c[i + 3], c[i + 2], c[i + 1]);
                    s.bezierCurveTo(m[0], m[1], p[0], p[1], c[i + 2][0], c[i + 2][1])
                }
                return s.lineTo(c[a + 2][0], l), this.fillColors ? (s.fillStyle = this.createGradient(h, f, t), s.fill()) : (s.lineWidth = this.lineWidth, s.strokeStyle = this.strokeStyle, s.stroke()), this.bottomWhitten && this.whiteBottom(s, t), this
            },
            whiteBottom: function(e, t) {
                var n = .5 * this.h,
                    i = e.createLinearGradient(0, n, 0, this.h);
                t < 1 && (e.globalCompositeOperation = "destination-out"), i.addColorStop(0, "rgba(255,255,255,0.0)"), i.addColorStop(1, "rgba(255,255,255,1.0)"), e.fillStyle = i, e.fillRect(0, n, this.w, .5 * this.h)
            }
        })
    }), /*! */
    W.define("ImageMaker", ["Class"], function(e) {
        return e.extend({
            canvasRatio: Math.min(window.devicePixelRatio || 1, 2),
            getPixelRatioAdjustedSize: function(e) {
                return Math.round(e * this.canvasRatio)
            },
            init: function(e, t, n, i) {
                var s = t * n;
                return this.num = t, this.canvas = e, this.ctx = this.canvas.getContext("2d"), this.tdWidth = n, this.w = s, this.h = i, this.canvas.width = t * this.getPixelRatioAdjustedSize(n), this.canvas.height = this.getPixelRatioAdjustedSize(i), this.canvas.style.width = s + "px", this.canvas.style.height = i + "px", this.resetCanvas()
            },
            mixinCanvas: function(e) {
                return Object.assign(this, e), this
            },
            setHeight: function(e) {
                return this.h = e, this
            },
            setOffset: function(e) {
                return this.ctx.translate(0, e), this
            },
            resetCanvas: function() {
                return this.ctx.setTransform(1, 0, 0, 1, 0, 0), this.ctx.scale(this.canvasRatio, this.canvasRatio), this
            },
            checkData: function(e) {
                for (var t, n = e[0] || 0, i = 0; i < e.length; i++) null === (t = e[i]) || isNaN(t) || void 0 === t ? e[i] = n : n = t
            }
        })
    }), /*! */
    W.define("iMaker", ["ImageMaker", "ImageGraph"], function(e, t) {
        return {
            canvas: e.extend({}),
            temp: t.extend({
                fillColors: [
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
                ],
                findMinMax: function(e) {
                    var t = Math.min.apply(Math, e),
                        n = Math.max.apply(Math, e);
                    t -= 1;
                    var i = (n = (t -= Math.round(.05 * (n - t))) + Math.round(n - t)) - t;
                    return i < 10 && (i = Math.round(.5 * (10 - i)), t -= Math.round(.5 * i), n += Math.round(1.5 * i)), [t, n]
                }
            }),
            dayNight: e.extend({
                nightColor: "rgba(234,234,245,1)",
                render: function(e) {
                    for (var t = e.isDay, n = 0; n < t.length; n++) {
                        var i = t[n],
                            s = n * this.tdWidth,
                            a = (n + 1) * this.tdWidth,
                            r = s + Math.abs(i) * this.tdWidth;
                        this.ctx.fillStyle = this.nightColor, 1 === i ? this.ctx.clearRect(s, 0, a, this.h) : 0 === i ? this.ctx.fillRect(s, 0, a, this.h) : i < 0 ? (this.ctx.clearRect(s, 0, r, this.h), this.ctx.fillRect(r, 0, a, this.h)) : (this.ctx.fillRect(s, 0, r, this.h), this.ctx.clearRect(r, 0, a, this.h))
                    }
                    return this
                }
            })
        }
    }), /*! */
    W.define("weatherRender", ["rootScope", "$", "iMaker", "trans", "overlays", "colors", "Class"], function(e, t, n, i, s, a, r) {
        return r.extend({
            weatherData: function(e, t) {
                var n = t.days;
                void 0 === n && (n = 7);
                var i = t.history,
                    s = Object.keys(e.summary),
                    a = e.summary;
                n = n || 7, a[s[s.length - 1]].segments < 3 && s.pop(), !i && a[s[1]].timestamp < Date.now() && s.shift(), s.length > n && (s = s.slice(0, n));
                var r = a[s[0]].index,
                    o = a[s[s.length - 1]].index + a[s[s.length - 1]].segments;
                for (var l in this.dataLength = o - r, e.data) r && e.data[l].splice(0, r), e.data[l].splice(this.dataLength);
                return this.json = e, this.data = e.data, this.usedDays = s, this.data
            },
            giveMeDays: function(e) {
                for (var t = 0; t < this.usedDays.length; t++) {
                    var n = this.usedDays[t];
                    e(this.json.summary[n], this.json.summary[n].segments, n)
                }
            },
            renderSliderDays: function() {
                var t = this,
                    n = "",
                    i = this.options.iconSize || 25;
                return this.giveMeDays(function(a, r) {
                    var o = a.warning && /^[SE]/.test(a.warning) ? "_alert" : "";
                    n += '<td width="' + 100 * r / t.dataLength + '%"', n += r > 3 ? ' data-afterbegin="' + a.weekday + '2"><img\n\t\t\t\tsrc="' + e.iconsDir + "/png_" + i + "px/" + a.icon + o + '.png"\n\t\t\t\tsrcset="' + e.iconsDir + "/png_" + i + "@2x/" + a.icon + o + '.png 2x"><big>\n\t\t\t\t' + s.temp.convertNumber(a.tempMax) + "°</big></td>" : ">&nbsp;</td>"
                }), n
            },
            renderSlider: function() {
                var e = a.windDetail.getColor.call(a.windDetail).color.bind(a.windDetail);
                return "linear-gradient(to right, " + this.data.wind.map(e).join(", ") + " )"
            },
            renderRainSnow: function() {
                for (var e = this.dataLength, t = "", n = this.data.snow, i = this.data.mm, s = 0; s < e; s++) {
                    var a = null;
                    n[s] && i[s] > .1 ? a = "&#xe000" : !n[s] && i[s] > .5 && (a = "&#xe006"), a && (t += '<i style="left: ' + s / e * 100 + '%">' + a + "</i>")
                }
                return t
            },
            renderAlert: function(e) {
                return "linear-gradient(to right, " + this.data.ts.map(function(t) {
                    return e.includes(t) ? "rgba(208, 4, 0, 0.65)" : "transparent"
                }).join(", ") + " )"
            },
            renderFragment: function(e, s, a) {
                void 0 === a && (a = {}), this.options = a, s && this.weatherData(s, a);
                var r = t("table", e),
                    o = r.clientWidth / this.dataLength;
                n.temp.init(t("canvas", e), this.dataLength, o, a.bgHeight).render(this.data.temp, .5).maskEnds(10), t(".slider", e).style.background = this.renderSlider(), r.innerHTML = "<tr> " + this.renderSliderDays() + "</tr>";
                var l = t(".alerts-line", e);
                if (a.timestamps && l ? (l.style.background = this.renderAlert(a.timestamps), l.style.display = "block") : l && (l.style.display = "none"), a.addRain) {
                    var c = this.renderRainSnow(),
                        d = t(".slider-rain", e);
                    c && d ? (d.innerHTML = c, d.style.display = "block") : d && (d.style.display = "none")
                }
                i.translateDocument(e)
            }
        })
    }), /*! */
    W.define("searchCtrl", ["$", "broadcast", "results", "query", "utils"], function(e, t, n, i, s) {
        var a = e("#search .delete");
        a.onmousedown = c, e("#search .cancel-search").onmousedown = o, i.element.onblur = o, i.element.onfocus = function() {
            r.hasFocus = !0, i.element.addEventListener("keydown", d), i.element.addEventListener("keyup", l), i.element.value.length > 3 && a.classList.add("show");
            t.emit("closeAll"), document.body.classList.add("onsearch"), n.show()
        }, t.on("focusRqstd", function() {
            return i.element.focus()
        }), t.on("searchClose", function() {
            i.set(""), i.element.blur(), o()
        });
        var r = {
            hasFocus: !1,
            blur: o
        };

        function o() {
            r.hasFocus = !1, n.hide(), i.element.removeEventListener("keydown", d), i.element.removeEventListener("keyup", l), a.classList.remove("show"), document.body.classList.remove("onsearch")
        }

        function l(e) {
            var t = e.target.value;
            i.value !== t && (s.toggleClass(a, t.length > 2, "show"), i.put(t), n.show())
        }

        function c(e) {
            i.set(""), n.show(), a.classList.remove("show"), i.element.focus(), e && (e.stopPropagation(), e.preventDefault())
        }

        function d(e) {
            var t = e.keyCode;
            27 === t ? i.value ? c() : i.element.blur() : n.onkeypress(t, e), e.stopPropagation()
        }
        return r
    }), /*! */
    W.define("results", ["store", "$", "utils", "rootScope", "broadcast", "map", "recents", "query", "http", "geolocation", "Favs"], function(e, t, n, i, s, a, r, o, l, c, d) {
        return {
            el: t("#search"),
            marker: null,
            isOpen: !1,
            index: -1,
            mixRatio: [10, 9, 4, 4, 3, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
            opacity: [1, 1, 1, .95, .9, .8, .7, .6, .4, .2, .1],
            recents: [],
            hits: [],
            data: [],
            clickTimer: null,
            maxResults: 10,
            element: t("#search .results"),
            elementData: t("#search .results-data"),
            image: t('#search img[data-do="hit"]'),
            imageBox: t("#search .results-img"),
            onkeypress: function(e, n) {
                var i;
                switch (e) {
                    case 40:
                        this.colorize(1), n.preventDefault(), n.stopPropagation();
                        break;
                    case 38:
                        this.colorize(-1), n.preventDefault(), n.stopPropagation();
                        break;
                    case 9:
                    case 13:
                        (i = t(".active", this.element)) ? this.doAction(i, n): (this.colorize(null, 0), setTimeout(this.doAction.bind(this, t(".active", this.element), n), 1e3))
                }
            },
            doAction: function(e, t) {
                var n, i;
                e && e.dataset && (n = e.dataset.name, i = e.dataset.value, t && (t.preventDefault(), t.stopPropagation()), "next" === n ? this.show(this.data, parseInt(i)) : this.fireAction(this.data[i]))
            },
            fireAction: function(e) {
                var t = o.get();
                e.zoom = 7, e.name = e.name || e.title, e.source = "search";
                var a = "wx" === e.type ? "station" : e.icao ? "airport" : "detail";
                s.emit("rqstOpen", a, n.clone(e)), this.hide(), o.element.blur(), s.emit("log", "search/" + (e.key ? "recents" : "results")), r.addItem(e, t), l.post("/search/v3.0/stats/" + e.id, {
                    data: {
                        query: t,
                        lang: i.prefLang
                    }
                })
            },
            colorize: function(e, n) {
                var i = this.element.querySelectorAll("a", this.element);
                if (i.length) {
                    this.index = e ? Math.min(Math.max(this.index + e, 0), i.length - 1) : n;
                    var s = i[this.index],
                        a = t(".active", this.element);
                    a && a.classList.remove("active"), s.classList.add("active"), this.mapize(s)
                }
            },
            newItem: function(e, t, n, i, s) {
                var a = this,
                    r = document.createElement("a");
                return r.dataset.name = e, r.dataset.value = t, r.innerHTML = s, r.className = "type-" + i, r.ontouchend = r.onclick = function(e) {
                    a.doAction(r, e), e.preventDefault(), e.stopPropagation()
                }, r.onmouseenter = function() {
                    return a.colorize(null, n)
                }, r.onmouseleave = function() {
                    return r.classList.remove("active")
                }, r.onmousedown = function(e) {
                    e.preventDefault(), e.stopPropagation()
                }, r
            },
            load: function() {
                var e = this;
                o.showLoader(), this.element.classList.add("waiting"), l.get("/search/v3.0/" + this.pos.lat + "/" + this.pos.lon + "/" + o.get().replace(/\//g, " ") + "?lang=" + this.lang).then(function(t) {
                    var n = t.data;
                    void 0 === n && (n = {}), o.hideLoader(), e.hits = n.data, "2airports" === (n.header && n.header.type) ? s.emit("rqstOpen", "distance", e.hits) : e.display()
                }).catch(o.hideLoader)
            },
            show: function() {
                var t = this,
                    n = o.get();
                this.pos = c.getMyLatestPos(), this.lang = e.get("usedLang"), this.recents = r.loadRecents(n), this.hits = [], this.element.classList.remove("wide"), this.index = -1, this.display(), this.element.style.display = "block", this.element.classList.add("show"), this.isOpen = !0, this.clickTimer && clearTimeout(this.clickTimer), n.length > 1 && (this.clickTimer = setTimeout(function() {
                    return t.load(n)
                }, 300))
            },
            display: function() {
                var t = e.get("country"),
                    n = this.mixRatio[o.get().length] || 1;
                if (this.elementData.innerHTML = "", this.recents = this.recents.slice(0, n), this.hits.length && this.recents.length) {
                    var i = this.recents.map(function(e) {
                        return e.key
                    });
                    this.hits = this.hits.filter(function(e) {
                        return i.indexOf(d.key(e)) < 0
                    })
                }
                this.data = this.recents.concat(this.hits);
                for (var s = 0, a = Math.min(this.data.length, this.maxResults); s < a; s++) {
                    var r = this.data[s],
                        l = r.title,
                        c = void 0;
                    l === r.region && (r.region = null), (l === r.country || "us" !== r.cc && t === r.cc) && (r.country = null), r.icao ? c = r.icao : "wx" === r.type && r.stationId ? (c = r.stationId.replace(/^.*-/, ""), l = "Wx station: " + (l || c)) : c = r.region && r.country ? r.region + ", " + r.country : r.country || r.region || "";
                    var u = this.newItem("hit", s, s, r.type, l + (c ? " <span>" + c + "</span>" : ""));
                    u.style.opacity = this.opacity[s], this.elementData.appendChild(u)
                }
            },
            hide: function() {
                this.isOpen = !1, this.element.classList.remove("show"), this.element.style.display = "none", this.element.classList.remove("wide"), this.marker && a.removeLayer(this.marker), this.image.src = n.emptyGIF
            },
            mapizeTimeout: null,
            mapize: function(e) {
                var t = this;
                if (e && "hit" === e.dataset.name) {
                    this.marker && a.removeLayer(this.marker);
                    var i = e.dataset.value,
                        s = this.data[i],
                        r = +s.lat,
                        o = +s.lon,
                        l = s.bounds;
                    this.marker = L.marker([r, o], {
                        icon: a.myMarkers.icon
                    }).addTo(a), this.element.classList.add("wide"), clearTimeout(this.mapizeTimeout), this.mapizeTimeout = setTimeout(function() {
                        t.element.classList.add("waiting")
                    }, 300), this.image.onload = function() {
                        clearTimeout(t.mapizeTimeout), t.element.classList.remove("waiting"), n.toggleClass(t.imageBox, !l, "show-pointer")
                    }, this.image.onerror = function() {
                        clearTimeout(t.mapizeTimeout), t.element.classList.remove("waiting")
                    }, this.image.src = "https://node-s.windy.com/imaker/map" + (l ? "?bbox=" + l : "?c=" + r + "," + o + "&z=10"), this.image.dataset.value = i
                }
            }
        }
    }), /*! */
    W.define("recents", ["Favs", "favs"], function(e, t) {
        return e.instance({
            ident: "recents4",
            loadRecents: function(e) {
                var n, i, s;
                return i = this.get(2, e, "timestamp"), n = this.get(7, e, "counter", i), i = i.concat(n), s = t.get(7, e, "counter", i), i.concat(s)
            },
            _init: function() {
                this.load()
            },
            addItem: function(e, t) {
                this.isFav(e) ? this.hit(e, t) : this.add(e, t)
            },
            add: function(e, t) {
                var n = this.key(e);
                e.counter = 1, e.timestamp = Date.now(), e.query = t, e.key = n, this.data[n] = e, this.onchange(), this.save()
            }
        })
    }), /*! */
    W.define("query", ["$"], function(e) {
        return {
            element: e("#search #q"),
            value: "",
            put: function(e) {
                this.value = e
            },
            set: function(e) {
                this.put(e), this.element.value = e
            },
            get: function() {
                return this.element.value && this.element.value.trim() || ""
            },
            showLoader: function() {
                this.element.classList.add("search-loading")
            },
            hideLoader: function() {
                this.element.classList.remove("search-loading")
            }
        }
    }), /*! */
    W.define("Poi", ["map", "Class"], function(e, t) {
        return t.extend({
            minZoom: 5,
            pluginIdent: "detail",
            popupOffset: [20, -15],
            ident: "empty",
            _init: function() {
                this.markers = {}, this.data = [], this.layer = new L.PoisOverlay(this.ident), this.prevZoom = 0, this.isActive = !1, this.syncCounter = 0, this.latestLoaded = {}
            },
            activate: function() {
                this.isActive = !0, e.addLayer(this.layer), this.download(), e.on("zoomstart", this.delete, this), e.on("zoomend", this.render, this)
            },
            deactivate: function() {
                this.isActive = !1, this.lastUrl = null, this.data = [], this.cancel(), e.removeLayer(this.layer), e.off("zoomstart", this.delete, this), e.off("zoomend", this.render, this)
            },
            deleteMarker: function(e) {
                this.layer.replaceMarker(e, ""), delete this.markers[e]
            },
            display: function() {
                return []
            },
            render: function() {
                var e = this.data,
                    t = e.length,
                    n = "";
                if (!this.cancelRqstd) {
                    0;
                    for (var i = 0; i < t; i += this.items) {
                        var s = e[i];
                        if (!(s in this.markers)) {
                            var a = this.display(s, i);
                            if (a.html || a.attrs) {
                                var r = L.latLng(e[i + 1], e[i + 2]);
                                this.markers[s] = r, n += this.layer.getHtml(s, r, a)
                            }
                        }
                    }
                    this.layer.addPois(n, this.markers)
                }
            },
            delete: function() {
                this.markers = {}, this.lastUrl = null, this.layer.removePois()
            },
            cancel: function() {
                this.syncCounter++
            },
            redraw: function() {}
        })
    }), /*! */
    W.define("Favs", ["storage", "utils", "Class"], function(e, t, n) {
        return n.extend({
            ident: null,
            key: function(e) {
                return "string" == typeof e ? e : e.key ? e.key : "station" === e.type ? e.id : "airport" === e.type || e.icao ? e.icao : "alert" === e.type || e.alertId ? e.alertId : t.normalizeLatLon(e.lat) + "/" + t.normalizeLatLon(e.lon)
            },
            add: function(e) {
                if (!t.isValidLatLonObj(e)) return !1;
                var n = this.key(e),
                    i = {
                        key: n,
                        lat: +e.lat,
                        lon: +e.lon,
                        name: e.name || e.lat + ", " + e.lon,
                        type: e.type || "fav",
                        timestamp: Date.now(),
                        counter: 1
                    };
                return "alert" === e.type ? i.alertId = e.alertId : "airport" === e.type ? i.icao = e.icao : "station" === e.type && (i.stationId = e.stationId || e.id || e.key), this.data[n] = i, this.onchange(), this.save(), !0
            },
            isFav: function(e) {
                return !!this.data[this.key(e)]
            },
            save: function() {
                this.lastModified = Date.now(), e.put(this.ident, this.data), e.put(this.ident + "_ts", this.lastModified), e.put(this.ident + "_trash", this.trash)
            },
            load: function() {
                this.data = e.get(this.ident) || {}, this.trash = e.get(this.ident + "_trash") || {}, t.each(this.data, function(e, t) {
                    e.type || (e.type = "fav"), e.key = t
                })
            },
            onchange: function() {},
            rename: function(e, t) {
                var n = this.data[this.key(e)];
                n && (n.name = n.title = t, n.timestamp = Date.now(), this.onchange(), this.save())
            },
            remove: function(e) {
                var t = this.key(e);
                this.data[t] && (this.trash[t] = {
                    timestamp: Date.now()
                }, delete this.data[t]), this.onchange(), this.save()
            },
            getAll: function() {
                return this.data
            },
            hit: function(e) {
                var t = this.data[this.key(e)];
                t && (t.counter ? t.counter++ : t.counter = 1, t.timestamp = Date.now(), this.save())
            },
            sortFavs: function(e, t, n) {
                var i = this,
                    s = Object.keys(this.data);
                if (t = t || "counter", e) try {
                    var a = new RegExp("(?: |^)" + e, "i");
                    s = s.filter(function(e) {
                        return a.test(i.data[e].name) || a.test(i.data[e].icao) || a.test(i.data[e].query)
                    })
                } catch (e) {
                    console.error(e)
                }
                return n && (s = s.filter(function(e) {
                    return !n.includes(e)
                })), s = s.sort(function(e, n) {
                    return i.data[n][t] - i.data[e][t]
                })
            },
            get: function(e, n, i, s) {
                for (var a, r, o = [], l = s ? s.map(function(e) {
                        return e.key
                    }) : null, c = this.sortFavs(n, i, l), d = 0; d < Math.min(e, c.length); d++) r = c[d], (a = t.clone(this.data[r])).title || (a.title = a.name), o[d] = a;
                return o
            }
        })
    }), /*! */
    W.define("WindyMap", ["utils", "rootScope"], function(e, t) {
        return L.Map.extend({
            minZoom: 3,
            myMarkers: {
                icon: L.divIcon({
                    className: "icon-dot",
                    html: '<div class="pulsating-icon"></div>',
                    iconSize: [10, 10],
                    iconAnchor: [5, 5]
                }),
                pulsatingIcon: L.divIcon({
                    className: "icon-dot",
                    html: '<div class="pulsating-icon repeat"></div>',
                    iconSize: [10, 10],
                    iconAnchor: [5, 5]
                }),
                myLocationIcon: L.divIcon({
                    className: "icon-dot mylocation",
                    html: '<div class="pulsating-icon repeat"></div>',
                    iconSize: [10, 10],
                    iconAnchor: [5, 5]
                }),
                webcamIcon: L.divIcon({
                    className: "iconfont icon-webcam",
                    iconSize: [10, 10],
                    iconAnchor: [5, 5]
                })
            },
            center: function(t, n) {
                void 0 === n && (n = !1);
                var i = t.zoom ? e.bound(t.zoom, this.minZoom, 20) : this.getZoom();
                if (t.paddingLeft || t.paddingTop) {
                    var s = t.paddingLeft || 0,
                        a = t.paddingTop || 0,
                        r = this.project([t.lat, t.lon], i).subtract([s / 2, a / 2]),
                        o = this.unproject(r, i);
                    this.setView(o, i, {
                        animate: n
                    })
                } else this.setView([t.lat, t.lon], i, {
                    animate: n
                });
                return this
            },
            ensurePointVisibleX: function(e, t, n) {
                var i = this.latLngToContainerPoint([e, t]).x;
                i < n && this.panBy([i - n, 0])
            },
            ensurePointVisibleY: function(e, n, i) {
                var s = this.latLngToContainerPoint([e, n]).y;
                s > t.map.height - i && this.panBy([0, s - (t.map.height - i)])
            },
            setZoomCenter: function(e, t) {
                return this._zoomCenter = L.point(e, t), this
            },
            removeZoomCenter: function() {
                return this._zoomCenter = void 0, this
            }
        })
    }), /*! */
    W.define("LabelsLayer", ["products", "http", "rootScope", "utils", "overlays", "store", "broadcast", "singleclick"], function(e, t, n, i, s, a, r, o) {
        return L.GridLayer.extend({
            options: {
                minZoom: 3,
                maxZoom: 11,
                pane: "markerPane",
                className: "labels-layer",
                updateWhenIdle: !0,
                updateWhenZooming: !1,
                keepBuffer: n.isMobileOrTablet ? 2 : 4
            },
            tempConverter: s.temp.convertNumber,
            cityDivs: {},
            latestTs: 0,
            latestIndex: 0,
            ts: a.get("timestamp"),
            hasHooks: !1,
            syncCounter: 0,
            onAdd: function() {
                this.hasHooks || (this.updateProduct(), this.createTilesUrl(), o.on("poi-label", this.onClick, this), a.on("timestamp", this.onTsChange, this), a.on("usedLang", this.updateLabels, this), a.on("englishLabels", this.updateLabels, this), a.on("product", this.updateProduct.bind(this, "refresh")), r.on("metricChanged", this.refreshWeather, this), this.hasHooks = !0), L.GridLayer.prototype.onAdd.call(this)
            },
            createTilesUrl: function() {
                var e = a.get("englishLabels") ? "en" : a.get("usedLang");
                this.tilesUrl = n.tileServer + "/../cdn/storage/labels", this.fcstUrl = "http://www.advaned-offline.map/test-windy/forecast/citytile/v1.3"
            },
            updateLabels: function() {
                this.createTilesUrl(), this._reset()
            },
            updateProduct: function(t) {
                var n = a.get("product");
                e[n].labelsTemp || (n = "ecmwf");
                var i = e[n].refTime();
                if ((this.product !== n || this.refTime !== i) && (this.product = n, this.refTime = i, t))
                    for (var s in this.cityDivs) this.loadFcstTile(this.cityDivs[s])
            },
            onClick: function(e, t) {
                var n = t.id,
                    i = t.label;
                if (n) {
                    var s = n.split("/"),
                        a = s[0],
                        o = s[1];
                    r.emit("rqstOpen", "detail", {
                        lat: a,
                        lon: o,
                        name: i,
                        source: "label",
                        sourceEl: e
                    })
                }
            },
            onTsChange: function(e) {
                Math.abs(e - this.ts) > 1.5 * i.tsHour && (this.ts = e, this.refreshWeather())
            },
            toArray: function() {
                var e = [];
                for (var t in this.cityDivs) e = e.concat(this.cityDivs[t].labels);
                return e
            },
            refreshWeather: function() {
                for (var e in this.cityDivs)
                    for (var t = this.cityDivs[e], n = t.start, i = t.step, s = t.labels, a = 0; a < s.length; a++) this.renderWeather(n, i, s[a])
            },
            _animateZoom: function() {
                this._removeAllTiles()
            },
            _reset: function() {
                this.redraw()
            },
            loadFcstTile: function(e) {
                e.labels.length && t.get(this.fcstUrl + "/" + this.product + "/" + e.urlFrag).then(this.onFcstLoaded.bind(this, this.syncCounter, e)).catch(function(e) {
                    0
                })
            },
            onTileLoaded: function(e, t, n, i) {
                var s = i.data;
                if (e === this.syncCounter) return this.cityDivs[t.x + ":" + t.y] = this.renderTile(n, t, s)
            },
            onFcstLoaded: function(e, t, n) {
                var i = this,
                    s = n.data;
                if (s && "object" == typeof s && e === this.syncCounter) {
                    var a = s.start,
                        r = s.step;
                    t.start = a, t.step = r, t.labels.forEach(function(e) {
                        var t = e.id;
                        t in s && (e.data = s[t], i.renderWeather(a, r, e))
                    })
                }
            },
            createTile: function(e, n) {
                var i = this,
                    s = e.z + "/" + e.x + "/" + e.y,
                    a = L.DomUtil.create("div", "leaflet-tile");
                return a.style.width = a.style.height = this.getTileSize() + "px", a.onselectstart = a.onmousemove = L.Util.falseFn, t.get(this.tilesUrl + "/" + s + ".json").then(this.onTileLoaded.bind(this, this.syncCounter, e, a)).then(function(e) {
                    e && (e.urlFrag = s, i.loadFcstTile(e), n(void 0, a))
                }).catch(n), a
            },
            renderTile: function(e, t, n) {
                for (var s = this._getTilePos(t), a = s.x, r = s.y, o = this._map.getPixelOrigin(), l = o.x, c = o.y, d = 256 << t.z, u = [], h = 0; h < n.length; ++h) {
                    var f = n[h],
                        m = f[0],
                        p = f[1],
                        g = f[2],
                        v = f[3],
                        y = f[4],
                        w = f[5],
                        b = f[6],
                        T = "ci" !== g.substr(0, 2),
                        L = T ? m : y.toFixed(2) + "/" + v.toFixed(2),
                        S = Math.floor(i.lonDegToXUnit(v) * d - l - w / 2) - a,
                        A = Math.floor(i.latDegToYUnit(y) * d - c - b / 2) - r,
                        E = document.createElement("div");
                    E.textContent = E.dataset.label = p, E.dataset.id = L, E.dataset.poi = "label", E.className = g, E.style.transform = "translate(" + S + "px, " + A + "px)", E.style.width = w + "px", T || u.push({
                        id: L,
                        el: E
                    }), e.appendChild(E)
                }
                return {
                    labels: u
                }
            },
            renderWeather: function(e, t, n) {
                var s = n.el,
                    a = n.data;
                if (s)
                    if (a && a.length) {
                        var r = this.ts - e,
                            o = Math.round(r / (t * i.tsHour));
                        o >= 0 && o < a.length ? s.dataset.temp = this.tempConverter(a[o]) + "°" : delete s.dataset.temp
                    } else delete s.dataset.temp
            }
        })
    }), /*! */
    W.define("map", ["render", "plugins", "WindyMap", "rootScope", "utils", "store", "broadcast", "geolocation", "router"], function(e, t, n, i, s, a, r, o, l) {
        L.GridLayer.prototype.options.zIndex = void 0;
        var c, d = 0,
            u = "location" === a.get("startUp") ? a.get("homeLocation") : l.sharedCoords || o.getMyLatestPos();
        "fallback" === u.source && r.once("newLocation", function(e) {
            e.zoom = 5, c.center(e, !0)
        });
        var h = ["vn", "in"].includes(a.get("country")),
            f = h ? 11 : 18,
            m = {
                sznmap: i.sznMap,
                winter: "https://mapserver.mapy.cz/winter-m/{z}-{x}-{y}",
                sat: "https://{s}.aerial.maps.api.here.com/maptile/2.1/maptile/newest/satellite.day/{z}/{x}/{y}/256/jpg?" + i.hereMapsID
            };
        c = new n("map-container", {
            zoomControl: !1,
            keyboard: !1,
            worldCopyJump: !0,
            zoomAnimationThreshold: 3,
            fadeAnimation: !1,
            center: [+u.lat, +u.lon],
            zoom: +u.zoom || 5,
            minZoom: 3,
            maxZoom: f,
            maxBounds: [
                [-90, -720],
                [90, 720]
            ]
        }), v(), y(), g(a.get("graticule")), c.on("moveend", v), c.on("movestart", r.emit.bind(r, "movestart")), r.on("zoomIn", c.zoomIn, c), r.on("zoomOut", c.zoomOut, c), r.on("updateBasemap", y), a.on("map", y), a.on("graticule", g), e.on("toggleSeaMask", function(e) {
            e && !c.seaLayer ? (c.seaLayer = L.tileLayer(i.tileServer + "/tiles/v9.0/grayland/{z}/{x}/{y}.png", {
                minZoom: 3,
                maxZoom: 11,
                updateWhenIdle: !!i.isMobileOrTablet,
                updateWhenZooming: !1,
                keepBuffer: i.isMobileOrTablet ? 1 : 4
            }).addTo(c), c.seaLayer.getContainer().classList.add("sea-mask-layer")) : !e && c.seaLayer && (c.removeLayer(c.seaLayer), c.seaLayer = null)
        }), c.on("contextmenu", r.emit.bind(r, "rqstOpen", "contextmenu"));
        var p = null;

        function g(e) {
            e && !p && t.graticule.load().then(function() {
                p = (new L.LatLngGraticule).addTo(c)
            }), !e && p && (c.removeLayer(p), p = null)
        }

        function v() {
            var e = c.getCenter(),
                t = c.getBounds(),
                n = c.getSize(),
                a = Math.round(c.getZoom());
            i.map = {
                source: "maps",
                lat: e.lat,
                lon: e.wrap().lng,
                south: t._southWest.lat,
                north: t._northEast.lat,
                east: t._northEast.lng,
                west: t._southWest.lng,
                width: n.x,
                height: n.y,
                zoom: a
            }, a !== d && (s.replaceClass(/zoom\d+/, "zoom" + a), d = a), r.emit("mapChanged", i.map)
        }

        function y() {
            var e = i.tileServer + "/../cdn/storage/tiles" + (i.isRetina ? "-retina" : "") + "/{z}/{x}/{y}.png",
                t = a.get("map"),
                n = {
                    url: m[t] || m.sznmap,
                    subdomains: "1234"
                },
                s = "map" === a.get("overlay"),
                r = s && !h ? {
                    18: n
                } : {
                    11: {
                        url: e
                    },
                    18: n
                };
            c.baseLayer && c.removeLayer(c.baseLayer), c.baseLayer = L.tileLayerMulti(r, {
                detectRetina: !1,
                minZoom: 3,
                maxZoom: 18,
                updateWhenIdle: !!i.isMobileOrTablet,
                updateWhenZooming: !1,
                className: "basemap-layer",
                keepBuffer: i.isMobileOrTablet ? 1 : 4
            }), document.body.dataset.map = t, c.baseLayer.addTo(c)
        }
        return c
    }), /*! */
    W.define("picker", ["Evented"], function(e) {
        return e.instance({
            ident: "picker"
        })
    }), /*! */
    W.define("singleclick", ["map", "Evented", "rootScope", "store", "broadcast", "plugins"], function(e, t, n, i, s, a) {
        var r = n.isMobile;
        return t.instance({
            ident: "singleclick",
            hpJustClosed: !1,
            priorities: ["detail", "sounding", "distance", "rplanner", "cap-alerts"],
            _init: function() {
                t._init.call(this), e.on("singleclick", this.opener, this), r && i.on("hpShown", this.hpShown, this)
            },
            hpShown: function(e) {
                var t = this;
                e || (this.hpJustClosed = !0, setTimeout(function() {
                    return t.hpJustClosed = !1
                }, 1e3))
            },
            parseEvent: function(e) {
                return {
                    x: e.containerPoint.x,
                    y: e.containerPoint.y,
                    lat: e.latlng.lat,
                    lon: e.latlng.lng,
                    source: "singleclick"
                }
            },
            opener: function(e) {
                if (!this.hpJustClosed) {
                    var t = e.originalEvent && e.originalEvent.target,
                        n = t && t.dataset;
                    if (n && n.poi) this.emit("poi-" + n.poi, t, n);
                    else {
                        for (var i = this.parseEvent(e), r = 0; r < this.priorities.length; r++) {
                            var o = this.priorities[r];
                            if (a[o].isOpen) return void this.emit(o, i)
                        }
                        s.emit("rqstOpen", "picker", i)
                    }
                }
            }
        })
    }), /*! */
    W.define("favs", ["$", "store", "picker", "http", "broadcast", "utils", "Favs", "Evented"], function(e, t, n, i, s, a, r, o) {
        return o.instance(r, {
            ident: "favs",
            latestParams: {},
            triggeredAlerts: 0,
            types: ["alert", "station", "fav", "airport"],
            _init: function() {
                o._init.call(this), this.load(), this.debouncedUpdate = a.debounce(this.update.bind(this), 200), this.onchange = a.debounce(this.emitChange.bind(this), 1e3), s.once("dependenciesResolved", this.checkAlerts, this), t.on("detailLocation", this.debouncedUpdate), s.on("airportLoaded", this.debouncedUpdate), s.on("stationLoaded", this.debouncedUpdate), n.on("pickerOpened", this.debouncedUpdate), n.on("pickerMoved", this.debouncedUpdate)
            },
            update: function(e) {
                e && (this.latestParams = e), this.updateCSS(), this.favsMenuOpened && (s.emit("rqstClose", "fav-alert-menu"), this.favsMenuOpened = !1)
            },
            hasTimestamps: function(e) {
                return (e = this.getAlert(e)) && e.alertProps && e.alertProps.timestamps || null
            },
            add: function(e) {
                e.type && !this.types.includes(e.type) && delete e.type, r.add.call(this, e)
            },
            getAlert: function(e) {
                if ("string" == typeof e) return this.data[e];
                this.getArray().filter(function(t) {
                    return "alert" === t.type && a.isNear(e, t)
                })
            },
            getArray: function() {
                var e = this;
                return Object.keys(this.data).map(function(t) {
                    return e.data[t]
                })
            },
            updateCSS: function() {
                a.toggleClass(e("#fav"), this.isFav(this.latestParams), "isfav")
            },
            emitChange: function() {
                this.emit("favsChanged")
            },
            setAlertProps: function(e, t) {
                var n = this.data[this.key(e)];
                n ? (n.alertProps = t, this.onchange(), this.save()) : window.wError("favExtended", "Missing fav in setAlertProps " + JSON.stringify(e))
            },
            checkAlerts: function() {
                var e = Date.now(),
                    t = 12 * a.tsHour,
                    n = this.getArray().filter(function(e) {
                        return "alert" === e.type
                    });
                if (n.length) {
                    var i = n.filter(function(n) {
                        return !n.alertProps || e - n.alertProps.checked > t
                    }).map(this.checkAlert.bind(this));
                    i.length ? Promise.all(i).then(this.onAlertsChecked.bind(this, n)) : this.onAlertsChecked(n)
                }
            },
            onAlertsChecked: function(e) {
                this.triggeredAlerts = e.filter(function(e) {
                    return e.alertProps && e.alertProps.triggered
                }).length, this.emit("alertsChecked", this.triggeredAlerts)
            },
            checkAlert: function(e) {
                var t = this;
                return new Promise(function(n) {
                    i.get("/users/alertCheck/" + e.alertId, {
                        cache: !1
                    }).then(function(i) {
                        var s = i.data,
                            a = !1;
                        if ("missing" === s.status) console.warn("Deleting the fav", e.alertId), t.remove(e.alertId);
                        else {
                            var r = s.alert,
                                o = s.timestamps || [];
                            a = o.length > 0, t.setAlertProps(e, {
                                suspended: r.suspended,
                                checked: Date.now(),
                                seen: 0,
                                triggered: a,
                                timestamps: o
                            })
                        }
                        n()
                    })
                })
            }
        })
    }), /*! */
    W.define("pois", ["Poi", "utils", "broadcast", "favs", "singleclick"], function(e, t, n, i, s) {
        var a = {};
        return a.empty = e.instance({
            ident: "empty",
            displayed: !1,
            _init: function() {},
            download: function() {},
            render: function() {},
            cancel: function() {},
            delete: function() {},
            activate: function() {},
            deactivate: function() {}
        }), a.favs = e.instance({
            ident: "favs",
            displayed: !1,
            items: 5,
            type2icon: {
                alert: "&#xe027",
                airport: "Q",
                station: "&#xe008",
                fav: "k"
            },
            _init: function() {
                e._init.call(this), i.on("favsChanged", this.repaint, this), s.on("poi-favs", this.onclick, this)
            },
            repaint: function() {
                this.isActive && (this.delete(), this.data = [], this.download())
            },
            download: function() {
                var e = this;
                this.data.length || (t.each(i.getAll(), function(t, n) {
                    var i = t.lat,
                        s = t.lon,
                        a = t.type,
                        r = t.name;
                    e.data.push(n, +i, +s, a, r)
                }), this.render())
            },
            display: function(e, t) {
                return {
                    attrs: ['data-icon="' + (this.type2icon[this.data[t + 3]] || "k") + '"', 'data-text="' + (this.data[t + 4] || "") + '"', 'data-id="' + e + '"', 'data-poi="favs"']
                }
            },
            onclick: function(e, s) {
                var a = s.id,
                    r = i.getAll(),
                    o = t.clone(r[a]),
                    l = o.type,
                    c = "airport" === l || "station" === l ? l : "detail";
                o.source = "poi-icon", n.emit("rqstOpen", c, o)
            },
            cancel: function() {}
        }), a
    }), /*! */
    W.define("poisCtrl", ["pois", "store", "utils", "broadcast", "plugins"], function(e, t, n, i, s) {
        var a = "empty";

        function r(e) {
            "favs" !== e && "empty" !== e ? (t.off("pois", r), s.pois.open().then(function() {
                o(e);
                var s = n.debounce(c, 1500);
                i.on("paramsChanged", s), i.on("mapChanged", s), i.on("metricChanged", l), t.on("pois", o)
            })) : o(e)
        }

        function o(t) {
            n.replaceClass(/selectedpois-\S+/, "selectedpois-" + t), e[a].deactivate(), e[t].activate(), "empty" === t && e.favs.isActive ? e.favs.deactivate() : "empty" === t || e.favs.isActive || e.favs.activate(), a = t
        }

        function l() {
            e[t.get("pois")].redraw(!0)
        }

        function c() {
            e[t.get("pois")].redraw()
        }
        i.once("redrawFinished", function() {
            var e = t.get("pois");
            "favs" === e || "empty" === e ? (o(e), t.on("pois", r)) : r(e)
        })
    }), /*! */
    W.define("labelsLayer", ["LabelsLayer", "map"], function(e, t) {
        return (new e).addTo(t)
    }),
    /*! */
    function() {
        function e() {
            var e = W.require("broadcast");
            W.loadOrphanedModules(), e.emit("dependenciesResolved")
        }
        window.top === window.self ? (W.require(["utils", "broadcast", "storage", "colors", "geolocation", "products", "overlays", "store"]), "loading" !== document.readyState ? e() : document.addEventListener("DOMContentLoaded", e), document.addEventListener("DOMContentLoaded", e)) : document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("unlegal-embed").style.display = "block"
        })
    }();