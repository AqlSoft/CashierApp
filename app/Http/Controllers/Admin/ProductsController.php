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

<<<<<<< HEAD
//   protected static $status = [
//     1 => 'Active',
//     0 => 'Inactive',
// ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // جلب قيمة التصنيف من الريكوست
    $categoryId = $request->input('category');

    // تعديل استعلام جلب المنتجات بناءً على التصنيف
    $productsQuery = Product::query();
    if ($categoryId) {
        $productsQuery->where('category_id', $categoryId);
    }
    $productsQuery->whereNotIn('status', [Product::PRODUCT__CANCELED, Product::PRODUCT__PARKED]);
    $products = $productsQuery->get();
    $vars = [
        'categories' => ItemCategroy::all(),
        'products'   => $products,
        'admins'     => Admin::all()
    ];
    return view('admin.products.index', $vars);
}
    
=======
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
>>>>>>> 1881be857f8ab38375feb0e87218d5b06d7ff636

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

<<<<<<< HEAD
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {
        Product::create([
            'name'             => $request->name,
            'cost_price'       => $request->cost_price,
            'sale_price'       => $request->sale_price,
            'description'      => $request->description,
            'processing_time'  => $request->processing_time,
            'category_id'      => $request->category_id ,
            'status'           =>Product::PRODUCT_JUST_CREATED,
            'created_by'       => auth()->user()->id,
=======
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    try {
      Product::create([
        'name'             => $request->name,
        'cost_price'       => $request->cost_price,
        'sale_price'       => $request->sale_price,
        'description'      => $request->description,
        'category'         => $request->category,
        'status'           => $request->status !== null ? $request->status : 0,
        'created_by'       => Admin::currentId(),
>>>>>>> 1881be857f8ab38375feb0e87218d5b06d7ff636

      ]);
      return redirect()->back()->withSuccess('Saves Successfully');
    } catch (Exception $err) {
      return redirect()->back()->withError('Failed to save, due to: ' . $err);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $product = Product::find($id);

    if (!$product) {
      return redirect()->back()->withError('The product is not exist, may be deleted or you have insuffecient privilleges.');
    }
    $vars = [
      'categories' => ItemCategroy::all(),
      'product' => $product,
<<<<<<< HEAD
      'admins' => Admin::all()
    
=======

>>>>>>> 1881be857f8ab38375feb0e87218d5b06d7ff636
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
      'product'  => $product,
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
        'status'           => $request->status,
        'updated_by'       => Admin::currentId(),
      ]);

      return redirect()->back()->with('success', 'Product updated successfully');
    } catch (Exception $e) {
      return redirect()->back()->withInput()->with('error', 'Error updating Product because of: ' . $e->getMessage());
    }
  }

<<<<<<< HEAD
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $product = Product::find($request->id);

      try {
          $product->update([
            'name'             => $request->name,
            'cost_price'       => $request->cost_price,
            'description'      => $request->description,
            'processing_time'  => $request->processing_time,
            'sale_price'       => $request->sale_price,
            'status'          =>Product::PRODUCT_EDITING,
            'updated_by'       => auth()->user()->id  ,
          ]);

          return redirect()->back()->with('success', 'Product updated successfully');
      } catch (Exception $e) {
          return redirect()->back()->withInput()->with('error', 'Error updating Product because of: ' . $e->getMessage());
      }
    }


      /**
     * تحديث حالة " للمنتج.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function park($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update([
                'status' => Product::PRODUCT__PARKED,
                'updated_by' => Admin::currentUser(),
            ]);
    
            return redirect()
                ->route('view-product-info',$product->id)
                ->with('success', 'Product parked successfully');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error parking product: ' . $e->getMessage());
        }
    }

      /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel($id)
    {
      $product = Product::findOrFail($id);
      try {
        $status->update([
          'status'           => Product::PRODUCT__CANCELED,
          'updated_by'       => Admin::currentUser(),
        ]);
  
        return redirect()->route('display-product-all')->with('success', 'Product cancel successfully');
      } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Error cancel Product because of: ' . $e->getMessage());
      }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
      $product = Product::findOrFail($id);
        try {
            $Product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');
        } catch (Exception $err) {
            return redirect()->route('display-product-all')->with('error', 'Error deleting Product because of: ' . $err->getMessage());
        }
=======
  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $Product = Product::find($id);
    try {
      $Product->delete();
      return redirect()->back()->with('success', 'Product deleted successfully');
    } catch (Exception $err) {
      return redirect()->route('display-Product-list')->with('error', 'Error deleting Product because of: ' . $err->getMessage());
>>>>>>> 1881be857f8ab38375feb0e87218d5b06d7ff636
    }
  }
}
