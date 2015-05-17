@extends('app')

@section('content')
   
<div class='container'>
    
    <div class='row col-md-12'>
        <div class="well"><h3>File name: {{ $fileName }}</h3></div>
        <table class='table table-hover table-striped'>           
            <thead>
                <tr>
                    <th>purchaser_name</th>
                    <th>item_description</th>
                    <th>item_price</th>
                    <th>purchase_count</th>
                    <th>merchant_address</th>
                    <th>merchant_name</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan='2'></td>
                    <td>Price: {{ $filePrice }}</td>
                    <td>Itens: {{ $fileItens }}</td>
                    <td>
                        <a href='{{" home "}}' class='btn btn-danger form-control'>Cancelar</a>
                    </td>
                    <td colspan='1'>
                        <a href='{{ "create/$fileName" }}' class='btn btn-primary form-control'>Confirmar Envio</a>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                @if (isset($fileArray))
                    @foreach($fileArray as $line)
                    <tr>
                        <td>{{ $line[0] }}</td>
                        <td>{{ $line[1] }}</td>
                        <td>{{ $line[2] }}</td>
                        <td>{{ $line[3] }}</td>
                        <td>{{ $line[4] }}</td>
                        <td>{{ $line[5] }}</td>                             
                    </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>

</div>

@endsection
