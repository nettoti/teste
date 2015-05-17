@extends('app')

@section('content')
   
<div class='container'>
    <div class='row col-md-4'></div>
    <div class='row col-md-4 well'>
    <h1 align='center' class='well'>Upload</h1>
    
        {!! Form::open(['url'=>"upload", 'method'=>"post", 'enctype'=>'multipart/form-data']) !!}
            {!! Form::file('arquivo', ['class'=>'form-control', 'required']) !!}<br />
            {!! Form::submit('Enviar', ['class'=>'form-control btn btn-primary']) !!}
        {!! Form::close() !!}
      <div class='row col-md-4'></div>
</div>

@endsection