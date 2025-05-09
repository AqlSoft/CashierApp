<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Admin;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vars = [
            'admins' => Admin::with('profile')->get(),
            'contacts' => Contact::all(), 'tab' => 'contacts'];
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
    public function store(ContactRequest $request)
    {
        try {
            $contact = Contact::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'category_name' => $request->category_name,
            'person_id' => $request->person_id,
            'status' => $request->status ?? true,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->back()
            ->with('success', 'تم إضافة جهة الاتصال بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->withInputs()
                ->with('error', 'حدث خطأ أثناء إضافة جهة الاتصال');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
