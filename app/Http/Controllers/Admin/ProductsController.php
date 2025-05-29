<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;
use App\Models\Product;
use App\Models\Admin;
use App\Models\ItemCategroy;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{


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
  public function store(StoreProductRequest $request)
  {
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'cost_price' => 'required|numeric',
    //     'sale_price' => 'required|numeric',
    //     'category_id' => 'required|exists:item_categories,id',
    //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     'processing_time' => 'nullable|date_format:H:i:s',
    // ]);
    return $request->all();

    try {
      $imageName = null;

      if ($request->hasFile('image')) {
        // Save to public/assets/admin/uploads/images/products
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/admin/uploads/images/products'), $imageName);
      }

      Product::create([
        'name' => $request->name,
        'cost_price' => $request->cost_price,
        'sale_price' => $request->sale_price,
        'description' => $request->brief,
        'category_id' => $request->category_id,
        'status' => $request->status ? Product::PRODUCT_EDITING : Product::PRODUCT_JUST_CREATED,
        'created_by' => Admin::currentId(),
        'image' => $imageName,
      ]);

      return redirect()->back()->with('success', 'Product saved successfully');
    } catch (\Exception $e) {
      return redirect()->back()
        ->withInput()
        ->with('error', 'Failed to save product: ' . $e->getMessage());
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
      'admins' => Admin::all()

    ];

    return view('admin.products.show', $vars);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {}

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
        'status'          => Product::PRODUCT_EDITING,
        'updated_by'       => Admin::currentId(),
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
        'updated_by' => Admin::currentId(),
      ]);

      return redirect()
        ->route('view-product-info', $product->id)
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
    try {
      $product = Product::findOrFail($id);
      $product->update([
        'status'           => Product::PRODUCT__CANCELED,
        'updated_by'       => Admin::currentId(),
      ]);

      return redirect()->route('display-product-all')->with('success', 'Product cancel successfully');
    } catch (\Exception $e) {
      return redirect()->back()->withInput()->with('error', 'Error cancel Product because of: ' . $e->getMessage());
    }
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {

    try {
      $product = Product::findOrFail($id);
      $product->delete();
      return redirect()->back()->with('success', 'Product deleted successfully');
    } catch (Exception $err) {
      return redirect()->route('display-product-all')->with('error', 'Error deleting Product because of: ' . $err->getMessage());
    }
  }


  
}
