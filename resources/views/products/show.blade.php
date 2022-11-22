@extends('products.layout')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >

<style>
.iframe{
    position:absolute; 
    top: 140px;right:100px;
}

</style>
    <body><div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Cadeira: {{$product->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="javascript:history.back()"> Back</a>
            </div>
        </div>

    </div>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ano:</strong>
                {{$product->Ano}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semestre:</strong>
                {{ $product->Semestre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota:</strong>
                {{$product->detail}}
            </div>
        </div>
    </div>
</body>
@endsection
<?php $usr = Auth::user()->email; 
if($usr == 'anaritame@hotmail.com'){
    echo '<div class="iframe"> <iframe src="https://calendar.google.com/calendar/embed?src=anaritame.silva%40gmail.com&ctz=Europe%2FLisbon" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>';

}else{
    echo '<div class="iframe"> <iframe src="https://calendar.google.com/calendar/embed?src=cryjoaoctv%40gmail.com&ctz=Europe%2FLisbon" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>';

}
?>
    </div>