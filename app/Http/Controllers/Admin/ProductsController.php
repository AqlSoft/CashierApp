<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Product;
use App\Models\Admin;
use App\Models\ItemCategroy;



class ProductsController extends Controller
{

  protected static $status = [
    1 => 'Active',
    0 => 'Inactive',
];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $products = Product::all();
      $vars = [
        'categories' => ItemCategroy::all(),
        'status'   => static::$status,
        'products' => $products,
        'admins'   => Admin::all()
      ];
    return view('admin.products.index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {
        Product::create([
            'name'             => $request->name,
            'cost_price'       => $request->cost_price,
            'quantity'         => $request->quantity,
            'description'      => $request->description,
            'category'         => $request->category ,
            'status'           => $request->status !== null ? $request->status : 0,
            'created_by'       => auth()->user()->id,

        ]);
        return redirect()->back()->withSuccess('Saves Successfully');
    } catch (Exception $err) {
        return redirect()->back()->withError('Failed to save, due to: ' . $err);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
      $product = Product::find($id);

    if (!$product) {
      return redirect()->back()->withError('The product is not exist, may be deleted or you have insuffecient privilleges.');
    }
    $vars = [
      'status'  => static::$status,
      'product' => $product,
    
    ];

    return view('admin.products.show', $vars);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $product = Product::find($id);
      $vars = [
        'product'  =>$product,
          'cat'    => static::$cat,
          'status' => static::$status,
          'admins' => Admin::all()
      ];
      return view('admin.products.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $product = Product::find($request->id);

      try {
          $product->update([
            'name'           => $request->name,
            'cost_price'       => $request->cost_price,
            'quantity'         => $request->quantity,
            'description'      => $request->description,
            'status'           => $request->status ,
            'updated_by'       => auth()->user()->id  ,
          ]);

          return redirect()->back()->with('success', 'Product updated successfully');
      } catch (Exception $e) {
          return redirect()->back()->withInput()->with('error', 'Error updating Product because of: ' . $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $Product = Product::find($id);
        try {
            $Product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');
        } catch (Exception $err) {
            return redirect()->route('display-Product-list')->with('error', 'Error deleting Product because of: ' . $err->getMessage());
        }
    }
}
