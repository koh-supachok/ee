<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Information Service Center | Ekarat</title>

    <link href="{{ asset(env('ASSET_PATH').'/css/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset(env('ASSET_PATH').'/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset(env('ASSET_PATH').'/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset(env('ASSET_PATH').'/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <!-- switchery -->
    <link href="{{ asset(env('ASSET_PATH').'/css/plugins/switchery/switchery.css') }}" rel="stylesheet">


    <link href="{{ asset(env('ASSET_PATH').'/css/plugins/iCheck/custom.css') }}" rel="stylesheet">




    <STYLE type="text/css">
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{ asset(env('ASSET_PATH').'/img/loading/Preloader_3.gif') }}) center no-repeat #fff;
        }
    </STYLE>

</head>