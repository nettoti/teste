<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class SalesController extends Controller {
    
    private $file;
    private $fileArray;
    private $fileName;
    private $fileHeader;
    private $filePrice = 0;
    private $fileItens = 0;
    
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function index()
    {
        return view('sales.index');
    }

    public function create(Sale $sale, $fileName)
    {   
        $this->file = fopen(storage_path().'/upload/' . $fileName, 'r');
        $this->fileHeader = fgets($this->file);
        
        $this->parser($this->file, $this->fileHeader);
        
        foreach ($this->fileArray as $dados){
            $sale->purchaser_name = $dados[0];
            $sale->user_id = 1;
            $sale->save();
            $sale->push();
            var_dump($sale->purchaser_name);
        }
      
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

    public function upload(Request $request)
    {
        $this->file = $request->file('arquivo');
        $this->fileName = $this->file->getClientOriginalName();      
        Storage::disk('local_files')->put($this->fileName/* . "_" . rand() . "_" . date('d-m-Y')*/, File::get($this->file));
        $this->file = fopen($this->file, 'r');
        $this->fileHeader =  fgets($this->file);
        
        $this->parser($this->file, $this->fileHeader);  
        
//        if($this->fileArray == NULL){
//            return view('sales.index');
//        }
        
        $this->filePrice = number_format($this->filePrice, 1, '.', '');
        return view('sales.confirm', [
            'fileArray' =>$this->fileArray,
            'filePrice' =>$this->filePrice,
            'fileItens' =>$this->fileItens,
            'fileName'  =>$this->fileName,
        ]);
    }
    
    public function parser($file, $header)
    {           
        $i = 0;
        while (($row = fgetcsv($this->file, 0, "\t")) !== FALSE) { 
            //Pula Cabeçalho        
            if(!$this->fileHeader){
                continue;
            }//Pula Cabeçalho
            
                $this->fileArray[$i] = [
                    $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]
                ];
                $this->fileItens  += $this->fileArray[$i][3];
                $this->filePrice  += $this->fileArray[$i][2];
            $i++; 
        }
    }

}
