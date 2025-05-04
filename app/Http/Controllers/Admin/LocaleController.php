<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class LocaleController extends Controller
{
    public function switch($locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}
