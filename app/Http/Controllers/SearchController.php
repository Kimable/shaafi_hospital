<?php

// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Replace 'Doctor' with your actual model name

class SearchController extends Controller
{
    public function index()
    {
        // You can load any necessary data for the search form here
        return view('searchResults');
    }

    public function search(Request $request)
    {
        // Retrieve search criteria from the form
        $specialty = $request->input('specialty');
        //$category = $request->input('category');
        $doctor = $request->input('doctor');

        //dd($doctor);

        // Query the database based on the search criteria
        $doctors = Doctor::where('specialty', $specialty)->orWhere('id', $doctor)->get();

        // Pass the search results to the view for display
        return view('searchResults', ['doctors' => $doctors]);
    }
}