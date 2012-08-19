asyncTest( "hello test", function() {
    $playdoh.leanpencil.login('testuser','password',
        function () {
            $.leanpencil.createContent({
                'title': 'test title',
                'paragraph' : 'leanpencil is lean!',
            },
            function () {
                start();
                ok( 1 == "1", "Passed!" );
            });
        }
    );
});
