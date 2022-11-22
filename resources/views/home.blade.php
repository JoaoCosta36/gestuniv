 @extends('layouts.app')

 @section('content') 
 <?php 
 $_SESSION["head"] = 1;
session_start();?>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
<body>
<?php if(Auth::user())
{
    echo "<div  align='center'>";
}else
    echo "<div style='visibility:hidden;' align='center'>";
    ?>

<form id="ano1" value="1" action="/products" method="GET">
 <button id="btn_01" type="submit" name="ano" value="1ºAno"  > 1ºAno </button> 
</form>
<form value='ano2' action="/products" method="GET">
<button type="submit" name="ano" value="2ºAno"  > 2ºAno </button> 
</form>
<form value='ano3' action="/products?ano=3" method="GET">
<button type="submit" name="ano" value="3ºAno"  > 3ºAno </button> 

</form>
</div>
</body>
@endsection
