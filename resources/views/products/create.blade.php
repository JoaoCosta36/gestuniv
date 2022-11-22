@extends('products.layout')
  
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >

<?php $ano=0; $_SESSION['head']=$ano; ?>
<?php $user = Auth::user()->email;
echo $user
?>
<style>select{
    color:black;
    background-image:url('bg.jpg');
}
</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Cadeira</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="javascript:history.back()"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ano</strong>
                <select name="ano">
                <option value="Select">Select</option>     
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semestre</strong>
              <select name="semestre">
              <option value="Select">Select</option>   
  <option value="1">1</option>
  <option value="2">2</option>
</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome da Cadeira:</strong>
                <input style="height:30px;" type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota:</strong>
                
                <input  maxlength="5" type="text" class="form-control" style="height:40px; width:100px;" name="detail" placeholder="Nota">
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                
                <input value="<?php echo $user ?>" type="email" class="form-control" style="height:40px; width:350px;" name="email" readonly>
               
                    </div>
            
        </div>
        <form action="/home" method="GET">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button href="javascript:history.back()" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
   
</form>
@endsection