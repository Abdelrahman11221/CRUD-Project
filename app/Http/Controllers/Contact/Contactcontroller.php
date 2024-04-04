<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\contact;
use Illuminate\Http\Request;

class Contactcontroller extends Controller
{
    //
    public function creating(ContactRequest $request)
    {
        contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_num'=>$request->phone,
            'message'=>$request->message
        ]);
        session()->flash('success' , 'Your message sent successfully');
        return redirect()->back();
    }

    public function getdata()
    {
        $contact = contact::all();
        return view('adminassets.assets.contacts',compact('contact'));
    }
}
