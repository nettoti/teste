<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Contracts\Auth\Authenticatable as Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

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

    public function create(Sale $sale, $fileName, Session $session)
    {   
        $this->file = fopen(storage_path().'/upload/' . $fileName, 'r');
        $this->fileHeader = fgets($this->file);

        while (($row = fgetcsv($this->file, 0, "\t")) !== FALSE) { 
            //Pula Cabeçalho        
            if(!$this->fileHeader){
                continue;
            }//Pula Cabeçalho
                    
            DB::table('sales')->insert(
                array(
                'user_id' => $sale->user_id = $session->id,
                'purchaser_name' => $row[0],
                'item_description' => $row[1],
                'item_price' => $row[2],
                'purchase_count' => $row[3],
                'merchant_address' => $row[4],
                'merchant_name' => $row[5],
                )
            );
        }
        return redirect('list');
               
    }

    public function destroy($id)
    {
        $sale = Sale::find($id)->delete();
        return redirect('list'); 
    }

    public function listSales(Sale $sale)
    {
        $sales = Sale::all();
        $user = $sale->user();
        return view('sales.list',['sales'=>$sales]);
    }

    public function upload(Request $request)
    {
        $this->file = $request->file('arquivo');
        
        if($this->file->getClientOriginalExtension() != "tab"){
            $erroUpload = "Tipo de arquivo não aceito!";
            return view('errors.erros')->with('erroUpload', $erroUpload);
        }else if($this->file->getClientOriginalExtension() === NULL){
            return view('home');
        }
        
        $this->fileName = $this->file->getClientOriginalName();      
        Storage::disk('local_files')->put($this->fileName/* . "_" . rand() . "_" . date('d-m-Y')*/, File::get($this->file));
        $this->file = fopen($this->file, 'r');
        $this->fileHeader =  fgets($this->file);
        
        $this->parser($this->file, $this->fileHeader);  
        
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
