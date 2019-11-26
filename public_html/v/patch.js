W.patchVersion = "2019-10-02-fixed-click-on-donate-promo", /*! */
    W.patchHtml = '<div class="weather-box clickable-size size-l fg-white bg-transparent" id="donate-promo-goals" data-do="rqstOpen,donate"><img src="https://www.windy.com/img/donate/Windy-needs-your-help.svg"> <span class="button size-s btn-white" data-t="DONATE"></span><p class="size-s"></p></div>', /*! */
    W.patchLang = {
        OBSOLETE_APP: "This version of Windy.com App is <b>obsolete</b> and will stop working soon. Please <b>update your Windy.com App to the latest version</b>."
    }, /*! */
    /*! */
    W.tag("patch", "", "#plugin-patch{display:none !important}#promo-obsolete-app{text-shadow:0px 0px 4px black;color:white;display:block;line-height:1.6;text-align:center;overflow:hidden;letter-spacing:.1em;padding:.5em 1em}#donate-promo-goals{padding:10px 15px;letter-spacing:.02em;margin-bottom:5px}#donate-promo-goals p>div{margin:1em 0}#donate-promo-goals img{width:200px;-webkit-filter:drop-shadow(0 0 1px rgba(0,0,0,0.8));filter:drop-shadow(0 0 1px rgba(0,0,0,0.8));position:relative;left:-5px}#donate-promo-goals .third{font-size:12px;padding:2px 15px;border-radius:15px}#donate-promo-goals .button{position:absolute;top:5px;right:10px}.new::after{font-family:sans-serif;content:'New';font-size:9px;color:yellow;position:absolute;display:block;font-weight:bold;top:0;right:0;transform:rotate(45deg);text-shadow:0 0 2px rgba(0,0,0,0.63)}.settings-new::after{font-family:sans-serif;content:'New';font-size:9px;color:yellow;position:absolute;display:block;font-weight:bold;top:0;right:0;transform:rotate(45deg);text-shadow:0 0 2px rgba(0,0,0,0.63)}.settings-new::after{display:inline-block;position:relative;font-size:11px;top:-10px}", "", function() {
        var a = W.require("2019-10-02-fixed-click-on-donate-promo/donationGoals"),
            r = (W.require("Window"), W.require("broadcast")),
            o = W.require("$"),
            e = (W.require("plugins"), W.require("http")),
            s = W.require("trans"),
            t = W.require("log"),
            d = W.require("promo"),
            n = W.require("utils"),
            i = W.require("rootScope"),
            l = W.require("store"),
            u = ["at", "ba", "be", "bg", "ch", "cy", "de", "dk", "ee", "es", "fi", "fr", "gr", "hr", "hu", "ie", "il", "is", "it", "lt", "lu", "lv", "md", "me", "mk", "mt", "nl", "no", "pl", "pt", "ro", "rs", "se", "si", "sk", "uk", "cz"],
            c = function(t) {
                var e = function(t) {
                    var e = t.split(".").map(Number);
                    return 1e3 * e[0] + 100 * e[1] + e[2]
                };
                return e(t) <= e(i.version)
            },
            p = l.get("country"),
            h = [{
                id: "obsoleteApp19",
                end: "2019-12-31T20:00:00.000Z",
                counter: 1e3,
                delay: 0,
                filter: function() {
                    return "mobile" === i.target && !c("20.0.0")
                },
                run: function() {
                    var t = ["#d49500", "#d40000", "#d4009b", "#8400d4", "#2200d4", "#0d869a", "#177900", "#ad7100"];
                    y('<div id="promo-obsolete-app" style="background: ' + t[Math.round(Math.random() * (t.length - 1))] + '" data-t="OBSOLETE_APP"></div>')
                }
            }, {
                id: "donateGoals3",
                end: "2019-12-31T20:00:00.000Z",
                counter: 30,
                delay: 24 * n.tsHour,
                filter: function() {
                    return ("mobile" === i.target && c("20.0.0") || "index" === i.target && !i.isMobile && !i.isTablet) && 3 < i.sessionCounter && !(0 < l.get("donations").length)
                },
                run: function() {
                    var i = this,
                        t = "https://www.windy.com/v/20.9.0.ind.22c2/lang/donate/" + l.get("usedLang") + ".json";
                    // e.get(t).then(function(t) {
                    //     var e = t.data;
                    //     Object.assign(s, e);
                    //     var n = y(W.patchHtml);
                    //     a(u.includes(p)), d.hitCounter(i.id);
                    //     var o = function() {
                    //         return r.emit("rqstOpen", "donate")
                    //     };
                    //     n.ontouchstart = o, n.onmousedown = o
                    // })
                }
            }],
            g = [{
                id: "satPromo",
                end: "2020-01-01T00:00:00.000Z",
                counter: 10,
                delay: 0,
                filter: function() {
                    return !i.isMobileOrTablet && 3 < i.sessionCounter
                },
                run: function() {
                    "satellite" === l.get("overlay") || t.has("ov/satellite") || (d.hitCounter(this.id), setTimeout(function() {
                        var t = o('#overlay > a[data-do="unfold,radarSat"] > div.menu-text'),
                            e = o('#overlay > a[data-do="set,satellite"] > div.menu-text');
                        t && (t.classList.add("shaky"), e.classList.add("new"), setTimeout(function() {
                            t.classList.remove("shaky"), t.classList.add("new")
                        }, 5e3), setTimeout(function() {
                            t.classList.remove("new"), e.classList.remove("new")
                        }, 15e3))
                    }, 2e3))
                }
            }, {
                id: "settingsMobile",
                end: "2021-01-01T00:00:00.000Z",
                counter: 20,
                delay: 0,
                filter: function() {
                    return i.isMobile && c("20.10.0")
                },
                run: function() {
                    var e = this;
                    r.on("pluginOpened", function(t) {
                        "menu" === t && setTimeout(function() {
                            var t = o('#plugin-menu [data-do="rqstOpen,settings"]');
                            t.classList.add("shaky"), t.classList.add("settings-new"), d.hitCounter(e.id), setTimeout(function() {
                                t.classList.remove("shaky")
                            }, 7e3)
                        }, 1e3)
                    })
                }
            }],
            f = Date.now(),
            m = function(t) {
                return t.filter(function(t) {
                    return Date.now() < new Date(t.end).getTime()
                }).filter(function(t) {
                    return t.filter()
                }).filter(function(t) {
                    if (d.getCounter2) {
                        var e = d.getCounter2(t.id),
                            n = e.ts,
                            o = e.displayed;
                        return 0 === o || o < t.counter && f - n > t.delay
                    }
                    return d.getCounter(t.id) < t.counter
                })
            },
            b = function() {
                return x(m(h)[0])
            };
        Object.assign(s, W.patchLang);
        var v = l.get("usedLang");

        function w() {
            m(g).forEach(x), l.get("hpShown") ? b() : l.once("hpShown", function(t) {
                return t && b()
            })
        }

        function y(t) {
            var e = o("#articles");
            e.insertAdjacentHTML("beforebegin", t);
            var n = e.previousSibling;
            return s.translateDocument(n.parentNode), l.on("hpShown", function(t) {
                !t && n && (n.outerHTML = "", n = null)
            }), n
        }

        function x(t) {
            t && (t.html && y(t.html), t.run ? t.run.call(t) : d.hitCounter(t.id))
        }
        "en" !== v && ["zh", "ja", "fr", "de", "pt", "ko", "it", "ru", "nl", "cs", "tr", "pl", "sv", "fi", "ro", "el", "hu", "hr", "ca", "da", "ar", "fa", "hi", "sk", "uk", "bg", "he", "is", "lt", "et", "vi", "sl", "sr", "id", "th", "nb", "es"].includes(v) ? (null == i.patchServer && (i.patchServer = "https://www.windy.com"), e.get(i.patchServer + "/patch/index/" + W.patchVersion + "/" + v + ".json").then(function(t) {
            var e = t.data;
            Object.assign(s, e), w()
        }).catch(w)) : w()
    }),
    /*! */
    W.define("2019-10-02-fixed-click-on-donate-promo/donationGoals", ["utils", "http", "trans", "$"], function(l, t, u, e) {
        var c, d, p = 5e5,
            h = "USD",
            g = null,
            n = [
                ["#d49500", "#9d0300"],
                ["#44cabe", "#435da7"],
                ["#3cc894", "#2b8825"],
                ["#df6ee1", "#6c2128"]
            ][Math.round(3 * Math.random())],
            f = n[0],
            m = n[1],
            b = function(t) {
                return t ? t.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : ""
            },
            v = function(a) {
                var r = Date.now(),
                    s = r + 4e3,
                    d = function() {
                        var t, e, n, o = Math.floor(l.smoothstep(r, s, Date.now()) * a),
                            i = l.bound(Math.floor(o / p * 1e3) / 10, .1, 100);
                        e = (t = {
                            raisedShown: o,
                            raisedPct: i
                        }).raisedShown, n = t.raisedPct, g.innerHTML = "<div>\n\t\t" + l.template(u.DON_DONATED2, {
                            users: b(c)
                        }) + ':\n\t\t<big class="size-l">' + b(e) + "&nbsp;" + h + '</big>\n\t</div>\n\t<div class="third" style="background: linear-gradient(to right, ' + f + " 0%, " + m + " " + n + "%,  #adadad " + n + '%, #adadad 100%);">\n\t\t' + l.template(u.DON_RAISED, {
                            raised: n
                        }) + "\n\t</div>", o < a && window.requestAnimationFrame(d)
                    };
                d()
            },
            o = function() {
                e("#donate-promo-goals").style.display = "none"
            };
        return function(s) {
            (g = e("#donate-promo-goals > p")) || o(), t.get("/payments/total", {
                cache: !1
            }).then(function(t) {
                var e = t.data,
                    n = e.eur,
                    o = e.usd,
                    i = e.count,
                    a = 1,
                    r = 1;
                s ? (h = "EUR", r = 1 / e.eurToUsd) : (p = 5e4 * Math.round(p * e.eurToUsd / 5e4), a = e.eurToUsd), d = Math.round(a * n + r * o), c = i, v(d)
            }).catch(o)
        }
    });