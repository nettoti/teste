@extends('app')

@section('content')
   
<div class='container'>
    
    <div class='row col-md-12'>
        
        <table class='table table-hover table-striped'>           
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Usuário</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Qtd</th>
                    <th>Endereço</th>
                    <th>Loja</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan='3'></td>
                    <td></td>
                    <td>Total R$ {{ $total }}</td>
                    <td colspan='4'></td>
                </tr>
            </tfoot>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ $sale->purchaser_name }}</td>
                    <td>{{ $sale->item_description }}</td>
                    <td>R$ {{ $sale->item_price }}</td>
                    <td>{{ $sale->purchase_count }}</td>
                    <td>{{ $sale->merchant_address }}</td>
                    <td>{{ $sale->merchant_name }}</td>
                
                    <td>
                        <!--<a href="#">Editar</a> | -->
                        <a href="destroy/{{ $sale->id }}">Remover</a>
                    </td>
                
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

</div>

@endsection
