var LS = LS || {};

LS = (function() {
    var domain = 'printio.ru',
        id = 0,
        catalogUrl = null,
        debug = false,
        timer = false,
        clearUrl = ''
    ;

    var $q = function(selector, el) {
        if (!el) {el = document;}
        return el.querySelector(selector);
    };

    var $$q = function(selector, el) {
        if (!el) {el = document;}
        return el.querySelectorAll(selector);
    };

    var trim = function(str) {
        return str.replace(/^\s+|\s+$/g, '');
    };

    var innerTXT = function(str) {
        if (document.all) {
            return str.innerText;
        } else {
            return str.textContent;
        }
    };

    var log = function(myvar) {
        if (!debug) {return;}
        else if (!window.console) {console = {log: function() {}};}
        else if (typeof console.log == 'undefined') {console.log = function() {};}

        console.log(myvar);
    };

    return {

        getTimer: function() {
            return timer;
        },

        detectURL: function() {},

        isMainPage: function() {
            var isMainPage = false;
            try {
                isMainPage = (window.location.pathname == '/');
            } catch (e) {}

            return isMainPage;
        },

        isCatalog: function() {
            if (catalogUrl == null) {
                var matches = document.URL.match(new RegExp("^(?:http[s]?:\\/\\/)?(?:[^.]+\\.)?"+domain+"\\/(.*)\\/(\\d+)", 'i'));
                if (matches && matches[1] != 'stores') {
                    try {
                        if (!$q('#bd img[alt="Not_found"]')) {
                            catalogUrl = true;
                            clearUrl = matches[0];
                            id = matches[2];
                        }
                    } catch (e) {}
                }
            }

            return catalogUrl | false;
        },

        isCart: function() {
            return (document.URL.indexOf('/cart') > -1);
        },

        isOrder: function() {
            return (document.URL.indexOf('/thank_you') > -1 && $q('.order-num') != null);
        },

        getProductID: function() {
            if (!this.isCatalog()) {return 0;}

            return id;
        },

        getProductName: function() {
            if (!this.isCatalog()) {return 0;}

            var name = '';
            try {
                name = trim(innerTXT($q('.product-info .product-title')));
            } catch (e) {}

            return name;
        },

        getProductBrand: function() {
            if (!this.isCatalog()) {return 0;}

            return '';
        },

        getProductCategory: function() {
            if (!this.isCatalog()) {return 0;}

            var category = '';
            try {
                var catSpan = $$q('.breadcrumbs a');
                category = trim(innerTXT(catSpan[1]));
            } catch (e) {}

            return category;
        },

        getProductDescription: function() {
            if (!this.isCatalog()) {return 0;}

            var description = '';
            try {
                var descSpan = $$q('.product-info-content-sections li');//
                description = trim(innerTXT(descSpan[0]).replace(/[\r\n\t]+/g, ' ').replace(/[\s]{2,}/g, ' ').substr(0,1000));
            } catch (e) {}

            return description;
        },

        getProductPrice: function() {
            if (!this.isCatalog()) {return 0;}

            var price = 0;
            try {
                price = trim(innerTXT($q('.product-info span.price')).replace(/[^\d]+/g, ''));
            } catch (e) {}
            return price;
        },

        getProductOldPrice: function() {
            if (!this.isCatalog()) {return 0;}

            return 0;
        },

        getCurrencyId: function() {
            if (!this.isCatalog()) {return 0;}

            return 1;
        },

        isProductAvailable: function() {
            if (!this.isCatalog()) {return 0;}

            return 1;
        },

        getProductImage: function() {
            if (!this.isCatalog()) {return 0;}

            var image = '';
            try {
                var matches = $q('.product-img .zoomable').getAttribute('data-large-url').match(new RegExp("^^(.*)\\?\\d+", 'i'));
                if (matches) {
                    image = matches[1];
                }
            } catch (e) {}

            return image;
        },

        getCart: function() {
            if (!this.isCart()) {return false;}

            var cartArr = [];
            try {
                var cartBar = $$q('table.cart-items tr');

                for (var i = 0; i < cartBar.length; i++) {
                    var cartElem = cartBar[i];

                    if ($q('.product-info', cartElem)) {
                        var matches = [];
                        var cartNameBar = $q('.product-info a', cartElem);
                        var cartProductName = trim(innerTXT(cartNameBar));
                        var cartProductUrl = cartNameBar.href;
                        var cartProductId = 0;
                        matches = cartProductUrl.match(new RegExp("^(?:http[s]?:\\/\\/)?(?:[^.]+\\.)?"+domain+"\\/.*\\/(\\d+)", 'i'));
                        if (matches) {
                            cartProductId = matches[1];
                        }
                        var cartProductSmallImage = '';
                        matches = $q('.product-img a img', cartElem).src.match(new RegExp("^^(.*)\\?\\d+", 'i'));
                        if (matches) {
                            cartProductSmallImage = matches[1];
                        }
                        var cartProductPrice = trim(innerTXT($q('.price', cartElem)).replace(/[^\d]+/g, ''));

                        cartArr.push(
                            {
                                'ProductId':    cartProductId,
                                'ProductName':  cartProductName,
                                'ProductUrl':   cartProductUrl,
                                'ProductImage': cartProductSmallImage,
                                'ProductPrice': cartProductPrice
                            }
                        );
                    }
                }
            } catch (e) {}

            return cartArr;
        },

        getOrderID: function() {
            var ret = '';
            try {
                if (this.isOrder()) {
                    ret = trim(innerTXT($q('.order-num')).replace(/[^\d]+/g, ''));
                }
            } catch (e) {}

            return ret;
        },

        getProductClearUrl: function() {
            if (!this.isCatalog()) {return 0;}
            return clearUrl;
        }
    }

}());