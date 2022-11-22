@extends('products.layout')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/rotate-button.css') }}" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
<style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
</style>
<?php 
if(isset($_GET['ano'])) {
  $ano = intval($_GET['ano']);
$_SESSION["head"] = $ano;
session_start();
} else {
  $ano=1;
}

echo "<input type='hidden' style='color:black;' id='myInput' value='$ano' >";
if(Auth::check()){
  echo $user = Auth::user()->email;
}else{
  echo "<script>alert('Not authenticated');</script>";
}
?>
<style type="text/css">
.collapse-row{
  visibility: collapse;
}
.display-row{
visibility: visible;

}

.rotate {
    -moz-transition: all .5s linear;
    -webkit-transition: all .5s linear;
    transition: all .5s linear;
}
.rotate.down {
    -moz-transform:rotate(90deg);
    -webkit-transform:rotate(90deg);
    transform:rotate(90deg);
}
table.table-bordered thead tr th.headerSortUp:after,
table.table-bordered thead tr th.headerSortDown:after,
table.table-bordered thead tr th.header:after {
  font-family: FontAwesome;
}
table.table-bordered thead tr th.header:after {
  content: "\f0dc";
}
table.table-bordered thead tr th.headerSortUp:after {
  content: "\f0de";
}
table.table-bordered thead tr th.headerSortDown:after {
  content: "\f0dd";
}
    body{
    background-color:  #d279a6;
    color:white;
    font-family: "Times New Roman", Times, serif;
}
 th{

  background-color:#D52E7C;
  transition: .4s ease-out; 
    transition-delay: 0.2s;
}
table{border:solid black;}
tr:hover {background-color: #ddd;}
tr:nth-child(even){background-color: #f2f2f2;}
</style>
<body>
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="rotate-button" href="{{ url('/home') }}">
                        <span class="rotate-button-face">Home</span>
                        <span class="rotate-button-face-back">Home</span>
                    </a>
                    @else
                        <a class="rotate-button" href="{{ route('login') }}">
                        <span class="rotate-button-face">Login</span>
                        <span class="rotate-button-face-back">Login</span></a>
                        @if (Route::has('register'))
                            <a class="rotate-button" href="{{ route('register') }}">
                            <span class="rotate-button-face">Register</span>
                        <span class="rotate-button-face-back">Register</span></a>
                        @endif
                    @endauth
                </div>
            @endif


        </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Licenciatura em História de Arte</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Adicionar Cadeira</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table id="tabelinha" style="border-radius:25px;background-color:white; color:black;"class="table table-bordered">
   
 
     <tr style="border-radius:25px;background-color:white; color:black;"class="table table-bordered">
            <th  style="cursor: pointer; color:black;"   onclick="sortTable(0)" >Ano</th><a href="#"><div class="fa fa-chevron-right rotate"></div></a>
            <th  style="cursor: pointer; color:black;"  onclick="sortTable(1)">Semestre</th>
            <th  style="cursor: pointer; color:black;"  onclick="sortTable(2)">Nome da Cadeira</th>
            <th  style="cursor: pointer; color:black;"  onclick="sortTable(3)">Nota da Cadeira</th>
            <th  style="cursor: pointer; color:black;"  onclick="sortTable(4)" width="280px">Ações</th><label id="total"></label>
            </tr>
            
         <!--   <th>Id</th> -->
         
        </div>
        

        @foreach ($products as $product )
       
        <?php 
         
        if(isset($user)){
        
        if($user == $product->email)
{
  ?>
      <?php if($ano==$product->Ano){ ?>
        <tr id="thano" >
          <!--  <td>{{ ++$i }}</td> -->

         <td> {{ $product->Ano }}</td> 
            <td>{{ $product->Semestre }}</td>
            <td>{{ $product->name }}</td>
            <td id="notinha">{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                    <a style="margin-left:0px;"class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                 <button type="submit" class="btn btn-danger">Delete</button> 
                </form>
            </td>
        </tr>
      <?php }}} ?>
    
        @endforeach
    </table>
    
        
    {!! $products->links() !!}
</body>
<script>$(".rotate").click(function () {
    $(this).toggleClass("down");
})</script>
<script>
  
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tabelinha");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
var sorted = $('#tabelinha tbody tr').sort(function(a, b) {
  var a = $(a).find('td:first').text(), b = $(b).find('td:first').text();
  return a.localeCompare(b, false, {numeric: true})
})

$('#tabelinha tbody').html(sorted)

 var input = "<?php echo $ano?>";
//funcao para filtrar pelo ano 






</script>

<a href="#"><div class="fa fa-chevron-right rotate"></div></a>
<script>
       var $nota=0;
       var $count=0;
       $(document).ready(function () {
$("#tabelinha #notinha").each(function () {
    $count= $count+1;
    //alert($(this).html());

    $nota += Number($(this).html());
    console.log($nota);
    //alert($count); 
    document.getElementById("total").innerHTML = ' <b> <i> <h3  id="total"> Média do {{$ano}}º Ano-->'+ ($nota/$count).toFixed(2)+'</b> </i></h3> ';
});
});
</script>
<!--<?php
 
 $dataPoints = array(
   array("x"=> 10, "y"=> 41),
   array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
   array("x"=> 30, "y"=> 50),
   array("x"=> 40, "y"=> 45),
   array("x"=> 50, "y"=> 52),
   array("x"=> 60, "y"=> 68),
   array("x"=> 70, "y"=> 38),
   array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
   array("x"=> 90, "y"=> 52),
   array("x"=> 100, "y"=> 60),
   array("x"=> 110, "y"=> 36),
   array("x"=> 120, "y"=> 49),
   array("x"=> 130, "y"=> 41)
 );
   
 ?>
  <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Simple Column Chart with Index Labels"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

 </head>
 -->
 <body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>        
@endsection
