<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{

    public function showAppointmentForm()
    {
        $doctors = Doctor::all();
        if (Auth::guard('patient')->check()) {
            return view('patient/appointment', ['doctors' => $doctors]);
        }
        return view('appointment', ['doctors' => $doctors]);
    }

    public function showDoctorAppointmentForm($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        return view('doctor/doctorAppointment', ['doctor' => $doctor]);
    }

    public function bookAppointment(Request $request)
    {
        $appointmentCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        if (Auth::guard('patient')->check()) {
            $user = Auth::guard('patient')->user();

            $appointment = new Appointments();

            $appointment->full_name = "$user->first_name $user->last_name";
            $appointment->email = $user->email;
            $appointment->phone = $user->phone;
            $appointment->date = $request->input('date');
            $appointment->time = $request->input('time');
            $appointment->gender = $request->input('gender');
            $appointment->inquiry = $request->input('inquiry');
            $appointment->description = $request->input('description');
            $appointment->patient_id = $user->id;
            $appointment->doctor_id = $request->input('doctor_id');

            $appointment->save();
            return redirect()->route('appointment.post')->with('success', 'Congratulations! Your booking was successful!');
        }

        $appointment = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|string',
            'date' => 'required',
            'time' => 'nullable',
            'gender' => 'required',
            'inquiry' => 'required|string',
            'description' => 'nullable',
            'doctor_id' => 'nullable'
        ]);

        Appointments::create($appointment);

        // You can add any logic you need here, such as sending emails, notifications, etc.

        return redirect()->route('appointment.post')->with('success', 'Congratulations! Your booking was successful!');
    }

    // For Admin
    public function manageAppointments()
    {
        if (!Auth::guard('admin')->check()) {
            return view('unauthorized');
        }

        $appointments = Appointments::all();
        return view('admin/manageAppointments')->with('appointments', $appointments);
    }

    public function viewAppointment($id)
    {
        if (!Auth::guard('admin')->check()) {
            return view('unauthorized');
        }

        $appointment = Appointments::find($id);

        $doctor = Doctor::all()->where('id', $appointment->doctorId);

        return view('admin/viewAppointment', ['appointment' => $appointment, 'doctor' => $doctor]);
    }

    // For doctors
    public function manageAppointmentsDoctors()
    {
        if (!Auth::guard('doctor')->check()) {
            return view('unauthorized');
        }


        $doctor = Auth::guard('doctor')->user();

        $appointments = Appointments::all()->where('doctor_id', $doctor->id);

        return view('doctor/manageAppointments', ['appointments' => $appointments, 'doctor' => $doctor]);
    }

    public function viewAppointmentDoctors($id)
    {
        if (!Auth::guard('doctor')->check()) {
            return view('unauthorized');
        }

        $appointment = Appointments::find($id);
        return view('doctor/viewAppointment')->with('appointment', $appointment);
    }
}