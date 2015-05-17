<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Contracts\Auth\Authenticatable as Session;
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

    public function create(Session $session)
    {   
        return $line;
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

        //$price = DB::table('sales')->sum('item_price');

        return view('sales.list',['sales'=>$sales]);
    }

    public function Upload(Request $request, Sale $sale, Session $session)
    {
        $file = $request->file('arquivo');
        
        $extension = $this->getClientOriginalExtension();
        //$name = $request->file('arquivo')->getClientOriginalName();
        //$file->OriginalName;

        //Guarda Cabeçalho
        $file = fopen($file, 'r');

        $headder =  fgets($file);

        $cont = 0;
        $price = 0;              
        $i = 0;
        while (($row = fgetcsv($file, 0, "\t")) !== FALSE) { 
            //Pula Cabeçalho
            if(!$headder){
                continue;
            }//Pula Cabeçalho

            $line[$i] = [
                $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]
            ];

            $cont += $line[$i][3];
            $price += $line[$i][2];

            $i++;
        }
        $price = number_format($price, 1, '.', '');
        
        //$fileObj = (object) $line;
        
        if(isset($line)){
            $session->fileTitle = $request->file('arquivo')->getClientOriginalName();
            $session->fileArray = $line;
        }else{
            $session->fileTitle = $session->fileTitle;
            $session->fileArray = $session->fileArray;
        }
        
        $move = Storage::disk('local_files')->put('teste'.$extension, File::get($file));
        //dd($session);
        //$ssesion->fileArray = $line;
        //dd($session->fileArray);
        //return view('sales.confirm', compact('line', 'price', 'cont', 'name'));
        return view('sales.confirm', compact('price', 'cont', 'name', 'session'));
    }

}
