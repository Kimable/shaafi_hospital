<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Appointments;
use App\Models\ContactForm;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showUserDashboard()
    {
        if (!Auth::guard('web')->check()) {
            return view('auth');
        }

        // Check if its Admin
        $user = Auth::guard('web')->user();
        if ($user->isAdmin == 1) {

            $messages = ContactForm::all();
            $appointments = Appointments::all();
            return view('admin/dashboard', ['user' => $user, 'messages' => $messages, 'appointments' => $appointments]);

        }

        return view('user/dashboard')->with('user', $user);

    }

    /**
     * Show the form for admin Registration.
     */
    public function showRegistrationForm()
    {
        return view('user/register');
    }


    public function Registration(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);

        // You can also log in the user after registration if desired
        Auth::login($user);
        return redirect()->route('dashboard');
    }


    public function showLoginForm()
    {
        // Flash a message to the session
        Session::flash('login_message', 'You need to log in to access this page.');

        return view('user/login');
    }


    // User Login
    public function Login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    // Send message to a doctor
    public function showTalkToDoctor()
    {
        if (!Auth::guard('patient')->check()) {
            return view('unauthorized');
        }
        $doctors = Doctor::all();
        return view('patient/talkToDoctor', ['doctors' => $doctors]);
    }

    public function talkToDoctor(Request $request)
    {
        if (!Auth::guard('patient')->check()) {
            return view('unauthorized');
        }

        return view('user/login');
    }

}