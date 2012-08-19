test( "hello test", function() {
    $.leanpencil.login('testuser','password',
        function () {
            $.leanpencil.createContent({
                'title': 'test title',
                'paragraph' : 'leanpencil is lean!'
            });
        }
    );
});
