<!doctype HTML>

<html lang='en'>
    <head>
        <title>Pizza Rolls Power</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <!-- FontAwesome -->
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        
        <!-- Custom -->
        
        {{ HTML::style('css/master.css') }}
        {{ HTML::script(URL::to('js/main')) }}
    </head>
    <body>
        <div id='Header'>
            <div class='container'>
                <h1>Pizza Rolls</h1>
            </div>
        </div>
        
        @Yield('Content')
    </body>
</html>

