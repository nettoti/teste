@extends('app')

@section('content')

    <div class='container'>

        <div class='row'>
            <div class='col-md-4'></div>
            <div class='col-md-4 well'>

                <h4>Faça o upload do seu arquivo para receita bruta</h4>
                <h6>
                    1 - Primeiro registre-se no nosso site.<br />
                    2 - O arquivo deve ter a extensão .tab.<br />
                    3 - A estrutura do arquivo deve conter 6 colunas espaçadas por 'TAB'.<br />
                </h6>
            </div>
            <div class='col-md-4'></div>
        </div>

        <div class='row'>
            <div class='col-md-4'></div>

            <div class='col-md-4 well'>
            
                {!! Form::open(['url'=>"upload", 'method'=>"post", 'enctype'=>'multipart/form-data']) !!}
                    {!! Form::file('arquivo', ['class'=>'form-control', 'required']) !!}<br />
                    {!! Form::submit('Enviar', ['class'=>'form-control btn btn-primary']) !!}
                {!! Form::close() !!}

              <div class='col-md-4'></div>
            </div>
        </div>
        
    </div>

@endsection