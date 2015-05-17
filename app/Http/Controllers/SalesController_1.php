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
        
        
//        $file = fopen(storage_path().'/upload/' . $fileName, 'w');
//       
//        $header = fgets($file);
       
        $i = 0;
        while (($row = fgetcsv($this->file, 0, "\t")) !== FALSE) { 
            //Pula Cabeçalho        
            if(!$this->fileHeader){
                continue;
            }//Pula Cabeçalho
            
//                $fileArray[$i] = [
//                    $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]
//                ];
//                
                //if($fileArray == null):
                    print "<br />" . $sale->user_id = $session->id;
                    print "<br />" . $sale->purchaser_name   = $row[0];
                    print "<br />" . $sale->item_description = $row[1];
                    print "<br />" . $sale->item_price       = $row[2];
                    print "<br />" . $sale->purchase_count   = $row[3];
                    print "<br />" . $sale->merchant_address = $row[4];
                    print "<br />" . $sale->merchant_name    = $row[5];
                    //$sale->save();
                    
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
                    
//                   DB::table('users')->insert(
//                        array('email' => 'john@example.com', 'votes' => 0)
//                    );
                    
                    //$sale = Sale::create($sale);
//                        'user_id' => '1',
//                        'purchaser_name' => 'John',
//                        'item_description' => 'John',
//                        'item_price' => 'John',
//                        'purchase_count' => 'John',
//                        'merchant_address' => 'John',
//                        'merchant_name' => 'John',
//                        ]);
                    
                //endif;    
            $i++; 
            print "<hr />";
            var_dump($row, $sale);
        }
        
               
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
//        /dd($user);
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
                //var_dump($this->fileArray);
                
                $this->fileItens  += $this->fileArray[$i][3];
                $this->filePrice  += $this->fileArray[$i][2];
            $i++; 
        }
    }

}
