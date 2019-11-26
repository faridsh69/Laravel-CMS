/*! */

W.define("ovrAnimate", ["http", "format", "$", "rootScope", "utils"], function(e, t, n, i, a) {
    var o=null, l="https://ixxx.windy.com/gallery/overlays/", s=null, r=function(e, t) {
        var i=n(".loading", e);
        i&&a.toggleClass(i, t, "show")
    }
    , d=function(e, t) {
        return new Promise(function(n, i) {
            if(e!==s)i();
            else {
                var a=new Image;
                a.crossOrigin="Anonymous", a.onload=function() {
                    return n(a)
                }
                , a.onerror=i, a.src=function(e, t) {
                    return""+l+e+"/"+t+".jpg"
                }
                (e, t)
            }
        }
        )
    }
    , c=function(e, t, n) {
        n.length=Math.min(n.length, 50);
        var i=n.map(d.bind(null, t));
        r(e, !0);
        var a=function() {
            return r(e, !1)
        }
        ;
        Promise.all(i).then(m.bind(null, e, t, n)).then(a).catch(a)
    }
    , p=null, u=null, v=i.isRetina?800:400, g=i.isRetina?480:240, y=i.isRetina?-30:-15, m=function(e, i, a, o) {
        var l=o.length-1, r=0, d=n("canvas", e), c=d&&d.getContext("2d");
        d.width=v, d.height=g, clearTimeout(p), window.cancelAnimationFrame(u);
        var m=0, h=function() {
            var n=Date.now();
            if(i===s&&e)if(m&&n-m<30)u=window.requestAnimationFrame(h);
            else {
                if(c.drawImage(o[l], 0, y), !r||10==++r) {
                    var d=t.howOld( {
                        translate: !0, ts: 1e3*+a[l]
                    }
                    );
                    r=0, e.dataset.updated=d
                }
                m=n, --l<0?(l=o.length-1, r=0, p=setTimeout(h, 1300)):u=window.requestAnimationFrame(h)
            }
        }
        ;
        h()
    }
    ;
    return {
        bgUrl:l, loadManifest:function() {
            o||e.get(l+"manifest.json").then(function(e) {
                var t=e.data;
                return o=t
            }
            )
        }
        , onMouseOver:function(e, t, n) {
            s=t, setTimeout(function() {
                if(s===t&&o&&t in o) {
                    var n=o[t];
                    n.length<10||c(e, t, n)
                }
            }
            , 100)
        }
        , onMouseOut:function(e) {
            s=null, r(e, !1), delete e.dataset.updated
        }
    }
}

),

/*! */

W.define("ovrSearch", ["utils", "overlays", "rootScope", "$", "trans"], function(e, t, n, i, a) {
    var o, l, s=n.overlays.slice();
    s.splice(3, 0, "satelliteIRBT");
    var r=!1;
    function d() {
        var n=s.map(function(e) {
            return {
                el: i('[data-overlay="'+e+'"]', o.menu), text: e+" "+a[t[e].trans]
            }
        }
        ).filter(function(e) {
            return e.el
        }
        );
        o.search.onkeydown=function(e) {
            return e.stopPropagation()
        }
        , o.search.onkeyup=function(t) {
            var i=t.target.value;
            if(0===i.length)c();
            else {
                r||(l.classList.add("searching"), o.cancel.classList.add("show"), o.switch.classList.remove("show"), o.quick.classList.add("hide"), r=!0);
                var a=0, s=new RegExp("\\b"+i, "i");
                n.forEach(function(t) {
                    var n=t.el, i=t.text, o=s.test(i);
                    o&&a++, e.toggleClass(n, !o, "foiled")
                }
                ), o.notFound.style.display=a?"none":"block"
            }
        }
    }
    function c() {
        o.menu.querySelectorAll("[data-overlay]").forEach(function(e) {
            return e.classList.remove("foiled")
        }
        ), l.classList.remove("searching"), o.search.value="", o.notFound.style.display="none", o.cancel.classList.remove("show"), o.switch.classList.add("show"), r=!1
    }
    return {
        init:function(e) {
            o=e.refs, l=e.node, o.search.addEventListener("focus", d), o.cancel.onclick=c
        }
        , resetSearch:c, overlaysList:s
    }
}

),

/*! */

