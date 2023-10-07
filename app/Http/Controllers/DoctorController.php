<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    // General Doctor Logic
    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('doctors', ['doctors' => $doctors]);
    }

    public function showSingleDoctor($id)
    {
        $doctor = Doctor::where('id', $id)->get();

        if (Auth::guard('admin')->check()) {
            return view("admin/viewDoctor", ['doctor' => $doctor]);
        }

        return view("singleDoctor", ['doctor' => $doctor]);
    }

    // Admin Doctor Logic
    public function showManageDoctors()
    {
        if (!Auth::guard('admin')->check()) {
            return view('unauthorized');
        }

        $doctors = Doctor::all();
        return view('admin/manageDoctors', ['doctors' => $doctors]);
    }

    public function showAddDoctor()
    {
        if (!Auth::guard('admin')->check()) {
            return view('unauthorized');
        }

        return view("admin/addDoctor");
    }

    public function addDoctor(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:doctors',
            'phone' => 'required',
            'specialty' => 'required',
            'qualifications' => 'nullable',
            'languages' => 'required',
            'description' => 'nullable',
            'avatar' => '/uploads/doctor-illustration.jpg',
            'password' => 'required'
        ]);

        if (!Auth::guard('admin')->check()) {
            return view("unauthorized");
        }

        Doctor::create($data);
        return redirect()->route('admin/add-doctor')->with('success', "Doctor added successfully!");
    }

    // Delete a doctor
    public function showDeleteDoctor($id)
    {
        if (!Auth::guard('admin')->check()) {
            return view("unauthorized");
        }
        $doctor = Doctor::find($id);
        return view('admin/deleteDoctor')->with('doctor', $doctor);
    }

    public function deleteDoctor($id)
    {
        if (!Auth::guard('admin')->check()) {
            return view("unauthorized");
        }

        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect()->route('admin/manage-doctors')->with('error', 'Doctor not found.');
        }

        $doctor->delete();

        return redirect()->route('admin/manage-doctors')->with('success', 'Doctor deleted successfully.');
    }

    // Update a doctor
    public function showEditDoctor($id)
    {
        if (!Auth::guard('admin')->check()) {
            return view("unauthorized");
        }

        $doctor = Doctor::find($id);
        return view('admin/editDoctor')->with('doctor', $doctor);
    }

    public function editDoctor(Request $request, $id)
    {
        if (!Auth::guard('admin')->check()) {
            return view("unauthorized");
        }

        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect()->route('admin/manage-doctors')->with('error', 'Doctor not found.');
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
            'qualifications' => 'nullable',
            'languages' => 'required',
            'description' => 'nullable',
        ]);

        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->specialty = $request->input('specialty');
        $doctor->qualifications = $request->input('qualifications');
        $doctor->languages = $request->input('languages');
        $doctor->description = $request->input('description');

        $doctor->save();

        return redirect()->route('admin/manage-doctors')->with('success', 'Doctor updated successfully.');
    }

    // Doctor Login
    public function doctorLoginForm()
    {
        return view('doctor/doctorLogin');
    }

    public function doctorDashboard()
    {
        if (!Auth::guard('doctor')->check()) {
            return view('doctor/auth');
        }

        // Check if its a doctor
        $doctor = Auth::guard('doctor')->user();
        if ($doctor) {
            $appointments = Appointments::all()->where('doctor_id', $doctor->id);
            return view('doctor/doctorDashboard', ['doctor' => $doctor, 'appointments' => $appointments]);
        }
    }

    public function doctorLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'nullable'
        ]);

        if (Auth::guard('doctor')->attempt($credentials)) {
            $doctor = Doctor::find($credentials);
            $request->session()->regenerate();
            return redirect()->route('doctor-dashboard', ['doctor' => $doctor])->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function doctorProfile()
    {

        if (!Auth::guard('doctor')->check()) {
            return view('doctor/auth');
        }

        $doctor = Auth::guard('doctor')->user();

        return view('doctor/doctorProfile', ['doctor' => $doctor]);
    }


    public function showUpdateDoctorProfile($id)
    {
        if (!Auth::guard('doctor')->check()) {
            return view('doctor/auth');
        }
        $doctor = Doctor::find($id);

        return view('doctor/updateProfile')->with('doctor', $doctor);
    }


    public function updateDoctorProfile(Request $request, $id)
    {

        if (!Auth::guard('doctor')->check()) {
            return view('doctor/auth');
        }

        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect()->route('admin/manage-doctors')->with('error', 'Doctor not found.');
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
            'qualifications' => 'nullable',
            'languages' => 'required',
            'description' => 'nullable',
        ]);

        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->specialty = $request->input('specialty');
        $doctor->qualifications = $request->input('qualifications');
        $doctor->languages = $request->input('languages');
        $doctor->description = $request->input('description');
        $doctor->password = $request->input('password');

        $doctor->save();

        return redirect()->route("doctor-profile")->with('success', 'Profile updated successfully.');

    }

}