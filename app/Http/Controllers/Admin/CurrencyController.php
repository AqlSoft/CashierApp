<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use App\Models\Setting;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vars = [
            'settings' => Setting::all(),
            'currencies' => Currency::all(),
            'tab' => 'currencies',
        ];
        return view('admin.setting.index', $vars);
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
    public function store(CurrencyRequest $request)
    {
        //
        
        try {
            $validated = $request->validated();
           
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $filename = time() . '_' . $icon->getClientOriginalName();
                $uploadPath = public_path('assets/admin/uploads');
                
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                $icon->move($uploadPath, $filename);
                $validated['icon'] = $filename;
            }
            
            Currency::create($validated);
            return back()->with('success', 'New Currency has been added successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        $currency = Currency::find($id);
        if (!$currency) {
            return back()->with('error', 'Currency not found');
        }
        return view('admin.setting.currency.view', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, string $id)
    {
        $currency = Currency::find($id);
        if (!$currency) {
            return back()->with('error', 'العملة غير موجودة');
        }

        try {
            $validated = $request->validated();

            // معالجة الأيقونة إذا تم رفعها
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $filename = time() . '_' . $icon->getClientOriginalName();
                $uploadPath = public_path('assets/admin/uploads');
                
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                
                // حذف الأيقونة القديمة إذا وجدت
                if ($currency->icon && file_exists(public_path('assets/admin/uploads/' . $currency->icon))) {
                    unlink(public_path('assets/admin/uploads/' . $currency->icon));
                }
                
                $icon->move($uploadPath, $filename);
                $validated['icon'] = $filename;
            }

            $currency->update($validated);
            return back()->with('success', 'تم تحديث العملة بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $currency = Currency::find($id);
        if (!$currency) {
            return back()->with('error', 'Currency not found');
        }
        try {
            $currency->delete();
            return back()->with('success', 'Currency has been deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
