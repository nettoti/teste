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

}
