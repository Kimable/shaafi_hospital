<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function setLanguage(Request $request, $locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}