<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $products=Products::all();
      return view('products.products',compact('products'));  
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {

    }
    public function show()
    {
        return view('products.detail');
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }
}
