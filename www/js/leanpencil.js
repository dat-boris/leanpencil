(function ($) {
    $.leanpencil = {

        /**
         * function to carry out login
         */
        login: function (username, psw, callback) {
            //TODO: getJSON call setting 3rd party cookie
            $.getJSON(
                "http://api.leanpencil.com/api/v0/login.json?jsoncallback=?",
                { 'username': username,
                  'psw' : psw,
                },
                callback
            );
        },

        /**
         * create content
         */
        createContent : function (data, callback) {
            $.getJSON(
                "http://api.leanpencil.com/api/v0/content.json?jsoncallback=?",
                data,
                callback
            );
        },

        /**
         * get Credit 
         */
        getCredit : function (callback) {
            $.getJSON(
                "http://api.leanpencil.com/api/v0/account.json??jsoncallback=?",
                data,
                callback
            );
        }
    };

})($playdoh)
