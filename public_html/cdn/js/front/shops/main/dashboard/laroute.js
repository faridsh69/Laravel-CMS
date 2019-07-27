(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"license","name":"license","action":"App\Http\Controllers\UserController@license"},{"host":null,"methods":["POST"],"uri":"add-license","name":"addLicense","action":"App\Http\Controllers\UserController@addLicense"},{"host":null,"methods":["POST"],"uri":"register\/confirm","name":"confirm-register","action":"App\Http\Controllers\Auth\RegisterController@confirmRegister"},{"host":null,"methods":["POST"],"uri":"register\/set-pw","name":"set-password","action":"App\Http\Controllers\Auth\RegisterController@setPassword"},{"host":null,"methods":["POST"],"uri":"activation","name":"send-verification-message","action":"App\Http\Controllers\ActivationController@sendMessage"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"about","name":"about","action":"App\Http\Controllers\HomeController@about"},{"host":null,"methods":["POST"],"uri":"order\/user\/{user_id?}","name":"order.store","action":"App\Http\Controllers\OrderController@store"},{"host":null,"methods":["POST"],"uri":"order\/update\/{item_id?}","name":"order.update","action":"App\Http\Controllers\OrderController@update"},{"host":null,"methods":["POST"],"uri":"order\/delete\/{item_id?}","name":"order.destroy.orderitem","action":"App\Http\Controllers\OrderController@destroyOrderItem"},{"host":null,"methods":["POST"],"uri":"order\/basket\/show","name":"order.basket","action":"App\Http\Controllers\OrderController@basket"},{"host":null,"methods":["GET","HEAD"],"uri":"order\/preview","name":"order.preview","action":"App\Http\Controllers\OrderController@preview"},{"host":null,"methods":["POST"],"uri":"order\/count\/update","name":"order.updateOrderCount","action":"App\Http\Controllers\OrderController@updateOrderCount"},{"host":null,"methods":["POST"],"uri":"order\/updatePreview","name":"order.updatePreview","action":"App\Http\Controllers\OrderController@updatePreview"},{"host":null,"methods":["GET","HEAD"],"uri":"order\/prefactor","name":"order.prefactor","action":"App\Http\Controllers\OrderController@prefactor"},{"host":null,"methods":["POST"],"uri":"order\/status","name":"order.checkOrderStatus","action":"App\Http\Controllers\OrderController@checkOrderStatus"},{"host":null,"methods":["GET","HEAD"],"uri":"order\/factor","name":"order.factor","action":"App\Http\Controllers\OrderController@factor"},{"host":null,"methods":["GET","HEAD"],"uri":"order\/payment","name":"order.payment","action":"App\Http\Controllers\OrderController@payment"},{"host":null,"methods":["POST"],"uri":"order\/pay-reactions","name":"order.payReactions","action":"App\Http\Controllers\OrderController@payReactions"},{"host":null,"methods":["GET","HEAD"],"uri":"order\/{id?}","name":"order.show","action":"App\Http\Controllers\OrderController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"order\/modify\/items","name":"order.modifyItems","action":"App\Http\Controllers\OrderController@modifyItems"},{"host":null,"methods":["POST"],"uri":"order\/payment-way","name":"order.selectPaymentWay","action":"App\Http\Controllers\OrderController@selectPaymentWay"},{"host":null,"methods":["POST"],"uri":"order\/confirm-cash-paid","name":"order.cashPayConfirm","action":"App\Http\Controllers\OrderController@cashPayConfirm"},{"host":null,"methods":["POST"],"uri":"order\/check-modify\/items","name":"order.checkForModifyItems","action":"App\Http\Controllers\OrderController@checkForModifyItems"},{"host":null,"methods":["GET","HEAD"],"uri":"server\/print","name":"server.print","action":"App\Http\Controllers\OrderController@print"},{"host":null,"methods":["POST"],"uri":"item\/vote","name":"item.vote","action":"App\Http\Controllers\Admin\ItemController@vote"},{"host":null,"methods":["POST"],"uri":"user\/waiter-call","name":"user.waiterCall","action":"App\Http\Controllers\UserController@waiterCall"},{"host":null,"methods":["POST"],"uri":"user\/active-waiter-call","name":"user.activeWaiterCall","action":"App\Http\Controllers\UserController@checkActiveWaiterCall"},{"host":null,"methods":["POST"],"uri":"verify-waiter-call","name":"order.verifyWaitercall","action":"App\Http\Controllers\UserController@verifyWaitercall"},{"host":null,"methods":["GET","HEAD"],"uri":"basic","name":"basic","action":"App\Http\Controllers\BaseController@basic"},{"host":null,"methods":["GET","HEAD"],"uri":"basic\/settings","name":"basic-settings","action":"App\Http\Controllers\BaseController@basicSetting"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/set","name":"admin.set.index","action":"App\Http\Controllers\Admin\SetController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/set\/create","name":"admin.set.create","action":"App\Http\Controllers\Admin\SetController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menumaker\/set","name":"admin.set.store","action":"App\Http\Controllers\Admin\SetController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/set\/{set}","name":"admin.set.show","action":"App\Http\Controllers\Admin\SetController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/set\/{set}\/edit","name":"admin.set.edit","action":"App\Http\Controllers\Admin\SetController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/menumaker\/set\/{set}","name":"admin.set.update","action":"App\Http\Controllers\Admin\SetController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/menumaker\/set\/{set}","name":"admin.set.destroy","action":"App\Http\Controllers\Admin\SetController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker","name":"admin.menumaker.index","action":"App\Http\Controllers\Admin\MenumakerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/create","name":"admin.menumaker.create","action":"App\Http\Controllers\Admin\MenumakerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menumaker","name":"admin.menumaker.store","action":"App\Http\Controllers\Admin\MenumakerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/{menumaker}","name":"admin.menumaker.show","action":"App\Http\Controllers\Admin\MenumakerController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/{menumaker}\/edit","name":"admin.menumaker.edit","action":"App\Http\Controllers\Admin\MenumakerController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/menumaker\/{menumaker}","name":"admin.menumaker.update","action":"App\Http\Controllers\Admin\MenumakerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/menumaker\/{menumaker}","name":"admin.menumaker.destroy","action":"App\Http\Controllers\Admin\MenumakerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/item","name":"admin.item.index","action":"App\Http\Controllers\Admin\ItemController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/item\/create","name":"admin.item.create","action":"App\Http\Controllers\Admin\ItemController@create"},{"host":null,"methods":["POST"],"uri":"admin\/item","name":"admin.item.store","action":"App\Http\Controllers\Admin\ItemController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/item\/{item}\/edit","name":"admin.item.edit","action":"App\Http\Controllers\Admin\ItemController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/item\/{item}","name":"admin.item.update","action":"App\Http\Controllers\Admin\ItemController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/item\/{item}","name":"admin.item.destroy","action":"App\Http\Controllers\Admin\ItemController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/item\/show\/{id?}","name":"admin.showItem","action":"App\Http\Controllers\Admin\ItemController@show"},{"host":null,"methods":["POST"],"uri":"admin\/item\/update\/{id?}","name":"admin.updateItem","action":"App\Http\Controllers\Admin\ItemController@update"},{"host":null,"methods":["POST"],"uri":"admin\/item\/status\/{id?}","name":"admin.changeStatus","action":"App\Http\Controllers\Admin\ItemController@changeStatus"},{"host":null,"methods":["POST"],"uri":"admin\/batch\/status\/{id?}","name":"admin.changeBatchStatus","action":"App\Http\Controllers\Admin\BatchController@changeStatus"},{"host":null,"methods":["POST"],"uri":"admin\/item\/hidden\/{id?}","name":"admin.hideItem","action":"App\Http\Controllers\Admin\ItemController@hideItem"},{"host":null,"methods":["POST"],"uri":"admin\/item\/tag\/rm\/{id?}","name":"admin.removeItemTag","action":"App\Http\Controllers\Admin\ItemController@removeTag"},{"host":null,"methods":["POST"],"uri":"admin\/item\/gallery\/file\/rm\/{file_id?}","name":"admin.removeItemGalleryFile","action":"App\Http\Controllers\Admin\ItemController@removeItemGalleryFile"},{"host":null,"methods":["POST"],"uri":"admin\/item\/sort\/{id?}","name":"admin.changeItemSort","action":"App\Http\Controllers\Admin\ItemController@changeItemSort"},{"host":null,"methods":["POST"],"uri":"admin\/batch\/sort\/{id?}","name":"admin.changeCardSortInBatchPage","action":"App\Http\Controllers\Admin\BatchController@changeCardSortInBatchPage"},{"host":null,"methods":["POST"],"uri":"admin\/item\/updateOrderItem\/{item_id?}","name":"admin.updateOrderItem","action":"App\Http\Controllers\Admin\OrdersController@updateItemCountAndOrderItemStatus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/batch","name":"admin.batch.index","action":"App\Http\Controllers\Admin\BatchController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/batch\/create","name":"admin.batch.create","action":"App\Http\Controllers\Admin\BatchController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menumaker\/batch","name":"admin.batch.store","action":"App\Http\Controllers\Admin\BatchController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/batch\/{batch}","name":"admin.batch.show","action":"App\Http\Controllers\Admin\BatchController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/batch\/{batch}\/edit","name":"admin.batch.edit","action":"App\Http\Controllers\Admin\BatchController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/menumaker\/batch\/{batch}","name":"admin.batch.update","action":"App\Http\Controllers\Admin\BatchController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/menumaker\/batch\/{batch}","name":"admin.batch.destroy","action":"App\Http\Controllers\Admin\BatchController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/card\/update\/{id?}","name":"admin.updateCard","action":"App\Http\Controllers\Admin\MenumakerController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/collection","name":"admin.collection.index","action":"App\Http\Controllers\Admin\CollectionController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/collection\/create","name":"admin.collection.create","action":"App\Http\Controllers\Admin\CollectionController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menumaker\/collection","name":"admin.collection.store","action":"App\Http\Controllers\Admin\CollectionController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/collection\/{collection}","name":"admin.collection.show","action":"App\Http\Controllers\Admin\CollectionController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menumaker\/collection\/{collection}\/edit","name":"admin.collection.edit","action":"App\Http\Controllers\Admin\CollectionController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/menumaker\/collection\/{collection}","name":"admin.collection.update","action":"App\Http\Controllers\Admin\CollectionController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/menumaker\/collection\/{collection}","name":"admin.collection.destroy","action":"App\Http\Controllers\Admin\CollectionController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/uploadGallery\/{item_id?}","name":"admin.uploadGallery","action":"App\Http\Controllers\Admin\ItemController@uploadGallery"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/orders-info","name":"admin.ordersInfo","action":"App\Http\Controllers\Admin\OrdersController@unpaidOrders"},{"host":null,"methods":["GET","HEAD","POST","PUT","PATCH","DELETE","OPTIONS"],"uri":"admin\/orders-history","name":"admin.ordersHistory","action":"App\Http\Controllers\Admin\OrdersController@history"},{"host":null,"methods":["POST"],"uri":"admin\/order\/confirm\/{id?}","name":"admin.orderConfirm","action":"App\Http\Controllers\Admin\OrdersController@orderConfirm"},{"host":null,"methods":["POST"],"uri":"admin\/order\/deliver","name":"admin.deliverOrder","action":"App\Http\Controllers\Admin\OrdersController@deliverOrder"},{"host":null,"methods":["POST"],"uri":"admin\/order\/enter-accounting","name":"admin.enterAccounting","action":"App\Http\Controllers\Admin\OrdersController@enterAccounting"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/settings","name":"admin.settings.index","action":"App\Http\Controllers\Admin\SettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/settings\/create","name":"admin.settings.create","action":"App\Http\Controllers\Admin\SettingController@create"},{"host":null,"methods":["POST"],"uri":"admin\/settings","name":"admin.settings.store","action":"App\Http\Controllers\Admin\SettingController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/settings\/{setting}","name":"admin.settings.show","action":"App\Http\Controllers\Admin\SettingController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/settings\/{setting}\/edit","name":"admin.settings.edit","action":"App\Http\Controllers\Admin\SettingController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/settings\/{setting}","name":"admin.settings.update","action":"App\Http\Controllers\Admin\SettingController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/settings\/{setting}","name":"admin.settings.destroy","action":"App\Http\Controllers\Admin\SettingController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/setting\/change","name":"admin.changeSetting","action":"App\Http\Controllers\Admin\SettingController@changeSetting"},{"host":null,"methods":["POST"],"uri":"admin\/factor-setting\/change","name":"admin.changeFactorSetting","action":"App\Http\Controllers\Admin\SettingController@changeFactorSetting"},{"host":null,"methods":["POST"],"uri":"admin\/factor-setting\/reset","name":"admin.resetFactorNumber","action":"App\Http\Controllers\Admin\SettingController@resetFactorNumber"},{"host":null,"methods":["POST"],"uri":"admin\/printer","name":"admin.setPrinterData","action":"App\Http\Controllers\Admin\SettingController@setPrinterData"},{"host":null,"methods":["POST"],"uri":"admin\/order\/setting","name":"admin.orderAutoConfirm","action":"App\Http\Controllers\Admin\SettingController@changeOrderAutoConfirm"},{"host":null,"methods":["POST"],"uri":"admin\/setting\/conn\/chose\/menu","name":"admin.choseConn","action":"App\Http\Controllers\Admin\SettingController@changeCn"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/profile","name":"admin.profile.index","action":"App\Http\Controllers\Admin\ProfileController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/profile\/create","name":"admin.profile.create","action":"App\Http\Controllers\Admin\ProfileController@create"},{"host":null,"methods":["POST"],"uri":"admin\/profile","name":"admin.profile.store","action":"App\Http\Controllers\Admin\ProfileController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/profile\/{profile}","name":"admin.profile.show","action":"App\Http\Controllers\Admin\ProfileController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/profile\/{profile}\/edit","name":"admin.profile.edit","action":"App\Http\Controllers\Admin\ProfileController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/profile\/{profile}","name":"admin.profile.update","action":"App\Http\Controllers\Admin\ProfileController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/profile\/{profile}","name":"admin.profile.destroy","action":"App\Http\Controllers\Admin\ProfileController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/setting\/test","name":"admin.test","action":"App\Http\Controllers\Admin\SettingController@test"},{"host":null,"methods":["POST"],"uri":"admin\/temporary_license\/disturb","name":"admin.super-license","action":"App\Http\Controllers\Admin\SettingController@emptySuperAdminLicense"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

