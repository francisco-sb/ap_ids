<!DOCTYPE html>
<html class="full" lang="es">
<head>
	<meta charset="UTF-8">
	<title>AP-IDS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/full.css')!!}
	{!!Html::style('css/signin.css')!!}

	@yield('styles')

</head>
<body class="full">

    @yield('content')

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}

    @yield('scripts')

</body>
</html>