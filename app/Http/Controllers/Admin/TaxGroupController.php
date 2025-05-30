<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller as BaseController;
use App\Models\Tax;
use App\Models\TaxGroup;
use App\Http\Requests\TaxGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaxGroupController extends BaseController
{
    /**
     * عرض قائمة مجموعات الضرائب
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $taxGroups = TaxGroup::withCount('taxes')->latest()->paginate(10);
        $tab='tax-groups';

        return view('admin.setting.products.index', compact('taxGroups' ,'tab'));
    }

    /**
     * عرض نموذج إنشاء مجموعة ضرائب جديدة
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $taxes = Tax::active()->get();
        return view('admin.tax-groups.create', compact('taxes'));
    }

    /**
     * حفظ مجموعة الضرائب الجديدة
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaxGroupRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $taxGroup = TaxGroup::create($validated);
            $taxGroup->taxes()->sync($validated['taxes']);
            
            DB::commit();
            return redirect()
                ->route('admin.tax-groups.index')
                ->with('success', 'تم إنشاء مجموعة الضرائب بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
        }
    }

    /**
     * عرض تفاصيل مجموعة الضرائب
     *
     * @param  \App\Models\TaxGroup  $taxGroup
     * @return \Illuminate\View\View
     */
    public function show(TaxGroup $taxGroup)
    {
        $taxGroup->load('taxes');
        return view('admin.tax-groups.show', compact('taxGroup'));
    }

    /**
     * عرض نموذج تعديل مجموعة الضرائب
     *
     * @param  \App\Models\TaxGroup  $taxGroup
     * @return \Illuminate\View\View
     */
    public function edit(TaxGroup $taxGroup)
    {
        $taxes = Tax::active()->get();
        $selectedTaxes = $taxGroup->taxes->pluck('id')->toArray();
        
        return view('admin.tax-groups.edit', compact('taxGroup', 'taxes', 'selectedTaxes'));
    }

    /**
     * تحديث بيانات مجموعة الضرائب
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaxGroup  $taxGroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaxGroupRequest $request, TaxGroup $taxGroup)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $taxGroup->update($validated);
            $taxGroup->taxes()->sync($validated['taxes']);
            
            DB::commit();
            return redirect()
                ->route('admin.tax-groups.index')
                ->with('success', 'تم تحديث مجموعة الضرائب بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'حدث خطأ أثناء تحديث البيانات: ' . $e->getMessage());
        }
    }

    /**
     * حذف مجموعة الضرائب
     *
     * @param  \App\Models\TaxGroup  $taxGroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(TaxGroup $taxGroup)
    {
        try {
            $taxGroup->taxes()->detach();
            $taxGroup->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'تم حذف مجموعة الضرائب بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة حذف مجموعة الضرائب: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * التحقق من كود المجموعة
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_code' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'valid' => false,
                'message' => $validator->errors()->first('group_code')
            ]);
        }

        $query = TaxGroup::where('group_code', $request->group_code);
        
        if ($request->has('group_id')) {
            $query->where('id', '!=', $request->group_id);
        }

        $exists = $query->exists();

        return response()->json([
            'valid' => !$exists,
            'message' => $exists ? 'كود المجموعة مستخدم مسبقًا' : ''
        ]);
    }
}
