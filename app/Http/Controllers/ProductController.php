<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::all();
        return view('products.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $Products = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $Products->image = $name;
            $file->move(public_path().'/images/', $name);
        }
   
        $Products->name = $request->get('name');
        $Products->price = $request->get('price');
        $Products->quantity = $request->get('quantity');
        
        
        $Products->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Products = Product::findOrFail($id);

        return view('products.edit', compact('Products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Products = Product::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $img = public_path() . '/images/'. $Products->image;
            File::delete($img);
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $Products->image = $name;
            $file->move(public_path().'/images/', $name);        
        }
        $validData = $request->validate([
            'name' => 'required|min:3|max:20',
            'price' => 'required|numeric|min:3|',
            'quantity' => 'required|numeric|min:1|',
                 
        ]);

        $Products->name = $request->get('name');
        $Products->price = $request->get('price');
        $Products->quantity = $request->get('quantity');
        
        
        $Products->update();

        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Products = Product::findOrFail($id);
        $Products->delete();
        $img = public_path() . '/images/'. $Products->image;
        File::delete($img);
        return redirect('/products');
    }
}
