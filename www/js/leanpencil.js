(function ($) {
    $.leanpencil = {

        /**
         * function to carry out login
         */
        login: function (username, psw, callback) {
            //TODO: getJSON call setting 3rd party cookie
            $.getJSON(
                "http://api.leanpencil.com/api/v0/login.json",
                { 'username': username,
                  'psw' : psw,
                }
            ),
        },

        /**
         * create content
         */
        createContent : function (data, callback) {
            $.getJSON(
                "http://api.leanpencil.com/api/v0/content",
                data,
                callback
            );
        },

        /**
         * get Credit 
         */
        getCredit : function (callback) {
            $.getJSON(
                "http://api.leanpencil.com/api/v0/content",
                data,
                callback
            );
        }
    };

})(jQuery)