W.tag("overlays", '<div class="plugin-content"><input type="text" data-placeholder="SEARCH_LAYER" data-ref="search"><div class="clickable size-xs animation" data-ref="cancel" data-t="CANCEL_SEARCH"></div><div class="ovr-swith-wrapper centered mobilehide"><div class="switch size-xs compact animation" data-ref="switch"><div data-do="set,list" data-icon="d" class="inlined" data-t="LIST"></div><div data-do="set,gallery" data-icon="w" class="inlined" data-t="GALLERY"></div></div></div><div id="add-to-quick" class="noselect" data-t="S_OVR_QUICK" data-ref="quick" data-icon=";"></div><nav class="menu with-left-yellow" data-ref="menu"></nav><div data-t="NOT_FOUND" data-ref="notFound" class="size-s"></div><div class="transparent-switch ovr-isolines mobilehide menu-block size-xs" data-ref="isolines" data-icon="&#xe036;"><span data-t="D_ISOLINES"></span><div data-do="set,off" data-t="NONE"></div><div data-do="set,pressure" data-t="PRESS"></div><div data-do="set,gh" data-t="GH"></div><div data-do="set,temp" data-t="TEMP"></div><div data-do="set,deg0" data-t="FREEZING"></div></div><div class="expert-mode"><div data-ref="expert" class="checkbox clickable-size" data-t="EXPERT_MODE"></div><small data-t="EXPERT_MODE_DESC"></small></div><div class="login-to-save centered"><div class="button btn-white non-logged-in" data-icon="." data-t="S_SAVE" data-do="login"></div><div class="bottom-note fg-white non-logged-in" data-t="S_SAVE2"></div><div class="bottom-note fg-white logged-in inlined" data-icon="." data-t="S_SAVE_AUTO"></div></div></div>', '.onoverlays .right-border{right:180px}.onoverlays #rhpane #overlay li.sub-menu{transition:none}.onoverlays #rhpane #overlay #ovr-menu .iconfont{transform:rotate(180deg)}.onoverlays #rhpane #overlay .menu-text{display:none}.onoverlays #rhpane #overlay::after{display:none}#device-mobile .onoverlays #search,#device-tablet .onoverlays #search,#device-mobile .onoverlays #detail,#device-tablet .onoverlays #detail,#device-mobile .onoverlays #user,#device-tablet .onoverlays #user,#device-mobile .onoverlays #logo-wrapper,#device-tablet .onoverlays #logo-wrapper,#device-mobile .onoverlays #login,#device-tablet .onoverlays #login,#device-mobile .onoverlays #mobile-menu,#device-tablet .onoverlays #mobile-menu,#device-mobile .onoverlays .windy-pois,#device-tablet .onoverlays .windy-pois,#device-mobile .onoverlays #plugin-picker,#device-tablet .onoverlays #plugin-picker,#device-mobile .onoverlays #open-in-app,#device-tablet .onoverlays #open-in-app,#device-mobile .onoverlays #bottom,#device-tablet .onoverlays #bottom{display:none !important}#device-mobile .onoverlays #plugin-menu,#device-tablet .onoverlays #plugin-menu{margin-right:80px;opacity:.5;pointer-events:none}#device-mobile .onoverlays #plugin-menu .closing-x,#device-tablet .onoverlays #plugin-menu .closing-x{display:none}#plugin-overlays{width:180px;z-index:10}#device-mobile #plugin-overlays,#device-tablet #plugin-overlays{width:220px;box-shadow:0 0 9px black}#plugin-overlays .plugin-content{padding:60px 5px 10px 5px;color:white;font-size:12px;background-color:#565673}#plugin-overlays .plugin-content .ovr-swith-wrapper{width:170px}#plugin-overlays .plugin-content .ovr-swith-wrapper .switch{color:#e5e5e5;opacity:.8;margin:5px 0}#plugin-overlays .plugin-content .ovr-swith-wrapper .switch div{border-color:#777793;padding:.2em 1.2em}#plugin-overlays .plugin-content .ovr-swith-wrapper .switch .selected{border-color:#777793;background-color:#777793}#plugin-overlays .plugin-content .ovr-isolines,#plugin-overlays .plugin-content .expert-mode{color:#ddd;padding:3px 8px;background:#636281;border-radius:.5em;margin:1.5em .5em}#plugin-overlays .plugin-content [data-ref="search"]{width:150px;position:relative;display:block;border:0;padding:.3em 1em;border-radius:2em;margin-left:7px}#plugin-overlays .plugin-content [data-ref="search"]:focus{outline:0;box-shadow:0 0 4px 0 black}#plugin-overlays .plugin-content [data-ref="cancel"]{text-align:right;margin-right:15px;margin-top:3px}#plugin-overlays .plugin-content [data-ref="notFound"]{text-align:center;display:none;margin-top:20px}#plugin-overlays .plugin-content .expert-mode{padding:.5em 1em}#plugin-overlays .plugin-content .expert-mode .checkbox{font-size:14px;margin-bottom:.2em}#plugin-overlays .plugin-content .expert-mode small{line-height:1.5;margin-left:27px;display:block;font-size:8px;opacity:.8}#plugin-overlays .plugin-content .ovr-isolines div,#plugin-overlays .plugin-content .ovr-isolines span{display:block;padding-right:0;margin:5px 0;letter-spacing:.09em}#plugin-overlays .plugin-content .ovr-isolines span{margin-bottom:1em}#plugin-overlays .plugin-content .ovr-isolines div{margin-left:5px;text-align:left}#plugin-overlays .plugin-content .ovr-isolines .selected{background:none}#plugin-overlays .plugin-content .ovr-isolines .selected::before{font-family:iconfont;font-variant:normal;text-transform:none;line-height:1;content:\'x\';position:absolute;margin-left:-16px;font-size:1.2em}#plugin-overlays .plugin-content #add-to-quick{color:#fff3e1;transition:all .3s;opacity:.3;font-size:10px;margin:10px 0 -10px 8px;display:block;animation:pulsate-opacity 3s;-webkit-animation:pulsate-opacity 3s;animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;white-space:nowrap;position:relative;z-index:10}#plugin-overlays .plugin-content #add-to-quick::before{display:block;transform:rotate(180deg);float:left;font-size:2em;position:relative;top:3px}#device-mobile #plugin-overlays .plugin-content #add-to-quick,#device-tablet #plugin-overlays .plugin-content #add-to-quick{font-size:14px;margin-left:10px}#plugin-overlays .plugin-content #add-to-quick.hide{font-size:0}#device-mobile #plugin-overlays .plugin-content #add-to-quick.hide,#device-tablet #plugin-overlays .plugin-content #add-to-quick.hide{font-size:0}#plugin-overlays .plugin-content .menu{margin-left:-5px;clear:both}#plugin-overlays .plugin-content .menu a{width:180px;margin:6px 0 0 0}@media screen and (max-height:600px){#plugin-overlays .plugin-content .menu a{margin:4px 0 0 0}}#plugin-overlays .plugin-content .menu .rounded-box{width:400px;height:240px;background-repeat:no-repeat;background-size:400px;background-position-y:-15px;margin:5px 5px;position:relative}#plugin-overlays .plugin-content .menu .rounded-box>span.inlined{position:relative}#plugin-overlays .plugin-content .menu .rounded-box .checkbox{position:absolute;bottom:15px;left:15px;right:15px}#plugin-overlays .plugin-content .menu .rounded-box canvas{width:100%;height:100%;position:absolute;left:0;top:0}#plugin-overlays .plugin-content .menu .rounded-box::after{text-shadow:0 0 4px black;pointer-events:none;display:block;content:attr(data-updated);position:absolute;right:15px;top:15px}#plugin-overlays .plugin-content .menu .checkbox[data-do="toggleFav,radar"],#plugin-overlays .plugin-content .menu .checkbox[data-do="toggleFav,efiTemp"],#plugin-overlays .plugin-content .menu .checkbox[data-do="toggleFav,efiRain"],#plugin-overlays .plugin-content .menu .checkbox[data-do="toggleFav,radar"],#plugin-overlays .plugin-content .menu .checkbox[data-do="toggleFav,satellite"],#plugin-overlays .plugin-content .menu .checkbox[data-do="toggleFav,satelliteIRBT"]{pointer-events:none;opacity:.3}#plugin-overlays .plugin-content .menu a.foiled,#plugin-overlays .plugin-content .menu .rounded-box.foiled{display:none}#device-mobile #plugin-overlays .plugin-content,#device-tablet #plugin-overlays .plugin-content{padding-top:15px}#device-mobile #plugin-overlays .plugin-content [data-ref="search"],#device-tablet #plugin-overlays .plugin-content [data-ref="search"]{font-size:15px;width:190px}#device-mobile #plugin-overlays .plugin-content .menu a,#device-tablet #plugin-overlays .plugin-content .menu a{width:220px;font-size:16px}#device-mobile #plugin-overlays .plugin-content .menu a small,#device-tablet #plugin-overlays .plugin-content .menu a small{left:53px}#plugin-overlays[data-view="gallery"]{box-shadow:0 0 4px 0 black;width:420px}@media only screen and (min-width:860px){#plugin-overlays[data-view="gallery"]{width:860px}}@media only screen and (min-width:1260px){#plugin-overlays[data-view="gallery"]{width:1260px}}@media only screen and (min-width:1690px){#plugin-overlays[data-view="gallery"]{width:1690px}}@media only screen and (min-width:2100px){#plugin-overlays[data-view="gallery"]{width:2100px}}@media only screen and (min-width:2520px){#plugin-overlays[data-view="gallery"]{width:2520px}}@media only screen and (min-width:2940px){#plugin-overlays[data-view="gallery"]{width:2940px}}@media only screen and (min-width:3360px){#plugin-overlays[data-view="gallery"]{width:3360px}}#plugin-overlays[data-view="gallery"] .plugin-content{padding-left:20px}#plugin-overlays[data-view="gallery"] .plugin-content [data-ref="search"]{margin-left:20px;width:200px}#plugin-overlays[data-view="gallery"] .plugin-content [data-ref="cancel"]{width:220px}#plugin-overlays[data-view="gallery"] .plugin-content .menu{display:flex;flex-wrap:wrap}#plugin-overlays .login-to-save .btn-wrapper{font-size:14px}#plugin-overlays .login-to-save .bottom-note{color:white;opacity:.6}#plugin-overlays.searching .login-to-save{opacity:0}#plugin-overlays.searching .plugin-content #add-to-quick{font-size:0}#plugin-overlays.searching .plugin-content .expert-mode,#plugin-overlays.searching .plugin-content .ovr-isolines{opacity:0}', "", function(e) {
    var t=W.require, n=t("overlays"), i=t("store"), a=t("rootScope"), o=t("BindedSwitch"), l=t("BindedCheckbox"), s=t("Switch"), r=t("format"), d=t("trans"), c=t("$"), p=t("ovrSearch"), u=t("ovrAnimate"), v=this.refs, g=this.node, y=[], m="list";
    p.init(this);
    var h=o.instance( {
        el:this.refs.menu, bindStore:"overlay", render:function() {
            var e=i.get("favOverlays"), t=i.get("usedLang"), o=r.seoLang(t), l="gallery"===m, s=l?(new Date).toISOString().replace(/^\d+-(\d+)-(\d+)T.*$/, "$1$2"):null, c=p.overlaysList.map(function(t) {
                var i=n[t], c=y.includes(t)||!l&&i.hideFromList, p=e.includes(t)||i.allwaysOn;
                if(!i||!i.trans||!i.icon||c||i.virtual)return"";
                var v=i.getName();
                if(l) {
                    var g=""+u.bgUrl+t+"/latest.jpg?refTime="+s;
                    return i.trans2&&(v+=" - "+(d[i.trans2]||i.trans2)), '<div data-do="set,'+i.ident+'" data-overlay="'+t+'"\n\t\t\t\t\t\t\tclass="rounded-box"\n\t\t\t\t\t\t\tstyle="background-image: url('+g+')"\n\t\t\t\t\t\t\t>\n\t\t\t\t\t\t\t\t<canvas></canvas>\n\t\t\t\t\t\t\t\t<div class="loading ld-white full"></div>\n\t\t\t\t\t\t\t\t<span class="noselect inlined fg-white textshadow size-xxl clickable" data-icon="'+i.icon+'">'+v+'</span>\n\t\t\t\t\t\t\t\t<div class="checkbox '+(p?"": "off")+' clickable" data-do="toggleFav,'+t+'">'+d.S_OVR_QUICK+"</div>\n\t\t\t\t\t\t\t</div>"
                }
                return'<a data-do="set,'+i.ident+'" data-overlay="'+t+'"\n\t\t\t\t\t\t\t'+(a.isCrawler?'href="'+o+"-"+r.seoString(v)+"-"+t+'"':"")+'>\n\t\t\t\t\t\t\t<div class="checkbox '+(p?"":"off")+'"\n\t\t\t\t\t\t\t\tdata-do="toggleFav,'+t+'"></div>\n\t\t\t\t\t\t\t<span class="noselect inlined" data-icon-after="'+i.icon+'">'+v+"</span>\n\t\t\t\t\t\t</a>"
            }
            ).join("");
            this.el.innerHTML=c, this.set(i.get("overlay")), l&&this.el.querySelectorAll("div[data-overlay]").forEach(function(e) {
                e.onmouseover=u.onMouseOver.bind(null, e, e.dataset.overlay), e.onmouseout=u.onMouseOut.bind(null, e)
            }
            )
        }
        , toggle:function(e) {
            var t=i.get("favOverlays").slice(), n=t.indexOf(e), a=c('[data-do="toggleFav,'+e+'"]', this.el);
            n>-1?t.length>2&&(t.splice(n, 1), a&&a.classList.add("off")): (t.push(e), a&&a.classList.remove("off")), i.set("favOverlays", t)
        }
        , click:function(e, t) {
            switch(e) {
                case"set": i.set(this.bindStore, t);
                break;
                case"toggleFav": this.toggle(t)
            }
        }
    }
    ), f=function() {
        g.dataset.view=m, "gallery"===m&&(v.quick.classList.add("hide"), u.loadManifest()), h.render()
    }
    ;
    this.onopen=function() {
        p.resetSearch(), f()
    }
    , s.instance( {
        el:v.switch, initValue:m, onset:function(e) {
            m=e, f()
        }
    }
    ), o.instance( {
        el: v.isolines, bindStore: "isolines"
    }
    ), l.instance( {
        el: v.expert, bindStore: "expertMode"
    }
    ), setTimeout(function() {
        return v.quick.classList.add("hide")
    }
    , 8e3)
}

);