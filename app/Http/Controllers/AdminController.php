<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Admin;
use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showAdminDashboard()
    {
        if (!Auth::guard('admin')->check()) {
            return view('admin/auth');
        }

        $user = Auth::guard('admin')->user();
        $messages = ContactForm::all();
        $appointments = Appointments::all();
        return view('admin/dashboard', ['user' => $user, 'messages' => $messages, 'appointments' => $appointments]);

    }
    /**
     * Show the form for admin Registration.
     */
    public function showAdminRegistrationForm()
    {
        if (!Auth::guard('admin')->check()) {
            return view('admin/auth');
        }

        return view('admin/registerAdmin');
    }


    public function adminRegistration(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);

        // You can also log in the user after registration if desired
        Auth::login($user);
        return redirect()->route('admin/dashboard');
    }


    public function showAdminLoginForm()
    {

        return view('admin/loginAdmin');
    }


    // User Login
    public function adminLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin/dashboard')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

}