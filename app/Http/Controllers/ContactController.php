<?php

namespace App\Http\Controllers;

use App\Helpers\TelegramHelper;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
        $contact = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required',
            'subject' => 'required|string',
            'comment' => 'required|string'
        ]);
        
        Contact::create($contact);

        TelegramHelper::sendContactNotification($contact);

        return redirect()->back()->with("success", "Successfully Submitted!!");
        
    }
}
