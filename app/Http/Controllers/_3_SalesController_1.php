<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class SalesController extends Controller {

    public function __construct()
    {
            $this->middleware('auth');
    }    

    public function index()
    {
        return view('sales.index');
    }

    public function create()
    {   
        return 'ok';
    }

    public function store()
    {
            //
    }

    public function show($id)
    {
            //
    }

    public function edit($id)
    {
            //
    }

    public function update($id)
    {
            //
    }

    public function destroy($id)
    {
            //
    }

    public function listSales()
    {
        $sales = Sale::all();

        return view('sales.list',['sales'=>$sales]);
    }

    public function Upload(Request $request)
    {
        $file = $request->file('arquivo');
        //$file->OriginalName;
        $name = $file->getClientOriginalName();
              
        $file = fopen($file, 'r');
        
        //Guarda Cabeçalho
        $header =  fgets($file);

        $cont = 0;
        $price = 0;              
        $i = 0;
        while (($row = fgetcsv($file, 0, "\t")) !== FALSE) { 
            //Pula Cabeçalho        
            if(!$header){
                continue;
            }//Pula Cabeçalho

            $fileArray[$i] = [
                $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]
            ];

            $cont += $fileArray[$i][3];
            $price += $fileArray[$i][2];

            $i++;
        }
        
        $price = number_format($price, 1, '.', '');
        
        return view('sales.confirm', compact('fileArray', 'price', 'cont', 'name'));
        
    }

}
