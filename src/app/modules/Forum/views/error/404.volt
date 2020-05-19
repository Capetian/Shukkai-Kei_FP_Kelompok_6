{{ get_doctype() }}
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ renderTitle() }}
        {{ assets.outputCSS('header') }}
        {{ assets.outputCSS('font') }}
		{{ assets.outputCSS('appCss') }}

        <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}"/> -->
    </head>
    <body>
        <div class="page-wrap d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <span class="display-1 d-block">404</span>
                        <div class="mb-4 lead">The page you are looking for was not found.</div>
                        <a href="{{url('Forum/index/')}}" class="btn btn-link">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>    
    </body>
 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
{{ assets.outputJS('js') }}
{{ assets.outputJS('appJs') }}

</html>
