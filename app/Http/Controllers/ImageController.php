<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function upload(Request $request, $id)
    {
        if (!Auth::guard('doctor')->check() && !Auth::guard('admin')->check() && !Auth::guard('patient')->check()) {
            return view('unauthorized');
        }

        if (Auth::guard('patient')->check()) {
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => "required|image|mimes:jpg,png,jpeg|max:2048"
                ]);

                $imagePath = $request->file('image')->store('uploads', 'public'); // Store image in the "public/images" directory

                $user = patient::find($id);

                $user->avatar = '/' . $imagePath;
                $user->save();
                return back()->with('success', 'Image updated successfully.');

            } else {
                return back()->withErrors(['error' => "No image selected."]);
            }
        }

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => "required|image|mimes:jpg,png,jpeg|max:2048"
            ]);

            $imagePath = $request->file('image')->store('uploads', 'public'); // Store image in the "public/images" directory

            $doctor = Doctor::find($id);

            $doctor->avatar = '/' . $imagePath;
            $doctor->save();
            return back()->with('success', 'Image updated successfully.');

        } else {
            return back()->withErrors(['error' => "No image selected."]);
        }


    }
}