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

            return view('sales.list',['sales'=>$sales]);
        }
        
        public function sumPrice(){
            $users = DB::table('sales')
                ->select('department', DB::raw('SUM(price) as total_sales'));
        }
        
        public function storeUpload(Request $request)
        {
            $file = $request->file('arquivo');

            $extension = $file->getClientOriginalExtension();
            
            return 'ok';
        }
}
