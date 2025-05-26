<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use App\Models\Tax;
use App\Models\TaxGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaxController extends BaseController
{
    /**
     * عرض قائمة الضرائب
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $taxes = Tax::latest()->paginate(10);
        return view('admin.taxes.index', compact('taxes'));
    }

    /**
     * عرض نموذج إنشاء ضريبة جديدة
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $taxGroups = TaxGroup::active()->get();
        return view('admin.taxes.create', compact('taxGroups'));
    }

    /**
     * حفظ الضريبة الجديدة
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tax_code' => 'required|string|max:20|unique:taxes,tax_code',
            'tax_name_ar' => 'required|string|max:100',
            'tax_name_en' => 'required|string|max:100',
            'tax_rate' => 'required|numeric|min:0',
            'tax_type' => ['required', Rule::in(['PERCENTAGE', 'FIXED_AMOUNT'])],
            'is_active' => 'boolean',
            'is_inclusive' => 'boolean',
            'effective_from' => 'required|date',
            'effective_to' => 'nullable|date|after:effective_from',
            'gl_account_code' => 'nullable|string|max:50',
            'tax_groups' => 'nullable|array',
            'tax_groups.*' => 'exists:tax_groups,id',
        ]);

        DB::beginTransaction();
        try {
            $tax = Tax::create($validated + [
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            if (isset($validated['tax_groups'])) {
                $tax->taxGroups()->sync($validated['tax_groups']);
            }

            DB::commit();
            return redirect()
                ->route('admin.taxes.index')
                ->with('success', 'تم إنشاء الضريبة بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
        }
    }

    /**
     * عرض تفاصيل الضريبة
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\View\View
     */
    public function show(Tax $tax)
    {
        return view('admin.taxes.show', compact('tax'));
    }

    /**
     * عرض نموذج تعديل الضريبة
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\View\View
     */
    public function edit(Tax $tax)
    {
        $taxGroups = TaxGroup::active()->get();
        $selectedGroups = $tax->taxGroups->pluck('id')->toArray();
        
        return view('admin.taxes.edit', compact('tax', 'taxGroups', 'selectedGroups'));
    }

    /**
     * تحديث بيانات الضريبة
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tax $tax)
    {
        $validated = $request->validate([
            'tax_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('taxes', 'tax_code')->ignore($tax->id),
            ],
            'tax_name_ar' => 'required|string|max:100',
            'tax_name_en' => 'required|string|max:100',
            'tax_rate' => 'required|numeric|min:0',
            'tax_type' => ['required', Rule::in(['PERCENTAGE', 'FIXED_AMOUNT'])],
            'is_active' => 'boolean',
            'is_inclusive' => 'boolean',
            'effective_from' => 'required|date',
            'effective_to' => 'nullable|date|after:effective_from',
            'gl_account_code' => 'nullable|string|max:50',
            'tax_groups' => 'nullable|array',
            'tax_groups.*' => 'exists:tax_groups,id',
        ]);

        DB::beginTransaction();
        try {
            $tax->update($validated + [
                'updated_by' => Auth::id(),
            ]);

            $tax->taxGroups()->sync($validated['tax_groups'] ?? []);

            DB::commit();
            return redirect()
                ->route('admin.taxes.index')
                ->with('success', 'تم تحديث الضريبة بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'حدث خطأ أثناء تحديث البيانات: ' . $e->getMessage());
        }
    }

    /**
     * حذف الضريبة
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Tax $tax)
    {
        try {
            $tax->delete();
            return response()->json([
                'success' => true,
                'message' => 'تم حذف الضريبة بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة حذف الضريبة: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * الحصول على بيانات الضريبة كـ JSON
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTaxData(Tax $tax)
    {
        return response()->json([
            'success' => true,
            'data' => $tax->load('taxGroups')
        ]);
    }
}
