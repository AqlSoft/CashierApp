<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shift;
use App\Models\Admin;
use App\Models\MonyBox;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ShiftsController extends Controller
{
    public function index(): View
    {
        // الحصول على المستخدمين الذين ليس لديهم شفت نشط
        $adminsWithNoActiveShift = Admin::whereDoesntHave('shifts', function ($query) {
            $query->where('status', true);
        })->get();

        $shifts = Shift::with(['monybox', 'admin', 'creator'])->get();

        $vars = [
            'shifts'    => $shifts,
            'admins'    => $adminsWithNoActiveShift,
            'monyBoxes' => MonyBox::all()
        ];

        return view('admin.shifts.index', $vars);
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
    public function store(Request $request): RedirectResponse
    {

        try {
            // التحقق من عدم وجود شفت نشط للخزنة
            $existingMonyboxShift = Shift::activeForMonybox($request->monybox_id)->exists();
            if ($existingMonyboxShift) {
                return redirect()->back()
                    ->with('error', 'يوجد شفت مفتوح بالفعل لهذه الخزنة.')
                    ->withInput();
            }

            // التحقق من عدم وجود شفت نشط للمستخدم
            $existingAdminShift = Shift::activeForAdmin($request->admin_id)->exists();
            if ($existingAdminShift) {
                return redirect()->back()
                    ->with('error', 'هذا المستخدم لديه شفت مفتوح بالفعل.')
                    ->withInput();
            }

            // إنشاء الشفت الجديد
            Shift::create([
                'name'            => 'Session Name', // اسم الجلسة
                'device_name'     => $request->userAgent(),
                'monybox_id'      => $request->monybox_id,
                'admin_id'        => $request->admin_id,
                'opening_balance' => $request->opening_balance,
                'start_time'      => $request->start_time,
                'notes'           => $request->notes,
                'status'          => true,
                'created_by'      => Admin::currentId(),
            ]);

            return redirect()->back()
                ->with('success', 'تم إنشاء الشفت بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ: ' . $e->getMessage())
                ->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // الحصول على المستخدمين الذين ليس لديهم شفت نشط
        $adminsWithNoActiveShift = Admin::whereDoesntHave('shifts', function ($query) {
            $query->where('status', true);
        })->get();

        $shift = Shift::with(['monybox', 'admin', 'creator'])->find($id);

        $vars = [
            'shift'           => $shift,
            'admins'          => $adminsWithNoActiveShift,
            'monyBoxes'       => MonyBox::all()
        ];
        return view('admin.shifts.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift): RedirectResponse
    {

        $shift->update([
            'monybox_id'      => $request->monybox_id,
            'admin_id'        => $request->admin_id,
            'opening_balance' => $request->opening_balance,
            'start_time'      => $request->start_time,
            'notes'           => $request->notes,
            // 'status'          => $request->status,
            'updated_by' => Admin::currentId()
        ]);

        return redirect()->back()->with('success', 'Shift updated successfully');
    }

    public function close(Shift $shift): RedirectResponse
    {
        $shift->update([
            'end_time' => now(),
            'status' => false,
            'updated_by' => Admin::currentId(),
        ]);

        return back()->with('success', 'Shift closed successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift): RedirectResponse
    {
        $shift->delete();

        return redirect()->back()->with('success', 'Shift deleted successfully');
    }
}
