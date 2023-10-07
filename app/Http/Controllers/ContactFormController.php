<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $msg = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'msgTitle' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactForm::create($msg);

        // You can add any logic you need here, such as sending emails, notifications, etc.

        return redirect()->route('contact')->with('success', 'Message sent successfully! We will get back to you shortly.');
    }

    public function showMessages()
    {  
        if(!Auth::guard('admin')->check()){
            return view('unauthorized');
        }
        
        $messages = ContactForm::all();
        return view('admin/messages')->with('messages', $messages);
    }

    public function viewMessage($id){
        if(!Auth::guard('admin')->check()){
            return view('unauthorized');
        }

        $message = ContactForm::find($id);
        return view('admin/viewMessage')->with('message', $message);
    }
}
