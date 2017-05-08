<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Litburden</title>
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    </head>
    <body>
        <div id='app'>
            <example></example>
        </div>

        <script src="{{mix('/js/app.js')}}"></script>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </body>
</html>
