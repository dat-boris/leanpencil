asyncTest( "hello test", function() {
    $playdoh.leanpencil.login('testuser','password',
        function () {
            $playdoh.leanpencil.createContent({
                'title': 'test title',
                'content' : 'leanpencil is lean!',
            },
            function () {
                start();
                ok( 1 == "1", "Passed!" );
            });
        }
    );
});
