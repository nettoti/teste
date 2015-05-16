@extends('app')

@section('content')
   
<div class='container'>
    
    <div class='row col-md-12'>
        
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
                    <td>Price: {{ $price }}</td>
                    <td>Itens: {{ $cont }}</td>
                    <td>
                        <a href="{{ 'home' }}" class='btn btn-danger form-control'>Cancelar</a>
                    </td>
                    <td colspan='1'>
                        <a href='#' class='btn btn-primary form-control'>Confirmar</a>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                  
                @foreach($line as $_line)
                <tr>
                    <td>{{ $_line[0] }}</td>
                    <td>{{ $_line[1] }}</td>
                    <td>{{ $_line[2] }}</td>
                    <td>{{ $_line[3] }}</td>
                    <td>{{ $_line[4] }}</td>
                    <td>{{ $_line[5] }}</td>                             
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

</div>

@endsection
