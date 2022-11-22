<!DOCTYPE html>
<html>
<head>
    <title>Scheduniv</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
</head>
<style>
body{
    background-image: url('background.jpg');

	color:white;
}
</style>
<body  >
<div class="container">
    @yield('content')
</div>
   
</body>
</html>