/*! */
W.tag("map",'<div class="plugin-content"><div id="add-to-quick-pois" data-ref="addToQmessage" data-t="S_OVR_QUICK" data-icon=";"></div><nav class="menu with-left-yellow" data-ref="menu"></nav><div class="login-to-save centered"><div class="button btn-white non-logged-in" data-icon="." data-t="S_SAVE" data-do="login"></div><div class="bottom-note fg-white non-logged-in" data-t="S_SAVE2"></div><div class="bottom-note fg-white logged-in inlined" data-icon="." data-t="S_SAVE_AUTO"></div></div></div>',".onmap .right-border{right:180px}#device-mobile .onmap #search,#device-tablet .onmap #search,#device-mobile .onmap #detail,#device-tablet .onmap #detail,#device-mobile .onmap #user,#device-tablet .onmap #user,#device-mobile .onmap #logo-wrapper,#device-tablet .onmap #logo-wrapper,#device-mobile .onmap #login,#device-tablet .onmap #login,#device-mobile .onmap #plugin-picker,#device-tablet .onmap #plugin-picker,#device-mobile .onmap #open-in-app,#device-tablet .onmap #open-in-app,#device-mobile .onmap #bottom,#device-tablet .onmap #bottom{display:none !important}#plugin-map{width:180px;z-index:10}#plugin-map .plugin-content{padding:40px 5px 10px 5px;color:white;font-size:12px;background-color:#343d4f}#device-tablet #plugin-map .plugin-content{padding-top:0}#plugin-map .plugin-content #add-to-quick-pois{color:#fff3e1;opacity:.3;font-size:10px;margin:10px 0 -10px 8px;display:inline-block;animation:pulsate-opacity 3s;-webkit-animation:pulsate-opacity 3s;animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;white-space:nowrap}#plugin-map .plugin-content #add-to-quick-pois::before{display:block;transform:rotate(180deg);float:left;font-size:20px;position:relative;top:3px}#device-mobile #plugin-map .plugin-content #add-to-quick-pois,#device-tablet #plugin-map .plugin-content #add-to-quick-pois{font-size:14px;margin-left:10px}#device-mobile #plugin-map .plugin-content #add-to-quick-pois::before,#device-tablet #plugin-map .plugin-content #add-to-quick-pois::before{font-size:25px}#plugin-map .plugin-content .menu{margin-left:-5px}#plugin-map .plugin-content .menu a{width:180px}#plugin-map .plugin-content #window-too-many-favs{left:5px;width:160px;white-space:normal}#plugin-map .plugin-content #window-too-many-favs .closing-x{display:none}","",function(t){var i=this,e=W.require,n=(e("utils"),e("store")),o=e("rootScope"),a=e("trans"),l=e("BindedSwitch"),p=e("Window"),s=e("plugins"),d=e("broadcast"),c=o.pois,u=function(t){var i=s[t];i&&"hook"in i&&"menu"===i.hook&&(c[t]=[i.title,"&#xe03e;"],i.hook=null)};Object.keys(s).forEach(u),setTimeout(function(){i.refs.addToQmessage.style.visibility="hidden"},1e4),l.instance({el:this.refs.menu,bindStore:"pois",activeExtPlugin:null,_init:function(){var t=this;l._init.call(this),this.render(),n.on("favPois",this.render,this),d.on("externalPluginLoaded",function(i){u(i),t.render()})},render:function(){var t=n.get("favPois"),i=Object.keys(c).map(function(i){var e=c[i],n=e[0],o=e[1];return'<a data-do="set,'+i+'">\n\t\t\t\t\t\t\t<div class="checkbox '+(t.includes(i)?"":"off")+" "+(/^windy-plugin/.test(i)?"disabled":"")+'"\n\t\t\t\t\t\t\tdata-do="toggleFav,'+i+'"></div>\n\t\t\t\t\t\t\t<span class="noselect inlined" data-icon-after="'+o+'">'+(a[n]||n)+"</span>\n\t\t\t\t\t\t</a>"}).join("");this.el.innerHTML=i,this.set(n.get("pois"))},toggle:function(t){var i=n.get("favPois").slice(),e=i.indexOf(t);e>-1?i.length>2&&i.splice(e,1):i.push(t),n.set("favPois",i)||this.tooManyFavs(t)},tooManyFavs:function(t){p.instance({ident:"too-many-favs",attachPoint:'#plugin-map .menu a[data-do="set,'+t+'"]',className:"drop-down-window size-xs",timeout:4e3,closeOnClick:!0,html:"<span>Maximum is 7 favourite layers. Remove some layers from your favourites to add new ones.</span>"}).open()},checkAndCloseExtPlugin:function(){this.activeExtPlugin&&(d.emit("rqstClose",this.activeExtPlugin),this.activeExtPlugin=null)},click:function(t,i){switch(t){case"set":this.checkAndCloseExtPlugin(),/^windy-plugin/.test(i)?(this.activeExtPlugin=i,d.emit("rqstOpen",this.activeExtPlugin),l.set.call(this,i)):n.set(this.bindStore,i,{forceChange:n.get("pois")===i});break;case"toggleFav":this.toggle(i)}}})});