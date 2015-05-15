@extends('app')

@section('content')
   
<div class='container'>
    
    <div class='row col-md-12'>
        
        <table class='table table-hover table-striped'>           
            <thead>
                <tr>
                    <th>id</th>
                    <th>purchaser_name</th>
                    <th>item_description</th>
                    <th>item_price</th>
                    <th>purchase_count</th>
                    <th>merchant_address</th>
                    <th>merchant_name</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan='3'></td>
                    <td></td>
                    <td></td>
                    <td colspan='3'></td>
                </tr>
            </tfoot>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->purchaser_name }}</td>
                <td>{{ $sale->item_description }}</td>
                <td>{{ $sale->item_price }}</td>
                <td>{{ $sale->purchase_count }}</td>
                <td>{{ $sale->merchant_address }}</td>
                <td>{{ $sale->merchant_name }}</td>
                
                <td>
                    <a href="#">Editar</a> | 
                    <a href="#">Remover</a>
                </td>
                
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

</div>

@endsection
