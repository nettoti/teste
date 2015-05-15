<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;

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
        
        public function Upload(Request $request)
        {
            $file = $request->file('arquivo');

            //$extension = $file->getClientOriginalExtension();
            $this->parser($file);
            //return 'ok';
        }
        
        public function parser($file)
        {
            $file = fopen($file, 'r');
            //Guarda o Cabeçalho
            $headder =  fgets($file);
            
            $i = 0;
            while (($row = fgetcsv($file, 0, "\t")) !== FALSE) { 
                $line[$i] = [
                    $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]
                ];
                $i++;
            }
            //var_dump($line);
            return view('sales.confirm');
        }
        
        
        public function parse($file)
        { 
            $file = fopen($file, "r");
            //$headder =  fgets($file);

            while (($col = fgetcsv($file, 1000, "\t")) !== FALSE) { 

                if(!$headder){
                    continue;
                }
                $this->setPurchaserName   ($col[0]);
                $this->setItemDescription ($col[1]);
                $this->setItemPrice       ($col[2]);
                $this->setPurchaseCount   ($col[3]);
                $this->setMerchantAddress ($col[4]);
                $this->setMerchantName    ($col[5]);

                $this->insert();
            }
        }
}
