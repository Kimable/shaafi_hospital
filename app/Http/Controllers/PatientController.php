<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function showDashboard()
    {
        if (!Auth::guard('patient')->check()) {
            return view('auth');
        }

        $user = Auth::guard('patient')->user();
        $appointments = Appointments::all()->where('patient_id', $user->patient_id);
        return view('patient/dashboard', ['user' => $user, 'appointments' => $appointments]);

    }

    public function showRegistrationForm()
    {
        if (Auth::guard('patient')->check()) {
            return redirect('dashboard');
        }
        return view('patient/register');
    }


    public function registration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|string|email|max:255|unique:patients',
            'phone' => 'nullable',
            'password' => 'required|string|min:8',
        ]);

        $user = patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // You can also log in the user after registration if desired
        Auth::login($user);
        return redirect()->route('dashboard');
    }


    public function showLoginForm()
    {
        if (Auth::guard('patient')->check()) {
            return redirect('dashboard');
        }
        return view('patient/login');
    }


    // User Login
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::guard('patient')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function profile()
    {
        if (!Auth::guard('patient')->check()) {
            return view('auth');
        }

        $user = Auth::guard('patient')->user();

        return view('patient/profile', ['user' => $user]);
    }

    public function updateProfileForm($id)
    {
        if (!Auth::guard('patient')->check()) {
            return view("unauthorized");
        }

        $user = patient::find($id);
        return view('patient/updateProfile')->with('user', $user);
    }

    public function updateProfile(Request $request, $id)
    {
        if (!Auth::guard('patient')->check()) {
            return view("unauthorized");
        }

        $patient = patient::find($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',

        ]);

        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
        $patient->email = $request->input('email');
        $patient->phone = $request->input('phone');

        $patient->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function appointments()
    {
        if (!Auth::guard('patient')->check()) {
            return view("unauthorized");
        }

        $user = Auth::guard('patient')->user();
        $appointments = Appointments::all()->where('patient_id', $user->id);

        return view('patient/appointments', ['user' => $user, 'appointments' => $appointments]);
    }

    public function viewAppointment($id)
    {
        if (!Auth::guard('patient')->check()) {
            return view("unauthorized");
        }

        $user = Auth::guard('patient')->user();
        $appointment = Appointments::find($id);
        $doctor = Doctor::find($appointment->doctor_id);

        return view('patient/viewAppointment', ['user' => $user, 'doctor' => $doctor, 'appointment' => $appointment]);
    }

}