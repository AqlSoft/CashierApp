<?php

namespace App\Http\Controllers\Admin;

use App\Models\SalesSession;
use App\Models\Admin;
use App\Models\MonyBox;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SalesSessionController extends Controller
{
    public function index(): View
    {
        // الحصول على المستخدمين الذين ليس لديهم شفت نشط
        $adminsWithNoActiveSalesSession = Admin::whereDoesntHave('SalesSessions', function ($query) {
            $query->where('status', true);
        })->get();

        $salesSessions = SalesSession::with(['monybox', 'admin', 'creator'])->get();

        $vars = [
            'salesSessions'    => $salesSessions,
            'admins'    => $adminsWithNoActiveSalesSession,
            'monyBoxes' => MonyBox::all()
        ];

        return view('admin.sales-session.index', $vars);
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
            $existingMonyboxSalesSession = SalesSession::activeForMonybox($request->monybox_id)->exists();
            if ($existingMonyboxSalesSession) {
                return redirect()->back()
                    ->with('error', 'يوجد شفت مفتوح بالفعل لهذه الخزنة.')
                    ->withInput();
            }

            // التحقق من عدم وجود شفت نشط للمستخدم
            $existingAdminSalesSession = SalesSession::activeForAdmin($request->admin_id)->exists();
            if ($existingAdminSalesSession) {
                return redirect()->back()
                    ->with('error', 'هذا المستخدم لديه شفت مفتوح بالفعل.')
                    ->withInput();
            }

            // إنشاء الشفت الجديد
            SalesSession::create([
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
        $adminsWithNoActiveSalesSession = Admin::whereDoesntHave('SalesSessions', function ($query) {
            $query->where('status', true);
        })->get();

        $sales_session = SalesSession::with(['monybox', 'admin', 'creator'])->find($id);

        $vars = [
            'sales_session'           => $sales_session,
            'admins'          => $adminsWithNoActiveSalesSession,
            'monyBoxes'       => MonyBox::all()
        ];
        return view('admin.sales-session.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesSession $sales_session): RedirectResponse
    {

        $sales_session->update([
            'monybox_id'      => $request->monybox_id,
            'admin_id'        => $request->admin_id,
            'opening_balance' => $request->opening_balance,
            'start_time'      => $request->start_time,
            'notes'           => $request->notes,
            // 'status'          => $request->status,
            'updated_by' => Admin::currentId()
        ]);

        return redirect()->back()->with('success', 'SalesSession updated successfully');
    }

    public function close(SalesSession $sales_session): RedirectResponse
    {
        $sales_session->update([
            'end_time' => now(),
            'status' => false,
            'updated_by' => Admin::currentId(),
        ]);

        return back()->with('success', 'SalesSession closed successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesSession $sales_session): RedirectResponse
    {
        $sales_session->delete();

        return redirect()->back()->with('success', 'SalesSession deleted successfully');
    }
}
